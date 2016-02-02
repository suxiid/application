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

/*
 *
 * Estimate Create Ajax customer vehicle data call
 */
Route::get('/ajax-vehicle', function(){
    $customer_id = Input::get('cust_id');
    $vehicles = App\Vehicle::where('customer_id', '=', $customer_id)->get();
    return Response::json($vehicles);
});

/*
 *
 * Estimate Create Ajax item data call
 */
Route::get('/ajax-item', function(){
    $item_id = Input::get('item_id');
    $item = App\Item::where('id', '=', $item_id)->get();
    return Response::json($item);
});

/*
 *
 *  Authentication Route
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/*
 *
 * Resource Routes for All Modules
 */
Route::resource('items', 'ItemsController');

Route::resource('estimates', 'EstimatesController');

Route::resource('customers', 'CustomersController');

Route::resource('vehicles', 'VehiclesController');

Route::resource('suppliers', 'SuppliersController');

/*
 *
 * All Routes for Jobs Module
 */
Route::resource('jobs', 'JobsController');
Route::get('jobs/create_job/{id}', 'JobsController@create_job');