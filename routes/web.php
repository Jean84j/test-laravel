<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'index']);

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/generic', function () {
    return view('generic');
});

Route::get('/elements', function () {
    return view('elements');
});

Route::get('/service/{slug}', [ServiceController::class, 'show']);
