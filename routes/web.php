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
/// niveles funcionales//
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\DepartamentoController;




use App\Http\Controllers\GrupoBancoController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\TasaInteresController;
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

Route::resource('tipo_nominas', TipoNominaController::class);

Route::resource('tipo_frecuencia_pagos' , TipoFrecuenciaPagoController::class);

Route::resource('tipo_acumulados' , TipoAcumuladosController::class);

Route::resource('tipo_ausencias', TipoAusenciaController::class);

// Ejemplo usando Resource (Recomendado)
Route::resource('tipo_prestamos', TipoPrestamoController::class);


// Usamos el nombre de recurso adaptado: 'tipos_aumentos'
Route::resource('tipo_Aumentos', TipoAumentoController::class);



// Nombre de recurso: 'guarderias'
Route::resource('Guarderias', GuarderiaController::class);
Route::resource('tipo_Liquidacion', TipoLiquidacionController::class);

//niveles funcionales//
Route::resource('presupuesto', PresupuestoController::class);
Route::resource('direcciones', DireccionController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('tipo_ausencia', TipoAusenciaController::class);

// Usando la ruta 'grupos_bancos' para el recurso RESTful
Route::resource('grupo_bancos', GrupoBancoController::class);


// Usando la ruta 'bancos' para el recurso
Route::resource('bancos', BancoController::class);


// Usando la ruta 'tasas_interes' para el recurso
Route::resource('tasas_interes', TasaInteresController::class);
