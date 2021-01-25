<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateMyCommissions extends Controller
{
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
