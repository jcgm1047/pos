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

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">



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

            <?php
            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);


            foreach ($usuarios as $key => $value) {


              echo '
              <tr>
                <td>' . $value["id"] . '</td>
                <td>' . $value["nombre"] . '</td>
                <td>' . $value["usuario"] . '</td>';

              if ($value["foto"] != "") {
                echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
              } else {
                echo '<td><img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" class="img-thumbnail" width="40px"></td>';
              }
              echo
              '<td>' . $value["perfil"] . '</td>';

              if ($value["estado"] != 0) {

                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario = "' . $value['id'] . '" estadoUsuario = "0" >Activado</button></td>';
              } else {

                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario = "' . $value['id'] . '" estadoUsuario = "1" >Desactivado</button></td>';
              }

              echo '<td>' . $value["ultimo_login"] . '</td>
                
              <td>
                <div class="btn-group">
                <button class="btn btn-warning btnEditarUsuario" idUsuario ="' . $value['id'] . '" data-toggle="modal" data-target="#modalEditarUsuario"> <i class="fa fa-pencil"></i> </button>
                <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                </div>
              </td>

            </tr>';
            }

            ?>

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

      <form role="form" method="post" enctype="multipart/form-data">

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
            <!-- Nuevo Usuario -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key" style="width: 10px;"></i></span>

                <input class="form-control input-lg" type="text" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingresar Usuario" required>

              </div>

            </div>
            <!-- Contraseña -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="text" name="nuevoPassword" placeholder="Ingresar Contraseña" required>

              </div>

            </div>
            <!-- Seleccion perfil -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users" style="width: 10px;"></i></span>

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

              <input type="file" name="nuevaFoto" class="nuevaFoto">
              <p class="help-block">Peso maximo de la foto 2MB</p>
              <img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" alt="" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>
        <!-- footer modal -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>

        </div>

        <?php

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario()




        ?>
      </form>

    </div>

  </div>

</div>


<!--============================== -->



<!-- Modal Editar usuario -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">


        <!-- Modal Header-->

        <div class="modal-header" style="background: #3c8dbc ; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Usuario</h4>

        </div>


        <!-- Modal Body -->

        <div class="modal-body">

          <div class="box-body">

            <!-- Editar Nombre -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>


            <!--Editar Usuario -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key" style="width: 10px;"></i></span>

                <input class="form-control input-lg" type="text" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>


            <!-- Editar Contraseña -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva Contraseña">
                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>


            <!-- Editar perfil -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users" style="width: 10px;"></i></span>

                <select class="form-control input-lg" name="editarPerfil" id="">

                  <option value="" id="editarPerfil"></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Especial">Especial</option>
                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>


            <!-- Editar foto -->

            <div class="form-group">

              <div class="panel">Cargar Foto</div>

              <input type="file" name="editarFoto" class="nuevaFoto">
              <p class="help-block">Peso maximo de la foto 2MB</p>
              <img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" alt="" class="img-thumbnail previsualizar" width="100px">
              <input type="hidden" name="fotoActual" id="fotoActual">
            </div>

          </div>

        </div>


        <!-- footer modal -->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Modificar Usuario</button>

        </div>

        <?php

        $editarUsuario = new ControladorUsuarios();
        $editarUsuario->ctrEditarUsuario();




        ?>
      </form>

    </div>

  </div>

</div>