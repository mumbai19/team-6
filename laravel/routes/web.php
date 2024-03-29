<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use App\Data;
use App\activity_log;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

Route::get('/', function()
{
	return view('home');
});


// Route::get('/login', function()
// {
// 	return view('login');
// });
// Auth::routes();
Route::get('/login', 'Mcontroller@login');
Route::get('/check', 'Mcontroller@check');

Route::get('/profile', function()
{
	return view('tlife.profile');
});

Route::get('/attendance', 'Mcontroller@attendance');

















Route::get('/charts', function()
{
	return view('mcharts');
});

Route::get('/childrenDatabase', function()
{	$data = Data::all();
	return view('childrenDatabase')->withData($data);
});

// activity
Route::get('/activity', function()
{
	$data = activity_log::all();
	return view('activity')->withData($data);
});

Route::get('/activity_add', function()
{
	// $data = activity_log::all();
	return view('activity_add');
});
Route::post('/addActivity', 'ApiController@addActivity');



Route::get('/tables', function()
{
	return view('table');
});

Route::get('/forms', function()
{
	return view('form');
});

Route::get('/grid', function()
{
	return view('grid');
});

Route::get('/buttons', function()
{
	return view('buttons');
});


Route::get('/icons', function()
{
	return view('icons');
});

Route::get('/panels', function()
{
	return view('panel');
});

Route::get('/typography', function()
{
	return view('typography');
});

Route::get('/notifications', function()
{
	return view('notifications');
});

Route::get('/blank', function()
{
	return view('blank');
});

// Route::get('/login', function()
// {
// 	return view('login');
// });

Route::get('/documentation', function()
{
	return view('documentation');
});


Route::get('/downloadStudentExcel', function()
{
	return Excel::download(new StudentsExport(), 'students.xlsx');
});

Route::get('/addAttendance', function()
{
	return view('addAttendance');
});

Route::get('/roles', function()
{
	return view('roles');
});


Route::post('/addAttendanceOnDate','StudentController@addAttendanceOnDate');
Route::post('/addnewRecord','StudentController@addnewRecord');

Route::get('/admin', 'AdminController@assign');
Route::post('/admin/faculty', 'AdminController@displayFaculty');
Route::post('/admin/insert', 'AdminController@insertRole');
Route::get('/admin/remove', 'AdminController@removeRole');