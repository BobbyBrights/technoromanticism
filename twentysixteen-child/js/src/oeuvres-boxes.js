//oeuvres-boxes.js

(function($) {

/*
	$( ".oeuvre-box .oeuvre-thumbnail" ).hover(
	  function() {
	   	$( this ).find(".resume").addClass("isActive");
	    console.log("append");
	  }, function() {
	    $( this ).find(".resume").removeClass("isActive");
	  }
	);
*/
	$( ".oeuvre-box .oeuvre-thumbnail" ).hover(
	  function() {
	   	$( this ).find(".resume").animate({opacity: 0.7}, 500 );
	  }, function() {
	    $( this ).find(".resume").animate({opacity: 0}, 500 );
	  }
	);
   
})(jQuery);