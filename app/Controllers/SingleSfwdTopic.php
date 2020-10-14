<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleSfwdTopic extends Controller
{

  public function markComplete()
  {
    $options = [
      'button' => [
        'class' => 'mos-mark-complete-button'
      ]
    ];
    $mark_complete_button = learndash_mark_complete(get_post(), $options);
    return $mark_complete_button;
  }


  public function navItems() {
    $course_id = $this->course_id();
    $modules = $this->get_modules( $course_id );

    foreach ( $modules as &$module ) {
      $module['lessons'] = $this->get_lessons( $module['ID'] );
    }

    return $modules;
  }


  /**
   * Get a list of lessons associated with a module
   *
   * @param integer $module_id    WP Post ID of module
   * @param string $return_type   Either "OBJECT" or "ID"
   * @return array WP_Post        Array of WP Posts
   */
  private function get_lessons( int $module_id ) {
    global $wpdb;

    $t_postmeta = $wpdb->prefix . "postmeta";
    $t_postmeta_alias = "postmeta";
    $t_posts = $wpdb->prefix . "posts";

    // Prepare query
    $select = "SELECT $t_posts.ID, $t_posts.post_title, $t_posts.menu_order, $t_postmeta_alias.meta_value";
    $from = "FROM $t_posts";
    $join = "LEFT JOIN (SELECT post_id, meta_value FROM $t_postmeta WHERE meta_key = 'lesson_id') as $t_postmeta_alias";
    $on = "ON $t_posts.ID = $t_postmeta_alias.post_id";
    $where = "WHERE $t_postmeta_alias.meta_value = $module_id";
    $order = "ORDER BY $t_posts.menu_order ASC";
    $query = "$select $from $join $on $where $order";

    // Execute query
    $lessons = $wpdb->get_results( $query, ARRAY_A );
    if ( empty( $lessons ) ) {
      return false;
    }

    // Append links
    foreach( $lessons as &$lesson ) {
      $lesson['link'] = get_permalink($lesson['ID']);
    }

    return $lessons;
  }


  /**
   * Get a list of modules associated with a course
   *
   * @param integer $course_id    WP Post ID of course
   * @param string $return_type   Either "OBJECT" or "ID"
   * @return array WP_Post        Array of WP Posts
   */
  private function get_modules( int $course_id ) {
    global $wpdb;

    $t_postmeta = $wpdb->prefix . "postmeta";
    $t_postmeta_alias = "postmeta";
    $t_posts = $wpdb->prefix . "posts";

    // Prepare query
    $select = "SELECT $t_posts.ID, $t_posts.post_title, $t_posts.menu_order, $t_posts.post_type, $t_postmeta_alias.meta_value";
    $from = "FROM $t_posts";
    $join = "LEFT JOIN (SELECT post_id, meta_value FROM $t_postmeta WHERE meta_key = 'course_id') as $t_postmeta_alias";
    $on = "ON $t_posts.ID = $t_postmeta_alias.post_id";
    $where = "WHERE $t_postmeta_alias.meta_value = $course_id AND $t_posts.post_type = 'sfwd-lessons'";
    $order = "ORDER BY $t_posts.menu_order ASC";
    $query = "$select $from $join $on $where $order";

    // Execute query
    $modules = $wpdb->get_results( $query, ARRAY_A );
    if ( empty( $modules ) ) {
      return false;
    }

    // Append links
    foreach( $modules as &$module ) {
      $module['link'] = get_permalink($module['ID']);
    }

    return $modules;
  }


  private function course_id() {
    $post = get_post();
    $course_id = get_post_meta( $post->ID, 'course_id', true );
    return $course_id;
  }

}
