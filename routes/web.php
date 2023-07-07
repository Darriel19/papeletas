<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PapeletasController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ExcelController;
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

Route::get('/registro',[RegisterController::class,'registro'] )->name('registro');

Route::get('/listado',[PapeletasController::class,'index'] )->name('listado');

Route::get('/editar/{id}',[PapeletasController::class,'edit'])->name('editar');

Route::put('/update/{id}',[PapeletasController::class,'update'])->name('update');

Route::delete('/destroy/{id}', [PapeletasController::class, 'destroy'])->name('destroy');

Route::get('/actividad', [ActividadController::class, 'index'])->name('actividad');

//reportes

Route::post('/view-pdf/{id}', [PrincipalController::class, 'viewPdf'])->name('viewPdf');

Route::post('/view-pdf-historial', [PrincipalController::class, 'downloadPdfhistorial'])->name('downloadPdfhistorial');

Route::post('/view-pdf-actividad', [PrincipalController::class, 'downloadPdfactividad'])->name('downloadPdfactividad');

Route::get('/report-excel-p', [ExcelController::class, 'papeletasExcel'])->name('papeletasExcel');

Route::get('/report-excel', [ExcelController::class, 'actividadExcel'])->name('actividadExcel');