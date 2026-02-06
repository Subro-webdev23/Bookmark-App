<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LinkController;

Route::get('/', function () {
    return view('welcome');
});
