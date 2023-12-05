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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('uddokta-list','uddoktaCon');
Route::resource('agent-list','agentCon');
Route::resource('file-list','fileCon');
Route::get('admin/filelist','fileOptionalCon@fileList');
Route::get('fileView/{id}','fileOptionalCon@fileView');
Route::get('filepayment/{id}','fileOptionalCon@filepayment');
Route::get('fileAgent/{id}','fileOptionalCon@fileAgent');
Route::get('statusUpdate/{id}','fileOptionalCon@statusUpdate');
Route::get('fileRecipt/{id}','fileOptionalCon@fileRecipt');
Route::get('fileEdite/{id}','fileOptionalCon@fileEdite');
Route::get('admin/filenewlist','fileOptionalCon@fileNewList');
Route::get('admin/pendinglist','fileOptionalCon@pendingList');
Route::get('admin/completedlist','fileOptionalCon@completedList');
Route::get('admin/agent_list_search','fileOptionalCon@agentFilesearch');
