

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

Route::get('/java', function () {
    return view('java');
});




Auth::routes();

 

Route::middleware(['auth'])->group(function(){

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('orders','OrdersController');
Route::resource('files','FilesController');
Route::get('files/create/{order_id}','FilesController@create');


Route::resource('letters','LetterController');


//Route::get('letters/search','LetterController@search');
Route::get('/letters/print/{letter_id}','LetterController@print');




Route::resource('images','ImageController');





Route::get('/pdf/gnt/{letter_id}','PdfController@gnt');
Route::resource('pdf','PdfController');









});




