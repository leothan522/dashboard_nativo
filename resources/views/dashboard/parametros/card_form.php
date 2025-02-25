<div class="card card-primary card-outline <?php if ($ocultarForm){ echo 'd-none'; } ?>" id="div_card_form">
    <div class="card-header" id="div_card_form_header">
        <h3 class="card-title" id="form_header_title">
            Crear Parametro
        </h3>
        <div class="card-tools">

            <button type="button" class="btn btn-tool" onclick="refreshShow()">
                <i class="fa-solid fa-ban"></i> Cancelar
            </button>

        </div>
    </div>

    <div class="card-body table-responsive" id="div_card_form_body" style="max-height: calc(100vh - 279px)">

        <form novalidate class="row justify-content-center"  id="form_parametros">

        <?php include view_path('dashboard.parametros.form') ?>

        <div class="row justify-content-end g-2">
            <button type="reset" class="d-none" id="btn_reset_from">reset</button>
            <button type="submit" class="col-md-4 btn btn-block btn-success me-2">
                <i class="fas fa-save me-1"></i>
                Guardar
            </button>
        </div>

        </form>

    </div>

    <?php verCargando(); ?>

</div>
