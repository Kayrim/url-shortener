<?php

Schedule::call(function () {
    DB::table('shortened_urls')->where('created_at', '<', now()->subHour())->delete();
})->hourly();
