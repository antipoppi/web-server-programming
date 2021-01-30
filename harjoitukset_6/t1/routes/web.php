<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/omalaravel', function () {
    return view('omaleiska');
});

Route::get('/about', function () {
    return view('siteinfo');
});

Route::get('/aboutfolder', function () {
    return view('kansio/siteinfo');
});

Route::get('/infosite', function () {
    return view('child');
});

Route::get('/contact1', 'ContactController@showinfo');
Route::get('/contact2', 'ContactController@returninfo');

Route::get('/person', 'ContactController@showperson');
Route::get('/listpersons', 'ContactController@listpersons');

Route::get('/do_shopping', function () {
    return view('carshopping/do_shopping');
});

Route::get('/basket_content', function () {
    return view('carshopping/basket_content');
});

Route::get('/customers', 'CustomerController@index');
Route::get('/customers/create', 'CustomerController@create');
Route::post('/customers', 'CustomerController@store'); // huomaa post
Route::get('/customers/{id}', 'CustomerController@show');

// Laravelin RESTful Resource controller asettaa reittitiedoston määrityksellä
//Route::resource('customers', 'CustomerController');
// alla vakioreitit mitä se kirjoittaisi (kommentoituna ne jotka on jo luotu aiemmin)
//Route::get('/customers', 'CustomerController@index');
//Route::get('/customers/create', 'CustomerController@create');
//Route::post('/customers', 'CustomerController@store');
//Route::get('/customers/{id}', 'CustomerController@show');

Route::get('/customers/{id}/edit', 'CustomerController@edit');
Route::patch('/customers/{id}', 'CustomerController@update');

Route::delete('/customers/{id}', 'CustomerController@destroy');