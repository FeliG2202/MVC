<?php

use PHP\Controllers\AlmProteControlador;
use PHP\Controllers\TemplateControlador;

$almProteControlador = new AlmProteControlador();
$request = $almProteControlador->actualizarAlmProteControlador();
$datosProte = $almProteControlador->consultarAlmProteIdControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="row">
<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Editar Proteína</h2>
		<hr>
		<?php TemplateControlador::response(
			$request,
			"",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>
		<form class="form" method="post">
			<label for="" class="form-label">Nombre de la Proteína</label>
			<input type="text" name="nombreProte" value="<?php print $datosProte[0]['nutriProteNombre'] ?>" class="form-control" required>
			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="updProte" class="btn btn-success">Actualizar</button>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmProte&view=frmAlmConProte">Consultar Proteína</a>
			</div>
		</form>
	</div>
</div>