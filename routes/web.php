<?php

use Illuminate\Routing\Route as RoutingRoute;
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
    return view('dash.index');
});

Route::resource('publicaciones', 'App\Http\Controllers\PublicacionController');
Route::get('publicaciones', ['App\Http\Controllers\PublicacionController', 'index'])->name('publicaciones.home');

Route::resource('programas', 'App\Http\Controllers\ProgramaController');

Route::resource('proyectos', 'App\Http\Controllers\ProyectoController');
Route::get('proyectos/crear/{id}', ['App\Http\Controllers\ProyectoController', 'crear'])->name('proyectos.crear');
Route::post('proyectos/guardar', ['App\Http\Controllers\ProyectoController', 'guardar']);

Route::resource('subproyectos', 'App\Http\Controllers\SubproyectoController');
Route::get('subproyectos/crear/{id}', ['App\Http\Controllers\SubproyectoController', 'crear'])->name('proyectos.crear');
Route::post('subproyectos/guardar', ['App\Http\Controllers\SubproyectoController', 'guardar']);

/* Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dash.index');
})->name('dash'); */


Route::get('logout', ['App\Http\Controllers\Controller', 'logout'] )->name('logout');
