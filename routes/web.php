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

Route::get('/', 'PagesController@index');
Route::get('/main', 'PagesController@index');


Route::resource('students','StudentsController');
Route::resource('assignments','AssignmentsController');



// Route::get('/main', function(){
//     return view('pages.main');
// });

Route::get('/assignments/{assignment}/grades', 'AssignmentsController@grades')->name('assignments.grades');;
Route::get('/assignments/{assignment}/{student}/edit', 'AssignmentsController@editgrade');
Route::put('/assignments/{assignment}/{student}/{grade}/update', 'AssignmentsController@updategrade');



