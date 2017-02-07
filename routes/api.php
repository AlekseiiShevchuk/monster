<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('hairs', 'HairsController');

        Route::resource('bodies', 'BodiesController');

        Route::resource('results', 'ResultsController');

});
