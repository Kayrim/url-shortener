<?php

namespace App\Http\Controllers;

use App\Models\ShortenedUrl;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect($shortCode)
    {
        $url = ShortenedUrl::where('shortcode', $shortCode)->firstOrFail();

        return redirect($url->original_url);
    }
}
