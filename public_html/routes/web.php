<?php

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
    return view('sites/pugventuresllc/index');
});
Route::get('/login', function () {
    return view('sites/pugventuresllc/login');
})->name('login');
Route::post('/login', ['uses' => 'Auth\LoginController@login']);
Route::post('/contact', 'Sites\PugVenturesLLC\ContactController@send');

Route::middleware(['auth'])->group(function () {
    // Auth
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout']);

    // Admin
    Route::get('/dashboard', 'Sites\PugVenturesLLC\AdminController@dashboard');

    // Product
    Route::get('/products', 'Sites\PugVenturesLLC\ProductController@products');
    Route::get('/products/add', 'Sites\PugVenturesLLC\ProductController@addProduct');
    Route::get('/product/saveDraft', 'Sites\PugVenturesLLC\ProductController@saveDraft');
    Route::post('/products/imageupload', 'Sites\PugVenturesLLC\ProductController@imageUpload');
    Route::post('/product/submit', 'Sites\PugVenturesLLC\ProductController@submitProduct');

    // Ebay
    Route::get('/ebay/categorySuggestions', 'Sites\PugVenturesLLC\EbayController@getCategorySuggestions');
    Route::get('/ebay/categoryItemAspects', 'Sites\PugVenturesLLC\EbayController@getCategoryItemAspects');
});
