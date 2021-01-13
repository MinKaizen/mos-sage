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
 * Register custom sidebars
 */
add_action( 'widgets_init', __NAMESPACE__ . '\register_sidebars' );
function register_sidebars() {
    register_sidebar(
        [
            'id'            => 'mos_sidebar',
            'name'          => __( 'MOS Sidebar' ),
            'description'   => __( 'Shows an Upgrade banner and other MOS related banners depending on user level.' ),
            'before_widget' => '<div class="msb-MosSidebar_Banner">',
            'after_widget'  => '</div>',
            'before_title'  => '<title class="msb-MosSidebar_Title">',
            'after_title'   => '</title>',
        ]
    );
    register_sidebar(
        [
            'id'            => 'affiliate_sidebar',
            'name'          => __( 'Affiliate Sidebar' ),
            'description'   => __( 'A bunch of 3rd party affiliate banners.' ),
            'before_widget' => '<div class="asb-AffSidebar_Banner">',
            'after_widget'  => '</div>',
            'before_title'  => '<title class="asb-AffSidebar_Title">',
            'after_title'   => '</title>',
        ]
    );
}
