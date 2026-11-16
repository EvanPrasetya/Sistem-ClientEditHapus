<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

// users
Route::apiResource('/v1/users', UserController::class);
