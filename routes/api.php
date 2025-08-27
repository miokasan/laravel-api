<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

// API Routes
Route::post('users/login', [UserController::class, 'login']);
Route::apiResource('users', UserController::class); 