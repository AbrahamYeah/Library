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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'PageController@index')->name('home');

Route::get('/Library/Detalles/{id?}', 'BooksController@Show_details')->name('library.detalle');
//Ruta para hacer el autocompletado
Route::get('/Search', 'BooksController@autocomplete_by_name');

Route::get('/Library/EditBook/{id?}','PageController@editar_libro')->name('library.editbook');

Route::put('/Library/EditBook/{id}','BooksController@edit')->name('library.update');

Route::delete('/Library/EditBook/{id}','BooksController@destroy')->name('library.delete');

Route::get('/Library/NewBook/','PageController@nuevo_libro')->name('library.newbook');

Route::post('/Library/NewBook/', 'BooksController@create')->name('library.create');

Route::get('/Library/filtros/', 'BooksController@Filter_by_name')->name('library.filtros');

Route::get('/Library/solicita/{idbook?}', 'BooksController@borrow_solicitud')->name('library.solicitar');

Route::get('/Library/devuelve/{bookid?}', 'BooksController@devolver')->name('library.devolver');

Route::get('/prueba', function () {
    return view('prueba');
});
