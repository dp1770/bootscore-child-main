jQuery(function ($) {
	
	/****** Nav on scroll ******/
	
	jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();

		//>=, not <=
		if (scroll >= 100) {
			
			jQuery(".navbar-brand").addClass("bg-primary p-2");
			jQuery(".main-header").removeClass("pt-4");
			
		}else {
			
			jQuery(".navbar-brand").removeClass("bg-primary p-2");
			jQuery(".main-header").addClass("pt-4");
			
		}
	}); //missing );
	
	
	/****** Carosulel slider ******/
	jQuery('.owl-carousel').owlCarousel({
		responsiveClass:true,
		loop:true,
		autoplay:true,
		dots:false,
		margin:10,
		responsive:{
		0:{
			items:2,
			nav:false
		},
		600:{
			items:3,
			nav:false
		},
		1000:{
			items:5,
			nav:false
		}
		}
	});
	
	/****** Case studies gallery ******/
	jQuery(".filter-button").click(function(){
		//alert('dd');
		var value = jQuery(this).attr('data-filter');
		
		if(value == "all")
		{
			jQuery('.filter').show();
		}
		else
		{
			jQuery(".filter").not('.'+value).hide();
			jQuery('.filter').filter('.'+value).show();
			
		}
	});

	if (jQuery(".filter-button").removeClass("active")) {
		
		jQuery(this).removeClass("active");
		
	}
	jQuery(this).addClass("active");
		
}); // jQuery End
