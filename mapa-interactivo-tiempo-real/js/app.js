var map,mar,mars;
var lats,lat;
var lons,lon;
var yaenvio;
var popups;
var marcadorElegido;
var marcadores;
var j;



$(document).ready(function() {
    //inicializacion de variables
    marcadores = new Array();
    popups = new Array();
    i = 0;
    marcadorElegido = m1.src;


    //Cuando demos clic en algun marcador de abajo, lo ponemos como el principal
    $('.marker').click(function(event) {
        $(".marker").animate({ 
            width: 48,
            height: 48
        }, 100 );
        $(this).animate({ 
            width: 56,
            height: 56
        }, 500 );
        marcadorElegido = this.src;
    });

    //cargamos el mapa
    map = cargarMapa(map,lat = 0,lon = 0);
    //Cuando hagamos dobleclick en el mapa agregamos un nuevo marcador
    google.maps.event.addListener(map, 'dblclick', function (event) {
        bootbox.prompt('Descripcion del lugar:',function(result){
            if (result === null) {                                             
                return;                             
            } else {
                load();
                params = {
                    latitud: event.latLng.lat(),
                    longitud: event.latLng.lng(),
                    descripcion: result,
                    src: marcadorElegido,
                    nuevoMarcador: true
                };
                //Los datos del marcador son enviados al servidor para guardalos y repartirlos a otros usuarios
                $.getJSON('servidor/servidor.php', params, function(json, textStatus) {
                    if(!json.scs){
                        nota('error',json.msg);
                    }
                    unload();
                });                          
            }
        });            
    });


    //inicializamos pusher con la KEY
    var pusher = new Pusher('KEY');
    //suscribirse al canal de comunicacion
    var channel = pusher.subscribe('marcador');
    //escuchar un evento llamado nuevo, que cuando se active entonces es por que alguien agrego un marcador
    //entonces pintamos el nuevo marcador sobre el mapa con la informacion recibida
    channel.bind('nuevo', function(datos) {
        marcadores[j] = cargarMarcador(marcadores[j],map,datos.latitud,datos.longitud,false,datos.src);
        marcadores[j].des = datos.descripcion;
        google.maps.event.addListener(marcadores[j], 'click', function (event) {
            if(typeof(popup) != 'undefined')popup.close();
            popup = new google.maps.InfoWindow({
                content: '<div class="infowindow-wrapper">'+this.des+'</div>'
            });
            popup.open(map,this);
        });
        j++;
        nota('success','Alguien Agrego un Marcador!!<br><strong>Descripcion: </strong>'+datos.descripcion);  
    });


    //Cargamos los marcadores de la base de datos
    $.getJSON('servidor/servidor.php', {getMarcadores: true}, function(json, textStatus) {
        datos = $.parseJSON(json);
        for (var i = 0; i < datos.length; i++) {
            marcadores[i] = cargarMarcador(marcadores[i],map,datos[i].latitud,datos[i].longitud,false,datos[i].src);
            marcadores[i].des = datos[i].descripcion;
            google.maps.event.addListener(marcadores[i], 'click', function (event) {
                if(typeof(popup) != 'undefined')popup.close();
                popup = new google.maps.InfoWindow({
                    content: '<div class="infowindow-wrapper">'+this.des+'</div>'
                });
                popup.open(map,this);
            });  
        };
        j = i;
        unload();
    });
});

//funcion para cargar el mapa
function cargarMapa(map,lat,lon){
    if(map == undefined){
        var mapOptions = {
            center: new google.maps.LatLng(lat, lon),
            zoom: 3,
            disableDoubleClickZoom:true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scrollwheel: true,
            panControl:false,
            streetViewControl:false
            
        };
        map = new google.maps.Map(document.getElementById('map'),mapOptions);
    }
    else{
        centrarMapa(map,lat,lon);
    }
    return map;
}

//funcion que centra el mapa
function centrarMapa(map,lat,lon){
    map.panTo(new google.maps.LatLng(lat, lon));
}

//funcion para poner un marcador
function cargarMarcador(mar,map,lat,lon,dr,im){
    if(mar == undefined){
       var mar = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lon),
        draggable:dr,
        icon: im,
    });
       mar.setMap(map);
   }
   else{
    mar.setPosition(new google.maps.LatLng(lat, lon));
}
centrarMapa(map,lat,lon);
return mar;
}


//Funciones para quitar y poner el loader
function load(){
    $('#loader').show();
}

function unload(){
    $('#loader').hide();
}

//Funcion para enviar notificaciones
function nota(op,msg,time){
    if(time == undefined)time = 5000;
    var n = noty({
        text: msg,
        theme: 'defaultTheme',
        animation: {
            open: {height: 'toggle'}, 
            close: {height: 'toggle'},
            easing: 'swing', 
            speed: 500,
        },
        type:op,
        timeout:time,
        layout: 'topRight',
        maxVisible: 5
    });
}