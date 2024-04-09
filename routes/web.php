<?php

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('{shortCode}', [RedirectController::class, 'redirect'])->name('redirect.short');

