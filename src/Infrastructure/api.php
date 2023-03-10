<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function() {
    Route::post("short-urls", \Src\Infrastructure\Controllers\ShortUrlsController::class)
        ->middleware('auth.api')
        ->name('short-urls');
});
