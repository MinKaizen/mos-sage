<?php declare(strict_types=1);

namespace App\Handler;

use function \App\validate_mis_value;
use function \home_url;
use function \wp_verify_nonce;
use function \update_user_meta;
use function \add_query_arg;
use function \wp_redirect;
use function \sanitize_text_field;

function update_user_mis() {
    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : home_url(' /404 ');
    $value = isset($_POST['value']) ? $_POST['value'] : '';
    $user_id = isset($_POST['user_id']) ? (int) $_POST['user_id'] : 0;
    $meta_key = isset($_POST['meta_key']) ? $_POST['meta_key'] : '';
    $slug = isset( $_POST['slug'] ) ? $_POST['slug'] : '';

    $valid_request = isset( $_POST['_wpnonce'] ) &&
                     $slug &&
                     wp_verify_nonce( $_POST['_wpnonce'], "save_mis_$slug" );

    if ( !$valid_request ) {
        $query_args = [
            'error' => 1,
            'message' => 'Tried to update MIS without a valid slug or nonce',
        ];
        $redirect = add_query_arg( $query_args, $redirect );
    } elseif ( !validate_mis_value( $value ) ) {
        $query_args = [
            "error_$slug" => 1,
            "message_$slug" => 'Affiliate IDs can only contain alphanumerical characters, hyphens (-) and underscores (_).',
        ];
        $redirect = add_query_arg( $query_args, $redirect );
    } else {
        update_user_meta( $user_id, $meta_key, sanitize_text_field( $value ) );
        $redirect = add_query_arg( "mis_saved_$slug", 1, $redirect );
    }

    wp_redirect( $redirect );
    exit;
}
