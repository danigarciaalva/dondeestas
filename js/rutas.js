$(document).on("ready",cargar);

var puntos = [];
var ruta = null;
var ruta_migrante = null;
var map;
var minimal ;
var visitas;
function cargar() {
   var cmAttr = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
      cmUrl = 'http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/{styleId}/256/{z}/{x}/{y}.png';

      minimal   = L.tileLayer(cmUrl, {styleId: 22677, attribution: cmAttr}),
        midnight  = L.tileLayer(cmUrl, {styleId: 999,   attribution: cmAttr});
        visitas= L.layerGroup();
    map = L.map('map', {
      center: new L.LatLng(19.419444,-99.145556),
      zoom: 4,
      layers: [minimal, midnight,visitas]
    });

    var baseLayers = {
      "Minimal": minimal,
      "Night View": midnight
    };
    

    var overLayers = {
      "rutas": visitas
    };
    

    L.control.layers(baseLayers,overLayers).addTo(map);
    autoCompleta();
}


function autoCompleta(){
    (function( $ ) {
        $.widget( "ui.combobox", {
            _create: function() {
                var input,
                    that = this,
                    select = this.element.hide(),
                    selected = select.children( ":selected" ),
                    value = selected.val() ? selected.text() : "",
                    wrapper = this.wrapper = $( "<span>" )
                        .addClass( "ui-combobox" )
                        .insertAfter( select );

                input = $( "<input>" )
                    .appendTo( wrapper )
                    .val( value )
                    .attr( "title", "" )
                    .addClass( "ui-state-default ui-combobox-input" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: function( request, response ) {
                            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                            response( select.children( "option" ).map(function() {
                                var text = $( this ).text();
                                if ( this.value && ( !request.term || matcher.test(text) ) )
                                    return {
                                        label: text.replace(
                                            new RegExp(
                                                "(?![^&;]+;)(?!<[^<>]*)(" +
                                                $.ui.autocomplete.escapeRegex(request.term) +
                                                ")(?![^<>]*>)(?![^&;]+;)", "gi"
                                            ), "<strong>$1</strong>" ),
                                        value: text,
                                        option: this
                                    };
                            }) );
                        },
                        select: function( event, ui ) {
                            getVisitas(ui.item.option.value);
                            ui.item.option.selected = true;
                            that._trigger( "selected", event, {
                                item: ui.item.option
                            });
                        }
                    })
                    .addClass( "ui-widget ui-widget-content ui-corner-left" );

                input.data( "autocomplete" )._renderItem = function( ul, item ) {
                    return $( "<li>" )
                        .data( "item.autocomplete", item )
                        .append( "<a>" + item.label + "</a>" )
                        .appendTo( ul );
                };

            },

            destroy: function() {
                this.wrapper.remove();
                this.element.show();
                $.Widget.prototype.destroy.call( this );
            }
        });
    })( jQuery );

    $(function() {
        $( "#migrante" ).combobox();
      
    });  
}


function getVisitas (id) {
  var base_url = "http://localhost/web/dondeestas";
  $.ajax({
    data: {id:id},
    dataType: 'json',
    type: 'get',
    url: base_url+'/index.php/ajax/getVisitas',
    success: function(visitas){
      dibujarVisitas(visitas);
    }
  });
}

function dibujarVisitas(visitasMigrante){
      ruta = [];

      for (visita in visitasMigrante){
        var latitud = parseFloat(visitasMigrante[visita].latitud)/10000;
        var longitud = parseFloat(visitasMigrante[visita].longitud)/10000*-1;
    
       ruta.push(new L.LatLng (latitud,longitud));
      }
      var polyline = L.polyline(ruta,{color: 'red'});
      visitas.addLayer(polyline);
}