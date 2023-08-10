<?php

use PHP\Controllers\AlmEnsalControlador;
use PHP\Controllers\TemplateControlador;

$almEnsalControlador = new AlmEnsalControlador();
$request = $almEnsalControlador->eliminarAlmEnsalControlador();
$datosAlmEnsal = $almEnsalControlador->consultarAlmEnsalControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Ensalada</h1>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table id="datatablesSimple">
			<thead>
				<tr>
					<th>Nombre de la Ensalañamiento</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre de la Ensalañamiento</th>
					<th>Opciones</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				foreach ($datosAlmEnsal as $keyAlmEnsal => $valueAlmEnsal) {
					print '<tr>';
					print '<td>' . $valueAlmEnsal['nutriEnsalNombre'] . '</td>';

					print '<td>
					<a href="index.php?folder=frmAlmEnsal&view=frmAlmEditEnsal&id=' . $valueAlmEnsal['idNutriEnsal'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
					<a href="index.php?folder=frmAlmEnsal&view=frmAlmDeltEnsal&id=' . $valueAlmEnsal['idNutriEnsal'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
					</td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmAlmEnsal&view=frmAlmRegEnsal">Registrar Ensalada</a>
	</div>
</div>

