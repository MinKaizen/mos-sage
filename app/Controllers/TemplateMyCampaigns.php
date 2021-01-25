<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateMyCampaigns extends Controller
{
    public function campaigns() {
        return apply_filters( 'mos_campaigns', [] );
    }
}
