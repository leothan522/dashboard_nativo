<form class="needs-validation" novalidate action="#!" >
    <div class="row gy-3 overflow-hidden">
        <div class="col-12">
            <div class="form-floating mb-2 has-validation">
                <input id="email" type="email" class="form-control" name="email"  placeholder="name@example.com" required>
                <label for="email" class="form-label">Correo electrónico</label>
                <div class="invalid-feedback">
                    Por favor ingrese su correo electrónico.
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
                <input id="confirmar" type="password" class="form-control" name="password" placeholder="Password" required>
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
                    Restablecer contraseña
                </button>
            </div>
        </div>
    </div>
</form>
