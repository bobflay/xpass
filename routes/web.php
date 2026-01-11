<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('events', [EventController::class, 'index']);
// Route::get('events/{id}', [EventController::class, 'show']);

Route::resource('events', EventController::class);