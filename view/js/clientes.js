/*========== Editar Cliente ==========*/

$(".btnEditarCliente").click(function() {

    var idCliente = $(this).attr("idCliente");

    var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({
        url: "ajax/cliente.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function(respuesta) {

      console.table(respuesta)

            $("#idCliente").val(respuesta["id"]);
            $("#editarCliente").val(respuesta["nombre"]);
            $("#editarDocumentoid").val(respuesta["documento"]);
            $("#editarEmail").val(respuesta["email"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);


        }
    });
});





/*========== Eliminar Cliente ==========*/
$(".btnEliminarCliente").click(function() {

    var idCliente = $(this).attr("idCliente");
    


    swal.fire({

        title: 'Estas seguro de borrar el cliente?',
        text: "Si no lo está puede cancelar la accion",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Nooo, Espera!',
        confirmButtonText: 'Si, Borralo!'
    }).then((result) => {
        if (result.value) {

            window.location = 'index.php?ruta=clientes&idCliente=' + idCliente ;


        }
    })





})