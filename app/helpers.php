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
function array_find_recursive( $needle, array $haystack, $max_recursions=64 )
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

/**
 * Adds an async action to a hook
 */
function add_action_async( $hook, $function, $priority=10, $num_args=1 ) {
    $create_async_hook = function(...$args) use ($hook) {
      wp_schedule_single_event( time(), $hook.'_async', $args );
    };
  
    add_action( $hook.'_async', $function, $priority, $num_args );
    add_action( $hook, $create_async_hook, $priority, $num_args );
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