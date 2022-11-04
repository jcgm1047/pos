<?php
require_once "../controller/productos.controller.php";
require_once "../model/productos.model.php";


class TablaProductosVentas
{
    /* mostrar la tabla de productos */
    public function mostrarTablaProductosVentas()
    {

        $item = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

        $datosJson = '{
    "data": [';
        for ($i = 0; $i < count($productos); $i++) {


            /* Trae La imagen */
            $img = "<img src='" . $productos[$i]["imagen"] . "' width='40px'>";



            /* Mostrar estado de stock */

            if ($productos[$i]["stock"] <= 10) {
                $stock = "<button class='btn btn-danger'>" . $productos[$i]["stock"] . "</button>";
            } else if ($productos[$i]["stock"] > 11 && $productos[$i]["stock"] < 20) {
                $stock = "<button class='btn btn-warning'>" . $productos[$i]["stock"] . "</button>";
            } else {
                $stock = "<button class='btn btn-success'>" . $productos[$i]["stock"] . "</button>";
            }



            /* Trae los botones */
            $btn = "<div class='btn-group'><button class='btn btn-primary agrearProducto recuperarBoton' idProducto = '" . $productos[$i]["id"] . "' >Agregar</button></div>";


            $datosJson .= '[
      "' . $i + 1 . '",
      "' . $img . '",
      "' . $productos[$i]["codigo"] . '",
      "' . $productos[$i]["descripcion"] . '",     
      "' .  $stock . '",      
      "' . $btn . '"
    ],';
        }


        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
  }';

        echo $datosJson;
    }
}

/* Activar tabla productos */

$activarProductos = new  TablaProductosVentas();
$activarProductos->mostrarTablaProductosVentas();
