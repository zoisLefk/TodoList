<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::post('/todos', [TodoController::class, 'store'])->middleware(['auth', 'verified'])->name('todos.store');
Route::delete('/todos/{todo_id}', [TodoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('todos.destroy');
Route::patch('/todos/{todo_id}', [TodoController::class, 'toggle'])->middleware(['auth', 'verified'])->name('todos.toggle');
Route::put('/todos/{todo_id}', [TodoController::class, 'update'])->middleware(['auth', 'verified'])->name('todos.update');