$(document).ready(function(){
	$('.carousel-box').slick({
	  dots: false,
	  arrows: false,
	  infinite: true,
	  autoplay: true,
	  speed: 1000,
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        infinite: false,
	        dots: false
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	  ]
	});
});