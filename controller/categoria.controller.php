<?php
class ControladorCategorias
{

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
                        title: 'Categoria Guardada',
                        showConfirmButton: false,
                        timer: 1500
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
}
