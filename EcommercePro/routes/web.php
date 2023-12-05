<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TokoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class, 'redirect']);

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('/add_category', [AdminController::class, 'add_category']);

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

Route::get('/view_product', [AdminController::class, 'view_product']);

Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/show_product', [AdminController::class, 'show_product']);
// Route::get('/showproduct', [AdminController::class, 'showproduct']);

Route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']);

Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

Route::get('/order', [AdminController::class, 'order']);

Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

Route::get('/show_cart', [HomeController::class, 'show_cart']);

Route::get('/remove_cart/{$id}', [HomeController::class, 'remove_cart']);

Route::post('/add_fav/{id}', [HomeController::class, 'add_fav']);

Route::get('/show_fav', [HomeController::class, 'show_fav']);

Route::get('/deletefavorite/{id}', [HomeController::class, 'deletefavorite']);


// Route::post('/add_cart/{$id}',[HomeController::class, 'add_cart']);

Route::get('/delete/{id}', [HomeController::class, 'deletecart']);

Route::get('/product_search', [HomeController::class, 'product_search']);

Route::post('/update_cart/{id}', [HomeController::class, 'update_cart']);

Route::get('/tokohome',[HomeController::class, 'redirect']);

// Route::post('/add_product', [TokoController::class, 'add_product']);
Route::get('/view_home', [TokoController::class, 'view_home']);
Route::post('/addproduct', [TokoController::class, 'addproduct'])->name('addproduct');

Route::get('/showproduct', [TokoController::class, 'showproduct']);

Route::get('/update_product/{id}', [TokoController::class, 'update_product']);

Route::post('/updateproduct/{id}', [TokoController::class, 'updateproduct']);

Route::get('/deleteproduct/{id}', [TokoController::class, 'deleteproduct']);

Route::get('/addtoko', [TokoController::class, 'addtoko']);

Route::post('/addtokoonline', [TokoController::class, 'addtokoonline'])->name('addtokoonline');

Route::get('/showtoko', [TokoController::class, 'showtoko']);

Route::get('/update_toko/{id}', [TokoController::class, 'update_toko']);

Route::post('/edittoko/{id}', [TokoController::class, 'edittoko']);

Route::get('/ourproduct', [HomeController::class, 'ourproduct']);

Route::get('/showproducthome', [TokoController::class, 'showproducthome']);

Route::get('/home.product', [HomeController::class, 'product']);

Route::post('/addtoko_favorite/{id}', [TokoController::class, 'addtoko_favorite']);

Route::get('/toko_favorite', [TokoController::class, 'toko_favorite']);

Route::get('/productdetails/{id}', [TokoController::class, 'productdetails']);

Route::get('/cash_order', [HomeController::class, 'cash_order']);

Route::get('/show_carttoko', [TokoController::class, 'show_carttoko']);






