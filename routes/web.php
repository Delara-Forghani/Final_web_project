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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/main','MainController@index');
Route::get('/hello','MainController@goHome');
Route::post('/main/checklogin','MainController@checklogin');
Route::get('/main/successlogin','MainController@successlogin');
Route::get('/main/logout','MainController@logout');
Route::get('/main/profile','MainController@goProfile');
Route::get('/main/list','MainController@seeUsersList');
Route::get('/main/promote/{id}','MainController@promoteUser')->name('promote');
Route::get('/main/delete/{id}','MainController@deleteUser')->name('delete');
Route::get('/register2', 'RegistrationController@create');
Route::post('register2', 'RegistrationController@store');
Route::post('/update', 'RegistrationController@update');

Route::get('/main/item/{id}/{userid}','MainController@goHouseItem')->name('houseItem');
Route::get('/main/profile/house', 'HouseController@retrieveData');


Route::get('/uploadfile', 'UploadfileController@index')->name('upload.file');
Route::post('/uploadfile', 'UploadfileController@saveFile');
Route::get('/userhouse/{id}/{access}', 'HouseController@checkTableData')->name('getHomes');
Route::get('/edithouse/{id}', 'EditHouseController@editRow')->name('goToEdit');
Route::post('/editHouse/selectHome','EditHouseController@selectHomeInfo')->name('select');
Route::post('/editHouse/info','EditHouseController@editHomeInfo')->name('editInfo');
Route::get('/edithouse/{id}/{userid}', 'EditHouseController@deleteHouse')->name('deleteHome');
Route::get('/edithouse2/{id}/{access}', 'EditHouseController@starHouse')->name('star');
Route::post('/main/comment','MainController@sendComment')->name('comment');
Route::post('/main/search','MainController@searchHouse')->name('search');




