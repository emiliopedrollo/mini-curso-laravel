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

Route::any('/hello/{name}', 'HelloController@index');

Route::get('/final', function() {
    return "This is your final destination!!";
});

Route::redirect("/old_path","/final");

Route::resource('post','PostController');

Route::get('/a-route', function(){
    return now();
})->name('now');

Route::get('/where-is-now', function(){
    return route('now');
});

Route::get('/redirect-me-to-now', function() {
    return redirect()->route('now');
});