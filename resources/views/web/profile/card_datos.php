<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" width="135"
                 src="<?php asset('img/user_blank.png'); ?>" alt="Photo User">
        </div>

        <h3 class="profile-username text-center text-capitalize"><?= $user->name ?></h3>

        <p class="text-muted text-center">Administrador</p>

        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                Nombre: <span id="span_card_profile_name" class="text-capitalize"><?= $user->name ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                Email: <span id="span_card_profile_email" class=""><?= $user->email ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                Fecha de Registro: <span class=""><?= getFecha($user->created_at) ?></span>
            </li>

        </ul>


    </div>
    <!-- /.card-body -->
</div>

