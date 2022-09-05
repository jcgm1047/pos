/* Editar Categoria */

$(".btnEditarCategoria").click(function() {

    var idCategoria = $(this).attr("idCategoria");

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {


            $("#editarCategoria").val(respuesta["categoria"]);
            $("#idCategoria").val(respuesta["id"]);


        }
    });

})

/* Eliminar Categoria */

$(".btnEliminarCategoria").click(function() {

    var idCategoria = $(this).attr("idCategoria");

    swal.fire({

        title: 'Estas seguro de borrar esta categoria?',
        text: "Si no lo está puede cancelar la accion",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Nooo, Espera!',
        confirmButtonText: 'Si, borrala!'

    }).then((result) => {
        if (result.value) {

            window.location = 'index.php?ruta=categorias&idCategoria=' + idCategoria;


        }
    })

})