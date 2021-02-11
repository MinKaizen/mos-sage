<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Searches recursively for a key in an array and returns the value
 * --- Will not never return an array (e.g. if given key holds an array)
 *
 * @param $needle                   Either an array key (string) or index (int)
 * @param array $haystack           Key/index to search for
 * @param integer $max_recursions   Maximum number of recursions
 * @return void                     The value at matched key or false if none found
 */
function array_find_recursive( $needle, array $haystack, int $max_recursions=64 )
{
    if ($max_recursions == 0) {
        return false;
    }

    foreach ( $haystack as $key => $value ) {
        if ( is_array( $value ) ) {
            $sub_value = array_find_recursive( $needle, $value, $max_recursions-1 );
            if ($sub_value) return $sub_value;
        } elseif ( $key == $needle ) {
            return $value;
        }
    }

    return false;
}

function mos_debug( callable $function, ...$args ) {
    $start_time = microtime( true );
    $value_to_return = call_user_func_array( $function, $args );
    $process_time = microtime( true ) - $start_time;

    $uploads_dir  = \wp_get_upload_dir();
    $logs_dir = $uploads_dir['basedir'] . '/mos-logs';
    $log_file = $logs_dir . '/timing.log';

    if ( ! is_dir( $logs_dir ) ) {
        mkdir( $logs_dir, 0755, true );
    }

    if ( $function instanceof \Closure ) {
        $function_name = "[Anonymous Function]";
    } else {
        $function_name = (string) $function;
    }

    $file = fopen( $log_file, 'a' );
    fwrite($file, "====================================" . PHP_EOL);
    fwrite($file, date('Y-m-d H:i') . ": " . $function_name . PHP_EOL);
    fwrite($file, "------------------------------------" . PHP_EOL);
    fwrite($file, "Time elapsed (seconds): $process_time" . PHP_EOL);
    fwrite($file, print_r( $value_to_return, true ) . PHP_EOL);
    fwrite($file, "------------------------------------" . PHP_EOL);
    fwrite($file, PHP_EOL);
    fclose($file);

    return $value_to_return;
}

function level_class(): string {
    $level_slug = apply_filters( 'mos_user_level_slug', '' );

    if ( !$level_slug ) {
        return '';
    }

    $convert_underscores = str_replace( '_', '-', $level_slug );
    $class_name = implode( '-', ['lvl', $convert_underscores] );
    return $class_name;
}

function next_level_class(): string {
    $level_slug = apply_filters( 'mos_user_next_level_slug', '' );

    if ( !$level_slug ) {
        return '';
    }
    $convert_underscores = str_replace( '_', '-', $level_slug );
    $class_name = implode( '-', ['next-lvl', $convert_underscores] );
    return $class_name;
}

function is_ld_course(): bool {
    return \get_post_type() === 'sfwd-courses';
}

function is_ld_module(): bool {
    return \get_post_type() === 'sfwd-lessons';
}

function redirect_course( int $course_id ): void {
    $first_module_id = ld_first_child_id( $course_id );
    $first_lesson_id = ld_first_child_id( $first_module_id );
    \wp_redirect( \get_permalink( $first_lesson_id ), 301, 'mos-sage' );
    exit;
}

function redirect_module( int $module_id ): void {
    $first_lesson_id = ld_first_child_id( $module_id );
    \wp_redirect( \get_permalink( $first_lesson_id ), 301, 'mos-sage' );
    exit;
}

function ld_first_child_id( int $post_id ): int {
    $post_type = \get_post_type( $post_id );
    if ( $post_type == 'sfwd-courses' ) {
        $child_post_type = 'sfwd-lessons';
        $post_type_meta = 'course_id';
    } elseif ( $post_type == 'sfwd-lessons' ) {
        $child_post_type = 'sfwd-topic';
        $post_type_meta = 'lesson_id';
    } else {
        return $post_id; // Not applicable
    }

    $args = [
        'post_type' => $child_post_type,
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key' => $post_type_meta,
                'value' => $post_id,
            ],
        ],
    ];

    $posts_query = new \WP_Query( $args );
    $posts = $posts_query->posts;

    if ( isset( $posts[0] ) && ($posts[0] instanceof \WP_Post) ) {
        $post_id = $posts[0]->ID;
    } else {
        $post_id = 0;
    }

    return $post_id;
}

function format_currency( float $number, int $decimals=2 ): string {
    $sign = $number >= 0 ? '' : '-';
    $symbol = '$';
    $currency = $sign . $symbol . number_format( abs( $number ), $decimals );
    return $currency;
}

function video_embed_url( string $url, bool $fallback_original=true ): string {
    $options_map = [
        'vimeo.com' => [
            'regex' => '/vimeo.com\/(?:manage\/|video\/)?([0-9]+)/i',
            'template' => 'https://player.vimeo.com/video/%video_id%',
        ],
        'youtube.com' => [
            'regex' => '/(?:youtu\.be|youtube\.com)\/(?:embed\/|watch\?v=)?([a-zA-Z0-9-_]+)/i',
            'template' => 'https://www.youtube.com/embed/%video_id%',
        ],
        'youtu.be' => [
            'regex' => '/(?:youtu\.be|youtube\.com)\/(?:embed\/|watch\?v=)?([a-zA-Z0-9-_]+)/i',
            'template' => 'https://www.youtube.com/embed/%video_id%',
        ],
        'wave.video' => [
            'regex' => '/(?:wave\.|watch\.|embed\.)?wave\.video\/(?:video\/)?([a-zA-Z0-9_-]+)/i',
            'template' => 'https://embed.wave.video/%video_id%',
        ],
    ];

    $options = [];

    foreach ( $options_map as $needle => $o ) {
        if ( strpos( $url, $needle ) !== false ) {
            $options = $o;
            break;
        }
    }

    $fallback = $fallback_original ? $url : '';

    if ( empty( $options ) ) {
        return $fallback;
    }

    preg_match( $options['regex'], $url, $matches );
    $video_id = isset( $matches[1] ) ? $matches[1] : '';
    $embed_url = str_replace( '%video_id%', $video_id, $options['template'] );
    return $embed_url;
}

function course_progress( int $course_id, int $user_id=0 ): array {
    // Default values
    $course_progress = [
        'completed' => 0,
        'total' => 0,
        'percentage' => 0.0,
        'percentage_str' => '0%',
        'formatted' => '-',
    ];

    if ( !$user_id ) {
        // User id not specified. Use current user ID
        $user_id = get_current_user_id();
    }

    if ( !$user_id ) {
        // User is not logged in. Return early
        return $course_progress;
    }

    $course_progress_meta = \get_user_meta( $user_id, '_sfwd-course_progress', true );

    if ( !empty( $course_progress_meta[$course_id]['completed'] ) ) {
        $course_progress['completed'] = (int) $course_progress_meta[$course_id]['completed'];
    }

    if ( !empty( $course_progress_meta[$course_id]['total'] ) ) {
        $course_progress['total'] = (int) $course_progress_meta[$course_id]['total'];
    }

    if ( $course_progress['total'] != 0 ) {
        $course_progress['formatted'] = "$course_progress[completed]/$course_progress[total]";
        $course_progress['percentage'] = $course_progress['completed']/$course_progress['total'];
        $course_progress['percentage_str'] = (string) ceil( $course_progress['percentage'] * 100 ) . '%';
    }

    return $course_progress;
}

function free_course_progress( int $user_id=0 ): array {
    if ( function_exists( 'get_field' ) ) {
        $free_course_id = (int) get_field( 'free_course_id', 'options' );
    } else {
        $free_course_id = 0;
    }

    $free_course_progress = course_progress( $free_course_id, $user_id );
    return $free_course_progress;
}

function get_mis( string $slug, int $user_id=0 ): string {
    $fallback = '';

    if ( !$user_id ) {
        // User id not specified. Use current user ID
        $user_id = get_current_user_id();
    }

    if ( !$user_id ) {
        // User is not logged in. Return early
        return $fallback;
    }

    if ( function_exists( 'get_field' ) ) {
        $mis_metakey_prefix = get_field( 'mis_metakey_prefix', 'option' );
    } else {
        $mis_metakey_prefix = '';
    }

    $mis_metakey_prefix = $mis_metakey_prefix ? $mis_metakey_prefix : 'mos_mis_';
    $mis_metakey = $mis_metakey_prefix . $slug;
    $mis_value = (string) get_user_meta( $user_id, $mis_metakey, true );
    return $mis_value;
}

function validate_mis_value( string $value ): bool {
    $valid_regex = '/^[a-zA-Z0-9-_]+$/';
    $is_valid = (bool) preg_match( $valid_regex, $value );
    return $is_valid;
}
