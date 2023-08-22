<?php

namespace PHP\Controllers;

use PHP\Models\AlmSopaModelo;

class AlmSopaControlador
{

	private $almSopaModelo;

	function __construct()
	{
		$this->almSopaModelo = new AlmSopaModelo();
	}

	public function registrarAlmSopaControlador()
	{
		if (isset($_POST['regAlmSopa'])) {
			return !$this->almSopaModelo->registrarAlmSopaModelo($_POST['nombreSopa'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmRegSopa"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmRegSopa"];
		}
	}

	public function consultarAlmSopaControlador()
	{
		if (isset($_POST['btnBuscarSopa'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->almSopaModelo->consultarAlmSopaModelo($rolBuscado);
	}

	public function consultarAlmSopaIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->almSopaModelo->consultarAlmSopaIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmSopaControlador()
	{
		if (isset($_POST['updSopa'])) {
			$datosAlmSopa = [
				'nombreSopa' => $_POST['nombreSopa'],
				'id' => $_GET['id']
			];
			return !$this->almSopaModelo->actualizarAlmSopaModelo($datosAlmSopa)
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmRegSopa"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmConSopa"];
		}
	}

	public function eliminarAlmSopaControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->almSopaModelo->eliminarAlmSopaModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmRegSopa"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmConSopa"];
		}
	}

	public function listarAlmSopaMenuControlador() {
		return $this->almSopaModelo->listarAlmSopaMenuModelo();
	}
}
