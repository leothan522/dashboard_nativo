<div class="card card-primary card-outline" id="div_card_table">
    <div class="card-header" id="div_card_table_header">
        <h3 class="card-title">
            <?php if (isset($keyword)){ ?>
                Búsqueda
                <span class="text-nowrap">{ <b class="text-warning"><?= $keyword ?></b> }</span>
                <span class="text-nowrap">[ <b class="text-warning"><?= $limitRows ?></b> ]</span>
                <button class="d-sm-none btn btn-tool text-warning">
                    <i class="fas fa-times"></i>
                </button>
            <?php }else{ ?>
                Todos [ <b class="text-warning"><?= formatoMillares($totalRows, 0) ?></b> ]
            <?php } ?>


        </h3>
        <div class="card-tools">

            <button type="button" class="btn btn-tool" onclick="btnVerMas('true')">
                <i class="fa-solid fa-rotate"></i>
            </button>
            <?php if ($btnDisabled || isset($keyword)){ ?>
            <small class="opacity-25">
                <i class="fa-solid fa-arrow-down-short-wide"></i> Ver mas
            </small>
            <?php }else{ ?>
                <button type="button" class="btn btn-tool" onclick="btnVerMas()">
                    <i class="fa-solid fa-arrow-down-short-wide"></i> Ver mas
                </button>
            <?php } ?>


        </div>
    </div>
    <div class="card-body table-responsive p-0" id="div_card_table_body" style="max-height: calc(100vh - 320px)">


        <table class="table table-sm table-hover table-head-fixed">
            <thead class="table-light">
            <tr>
                <th class="text-uppercase text-primary-emphasis">Codigo</th>
                <th class="text-uppercase text-primary-emphasis">Nombre</th>
                <th class="text-center text-primary-emphasis" style="width: 10%"><small class="text-nowrap">Rows <?= $limitRows ?></small></th>
            </tr>
            </thead>
            <tbody id="tbody_card_table">
                <?php
                    if (!empty($listarRegistros)){
                    foreach ($listarRegistros as $row){
                        $clase = '';
                        if ($row->rowquid == $actualRowquid){
                            $clase = 'table-warning';
                        }
                        $search = 'false';
                        if (isset($keyword)){
                            $search = 'true';
                        }

                ?>
                    <tr class="align-middle <?= $clase ?>">
                        <td class="text-uppercase">
                            <?= $row->id ?>
                        </td>
                        <td class="text-uppercase text-truncate" style="max-width: 150px">
                            <?= $row->nombre ?>
                        </td>
                        <td class="">
                            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">

                                <div class="btn-group" role="group" aria-label="First group">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="getShow('<?= $row->rowquid ?>', '<?= $search ?>')">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>

                            </div>
                        </td>
                    </tr>
                <?php
                        }
                    }else{
                ?>
                        <tr class="align-middle">
                            <td colspan="3" class="text-uppercase text-center">
                                <?php if (isset($keyword)){ ?>
                                    Sin resustados para la busqueda
                                <?php }else{ ?>
                                    Sin registros guardados
                                <?php } ?>

                            </td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php verCargando(); ?>


    </div>
    <!-- /.card-body -->
    <div class="card-footer" id="div_card_table_footer">
        <span data-rows="<?= $limit ?>" id="total_rows"> Mostrando <b class="text-warning"><?= $limitRows ?></b></span>
    </div>
    <!-- /.card-footer-->
</div>
