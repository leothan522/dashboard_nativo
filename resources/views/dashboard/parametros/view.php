<!DOCTYPE html>
<html lang="es">

<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>
        <?= env('app_name', 'DASHBOARD') ?> |
        <?php
        if (isset($this->title)) {
            echo $this->title;
        }else{
            echo "Dashboard";
        }
        ?>
    </title>

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

    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="<?= env('app_name', 'Inicio') ?>">
    <meta name="author" content="<?= env('meta_author', '') ?>">
    <meta name="description" content="<?= env('meta_description', '') ?>">
    <meta name="keywords" content="<?= env('meta_keywords', '') ?>">
    <!--end::Primary Meta Tags-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="<?php asset('vendor/adminlte/plugins/source-sans/index.css'); ?>">
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="<?php asset('vendor/adminlte/plugins/overlayscrollbars/styles/overlayscrollbars.min.css'); ?>">
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="<?php asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css'); ?>">
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?php asset('vendor/adminlte/css/adminlte.css'); ?>">
    <!--end::Required Plugin(AdminLTE)-->

    <!-- our project just needs Font Awesome Solid + Brands -->
    <link href="<?php asset('vendor/fontawesome/css/fontawesome.css'); ?>" rel="stylesheet" />
    <link href="<?php asset('vendor/fontawesome/css/brands.css'); ?>" rel="stylesheet" />
    <link href="<?php asset('vendor/fontawesome/css/solid.css'); ?>" rel="stylesheet" />

    <!--Switch Theme -->
    <script src="<?php getAssetDominio('resources/js/color-modes.js'); ?>"></script>
    <link rel="stylesheet" href="<?php getAssetDominio('resources/css/color-modes.css'); ?>">

</head>
<!--end::Head-->

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg sidebar-mini sidebar-collapse bg-body-tertiary">

<!--begin::App Wrapper-->
<div class="app-wrapper">

    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">

            <!--begin::Start Navbar Links-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a>
                </li>
                <?php include view_path('dashboard.parametros.links'); ?>
            </ul>
            <!--end::Start Navbar Links-->

            <!--begin::End Navbar Links-->
            <ul class="navbar-nav ms-auto">

                <!--begin::Navbar Search-->
                <li class="nav-item">
                    <?php include view_path('layouts.adminlte.search_menu'); ?>
                </li>
                <!--end::Navbar Search-->

                <!--begin::Messages Dropdown Menu-->
                <li class="nav-item dropdown">
                    <?php include view_path('layouts.adminlte.messages_menu'); ?>
                </li>
                <!--end::Messages Dropdown Menu-->

                <!--begin::Notifications Dropdown Menu-->
                <li class="nav-item dropdown">
                    <?php include view_path('layouts.adminlte.notifications_menu'); ?>
                </li>
                <!--end::Notifications Dropdown Menu-->

                <!--begin::Navbar Search-->
                <li class="nav-item">
                    <?php include view_path('layouts.adminlte.color_mode_toggle'); ?>
                </li>
                <!--end::Navbar Search-->

                <!--begin::Fullscreen Toggle-->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                        <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                        <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                    </a>
                </li>
                <!--end::Fullscreen Toggle-->

                <!--begin::User Menu Dropdown-->
                <li class="nav-item dropdown user-menu">
                    <?php include view_path('layouts.adminlte.user_menu'); ?>
                </li>
                <!--end::User Menu Dropdown-->
            </ul>
            <!--end::End Navbar Links-->

        </div>
        <!--end::Container-->
    </nav>
    <!--end::Header-->


    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
            <!--begin::Brand Link-->
            <?php include view_path('layouts.adminlte.sidebar_brand') ?>
            <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->

        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <!--begin::Sidebar Menu-->
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                    <?php include view_path('layouts.adminlte.sidebar_menu'); ?>
                </ul>
                <!--end::Sidebar Menu-->
            </nav>
        </div>
        <!--end::Sidebar Wrapper-->
    </aside>
    <!--end::Sidebar-->


    <!--begin::App Main-->
    <main class="app-main">


        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">

                <!--begin::Row-->
                <?php include view_path('dashboard.parametros.header'); ?>
                <!--end::Row-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->


        <!--begin::App Content-->
        <div class="app-content" id="content_view_parametros">
            <!--begin::Container-->
            <div class="container-fluid">
                <?php include view_path('dashboard.parametros.content'); ?>
            </div>
            <?php verCargando(); ?>
        </div>
        <!--end::Container-->

</main>
<!--end::App Main-->


<!--begin::Footer-->
<footer class="app-footer">
    <?php include view_path('layouts.adminlte.footer'); ?>
</footer>
<!--end::Footer-->
</div>
<!--end::App Wrapper-->

<?php verToast(); ?>

<!--begin::Script-->

<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script src="<?php asset('vendor/adminlte/plugins/overlayscrollbars/browser/overlayscrollbars.browser.es6.min.js'); ?>"></script>
<!--end::Third Party Plugin(OverlayScrollbars)-->
<!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="<?php asset('vendor/adminlte/plugins/core/dist/umd/popper.min.js'); ?>"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)-->
<!--begin::Required Plugin(Bootstrap 5)-->
<script src="<?php getAssetDominio('bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--end::Required Plugin(Bootstrap 5)-->
<!--begin::Required Plugin(AdminLTE)-->
<script src="<?php asset('vendor/adminlte/js/adminlte.js'); ?>"></script>
<!--end::Required Plugin(AdminLTE)-->

<!--begin::OverlayScrollbars Configure-->
<script src="<?php asset('vendor/adminlte/js/config-overlayscrollbars.js'); ?>"></script>
<!--end::OverlayScrollbars Configure-->

<script src="<?php asset('js/toastBootstrap.js', true); ?>"></script>
<!--Js para notificaciones y peticiones asincronas-->
<script src="<?php asset('js/app.js', true); ?>"></script>

<!--end::Script-->
<?php include view_path('dashboard.parametros.scripts'); ?>
</body>
<!--end::Body-->
</html>