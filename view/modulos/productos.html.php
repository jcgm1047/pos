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

        <table class="table table-bordered table-striped dt-responsive tablas">

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
          <tbody>
            <tr>
              <td>1</td>
              <td><img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>0001</td>
              <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum dignissimos a perferendis quibusdam? </td>
              <td>Lorem ipsum</td>
              <td>20</td>
              <td>$20</td>
              <td>$10</td>
              <td>2022-15-11 15:05:02</td>
              <td>

                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil"></i> </button>
                  <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                </div>
              </td>

            </tr>

            <tr>
              <td>1</td>
              <td><img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>0001</td>
              <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum dignissimos a perferendis quibusdam? </td>
              <td>Lorem ipsum</td>
              <td>20</td>
              <td>$20</td>
              <td>$10</td>
              <td>2022-15-11 15:05:02</td>
              <td>

                <div class="btn-group">
                  <button class="btn btn-warning"> <i class="fa fa-pencil"></i> </button>
                  <button class="btn btn-danger"> <i class="fa fa-times"></i> </button>
                </div>
              </td>

            </tr>

            <tr>
              <td>1</td>
              <td><img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>0001</td>
              <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum dignissimos a perferendis quibusdam? </td>
              <td>Lorem ipsum</td>
              <td>20</td>
              <td>$20</td>
              <td>$10</td>
              <td>2022-15-11 15:05:02</td>
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


<!-- Modal agregar Producto -->

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

            <!-- Codigo -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input class="form-control input-lg" type="text" name="nuevoCodigo" id="nuevoCodigo" placeholder="Ingresar Codigo" required>

              </div>

            </div>
            <!-- Descripcion -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input class="form-control input-lg" type="text" name="nuevaDescripcion" id="nuevaDescripcion" placeholder="Ingresar nueva descripción" required>

              </div>

            </div>

            <!-- Seleccionar Categoria -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="nuevoCategoria" id="nuevoCategoria">

                  <option value="">Seleccionar Categoria</option>
                  <option value="Taladros">Taladros</option>
                  <option value="Andamios">Andamios</option>
                  <option value="Equipos para construccion">Equipos para construccion</option>

                </select>

              </div>

            </div>

            <!-- Stock -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input class="form-control input-lg" type="number" name="nuevoStock" id="nuevoStock" min="0" placeholder="Stock" required>

              </div>

            </div>

            <!-- Precio Compra -->
            <div class="form-group row">

              <div class="col-xs-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                  <input class="form-control input-lg" type="number" name="nuevoPrecioCompra" id="nuevoPrecioCompra" min="0" placeholder="Precio de compra" required>

                </div>

              </div>

              <!-- Precio Venta -->
              <div class="col-xs-6">

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

              <input type="file" name="nuevaImagen" id="nuevaImagen">
              <p class="help-block">Peso maximo de la Imagen 2MB</p>
              <img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" alt="" class="img-thumbnail" width="100px">

            </div>

          </div>

        </div>

        <!-- footer modal -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Producto</button>

        </div>

      </form>

    </div>

  </div>

</div>