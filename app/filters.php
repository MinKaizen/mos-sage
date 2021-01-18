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
 * Add .lvl and .next-lvl class to body
 */
add_filter( 'body_class', function( $classes ) {
    $level_class = level_class();
    $next_level_class = next_level_class();

    if ( $level_class ) {
        $classes[] = $level_class;
    }

    if ( $next_level_class ) {
        $classes[] = $next_level_class;
    }

    return $classes;
});

/**
 * Add class to submenus
 */
add_filter( 'nav_menu_submenu_css_class', function( $classes, $args, $depth ) {
    // If menu_class is not set, do nothing
    if ( !isset( $args->menu_class ) ) {
        return $classes;
    }

    if ( $args->menu_class == 'hd-Menu' ) {
        $classes[] = 'hd-Submenu';
    } elseif ( $args->menu_class == 'mn-Menu' ) {
        $classes[] = 'mn-Submenu';
    }

    return $classes;
}, 10, 3 );


/**
 * Add class to nav menu items
 */
add_filter( 'nav_menu_css_class', function( $classes, $item, $args, $depth ) {
    // If menu_class is not set, do nothing
    if ( !isset( $args->menu_class ) ) {
        return $classes;
    }

    if ( $args->menu_class == 'hd-Menu' ) {
        if ( $depth === 0 ) {
            $classes[] = 'hd-Menu_Item';
        } else {
            $classes[] = 'hd-Submenu_Item';
        }
    } elseif ( $args->menu_class == 'mn-Menu' ) {
        if ( $depth === 0 ) {
            $classes[] = 'mn-Menu_Item';
        } else {
            $classes[] = 'mn-Submenu_Item';
        }
    }

    return $classes;
}, 10, 4 );
