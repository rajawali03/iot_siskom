<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pertanian_Aquaponic_Controller;

Route::get('/', [Pertanian_Aquaponic_Controller::class, 'index']);