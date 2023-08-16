<?php

use LionRoute\Route;
use PHP\Controllers\PedAlmMenuControlador;

Route::prefix('reporte', function() {
    Route::get("almuerzos", [PedAlmMenuControlador::class, 'generateReport']);
});
