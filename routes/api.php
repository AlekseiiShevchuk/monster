<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

Route::get('masks/{mask}/change', 'MasksController@change');
Route::get('masks/{mask}/buy', 'MasksController@buy');

    Route::get('/profile', function () {
        return \Illuminate\Support\Facades\Auth::user();
    });

});
