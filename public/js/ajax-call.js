$(document).ready(function(){

    var url = window.location.pathname;
    if (url === '/alojamiento' || url === '/restaurantes' || url === '/nocturno') {
        $.ajax({
            url:        url,
            type:       'POST',
            dataType:   'json',
            async:      true,
            success: function(data, status) {
                    var municipios = data.pop();
                    pintarFiltros(municipios);
                    pintarServicio(data);
                    activarFiltros(url);
                    activarBuscador();
                    // activarPaginador();
            }, error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });

    } else if (url === '/visitas' || url === '/turismo-activo') {
        $.ajax({
            url:        url,
            type:       'POST',
            dataType:   'json',
            async:      true,
            success: function(data, status) {
                var municipios = data.pop();
                pintarFiltros(municipios);
                pintarActividad(data);
                activarFiltros(url);
                activarBuscador();
                // activarPaginador();
            }, error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });

    } else if (url === '/rutas') {
        $.ajax({
            url:        '/rutas',
            type:       'POST',
            dataType:   'json',
            async:      true,
            success: function(data, status) {
                var municipios = data.pop();
                pintarFiltros(municipios);
                pintarRuta(data);
                activarFiltros(url);
                activarBuscador();
                // activarPaginador();
            }, error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });
    } else {
        "pagina no encontrada";
    }

});



function activarFiltros(url){

    var pulsado = $('#filtros').find('a');
    pulsado.on('click', function(){

        var pueblo = $(this).text();

        if (url === '/rutas') {
            var elementos =  $('#contenedor').children().children();
        } else {
            var elementos =  $('#contenedor').children();
        }

        if(pueblo == 'Todos'){
            elementos.show();
        } else {

            elementos.each(function(){
                if( $(this).hasClass(pueblo) ) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
}

function activarBuscador(){
    $('#buscador').keyup(function(){
        var nombres = $('.post-title');
        var buscando = $(this).val();
        var item = '';

        for(i = 0; i < nombres.length; i++){
            item = $(nombres[i]).html().toLowerCase();
            for(var x = 0; x < item.length; x++){
                if(buscando.length == 0 || item.indexOf(buscando)> -1){
                    $(nombres[i]).parents('#item').show();
                } else {
                    $(nombres[i]).parents('#item').hide();
                }
            }
        }
    })
}


function pintarFiltros(municipios) {
    //Rellenamos los filtros con los municipios
    var filtro = $('#filtros');
    filtro.append('<li><a href="#">Todos</a></li>');

    for(i = 0; i < municipios.length; i++){
        municipio = municipios[i];

        var lista = $('<li></li>');
        var elemento = $('<a></a>').attr('href', '#').html(municipio['municipio']);

        lista.append(elemento);
        filtro.append(lista);
    }
}

function pintarServicio(data) {
    //Rellenamos el contenedor
    $('#contenedor').html('');

    for(i = 0; i < data.length; i++) {
        datos = data[i];
        //Creamos la estructura
        var div = $('<div id="item" class="col-sm-3 col-md-3 col-lg-3"></div>').addClass(datos['muni_nombre']);
        var div2 = $('<div class="post"></div>');
        //Campo de imagen
        var divImagen = $('<div class="post-thumbnail align-center"></div>');
        if(datos['image'] != null){
            divImagen.append($('<img alt="Blog-post Thumbnail"/>').attr('src', datos['image']));
        } else {
            divImagen.append($('<img alt="Blog-post Thumbnail"/>').attr('src', 'images/sinImagen.webp'));
        }
        //Campo nombre
        var divNombre = $('<div class="post-header font-alt text-center"></div>');
        divNombre.append($('<h2 class="post-title"></h2>').html('<strong>'+ datos['nombre'] +'</strong>'));
        //Campos dirección, tlfno y web
        var divDatos = $('<div class="post-entry"></div>');
        divDatos.append($('<p></p>').html('<strong>Dirección: </strong>'+ datos['direccion'] + ' ('+ datos['muni_nombre'] +')'));

        var pTfno = $('<p></p>');
        pTfno.append($('<span></span>').html('<strong>Teléfono: </strong>'+ datos['tlfno1']));
        if(datos['tlfno2'] != null){
           pTfno.append($('<span></span>').html(' / '+datos['tlfno2']));
        }
        divDatos.append(pTfno);

        if(datos['web'] != null){
            divDatos.append($('<a></a>').attr('href', datos['web']).html(datos['web']));
        }
        //Añadimos los elementos a la estructura
        div2.append(divImagen, divNombre, divDatos);
        div.append(div2);
        //Añadimos la estructura al div
        $('#contenedor').append(div);
    }
}

function pintarActividad(data) {
     //Rellenamos el contenedor
    $('#contenedor').html('');

    for(i = 0; i < data.length; i++) {
        datos = data[i];
        //Creamos la estructura
        var div = $('<div id="item" class="col-sm-4 col-md-4 col-lg-4 '+ datos['muni_nombre'] +'"></div>');
        var div2 = $('<div class="post"></div>');

        //Campo de imagen
        if(datos['image'] != null){
            var divImagen = $('<div class="post-thumbnail align-center"><img src="'+ datos['image'] +'" alt="Blog-post Thumbnail"/></div>');
        } else {
            var divImagen = $('<div class="post-thumbnail align-center"><img src="images/sinImagen.webp" alt="Blog-post Thumbnail"/></div>');
        }
        //Campo nombre
        var divNombre = $('<div class="post-header font-alt text-center"><h2 class="post-title"><strong>'+ datos['nombre'] +'</strong></h2></div>');

        //Campos de información
        var divDatos = $('\
        <div class="post-entry"> \
            <div role="tabpanel"> \
                <ul class="nav nav-tabs" role="tablist"> \
                    <li class="active"><a href="#precio_'+ i +'" data-toggle="tab">Precio</a></li> \
                    <li><a href="#descrip_'+ i +'" data-toggle="tab">Descripción</a></li> \
                    <li><a href="#contact_'+ i +'" data-toggle="tab">Contacto</a></li> \
                </ul> \
                <div class="tab-content"> \
                    <div class="tab-pane active text-center" id="precio_'+ i +'">Precio por persona: '+ datos['precio'] +' €</div> \
                    <div class="tab-pane text-justify" id="descrip_'+ i +'">'+ datos['descripcion'] +'</div> \
                    <div class="tab-pane" id="contact_'+ i +'"> \
                        <p class="text-center">'+ datos['empresa_nombre'] +'<br> \
                        '+ datos['empresa_tfno1'] + (!datos['empresa_tfno2']? '':' / '+ datos['empresa_tfno2'] +'') +'<br> \
                        '+ (!datos['empresa_web']? '': '<a href="'+  datos['empresa_web'] +'">'+ datos['empresa_web'] +'</a></p>') +' \
                    </div> \
                </div> \
            </div> \
        </div>');

        //Añadimos los elementos a la estructura
        div2.append(divImagen, divNombre, divDatos);
        div.append(div2);
        //Añadimos la estructura al div
        $('#contenedor').append(div);
    }
}


function pintarRuta(data) {

     //Rellenamos el contenedor
    var contenedor = $('#contenedor').html('');
    contenedor.append($('<h4 class="font-alt mb-0">Rutas</h4><hr class="divider-w mt-10 mb-20">'));

    contenedor.append($('<div class="panel-group" id="accordion"></div>'));

    for(i = 0; i < data.length; i++) {
        datos = data[i];

        var puntoId = "punto"+ datos['id'];
        var coordenads = 'coord'+ datos['id'];

        var estructura = ($('\
            <div class="panel panel-default '+ datos['municipio'] +'" id="item">\
                <div class="panel panel-default '+ datos['municipio'] +'" id="item">\
                    <div class="panel-heading">\
                        <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#support'+ datos['id'] +'">'+ datos['titulo'] +'</a></h4>\
                    </div>\
                    <div class="panel-collapse collapse" id="support'+ datos['id'] +'">\
                        <div class="panel-body">\
                            <div class="row">\
                                <h2 class="font-alt text-center">'+ datos['titulo'] +'</h2>\
                            </div>\
                            <div class="row landing-image-text">\
                                <div class="col-md-6">\
                                    <img class="center-block" src="'+ datos['image'] +'" alt="imagen ruta"><br>\
                                    <p class="mapa">'+ datos['mapa'] +'</p>\
                                </div>\
                                <div class="col-md-6">\
                                    <p class="text-justify"><strong>Dificultad: </strong>'+ datos['dificultad'] +'&nbsp; &nbsp; &nbsp; &nbsp; <strong>Longitud: </strong>'+ datos['longitud'] +' Km <br>\
                                    <strong>Tiempo: </strong>'+ datos['tiempo'] +' horas &nbsp; &nbsp; &nbsp; &nbsp; <strong>Desnivel: </strong>'+ datos['desnivel'] +' <br>\
                                    <strong>Tipo de ruta: </strong>'+ datos['tipoRuta'] +'<br> <strong>Municipio: </strong>'+ datos['municipio'] +' </p>\
                                    <p class="text-justify">'+ datos['descripcion'] +'</p>\
                                    <p class="text-right">Publicado por: <strong>'+ datos['user'] +'</strong></p>\
                                </div>\
                            </div>\
                            <div id="'+ puntoId + '" class="row landing-image-text"></div>\
                        </div>\
                    </div>\
                </div>\
            </div>\
        '));

        $('#accordion').append(estructura);

        if(datos['puntoInteres'] != ''){

            if(datos['puntoInteres']['p_foto'] != null) {
                var conImagen = $('\
                    <hr class="divider-w pt-20">\
                    <div class="col-md-6 col-md-push-6">\
                        <img class="center-block" src="'+ datos['puntoInteres']['p_foto'] +'" alt="imagen puntoInteres">\
                    </div>\
                    <div class="col-md-6 col-md-push-6" id="puntoEstruc">\
                        <h4 class="font-alt text-center">Puntos de interés</h4>\
                        <ul>\
                            <li>\
                            <p class="font-alt"><strong>'+ datos['puntoInteres']['p_titulo'] +'</strong></p>\
                            <p id="'+ coordenads +'"></p>\
                            <p class="text-justify">'+ datos['puntoInteres']['p_descrip'] +'</p>\
                            <p class="text-justify">Publicado por: <strong>'+ datos['puntoInteres']['p_user'] +'</strong></p>\
                            </li>\
                        </ul>\
                    </div>');
                $('#'+puntoId).append(conImagen);
            } else {
                var sinImagen = $('\
                    <hr class="divider-w pt-20">\
                    <div class="col-md-12">\
                        <h4 class="font-alt text-center">Puntos de interés</h4>\
                        <ul>\
                            <li>\
                            <p class="font-alt"><strong>'+ datos['puntoInteres']['p_titulo'] +'</strong></p>\
                            <p id="'+ coordenads +'"></p>\
                            <p class="text-justify">'+ datos['puntoInteres']['p_descrip'] +'</p>\
                            <p class="text-justify">Publicado por: <strong>'+ datos['puntoInteres']['p_user'] +'</strong></p>\
                            </li>\
                        </ul>\
                    </div>');
                $('#'+puntoId).append(sinImagen);
            }

            if(datos['puntoInteres']['p_coord'] != null){
                $(coordenads).append(datos['puntoInteres']['p_coord']);
            }

        }

    }


}
