<?php 

$personaControlador = new PersonaControlador();
$request = $personaControlador->eliminarPersonaControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>