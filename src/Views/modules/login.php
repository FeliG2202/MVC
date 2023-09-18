<!-- FORMULARIO PARA INGRESAR EL LOGIN -->
<div class="col-lg-5 mx-auto mt-5 mb-5 p-4 bg-gris rounded shadow-sm">
  <div class="w-100 text-center mb-3">
    <img src="<?php echo(host); ?>/src/Views/assets/img/logo1.png" class="img-fluid w-60 h-25">
  </div>
  <hr>

  <form method="POST">
    <div class="form-group mb-3">
      <label class="form-label">Nombre de Usuario</label>
      <input type="text" name="login" placeholder="Ingrese Usuario" class="form-control" required autocomplete="off">
    </div>

    <div class="form-group mb-3">
      <label class="form-label">Contraseña</label>
      <input type="password" name="password" placeholder="Ingrese Contraseña" class="form-control" required>
    </div>

    <div class="p-2 d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="submit" name="regLogin" class="btn btn-success">Ingresar</button>
    </div>

  </form>
</div>