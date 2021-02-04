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

    $blocks['ac-Accordion'] = [
        'name' => 'accordion',
        'title' => 'Accordion',
        'description' => 'MOS Accordion',
        'category' => ['accordion', 'mos'],
        'mode' => 'auto',
        'render_callback' => function() {
            $args['list'] = get_field('list');
            echo template('blocks.ac-Accordion', $args);
        },
    ];

    $blocks['vid-Video'] = [
        'name' => 'video',
        'title' => 'Video',
        'description' => 'Responsive Video',
        'category' => ['video', 'mos', 'responsive'],
        'mode' => 'edit',
        'render_callback' => function() {
            $args['url'] = get_field('url');
            echo template('blocks.vid-Video', $args);
        },
    ];

    foreach ( $blocks as $block ) {
        acf_register_block_type( $block );
    }
});

// Handle mis forms
add_action( 'admin_post_nopriv_update_user_mis', '\App\Handler\update_user_mis' );
add_action( 'admin_post_update_user_mis', '\App\Handler\update_user_mis' );

// Load Acf
add_action( 'init', function() {
    if ( !function_exists( 'acf_add_local_field_group' ) ) {
      return;
    }

    $acf_data = json_decode( file_get_contents( __DIR__ . '/acf.json' ), true );

    foreach ( $acf_data as $field_group ) {
        acf_add_local_field_group( $field_group );
    }
} );
