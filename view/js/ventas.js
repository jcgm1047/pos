/* Cargar la tabla dinamica de ventas */

/* $.ajax({

    url: "ajax/datatable-ventas.ajax.php",

    success: function(respuesta) {

        console.log("respuesta", respuesta)

    }
})  */

$('.tablaVentas').DataTable({


    ajax: 'ajax/datatable-ventas.ajax.php',
    " deferRender ": true,
    " retrieve ": true,
    " processing ": true,


    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ Registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

});

/* agreando productos a la venta desde la tabla  */

$(".tablaVentas tbody").on("click", "button.agrearProducto", function () {


    var idProducto = $(this).attr("idProducto");

    $(this).removeClass("btn-primary agregarProducto");

    $(this).addClass("btn-default");

    var datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (respuesta) {

            var descripcion = respuesta["descripcion"];
            var stock = respuesta["stock"];
            var precio = respuesta["precio_venta"];

            $(".nuevoProducto").append(

                /* Descripción del producto */

                '<div class="row" style="padding:5px 15px">' +

                '<div class="col-xs-6" style="padding-right:0px">' +

                '<div class="input-group">' +

                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="' + idProducto + '"><i class="fa fa-times"></i></button></span>' +

                '<input type="text" class="form-control" id="agregarProducto" name="agregarProducto" value="' + descripcion + '" required readonly>' +

                '</div>' +

                '</div>' +

                /* Cantidad del producto */

                ' <div class="col-xs-3">' +

                ' <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock = "' + stock + '" required>' +

                '</div>' +

                /*Precio del producto  */

                '<div class= "col-xs-3" style = "padding-left:0px">' +

                '<div class="input-group">' +

                '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +

                ' <input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" value="' + precio + '" readonly required>' +

                ' </div>' +

                '</div>' +

                '</div>'


            );


        }
    });
});



/* quitar productos a la venta y recuperar botton  */




$(".formularioVenta").on("click", "button.quitarProducto", function () {

    $(this).parent().parent().parent().parent().remove();

    var idProducto = $(this).attr("idProducto");

    /* Almacenar en el localstorage el id del producto a quitar  */

    if (localStorage.getItem("quitarProducto") == null) {

        idQuitarProducto = [];
    } else {

        idQuitarProducto.concat(localStorage.getItem("quitarproducto"));

    }

    idQuitarProducto.push({ "idProducto": idProducto });
    localStorage.setItem ("quitarPoducto", JSON.stringify(idQuitarProducto));



    $("button.recuperarBoton[idProducto='" + idProducto + "']").removeClass('btn-default');
    $("button.recuperarBoton[idProducto='" + idProducto + "']").addClass('btn-primary agrearProducto');



});
