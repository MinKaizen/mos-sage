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

// Regiser ACF blocks
add_action('acf/init', function() {

    if( !function_exists('acf_register_block_type') ) {
        return;
    }

    $blocks = [];

    $blocks['ti-TextIsland'] = [
        'name' => 'text-island',
        'title' => 'Text Island',
        'description' => 'Island for general content',
        'category' => ['text', 'island', 'content'],
        'mode' => 'preview',
        'supports' => [
            'jsx' => true,
            'mode' => true,
        ],
        'render_callback' => function() {
            echo template('blocks.ti-TextIsland');
        },
    ];

    $blocks['bt-Button'] = [
        'name' => 'button',
        'title' => 'MOS Button',
        'description' => 'MOS Button',
        'category' => ['button', 'mos', 'bt'],
        'mode' => 'auto',
        'render_callback' => function() {
            $args['link'] = get_field('link');
            $args['new_tab'] = get_field('new_tab');
            $args['text'] = get_field('text');
            $args['color'] = get_field('color');
            echo template('blocks.bt-Button', $args);
        },
    ];

    foreach ( $blocks as $block ) {
        acf_register_block_type( $block );
    }
});

