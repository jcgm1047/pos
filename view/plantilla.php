<?php
session_start();


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Col Pet House Pos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="view/img/plantilla/logo-04.png">

  <!-- ========== Start Plugins CSS ========== -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="view/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="view/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="view/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins.  -->
  <link rel="stylesheet" href="view/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTables -->
  <link rel="stylesheet" href="view/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="view/plugins/iCheck/all.css">
  <!-- ========== End Plugins CSS ========== -->

  <!-- ========== Start plugins JS ========== -->

  <!-- jQuery 3 -->
  <script src="view/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="view/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="view/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="view/dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="view/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="view/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- sweet alert 2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- iCheck 1.0.1 -->
  <script src="view/plugins/iCheck/icheck.min.js"></script>
  <!-- InputMask -->
  <script src="view/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="view/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="view/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- ========== End plugins JS ========== -->

  <!-- ========== Start Body
   ========== -->

  <!-- ========== End Body
   ========== -->

</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
  <!-- Site wrapper -->


  <?php

  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == 'ok') {



    echo '<div class="wrapper">';

    /*  Header*/
    include "modulos/header.php";

    /* Menu */
    include "modulos/menu.php";

    /* contenido temporal */

    if (isset($_GET["ruta"])) {

      if (
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "reportes" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "categorias" ||
        $_GET["ruta"] == "productos" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "ventas" ||
        $_GET["ruta"] == "crear-venta" ||
        $_GET["ruta"] == "salir"
      ) {
        include "modulos/" . $_GET["ruta"] . ".php";
      } else {
        include "modulos/404.php";
      }
    } else {
      include "modulos/inicio.php";
    }




    /* footer */
    include "modulos/footer.php";

    echo '</div>';
  } else {

    include "modulos/login.php";
  }
  ?>

  <script src="view/js/plantilla.js"></script>
  <script src="view/js/usuarios.js"></script>
  <script src="view/js/categorias.js"></script>
  <script src="view/js/productos.js"></script>

</body>



</html>