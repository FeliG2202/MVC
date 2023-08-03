<?php

class AlmArrozControlador
{

	private $AlmArrozModelo;

	function __construct()
	{
		$this->AlmArrozModelo = new AlmArrozModelo();
	}

	public function registrarAlmArrozControlador()
	{
		if (isset($_POST['regAlmArroz'])) {
			return !$this->AlmArrozModelo->registrarAlmArrozModelo($_POST['nombreArroz'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmArroz&view=frmAlmRegArroz"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmArroz&view=frmAlmConArroz"];
		}
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

		return $this->AlmArrozModelo->consultarAlmArrozModelo($rolBuscado);
	}

	public function consultarAlmArrozIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->AlmArrozModelo->consultarAlmArrozIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmArrozControlador()
	{
		if (isset($_POST['updArroz'])) {
			$datosAlmArroz = [
				'nombreArroz' => $_POST['nombreArroz'],
				'id' => $_GET['id']
			];
			return !$this->AlmArrozModelo->actualizarAlmArrozModelo($datosAlmArroz)
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmArroz&view=frmAlmEditArroz"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmArroz&view=frmAlmConArroz"];
		}
	}

	public function eliminarAlmArrozControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->AlmArrozModelo->eliminarAlmArrozModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmArroz&view=frmAlmConArroz"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmArroz&view=frmAlmConArroz"];
		}
	}

	public function listarAlmArrozMenuControlador()
	{
		return $this->AlmArrozModelo->listarAlmArrozMenuModelo();
	}
}
