<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Administrar Productos

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Productos</li>
    </ol>
  </section>
  <!--  -->
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar Producto
        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">

          <thead>

            <tr>
              <th style="width:10px">#</th>
              <th>Imagen</th>
              <th>Codigo</th>
              <th>Descripción</th>
              <th>Categoria</th>
              <th>Stock</th>
              <th>Precio de compra </th>
              <th>Precio de venta</th>
              <th>Agregado</th>
              <th>Acciones</th>
            </tr>

          </thead>



        </table>

      </div>

    </div>

  </section>

</div>


<!-- MODAL AGREGAR PRODUCTO -->

<div id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">


    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- Modal Header-->
        <div class="modal-header" style="background: #3c8dbc ; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Producto</h4>

        </div>

        <!-- Modal Body -->

        <div class="modal-body">

          <div class="box-body">

            <!-- Seleccionar Categoria -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="nuevoCategoria" id="nuevoCategoria" required>

                  <option value="">Seleccionar Categoria</option>

                  <?php

                  $item = null;
                  $valor = null;


                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                  }

                  ?>
                </select>

              </div>

            </div>

            <!-- Codigo -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input class="form-control input-lg" type="text" name="nuevoCodigo" id="nuevoCodigo" placeholder="Ingresar Codigo" readonly required>

              </div>

            </div>
            <!-- Descripcion -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input class="form-control input-lg" type="text" name="nuevaDescripcion" id="nuevaDescripcion" placeholder="Ingresar nueva descripción" required>

              </div>

            </div>



            <!-- Stock -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input class="form-control input-lg" type="number" step="any" name="nuevoStock" id="nuevoStock" min="0" placeholder="Stock" required>

              </div>

            </div>

            <!-- Precio Compra -->
            <div class="form-group row">

              <div class="col-xs-12 col-sm-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                  <input class="form-control input-lg" type="number" step="any" name="nuevoPrecioCompra" id="nuevoPrecioCompra" min="0" placeholder="Precio de compra" required>

                </div>

              </div>

              <!-- Precio Venta -->
              <div class="col-xs-12 col-sm-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                  <input class="form-control input-lg" type="number" name="nuevoPrecioVenta" id="nuevoPrecioVenta" min="0" placeholder="Precio de venta" required>

                </div>

                <br>
                <!-- Checkbox para porcentaje -->
                <div class="col-xs-6">

                  <div class="form-group">

                    <label><input type="checkbox" class="minimal porcentaje" checked> Utilizar Porcentaje</label>

                  </div>

                </div>

                <!-- Entrada para porcentaje -->

                <div class="col-xs-6" style="padding:0">

                  <div class="input-group">

                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                    <span class="input-group-addon"> <i class="fa fa-percent"></i></span>

                  </div>


                </div>


              </div>

            </div>

            <!-- Cargar foto -->
            <div class="form-group">

              <div class="panel">Cargar Imagen</div>

              <input type="file" name="nuevaImagen" class="nuevaImagen">
              <p class="help-block">Peso maximo de la Imagen 2MB</p>
              <img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" alt="" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!-- footer modal -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Producto</button>

        </div>

      </form>
      <?php
      $crearProducto = new ControladorProductos();
      $crearProducto->ctrCrearproducto();


      ?>


    </div>

  </div>

</div>


<!-- MODAL EDITAR PRODUCTO -->

<div id="modalEditarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">


    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- Modal Header-->
        <div class="modal-header" style="background: #3c8dbc ; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Producto</h4>

        </div>

        <!-- Modal Body -->

        <div class="modal-body">

          <div class="box-body">

            <!-- Editar Categoria -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="editarCategoria" readonly required>

                  <option id="editarCategoria"></option>


                </select>

              </div>

            </div>

            <!-- Editar Codigo -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input class="form-control input-lg" type="text" name="editarCodigo" id="editarCodigo" readonly required>

              </div>

            </div>
            <!-- Editar Descripcion -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input class="form-control input-lg" type="text" name="editarDescripcion" id="editarDescripcion" required>

              </div>

            </div>



            <!-- Editar Stock -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input class="form-control input-lg" type="number" step="any" name="editarStock" id="editarStock" min="0" required>

              </div>

            </div>

            <!-- Precio Compra -->
            <div class="form-group row">

              <div class="col-xs-12 col-sm-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                  <input class="form-control input-lg" type="number" step="any" name="editarPrecioCompra" id="editarPrecioCompra" min="0" required>

                </div>

              </div>

              <!-- Precio Venta -->
              <div class="col-xs-12 col-sm-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                  <input class="form-control input-lg" type="number" name="editarPrecioVenta" id="editarPrecioVenta" min="0" required>

                </div>

                <br>
                <!-- Checkbox para porcentaje -->
                <div class="col-xs-6">

                  <div class="form-group">

                    <label><input type="checkbox" class="minimal porcentaje" checked> Utilizar Porcentaje</label>

                  </div>

                </div>

                <!-- Entrada para porcentaje -->

                <div class="col-xs-6" style="padding:0">

                  <div class="input-group">

                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                    <span class="input-group-addon"> <i class="fa fa-percent"></i></span>

                  </div>


                </div>


              </div>

            </div>

            <!-- Cargar foto -->
            <div class="form-group">

              <div class="panel">Cargar Imagen</div>

              <input type="file" name="editarImagen" class="nuevaImagen">
              <p class="help-block">Peso maximo de la Imagen 2MB</p>
              <img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" alt="" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!-- footer modal -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

      </form>
      


    </div>

  </div>

</div>