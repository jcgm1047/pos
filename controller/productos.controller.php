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

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
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
                $datos = array(
                    "id_categoria" => $_POST["nuevoCategoria"],
                    "codigo" => $_POST["nuevoCodigo"],
                    "descripcion" => $_POST["nuevaDescripcion"],
                    "stock" => $_POST["nuevoStock"],
                    "precio_compra" => $_POST["nuevoPrecioCompra"],
                    "precio_venta" => $_POST["nuevoPrecioVenta"],
                    "imagen" => $ruta
                );

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

    /* Editar Producto */

    static public function ctrEditarProducto()
    {
        if (isset($_POST["editarDescripcion"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&
                preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
                preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])
            ) {

                /* Validar la imagen */

                $ruta = $_POST["imagenActual"];

                if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* creacion directorio donde se guardan las fotos de los usuarios  */

                    $directorio = "view/img/productos/nuevo _producto" . $_POST["editarCodigo"];

                    /* Revisamos si existe otra imagen en BD */

                    if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "view/img/productos/default/anonymous.png") {

                        unlink($_POST["imagenActual"]);

                    } else {

                        mkdir($directorio, 0755);

                    }



                    if ($_FILES["editarImagen"]["type"] == "image/jpeg") {


                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/productos/nuevo _producto" . $_POST["editarCodigo"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }
                    if ($_FILES["editarImagen"]["type"] == "image/png") {

                        /*======
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ===*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/productos/nuevo _producto" . $_POST["editarCodigo"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }



                $tabla = "productos";
                $datos = array(
                    "id_categoria" => $_POST["editarCategoria"],
                    "codigo" => $_POST["editarCodigo"],
                    "descripcion" => $_POST["editarDescripcion"],
                    "stock" => $_POST["editarStock"],
                    "precio_compra" => $_POST["editarPrecioCompra"],
                    "precio_venta" => $_POST["editarPrecioVenta"],
                    "imagen" => $ruta
                );

                $respuesta = ModeloProducto::mdleditarProdcuto($tabla, $datos);

                if ($respuesta == "ok") {
                    echo "<script>
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'El producto ha sido editado correctamente',
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

    /* Eliminar Eliminar */

    static public function ctrEliminarProducto()
    {

        if (isset($_GET["idProducto"])) {

            $tabla = "productos";
            $datos = $_GET["idProducto"];

            if ($_GET["imagen"] != "" && $_GET["imagen"] !=  "view/img/productos/default/anonymous.png" ) {

                unlink($_GET["imagen"]);
                rmdir("view/img/productos/nuevo _producto" . $_GET["codigo"]);
            }

            $respuesta = ModeloProducto::mdlBorrarProductos($tabla, $datos);

            if ($respuesta == "ok") {


                echo "<script>
                Swal.fire({
            
                    icon: 'success',
                    title: 'El producto a sido eliminado correctamente',
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
