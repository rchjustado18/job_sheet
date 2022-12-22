/*** Site Scripts ***/
jQuery(document).ready(function($) {
	$('.testimonial__slider-container').slick({
		dots: true,
// 	  	arrow: true,
	  	slidesToShow: 3,
	  	slidesToScroll: 1,
		autoplay: true,
 		autoplaySpeed: 3000,
		centerMode: true,
  		
	});
	
	// Job Category Hover 
	
	$(".job__category-col").hover(
        function () {
        $(this).addClass("show__cat-bg");
                  },
        function () {
         $(this).removeClass("show__cat-bg");
        }
	);
	
	
});