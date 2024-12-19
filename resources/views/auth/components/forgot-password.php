<form class="needs-validation" novalidate action="#!" >
    <p style="text-align: justify !important;">
        ¿Olvidó su contraseña? No hay problema. Simplemente déjenos saber su dirección de correo electrónico
        y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.
    </p>
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
                    Enviar enlace para restablecer contraseña
                </button>
            </div>
        </div>
    </div>
</form>
