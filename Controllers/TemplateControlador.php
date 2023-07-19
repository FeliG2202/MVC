<?php 


class TemplateControlador {
	////CARGAR EL TEMPLATE EN EL INDEX /////
	function cargarTemplate(): string {
		return "Views/template.php";
	}

	////CARGAR LAS PAGINAS AL TEMPLATE////
	public function cargarPaginaAlTemplate(): string {
		$templateModelo = new TemplateModelo();
	
		// Check if $_GET['action'] is set, otherwise default to 'inicio'
		$action = isset($_GET['action']) ? $_GET['action'] : 'inicio';
	
		// Call the validarEnlacesModelo() method of TemplateModelo and return the generated link
		return $templateModelo->validarEnlacesModelo($action);
	}

}