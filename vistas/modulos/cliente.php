<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de clientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Home</a></li>
                        <li class="breadcrumb-item active">Administración de clientes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content 
    Modal para el ingresode clientes-->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Crear Clientes</button>


            </div>
            <div class="card-body">
                <form method="POST">
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Crear Clientes</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cédula de identidad" name="cedula" id="cedula" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Nombres completos" name="nombre" id="nombre" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Apelidos completos" name="apellido" id="apellido" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Direccion" name="direccion" id="direccion" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-route"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" placeholder="Email" name="correo" id="correo" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <?php
                                    $objUsuario = new ControladorClientes();
                                    $objUsuario->crtlGuardarCliente(); 
                                    ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <!-- /.Tabla de clientes -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Datos de Clientes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                $datosCliente = $objUsuario->ctrlCargarClientes(); 
                ?>
                <table id="example1" class="table table-sm">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Cedula</th>
                    <th>Nombre</th> 
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                     public static function ctrlCargarClientes($parametro, $id){
                        $tabla ="cliente";
                        $datosCliente = ModeloCliente::mdlCargarCliente($tabla, $parametro, $id);
                        return $datosCliente;
                    }
                    foreach ($datosCliente as $Cliente ){
                    echo "
                  <tr>
                    <td>". $Cliente["idpersona"]. "</td>
                    <td>". $Cliente["cedula"]. " </td>
                    <td>". $Cliente["nombre"]. " </td>
                    <td>". $Cliente["apellidos"]. " </td>
                    <td>". $Cliente["direccion"]. " </td>
                    <td>". $Cliente["telefono"]. " </td>
                    <td>". $Cliente["email"]. " </td>
                    <td>
                        <div class='btn btn-group'> 
                        <button class='btn btn-outline-info btnCargarDatos' idCliente='".$Cliente["idClientes"]."'
                         data-toggle='modal' data-target='#ModalEditar'><i class='fas fa-edit'></i></button>
                        <button class='btn btn-outline-dark'><i class='fas fa-trash-alt'></i></button>
                        </div> 
                    </td>
                  </tr> ";
                }
                  ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>                   
                  </tr>
                  <tfoot>
                    <th>ID</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Acciones<th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        <div>
            <div class="card-body">
                <form method="POST">
                    <div id="ModalEditar" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Clientes</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cédula de identidad" name="editar_cedula" id="editar_cedula" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Nombres completos" name="editar_nombre" id="editar_nombre" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Apellidos completos" name="editar_apellido" id="editar_apellido" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Direccion" name="editar_direccion" id="editar_direccion" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-route"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Telefono" name="editar_telefono" id="editar_telefono" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" placeholder="Email" name="editar_correo" id="editar_correo" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <?php
                                    #Codigo para cargar datos al modal
                                    ?>
                                    </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->