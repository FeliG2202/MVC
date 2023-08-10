<?php

namespace PHP\Controllers;

use PHP\Models\AlmAcompModelo;

class AlmAcompControlador
{

	private $AlmAcompModelo;

	function __construct()
	{
		$this->AlmAcompModelo = new AlmAcompModelo();
	}

	public function registrarAlmACompControlador()
	{
		if (isset($_POST['regAlmAcomp'])) {
			$response = $this->AlmAcompModelo->registrarAlmAcompModelo($_POST['nombreAcomp']);
			if (!$response){
				(object) [
					'request' => false,
					'url' => "index.php?folder=frmAlmAcomp&view=frmAlmRegAcomp"
				];
			}

			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmAlmAcomp&view=frmAlmConAcomp"
			];
		}
	}

	public function consultarAlmACompControlador()
	{
		if (isset($_POST['btnBuscarAcomp'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		} else {
			$rolBuscado = '';
		}

		return $this->AlmAcompModelo->consultarAlmAcompModelo($rolBuscado);
	}

	public function consultarAlmACompIdControlador()
	{
		if (isset($_GET['id'])) {
			return $this->AlmAcompModelo->consultarAlmACompIdModelo($_GET['id']);
		}
	}

	public function actualizarAlmACompControlador()
	{
		if (isset($_POST['updAcomp'])) {
			$response = $this->AlmAcompModelo->actualizarAlmAcompModelo([
				'nombreAcomp' => $_POST['nombreAcomp'],
				'id' => $_GET['id']
			]);

			if (!$response){
				return (object) [
					'request' => false,
					'url' => "index.php?folder=frmAlmAcomp&view=frmAlmEditAcomp&status=error&message=Ocurrió un error al actualizar el Acompañamiento"
				];
			}

			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmAlmAcomp&view=frmAlmConAcomp&status=success&message=Acompañamiento actualizado correctamente"
			];
		}
	}

	public function eliminarAlmACompControlador()
	{
		if (isset($_GET['id'])) {
			$response = $this->AlmAcompModelo->eliminarAlmAcompModelo($_GET['id']);

			if (!$response){
				return (object) [
					'request' => false,
					'url' => "index.php?folder=frmAlmAcomp&view=frmAlmConAcomp"
				];
			}
			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmAlmAcomp&view=frmAlmConAcomp"
			];
		}
	}

	public function listarAlmAcompMenuControlador()
	{
		return $this->AlmAcompModelo->listarAlmAcompMenuModelo();
	}
}
