<?php

class AlmProteControlador
{

	private $AlmProteModelo;

	function __construct()
	{
		$this->AlmProteModelo = new AlmProteModelo();
	}
	
	/* FUNCION PARA REGISTRAR PROTEINA */
	public function registrarAlmProteControlador()
	{
		if (isset($_POST['regAlmProte'])) {
			return !$this->AlmProteModelo->registrarAlmProteModelo($_POST['nombreProte'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmProte&view=frmAlmRegProte"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmProte&view=frmAlmConProte"];
		}
	}

	/* FUNCION PARA CONSULTAR PROTEINA */
	public function consultarAlmProteControlador()
	{
		if (isset($_POST['btnBuscarProte'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->AlmProteModelo->consultarAlmProteModelo($rolBuscado);
	}

	public function consultarAlmProteIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->AlmProteModelo->consultarAlmProteIdModelo($_GET['id']);
		}
	}

	/* FUNCION PARA ACTUALIZAR PROTEINA */
	public function actualizarAlmProteControlador()
	{
		if (isset($_POST['updProte'])) {
			$datosAlmProte = [
				'nombreProte' => $_POST['nombreProte'],
				'id' => $_GET['id']
			];
			return !$this->AlmProteModelo->actualizarAlmProteModelo($datosAlmProte)
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmProte&view=frmAlmRegProte"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmProte&view=frmAlmConProte"];
		}
	}

	/* FUNCION PARA ELIMINAR PROTEINA */
	public function eliminarAlmProteControlador()
	{
		if (isset($_GET['id'])) {
			return !$this->AlmProteModelo->eliminarAlmProteModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmAlmProte&view=frmAlmRegProte"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmAlmProte&view=frmAlmConProte"];
		}
	}

	/* FUNCION PARA LLAMAR LO DATOS DE LA TABLA PROTEINA */
	public function listarAlmProteMenuControlador()
	{
		return $this->AlmProteModelo->listarAlmProteMenuModelo();
	}
}
