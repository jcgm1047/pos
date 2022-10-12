<?php
require_once "../controller/productos.controller.php";
require_once "../model/productos.model.php";

require_once "../controller/categoria.controller.php";
require_once "../model/categoria.model.php";

class TablaProductos
{
  /* mostrar la tabla de productos */
  public function mostrarTablaProductos()
  {

    $item = null;
    $valor = null;

    $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

    $datosJson = '{
    "data": [';
    for ($i = 0; $i < count($productos); $i++) {


      /* Trae La imagen */
      $img = "<img src='" . $productos[$i]["imagen"] . "' width='40px'>";

      /* Trae la Categoria */
      $item = "id";
      $valor = $productos[$i]["id_categoria"];
      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

      /* Mostrar estado de stock */

      if ($productos[$i]["stock"] <= 10) {
        $stock = "<button class='btn btn-danger'>" . $productos[$i]["stock"] . "</button>";
      } else if ($productos[$i]["stock"] > 11 && $productos[$i]["stock"] < 20) {
        $stock = "<button class='btn btn-warning'>" . $productos[$i]["stock"] . "</button>";
      } else {
        $stock = "<button class='btn btn-success'>" . $productos[$i]["stock"] . "</button>";
      }



      /* Trae los botones */
      $btn = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto= '" . $productos[$i]["id"] . "' data-toggle='modal' data-target=#modalEditarProducto> <i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto= '" . $productos[$i]["id"] . "' codigo = '" . $productos[$i]["codigo"] . "' imagen = '" . $productos[$i]["imagen"] . "'><i class='fa fa-times'></i> </button></div>";



      $datosJson .= '[
      "' . $i + 1 . '",
      "' . $img . '",
      "' . $productos[$i]["codigo"] . '",
      "' . $productos[$i]["descripcion"] . '",
      "' . $categorias["categoria"] . '",
      "' .  $stock . '",
      "' . $productos[$i]["precio_compra"] . '",
      "' . $productos[$i]["precio_venta"] . '",
      "' . $productos[$i]["fecha"] . '",                
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

$activarProductos = new TablaProductos();
$activarProductos->mostrarTablaProductos();
