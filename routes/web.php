<?php

use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewslatterController;

Route::get('/', [NewslatterController::class, 'create'])->name('newsletter.create');
Route::post('/newsletter', [NewslatterController::class, 'store'])->name('newsletter.store');




