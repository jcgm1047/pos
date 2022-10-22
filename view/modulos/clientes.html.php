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
              <th>Ultima Compra</th>
              <th>Ingreso al Sistema</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Juan camilo</td>
              <td>5645645</td>
              <td>jcgm1047@gmial.com</td>
              <td>307-985-9999</td>
              <td>calle 75 #85-96</td>
              <td>15-11-1995</td>
              <td>0</td>
              <td>0000-00-00 00:00:00</td>
              <td>2022-10-15 01:15:22</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil"></i> </button>
                  <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                </div>
              </td>
            </tr>
          </tbody>


        </table>

      </div>

    </div>

  </section>

</div>


<!-- Modal agregar Categoria -->

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

                <input class="form-control input-lg" type="number" min="0" name="nuevoDocumentoid" id="nuevoDocumentoid" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- Email -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input  class="form-control input-lg" type="email" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar e-mail">
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

                <input  class="form-control input-lg" type="datetime" name="nuevaFechaNacimiento" id="nuevaFechaNacimiento" placeholder="Ingresar fecha de nacimiento" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask require>
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

    </div>

  </div>

</div>