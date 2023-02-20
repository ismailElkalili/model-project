<?php
namespace App\Http\Controllers\methoeds;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class IsExpiredTime extends Controller
{
    public static function isExpiredTime($startTime, $durationTime)
    {
        $now = Carbon::now()->addMinutes(120);
        $startDate = Carbon::parse($startTime);
        $endDate = Carbon::parse($startTime)->addMinutes($durationTime);
        if ($now->between($startDate, $endDate)) {
            return false;
        } else {
            return true;
        }

    }
}
