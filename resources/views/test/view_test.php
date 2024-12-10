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
<?php include view_path('layouts.switch'); ?>

<!-- Fixed navbar -->
<?php include view_path('test.layouts.navbar'); ?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">

        <h1>¡Hola Mundo!</h1>


        <div class="row mb-5 justify-content-between">
            <span class="col-4"><?= route('test')  ?></span>
            <button id="pruebaToast" type="button" class="col-2 btn btn-primary">Toast</button>
            <button id="pruebaConfirm" type="button" class="col-2 btn btn-primary">Confirm Toast</button>
            <button id="pruebaHTML" type="button" class="col-2 btn btn-primary">HTML Toast</button>
        </div>


        <div class="row justify-content-center">

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            Pruebas de Peticiones Asincronas
                        </div>
                        <div class="card-body position-relative" id="hola">
                            <h5 class="card-title mb-3">Usando el Modelo Parametros</h5>


                            <form id="form_prueba" novalidate>

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input id="nombre" type="text" class="form-control" placeholder="nombre" name="nombre" required>
                                    <small id="error_nombre" class="invalid-feedback form-text">El campo nombre es requerido.</small>
                                </div>

                                <div class="mb-3">
                                    <label for="tabla_id" class="form-label">Tabla ID</label>
                                    <input id="tabla_id" type="text" class="form-control" placeholder="tabla_id" name="tabla_id" required>
                                    <small id="error_tabla_id" class="invalid-feedback form-text">El campo tabla_id es requerido.</small>
                                </div>

                                <div class="mb-3">
                                    <label for="valor" class="form-label">Valor</label>
                                    <input id="valor" type="text" class="form-control" placeholder="valor" name="valor" required>
                                    <small id="error_valor" class="invalid-feedback form-text">El campo valor es requerido</small>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary" id="btn_guardar">Guardar</button>
                                    <button type="reset" class="btn btn-secondary" id="btn_calcelar">Cancelar</button>
                                </div>

                            </form>


                            <?php verCargando(); ?>
                        </div>
                    </div>

                </div>

        </div>

    </div>
</main>

<!-- Footer -->
<?php include view_path('test.layouts.footer'); ?>

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


    const form = document.querySelector("#form_prueba");
    const btnGuardar = document.querySelector("#btn_guardar");
    const btnCancelar = document.querySelector("#btn_calcelar");

    form.addEventListener('submit', event => {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');
        if (form.checkValidity()){
            btnGuardar.disabled = "disabled"
            verCargando("hola");
            let url = "<?= route('test') ?>";
            ajaxRequest({ url: url, form: form }, function (data) {
                //acciones extras
                btnGuardar.removeAttribute('disabled');
                verCargando('hola', false);
            });
        }

    });

    btnCancelar.addEventListener('click', event => {
        form.classList.remove('was-validated');
    })

    console.log('Hi!')
</script>
</body>
</html>
