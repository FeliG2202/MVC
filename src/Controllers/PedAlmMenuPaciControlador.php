<?php

namespace PHP\Controllers;

use LionSpreadsheet\Spreadsheet;
use PHP\Models\PedAlmMenuPaciModelo;

class PedAlmMenuPaciControlador {

	private $pedAlmMenuPaciModelo;

	public function __construct() {
		$this->pedAlmMenuPaciModelo = new PedAlmMenuPaciModelo();
	}

    // validar numero de identificacion
	public function procesarFormulario() {
        $data = [
            'pacienteDocumento' => request->pacienteDocumento
        ];

        $res = $this->pedAlmMenuPaciModelo->validarIdentificacion($data);

        if ($res->cant === 0) {
            return response->code(500)->error('No existe coincidencias con el número de documento');
        }

        return $this->pedAlmMenuPaciModelo->readIdByDocument($data);
    }

    // Consultar datos de la persona
    public function consultarAlmMenuIdControlador(string $idPaciente) {
        return $this->pedAlmMenuPaciModelo->consultarAlmMenuIdModelo([
            'idPaciente' => (int) $idPaciente
        ]);
    }

    // consultar menus disponibles dependiendo el dia
    public function consultarMenuDiaControlador() {
      $dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
      $dia = $dias[date('w')];
      $semana = (int) date('W');
      $anio = date("Y");

      return [
        'data' => $this->pedAlmMenuPaciModelo->consultarMenuModelo($dia, (($semana % 2) == 0 ? 1 : 0)),
        'n-week' => (($semana % 2) == 0 ? 2 : 1),
        'day' => $dia,
        'week' => $semana,
        'date' => [
            'from' => date("Y-m-d", strtotime("{$anio}-W{$semana}-1")),
            'to' => date("Y-m-d", strtotime("{$anio}-W{$semana}-7"))]
        ];
    }

    // registrar menu selecionado del dia
    public function registrarMenuDiaControlador() {

        $res = $this->pedAlmMenuPaciModelo->registrarMenuDiaModelo([
            'idPaciente' => request->idPaciente,
            'idNutriMenu' => request->idNutriMenu,
            'list' => trim(request->selected_list),
            'date' => date('Y-m-d')
        ]);

        if ($res->status === "database-error") {
            return response->code(500)->error('Error al momento de registrar');
        }

        return response->code(200)->success('registrado correctamente');
    }

    // conculatar Amuerzo paciente Apartado
    public function consultarAlmMenuApartPaciControlador() {
        return $this->pedAlmMenuPaciModelo->consultarAlmMenuApartPaciModelo();
    }

    // Generador de Reportes
    public function generateReportPaciDates() {
        if (!isset(request->date_start, request->date_end)) {
            return response->code(500)->error("Debe agregar la fecha de inicio y fin para generar el reporte");
        }

        $all_menu = $this->pedAlmMenuPaciModelo->generateReportDatesPaciDB();
        if (isset($all_menu->status)) {
            return response->code(204)->finish();
        }

        $cont = 3;
        Spreadsheet::load("../src/Views/assets/excel/reporte-almuerzos-pacientes.xlsx");

        foreach ($all_menu as $key => $menu) {
            Spreadsheet::setCell("A{$cont}", (($cont - 3) + 1));
            Spreadsheet::setCell("B{$cont}", $menu->pacienteDocumento);
            Spreadsheet::setCell("C{$cont}", $menu->pacienteNombre);
            Spreadsheet::setCell("D{$cont}", $menu->pacienteCama);
            Spreadsheet::setCell("E{$cont}", $menu->menuSeleccionadoDiaPaciente);
            Spreadsheet::setCell("F{$cont}", $menu->fecha_actual);
            $cont++;
        }

        $path = "../src/Views/assets/excel/";
        $file_name = "reporte-almuerzos-pacientes-" . date("Y-m-d") . ".xlsx";

        Spreadsheet::save($path . $file_name);
        Spreadsheet::download($path, $file_name);
    }
}
