<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['prevent-back-history']], function(){
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/', 'AuthController@login')->name('login');
        Route::post('signin', 'AuthController@signin')->name('signin');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');

        Route::get('home', 'HomeController@index')->name('home');
        Route::get('page', 'HomeController@page');
    });
});