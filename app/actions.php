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

// Add Access Level column when viewing pages
add_filter( 'manage_page_posts_columns', function( $columns ) {
    $columns['Access'] = 'Access';
    return $columns;
} );
add_action( 'manage_page_posts_custom_column', function( $column, $post_id ) {
    if ( $column === 'Access' && function_exists( 'get_field' ) ) {
        $access_level = get_field( 'access_level', $post_id );
        $access_level = $access_level ? $access_level : '';
        echo $access_level;
    }
}, 10, 2 );

// Resource custom post type
add_action( 'init', function() {
    $file = __DIR__ . '/json/cpt-resource.json';
    if ( file_exists( $file ) ) {
        $args = json_decode( (string) file_get_contents( $file ), true );
        register_post_type( 'resource', $args );
    }
} );

// Resource Category custom taxonomy
add_action( 'init', function() {
    $file = __DIR__ . '/json/tax-resource_cat.json';
    if ( file_exists( $file ) ) {
        $args = json_decode( (string) file_get_contents( $file ), true );
        register_taxonomy( 'resource_cat', [ "resource" ], $args );
    }
} );

// Resource Tag custom taxonomy
add_action( 'init', function() {
    $file = __DIR__ . '/json/tax-resource_tag.json';
    if ( file_exists( $file ) ) {
        $args = json_decode( (string) file_get_contents( $file ), true );
        register_taxonomy( 'resource_tag', [ "resource" ], $args );
    }
} );
