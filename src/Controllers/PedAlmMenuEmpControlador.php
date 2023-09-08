<?php

namespace PHP\Controllers;

use LionMailer\Services\Symfony\Mail;
use LionSpreadsheet\Spreadsheet;
use PHP\Models\PedAlmMenuEmpModelo;

class PedAlmMenuControlador {

	private $PedAlmMenuEmpModelo;

	public function __construct() {
		$this->PedAlmMenuEmpModelo = new PedAlmMenuEmpModelo();
	}

    private function generateCode(): string {
        return rand(100, 999) . "-" . rand(100, 999);
    }

    public function validatePage() {
        $data = $this->PedAlmMenuEmpModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);

        if ($data->personasCodigo === null) {
            return null;
        }

        return (object) [
            'request' => true,
            'url' => "index.php?folder=frmPedEmp&view=frmPedEmpId"
        ];
    }

    public function procesarFormulario() {
      if (isset($_POST['btnPedDatosPers'])) {
         $row = $this->PedAlmMenuEmpModelo->validarIdentificacion((int) $_POST['identMenu']);

         if (!$row) {
            return (object) ['request' => false, 'url' => "index.php?folder=frmPedEmp&view=frmPedEmpId"];
        }

        return (object) [
            'request' => true,
            'url' => "index.php?folder=frmPedEmp&view=frmPedDatosEmp&idPersona={$row['idPersona']}"
        ];
    }
}

public function consultarAlmMenuIdControlador() {
  if (isset($_GET['idPersona'])) {
    $code = $this->generateCode();
    $data = $this->PedAlmMenuEmpModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);

    if ($data->personasCodigo === null) {
        $this->PedAlmMenuEmpModelo->updateCode([
            'idPersona' => (int) $_GET['idPersona'],
            'code' => $code
        ]);


        Mail::address($data->personaCorreo)
        ->subject('Codigo de verificación de Alfonso Bot')
        ->body("CODIGO DE VERIFICACIÓN: {$code}")
        ->altBody("CODIGO DE VERIFICACIÓN: {$code}")
        ->send();
    }

    return $data;
}
}

public function validateCode() {
    if (isset($_POST['btnValCode'], $_POST['cod-1'], $_POST['cod-2'], $_POST['cod-3'], $_POST['cod-4'], $_POST['cod-5'], $_POST['cod-6'])) {
        $data = $this->PedAlmMenuEmpModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);
        $str_code = trim("{$_POST['cod-1']}{$_POST['cod-2']}{$_POST['cod-3']}-{$_POST['cod-4']}{$_POST['cod-5']}{$_POST['cod-6']}");

        if ($str_code === $data->personasCodigo) {
            $this->PedAlmMenuEmpModelo->updateCode([
                'idPersona' => (int) $_GET['idPersona'],
                'code' => null
            ]);

            return (object) [
                'request' => true,
                'url' => "index.php?folder=frmPedEmp&view=frmPedMenuEmp&idPersona={$_GET['idPersona']}"
            ];
        }

        return (object) [
            'request' => false,
            'message' => "El código de verificación es incorrecto"
        ];
    }
}

public function consultarMenuDiaControlador() {
  $dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
  $dia = $dias[date('w')];
  $semana = (int) date('W');
  $anio = date("Y");

  return [
     'data' => $this->PedAlmMenuEmpModelo->consultarMenuModelo($dia, (($semana % 2) == 0 ? 1 : 0)),
     'n-week' => (($semana % 2) == 0 ? 2 : 1),
     'day' => $dia,
     'week' => $semana,
     'date' => [
        'from' => date("Y-m-d", strtotime("{$anio}-W{$semana}-1")),
        'to' => date("Y-m-d", strtotime("{$anio}-W{$semana}-7"))
    ]
];
}

public function registrarMenuDiaControlador() {
  if (isset($_POST['btnPedDatosPers'])) {
     return !$this->PedAlmMenuEmpModelo->registrarMenuDiaModelo([
        'idPersona' => (int) $_POST['selected-idp'],
        'idMenu' => (int) $_POST['selected-idm'],
        'list' => $_POST['selected-list'],
        'date' => date('Y-m-d')
    ])
     ? (object) ['request' => false, 'url' => "index.php?folder=frmPedEmp&view=frmPedEmpId"]
     : (object) ['request' => true, 'url' => "index.php?folder=frmPedEmp&view=frmPedEmpId"];
 }
}

public function consultarAlmMenuApartControlador(){
    return $this->PedAlmMenuEmpModelo->consultarAlmMenuApartModelo();
}


/*Generador de Reportes*/
public function generateReportDates() {
    if (!isset(request->date_start, request->date_end)) {
        return response->code(500)->error("Debe agregar la fecha de inicio y fin para generar el reporte");
    }

    $all_menu = $this->PedAlmMenuEmpModelo->generateReportDatesDB();
    if (isset($all_menu->status)) {
        return response->code(204)->finish();
    }

    $cont = 3;
    Spreadsheet::load("../src/Views/assets/excel/reporte-almuerzos.xlsx");

    foreach ($all_menu as $key => $menu) {
        Spreadsheet::setCell("A{$cont}", (($cont - 3) + 1));
        Spreadsheet::setCell("B{$cont}", $menu->personaNombreCompleto);
        Spreadsheet::setCell("C{$cont}", $menu->menuSeleccionadoDiaPersona);
        Spreadsheet::setCell("D{$cont}", $menu->fecha_actual);
        $cont++;
    }

    $path = "../src/Views/assets/excel/";
    $file_name = "reporte-almuerzos-" . date("Y-m-d") . ".xlsx";

    Spreadsheet::save($path . $file_name);
    Spreadsheet::download($path, $file_name);
}
}