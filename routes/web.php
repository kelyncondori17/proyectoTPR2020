<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\PaymentController;

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
Route::resource('clients','App\Http\Controllers\ClientController');

//Pero tambien puedes hacerlo asi  y arriba declaras el controladors
Route::resource('providers', ProviderController::class);
Route::resource('clients', ClientController::class);
Route::resource('articles', ArticleController::class);
Route::resource('positions', PositionController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('sales', SaleController::class);
Route::resource('shopping', ShoppingController::class);
Route::resource('producto', productoController::class);
/*
//ruta del proceso de pago
Route::resource('paypal', PaymentController::class);

//ruta del estado de pago
Route::resource('status', PaymentController::class);
*/

// route for check status of the payment
Route::get('/paypal/pay', [App\Http\Controllers\PaymentController::class, 'payWithPayPal']);

Route::get('/paypal/status', [App\Http\Controllers\PaymentController::class, 'payPalStatus']);

Route::get('/products', 'App\Http\Controllers\ProductsController@products')->name('products');
Route::get('product-detail/{id}', 'App\Http\Controllers\ProductsController@detail');
Route::get('cart', 'App\Http\Controllers\ProductsController@cart');
Route::get('add-to-cart/{id}', 'App\Http\Controllers\ProductsController@addToCart');


