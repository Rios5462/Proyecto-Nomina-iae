<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TipoNominaController;
use App\Http\Controllers\TipoFrecuenciaPagoController;
use App\Http\Controllers\TipoAcumuladosController;
use App\Http\Controllers\TipoPrestamoController;
use App\Http\Controllers\TipoAumentoController;
use App\Http\Controllers\GuarderiaController;
use App\Http\Controllers\TipoLiquidacionController;
use App\Http\Controllers\TipoAusenciaController;
use App\Http\Controllers\ProfesionesController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\TabuladorCategoriasController;


Route::get('/', function () {
    return view('layouts.pantalla_principal');
});


Route::resource('empleados', EmpleadoController::class);

// 1. Ruta para mostrar el formulario de creación de un nuevo empleado
//Route::get('/empleados/crear', [EmpleadoController::class, 'create'])->name('empleados.create');

// 2. Ruta para procesar el formulario (se usará en el futuro)
//Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');

// 3. Ruta para mostrar la lista de todos los empleados
//Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');


//Rutas para Tipos
Route::resource('tipo_nominas', TipoNominaController::class);
Route::resource('tipo_frecuencia_pagos' , TipoFrecuenciaPagoController::class);
Route::resource('tipo_acumulados' , TipoAcumuladosController::class);
Route::resource('tipo_ausencias', TipoAusenciaController::class);
Route::resource('tipo_prestamos', TipoPrestamoController::class);
Route::resource('tipo_Aumentos', TipoAumentoController::class);
Route::resource('Guarderias', GuarderiaController::class);
Route::resource('tipo_Liquidacion', TipoLiquidacionController::class);
Route::resource('tipo_ausencia', TipoAusenciaController::class);
//

//Rutas para Profesiones - Cargos - Categorias
Route::resource('profesiones', ProfesionesController::class)->parameters([
    // Mapea la ruta de 'profesione' a la variable de 'profesion'
    'profesiones' => 'profesion', 
]);
Route::resource('cargos', CargosController::class);
Route::resource('categorias', CategoriasController::class);
Route::resource('tabulador_categorias', TabuladorCategoriasController::class);
//