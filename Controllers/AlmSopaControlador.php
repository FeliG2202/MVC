<?php

class AlmSopaControlador
{

	private $AlmSopaModelo;

	function __construct()
	{
		$this->AlmSopaModelo = new AlmSopaModelo();
	}

	public function registrarAlmSopaControlador()
	{
		if (isset($_POST['regAlmSopa'])) {
			return !$this->AlmSopaModelo->registrarAlmSopaModelo($_POST['nombreSopa'])
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

		return $this->AlmSopaModelo->consultarAlmSopaModelo($rolBuscado);
	}

	public function consultarAlmSopaIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->AlmSopaModelo->consultarAlmSopaIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmSopaControlador()
	{
		if (isset($_POST['updSopa'])) {
			$datosAlmSopa = [
				'nombreSopa' => $_POST['nombreSopa'],
				'id' => $_GET['id']
			];
			return !$this->AlmSopaModelo->actualizarAlmSopaModelo($datosAlmSopa)
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmRegSopa"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmConSopa"];
		}
	}

	public function eliminarAlmSopaControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->AlmSopaModelo->eliminarAlmSopaModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmRegSopa"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmSopa&view=frmAlmConSopa"];
		}
	}

	public function listarAlmSopaMenuControlador()
	{
		return $this->AlmSopaModelo->listarAlmSopaMenuModelo();
	}
}
