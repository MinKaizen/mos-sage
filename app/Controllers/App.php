<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\HeaderMenuWalker;
use App\Classes\MobileNavMenuWalker;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function mosSidebar(): string {
        $level = apply_filters( 'mos_user_level_slug', '' );
        return $level . '_sidebar';
    }

    public function headerMenuWalker() {
        $walker = new HeaderMenuWalker();
        return $walker;
    }

    public function mobileNavMenuWalker() {
        $walker = new MobileNavMenuWalker();
        return $walker;
    }
}
