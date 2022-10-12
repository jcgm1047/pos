<?php
require_once "../controller/productos.controller.php";
require_once "../model/productos.model.php";


class AjaxProductos
{

    /* Generar productos apartir de Id Categoria */


    public $idCategoria;
    public function ajaxCrearCodigoProducto()
    {

        $item = "id_categoria";
        $valor = $this->idCategoria;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }

    /* Editar producto */

    public $idProducto;

    public function ajaxEditarProducto()
    {

        $item = "id";
        $valor = $this->idProducto;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }
}

/* Generar codigo apartir de id categoria */

if (isset($_POST["idCategoria"])) {

    $codigoProducto = new AjaxProductos();
    $codigoProducto->idCategoria = $_POST["idCategoria"];
    $codigoProducto->ajaxCrearCodigoProducto();
}

/* Editar Producto */

if (isset($_POST["idProducto"])) {

    $editarProducto = new AjaxProductos;
    $editarProducto->idProducto =  $_POST["idProducto"];
    $editarProducto->ajaxEditarProducto();
}
