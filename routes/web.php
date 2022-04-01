<?php

use App\Http\Controllers\ExpendeReportController;
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

Route::get('/', function () {
    return view('welcome');
});

//arreglo asociativo
// Route::get('/test2', function (){
//     return[
//         'saldos' => 'hola',
//         'nombre' => 'ismael'
//     ];
// });

Route::get('/prueba', [App\Http\Controllers\TestController::class, 'index'] );
//ruta dasbord
Route::get('/dashboard', [App\Http\Controllers\DashController::class, 'index'] );
//ruta de reportes
Route::resources([
    'expense'   => ExpendeReportController::class,
]);