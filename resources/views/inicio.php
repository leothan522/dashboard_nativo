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
        <p class="m-5"><?= route('prueba')  ?></p>
        <div class="row m-5">
            <form id="form_prueba">
                <input type="text" class="form-control" placeholder="nombre" name="nombre">
                <input type="text" class="form-control" placeholder="tabla_id" name="tabla_id">
                <input type="text" class="form-control" placeholder="valor" name="valor">
                <button type="submit" class="btn btn-primary"  id="hola_prueba">Hola Probando</button>
            </form>
        </div>
    </div>
</main>

<!-- Footer -->
<?php require_view('layouts.footer'); ?>

<script src="<?php getAssetDominio('bootstrap/js/bootstrap.bundle.js'); ?>"></script>
<script src="<?php asset('js/app.js', true); ?>"></script>
<script type="application/javascript">

    let form = document.getElementById("form_prueba");
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        let hola = {
            nombre: "hola",
            tabla_id: 123,
            valor: "golaals"
        };
        let url = "<?= route('prueba') ?>";
        ajaxRequest({ url: url, data: { nombre: "Yonathan", apellido: "Castillo"}});
        //console.log(getType(hola));
        /*prueba(url, form, function (data) {
            console.log(data);
        });*/
    })


    /*function prueba(url, method = "POST", form, callback) {

        let formData = new FormData(form);
        /!*formData.append('nombre', "yonathan");
        formData.append('tabla_id', 153);
        formData.append('valor', "hola parametro")*!/
        const options2 = {
            method: method,
            body: formData
        }
        fetch(url, options2)
            .then(response => response.json())
            .then(data => callback(data));
    }*/

    function ajaxRequest(options) {

        //Valores por defecto
        let url = options.url ? options.url : "/";
        let method = options.method ? options.method : "POST";
        let data = options.data ? options.data : null;
        let form = options.form ? options.form : null;
        let type = options.response ? options.response : "json";

        console.log(getType(form));



        /*if (type === "json"){
            fetch(url, {
               method: method,

            });
        }*/


        /*fetch(url, {
            method: method,

        })
            .then(respuesta => {
                // Manejamos la respuesta de la petición aqui
            })
            .catch(error => {
                // Si hay un error en la petición, lo manejamos aqui
            })*/



    }

    console.log('Hi!')
</script>
</body>
</html>
