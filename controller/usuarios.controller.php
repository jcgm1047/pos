<?php
class ControladorUsuarios
{

    static public function ctrIngresoUsuario()
    {

        if (isset($_POST["ingUsuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
            ) {

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$andrescarechinva$');
                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {




                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["usuario"] = $respuesta["usuario"];
                    $_SESSION["perfil"] = $respuesta["perfil"];
                    $_SESSION["foto"] = $respuesta["foto"];




                    echo '<script> 
                    
                    window.location = "inicio";
                    
                    
                    </script>';
                } else {
                    echo   '<br><div class="alert alert-danger">Error al ingresar, intentalo de nuevo</div>';
                }
            }
        }
    }

    /* Registro de usuario */

    static public function ctrCrearUsuario()
    {
        if (isset($_POST["nuevoUsuario"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoPassword"])
            ) {
                /* validar imagen */
                $ruta = "";
                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* creacion directorio donde se guardan las fotos de los usuarios  */

                    $directorio = "view/img/usuario/" . $_POST["nuevoUsuario"];
                    mkdir($directorio, 0755);

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {


                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/usuario/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }
                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                        /*======
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ===*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/usuario/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }


                $tabla = "usuarios";

                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$andrescarechinva$');
                $datos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" =>  $encriptar,
                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta
                );

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo "<script>
                    Swal.fire({
                
                        icon: 'success',
                        title: 'Usuario guardado correctamente',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false,
                
                    }).then((result) => {
    
                        if (result.value) {
                
                            window.location = 'usuarios'
                
                        }
                    })
                </script>";
                }
            } else {
                echo "<script>
                Swal.fire({
            
                    icon: 'error',
                    title: '!El usuario no puede ir vacio o llevar caracteres especiales',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false,
            
                }).then((result) => {

                    if (result.value) {
            
                        window.location = 'usuarios'
            
                    }
                })
            </script>";
            }
        }
    }

    /* Mostrar Ususarios  */

    static public function ctrMostrarUsuarios($item, $valor)
    {
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }



    /* Editar Usuario */
    public function ctrEditarUsuario()
    {

        if (isset($_POST["editarUsuario"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])
            ) {
                /* validar imagen */
                $ruta = $_POST["fotoActual"];

                if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* creacion directorio donde se guardan las fotos de los usuarios  */

                    $directorio = "view/img/usuario/" . $_POST["editarUsuario"];


                    /* Primero preguntamos si existe otra imagen en la base de datos */


                    if (!empty($_POST["fotoActual"])) {

                        unlink($_POST["fotoActual"]);
                    } else {

                        mkdir($directorio, 0755);
                    }


                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {


                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/usuario/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }
                    if ($_FILES["editarFoto"]["type"] == "image/png") {

                        /*======
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        ===*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/usuario/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                if ($_POST["editarPassword"] != "") {

                    if (preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarPassword"])) {
                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$andrescarechinva$');
                    } else {
                        echo "<script>
                        Swal.fire({
                    
                            icon: 'error',
                            title: '!La contraseña no puede ir vacia o llevar caracteres especiales',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false,
                    
                        }).then((result) => {
        
                            if (result.value) {
                    
                                window.location = 'usuarios'
                    
                            }
                        })
                    </script>";
                    }
                } else {
                    $encriptar = $_POST["passwordActual"];
                }

                $datos = array(
                    "nombre" => $_POST["editarNombre"],
                    "usuario" => $_POST["editarUsuario"],
                    "password" =>  $encriptar,
                    "perfil" => $_POST["editarPerfil"],
                    "foto" => $ruta
                );

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo "<script>
                    Swal.fire({
                
                        icon: 'success',
                        title: 'Usuario editado correctamente',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false,
                
                    }).then((result) => {
    
                        if (result.value) {
                
                            window.location = 'usuarios'
                
                        }
                    })
                </script>";
                }
            } else {
                echo "<script>
                Swal.fire({
            
                    icon: 'error',
                    title: '!El nombre no puede ir vacio o llevar caracteres especiales',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false,
            
                }).then((result) => {

                    if (result.value) {
            
                        window.location = 'usuarios'
            
                    }
                })
            </script>";
            }
        }
    }
}
