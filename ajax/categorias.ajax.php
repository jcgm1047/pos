<?php
require_once "../controller/categoria.controller.php";
require_once "../model/categoria.model.php";

class AjaxCategorias
{
    /* Editar Categorias */
    public $idCategoria;
    public function ajaxEditarCategoria()
    {

        $item = "id";
        $valor = $this->idCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }

}

/*Editar Categoria  */
if (isset($_POST["idCategoria"])) {

    $categoria = new AjaxCategorias();
    $categoria->idCategoria = $_POST["idCategoria"];
    $categoria->ajaxEditarCategoria();
}
