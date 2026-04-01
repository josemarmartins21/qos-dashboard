<?php


namespace App\Helpers;
use Carbon\Carbon;

class DateHelper {
    public function __construct()
    {
        Carbon::setLocale('pt_BR');
    }

    public static function diffForHumans(string $date)
    {
        $date = Carbon::parse($date);

        return $date->diffForHumans();
    }
}