<?php declare(strict_types=1);

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleSfwdTopic extends Controller
{

  protected $acf = true;

  public function courseId(): int {
    $post = get_post();
    $course_id = (int) get_post_meta( $post->ID, 'course_id', true );
    return $course_id;
  }


  public function moduleId(): int {
    $post = get_post();
    $module_id = (int) get_post_meta( $post->ID, 'lesson_id', true );
    return $module_id;
  }


  public function lessonId(): int {
    return (int) get_the_ID();
  }


  public function navItems(): array {
    $course_id = $this->courseId();
    $modules = $this->get_modules( $course_id );

    foreach ( $modules as &$module ) {
      $module['lessons'] = $this->get_lessons( $module['ID'] );
    }

    return $modules;
  }


  public function previousLesson(): array {
    $module_id = $this->moduleId();
    $lessons = $this->get_lessons( $module_id );
    
    foreach ( $lessons as $index => $lesson ) {
      if ( $lesson['ID'] == get_the_ID() ) {
        // If this is the first lesson, do nothing
        if ( $index == 0 ) break;
        return $lessons[$index-1];
      }
    }
    
    // Find previous module
    $modules = $this->get_modules( $this->courseId() );
    foreach ( $modules as $index => $module ) {
      if ( $module['ID'] == $module_id ) {
        // If this is the first module, return empty array
        if ( $index == 0 ) return [];
        $prev_module = $modules[$index-1];
      }
    }

    // Return the last lesson in the previous module
    $prev_module_lessons = $this->get_lessons( (int) $prev_module['ID'] );
    $last_index = count( $prev_module_lessons ) - 1;
    return (array) $prev_module_lessons[$last_index];
  }


  public function nextLesson(): array {
    $module_id = $this->moduleId();
    $lessons = $this->get_lessons( $module_id );
    
    // Loop through current module
    $_return_next_lesson = false;
    foreach ( $lessons as $lesson ) {
      if ( $_return_next_lesson ) {
        return $lesson;
      }

      if ( $lesson['ID'] == get_the_ID() ) {
        $_return_next_lesson = true;
      }
    }
    
    // Find next module
    $modules = $this->get_modules( $this->courseId() );
    $next_module = false;
    $_return_next_module = false;

    foreach ( $modules as $module ) {
      if ( $_return_next_module ) {
        $next_module = $module;
      }

      if ( $module['ID'] == $module_id ) {
        $_return_next_module = true;
      }
    }

    // If a next module was found, return the first lesson in that module
    if ( $next_module ) {
      $next_module_lessons = $this->get_lessons( $next_module['ID'] );
      return $next_module_lessons[0];
    }

    return [];
  }


  /**
   * Get a list of lessons associated with a module
   *
   * @param integer $module_id    WP Post ID of module
   * @param string $return_type   Either "OBJECT" or "ID"
   * @return array WP_Post        Array of WP Posts
   */
  private function get_lessons( int $module_id ): array {
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
      return [];
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
  private function get_modules( int $course_id ): array {
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
      return [];
    }

    // Append links
    foreach( $modules as &$module ) {
      $module['link'] = get_permalink($module['ID']);
    }

    return $modules;
  }

}
