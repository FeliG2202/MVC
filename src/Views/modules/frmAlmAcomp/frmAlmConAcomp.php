<div class="col-12 col-sm-12 col-md-11 col-lg-10 mx-auto">
	<h2 class="mt-4 text-center">Tipos de Acompañamientos</h2>

	<div class="card mb-4">
		<div class="card-body">
			<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
				<a href="index.php?folder=frmAlmAcomp&view=frmAlmRegAcomp" class="btn btn-outline-secondary">
					<i class="fas fa-reply me-2"></i>Atrás
				</a>

				<button type="button" class="btn btn-outline-dark" id="btn-reload">
					<i class="fas fa-repeat"></i>
				</button>
			</div>

			<hr>

			<div class="table-responsive">
				<table class="table table-hover table-sm w-100" id="table-menu">
					<thead>
						<tr>
							<th>Nombre del Acompañamiento</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-acomp-menus-edit" tabindex="-1" aria-labelledby="modal-acomp-menus-editLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title text-white" id="modal-acomp-menus-editLabel">Edición</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<input type="hidden" class="form-control mb-3" id="idproduct1">
				<input type="text" class="form-control" id="product1_name">
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="btn-delete-acomp-menu">
					<i class="fas fa-file-times me-2"></i>Eliminar
				</button>
				<button type="button" class="btn btn-warning" id="btn-update-acomp-menu">
					<i class="fas fa-file-edit me-2"></i>Actualizar
				</button>
			</div>
		</div>
	</div>
</div>

<!-- ================================backend================================== -->


<script type="text/javascript">
	const myModal = new bootstrap.Modal('#modal-acomp-menus-edit', {
		keyboard: false
	});

	// HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
	// Y HACE LA FUNCION "CLICK" PARA EL MODAL
	function readAcomps() {
		axios.get(`${host}/api/product/1/read`).then(res => {
			if (!res.data.status) {
				new DataTable('#table-menu', {
					data: res.data,
					destroy: true,
					responsive: true,
					language: {
						url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json",
					},
					columns: [
						{ data: 'product1_name' },
						],
					createdRow: (html, row, index) => {
						html.setAttribute("role", "button");
						html.addEventListener("click", () => {
							document.getElementById("idproduct1").value = row.idproduct1;
							document.getElementById("product1_name").value = row.product1_name;
							myModal.show();
						});
					},
				});
			}
		});
	}

	const btn_reload = document.getElementById("btn-reload");

	if (btn_reload) {
		btn_reload.addEventListener("click", () => {
			readAcomps();
		});
	}

	// DETERMINO LAS VARIABLE DE ELIMINAR Y ACTUALIZAR
	const btn_delete = document.getElementById("btn-delete-acomp-menu");
	const btn_update = document.getElementById("btn-update-acomp-menu");

	// ENVIO A LA API LA FUNCION DE ELIMINAR
	if (btn_delete) {
		btn_delete.addEventListener("click", () => {
			if (confirm("Está seguro de eleminar este menu?")) {
				const idproduct1 = document.getElementById("idproduct1").value;

				axios.delete(`${host}/api/product/1/delete/${idproduct1}`).then(res => {
					console.log(res)
					readAcomps();
					myModal.hide();
				}).catch(err => {

				});
			}
		});
	}

	// ENVIO  A LA API LA FUNCION DE ACTUALIZAR
	if (btn_update) {
		btn_update.addEventListener("click", () => {
			if (confirm("Está seguro de actualizar este menu?")) {
				const idproduct1 = document.getElementById("idproduct1").value;
				const form = {
					product1_name: document.getElementById("product1_name").value
				};

				axios.put(`${host}/api/product/1/update/${idproduct1}`, form)
				.then(res => {
					console.log(res.data)
					readAcomps();
					myModal.hide();
				}).catch(err => {

				});
			}
		});
	}

	(function() {
		readAcomps();
	})();
</script>

