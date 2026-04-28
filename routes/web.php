<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\EntityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
Route::get('/clientes', [EntityController::class, 'clients'])->name('clients.index');
Route::get('/fornecedores', [EntityController::class, 'suppliers'])->name('suppliers.index');

Route::resource('entities', EntityController::class);
