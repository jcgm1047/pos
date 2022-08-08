<?php
require_once "../controller/usuarios.controller.php";
require_once "../model/usuarios.model.php";

class AjaxUsuarios
{

    /* Editar usuario */

    public $idUsuario;
    public function ajaxEditarUsuario()
    {
        $item = "id";
        $valor = $this->idUsuario;
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }
    /* Activar Usuario */
public $activarUsuario;
public $activarid;


}







/* Editar usuario */
if (isset($_POST["idUsuario"])) {
    $editar = new  AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuario();
}
