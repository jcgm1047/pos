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



    $img = "<img src='view/img/productos/101/105.png' width='40px'>";
    $btn = "<div class='btn-group'><button class='btn btn-warning'> <i class='fa fa-pencil'></i> </button><button class='btn btn-danger'> <i class='fa fa-times'></i> </button></div>";

    $datosJson = '{
    "data": [';
    for ($i = 0; $i < count($productos); $i++) {

      $img = "<img src='" . $productos[$i]["imagen"] . "' width='40px'>";

      $item = "id";
      $valor = $productos[$i]["id_categoria"];
      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);




      $datosJson .= '[
      "' . $i + 1 . '",
      "' . $img . '",
      "' . $productos[$i]["codigo"] . '",
      "' . $productos[$i]["descripcion"] . '",
      "' . $categorias["categoria"] . '",
      "' . $productos[$i]["stock"] . '",
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
