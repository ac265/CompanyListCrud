<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can company web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', function () {
    return view('map');
});


Route::resource('company','CompanyController');
Route::resource('person', 'PersonController');
Route::resource('address', 'AddressController');

Route::get('profile/{company}', 'ProfilesController@index')->name('profile.show');

Route::get('create/{company}','AddressesController@create')->name('address.create');
Route::get('store/{company}','AddressesController@store')->name('address.store');
Route::get('edit/{address}','AddressesController@edit')->name('address.edit');
Route::get('update/{address}','AddressesController@update')->name('address.update');
Route::get('delete/{address}','AddressesController@destroy')->name('address.destroy');


Route::get('person/create/{company}','PeopleController@create')->name('person.create');
Route::get('person/store/{company}','PeopleController@store')->name('person.store');
Route::get('person/edit/{person}','PeopleController@edit')->name('person.edit');
Route::get('person/update/{person}','PeopleController@update')->name('person.update');
Route::get('person/delete/{person}','PeopleController@destroy')->name('person.destroy');
