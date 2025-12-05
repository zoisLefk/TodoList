<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/projects', function () {
    return "projects";
});

Route::get('/projects/create', function() {
    return view('projects.create');
});

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');