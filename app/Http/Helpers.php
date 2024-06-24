<?php

use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('businessSetting')) {
    function businessSetting($id = 1)
    {
        return Cache::remember('business-setting', 86400, function () use ($id) {
            return BusinessSetting::find($id);
        });
    }
}

if (!function_exists('format_price')) {
    function format_price($amount = 0.00)
    {
        return '₹' . number_format($amount, 2);
    }
}