<?php
$almAcompControlador = new AlmAcompControlador();
$request = $almAcompControlador->registrarAlmACompControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
	<h2 class="text-center">Registrar Acompañamiento</h2>
	<hr>
	<?php TemplateControlador::response(
		$request,
		"Acompañamiento registrado correctamente",
		"Ocurrio un error, Intentelo de nuevo"
	); ?>
	<form class="form" method="POST">
		<div class="row mb-3">
			<label for="" class="form-label">Nombre del Acompañamiento</label>
			<input type="text" name="nombreAcomp" class="form-control" required>
		</div>
		<br>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<button type="submit" name="regAlmAcomp" class="btn btn-success">Registrar</button>
		</div>

		<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
			<a href="index.php?folder=frmAlmAcomp&view=frmAlmConAcomp">Consultar acompañamientos</a>
		</div>
	</form>
</div>