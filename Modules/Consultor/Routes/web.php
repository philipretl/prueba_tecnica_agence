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

Route::prefix('consultor')->group(function() {
    Route::get('/balance', 'ConsultorController@index')->name('consultor.dashboard');
    Route::post('/informe', 'ConsultorController@reporte')->name('consultor.informe');
    Route::post('/reporte/desempenio', 'ConsultorController@reporteDesempenio')->name('consultor.reporte.desempenio');
    Route::post('/reporte/ganancia', 'ConsultorController@reporteGanancia')->name('consultor.reporte.ganancia');
});
