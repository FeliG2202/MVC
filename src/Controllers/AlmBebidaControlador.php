<?php

namespace PHP\Controllers;

use PHP\Models\AlmBebidaModelo;

class AlmBebidaControlador
{

	private $AlmBebidaModelo;

	function __construct()
	{
		$this->AlmBebidaModelo = new AlmBebidaModelo();
	}

	public function registrarAlmBebidaControlador()
	{
		if (isset($_POST['regAlmBebida'])) {
			$response = $this->AlmBebidaModelo->registrarAlmBebidaModelo($_POST['nombreBebida']);
			if (!$response){
				(object) [
					'request' => false,
					'url' => "index.php?folder=frmAlmBebida&view=frmAlmRegBebida"];
				}
				return (object) [
					'request' => true,
					'url' => "index.php?folder=frmAlmBebida&view=frmAlmConBebida"
				];
			}
		}

		public function consultarAlmBebidaControlador()
		{
			if (isset($_POST['btnBuscarBebida'])) {
				if (isset($_POST['datoBusqueda'])) {
					$rolBuscado = $_POST['datoBusqueda'];
				}
			} else {
				$rolBuscado = '';
			}

			return $this->AlmBebidaModelo->consultarAlmBebidaModelo($rolBuscado);
		}

		public function consultarAlmBebidaIdControlador()
		{
			if (isset($_GET['id'])) {
				return $this->AlmBebidaModelo->consultarAlmBebidaIdModelo($_GET['id']);
			}
		}

		public function actualizarAlmBebidaControlador()
		{
			if (isset($_POST['updBebida'])) {
				$response = $this->AlmBebidaModelo->actualizarAlmBebidaModelo([
					'nombreBebida' => $_POST['nombreBebida'],
					'id' => $_GET['id']
				]);
				if (!$response){
					return (object) [
						'request' => false,
						'url' => "index.php?folder=frmAlmBebida&view=frmAlmEditBebida"
					];
				}
				return (object) [
					'request' => true,
					'url' => "index.php?folder=frmAlmBebida&view=frmAlmConBebida"
				];
			}
		}

		public function eliminarAlmBebidaControlador()
		{
			if (isset($_GET['id'])) {
				$reponse = $this->AlmBebidaModelo->eliminarAlmBebidaModelo($_GET['id']);
				if (!$reponse) {
					return (object) [
						'request' => false,
						'url' => "index.php?folder=frmAlmBebida&view=frmAlmConBebida"
					];
				}
				return (object) [
					'request' => true,
					'url' => "index.php?folder=frmAlmBebida&view=frmAlmConBebida"
				];
			}
		}

		public function listarAlmBebidaMenuControlador()
		{
			return $this->AlmBebidaModelo->listarAlmBebidaMenuModelo();
		}
	}
