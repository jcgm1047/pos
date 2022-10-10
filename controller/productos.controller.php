<?php

class ControladorProductos
{

    /* Mostrar Productos */

    static public function ctrMostrarProductos($item, $valor)
    {

        $tabla = 'productos';
        $respuesta = ModeloProducto::mdlMostrarProducto($tabla, $item, $valor);

        return $respuesta;
    }

    /*Crear Prodcuto  */

    static public function ctrCrearProducto()
    {
        if (isset($_POST["nuevaDescripcion"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoPrecioCompra"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoPrecioVenta"])
            ) {
                $ruta = "view/img/productos/default/anonymous.png";
                $tabla = "productos";
                $datos = array("id_categoria" => $_POST["nuevoCategoria"],
                               "codigo" => $_POST["nuevoCodigo"],
                               "descripcion" => $_POST["nuevaDescripcion"],
                               "stock" => $_POST["nuevoStock"],
                               "precio_compra" => $_POST["nuevoPrecioCompra"],
                               "precio_venta" => $_POST["nuevoPrecioVenta"],
                               "imagen" => $ruta);

                $respuesta = ModeloProducto::mdlIngresarProdcuto($tabla, $datos);
/* var_dump($respuesta); */
                if ($respuesta == "ok") {
                    echo "<script>
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'El producto ha sido guardado correctamente',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar'
                    }).then(function(result){
                        if (result.value) {

                        window.location = 'productos';

                        }
                    })
                    
                    </script>";
                }
            } else {
                echo "<script>
                Swal.fire({
            
                    icon: 'error',
                    title: '!El producto no puede ir vacio o llevar caracteres especiales',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false,
            
                }).then((result) => {

                    if (result.value) {
            
                        window.location = 'productos'
            
                    }
                })
            </script>";
            }
        }
    }
}
