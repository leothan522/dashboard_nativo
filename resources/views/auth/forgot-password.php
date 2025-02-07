<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Yonathan Castillo and Bootstrap contributors">
    <meta name="generator" content="leothan 0.1">

    <title><?= env('app_name', 'Inicio') ?> | Olvedé mi contraseña</title>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php asset('favicon/apple-icon-57x57.png'); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php asset('favicon/apple-icon-60x60.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php asset('favicon/apple-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php asset('favicon/apple-icon-76x76.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php asset('favicon/apple-icon-114x114.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php asset('favicon/apple-icon-120x120.png'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php asset('favicon/apple-icon-144x144.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php asset('favicon/apple-icon-152x152.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php asset('favicon/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php asset('favicon/android-icon-192x192.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php asset('favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php asset('favicon/favicon-96x96.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php asset('favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php asset('favicon/manifest.json'); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



    <!--Bootstrap -->
    <link href="<?php getAssetDominio('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php getAssetDominio('resources/css/auth.css'); ?>">

    <!-- our project just needs Font Awesome Solid + Brands -->
    <link href="<?php asset('vendor/fontawesome/css/fontawesome.css'); ?>" rel="stylesheet" />
    <link href="<?php asset('vendor/fontawesome/css/brands.css'); ?>" rel="stylesheet" />
    <link href="<?php asset('vendor/fontawesome/css/solid.css'); ?>" rel="stylesheet" />

    <?php include view_path('layouts.preloader') ?>
</head>
<body>
<div id="preloader"></div>
<!-- Login 8 - Bootstrap Brain Component -->
<section class="bg-light p-3 p-md-4 p-xl-5 position-relative" style="min-height: 100vh;">
    <div class="container  position-absolute top-50 start-50 translate-middle">
        <div id="scale" class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">

                        <?php require view_path('auth.layouts.section_tecnologia')?>


                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">

                                    <?php require view_path('auth.layouts.section_logo') ?>



                                    <form id="form_forgot_password" class="position-relative" novalidate>
                                        <p style="text-align: justify !important;">
                                            ¿Olvidó su contraseña? No hay problema. Simplemente déjenos saber su dirección de correo electrónico
                                            y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.
                                        </p>
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-2 has-validation">
                                                    <input id="email" type="email" class="form-control" name="email"  placeholder="name@example.com" required>
                                                    <label for="email" class="form-label">Correo electrónico</label>
                                                    <div id="error_email" class="invalid-feedback">
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
                                        <?php verCargando(); ?>
                                    </form>





                                    <?php require view_path('auth.layouts.footer') ?>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php verToast(); ?>
<script src="<?php getAssetDominio('bootstrap/js/bootstrap.bundle.js'); ?>"></script>
<script src="<?php asset('js/toastBootstrap.js', true); ?>"></script>
<script src="<?php asset('js/app.js', true); ?>"></script>

<script type="application/javascript">
    const form = document.querySelector('#form_forgot_password');
    const input_email = document.querySelector('#email');
    const error_email = document.querySelector('#error_email');


    form.addEventListener('submit', event => {
        event.preventDefault();
        event.stopPropagation();

        form.classList.add('was-validated');
        if (form.checkValidity()){
            verCargando('form_forgot_password');
            let url = '<?= route('forgot/password') ?>';
            ajaxRequest({ url : url, form: form }, function (data) {
                verCargando('form_forgot_password', false);
                
                if (data.ok){
                    form.classList.remove('was-validated');
                    input_email.classList.remove('is-invalid');
                    input_email.classList.add('is-valid');
                    error_email.classList.remove('invalid-feedback');
                    error_email.classList.add('valid-feedback');
                    error_email.textContent = 'Email enviado exitosamente.';
                }else {
                    form.classList.remove('was-validated');
                    input_email.classList.add('is-invalid');
                    error_email.textContent = data.message;


                }
            });
        }






    });


</script>

</body>
</html>
