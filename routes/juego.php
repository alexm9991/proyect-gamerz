<?php

use App\Http\Controllers\JuegoController;
use Illuminate\Support\Facades\Route;

Route::resource('home', JuegoController::class);
