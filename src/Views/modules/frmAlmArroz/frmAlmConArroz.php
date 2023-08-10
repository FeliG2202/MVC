<?php

use PHP\Controllers\AlmArrozControlador;

$almArrozControlador = new AlmArrozControlador();
$request = $almArrozControlador->eliminarAlmArrozControlador();
$datosAlmArroz = $almArrozControlador->consultarAlmArrozControlador();

if (isset($request)) { ?>
	<script type="text/javascript">
		window.location.href = "<?php echo (!$request[0] ? $request[1] : $request[1]); ?>";
	</script>
<?php } ?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Arroz</h1>
<div class="card mb-4 p-4">
	<div class="card-body">
		<table id="datatablesSimple">
			<thead>
				<tr>
					<th>Nombre del Arroz</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre del Arroz</th>
					<th>Opciones</th>
				</tr>
			</tfoot>
			<tbody>
				<?php
				foreach ($datosAlmArroz as $keyAlmArroz => $valueAlmArroz) {
					print '<tr>';
					print '<td>' . $valueAlmArroz['nutriArrozNombre'] . '</td>';

					print '<td>
					<a href="index.php?folder=frmAlmArroz&view=frmAlmEditArroz&id=' . $valueAlmArroz['idNutriArroz'] . '"><i class="fad fa-file-edit fa-lg text-success"></i></a>
					<a href="index.php?folder=frmAlmArroz&view=frmAlmDeltArroz&id=' . $valueAlmArroz['idNutriArroz'] . '"><i class="fad fa-file-times fa-lg text-danger"></i></a>
					</td>';
					print "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmAlmAcomp&view=frmAlmRegAcomp">Registrar Arroz</a>
	</div>
</div>

