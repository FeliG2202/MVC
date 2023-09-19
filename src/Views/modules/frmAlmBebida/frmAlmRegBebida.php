<div class="row">
    <div class="col-12 col-sm-10 col-md-7 col-lg-7  mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
        <h2 class="text-center">Registrar Bebida</h2>
        <hr>

        <div class="gap-2 d-md-flex justify-content-md-end my-2">
            <a href="index.php?folder=frmAlmBebida&view=frmAlmConBebida" class="btn btn-outline-secondary">
                <i class="fas fa-search me-2"></i>Consultar
            </a>
        </div>

        <form class="form" id="form-create-bebida">
            <div class="row mb-3">
                <label for="" class="form-label">Nombre de la Bebida</label>
                <input type="text" id="product3_name" class="form-control" required>
            </div>
            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="regAlmBebida" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
    document.getElementById("form-create-bebida").addEventListener("submit", (event) => {
        event.preventDefault();

        axios.post(`${host}/api/product/3/create`, {
            product3_name: document.getElementById("product3_name").value,
            regAlmBebida: document.getElementById("regAlmBebida").value
        })
        .then(res => {
            // console.log(res);
            if (res.data.status === "success") {
               window.location.href = `${url}/index.php?folder=frmAlmBebida&view=frmAlmConBebida`;
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
</script>