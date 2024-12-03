<!DOCTYPE html>
<html lang="es">

<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title><?= env('app_name', 'Inicio') ?></title>

    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Sidebar Mini">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">
    <!--end::Primary Meta Tags-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="<?php asset('vendor/adminlte/plugins/source-sans/index.css'); ?>" >
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="<?php asset('vendor/adminlte/plugins/overlayscrollbars/styles/overlayscrollbars.min.css'); ?>">
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="<?php asset('vendor/adminlte/plugins/bootstrap-icons/font/bootstrap-icons.min.css'); ?>" >
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?php asset('vendor/adminlte/css/adminlte.css'); ?>">
    <!--end::Required Plugin(AdminLTE)-->


    <!--Switch Theme -->
    <script src="<?php getAssetDominio('resources/js/color-modes.js'); ?>"></script>
    <link rel="stylesheet" href="<?php getAssetDominio('resources/css/color-modes.css'); ?>">

</head>
<!--end::Head-->

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg sidebar-mini sidebar-collapse bg-body-tertiary lockscreen bg-body-secondary">

<!--Icons Switch Theme-->
<?php require_view('layouts.switch'); ?>

<!--begin::App Wrapper-->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo"> <a href="<?php echo route('/') ?>"><b>Admin</b>LTE</a> </div>
    <div class="lockscreen-name d-none">John Doe</div>
    <div class="lockscreen-item d-none">
        <div class="lockscreen-image"> <img src="<?php asset('vendor/adminlte/assets/img/user1-128x128.jpg'); ?>" alt="User Image"> </div>
        <form class="lockscreen-credentials">
            <div class="input-group"> <input type="password" class="form-control shadow-none" placeholder="password">
                <div class="input-group-text border-0 bg-transparent px-1"> <button type="button" class="btn shadow-none"> <i class="bi bi-box-arrow-right text-body-secondary"></i> </button> </div>
            </div>
        </form>
    </div>
    <div class="help-block text-center d-none">
        Ir a Parametros
    </div>
    <div class="text-center"> <a href="<?php echo route('parametros') ?>" class="text-decoration-none">Parametros</a> </div>
    <div class="lockscreen-footer text-center d-none">
        Copyright © 2014-2024 &nbsp;
        <b><a href="https://adminlte.io" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">AdminLTE.io</a></b> <br>
        All rights reserved
    </div>
</div>


<!--begin::Script-->

<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script src="<?php asset('vendor/adminlte/plugins/overlayscrollbars/browser/overlayscrollbars.browser.es6.min.js'); ?>"></script>
<!--end::Third Party Plugin(OverlayScrollbars)-->
<!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="<?php asset('vendor/adminlte/plugins/core/dist/umd/popper.min.js'); ?>"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)-->
<!--begin::Required Plugin(Bootstrap 5)-->
<script src="<?php getAssetDominio('bootstrap/js/bootstrap.min.js'); ?>" ></script>
<!--end::Required Plugin(Bootstrap 5)-->
<!--begin::Required Plugin(AdminLTE)-->
<script src="<?php asset('vendor/adminlte/js/adminlte.js'); ?>"></script>
<!--end::Required Plugin(AdminLTE)-->

<!--begin::OverlayScrollbars Configure-->
<script src="<?php asset('vendor/adminlte/js/config-overlayscrollbars.js');?>"></script>
<!--end::OverlayScrollbars Configure-->

<!--end::Script-->
</body>
<!--end::Body-->
</html>