<?php

namespace App;

/**
 * Redirect course to first lesson of first module
 */
add_action( 'template_redirect', function() {
  if ( is_ld_course() ) {
    redirect_course( \get_the_ID() );
  } elseif ( is_ld_module() ) {
    redirect_module( \get_the_ID() );
  }
});


/**
 * Register custom menu locations
 */
add_action( 'init', __NAMESPACE__ . '\register_menus' );
function register_menus() {
    register_nav_menus([
        'logged_out' => __( 'Logged Out Primary Naviation' ),
    ]);
    register_nav_menus([
        'footer' => __( 'Footer' ),
    ]);
}
