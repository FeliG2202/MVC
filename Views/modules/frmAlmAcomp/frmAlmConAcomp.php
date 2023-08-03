<?php
$almAcompControlador = new AlmAcompControlador();
$datosAlmAComp = $almAcompControlador->consultarAlmACompControlador();
$request = $almAcompControlador->eliminarAlmACompControlador();

if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}
?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Acompañamiento</h1>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table id="datatablesSimple">
			<thead>
				<tr>
					<th>Nombre del Acompañamiento</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre del Acompañamiento</th>
					<th>Opciones</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				foreach ($datosAlmAComp as $keyAlmAComp => $valueAlmAComp) {
					print '<tr>';
					print '<td>' . $valueAlmAComp['nutriAcompNombre'] . '</td>';

					print '<td>
                <a href="index.php?folder=frmAlmAcomp&view=frmAlmEditAComp&id=' . $valueAlmAComp['idNutriAcomp'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
                <a href="index.php?folder=frmAlmAcomp&view=frmAlmDeltAComp&id=' . $valueAlmAComp['idNutriAcomp'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
                </td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmAlmAcomp&view=frmAlmRegAcomp">Registrar Acompañamiento</a>
	</div>
</div>