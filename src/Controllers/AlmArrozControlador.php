<?php

namespace PHP\Controllers;

use PHP\Models\AlmArrozModelo;

class AlmArrozControlador {

	private $almArrozModelo;

	function __construct() {
		$this->almArrozModelo = new AlmArrozModelo();
	}

	public function registrarAlmArrozControlador() {
		if (isset($_POST['regAlmArroz'])) {
			$response = $this->almArrozModelo->registrarAlmArrozModelo($_POST['nombreArroz']);

			if (!$response) {
				(object) [
					'request' => false,
					'url' => "index.php?folder=frmAlmArroz&view=frmAlmRegArroz"
				];
			}
		}

		return (object) [
			'request' => true,
			'url' => "index.php?folder=frmAlmArroz&view=frmAlmConArroz"
		];
	}

	public function consultarAlmArrozControlador()
	{
		if (isset($_POST['btnBuscarArroz'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->almArrozModelo->consultarAlmArrozModelo($rolBuscado);
	}

	public function consultarAlmArrozIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->almArrozModelo->consultarAlmArrozIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmArrozControlador()
	{
		if (isset($_POST['updArroz'])) {
			$response = $this->almArrozModelo->actualizarAlmArrozModelo([
				'nombreArroz' => $_POST['nombreArroz'],
				'id' => $_GET['id']
			]);

			if (!$response) {
				return (object) [
					'request' => false,
					'url' => "index.php?folder=frmAlmArroz&view=frmAlmEditArroz"
				];
			}
			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmAlmArroz&view=frmAlmConArroz"
			];
		}
	}

	public function eliminarAlmArrozControlador()
	{
		if (isset($_GET['id'])) {
			$response = $this->almArrozModelo->eliminarAlmArrozModelo($_GET['id']);
			if (!$response) {
				return (object) [
					'request' => false,
					'url' => "index.php?folder=frmAlmArroz&view=frmAlmConArroz"
				];
			}
			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmAlmArroz&view=frmAlmConArroz"
			];
		}
	}
	public function listarAlmArrozMenuControlador()
	{
		return $this->almArrozModelo->listarAlmArrozMenuModelo();
	}
}
