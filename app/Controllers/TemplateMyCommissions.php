<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateMyCommissions extends Controller
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
        return [
            [
                'amount' => '$99',
                'campaign' => 'undefined',
                'date' => 'undefined',
                'description' => 'undefined',
                'display_name' => 'undefined',
                'payout_address' => 'undefined',
                'payout_date' => 'undefined',
                'payout_method' => 'undefined',
                'payout_transaction_id' => 'undefined',
                'user_email' => 'undefined',
            ],
        ];
        return apply_filters( 'mos_commissions', [] );
    }
}
