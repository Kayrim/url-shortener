<?php

use App\Http\Controllers\RedirectController;
use App\Livewire\Urlshort;
use Illuminate\Support\Facades\Route;

Route::get('/', Urlshort::class)->name('urlshort');

Route::get('{shortCode}', [RedirectController::class, 'redirect'])->name('redirect.short');

