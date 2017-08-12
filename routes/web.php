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

Route::get('/login','LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify')->middleware('web');
Route::get('/logout', 'LoginController@logout')->middleware('web');
Route::get('/login/getCode','LoginController@getCode');
Route::any('import','ExcelController@import');
Route::any('export','ExcelController@export');
Route::get('/职数查询/{id}/{query}/{type?}/{level?}','DepartmentController@index');
Route::any('/datainfo','LoginController@datainfo');
Route::get('/test/{code}','TestController@index');
Route::get('/show/{id}','TestController@show');
Route::get('/personnel/{id}','PersonnelController@index');

Route::get('getTH/{type}','TableController@getHead');

Route::group(['middleware'=>'admin'],function(){
    Route::get('/', "IndexController@index")->name('index');
    Route::get('/index/{id}/{name}/{level?}','TestController@dbTable');

});



