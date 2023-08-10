<?php

use PHP\Controllers\AlmArrozControlador;
use PHP\Controllers\TemplateControlador;

$almArrozControlador = new AlmArrozControlador();
$request = $almArrozControlador->actualizarAlmArrozControlador();
$datosArroz = $almArrozControlador->consultarAlmArrozIdControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<div class="row">
	<div class="col-lg-6 mx-auto mt-5 mb-5 p-4 shadow-sm rounded">
		<h2 class="text-center">Editar Arroz</h2>
		<hr>
		<?php TemplateControlador::response(
			$request,
			"",
			"Ocurrio un error, Intentelo de nuevo"
		); ?>
		<form class="form" method="post">
			<label for="" class="form-label">Nombre del Arroz</label>
			<input type="text" name="nombreArroz" value="<?php print $datosArroz[0]['nutriArrozNombre'] ?>" class="form-control" required>
			<br>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" name="updArroz" class="btn btn-success">Actualizar</button>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmArroz&view=frmAlmConArroz">Consultar Arroz</a>
			</div>
		</form>
	</div>
</div>