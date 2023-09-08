<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class PedAlmMenuPaciModelo {

    public $tabla = 'pacientes';
    public $tablaMDP = 'menu_seleccionado_dia_persona';

    public function validarIdentificacion($data) {
        return DB::table('pacientes')
        ->select(DB::as(DB::count('*'), 'cant'))
        ->where(DB::equalTo("pacienteDocumento"), $data['pacienteDocumento'])
        ->get();
    }

    public function readIdByDocument($data) {
        return DB::table('pacientes')
        ->select('idPaciente')
        ->where(DB::equalTo("pacienteDocumento"), $data['pacienteDocumento'])
        ->get();
    }

    public function consultarAlmMenuIdModelo($data) {
        return DB::table('pacientes')
        ->select()
        ->where(DB::equalTo("idPaciente"), $data['idPaciente'])
        ->get();
    }

    public function consultarMenuModelo($dia, $semana) {
        return DB::table('view_nutrimenu')->select()->where(
            DB::equalTo('nutriDiasNombre'), $dia
        )->and(
            DB::equalTo('nutriMenuSemana'), $semana
        )->getAll();
    }

    public function registrarMenuDiaModelo($data) {
        return DB::table('menu_seleccionado_dia_paci')->insert([
            'idPaciente' => $data['idPaciente'],
            'idNutriMenu' => $data['idNutriMenu'],
            'menuSeleccionadoDiaPaciente' => $data['list'],
            'fecha_actual' => $data['date']
        ])->execute();
    }

// consultar almuerzo paciente apartada
    public function consultarAlmMenuApartPaciModelo() {
        return DB::table(
            DB::as('menu_seleccionado_dia_paci', 'msdp')
        )->select(
            DB::column('pacienteDocumento', 'pcs'),
            DB::column('pacienteNombre', 'pcs'),
            DB::column('pacienteCama', 'pcs'),
            DB::column('menuSeleccionadoDiaPaciente', 'msdp'),
            DB::column('fecha_actual', 'msdp'),
        )->inner()->join(
            DB::as('pacientes', 'pcs'),
            DB::column('idPaciente', 'msdp'),
            DB::column('idPaciente', 'pcs'),
        )->getAll();
    }

    public function generateReportDatesPaciDB() {
        return DB::table(
            DB::as('menu_seleccionado_dia_paci', 'msdp')
        )->select(
            DB::column('pacienteDocumento', 'pcs'),
            DB::column('pacienteNombre', 'pcs'),
            DB::column('pacienteCama', 'pcs'),
            DB::column('menuSeleccionadoDiaPaciente', 'msdp'),
            DB::column('fecha_actual', 'msdp'),
        )->inner()->join(
            DB::as('pacientes', 'pcs'),
            DB::column('idPaciente', 'msdp'),
            DB::column('idPaciente', 'pcs'),
        )->where('fecha_actual')
        ->between(request->date_start, request->date_end)
        ->getAll();
    }
}
