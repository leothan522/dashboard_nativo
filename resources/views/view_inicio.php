<!doctype html>
<html lang="es" class="h-100" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Yonathan Castillo and Bootstrap contributors">
    <meta name="generator" content="leothan 0.1">

    <title><?= env('app_name', 'Inicio') ?></title>

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
    <link rel="stylesheet" href="<?php getAssetDominio('resources/css/docsearch.css'); ?>">


</head>
<body class="d-flex flex-column h-100">

<!--Icons Switch Theme-->
<?php require_view('layouts.switch'); ?>

<!-- Fixed navbar -->
<?php require_view('layouts.navbar'); ?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">

        <h1>¡Hola Mundo!</h1>

        <p class="col-12"><?= route('prueba')  ?></p>

        <div class="row m-5">
            <form id="form_prueba">
                <input type="text" class="form-control m-2" placeholder="nombre" name="nombre">
                <input type="text" class="form-control m-2" placeholder="tabla_id" name="tabla_id">
                <input type="text" class="form-control m-2" placeholder="valor" name="valor">
                <button type="submit" class="btn btn-primary m-2"  id="hola_prueba">Hola Probando</button>
            </form>

            <!--<div class="">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>-->

        </div>

    </div>
</main>

<!-- Footer -->
<?php require_view('layouts.footer'); ?>

<?php verToast(); ?>

<script src="<?php getAssetDominio('bootstrap/js/bootstrap.bundle.js'); ?>"></script>
<script src="<?php asset('js/app.js', true); ?>"></script>
<script type="application/javascript">

    let form = document.getElementById("form_prueba");
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        let url = "<?= route('prueba') ?>";
        ajaxRequest({ url: url, form: form }, function (data) {
            //acciones extras
        });
    });

    console.log('Hi!')
</script>
</body>
</html>
