<?php
class ControladorCategorias
{
    /* Crear Categoria */
    static public function ctrCrearCategoria()
    {


        if (isset($_POST["nuevaCategoria"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])) {

                $tabla = "categorias";
                $datos = $_POST["nuevaCategoria"];

                $respuesta = ModeloCategoria::mdlIngresarCategoria($tabla, $datos);


                if ($respuesta == "ok") {

                    echo "<script>
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'La categoría ha sido guardada correctamente',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar'
                    }).then(function(result){
                        if (result.value) {

                        window.location = 'categorias';

                        }
                    })
                    
                    </script>";
                }
            } else {

                echo "<script>
                Swal.fire({
            
                    icon: 'error',
                    title: '!La categoria no puede ir vacia o llevar caracteres especiales',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false,
            
                }).then((result) => {

                    if (result.value) {
            
                        window.location = 'categorias'
            
                    }
                })
            </script>";
            }
        }
    }
    /* Mostrar Categorias */
    static public function ctrMostrarCategorias($item, $valor)
    {

        $tabla = "categorias";
        $respuesta = ModeloCategoria::mdlMostrarCategoria($tabla, $item, $valor);

        return $respuesta;
    }
}
