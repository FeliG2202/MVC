<?php

use PHP\Controllers\AlmSopaControlador;
use PHP\Controllers\TemplateControlador;

$almSopaControlador = new AlmSopaControlador();
$request = $almSopaControlador->registrarAlmSopaControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="row">
	<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Registrar Sopa</h2>
		<hr>

		<?php TemplateControlador::response(
			$request,
			"Sopa Registrada Correctamente",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>

		<form class="form" method="post">
			<div class="row mb-3">
				<label for="" class="form-label">Nombre de la Sopa</label>
				<input type="text" name="nombreSopa" class="form-control" required>
			</div>
			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="regAlmSopa" class="btn btn-success">Registrar</button>
			</div>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmSopa&view=frmAlmConSopa">Consultar Sopa</a>
			</div>
		</form>
	</div>
</div>