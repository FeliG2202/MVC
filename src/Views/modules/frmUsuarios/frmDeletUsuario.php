<?php 

$usuarioControlador = new UsuarioControlador();
$request = $usuarioControlador->eliminarUsuarioControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>