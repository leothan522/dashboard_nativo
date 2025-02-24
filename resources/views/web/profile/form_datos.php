<form id="form_datos_profile" class="row g-3 justify-content-end position-relative" novalidate>

    <div class="col-12">
        <label for="input_perfil_password" class="form-label">Contraseña</label>
        <input id="input_perfil_password" name="password" type="password" class="form-control" required>
        <div id="error_input_perfil_password" class="invalid-feedback">La contraseña es requerida.</div>
    </div>

    <div class="col-12">
        <label for="input_name" class="form-label">Nombre</label>
        <input id="input_name" name="name" value="<?= $user->name ?>" type="text" class="form-control" required>
        <div id="error_input_name" class="invalid-feedback">El nombre es requerido.</div>
    </div>

    <div class="col-12">
        <label for="input_email" class="form-label">Correo Eletrónico</label>
        <div class="input-group has-validation">
            <input id="input_email" name="email" value="<?= $user->email ?>" type="email" class="form-control" required>
            <div id="error_input_email" class="invalid-feedback">El correo eletrónico es requerido.</div>
        </div>
    </div>

    <input type="hidden" name="rowquid" value="<?= \app\Providers\Auth::user()->rowquid ?>">

    <div class="col-4 d-grid">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>


</form>