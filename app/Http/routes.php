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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/estimates', function () {
    return view('estimates.estimates');
});

Route::get('/new-estimate', function () {
    return view('estimates.new-estimate');
});

Route::get('/items', function () {
    return view('items.items');
});

Route::get('/new-item', function () {
    return view('items.new-item');
});