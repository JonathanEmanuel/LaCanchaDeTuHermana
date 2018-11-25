<div class="container">
    <div class="row">
        <form id="frm-EquiposBuscar">
            <div class="col-md-6">
                <input id="txt-buscar" class="form-control" type="text" placeholder="Buscar...">
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
            <div class="col-md-4 col-sm-offset-1">
                <select  id="" class="form-control text-uppercase">
                    <option value="0">Selecionar Torneo</option>
                    <?php
                        foreach ($listaTorneo as $key => $torneo) {
                            echo('<option value="'.$torneo['TorneoId'].'"> '.$torneo['Nombre'].'</option>');
                        }
                    ?>
                </select>
            </div>
        </form> 
    </div>

    <div class="col-m-12">
    </div>

</div>