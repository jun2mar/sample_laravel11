<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\API'], function () {

    Route::post('login', 'LoginController@login');
    Route::post('users', 'UserController@store');

    
    Route::group(["middleware" => 'auth:sanctum'], function () {
        Route::get('users', 'UserController@show');
    });
});