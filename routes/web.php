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
Route::get('admin/filelist','fileOptionalCon@fileList');
Route::get('fileView/{id}','fileOptionalCon@fileView');
Route::get('filepayment/{id}','fileOptionalCon@filepayment');
Route::post('filepaymentInsert','fileOptionalCon@filepaymentInsert');
Route::get('fileAgent/{id}','fileOptionalCon@fileAgent');
Route::post('fileAgentSend/{id}','fileOptionalCon@fileAgentSend');
Route::get('statusUpdate/{id}','fileOptionalCon@statusUpdate');
Route::post('statusUpdateSend/{id}','fileOptionalCon@statusUpdateSend');
Route::get('admin/filenewlist','fileOptionalCon@fileNewList');
Route::get('admin/pendinglist','fileOptionalCon@pendingList');
Route::get('admin/completedlist','fileOptionalCon@completedList');
Route::get('admin/agent_list_search','fileOptionalCon@agentFilesearch');

//user part
Route::get('/uhome', 'uHomeController@uindex');
Route::resource('file-list','fileCon');
Route::get('user/filenewlist','userFileOptinonCon@fileNewList');
Route::get('user/pendinglist','userFileOptinonCon@pendingList');
Route::get('user/completedlist','userFileOptinonCon@completedList');
Route::get('userstatusUpdate/{id}','userFileOptinonCon@statusUpdate');
Route::post('userstatusUpdateSend/{id}','userFileOptinonCon@statusUpdateSend');
//recipt
Route::get('userfileRecipt/{id}','userFileOptinonCon@fileRecipt');
Route::post('userfileReciptUpdate/{id}','userFileOptinonCon@fileReciptUpdate');
