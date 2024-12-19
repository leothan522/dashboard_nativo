<form class="needs-validation" novalidate action="#!" >
    <p style="text-align: justify !important;">
        Antes de continuar, ¿podría verificar su dirección de correo electrónico haciendo clic en
        el enlace que le acabamos de enviar? Si no recibió el correo electrónico, con gusto le enviaremos otro.
    </p>
    <div class="row gy-3 overflow-hidden">

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
                    Reenviar correo de verificación
                </button>
            </div>
        </div>
    </div>
</form>



<div class="d-flex aling-items-center justify-content-between mt-5">
    <a href="<?= route('register') ?>" class="link-secondary text-decoration-none">
        Editar Perfil
    </a>
    <form id="form_sing_out">
        <button type="submit" class="btn btn-link link-secondary text-decoration-none">
            Finalizar sesión
        </button>
    </form>

</div>


