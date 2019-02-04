<?php



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


Route::group(['middleware' => 'auth'], function () {
    Route::get('events', 'Event\EventController@index')->name('events');
    Route::get('events/view/{event}', 'Event\EventController@view')->name('event-view');
    Route::get('events/add', 'Event\EventController@add')->name('add-add');
    Route::post('event/save', 'Event\EventController@store')->name('event-save');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
