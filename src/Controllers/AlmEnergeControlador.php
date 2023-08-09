<?php

class AlmEnergeControlador
{

	private $AlmEnergeModelo;

	function __construct()
	{
		$this->AlmEnergeModelo = new AlmEnergeModelo();
	}

	public function registrarAlmEnergeControlador()
	{
		if (isset($_POST['regAlmEnerge'])) {
			return !$this->AlmEnergeModelo->registrarAlmEnergeModelo($_POST['nombreEnerge'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmEnerge&view=frmAlmRegEnerge"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmEnerge&view=frmAlmRegEnerge"];
		}
	}

	public function consultarAlmEnergeControlador()
	{
		if (isset($_POST['btnBuscarEnerge'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->AlmEnergeModelo->consultarAlmEnergeModelo($rolBuscado);
	}

	public function consultarAlmEnergeIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->AlmEnergeModelo->consultarAlmEnergeIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmEnergeControlador()
	{
		if (isset($_POST['updEnerge'])) {
			$datosAlmEnerge = [
				'nombreEnerge' => $_POST['nombreEnerge'],
				'id' => $_GET['id']
			];
			return !$this->AlmEnergeModelo->actualizarAlmEnergeModelo($datosAlmEnerge)
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmEnerge&view=frmAlmRegEnerge"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmEnerge&view=frmAlmConEnerge"];
		}
	}

	public function eliminarAlmEnergeControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->AlmEnergeModelo->eliminarAlmEnergeModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmEnerge&view=frmAlmConEnerge"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmEnerge&view=frmAlmConEnerge"];
		}
	}

	public function listarAlmEnergeMenuControlador()
	{
		return $this->AlmEnergeModelo->listarAlmEnergeMenuModelo();
	}
}
