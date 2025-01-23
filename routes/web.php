<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); # Display all tasks
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); # Show form to create a task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); # Save a new task in the DB

Route::get('/tasks/{task}', [TaskController::class, 'edit'])->name('tasks.edit'); # Show form to edit a specific task
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); #Update a specific task in the database

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); # Delete a specific task

Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete'); # Mark a task as completed

Route::get('/taskshow', [TaskController::class, 'showCompleted'])->name('taskshow'); # Show completed tasks in taskshow.php

Route::get('/pendingTask', [TaskController::class, 'showPending'])->name('pendingTask'); # Show pending tasks in pendingTask.php

Route::get('/searchTask', [TaskController::class, 'showSearch'])->name('searchTask'); # Show search results for tasks in searchTask.php


?>