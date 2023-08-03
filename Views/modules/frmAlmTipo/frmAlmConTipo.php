<?php
$almTipoControlador = new AlmTipoControlador();
$request = $almTipoControlador->eliminarAlmTipoControlador();
$datosAlmTipo = $almTipoControlador->consultarAlmTipoControlador();

if (isset($request)) { ?>
	<script type="text/javascript">
		window.location.href = "<?php echo (!$request[0] ? $request[1] : $request[1]); ?>";
	</script>
<?php } ?>

<!--//////////////////////////////////////////////////////-->

<h1 class="mt-4 text-center">Consultar Tipo de Menú</h1>
<div class="card mb-4">
	<div class="card-body">
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
