<?php
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('hairs', 'HairsController');
    Route::post('hairs_mass_destroy', ['uses' => 'HairsController@massDestroy', 'as' => 'hairs.mass_destroy']);
    Route::resource('masks', 'MasksController');
    Route::post('masks_mass_destroy', ['uses' => 'MasksController@massDestroy', 'as' => 'masks.mass_destroy']);
    Route::resource('bodies', 'BodiesController');
    Route::post('bodies_mass_destroy', ['uses' => 'BodiesController@massDestroy', 'as' => 'bodies.mass_destroy']);
    Route::resource('suits', 'SuitsController');
    Route::post('suits_mass_destroy', ['uses' => 'SuitsController@massDestroy', 'as' => 'suits.mass_destroy']);
    Route::resource('tests', 'TestsController');
    Route::post('tests_mass_destroy', ['uses' => 'TestsController@massDestroy', 'as' => 'tests.mass_destroy']);
    Route::resource('results', 'ResultsController');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
});
