<?php declare(strict_types=1);

namespace App;

// Shortcode for mis form
add_shortcode( 'mos_mis_form', function( $atts ) {
    if ( !isset( $atts['network'] ) ) {
        return '[no network specified]';
    }

    $mis = apply_filters( 'mos_mis_object', null, $atts['network'] );

    if ( $mis==null || !$mis->exists ) {
        return "[no MIS with slug $atts[network]]";
    }

    $is_error = isset($_GET["error_$mis->slug"]) && $_GET["error_$mis->slug"];
    $error_message = isset( $_GET["message_$mis->slug"] ) ? $_GET["message_$mis->slug"] : '';
    $is_saved = isset($_GET['mis_saved_' . $mis->slug]) && $_GET['mis_saved_' . $mis->slug];
    $current_value = do_shortcode( "[mos_mis network='$atts[network]']" );

    $vars = [
        'mis' => $mis,
        'current_value' => $current_value,
        'is_saved' => $is_saved,
        'is_error' => $is_error,
        'error_message' => $error_message,
    ];

    return template('partials.mf-MisForm', $vars);
} );

// Shortcode for vid-Video
add_shortcode( 'mos_video', function( $atts ) {
    if ( !isset( $atts['url'] ) ) {
        return '{No URL specified for shortcode mos_video}';
    }

    $args = [
        'url' => (string) $atts['url'],
        'spacing' => isset( $atts['spacing'] ) ? (int) $atts['spacing'] : 0,
    ];
    return template( 'blocks.vid-Video', $args );
} );

// Shortcode for mos_button
add_shortcode( 'mos_button', function( $atts ) {
    $args = [
        'link' => isset( $atts['link'] ) ? $atts['link'] : '#',
        'text' => isset( $atts['text'] ) ? $atts['text'] : 'Click Here',
        'new_tab' => isset( $atts['new_tab'] ) ? $atts['new_tab'] == 'true' || $atts['new_tab'] == '1' : false,
        'color' => isset( $atts['color'] ) ? $atts['color'] : 'red',
    ];

    return template( 'blocks.bt-Button', $args );
} );

