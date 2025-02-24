<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
    <img src="<?php asset('img/user_blank.png'); ?>" class="user-image rounded-circle shadow" alt="User Image">
    <span class="d-none d-md-inline"><?= \app\Providers\Auth::user()->name ?></span>
</a>
<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

    <!--begin::User Image-->
    <li class="user-header text-bg-primary">
        <img src="<?php asset('img/user_blank.png'); ?>" class="rounded-circle shadow" alt="User Image">
        <p>
            <?= \app\Providers\Auth::user()->name ?>
            <small><?= \app\Providers\Auth::user()->email ?></small>
        </p>
    </li>
    <!--end::User Image-->

    <!--begin::Menu Footer-->
    <li class="user-footer">
        <a href="#" class="btn btn-light btn-flat">
            <i class="fa-solid fa-user text-primary"></i>
            Perfil
        </a>
        <a href="<?= route('logout') ?>" class="btn btn-light btn-flat float-end">
            <i class="fa-solid fa-power-off text-danger"></i>
            Salir
        </a>
    </li>
    <!--end::Menu Footer-->

</ul>