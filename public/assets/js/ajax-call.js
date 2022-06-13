$(document).ready(function(){

    var url = window.location.pathname;
    if (url === '/alojamiento') {
        $.ajax({
            url:        '/alojamiento',
            type:       'POST',
            dataType:   'json',
            async:      true,
            success: function(data, status) {
                    var municipios = data.pop();
                    pintarFiltros(municipios);
                    pintarDatos(data);
                    activarFiltros();
                    activarBuscador();
                    // activarPaginador();
            }, error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });

    } else if (url === '/restaurantes') {
        $.ajax({
            url:        '/restaurantes',
            type:       'POST',
            dataType:   'json',
            async:      true,
            success: function(data, status) {
                    var municipios = data.pop();
                    pintarFiltros(municipios);
                    pintarDatos(data);
                    activarFiltros();
                    activarBuscador();
                    // activarPaginador();
            }, error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });
    } else if (url === '/ocio-nocturno') {
        $.ajax({
            url:        '/ocio-nocturno',
            type:       'POST',
            dataType:   'json',
            async:      true,
            success: function(data, status) {
                    var municipios = data.pop();
                    pintarFiltros(municipios);
                    pintarDatos(data);
                    activarFiltros();
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



function activarFiltros(){

    var pulsado = $('#filtros').find('a');
    pulsado.on('click', function(){

        var pueblo = $(this).text();
        var elementos =  $('#contenedor').children();

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

function pintarDatos(data) {
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


