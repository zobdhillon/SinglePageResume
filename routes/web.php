<?php

use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ResumeController::class, 'index']);

Route::get('/print', [ResumeController::class, 'print']);
