<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('event.index');
})->middleware("auth");

Auth::routes();
 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function(){

Route::get('/event', [App\Http\Controllers\EventController::class, 'index']);
Route::post('/event/mostrar', [App\Http\Controllers\EventController::class, 'show']);
Route::post('/event/agregar', [App\Http\Controllers\EventController::class, 'store']);
Route::post('/event/editar/{id}', [App\Http\Controllers\EventController::class, 'edit']);
Route::post('/event/actualizar/{event}', [App\Http\Controllers\EventController::class, 'update']);
Route::post('/event/borrar/{id}', [App\Http\Controllers\EventController::class, 'destroy']);

Route::get('/event/imprimir', [App\Http\Controllers\EventController::class, 'imprimir']);

});