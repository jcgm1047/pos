<?php
require_once "../controller/clientes.controller.php";
require_once "../model/clientes.model.php";


class AjaxClientes
{

    /* --------------Inicio editar Cliente---------------- */

    public $idCliente;
    public function ajaxEditarcliente()
    {
        $item = "id";
        $valor = $this->idCliente;
        $respuesta = ControladorCliente::ctrMostrarCliente($item, $valor);

        echo json_encode($respuesta);
    }
    /* --------------Fin editar Cliente---------------- */




    
}



/* Objeto Editar Cliente */

if (isset($_POST["idCliente"])) {
    $cliente = new  AjaxClientes();
    $cliente->idCliente = $_POST["idCliente"];
    $cliente->ajaxEditarCliente();
}


