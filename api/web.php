<?php

use LionRoute\Route;
use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\AlmAcompControlador;
use PHP\Controllers\AlmTipoControlador;

Route::prefix('reporte', function() {
    Route::get("almuerzos", [PedAlmMenuControlador::class, 'generateReport']);
    Route::post("almuerzos", [PedAlmMenuControlador::class, 'generateReportDates']);
});

Route::prefix('frmPed', function() {
    Route::prefix('frmConPedMenu', function() {
        Route::get('leer-menu', [PedAlmMenuControlador::class, 'consultarAlmMenuApartControlador']);
    });
});

Route::prefix('frmAlmAcomp', function(){
    Route::prefix('frmAlmConAcomp', function(){
        Route::get('con-acomp', [AlmAcompControlador::class, 'consultarAlmACompControlador']);
    });
});

Route::prefix('frmAlmTipo', function(){
    Route::prefix('frmAlmConTipo', function(){
        Route::get('con-tipo', [AlmTipoControlador::class, 'consultarAlmTipoControlador']);
    });
});
