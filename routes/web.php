<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PapeletasController;
use App\Http\Controllers\PrincipalController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', [PrincipalController::class,'index'] )->name('principal');

Route::get('/crear-permiso',[RegisterController::class,'index'] )->name('register');
Route::post('/crear-permiso',[RegisterController::class,'show'] );

Route::post('/crear',[RegisterController::class,'store'] )->name('store');

Route::get('/listado',[PapeletasController::class,'index'] )->name('listado');

Route::get('/editar/{id}',[PapeletasController::class,'edit'])->name('editar');

Route::put('/update/{id}',[PapeletasController::class,'update'])->name('update');

Route::delete('/destroy/{id}', [PapeletasController::class, 'destroy'])->name('destroy');
