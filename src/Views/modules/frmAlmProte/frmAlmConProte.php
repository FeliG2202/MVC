<?php

use PHP\Controllers\AlmProteControlador;
use PHP\Controllers\TemplateControlador;

$almProteControlador = new AlmProteControlador();
$request = $almProteControlador->eliminarAlmProteControlador();
$datosAlmProte = $almProteControlador->consultarAlmProteControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Proteína</h1>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table class="table table-hover table-sm w-100" id="table-menu">
			<thead>
				<tr>
					<th>Nombre de la Proteína</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($datosAlmProte as $keyAlmProte => $valueAlmProte) {
					print '<tr>';
					print '<td>' . $valueAlmProte['nutriProteNombre'] . '</td>';

					print '<td>
					<a href="index.php?folder=frmAlmProte&view=frmAlmEditProte&id=' . $valueAlmProte['idNutriProte'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
					<a href="index.php?folder=frmAlmProte&view=frmAlmDeltProte&id=' . $valueAlmProte['idNutriProte'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
					</td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmAlmProte&view=frmAlmRegProte">Registrar Proteina</a>
	</div>
</div>

