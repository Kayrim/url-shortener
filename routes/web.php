<?php

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('{shortCode}', [RedirectController::class, 'redirect'])->name('redirect.short');

Route::get('/short', function () {
    return view('livewire.urlshort');
});

