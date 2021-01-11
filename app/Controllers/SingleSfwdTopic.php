<?php declare(strict_types=1);

namespace App\Controllers;

use Sober\Controller\Controller;
use MOS\Affiliate\User;

class SingleSfwdTopic extends Controller
{

  protected $acf = true;


  public static function is_module_complete( int $module_id ): bool {
    $is_complete = true;
    $lessons = self::get_lessons( $module_id );

    foreach ( $lessons as $lesson ) {
        if ( !self::is_complete( $lesson->ID ) ) {
            $is_complete = false;
            return $is_complete;
        }
    }

    return $is_complete;
  }


  public static function is_complete( int $lesson_id ): bool {
    $user_id = \get_current_user_id();
    $meta_key = '_sfwd-course_progress';
    $progress = get_user_meta( $user_id, $meta_key, true );

    if ( empty( $progress ) ) {
        return false;
    }

    $is_complete = (bool) \App\array_find_recursive( $lesson_id, $progress );
    return $is_complete;
  }


  public function courseProgress(): array {
    $user = User::current();
    $course_id = $this->courseId();
    $progress = $user->get_course_progress( $course_id );
    return $progress;
  }


  public function isComplete(): bool {
    return self::is_complete( \get_the_ID() );
  }


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


  public function courseStructure(): array {
    $course_id = $this->courseId();
    // $cache_key = "mos_ld_course_structure_$course_id";
    // $cached_value = \get_transient( $cache_key );

    // if ( $cached_value !== false ) {
    //   return $cached_value;
    // }

    $modules = self::get_modules( $course_id );
    foreach ( $modules as &$module ) {
      $module->lessons = self::get_lessons( $module->ID );
    }

    // $cache_expiration = \WEEK_IN_SECONDS;
    // \set_transient( $cache_key, $modules, $cache_expiration );

    return $modules;
  }


  public function previousLink(): string {
    $link = '';
    $lessons = self::flatten_structure( $this->courseStructure() );

    foreach ( $lessons as $index => $lesson ) {
      if ( $lesson->ID == \get_the_ID() ) {
        if ( isset( $lessons[$index - 1] ) ) {
          $link = $lessons[$index - 1]->link;
        }
        break;
      }
    }

    return $link;
  }


  public function nextLink(): string {
    $link = '';
    $lessons = self::flatten_structure( $this->courseStructure() );

    foreach ( $lessons as $index => $lesson ) {
      if ( $lesson->ID == \get_the_ID() ) {
        if ( isset( $lessons[$index + 1] ) ) {
          $link = $lessons[$index + 1]->link;
        }
        break;
      }
    }

    return $link;
  }


  private static function get_modules( int $course_id ): array {
    $args = [
      'post_type' => 'sfwd-lessons',
      'order' => 'ASC',
      'orderby' => 'menu_order',
      'meta_query' => [
        [
          'key' => 'course_id',
          'value' => $course_id,
        ],
      ],
    ];

    $modules_query = new \WP_Query( $args );
    $modules = $modules_query->posts;

    foreach ( $modules as $module ) {
      $module->link = \get_permalink( $module->ID );
    }

    return $modules;
  }


  private static function get_lessons( int $module_id ): array {
    $args = [
      'post_type' => 'sfwd-topic',
      'order' => 'ASC',
      'orderby' => 'menu_order',
      'meta_query' => [
        [
          'key' => 'lesson_id',
          'value' => $module_id,
        ],
      ],
    ];

    $lessons_query = new \WP_Query( $args );
    $lessons = $lessons_query->posts;

    foreach ( $lessons as $lesson ) {
      $lesson->link = \get_permalink( $lesson->ID );
    }

    return $lessons;
  }


  private static function flatten_structure( array $course_structure ): array {
    $flattened_structure = [];

    foreach ( $course_structure as $module ) {
      foreach ( $module->lessons as $lesson ) {
        $flattened_structure[] = $lesson;
      }
    }

    return $flattened_structure;
  }


}
