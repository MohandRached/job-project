<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobApiController;

Route::get('/jobs', [JobApiController::class, 'index']);
