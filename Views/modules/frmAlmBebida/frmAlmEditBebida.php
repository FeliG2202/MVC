<?php
$almBebidaControlador = new AlmBebidaControlador();
$request = $almBebidaControlador->actualizarAlmBebidaControlador();
$datosBebida = $almBebidaControlador->consultarAlmBebidaIdControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="row">
	<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Editar Bebida</h2>
		<hr>
		<?php TemplateControlador::response(
			$request,
			"",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>
		<form class="form" method="post">
			<label for="" class="form-label">Nombres de la Bebida</label>
			<input type="text" name="nombreBebida" value="<?php print $datosBebida[0]['nutriBebidaNombre'] ?>" class="form-control" required>
			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="updBebida" class="btn btn-success">Actualizar</button>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmBebida&view=frmAlmConBebida">Consultar Bebida</a>
			</div>
		</form>
	</div>
</div>