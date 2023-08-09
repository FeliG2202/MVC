<?php
$almEnergeControlador = new AlmEnergeControlador();
$request = $almEnergeControlador->eliminarAlmEnergeControlador();
$datosAlmEnerge = $almEnergeControlador->consultarAlmEnergeControlador();

if ($request != null) {
	if ($request->request) {
		TemplateControlador::redirect($request->url);
	}
}
?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Energetico</h1>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table id="datatablesSimple">
			<thead>
				<tr>
					<th>Nombre del Energetico</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre del Energetico</th>
					<th>Opciones</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				foreach ($datosAlmEnerge as $keyAlmEnerge => $valueAlmEnerge) {
					print '<tr>';
					print '<td>' . $valueAlmEnerge['nutriEnergeNombre'] . '</td>';

					print '<td>
						<a href="index.php?folder=frmAlmEnerge&view=frmAlmEditEnerge&id=' . $valueAlmEnerge['idNutriEnerge'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
						<a href="index.php?folder=frmAlmEnerge&view=frmAlmDeltEnerge&id=' . $valueAlmEnerge['idNutriEnerge'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
						</td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmAlmEnerge&view=frmAlmRegEnerge">Registrar Energetico</a>
	</div>
</div>

