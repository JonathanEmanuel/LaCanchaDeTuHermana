<div class="container">
        <h4>Clientes</h4>
        <div class=" col-lg-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <?php
                        // Carga Resgistros en tabla. Agregar Funcionabilidad para mostrar msj Sin registros en el caso que no se obtengan resultados
                        // EN la consulta en la db
                        foreach ($listaClientes as $cliente) {
                                echo(' <tr data-codigo="' . $cliente['ClienteId'] .'">');
    
                                echo('<td>'.$cliente['Nombres'] . '</td>');
                                echo('<td>'.$cliente['Apellido'] . '</td>');
                                echo('<td>'.$cliente['Email'] . '</td>');
                                echo('<td>'.$cliente['Rol'] . '</td>');
                                echo('<td><button class="btn btn-info btn-sm" onclick=clienteAbrir(this)"><i class="fa fa-pencil fa-fw"></i></button> </td>');
                                echo('<td><button class="btn btn-danger btn-sm" onclick="clienteBaja(this)"><i class="fa fa-times fa-fw"></i></button> </td>');
                                echo(' </tr>');
                      
                        }

                    ?>
                </tbody>
            </table>
            </div>
        
    </div>
