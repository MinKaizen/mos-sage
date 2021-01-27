<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateMyEarnings extends Controller
{
    public function totalCommissions() {
        return apply_filters( 'mos_total_commissions', '' );
    }

    public function totalReferrals() {
        return apply_filters( 'mos_total_referrals', '' );
    }

    public function totalEpr() {
        return apply_filters( 'mos_total_epr', '' );
    }

    public function commissions() {
        return apply_filters( 'mos_commissions', [] );
    }
}
