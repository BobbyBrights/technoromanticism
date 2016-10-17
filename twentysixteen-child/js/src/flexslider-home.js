

// Can also be used with $(document).ready()
// $(window).load(function() {
//   $('.flexslider').flexslider({
//     animation: "slide"
//   });
// });

// $(document).ready(function() {
//     $('.flexslider').flexslider({
//     	animation: "slide"
//   	});
// });




(function($) {
    // You pass-in jQuery and then alias it with the $-sign
    // So your internal code doesn't change
    window.onload = function() {
        if (window.jQuery) {  
            // jQuery is loaded  
            console.log("jQuery is loaded !");
            $('.flexslider').flexslider({
                animation: "slide"
            });
        } else {
            // jQuery is not loaded
            console.log("jQuery doesn't Work");
        }
    };     
})(jQuery);