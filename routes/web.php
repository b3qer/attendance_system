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
    return view('getway');
});
Auth::routes();


Route::get('/register/lecturer', 'RegLinkController@ShowLecturerRegister');
Route::post('/register/lecturer', 'RegLinkController@create');

Route::get('/register/student', 'RegLinkController@ShowStudentRegister');
Route::post('/register/student', 'RegLinkController@createStd');


Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm');
Route::post('/login/student', 'Auth\LoginController@studentLogin');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function (){

    Route::get('/lecturer/attendance' , 'LecturerController@ShowTable');
    Route::get('/lecturer/search' , 'LecturerController@ShowSearch');
    Route::post('lecturer/search' , 'LecturerController@SearchStd');
    Route::get('/lecturer/link' , 'LecturerController@ShowLink');
    Route::post('/lecturer/link' , 'LecturerController@ActiveLink');
    Route::get('/lecturer/report' , 'LecturerController@ShowReport');
    Route::get('/lecturer/edit' , 'LecturerController@ShowEdit');
    Route::post('/lecturer/delete/row' , 'LecturerController@DeleteRow');
    Route::post('/lecturer/edit/name' , 'LecturerController@EditName');
    Route::post('/lecturer/edit/delete' , 'LecturerController@DeleteBtn');

    Route::get('/monitor/link/student', 'MonitorController@ShowactiveStd');
    Route::post('/monitor/link/student', 'MonitorController@activeStd');

    Route::get('/monitor/link/lecturer', 'RegLinkController@ShowactiveLec');
    Route::post('/monitor/link/lecturer', 'RegLinkController@activeLec');

    Route::get('/monitor/stage', 'MonitorController@ShowStages');
    Route::post('/monitor/stage', 'MonitorController@AddStages');
    Route::get('/monitor/stage/delete/{id}','MonitorController@DeleteStage');

    Route::get('/monitor/lecturers', 'MonitorController@ShowLecForm');
    Route::get('/monitor/lecturer/delete/{id}', 'MonitorController@DeleteLec');

    Route::get('/lecturer/attendance/xlsx' , 'LecturerController@xlsx');
    Route::get('/lecturer/attendance/xlsx2' , 'LecturerController@xlsx2');

});

Route::group(['middleware' => 'auth:student'], function () {
    Route::get('/student/attendance' , 'StudentController@ShowForm');
    Route::post('/student/attendance' , 'StudentController@CheckNum');
});