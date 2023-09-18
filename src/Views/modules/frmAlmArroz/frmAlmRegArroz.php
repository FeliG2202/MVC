<div class="row">
	<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
		<h2 class="text-center">Registrar Arroz</h2>
		<hr>

		<div class="gap-2 d-md-flex justify-content-md-end my-2">
			<a href="index.php?folder=frmAlmArroz&view=frmAlmConArroz" class="btn btn-outline-secondary">
				<i class="fas fa-search me-2"></i>Consultar
			</a>
		</div>

		<form class="form" id="form-create-arroz">
			<div class="row mb-3">
				<label for="" class="form-label">Nombre del Arroz</label>
				<input type="text" id="product2_name" class="form-control" required>
			</div>
			<br>
			
			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button type="submit" id="regAlmArroz" class="btn btn-success">Registrar</button>
			</div>
		</form>
	</div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
    document.getElementById("form-create-arroz").addEventListener("submit", (event) => {
        event.preventDefault();

        axios.post(`${host}/api/product/2/create`, {
            product2_name: document.getElementById("product2_name").value,
            regAlmArroz: document.getElementById("regAlmArroz").value
        })
        .then(res => {
            // console.log(res);
            if (res.data.status === "success") {
                window.location.href = `${url}/index.php?folder=frmAlmArroz&view=frmAlmConArroz`;
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
</script>