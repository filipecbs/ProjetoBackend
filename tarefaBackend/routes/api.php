<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('mostraDoutor/{id}','DoctorController@showDoctor')->name('mostra');
Route::get('listaDoutor','DoctorController@listDoctor');
Route::post('criaDoutor','DoctorController@createDoctor');
Route::put('atualizaDoutor/{id}','DoctorController@updateDoctor');
Route::delete('deletaDoutor/{id}','DoctorController@deleteDoctor');


Route::get('mostraPaciente/{id}','PatientController@showPatient')->name('mostra');
Route::get('listaPaciente','PatientController@listPatient');
Route::post('criaPaciente','PatientController@createPatient');
Route::put('atualizaPaciente/{id}','PatientController@updatePatient');
Route::delete('deletaPaciente/{id}','PatientController@deletePatient');


Route::get('mostraQuarto/{id}','RoomController@showRoom')->name('mostra');
Route::get('listaQuarto','RoomController@listRoom');
Route::post('criaQuarto','RoomController@createRoom');
Route::put('atualizaQuarto/{id}','RoomController@updateRoom');
Route::delete('deletaQuarto/{id}','RoomController@deleteRoom');
