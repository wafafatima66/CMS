/* ===================================================================

   Feedbacks Section Image Slider 

   =================================================================== */

   $(document).ready(function()  {

    "use strict";
  
    $('#feedbacks').slick({
       slidesToShow: 1,
       slidesToScroll: 1,
       dots: true,
       arrows: false,
       autoplay: true,
       autoplaySpeed: 3000, 
       fade: true,
       speed: 1500,
       infinite: true
    });
  
  });


/* ===================================================================

   PAGE LOADER EFFECT 

   =================================================================== */
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})


/* ===================================================================

   SCROLL TO TOP BUTTON

   =================================================================== */
	$(window).on("scroll", function(e) {
    	if ($(this).scrollTop() > 0) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });
    $("#back-to-top").on("click", function(e){
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });


/* ===================================================================

   NOFICATION ALERTS

   =================================================================== */
    window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(4000, function(){
			$(this).remove(); 
		});
	}, 7000);
