<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LinkController;


Route::apiResource('links', LinkController::class);
Route::patch('links/{id}/archive', [LinkController::class, 'archive']);
