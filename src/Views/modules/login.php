<!-- FORMULARIO PARA INGRESAR EL LOGIN -->
<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
  <div class="w-100 text-center mb-3">
    <img src="<?php echo(host); ?>/src/Views/assets/img/logo1.png" class="img-fluid w-60 h-25">
  </div>
  <hr>

  <form method="POST">
    <div class="form-group mb-3">
      <label class="form-label">Nombre de Usuario</label>
      <input type="text" name="users_email" placeholder="Ingrese Usuario" class="form-control" required autocomplete="off">
    </div>

    <div class="form-group mb-3">
      <label class="form-label">Contraseña</label>
      <input type="password" name="users_password" placeholder="Ingrese Contraseña" class="form-control" required>
    </div>

    <div class="p-2 d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="submit" name="regLogin" class="btn btn-success">Ingresar</button>
    </div>

  </form>
</div>

<!-- ================================backend================================== -->
<script type="text/javascript">

// Estado simulado para pruebas
const users_email = "sleon@dev.com";
const users_password = "1212";

const handleSubmit = (e) => {
    e.preventDefault();

    const form = new FormData();
    form.append("users_email", users_email);
    form.append("users_password", SHA256(users_password).toString());

    axios.post(`${host}/api/auth/login`, form, {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    }).then((res) => {
        alert(`status: ${res.data.status} | message: ${res.data.message}`);
    }).catch((err) => {
        alert(`status: ${err.response.data.status} | message: ${err.response.data.message}`);
    });
};

</script>