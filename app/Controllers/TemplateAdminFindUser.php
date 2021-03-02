<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use \WP_User;
use function \apply_filters;
use function \get_avatar_url;
use function \home_url;
use function \get_user_by;
use function \add_query_arg;

class TemplateAdminFindUser extends Controller {

    const SEARCH_PARAM = 'username';

    public function searchTerm(): string {
        return !empty( $_GET[self::SEARCH_PARAM] ) ? $_GET[self::SEARCH_PARAM] : '';
    }

    public function userFound(): bool {
        $user = $this->user();
        return !empty( $user->ID );
    }

    public function user(): ?WP_User {
        if ( empty( $_GET[self::SEARCH_PARAM] ) ) {
            return null;
        }

        $user = get_user_by( 'login', $_GET[self::SEARCH_PARAM] );

        if ( $user instanceof WP_User ) {
            return $user;
        } else {
            return null;
        }
    }

    public function userInfo(): array {
        $info = [
            'username' => '-',
            'name' => '-',
            'email' => '-',
            'level' => '-',
            'avatar' => '-',
        ];

        $user = $this->user();

        if ( empty( $user->ID ) ) {
            return $info;
        }

        $id = $user->ID;
        $info = [];
        $info['username'] = $user->user_login;
        $info['name'] = $user->display_name;
        $info['email'] = $user->user_email;
        $info['level'] = apply_filters( 'mos_user_level_slug', 'n/a', $id );
        $info['avatar'] = get_avatar_url( $id );
        return $info;
    }

    public function sponsorInfo(): array {
        $info = [
            'username' => '-',
            'name' => '-',
            'email' => '-',
            'level' => '-',
            'avatar' => '-',
            'link' => '#',
        ];

        $user = $this->user();

        if ( empty( $user->ID ) ) {
            return $info;
        }

        $sponsor = apply_filters( 'mos_get_sponsor', 'n/a', $user->ID );

        if ( empty( $sponsor->ID ) ) {
            return $info;
        }

        $info['username'] = $sponsor->user_login;
        $info['name'] = $sponsor->display_name;
        $info['email'] = $sponsor->user_email;
        $info['level'] = apply_filters( 'mos_user_level_slug', 'n/a', $sponsor->ID );
        $info['avatar'] = get_avatar_url( $sponsor->ID );
        $info['link'] = $this->generate_link( $sponsor->user_login );

        return $info;
    }

    private function generate_link( string $username ): string {
        if ( empty( $_SERVER['REQUEST_URI'] ) ) {
            return '';
        }
        $current_uri = $_SERVER['REQUEST_URI'];
        $current_link = home_url( parse_url( $current_uri, \PHP_URL_PATH ) );
        $params = [self::SEARCH_PARAM => $username];
        $user_link = add_query_arg( $params, $current_link );
        return $user_link;
    }

}
