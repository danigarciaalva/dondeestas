$(document).on("ready",cargar);

var puntos = [];
var ruta = null;
var ruta_migrante = null;

function cargar() {
 
  var myOptions = {
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.llenarComboOrigen
    },
    zoom: 5,
    center: new google.maps.LatLng(19.419444,-99.145556),
    mapTypeId: google.maps.MapTypeId.HYBRID
  };
  map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
  autocompletado();
}

function autocompletado () {
  (function( $ ) {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do

        if ( ui.item ) {
          getVisitas($('#migrante').val());
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.data( "ui-autocomplete" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  })( jQuery );
 
  $(function() {
    $( "#migrante" ).combobox();
    $( "#toggle" ).click(function() {
      $( "#migrante" ).toggle();
    });
  });
}
function getVisitas (id) {
  var base_url = "http://localhost/web/migracion"
  $.ajax({
    data: {id:id},
    dataType: 'json',
    type: 'get',
    url: base_url+'/index.php/ajax/getVisitas',
    success: function(visitas){
      console.log(visitas);
      dibujarVisitas(visitas);
    }
  });
}

function dibujarVisitas(visitas){
      ruta = [];
      for (visita in visitas){
        var latitud = parseFloat(visitas[visita].latitud)/10000;
        var longitud = parseFloat(visitas[visita].longitud)/10000*-1;
        console.log("Lat: "+latitud+" Long: "+longitud);
        ruta.push(new google.maps.LatLng(latitud,longitud));
      }
      if (ruta_migrante == null){
        ruta_migrante = new google.maps.Polyline({
          path: ruta,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 4,
          map: map
        });
      }else{
        ruta_migrante.setPath(ruta);
      }
}