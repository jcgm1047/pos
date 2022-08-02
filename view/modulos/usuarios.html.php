<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Administrar Usduarios

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Usuarios</li>
    </ol>
  </section>
  <!--  -->
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar usuario
        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>
            <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Ultimo login</th>
              <th>Acciones</th>
            </tr>

          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>usuario Administrador</td>
              <td>admin</td>
              <td><img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrador</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td>2022-07-06 12:05:03</td>
              <td>

                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil"></i> </button>
                  <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                </div>
              </td>

            </tr>

            <tr>
              <td>1</td>
              <td>usuario Administrador</td>
              <td>admin</td>
              <td><img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrador</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td>2022-07-06 12:05:03</td>
              <td>

                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil"></i> </button>
                  <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                </div>
              </td>

            </tr>

            <tr>
              <td>1</td>
              <td>usuario Administrador</td>
              <td>admin</td>
              <td><img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrador</td>
              <td><button class="btn btn-danger btn-xs">Desactivado</button></td>
              <td>2022-07-06 12:05:03</td>
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


<!-- Modal agregar usuario -->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">


    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" >

        <!-- Modal Header-->
        <div class="modal-header" style="background: #3c8dbc ; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>

        </div>

        <!-- Modal Body -->

        <div class="modal-body">

          <div class="box-body">

            <!-- Nombre -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="nuevoNombre" placeholder="Ingresar Nombre" required>

              </div>

            </div>
            <!-- Usuario -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" name="nuevoUsuario" placeholder="Ingresar Usuario" required>

              </div>

            </div>
            <!-- Contraseña -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="text" name="nuevoContraseña" placeholder="Ingresar Contraseña" required>

              </div>

            </div>
            <!-- Seleccion perfil -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoPerfil" id="">

                  <option value="">Seleccionar</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Especial">Especial</option>
                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>
            <!-- Cargar foto -->
            <div class="form-group">

              <div class="panel">Cargar Foto</div>

              <input type="file" name="nuevaFoto" id="nuevaFoto">
              <p class="help-block">Peso maximo de la foto 200 MB</p>
              <img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" alt="" class="img-thumbnail" width="100px">

            </div>

          </div>

        </div>
        <!-- footer modal -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>

        </div>

      </form>

    </div>

  </div>

</div>