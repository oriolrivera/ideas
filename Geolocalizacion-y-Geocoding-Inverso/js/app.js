var divmapa = 'map';
var map,mar,lat,lon;


$(document).ready(function() {
    map = cargarMapa(map, 20.86,-91.09);
    gps();
    
});

//funcion para cargar el mapa
function cargarMapa(map,lat,lon){
    if(map == undefined){
        var mapOptions = {
            center: new google.maps.LatLng(lat, lon),
            zoom: 15,
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
        map = new google.maps.Map(document.getElementById(divmapa),mapOptions);
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

//Funcion para ubicar saber la posicion del usuario
function gps(){
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(function(pos){
            lat = pos.coords.latitude;
            lon = pos.coords.longitude;
            ponerMarcador();
            nota('success','Localizado Correctamente');
        }, function(err){
            lat = 19.044515;
            lon = -98.198736;
            ponerMarcador();
            nota("error","Error con la localizacion");
        }, {enableHighAccuracy:true, timeout: 10000,maximumAge: 500});
    }
    else
    {
        lat = 19.044515;
        lon = -98.198736;
        mar = cargarMarcador(mar,map,lat,lon,true,'img/marker.png');
        ponerMarcador();
        nota("error","Error con la localizacion");
    }
}

function ponerMarcador(){
    mar = cargarMarcador(mar,map,lat,lon,true,'img/marker.png');
    google.maps.event.addListener(mar,'dragend',function(event) {
        lat = event.latLng.lat();
        lon = event.latLng.lng();
        geocoding();
    });
    geocoding();
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

//Funcion para hacer una peticion a google de geocoding inverso
function geocoding(){
  load();
  $.get('http://maps.googleapis.com/maps/api/geocode/json?latlng='+lat+','+lon+'&sensor=true',{},function(res){
      console.log(res);
      dir = $('#direccion');
      try{
          dir.val(res.results[0].formatted_address);
      }
      catch(e){
          nota("error","No se pudo obtener la dirección, intentalo de nuevo"+e);
          unload();
          return;
      }
      unload();
      return;
  });
}
