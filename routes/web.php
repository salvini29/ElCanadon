<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Crear reserva
Route::post('/crearReserva5', [App\Http\Controllers\ReservaController::class, 'crearReserva5'])->name('crearReserva5')->middleware('auth');
Route::post('/crearReserva7', [App\Http\Controllers\ReservaController::class, 'crearReserva7'])->name('crearReserva7')->middleware('auth');
Route::post('/crearReservarap', [App\Http\Controllers\ReservaController::class, 'crearReservarap'])->name('crearReservarap')->middleware('auth');

//Views de las canchas
Route::get('/futbol5', [App\Http\Controllers\PageController::class, 'futbol5'])->name('futbol5')->middleware('auth');
Route::get('/futbol7', [App\Http\Controllers\PageController::class, 'futbol7'])->name('futbol7')->middleware('auth');
Route::get('/futbolrapido', [App\Http\Controllers\PageController::class, 'futbolrapido'])->name('futbolrapido')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\PageController::class, 'landing'])->name('landing');

Route::get('/test', [App\Http\Controllers\PageController::class, 'index'])->name('test')->middleware('checkRole');


/*Route::get('/futbol7', function () {
    return view('futbol7');
});
Route::get('/futbol5', function () {
    return view('futbol5');
});
Route::get('/futbolrapido', function () {
    return view('futbolrapido');
});*/

Route::get('/asd', [App\Http\Controllers\ReservaController::class, 'test'])->name('asd');