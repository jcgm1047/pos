<?php
require_once "conexion.php";

class ModeloCategoria
{
    /* ingresar Categorias */

    static public function mdlIngresarCategoria($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (categoria) VALUES (:categoria)");


        $stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);



        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt = closelog();
        $stmt = null;
    }
    /* mostrar categorias */
    static public function mdlMostrarCategoria($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");
            $stmt->bindparam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt = closelog();
        $stmt = null;
    }
}
