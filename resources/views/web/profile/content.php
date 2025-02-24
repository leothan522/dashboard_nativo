<div class="row g-2 justify-content-center">


    <div id="card_datos" class="col-md-4 position-relative">

        <!-- Profile Image -->
        <?php include view_path('web.profile.card_datos')?>
        <?php verCargando(); ?>
        <!-- /.card -->
    </div>


    <!-- /.col -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body p-0">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                <strong>Información de perfil</strong>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample" >
                            <div class="accordion-body">
                                Actualice la información de su cuenta y la dirección de correo electrónico.
                                <div id="form_datos" class="pt-3 position-relative">
                                    <?php include view_path('web.profile.form_datos')?>
                                    <?php verCargando(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <strong>Actualizar contraseña</strong>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Asegúrese que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.
                                <div class="pt-3">
                                    <?php include view_path('web.profile.form_password')?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <strong>Sesiones del navegador</strong>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Administre y cierre sus sesiones activas en otros navegadores y dispositivos.
                                <div class="pt-3">
                                    <?php include view_path('web.profile.list_sessions')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>