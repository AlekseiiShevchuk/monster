<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

    Route::get('masks/{mask}/change', 'MasksController@change');
    Route::get('masks/{mask}/buy', 'MasksController@buy');

    Route::get('hairs/{hair}/change', 'HairsController@change');
    Route::get('hairs/{hair}/buy', 'HairsController@buy');

    Route::get('suits/{suit}/change', 'SuitsController@change');
    Route::get('suits/{suit}/buy', 'SuitsController@buy');

    Route::get('bodies/{body}/change', 'BodiesController@change');
    Route::get('bodies/{body}/buy', 'BodiesController@buy');

    Route::get('/profile', function () {
        return \Illuminate\Support\Facades\Auth::user();
    });

});
