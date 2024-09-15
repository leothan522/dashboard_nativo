<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba VIEW</title>
</head>
<body>
    <h1>Hola desde una VIEW</h1>
    <p><?= $title ?></p>
    <div>
        <form action="<?= asset('post') ?>" method="post">
            <p><input type="text" name="nombre" placeholder="nombre"></p>
            <p><input type="text" name="tabla_id" placeholder="tabla_id"></p>
            <p><input type="text" name="valor" placeholder="valor"></p>
            <p><input type="submit" value="Guardar"></p>
        </form>
    </div>
</body>
</html>