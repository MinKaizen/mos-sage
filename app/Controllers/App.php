<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Classes\HeaderMenuWalker;
use App\Classes\MobileNavMenuWalker;
use App\Classes\FooterMenuWalker;

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

    public function levelSlug(): string {
        return apply_filters( 'mos_user_level_slug', '' );
    }

    public function nextLevelSlug(): string {
        return apply_filters( 'mos_user_next_level_slug', '' );
    }

    public function mosSidebar(): string {
        $level = $this->levelSlug();
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

    public function footerMenuWalker() {
        $walker = new FooterMenuWalker();
        return $walker;
    }

    public function topMenuSlug() {
        // Note: check setup.php for menu slugs
        $user_id = \apply_filters( 'mos_current_user_id', get_current_user_id() );

        if ( !$user_id ) {
            $menu_slug = 'top';
        } elseif ( apply_filters( 'mos_has_access', false, 'monthly_partner', $user_id ) ) {
            $menu_slug = 'top_partner';
        } else {
            $menu_slug = 'top_free';
        }

        return $menu_slug;
    }

    public function afflink() {
        return apply_filters( 'mos_afflink', '' );
    }

    public function sponsor() {
        $sponsor = apply_filters( 'get_sponsor', null );
        return $sponsor;
    }

    public function mosIsLaunched(): bool {
        $fallback = false;
        if ( !function_exists( 'get_field' ) ) {
            return $fallback;
        }
        $launched = get_field( 'mos_is_launched', 'options' );
        if ( empty( $launched ) ) {
            return $fallback;
        }
        return (bool) $launched;
    }
}
