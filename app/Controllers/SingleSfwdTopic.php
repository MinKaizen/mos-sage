<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleSfwdTopic extends Controller
{
  function markComplete()
  {
    $options = [
      'button' => [
        'class' => 'mos-mark-complete-button'
      ]
    ];
    $mark_complete_button = learndash_mark_complete(get_post(), $options);
    return $mark_complete_button;
  }
}
