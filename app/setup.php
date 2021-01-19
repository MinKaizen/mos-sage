<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    // register_nav_menus([
    //     'primary_navigation' => __('Primary Navigation', 'sage')
    // ]);
    register_nav_menus([
        'top' => __( 'Top (Logged Out)' ),
    ]);
    register_nav_menus([
        'footer' => __( 'Footer' ),
    ]);
    register_nav_menus([
        'top_free' => __( 'Top (Free)' ),
    ]);
    register_nav_menus([
        'top_partner' => __( 'Top (Partner)' ),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    // $config = [
    //     'before_widget' => '<section class="widget %1$s %2$s">',
    //     'after_widget'  => '</section>',
    //     'before_title'  => '<h3>',
    //     'after_title'   => '</h3>'
    // ];
    // register_sidebar([
    //     'name'          => __('Primary', 'sage'),
    //     'id'            => 'sidebar-primary'
    // ] + $config);
    // register_sidebar([
    //     'name'          => __('Footer', 'sage'),
    //     'id'            => 'sidebar-footer'
    // ] + $config);
    register_sidebar([
        'id'            => 'monthly_partner_sidebar',
        'name'          => __( 'Monthly Partner Sidebar' ),
        'description'   => __( 'MOS related banners for Monthly Partners' ),
        'before_widget' => '<section class="msb-MosSidebar_Banner">',
        'after_widget'  => '</section>',
        'before_title'  => '<title class="msb-MosSidebar_Title">',
        'after_title'   => '</title>',
    ]);
    register_sidebar([
        'id'            => 'yearly_partner_sidebar',
        'name'          => __( 'Yearly Partner Sidebar' ),
        'description'   => __( 'MOS related banners for Yearly Partners' ),
        'before_widget' => '<section class="msb-MosSidebar_Banner">',
        'after_widget'  => '</section>',
        'before_title'  => '<title class="msb-MosSidebar_Title">',
        'after_title'   => '</title>',
    ]);
    register_sidebar([
        'id'            => 'lifetime_partner_sidebar',
        'name'          => __( 'Lifetime Partner Sidebar' ),
        'description'   => __( 'MOS related banners for Lifetime Partners' ),
        'before_widget' => '<section class="msb-MosSidebar_Banner">',
        'after_widget'  => '</section>',
        'before_title'  => '<title class="msb-MosSidebar_Title">',
        'after_title'   => '</title>',
    ]);
    register_sidebar([
        'id'            => 'coaching_sidebar',
        'name'          => __( 'Coaching Sidebar' ),
        'description'   => __( 'MOS related banners for Coaching Members' ),
        'before_widget' => '<section class="msb-MosSidebar_Banner">',
        'after_widget'  => '</section>',
        'before_title'  => '<title class="msb-MosSidebar_Title">',
        'after_title'   => '</title>',
    ]);
    register_sidebar([
        'id'            => 'affiliate_sidebar',
        'name'          => __( 'Affiliate Sidebar' ),
        'description'   => __( 'A bunch of 3rd party affiliate banners.' ),
        'before_widget' => '<div class="asb-AffSidebar_Banner">',
        'after_widget'  => '</div>',
        'before_title'  => '<title class="asb-AffSidebar_Title">',
        'after_title'   => '</title>',
    ]);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});
