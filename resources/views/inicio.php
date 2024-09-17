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
        <h1>Hola Mundo!</h1>
    </div>
</main>

<!-- Footer -->
<?php require_view('layouts.footer'); ?>

<script src="<?php getAssetDominio('bootstrap/js/bootstrap.bundle.js'); ?>"></script>
</body>
</html>
