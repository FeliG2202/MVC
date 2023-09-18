<div class="row">
    <div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
        <h2 class="text-center">Registrar Ensalada</h2>
        <hr>

        <div class="gap-2 d-md-flex justify-content-md-end my-2">
            <a href="index.php?folder=frmAlmEnsal&view=frmAlmConEnsal" class="btn btn-outline-secondary">
                <i class="fas fa-search me-2"></i>Consultar
            </a>
        </div>

        <form class="form" id="form-create-ensal">
            <div class="row mb-3">
                <label for="" class="form-label">Nombre de la ensalada</label>
                <input type="text" id="product5_name" class="form-control" required>
            </div>
            <br>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="regAlmEnsal" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </div>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">
    document.getElementById("form-create-ensal").addEventListener("submit", (event) => {
        event.preventDefault();

        axios.post(`${host}/api/product/5/create`, {
            product5_name: document.getElementById("product5_name").value,
            regAlmEnsal: document.getElementById("regAlmEnsal").value
        })
        .then(res => {
            // console.log(res);
            if (res.data.status === "success") {
                window.location.href = `${url}/index.php?folder=frmAlmEnsal&view=frmAlmConEnsal`;
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
</script>