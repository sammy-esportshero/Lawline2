<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Add, update, delete, get products
Route::resource('products', 'ProductsController',
  ['only' => ['index', 'store', 'update', 'destroy', 'show']]
);

//Add to user, remove from user, list products by user
Route::post('attachProduct', 'UserProductController@attachProductByUser');
Route::post('removeProduct', 'UserProductController@removeProductByUser');
Route::get('listProducts', 'UserProductController@listProductsByUser');
