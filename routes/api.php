<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\Api\UserController;


Route::apiResource('links', LinkController::class);
Route::apiResource('users', UserController::class);

