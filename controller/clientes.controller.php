<?php
class ControladorCliente
{
    /* Crear usuario */

    static public function ctrCrearCliente()
    {

        if (isset($_POST["nuevoCliente"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoDocumentoId"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[#\.\-,a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])
            ) {

                $tabla = "clientes";

                $datos = array(
                    "nombre" => $_POST["nuevoCliente"],
                    "documento" => $_POST["nuevoDocumentoId"],
                    "email" => $_POST["nuevoEmail"],
                    "telefono" => $_POST["nuevoTelefono"],
                    "direccion" => $_POST["nuevaDireccion"],
                    "fecha_nacimiento" => $_POST["nuevaFechaNacimiento"]
                );

                $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo "<script>
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'El Cliente ha sido guardada correctamente',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar'
                    }).then(function(result){
                        if (result.value) {

                        window.location = 'clientes';

                        }
                    })
                    
                    </script>";
                }
            } else {

                echo "<script>
                Swal.fire({
            
                    icon: 'error',
                    title: '!El cliente no puede ir vacia o llevar caracteres especiales',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false,
            
                }).then((result) => {

                    if (result.value) {
            
                        window.location = 'clientes'
            
                    }
                })
            </script>";
            }
        }
    }


    /* Mostrar cliente */

    static public function ctrMostrarCliente($item, $valor)
    {

        $tabla =  "clientes";

        $respuesta = ModeloClientes::mdlMostrarCliente($tabla, $item, $valor);

        return $respuesta;
    }
}
