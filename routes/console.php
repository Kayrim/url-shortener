<?php
use App\Models\ShortenedUrl;

Artisan::command('url:clear', function () {
    ShortenedUrl::where('created_at', '<', now()->subHour())->delete();
})->describe('Clear all URLs')->everyMinute();
