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
    <form novalidate> <!--begin::Body-->
        <div class="card-body table-responsive" style="max-height: 60vh">

            <!--begin::Row-->
            <div class="row g-3">

                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <div class="input-group has-validation">
                        <input id="validationCustom02" type="text" class="form-control" placeholder="Last name" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input id="validationCustomUsername" placeholder="Username" type="text" class="form-control" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="exampleDataList" class="form-label">State</label>
                    <div class="input-group has-validation">
                        <input class="form-control" list="datalistOptions" id="exampleDataList"
                               placeholder="Escribe para buscar...">
                        <datalist id="datalistOptions">
                            <option value="San Francisco">
                            <option value="New York">
                            <option value="Seattle">
                            <option value="Los Angeles">
                            <option value="Chicago">
                        </datalist>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Zip</label>
                    <div class="input-group has-validation">
                        <input id="validationCustom05" type="number" placeholder="zip" class="form-control" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="formFile" class="form-label">Archivo</label>
                    <div class="input-group has-validation">
                        <input class="form-control" type="file" id="formFile">
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustomDate" class="form-label">Date</label>
                    <div class="input-group has-validation">
                        <input id="validationCustomDate" type="date" placeholder="Date" class="form-control" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>




                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>

                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer justify-content-between">

            <button class="btn btn-secondary" type="reset">
                <i class="bi bi-x-octagon"></i> Cancelar
            </button>
            <button class="btn btn-success float-end" type="submit">
                <i class="bi bi-floppy"></i> Guardar
            </button>


        </div>
        <!--end::Footer-->
    </form>
</div>
