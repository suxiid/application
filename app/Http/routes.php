<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['middleware' => 'auth', function () {
    return view('dashboard');
}]);

Route::get('/home', ['middleware' => 'auth', function () {
    return view('dashboard');
}]);

Route::get('/ajax-vehicle', function(){
    $customer_id = Input::get('cust_id');
    $vehicles = App\Vehicle::where('customer_id', '=', $customer_id)->get();
    return Response::json($vehicles);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::resource('items', 'ItemsController');

Route::resource('estimates', 'EstimatesController');

Route::resource('customers', 'CustomersController');

Route::resource('vehicles', 'VehiclesController');
