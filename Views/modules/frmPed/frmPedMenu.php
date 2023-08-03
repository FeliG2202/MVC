<div class="col-lg-8 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">
    <div class="row">
        <div class="col mb-3">
            <h1 class="text-center">Menú del Día</h1>
        </div>
    </div>
    <form method="POST">
        <div class="row mt-4">
            <!-- Tarjeta 1 -->
            <div class="col-md-6">
                <div class="card" id="tarjeta1">
                    <div class="card-body">
                        <h5 class="card-title">Menú #1</h5>
                        <p class="card-text">Lunes</p>
                        <!-- Selecionar componentes del almuerzo -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Sopa de pastas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Arroz blanco
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Pollo al horno
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Macarrones
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Papas Doradas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Lechuga/zanahoria/cebollo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Jugo de Feijo
                            </label>
                        </div>
                        <div class="p-2">
                            <input type="radio" name="opcion" value="opcion1" id="opcion1" required>
                            <label for="opcion1">Seleccionar</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tarjeta 2 -->
            <div class="col-md-6">
                <div class="card" id="tarjeta2">
                    <div class="card-body">
                        <h5 class="card-title">Menú #2</h5>
                        <p class="card-text">Lunes</p>
                        <!-- Selecionar componentes del almuerzo -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Sopa de pastas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Arroz blanco
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Pollo al horno
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Macarrones
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Papas Doradas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Lechuga/zanahoria/cebollo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Jugo de Feijo
                            </label>
                        </div>
                        <div class="p-2">
                            <input type="radio" name="opcion" value="opcion2" id="opcion2" required>
                            <label for="opcion2">Seleccionar</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" name="btnPedDatosPers" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </form>
</div>