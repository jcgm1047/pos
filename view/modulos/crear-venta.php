<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Crear venta

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Crear venta</li>

    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--  EL FORMULARIO -->



      <div class="col-lg-5 col-xs-12">

        <div class="box box-success">

          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta" >

            <div class="box-body">

              <div class="box">

                <!--   ENTRADA DEL VENDEDOR -->



                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div>

                <!-- ENTRADA DEL VENDEDOR -->



                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>


                    <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if (!$ventas) {

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="100001" readonly>';
                    } else {

                      foreach ($ventas as $key => $value) {
                      }

                      $codigo = $value["codigo"] + 1;

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="' . $codigo . '" readonly>';
                    }


                    ?>

                  </div>

                </div>

                <!--   ENTRADA DEL CLIENTE -->



                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                      <option value="">Seleccionar cliente</option>

                      <?php

                      $item = null;
                      $valor = null;

                      $clientes = ControladorCliente::ctrMostrarCliente($item, $valor);

                      foreach ($clientes as $key => $value) {

                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                      }

                      ?>


                    </select>

                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>

                  </div>

                </div>

                <!-- ENTRADA PARA AGREGAR PRODUCTO -->



                <div class="form-group row nuevoProducto">

                 

                </div>

                <!--   BOT??N PARA AGREGAR PRODUCTO -->



                <button type="button" class="btn btn-default hidden-lg">Agregar producto</button>

                <hr>

                <div class="row">

                  <!--  ENTRADA IMPUESTOS Y TOTAL -->



                  <div class="col-xs-12 ">

                    <table class="table">

                      <thead>

                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>
                        </tr>

                      </thead>

                      <tbody>

                        <tr>

                          <td style="width: 50%">

                            <div class="input-group">

                              <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                            </div>

                          </td>

                          <td style="width: 50%">

                            <div class="input-group">

                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="number" min="1" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>


                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <hr>

                <!-- ENTRADA M??TODO DE PAGO -->



                <div class="form-group row">

                  <div class="col-xs-6" style="padding-right:0px">

                    <div class="input-group">

                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione m??todo de pago</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjetaCredito">Tarjeta Cr??dito</option>
                        <option value="tarjetaDebito">Tarjeta D??bito</option>
                      </select>

                    </div>

                  </div>

                  <div class="col-xs-6" style="padding-left:0px">

                    <div class="input-group">

                      <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="C??digo transacci??n" required>

                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                    </div>

                  </div>

                </div>

                <br>

              </div>

            </div>

            <div class="box-footer">

              <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

            </div>

          </form>

        </div>

      </div>

      <!-- LA TABLA DE PRODUCTOS -->



      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablaVentas">

              <thead>

                <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>C??digo</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Acciones</th>
                </tr>

              </thead>



            </table>

          </div>

        </div>


      </div>

    </div>

  </section>

</div>

<!-- modal agregar cliente -->

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