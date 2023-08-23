<?php

use PHP\Controllers\AlmSopaControlador;
use PHP\Controllers\TemplateControlador;

$almSopaControlador = new AlmSopaControlador();
$request = $almSopaControlador->eliminarAlmSopaControlador();
$datosAlmSopa = $almSopaControlador->consultarAlmSopaControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Sopas</h1>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table class="table table-hover table-sm w-100" id="table-menu">
			<thead>
				<tr>
					<th>Nombre de la Sopa</th>
					<th colspan="2">Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($datosAlmSopa as $keyAlmSopa => $valueAlmSopa) {
					print '<tr>';
					print '<td>' . $valueAlmSopa['nutriSopaNombre'] . '</td>';

					print '<td>
						<a href="index.php?folder=frmAlmSopa&view=frmAlmEditSopa&id=' . $valueAlmSopa['idNutriSopa'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
						<a href="index.php?folder=frmAlmSopa&view=frmAlmDeltSopa&id=' . $valueAlmSopa['idNutriSopa'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
						</td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmAlmSopa&view=frmAlmRegSopa">Registrar Sopa</a>
	</div>
</div>
