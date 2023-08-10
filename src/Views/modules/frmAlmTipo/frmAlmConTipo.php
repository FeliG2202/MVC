<?php

use PHP\Controllers\AlmTipoControlador;
use PHP\Controllers\TemplateControlador;

$almTipoControlador = new AlmTipoControlador();
$request = $almTipoControlador->eliminarAlmTipoControlador();
$datosAlmTipo = $almTipoControlador->consultarAlmTipoControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Tipo de Menú</h1>

<div class="card mb-4">
	<div class="card-body">
		<?php if(isset($_GET['status'], $_GET['message'])) {
			if ($_GET['status'] === "error") {
				TemplateControlador::error($_GET['message']);
			} else {
				TemplateControlador::success($_GET['message']);
			}
		} ?>

		<table id="datatablesSimple">
			<thead>
				<tr>
					<th>Nombre del Tipo de Menu</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre del Tipo de Menu</th>
					<th>Opciones</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				foreach ($datosAlmTipo as $keyAlmTipo => $valueAlmTipo) {
					print '<tr>';
					print '<td>' . $valueAlmTipo['nutriTipoNombre'] . '</td>';

					print '<td>
					<a href="index.php?folder=frmAlmTipo&view=frmAlmEditTipo&id=' . $valueAlmTipo['idNutriTipo'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
					<a href="index.php?folder=frmAlmTipo&view=frmAlmDeltTipo&id=' . $valueAlmTipo['idNutriTipo'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
					</td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmAlmTipo&view=frmAlmRegTipo">Registrar Tipo de Menú</a>
	</div>
</div>
