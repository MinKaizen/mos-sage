<?php

namespace App;

/**
 * Router for Clickbank Notifications (INS)
 * 
 * Decrypts the Clickbank notification, then provides hooks depending on the transaction type
 * clickbank_event hook is always run, regardless of transaction type
 * see https://support.clickbank.com/hc/en-us/articles/220376507-Instant-Notification-Service-INS-#Transaction%20Types
 * 
 * Uses Ironikus "Custom Action" webhook ("receive data")
 * 
 * Assumes the following data:
 * - Secret Key: ANTOLAMAS61952 (set inside Clickbank settings)
 * - Identifier = clickbank_event (set in the webhook URL with &wpwh_identifier=clickbank_event)
 * 
 * Reponse:
 * - Success: bool
 * - Content: the decrypted content
 * - Time: the time it took to run
 */
add_filter( 'wpwhpro/run/actions/custom_action/return_args', 'App\mos_handle_clickbank_event', 1, 3 );
function mos_handle_clickbank_event( $response, $identifier, $payload ) {
    $start_time = microtime( true );

    if ( $identifier != 'clickbank_event' ) return $response;

    $secret_key = "ANTOLAMAS61952";
    $encrypted = \WPWHPRO()->helpers->validate_request_value( $payload['content'], 'notification' );
    $iv = \WPWHPRO()->helpers->validate_request_value( $payload['content'], 'iv' );
    $decrypted = trim(
        openssl_decrypt(base64_decode($encrypted),
        'AES-256-CBC',
        substr(sha1($secret_key), 0, 32),
        OPENSSL_RAW_DATA,
        base64_decode($iv)), "\0..\32");
    $content = json_decode( $decrypted );

    $response['content'] = $content;

    do_action( 'clickbank_event', $content );

    switch ( $content->transactionType ) {
        case 'SALE':
          do_action( 'clickbank_sale', $content );
          break;
        case 'BILL':
          do_action( 'clickbank_rebill', $content );
          break;
        case 'RFND':
          do_action( 'clickbank_refund', $content );
          break;
        case 'CGBK':
          do_action( 'clickbank_chargeback', $content );
          break;
        case 'CANCEL-REBILL':
          do_action( 'clickbank_cancel_rebill', $content );
          break;
        case 'TEST_SALE':
          do_action( 'clickbank_test_sale', $content );
          break;
        case 'TEST_BILL':
          do_action( 'clickbank_test_rebill', $content );
          break;
        case 'TEST_RFND':
          do_action( 'clickbank_test_refund', $content );
          break;
        case 'CANCEL-TEST-REBILL':
          do_action( 'clickbank_test_cancel_rebill', $content );
          break;
    }
    
    $response['time'] = microtime( true ) - $start_time;
    
    return $response;
}

/**
 * Log the decrypted Clickbank Notification
 * 
 * Output file: (uploads)/mos_logs/clickbank_event.log
 */
add_action_async( 'clickbank_event', 'App\log_clickbank_event' );
function log_clickbank_event( $content ) {
  $uploads_dir  = \wp_get_upload_dir();
  $logs_dir = $uploads_dir['basedir'] . '/mos_logs';
  $log_file = $logs_dir  . '/clickbank_event.log';

  if ( ! is_dir( $logs_dir ) ) {
      mkdir( $logs_dir, 0755, true );
  }

  $file = fopen( $log_file, 'a' );
  fwrite($file, date('Y-m-d H:i') . ": " . json_encode($content) . PHP_EOL);
  fclose($file);
}