<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Administrar Cliente

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Clientes</li>
    </ol>
  </section>
  <!--  -->
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          Agregar Cliente
        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Documento ID</th>
              <th>Email</th>
              <th>Telefono</th>
              <th>Direccion</th>
              <th>Fecha Nacimiento</th>
              <th>Total Compras</th>
              <th>Ingreso al Sistema</th>
              <th>Ultima Compra</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $clientes = ControladorCliente::ctrMostrarCliente($item, $valor);


            foreach ($clientes as $key => $value) {

              echo


              '<tr>
                    <td>' . ($key + 1) . '</td>
                    <td>' . $value["nombre"] . '</td>
                    <td>' . $value["documento"] . '</td>
                    <td>' . $value["email"] . '</td>
                    <td>' . $value["telefono"] . '</td>
                    <td>' . $value["direccion"] . '</td>
                    <td>' . $value["fecha_nacimiento"] . '</td>
                    <td>' . $value["compras"] . '</td>
                    <td>' . $value["fecha"] . '</td>
                    <td>0000-00-00 00:00:00</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarCliente" data-toggle = "modal" data-target="#modalEditarCliente"  idCliente = "' . $value["id"] . '"> <i class="fa fa-pencil"></i> </button>
                        
                        <button class="btn btn-danger btnEliminarCliente" idCliente = "' . $value["id"] . '"> <i class="fa fa-times"></i> </button>
                      </div>
                    </td>
            </tr>';
            } ?>

          </tbody>


        </table>

      </div>

    </div>

  </section>

</div>


<!-- Modal Agregar Cliente -->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!-- Modal Header-->
        <div class="modal-header" style="background: #3c8dbc ; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Cliente</h4>

        </div>

        <!-- Modal Body -->

        <div class="modal-body">

          <div class="box-body">

            <!-- Nombre -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="nuevoCliente" id="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                <input class="form-control input-lg" type="number" min="0" name="nuevoDocumentoId" id="nuevoDocumentoid" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- Email -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input class="form-control input-lg" type="email" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar e-mail">
              </div>

            </div>

            <!-- Telefono -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input class="form-control input-lg" type="text" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar telefono" data-inputmask='"mask": "(999) 999-9999"' data-mask required>

              </div>

            </div>

            <!-- Direccion -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input class="form-control input-lg" type="text" name="nuevaDireccion" id="nuevaDireccion" placeholder="Ingresar direccion" required>

              </div>

            </div>

            <!-- Fecha de Nacimiento -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>

                <input class="form-control input-lg" type="datetime" name="nuevaFechaNacimiento" id="nuevaFechaNacimiento" placeholder="Ingresar fecha de nacimiento" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask require>
              </div>

            </div>



          </div>

        </div>
        <!-- footer modal -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cliente</button>

        </div>

      </form>

      <?php

      $crearCliente = new ControladorCliente();
      $crearCliente->ctrCrearCliente();



      ?>

    </div>

  </div>

</div>

<!-- Modal Editar Cliente -->

<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!-- Modal Header-->
        <div class="modal-header" style="background: #3c8dbc ; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Cliente</h4>

        </div>

        <!-- Modal Body -->

        <div class="modal-body">

          <div class="box-body">

            <!-- Nombre -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="editarCliente" id="editarCliente" required>

                <input type="hidden" name="idCliente" id="idCliente">

              </div>

            </div>

            <!-- ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                <input class="form-control input-lg" type="number" min="0" name="editarDocumentoId" id="editarDocumentoid" required>

              </div>

            </div>

            <!-- Email -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input class="form-control input-lg" type="email" name="editarEmail" id="editarEmail">
              </div>

            </div>

            <!-- Telefono -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input class="form-control input-lg" type="text" name="editarTelefono" id="editarTelefono" data-inputmask='"mask": "(999) 999-9999"' data-mask required>

              </div>

            </div>

            <!-- Direccion -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-pin"></i>
                </span>

                <input class="form-control input-lg" type="text" name="editarDireccion" id="editarDireccion" required>

              </div>

            </div>

            <!-- Fecha de Nacimiento -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input class="form-control input-lg" type="datetime" name="editarFechaNacimiento" id="editarFechaNacimiento" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask require>
              </div>

            </div>



          </div>

        </div>
        <!-- footer modal -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

      </form>
      <?php
      $editarCliente = new ControladorCliente();
      $editarCliente->ctrEditarCliente();
      ?>
    </div>

  </div>

</div>

<?php
$EliminarCliente = new ControladorCliente();
$EliminarCliente->ctrEliminarCliente();
?>