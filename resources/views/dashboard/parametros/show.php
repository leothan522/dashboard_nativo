<div class="row justify-content-center">

    <div class="col-6">

        <ol class="list-group">

            <li class="list-group-item active d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="">Información</div>
                </div>
                <span class="fw-bold"><i class="fa-solid fa-book"></i></span>
            </li>

            <li class="list-group-item list-group-item-light d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div>Nombre:</div>
                </div>
                <span class="fw-bold text-primary ms-2 text-uppercase" id="show_nombre">
                    <?php
                    if (isset($lastRegistro) && $lastRegistro){
                        echo $lastRegistro->nombre;
                    }else{
                        echo "NULL";
                    }
                    ?>
                </span>
            </li>
            <li class="list-group-item list-group-item-light d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div>Tabla_id:</div>
                </div>
                <span class="fw-bold text-primary ms-2 text-uppercase" id="show_tabla_id">
                    <?php
                    if (isset($lastRegistro) && $lastRegistro){
                        echo $lastRegistro->tabla_id;
                    }else{
                        echo "NULL";
                    }
                    ?>
                </span>
            </li>
            <li class="list-group-item list-group-item-light d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div>Valor:</div>
                </div>
                <span class="fw-bold text-primary ms-2 text-uppercase" id="show_valor">
                    <?php
                    if (isset($lastRegistro) && $lastRegistro){
                        echo $lastRegistro->valor;
                    }else{
                        echo "NULL";
                    }
                    ?>
                </span>
            </li>
        </ol>
    </div>
</div>

