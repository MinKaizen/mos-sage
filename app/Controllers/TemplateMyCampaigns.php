<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateMyCampaigns extends Controller
{
    public function campaigns() {
        return apply_filters( 'mos_campaigns', [] );
    }

    public function showLifetime(): bool {
        $has_access_yearly = apply_filters( 'mos_has_access', false, 'yearly_partner', \apply_filters( 'mos_current_user_id', get_current_user_id() ) );
        return $has_access_yearly;
    }

    public function showCoaching(): bool {
        $has_access_lifetime = apply_filters( 'mos_has_access', false, 'lifetime_partner', \apply_filters( 'mos_current_user_id', get_current_user_id() ) );
        return $has_access_lifetime;
    }

}
