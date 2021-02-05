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

    $current_value = do_shortcode( "[mos_mis network='$atts[network]']" );

    $vars = [
        'mis' => $mis,
        'current_value' => $current_value,
    ];

    return template('partials.mf-MisForm', $vars);
} );
