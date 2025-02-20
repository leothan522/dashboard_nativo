<!doctype html>
<html lang="es" class="h-100" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Yonathan Castillo and Bootstrap contributors">
    <meta name="generator" content="leothan 0.1">

    <title><?= env('app_name', 'Dashboard') ?> | Home</title>

    <!-- Favicon -->
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

    <!--Switch Theme -->
    <script src="<?php getAssetDominio('resources/js/color-modes.js'); ?>"></script>
    <link rel="stylesheet" href="<?php getAssetDominio('resources/css/color-modes.css'); ?>">

    <!-- our project just needs Font Awesome Solid + Brands -->
    <link href="<?php asset('vendor/fontawesome/css/fontawesome.css'); ?>" rel="stylesheet" />
    <link href="<?php asset('vendor/fontawesome/css/brands.css'); ?>" rel="stylesheet" />
    <link href="<?php asset('vendor/fontawesome/css/solid.css'); ?>" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php getAssetDominio('resources/css/sticky-footer-navbar.css'); ?>" rel="stylesheet">

    <?php include view_path('layouts.preloader') ?>

</head>
<body class="d-flex flex-column h-100">

<!--preloader-->
<div id="preloader"></div>

<!-- Fixed navbar -->
<?php include view_path('layouts.web.navbar'); ?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">

        <h1>¡Hola Mundo!</h1>


        <div class="row gap-3 mb-4 justify-content-between">
            <div class="col-md-4">
                <span class=""><?= route('web') ?></span>
            </div>
            <div class="col-md-2 d-grid">
                <button id="pruebaToast" type="button" class="btn  btn-primary">Toast</button>
            </div>
            <div class="col-md-2 d-grid ">
                <button id="pruebaConfirm" type="button" class="btn  btn-primary">Confirm Toast</button>
            </div>
            <div class="col-md-2 d-grid ">
                <button id="pruebaHTML" type="button" class="btn  btn-primary">HTML Toast</button>
            </div>
        </div>

        <div class="d-flex gap-3 flex-column mb-3">
            <?php include view_path('layouts.list_tecnologias')?>
        </div>

    </div>
</main>

<!-- Footer -->
<?php include view_path('layouts.web.footer'); ?>

<?php verToast(); ?>

<script src="<?php getAssetDominio('bootstrap/js/bootstrap.bundle.js'); ?>"></script>
<script src="<?php asset('js/toastBootstrap.js', true); ?>"></script>
<script src="<?php asset('js/app.js', true); ?>"></script>
<script type="application/javascript">

    const btnToast = document.querySelector('#pruebaToast');
    btnToast.addEventListener('click', event => {
        toastBootstrap({
            type: 'info',
            title: "hola desde title",
            message: "probando mensaje <b class='text-danger'>HTML</b>"
        });
    });

    const btnConfirm = document.querySelector("#pruebaConfirm");
    btnConfirm.addEventListener('click', event => {
       confirmToastBootstrap(function () {
           toastBootstrap({
               message: "hola Callback"
           });
       });
    });

    const btnHTML = document.querySelector("#pruebaHTML");
    btnHTML.addEventListener('click', event => {
        htmlToasBootstrap();
    });


    console.log('Hi!')
</script>
</body>
</html>
