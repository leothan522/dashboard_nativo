<?php
if (isset($lastRegistro) && $lastRegistro){
    $rowquid =  $lastRegistro->rowquid;
    $opcion = "editar";
}else{
    $rowquid = "";
    $opcion = "create";
}
?>

<div class="row justify-content-center">
    <div class="col-md-5 col-lg-4" id="content_table">
        <?php include view_path('dashboard.parametros.table') ?>
    </div>
    <div class="col-md-7 col-lg-8">
        <?php include view_path('dashboard.parametros.card_show') ?>
        <?php include view_path('dashboard.parametros.card_form') ?>
        <div class="mt-3">
            <input type="text" value="<?= $rowquid ?>" id="input_rowquid">
            <input type="text" value="<?= $opcion ?>" id="input_opcion">
        </div>
    </div>
</div>