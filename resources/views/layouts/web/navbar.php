<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= route('web') ?>">
            <img src="<?php asset('img/preloader_171x171.png') ?>" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            <?= env('app_name', 'Dashboard') ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= route('web') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item pt-1">
                    <?php include view_path('layouts.adminlte.color_mode_toggle'); ?>
                </li>
                <li class="nav-item dropdown-center">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php asset('img/user_blank.png'); ?>" width="30" height="30" class="rounded shadow" alt="User Image">
                        <span class="ms-2"><?= \app\Providers\Auth::user()->name ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?= route('profile') ?>"><i class="fas fa-user text-primary me-2"></i> Perfil</a></li>
                        <!--<li><a class="dropdown-item" href="#">Another action</a></li>-->
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= route('logout') ?>"><i class="fas fa-sign-out-alt text-primary me-2"></i> Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>