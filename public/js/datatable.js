$(document).ready(function () {

    $.ajax({
        url:  '/perfil-listado',
        type:       'POST',
        dataType:   'json',
        success: function(data) {
            $.each(data, function (i, data) {
                console.log(data);
                var body = "<tr>";
                body    += "<td class='details-control' id='modalInfo_"+ data.id +"'><i class='fas fa-plus-circle'></i></td>";
                body    += "<td>" + data.titulo + "</td>";
                body    += "<td>" + data.dificultad + "</td>";
                body    += "<td>" + data.longitud + "</td>";
                body    += "<td>" + data.tiempo + "</td>";
                body    += "<td>" + data.desnivel + "</td>";
                body    += "<td><img src='" + data.image + "'</td>";
                body    += "<td>" + data.municipio + "</td>";
                body    += "<td>" + data.tipoRuta + "</td>";
                body    += "<td><button class='btn' id='editar'><i class='fas fa-pencil-alt'></i></button><button class='btn' id='borrar'><i class='fas fa-trash-alt'></i></button></td>";
                body    += "</tr>";
                $('#tableUsuario tbody').append(body);

                var datos = informacion(data);
                $('#ventana').append(datos)
            });

            var dt = $('#tableUsuario').DataTable();

            $('#tableUsuario tbody').on('click',  'tr td.details-control', function(){
                var pulsado = $(this).attr("id");

                var elemento = '#ventana #'+pulsado;
                $(elemento).addClass('ver');

                $('#cerrar').on('click', function(){
                    $(elemento).removeClass('ver');
                })

            });
        },
        error: function(xhr, textStatus, errorThrown) {
            alert('Ajax request failed.');
        }
    });
});


function informacion(data) {
    return (
        '<div class="col-sm-12 panelTabla"  id="modalInfo_'+ data.id +'">\
            <div class="informacion">\
                <i class="far fa-times-circle" id="cerrar"></i>\
                <div class="row landing-image-text">\
                    <div class="col-md-6 col-md-push-6">\
                        <img class="center-block" src="' + data.image + '" alt="imagen ruta"> <br>\
                        <div>' + data.mapa + '</div>\
                    </div>\
                    <div class="col-md-6 col-md-pull-6">\
                        <h2 class="font-alt">' + data.titulo + '</h2>\
                        <p><strong>Dificultad: </strong>' + data.dificultad + '&nbsp; &nbsp; &nbsp; &nbsp; <strong>Longitud: </strong>' + data.longitud + ' Km <br>\
                        <strong>Tiempo: </strong>' + data.tiempo + ' horas &nbsp; &nbsp; &nbsp; &nbsp; <strong>Desnivel: </strong>' + data.desnivel + '<br>\
                        <strong>Tipo de ruta:  </strong>' + data.tipoRuta + '&nbsp; &nbsp; &nbsp; &nbsp; <strong>Punto de Interés: </strong>' + data.puntoInteres +'</p>\
                        <p>' + data.descripcion + '</p>\
                    </div>\
                </div>\
            </div>\
        </div>'
    );
}
