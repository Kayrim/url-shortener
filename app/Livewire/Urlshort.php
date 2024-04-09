<?php

namespace App\Livewire;

use App\Models\ShortenedUrl;
use Livewire\Component;
use Illuminate\Support\Str;

class Urlshort extends Component
{
    public $url = "";

    public $urls = [];

    protected $rules = [
        "url" => "required|url",
    ];
    public function shortenUrl(): void
    {
        $this->validate();

        // check if the url already exists in the database
        $existingUrl = ShortenedUrl::where([
            ['original_url', $this->url],
            ['session_id', session()->getId()],
        ])->first();
        if ($existingUrl) {
            $existingUrl->touch();
            session()->flash('message', "Shortened URL already exists! $existingUrl->shortcode");
            return;
        }

        $shortened = ShortenedUrl::create(([
            "original_url" => $this->url,
            "shortcode" => $this->generateShortUrl(),
            "session_id" => session()->getId(),
        ]));

        session()->flash('message', "Shortened URL created! $shortened->shortcode");
    }
    public function render()
    {
        $this->urls = ShortenedUrl::where('session_id', session()->getId())->orderByDesc('created_at')->get();
        return view('livewire.urlshort');
    }

    private function generateShortUrl(): string
    {
        $shortCode = Str::random(6);
        $existingUrl = ShortenedUrl::where('shortcode', $shortCode)->first();
        if ($existingUrl) {
            return $this->generateShortCode();
        }
        return $shortCode;
    }
}
