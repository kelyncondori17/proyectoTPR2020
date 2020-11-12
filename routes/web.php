<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Route::resource('categories','App\Http\Controllers\CategoryController');

//Route::get('providers', [\App\Http\Controllers\ProviderController::class, 'index'])->name('providers.index');
//Route::get('/providers/create', [\App\Http\Controllers\ProviderController::class, 'create'])->name('providers.create');
Route::resource('providers','App\Http\Controllers\ProviderController');
