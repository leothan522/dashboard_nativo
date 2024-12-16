<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Todos [ <b class="text-primary"><?= $total ?></b> ]</h3>
        <div class="card-tools">

            <button type="button" class="btn btn-tool" onclick="verMas()">
                <i class="fa-solid fa-arrow-down-short-wide"></i> Ver mas
            </button>
        </div>
    </div>
    <div class="card-body table-responsive p-0" style="max-height: 60vh">


        <table class="table table-sm table-hover table-head-fixed">
            <thead class="table-light">
            <tr>
                <th style="width: 5%">#</th>
                <th class="text-truncate" style="max-width: 150px">Nombre</th>
                <th class="d-none d-md-table-cell text-center text-truncate" style="max-width: 150px">Tabla_id</th>
                <th class="d-none d-md-table-cell">Valor</th>
                <th class="text-center" style="width: 10%">Btn.</th>
            </tr>
            </thead>
            <tbody >
            <?php
            $i = 1;
            foreach ($parametros as $parametro){ ?>
                <tr class="align-middle">
                    <td><?= $i++ ?></td>
                    <td class="text-truncate text-lowercase" style="max-width: 150px"><?= $parametro->nombre ?></td>
                    <td class="d-none d-md-table-cell text-center"><?= $parametro->tabla_id ?></td>
                    <td class="text-truncate d-none d-md-table-cell" style="max-width: 150px"><?= $parametro->valor ?></td>
                    <td class="align-items-end">
                        <div class="btn-toolbar justify-content-end" role="toolbar" aria-label="Toolbar with button groups">

                            <div class="btn-group me-2 d-md-none" role="group" aria-label="First group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>

                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <!--<button type="button" class="btn btn-primary d-none d-md-table-cell btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </button>-->
                                <button type="button" class="btn btn-primary d-none d-md-table-cell btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button type="button" class="btn btn-primary d-none d-md-table-cell btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                            </div>

                        </div>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>




    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <span data-rows="<?= $totalRows ?>" id="total_rows_parametros"> Mostrando <b class="text-primary"><?= $totalRows ?></b></span>
    </div>
    <!-- /.card-footer-->
</div>
