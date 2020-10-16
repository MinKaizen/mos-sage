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