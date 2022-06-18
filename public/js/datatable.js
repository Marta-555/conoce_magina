$(document).ready(function () {

    $.ajax({
        url:  '/perfil-listado',
        type:       'POST',
        dataType:   'json',
        success: function(data) {

            $.each(data, function (i, data) {
                console.log(data.fecha_publicacion.date);
                var body = "<tr>";
                body    += "<td>" + data.titulo + "</td>";
                body    += "<td>" + data.descripcion + "</td>";
                body    += "<td>" + data.dificultad + "</td>";
                body    += "<td>" + data.longitud + "</td>";
                body    += "<td>" + data.tiempo + "</td>";
                body    += "<td>" + data.mapa + "</td>";
                body    += "<td>" + data.desnivel + "</td>";
                body    += "<td><img src='" + data.image + "'</td>";
                body    += "<td>" + data.municipio + "</td>";
                body    += "<td>" + data.tipoRuta + "</td>";
                body    += "<td>" + data.fecha_publicacion.date + "</td>";

                if(data.puntoInteres != null){
                    body    += "<td>" + data.puntoInteres + "</td>";
                }
                body    += "<td><button class='btn' id='editar'><i class='fas fa-pencil-alt'></i></button><button class='btn' id='borrar'><i class='fas fa-trash-alt'></i></button></td>";
                body    += "</tr>";
                $('#tableUsuario tbody').append(body);
            });
            $('#tableUsuario').DataTable({

            });
        },
        error: function(xhr, textStatus, errorThrown) {
            alert('Ajax request failed.');
        }
    });

});
