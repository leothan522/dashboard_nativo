<form class="row g-3 justify-content-end">

    <div class="col-12">
        <label for="input_seguridad_password" class="form-label">Contraseña Actual</label>
        <input id="input_seguridad_password" name="password" type="password" class="form-control" required>
        <div id="error_input_seguridad_password" class="invalid-feedback">La contraseña es requerida.</div>
    </div>

    <div class="col-12">
        <label for="input_new_password" class="form-label">Nueva Contraseña</label>
        <input id="input_new_password" name="password" type="text" class="form-control" required>
        <div class="invalid-feedback">El nombre es requerido.</div>
    </div>

    <div class="col-12">
        <label for="input_confirm_password" class="form-label">Confirmar</label>
        <div class="input-group has-validation">
            <input id="input_confirm_password" name="confirm" type="text" class="form-control" required>
            <div id="error_input_email" class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
    </div>


    <div class="col-4 d-grid">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>


</form>