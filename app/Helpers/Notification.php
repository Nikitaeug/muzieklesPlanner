<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class Notification
{
    public static function success($message)
    {
        Session::flash('success', $message);
    }

    public static function error($message)
    {
        Session::flash('error', $message);
    }
}
