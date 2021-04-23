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

//Conocenos
Route::get('/conocenos', [App\Http\Controllers\PageController::class, 'conocenos'])->name('conocenos');

//Crear reserva
Route::post('/crearReserva5', [App\Http\Controllers\ReservaController::class, 'crearReserva5'])->name('crearReserva5')->middleware('auth');
Route::post('/crearReserva7', [App\Http\Controllers\ReservaController::class, 'crearReserva7'])->name('crearReserva7')->middleware('auth');
Route::post('/crearReservarap', [App\Http\Controllers\ReservaController::class, 'crearReservarap'])->name('crearReservarap')->middleware('auth');

//Views de las canchas
Route::get('/futbol5', [App\Http\Controllers\PageController::class, 'futbol5'])->name('futbol5')->middleware('auth');
Route::get('/futbol7', [App\Http\Controllers\PageController::class, 'futbol7'])->name('futbol7')->middleware('auth');
Route::get('/futbolrapido', [App\Http\Controllers\PageController::class, 'futbolrapido'])->name('futbolrapido')->middleware('auth');

//Generales
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\PageController::class, 'landing'])->name('landing');

//Promociones
Route::get('/promociones', [App\Http\Controllers\PageController::class, 'mostrarPromociones'])->name('promociones');
Route::get('/crearPromociones', [App\Http\Controllers\PageController::class, 'crearPromociones'])->name('crearpromociones')->middleware('checkRole');
Route::post('/postPromociones', [App\Http\Controllers\PageController::class, 'postPromociones'])->name('postPromociones')->middleware('checkRole');
Route::post('/cambiarEstadoPromo', [App\Http\Controllers\PageController::class, 'cambiarEstadoPromo'])->name('cambiarEstadoPromo')->middleware('checkRole');

//DB
Route::get('/limpiarDB', [App\Http\Controllers\PageController::class, 'limpiarDB'])->name('limpiarDB')->middleware('checkRole');
Route::post('/limpiarDBfecha', [App\Http\Controllers\PageController::class, 'limpiarDBfecha'])->name('limpiarDBfecha')->middleware('checkRole');

//Reservas
Route::get('/reservas', [App\Http\Controllers\PageController::class, 'mostrarReservas'])->name('reservas')->middleware('checkRole');
Route::post('/buscarReservas', [App\Http\Controllers\PageController::class, 'buscarReservas'])->name('buscarReservas')->middleware('checkRole');

//Paypal
Route::get('/paypal/pay', [App\Http\Controllers\PaymentController::class, 'payWithPayPal'])->name('paypalpay');
Route::get('/paypal/status', [App\Http\Controllers\PaymentController::class, 'payPalStatus'])->name('paypalstatus');


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