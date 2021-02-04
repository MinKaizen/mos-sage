<?php declare(strict_types=1);

namespace App;

use \MOS\Affiliate\MIS;

use function \App\get_mis;

// Shortcode for mis form
add_shortcode( 'mos_mis_form', function( $atts ) {
    if ( !isset( $atts['network'] ) ) {
        return '[no network specified]';
    }

    $mis = new MIS( $atts['network'] );

    if ( !$mis->exists ) {
        return "[no MIS with slug $atts[network]]";
    }

    $current_value = get_mis( $atts['network'] );

    $vars = [
        'mis' => $mis,
        'current_value' => $current_value,
    ];

    return template('partials.mf-MisForm', $vars);
} );
