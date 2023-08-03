<?php

$almTipoControlador = new AlmTipoControlador();
$request = $almTipoControlador->actualizarAlmTipoControlador();
$datosTipo = $almTipoControlador->consultarAlmTipoIdControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="row">
<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Editar Tipo de Menú</h2>
		<hr>
		<?php TemplateControlador::response(
			$request,
			"Tipo Menu Actualizado Correctamente",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>
		<form class="form" method="post">
			<label for="" class="form-label">Nombres del Tipo</label>
			<input type="text" name="nombreTipo" value="<?php print $datosTipo[0]['nutriTipoNombre'] ?>" class="form-control" required>
			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="updTipo" class="btn btn-success">Actualizar</button>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmTipo&view=frmAlmConTipo">Consultar Tipo de menú</a>
			</div>
		</form>
	</div>
</div>