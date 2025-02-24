<form class="row g-3 justify-content-end">

    <div class="col-12">
        <label for="input_perfil_password" class="form-label">Contraseña</label>
        <input id="input_perfil_password" name="password" type="password" class="form-control" required>
        <div id="error_input_perfil_password" class="invalid-feedback">La contraseña es requerida.</div>
    </div>

    <div class="col-12">
        <label for="input_name" class="form-label">Nombre</label>
        <input id="input_name" name="name" type="text" class="form-control" required>
        <div class="invalid-feedback">El nombre es requerido.</div>
    </div>

    <div class="col-12">
        <label for="input_email" class="form-label">Correo Eletrónico</label>
        <div class="input-group has-validation">
            <input id="input_email" name="email" type="text" class="form-control" required>
            <div id="error_input_email" class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
    </div>


    <div class="col-4 d-grid">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>


</form>