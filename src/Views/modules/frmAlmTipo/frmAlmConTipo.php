<h1 class="mt-4 text-center">Consultar Tipo de Menú</h1>
<div class="card mb-4">
	<div class="card-body">
		<table class="table table-hover table-sm w-100" id="table-menu">
			<thead>
				<tr>
					<th>Nombre del Tipo de Menu</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<div class="gap-2 d-md-flex justify-content-md-end mt-2">
		<a href="index.php?folder=frmAlmTipo&view=frmAlmRegTipo">Registrar Tipo de Menú</a>
	</div>
</div>

<script type="text/javascript">
    (function() {
        axios.get(`${host}/api/frmAlmTipo/frmAlmConTipo/con-tipo`).then(res => {
            if (!res.data.status) {
                new DataTable('#table-menu', {
                    data: res.data,
                    columns: [
                        { data: 'nutriTipoNombre' }
                    ],
                });
            }
        });
    })();
</script>