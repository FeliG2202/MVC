<?php

use LionRoute\Route;
use PHP\Controllers\PedAlmMenuControlador;

Route::prefix('reporte', function() {
    Route::get("almuerzos", [PedAlmMenuControlador::class, 'generateReport']);
    Route::post("almuerzos", [PedAlmMenuControlador::class, 'generateReportDates']);
});

Route::prefix('frmPed', function() {
    Route::prefix('frmConPedMenu', function() {
        Route::get('leer-menu', [PedAlmMenuControlador::class, 'consultarAlmMenuApartControlador']);
    });
});
