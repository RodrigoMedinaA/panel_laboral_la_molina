<?php

use App\Http\Controllers\CarreraController;
use Illuminate\Support\Facades\Route;

Route::apiResource('carreras', CarreraController::class);
