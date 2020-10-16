<?php

namespace App\Learndash;

/**
 * Whether or not the current post is complete by current user
 * @return bool
 * If page is not a learndash-related page, returns false
 * If user is not logged in, returns flase
 */
function is_complete()
{
    $user_id = get_current_user_id();
    if ( empty( $user_id ) ) {
        return false;
    }

    $post = get_post();
    if ( !in_array( $post->post_type, ['sfwd-lessons', 'sfwd-topic'] )) {
        return false;
    }

    $progress = get_user_meta($user_id, '_sfwd-course_progress', true);
    if ( empty( $progress ) ) {
        return false;
    }

    return (bool) \App\array_find_recursive( $post->ID, $progress );
}


function modules_query( int $course_id=0 )
{
    // If course ID not provided, get the course ID of the current post
    $course_id = $course_id ? $course_id : get_post_meta(get_the_ID(), 'course_id', true);

    $args = [
      'post_type' => 'sfwd-lessons',
      'meta_key' => 'course_id',
      'meta_value' => $course_id,
      'meta_compare' => '=',
      'orderby' => 'menu_order',
      'order' => 'ASC',
    ];
    $query = new \WP_Query( $args );
    return $query;
}


function lessons_query( int $module_id=0 )
{
    // If no module ID, assume function is being called from a module
    $module_id = $module_id ? $module_id : get_the_ID();

    $args = [
        'post_type' => 'sfwd-topic',
        'meta_key' => 'lesson_id',
        'meta_value' => $module_id,
        'meta_compare' => '=',
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ];
    $query = new \WP_Query( $args );
    return $query;
}