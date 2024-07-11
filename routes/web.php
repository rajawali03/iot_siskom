<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AquaponicController;

Route::get('/', [AquaponicController::class, 'index']);