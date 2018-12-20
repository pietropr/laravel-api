<?php

Route::group(array('prefix' => 'api', 'middleware' => 'cors'), function () {
    header('Access-Control-Allow-Origin', '*');
    Route::get('/', function () {
        return response()->json(['message' => 'Jobs API', 'status', 'Connected']);
    });
    Route::resource('companies', 'CompaniesController');
    Route::resource('jobs', 'JobsController');

});

Route::middleware('cors', function () {
    Route::get('/', function () {
        return redirect('api');
    });
});
