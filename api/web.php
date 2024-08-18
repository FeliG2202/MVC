<?php

use LionRoute\Route;
use PHP\Controllers\PersonaControlador;
use PHP\Controllers\RolControlador;
use PHP\Controllers\UsuarioControlador;


// registrar Roles del sistema
Route::prefix('frmRol',function(){
    Route::post('create',[RolControlador::class, "registrarRolControlador"]);
    Route::get('read',[RolControlador::class, "consultarRolControlador"]);
    Route::put('update/{idRol}',[RolControlador::class, "actualizarRolControlador"]);
    Route::delete('delete/{idRol}', [RolControlador::class, "eliminarRolControlador"]);
});

// ceracion de usuarios para el sistema
Route::prefix('frmUser',function(){
    Route::post('create',[UsuarioControlador::class, "registrarUsuarioControlador"]);
    Route::get('read',[UsuarioControlador::class, "consultarUsuarioControlador"]);
    Route::put('update/{idUsuario}',[UsuarioControlador::class, "actualizarUsuarioControlador"]);
    Route::delete('delete/{idUsuario}',[UsuarioControlador::class, "eliminarUsuarioControlador"]);
});

// creacion de empleados
Route::prefix('frmEmpl',function(){
    Route::post('create',[PersonaControlador::class, "registrarPersonaControlador"]);
    Route::get('read',[PersonaControlador::class, "consultarPersonaControlador"]);
    Route::put('update/{idPersona}',[PersonaControlador::class, "actualizarPersonaControlador"]);
    Route::delete('delete/{idPersona}',[PersonaControlador::class, "eliminarPersonaControlador"]);
    Route::post('upload',[PersonaControlador::class, "uploadControlador"]);
});


