<?php

if (!isset($_SESSION['session'])) {
	TemplateControlador::redirect("index.php?view=login");
}

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

		<form class="form" method="POST">
			<div class="mb-3">
				<label for="" class="form-label">Nombres del Tipo</label>
				<input type="text" name="nombreTipo" value="<?php echo ($datosTipo['nutriTipoNombre']); ?>" class="form-control" required autocomplete="off">
			</div>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<a href="index.php?folder=frmAlmTipo&view=frmAlmConTipo" class="btn btn-link">Atrás</a>
				<button type="submit" name="updTipo" class="btn btn-success">Actualizar</button>
			</div>
		</form>
	</div>
</div>