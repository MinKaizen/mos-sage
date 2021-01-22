<?php

declare(strict_types=1);

namespace App\Controllers;

use Sober\Controller\Controller;
use MOS\Affiliate\User;

class SingleSfwdTopic extends Controller
{

    protected $acf = true;


    public function courseProgress(): array
    {
        $user = User::current();
        $course_id = $this->courseId();
        $progress = $user->get_course_progress($course_id);
        return $progress;
    }


    public function courseId(): int
    {
        $post = get_post();
        $course_id = (int) get_post_meta($post->ID, 'course_id', true);
        return $course_id;
    }


    public function moduleId(): int
    {
        $post = get_post();
        $module_id = (int) get_post_meta($post->ID, 'lesson_id', true);
        return $module_id;
    }


    public function lessonId(): int
    {
        return (int) get_the_ID();
    }


    public function courseStructure(): array
    {
        $access_list = User::current()->get_access_list();
        $access_list[] = '';
        $course_id = $this->courseId();
        // $cache_key = "mos_ld_course_structure_$course_id";
        // $cached_value = \get_transient( $cache_key );

        // if ( $cached_value !== false ) {
        //   return $cached_value;
        // }

        $modules = self::get_modules($course_id, $access_list);

        // $cache_expiration = \WEEK_IN_SECONDS;
        // \set_transient( $cache_key, $modules, $cache_expiration );

        return $modules;
    }


    public function previousLink(): string
    {
        $link = '';
        $lessons = self::flatten_structure($this->courseStructure());

        foreach ($lessons as $index => $lesson) {
            if ($lesson->ID == \get_the_ID()) {
                if (isset($lessons[$index - 1])) {
                    $link = $lessons[$index - 1]->link;
                }
                break;
            }
        }

        return $link;
    }


    public function nextLink(): string
    {
        $link = '';
        $lessons = self::flatten_structure($this->courseStructure());

        foreach ($lessons as $index => $lesson) {
            if ($lesson->ID == \get_the_ID()) {
                if (isset($lessons[$index + 1])) {
                    $link = $lessons[$index + 1]->link;
                }
                break;
            }
        }

        return $link;
    }


    private static function is_lesson_complete(int $lesson_id): bool
    {
        $user_id = \get_current_user_id();
        $meta_key = '_sfwd-course_progress';
        $progress = get_user_meta($user_id, $meta_key, true);

        if (empty($progress)) {
            return false;
        }

        $is_complete = (bool) \App\array_find_recursive($lesson_id, $progress);
        return $is_complete;
    }


    private static function get_modules(int $course_id, array $access_list): array
    {
        $args = [
            'post_type' => 'sfwd-lessons',
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => 'course_id',
                    'value' => $course_id,
                ],
                [
                    'relation' => 'OR',
                    [
                        'key' => 'access_level',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key' => 'access_level',
                        'value' => $access_list,
                        'compare' => 'IN',
                    ],
                ],
            ],
        ];

        $modules_query = new \WP_Query($args);
        $modules = $modules_query->posts;

        foreach ($modules as &$module) {
            $module->link = \get_permalink($module->ID);
            $module->lessons = self::get_lessons($module->ID, $access_list);

            // Set $module->is_complete
            $module->is_complete = true;
            foreach ($module->lessons as $lesson) {
                if (!$lesson->is_complete) {
                    $module->is_complete = false;
                    break;
                }
            }
        }

        return $modules;
    }


    private static function get_lessons(int $module_id, array $access_list): array
    {
        $args = [
            'post_type' => 'sfwd-topic',
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => 'lesson_id',
                    'value' => $module_id,
                ],
                [
                    'relation' => 'OR',
                    [
                        'key' => 'access_level',
                        'compare' => 'NOT EXISTS',
                    ],
                    [
                        'key' => 'access_level',
                        'value' => $access_list,
                        'compare' => 'IN',
                    ],
                ],
            ],
        ];

        $lessons_query = new \WP_Query($args);
        $lessons = $lessons_query->posts;

        foreach ($lessons as &$lesson) {
            $lesson->link = \get_permalink($lesson->ID);
            $lesson->is_complete = self::is_lesson_complete($lesson->ID);
        }

        return $lessons;
    }


    private static function flatten_structure(array $course_structure): array
    {
        $flattened_structure = [];

        foreach ($course_structure as $module) {
            foreach ($module->lessons as $lesson) {
                $flattened_structure[] = $lesson;
            }
        }

        return $flattened_structure;
    }


    public function showProgress(): bool {
        $course_id = $this->courseId();
        $show_progress = (bool) get_field( 'show_progress', $course_id );
        return $show_progress;
    }


    public function moduleIndicator(): string {
        $course_id = $this->courseId();
        $module_indicator = (string) get_field( 'module_indicator', $course_id );
        return $module_indicator;
    }


    public function appendComplete(): bool {
        $course_id = $this->courseId();
        $append_complete = (bool) get_field( 'append_complete', $course_id );
        return $append_complete;
    }


    public function islandColor(): string {
        $course_id = $this->courseId();
        $island_color = (string) get_field( 'island_color', $course_id );
        return $island_color;
    }


    public function showAfflink(): bool {
        $course_id = $this->courseId();
        $show_afflink = (bool) get_field( 'show_afflink', $course_id );
        return $show_afflink;
    }

}
