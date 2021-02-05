<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateMyAffIds extends Controller {

    public function userMis() {
        $all_mis = apply_filters( 'mos_all_mis', ['Nothing yet'] );
        $user_mis = [];

        if ( empty( $all_mis ) ) {
            return [];
        }

        foreach ( $all_mis as $mis ) {
            $qualifies_for_mis = apply_filters( 'mos_qualifies_for_mis', false, $mis->slug );
            if ( $qualifies_for_mis ) {
                $user_mis[$mis->slug] = [
                    'name' => $mis->name,
                    'course_link' => $mis->course_link,
                    'value' => do_shortcode("[mos_mis network=$mis->slug]"),
                ];
            }
        }

        return $user_mis;
    }

}
