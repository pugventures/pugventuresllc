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
Route::post('/contact', 'Sites\PugVenturesLLC\ContactController@send');



Route::get('/dashboard', 'Sites\PugVenturesLLC\AdminController@dashboard')->middleware('auth.basic');
Route::get('signout', ['uses' => 'Auth\LoginController@logout']);