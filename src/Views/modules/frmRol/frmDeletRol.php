<?php 

$rolControlador = new RolControlador(0);
$request = $rolControlador->eliminarRolControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>