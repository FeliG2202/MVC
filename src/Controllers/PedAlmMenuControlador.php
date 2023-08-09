<?php

namespace PHP\Controllers;

use PHP\Models\PedAlmMenuModelo;

class PedAlmMenuControlador
{

	private $PedAlmMenuModelo;

	public function __construct()
	{
		$this->PedAlmMenuModelo = new PedAlmMenuModelo();
	}

	public function procesarFormulario()
	{
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

	public function consultarAlmMenuIdControlador()
	{
		if (isset($_GET['idPersona'])) {
			return $this->PedAlmMenuModelo->consultarAlmMenuIdModelo($_GET['idPersona']);
		}
	}

	public function consultarMenuDiaControlador()
	{
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

	public function registrarMenuDiaControlador()
	{
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
}
