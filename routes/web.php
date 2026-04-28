<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Settings\CountryController;
use App\Http\Controllers\Settings\VatRateController;
use App\Http\Controllers\Settings\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

/*
|--------------------------------------------------------------------------
| Tasks
|--------------------------------------------------------------------------
*/
Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

/*
|--------------------------------------------------------------------------
| Entities (Clientes / Fornecedores)
|--------------------------------------------------------------------------
*/
Route::get('/clientes', [EntityController::class, 'clients'])->name('clients.index');
Route::get('/fornecedores', [EntityController::class, 'suppliers'])->name('suppliers.index');

Route::resource('entities', EntityController::class);

/*
|--------------------------------------------------------------------------
| Contacts
|--------------------------------------------------------------------------
*/
Route::resource('contacts', ContactController::class);

/*
|--------------------------------------------------------------------------
| Articles
|--------------------------------------------------------------------------
*/
Route::resource('articles', ArticleController::class);

/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/
Route::prefix('settings')->group(function () {
    Route::resource('countries', CountryController::class);
    Route::resource('vat-rates', VatRateController::class);
    Route::get('company', [CompanyController::class, 'edit'])->name('company.edit');
});
