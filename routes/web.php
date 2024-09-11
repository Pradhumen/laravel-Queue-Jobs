<?php

use App\Http\Controllers\DashboardController;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewslatterController;

Route::get('/', [NewslatterController::class, 'create'])->name('newsletter.create');
Route::post('/newsletter', [NewslatterController::class, 'store'])->name('newsletter.store');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::post('/dashboard/start-jobs', [DashboardController::class, 'startJobs'])->name('dashboard.startJobs');


