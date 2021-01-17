<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Middleware;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');
    Route::post('/cart', 'CheckoutController@process')->name('checkout-proses');
    Route::get('/success', 'CartController@success')->name('success');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/dashboard/products', 'DashboardProductsController@index')->name('dashboard-products');
    Route::get('/dashboard/product/create', 'DashboardProductsController@create')->name('dashboard-product-create');
    Route::post('/dashboard/product/create', 'DashboardProductsController@store')->name('dashboard-product-store');
    Route::get('/dashboard/product/{id}', 'DashboardProductsController@detail')->name('dashboard-product-details');
    Route::post('/dashboard/product/{id}', 'DashboardProductsController@update')->name('dashboard-product-update');

    Route::post('/dashboard/product/gallery/{id}', 'DashboardProductsController@uploadGallery')->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/product/gallery/{id}', 'DashboardProductsController@deleteGallery')->name('dashboard-product-gallery-delete');

    Route::get('/dashboard/transactions', 'TransactionController@index')->name('dashboard-transaction');
    Route::get('/dashboard/transaction-details/{id}', 'TransactionController@details')->name('dashboard-transaction-details');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::get('/account', 'SettingsController@account')->name('account');
    Route::post('/account/{redirect}', 'SettingsController@update')->name('redirect');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/register-success', 'RegisterController@success')->name('register-success');
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/categories', 'CategoryController@index')->name('category');
Route::get('/categories/{slug}', 'CategoryController@detail')->name('category-detail');
Route::get('/details/{id?}', 'DetailController@index')->name('details');
Route::post('/details/{id?}', 'DetailController@add')->name('details-add');


Route::prefix('admin')->namespace('admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin-dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('product-gallery', 'ProductGalleryController');
});
