<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/**
 * Redirect if user doesn't have access to current page
 * 
 * $rules array can take EITHER usermeta or role to determine access
 * role is written as the slug (not the nicename)
 */
add_action( 'template_redirect', function() {
    $rules = [
        [
            'tag' => 'oto1-membership',
            'no_access_url' => '/oto1-noaccess',
            'usermeta' => 'mos_purchased_oto1',
        ],
        [
            'tag' => 'oto2-membership',
            'no_access_url' => '/oto2-noaccess',
            'usermeta' => 'mos_purchased_oto2',
        ],
        [
            'tag' => 'oto3-membership',
            'no_access_url' => '/oto3-noaccess',
            'usermeta' => 'mos_purchased_oto3',
        ],
    ];

    foreach ( $rules as $rule ) {
        if ( !has_tag( $rule['tag'] ) ) continue;

        $user_id = get_current_user_id();
        
        // Check if user has access
        if ( empty( $user_id ) ) {
            $has_access = false;
        } elseif ( $rule['usermeta'] ) {
            $has_access = get_user_meta( get_current_user_id(), $rule['usermeta'], true ) == 1;
        } elseif ( $rule['role'] ) {
            $has_access = wp_get_current_user()->roles[0] == $rule['role'];
        } else {
            $has_access = false;
        }

        // If not, redirect to the no-access page
        if ( !$has_access ) {
            wp_redirect( home_url( $rule['no_access_url'] ) );
            exit;
        }

        break;
    }
});

/**
 * Test Ironikus custom action webhook
 */
add_filter( 'wpwhpro/run/actions/custom_action/return_args', 'App\mos_handle_clickbank_event', 1, 3 );
function mos_handle_clickbank_event( $response, $identifier, $payload ) {
    $start_time = microtime( true );

    if ( $identifier != 'clickbank_event' ) return $response;

    $secret_key = "ANTOLAMAS61952";
    $encrypted = \WPWHPRO()->helpers->validate_request_value( $payload['content'], 'notification' );
    $iv = \WPWHPRO()->helpers->validate_request_value( $payload['content'], 'iv' );
    $decrypted = trim(
        openssl_decrypt(base64_decode($encrypted),
        'AES-256-CBC',
        substr(sha1($secret_key), 0, 32),
        OPENSSL_RAW_DATA,
        base64_decode($iv)), "\0..\32");
    $content = json_decode( $decrypted );

    $response['content'] = $content;

    do_action( 'clickbank_event', $content );

    $response['time'] = microtime( true ) - $start_time;
    
    return $response;
}

add_action_async( 'clickbank_event', 'App\log_clickbank_event' );

function log_clickbank_event( $content ) {
    $uploads_dir  = \wp_get_upload_dir();
    $log_file = $uploads_dir['basedir'] . '/mos_logs/clickbank_event.log';

    $file = fopen( $log_file, 'a' );
    fwrite($file, date('Y-m-d H:i') . ": " . json_encode($content) . PHP_EOL);
    fclose($file);
}