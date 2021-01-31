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

// Remove wrappers around Wordpress User Avatar
remove_action('wpua_before_avatar', 'wpua_do_before_avatar');
remove_action('wpua_after_avatar', 'wpua_do_after_avatar');

// Create ACF Options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'MOS Settings',
		'menu_title'	=> 'MOS Settings',
		'menu_slug' 	=> 'mos-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

}
