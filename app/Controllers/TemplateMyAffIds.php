<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use MOS\Affiliate\User;

class TemplateMyAffIds extends Controller {

    public function userMis() {
        $all_mis = apply_filters( 'mos_all_mis', ['Nothing yet'] );
        $user_mis = [];
        $user = User::current();

        if ( empty( $all_mis ) ) {
            return [];
        }

        foreach ( $all_mis as $mis ) {
            if ( $user->qualifies_for_mis( $mis->slug ) ) {
                $user_mis[$mis->slug] = [
                    'name' => $mis->name,
                    'course_link' => $mis->course_link,
                    'value' => $user->get_mis( $mis->slug ),
                ];
            }
        }

        return $user_mis;
    }

}
