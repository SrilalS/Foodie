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
//UI
Route::get('/', function () {
    return view('login');
})->name('index');

Route::get('/catalog', function () {
    return view('catalog');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/addproduct', function () {
    return view('addproduct');
});

Route::get('/accountSeller', function () {
    return view('sprofile');
})->name('sprofile');

Route::get('/accountBuyer', function () {
    return view('bprofile');
})->name('bprofile');

Route::post('/addproduct','FoodsController@addFood');

Route::post('/accountSeller','NavController@Logout');

Route::post('/','UsersController@login');

//API

//Users
Route::post('/api/1.0/users/add','UsersController@add');

Route::post('/api/1.0/users/login','UsersController@login');

//Foods
Route::post('/api/1.0/foods/add','FoodsController@addFood');

Route::get('/api/1.0/foods/get/all','FoodsController@getFood');

Route::get('/api/1.0/foods/get/oneshop','FoodsController@getFoodfromOneShop');

Route::get('/api/1.0/foods/get/search','FoodsController@foodsearch');

//Orders
Route::post('/api/1.0/orders/place','OrdersController@placeOrder');
