jQuery(document).ready(function($){

var felonyTrue = $( "input:checkbox[name='Felony'][value='Yes']" );
var felonyFalse = $( "input:checkbox[name='Felony'][value='No']" );

$( "#dialog-apply" ).dialog({
  width: 450,
  height: 260,
  resizable: false,
  draggable: false,
  modal: true,
  autoOpen: false,
  closeOnEscape: false,
  show: {
    effect: "fade",
    duration: 500
  },
  hide: {
    effect: "fade",
    duration: 500
  },
  buttons: {
    "Confirm": function() {
      felonyTrue.prop( "checked", false ).blur();
      window.location = "http://nw-rei.com/";
    },
    "Cancel": function() {
      $( "#dialog-apply" ).dialog( "close" );
      felonyTrue.prop( "checked", false );
      felonyFalse.prop( "checked", true ).focus();
    }
  }
});

felonyTrue.click(function(){
  $( "#dialog-apply" ).dialog( "open" );
});
});