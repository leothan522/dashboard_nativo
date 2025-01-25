<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Nuevo Parametro</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool d-none" data-lte-toggle="card-collapse" title="Collapse">
                <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
            </button>
            <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
    <form novalidate id="form_parametros"> <!--begin::Body-->
        <div class="card-body table-responsive" style="max-height: 60vh">

            <!--begin::Row-->
            <div class="row g-3">

                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-12">
                    <label for="parametros_input_nombre" class="form-label">Nombre</label>
                    <div class="input-group has-validation">
                        <input id="parametros_input_nombre" name="nombre" type="text" class="form-control" placeholder="Ingrese el Nombre" required>
                        <div class="valid-feedback" id="error_parametros_input_nombre">Looks good!</div>
                    </div>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-12">
                    <label for="parametros_input_tabla_id" class="form-label">Tabla_id</label>
                    <div class="input-group has-validation">
                        <input id="parametros_input_tabla_id" name="tabla_id" type="text" class="form-control" placeholder="Ingrese la Tabla_id" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-12">
                    <label for="parametros_input_valor" class="form-label">Valor</label>
                    <div class="input-group has-validation">
                        <input id="parametros_input_valor" name="valor" type="text" class="form-control" placeholder="Ingrese el Valor" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <!--end::Col-->

            </div>
            <!--end::Row-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer justify-content-between">

            <button class="btn btn-secondary" type="reset" onclick="display()">
                 Cancelar
            </button>
            <button class="btn btn-success float-end" type="submit">
                <i class="bi bi-floppy"></i> Guardar
            </button>


        </div>
        <!--end::Footer-->
    </form>
</div>
