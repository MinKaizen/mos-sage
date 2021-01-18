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
}



/**
 * Register custom sidebars
 */
add_action( 'widgets_init', __NAMESPACE__ . '\register_sidebars' );
function register_sidebars() {
    register_sidebar(
        [
            'id'            => 'monthly_partner_sidebar',
            'name'          => __( 'Monthly Partner Sidebar' ),
            'description'   => __( 'MOS related banners for Monthly Partners' ),
            'before_widget' => '<div class="msb-MosSidebar_Banner">',
            'after_widget'  => '</div>',
            'before_title'  => '<title class="msb-MosSidebar_Title">',
            'after_title'   => '</title>',
        ]
    );
    register_sidebar(
        [
            'id'            => 'yearly_partner_sidebar',
            'name'          => __( 'Yearly Partner Sidebar' ),
            'description'   => __( 'MOS related banners for Yearly Partners' ),
            'before_widget' => '<div class="msb-MosSidebar_Banner">',
            'after_widget'  => '</div>',
            'before_title'  => '<title class="msb-MosSidebar_Title">',
            'after_title'   => '</title>',
        ]
    );
    register_sidebar(
        [
            'id'            => 'lifetime_partner_sidebar',
            'name'          => __( 'Lifetime Partner Sidebar' ),
            'description'   => __( 'MOS related banners for Lifetime Partners' ),
            'before_widget' => '<div class="msb-MosSidebar_Banner">',
            'after_widget'  => '</div>',
            'before_title'  => '<title class="msb-MosSidebar_Title">',
            'after_title'   => '</title>',
        ]
    );
    register_sidebar(
        [
            'id'            => 'coaching_sidebar',
            'name'          => __( 'Coaching Sidebar' ),
            'description'   => __( 'MOS related banners for Coaching Members' ),
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
