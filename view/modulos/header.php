<header class="main-header">


    <!-- Logotipo -->

    <a href="inicio" class="logo">

        <!-- logo mini -->
        <span class="logo-mini">

            <img src="view\img\plantilla/dog-solidblanco.svg" class="img-responsive" style="padding: 10px">

        </span>

        <!-- logo normal -->

        <span class="logo-lg">

            <img src="view\img\plantilla/dog-solid.svg" class="img-responsive" style="padding: 10px">

        </span>
    </a>

    <!-- nav -->
    <nav class="navbar navbar-static-top" role="navigation">

        <!-- boton de navegacion -->

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- perfil de usuario -->

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">


                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <?php if ($_SESSION["foto"] != "") {

                            echo '<img src="' . $_SESSION["foto"] . '" class="user-image">';
                        } else {

                            echo '<img src="view\img\Nueva carpeta\usuarios\default\anonymous.png" class="user-image">';
                        }
                        ?>


                        <spam class="hidden-xs"> <?php echo $_SESSION["nombre"]; ?> </spam>
                    </a>
                    <!-- dropDpwn -->
                    <ul class="dropdown-menu">

                        <li class="user-body">

                            <div class="pull-right">

                                <a href="salir" class="btn btn-default btn-flat">Salir</a>

                            </div>

                        </li>



                    </ul>

                </li>


            </ul>

        </div>





    </nav>
</header>