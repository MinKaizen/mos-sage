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

  /**
   * Get a list of lessons associated with a module
   *
   * @param integer $module_id    WP Post ID of module
   * @param string $return_type   Either "OBJECT" or "ID"
   * @return array WP_Post        Array of WP Posts
   */
  private function get_lessons( int $module_id, string $return_type="ID" ) {
    global $wpdb;

    $table = $wpdb->prefix . "postmeta";
    $query = "SELECT post_id FROM $table WHERE meta_key = 'lesson_id' AND meta_value = $module_id";
    $result = $wpdb->get_col( $query );

    if ( empty( $result ) ) {
      return false;
    }

    if ( $return_type === "OBJECT" ) {
      $result = array_map( function( $id ) {
        return get_post( (int) $id );
      }, $result );
    }

    return $result;
  }
}
