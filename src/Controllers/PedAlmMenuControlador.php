<?php

namespace PHP\Controllers;

use LionMailer\Services\Symfony\Mail;
use LionSpreadsheet\Spreadsheet;
use PHP\Models\PedAlmMenuModelo;

class PedAlmMenuControlador {

	private $PedAlmMenuModelo;

	public function __construct() {
		$this->PedAlmMenuModelo = new PedAlmMenuModelo();
	}

    private function generateCode(): string {
        return rand(100, 999) . "-" . rand(100, 999);
    }

    public function validatePage() {
        $data = $this->PedAlmMenuModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);

        if ($data->personasCodigo === null) {
            return null;
        }

        return (object) [
            'request' => true,
            'url' => "index.php?folder=frmPed&view=frmPedPersId"
        ];
    }

	public function procesarFormulario() {
		if (isset($_POST['btnPedDatosPers'])) {
			$row = $this->PedAlmMenuModelo->validarIdentificacion((int) $_POST['identMenu']);

			if (!$row) {
				return (object) ['request' => false, 'url' => "index.php?folder=frmPed&view=frmPedPersId"];
			}

			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmPed&view=frmPedDatosPers&idPersona={$row['idPersona']}"
			];
		}
	}

	public function consultarAlmMenuIdControlador() {
		if (isset($_GET['idPersona'])) {
            $code = $this->generateCode();
            $data = $this->PedAlmMenuModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);

            if ($data->personasCodigo === null) {
                $this->PedAlmMenuModelo->updateCode([
                    'idPersona' => (int) $_GET['idPersona'],
                    'code' => $code
                ]);

                Mail::address($data->personaCorreo)
                    ->subject('Codigo de verificación')
                    ->body("CODIGO: <strong>{$code}</strong>")
                    ->altBody("CODIGO: {$code}")
                    ->send();
            }

			return $data;
		}
	}

    public function validateCode() {
        if (isset($_POST['btnValCode'], $_POST['cod-1'], $_POST['cod-2'], $_POST['cod-3'], $_POST['cod-4'], $_POST['cod-5'], $_POST['cod-6'])) {
            $data = $this->PedAlmMenuModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);
            $str_code = trim("{$_POST['cod-1']}{$_POST['cod-2']}{$_POST['cod-3']}-{$_POST['cod-4']}{$_POST['cod-5']}{$_POST['cod-6']}");

            if ($str_code === $data->personasCodigo) {
                $this->PedAlmMenuModelo->updateCode([
                    'idPersona' => (int) $_GET['idPersona'],
                    'code' => null
                ]);

                return (object) [
                    'request' => true,
                    'url' => "index.php?folder=frmPed&view=frmPedMenu&idPersona={$_GET['idPersona']}"
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
			'data' => $this->PedAlmMenuModelo->consultarMenuModelo($dia, (($semana % 2) == 0 ? 1 : 0)),
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
			return !$this->PedAlmMenuModelo->registrarMenuDiaModelo([
				'idPersona' => (int) $_POST['selected-idp'],
				'idMenu' => (int) $_POST['selected-idm'],
				'list' => $_POST['selected-list'],
				'date' => date('Y-m-d')
			])
				? (object) ['request' => false, 'url' => "index.php?folder=frmPed&view=frmPedPersId"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmPed&view=frmPedPersId"];
		}
	}

    public function consultarAlmMenuApartControlador(){
        return $this->PedAlmMenuModelo->consultarAlmMenuApartModelo();
    }

    public function generateReport() {
        $cont = 3;
        $all_menu = $this->consultarAlmMenuApartControlador();
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
