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
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])
            ) {

                /* Validar la imagen */
                $ruta = "view/img/productos/default/anonymous.png";

                if (isset($_FILES["nuevaImagen"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* creacion directorio donde se guardan las fotos de los usuarios  */

                    $directorio = "view/img/productos/nuevo _producto" . $_POST["nuevoCodigo"];
                    mkdir($directorio, 0755);

                    if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {


                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/productos/nuevo _producto" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }
                    if ($_FILES["nuevaImagen"]["type"] == "image/png") {

                        /*======
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ===*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/productos/nuevo _producto" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }



                $tabla = "productos";
                $datos = array("id_categoria" => $_POST["nuevoCategoria"],
                               "codigo" => $_POST["nuevoCodigo"],
                               "descripcion" => $_POST["nuevaDescripcion"],
                               "stock" => $_POST["nuevoStock"],
                               "precio_compra" => $_POST["nuevoPrecioCompra"],
                               "precio_venta" => $_POST["nuevoPrecioVenta"],
                               "imagen" => $ruta);

                $respuesta = ModeloProducto::mdlIngresarProdcuto($tabla, $datos);

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
