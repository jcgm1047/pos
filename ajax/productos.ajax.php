<?php 
require_once "../controller/productos.controller.php";
require_once "../model/productos.model.php";


class AjaxProductos{

/* Generar productos apartir de Id Categoria */


public $idCategoria;
public function ajaxCrearCodigoProducto(){

$item = "id_categoria";
$valor = $this ->idCategoria;

$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

echo json_encode($respuesta);




}

}

if (isset($_POST["idCategoria"])) {
    
    $codigoProducto = new AjaxProductos();
    $codigoProducto -> idCategoria = $_POST["idCategoria"];
    $codigoProducto -> ajaxCrearCodigoProducto();



}
