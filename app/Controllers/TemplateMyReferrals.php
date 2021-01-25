<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateMyReferrals extends Controller
{
    public function referrals() {
        return apply_filters( 'mos_referrals', [] );
    }
}
