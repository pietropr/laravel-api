<?php

Route::group(array('prefix' => 'api', 'middleware' => 'cors'), function () {
    header('Access-Control-Allow-Origin', '*');
    Route::get('/', function () {
        return response()->json(['message' => 'Jobs API', 'status', 'Connected']);
    });
    Route::resource('companies', 'CompaniesController');
    Route::resource('jobs', 'JobsController');



    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('details', 'UserController@details');
    });

});

Route::middleware('cors', function () {
    Route::get('/', function () {
        return redirect('api');
    });
});
