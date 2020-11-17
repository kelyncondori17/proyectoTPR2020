<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SaleController;


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

//Esta bien asi 

Route::resource('categories','App\Http\Controllers\CategoryController');

//Pero tambien puedes hacerlo asi  y arriba declaras el controladors
Route::resource('providers', ProviderController::class);
Route::resource('articles', ArticleController::class);
Route::resource('positions', PositionController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('sales', SaleController::class);
