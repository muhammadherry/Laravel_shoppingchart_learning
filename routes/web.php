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
    return view('shop.index');
});
Route::get('/shop',[
    'uses'=>'ProductController@index',
    'as'=>'product.index'
]);

Route::get('/add-to-cart/{id}',[
    'uses'=>'ProductController@getaddcart',
    'as'=>'product.addtocart'
]);

Route::get('/shopping-cart',[
    'uses'=>'ProductController@getcart',
    'as'=>'product.shoppingcart'
]);

Route::get('/checkout',[
    'uses'=>'ProductController@getcheckout',
    'as'=>'checkout'
]);

Route::post('/checkout',[
    'uses'=>'ProductController@postcheckout',
    'as'=>'checkout'
]);

Route::group(['prefix'=>'user'],function(){
    Route::group(['middleware'=>'guest'],function(){

        Route::get('/signup',[
            'uses'=>'UserController@getSignup',
            'as'=>'user.signup'
        ]);
    
        Route::post('/signup',[
            'uses'=>'UserController@postSignup',
            'as'=>'user.signup'
        ]);
        
        Route::get('/signin',[
            'uses'=>'UserController@getSignIn',
            'as'=>'user.signin'
        ]);
        Route::post('/signin',[
            'uses'=>'UserController@postSignIn',
            'as'=>'user.signin'
        ]);
    }); 

    Route::group(['middleware'=>'auth'],function(){
        Route::get('/profile',[
            'uses'=>'UserController@profile',
            'as'=>'user.profile'
        ]);
        
        Route::get('/logout',[
            'uses'=>'UserController@logout',
            'as'=>'user.logout'
        ]);
    });
});