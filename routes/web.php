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



Route::group(['prefix'=>'admin','middleware' => ['auth','admin']],function(){
    Route::get('/', 'dashboardController@index');

    

    //borrowers
    Route::get('/borrowers', 'dashboardController@borrowers');;
    Route::get('/add_borrowers', 'dashboardController@add_borrowers');
    Route::post('/insert_borrowers', 'dashboardController@insert_borrowers');
    Route::get('/edit_borrowers', 'dashboardController@edit_borrowers');
    Route::post('/update_borrowers', 'dashboardController@update_borrowers');
    Route::get('/delete_borrowers', 'dashboardController@delete_borrowers');


Route::get('/live_search/action', 'dashboardController@action')->name('live_search.action');

});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
