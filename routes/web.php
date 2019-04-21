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

Route::get('/hello/{name}', function ($name) {
    return "Hello ".$name;
});

Route::post('/hello/{name}', function (\Illuminate\Http\Request $request, $name) {
    return "Hello ".$name."\nConteúdo: ".$request->getContent();
});

Route::match(['put','patch','delete'],'/hello/{name}', function (\Illuminate\Http\Request $request, $name) {
    return "Hello ".$name.
        "\nMétodo: ".
        $request->method().
        "\nConteúdo: ".
        $request->getContent();
});

Route::get('/final', function() {
    return "This is your final destination!!";
});

Route::redirect("/old_path","/final");

Route::prefix('post')->group(function() {

    // 123e4567-e89b-12d3-a456-426655440000
    Route::get('/{uuid}', function ($uuid) {
        return "Post with uuid $uuid";
    })->where(['uuid' => '^[0-9a-fA-F]{8}(\-[0-9a-fA-F]{4}){3}\-[0-9a-fA-F]{12}$']);

    Route::get('/{id}', function ($id) {
        return "Post with id $id";
    })->where(['id' => '[0-9]+']);

    Route::get('/{slug}', function ($slug) {
        return "Post with slug $slug";
    })->where(['slug' => '[A-Za-z0-9\-]+']);

});

Route::get('/a-route', function(){
    return now();
})->name('now');

Route::get('/where-is-now', function(){
    return route('now');
});

Route::get('/redirect-me-to-now', function() {
    return redirect()->route('now');
});