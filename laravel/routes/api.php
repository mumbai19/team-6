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

Route::get('/allStudents', 'ApiController@allStudents');

Route::post('/addAttendance', 'ApiController@addAttendance');

Route::post('/addActivity', 'ApiController@addActivity');

Route::get('/getProgram', 'ApiController@getProgram');

Route::post('/addSavings', 'ApiController@addSavings');

Route::post('/addStarChart', 'ApiController@addStarChart');

Route::post('/generateAttendanceReport', 'ApiController@generateAttendanceReport');

Route::get('/studentsByProgram/{program}', 'ApiController@studentsByProgram');

Route::post('/generateAttendanceReportDetailed', 'ApiController@generateAttendanceReportDetailed');
