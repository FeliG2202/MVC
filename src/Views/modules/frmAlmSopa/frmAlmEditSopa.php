<?php

$almSopaControlador = new AlmSopaControlador();
$request = $almSopaControlador->actualizarAlmSopaControlador();
$datosSopa = $almSopaControlador->consultarAlmSopaIdControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="row">
<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Editar Sopa</h2>
		<hr>
		<?php TemplateControlador::response(
			$request,
			"",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>
		<form class="form" method="post">
			<label for="" class="form-label">Nombre de la Sopa</label>
			<input type="text" name="nombreSopa" value="<?php print $datosSopa[0]['nutriSopaNombre'] ?>" class="form-control" required>
			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="updSopa" class="btn btn-success">Actualizar</button>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmSopa&view=frmAlmConSopa">Consultar Sopa</a>
			</div>
		</form>
	</div>
</div>