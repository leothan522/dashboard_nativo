<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Yonathan Castillo and Bootstrap contributors">
    <meta name="generator" content="leothan 0.1">

    <title><?= env('app_name', 'Inicio') ?> | Verificar</title>

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




                                    <form class="needs-validation" novalidate action="#!" >

                                        <?php if ($validate){ ?>
                                            <div class="row">

                                                <div class="text-center mb-4">
                                                    <img class="img-fluid mb-3" src="<?php asset('img/email-verified.png'); ?>" alt="Email Verificado">
                                                </div>

                                                <p style="text-align: justify !important;">
                                                    ¡En hora buena!, tu correo electrónico ha sido verificado correctamente.
                                                </p>

                                            </div>
                                        <?php }else{ ?>
                                            <div class="row">

                                                <div class="text-center mb-4">
                                                    <img class="img-fluid mb-3" src="<?php asset('img/warning_11892127.png'); ?>" alt="Email Verificado">
                                                </div>

                                                <?php if (isset($message) && !empty($message)){ ?>
                                                    <p style="text-align: justify !important;">
                                                        ¡Lo sentimos!, el correo electrónico no corresponde al token de verificacion asignado.!
                                                    </p>
                                                <?php }else { ?>
                                                    <p style="text-align: justify !important;">
                                                        ¡Lo sentimos!, el token de verificación ya está vencido, debe solicitar uno nuevo.!
                                                    </p>
                                                <?php } ?>



                                            </div>
                                        <?php } ?>

                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <a href="<?= route('/')?>" class="btn btn-dark btn-lg gradient-custom-2" type="submit">
                                                        Continuar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
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

</body>
</html>
