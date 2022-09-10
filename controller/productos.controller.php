<?php 

class ControladorProductos
{

    /* Mostrar Productos */
    
static public function ctrMostrarProductos ($item, $valor){

$tabla = 'productos';
$respuesta = ModeloProducto::mdlMostrarProducto($tabla, $item, $valor);

return $respuesta;




}


}
