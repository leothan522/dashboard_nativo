<form class="needs-validation" novalidate action="#!">
    <div class="row gy-3 overflow-hidden">
        <div class="col-12">
            <div class="form-floating mb-2 has-validation">
                <input id="name" type="text" class="form-control" name="name"  placeholder="Ingrese su nombre" required>
                <label for="name" class="form-label">Nombre</label>
                <div class="invalid-feedback">
                    Por favor ingrese su nombre.
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating mb-2 has-validation">
                <input id="email" type="email" class="form-control" name="email"  placeholder="name@example.com" required>
                <label for="email" class="form-label">Correo electrónico</label>
                <div class="invalid-feedback">
                    Por favor ingrese su correo eletrónico.
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-2 has-validation">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="password" class="form-label">Contraseña</label>
                <div class="invalid-feedback">
                    Por favor ingrese su contraseña.
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating mb-2 has-validation">
                <input id="confirmar" type="password" class="form-control" name="confirmar" placeholder="Password" required>
                <label for="confirmar" class="form-label">Confirmar contraseña</label>
                <div class="invalid-feedback">
                    Por favor confirme su contraseña.
                </div>
            </div>
        </div>

        <div class="col-12 d-none">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                <label class="form-check-label text-secondary" for="remember_me">
                    Keep me logged in
                </label>
            </div>
        </div>

        <div class="col-12">
            <div class="d-grid">
                <button class="btn btn-dark btn-lg gradient-custom-2" type="submit">
                    Registrarse
                </button>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-12">
        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
            <a href="<?= route('login'); ?>" class="link-secondary text-decoration-none">
                ¿Ya se registró?
            </a>
        </div>
    </div>
</div>