<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::post('/projects', [ProjectController::class, 'store'])->middleware(['auth', 'verified'])->name('projects.store');

Route::get('/projects/{id}', [ProjectController::class, 'show'])->middleware(['auth', 'verified'])->name('projects.show');

Route::delete('/proejct/{id}', [ProjectController::class, 'destroy'])->middleware(['auth', 'verified'])->name('projects.destroy');

Route::put('/proejct/{project_id}', [ProjectController::class, 'update'])->middleware(['auth', 'verified'])->name('projects.update');