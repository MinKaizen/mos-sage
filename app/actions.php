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