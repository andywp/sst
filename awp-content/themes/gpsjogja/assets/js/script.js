jQuery.noConflict();
jQuery(document).ready(function($){
		
	/*---------------------------------------------------
	Tooltip
	----------------------------------------------------*/	
	$('[rel="tooltip"]').tooltip();

	/*---------------------------------------------------
	Remove li scpace(display: inline)
	----------------------------------------------------*/	
	$('ul').contents().filter(function() { return this.nodeType === 3; }).remove();
	

	/*---------------------------------------------------
	Slider
	----------------------------------------------------*/	
/* Animate caption */

/* title */

$('#slider').carousel({interval: 3000});

$('#slider').find('.title').addClass('animated');
$('#slider').find('.title').addClass('bounceInDown');

$('#slider').find('.title').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	$(this).removeClass('animated');
	$(this).removeClass('bounceInDown');
});

	/* info */
	$('#slider').find('.info').addClass('animated');
	$('#slider').find('.info').addClass('bounceInRight');

	$('#slider').find('.info').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).removeClass('animated');
		$(this).removeClass('bounceInRight');
	});

	/* button */
	$('#slider').find('.button').addClass('animated');
	$('#slider').find('.button').addClass('bounceInUp');

	$('#slider').find('.button').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).removeClass('animated');
		$(this).removeClass('bounceInUp');
	});			

	$('#slider').on('slid.bs.carousel', function () {
		onYouTubeIframeAPIReady();
		$('div.carousel-inner div.active').attr('id', 'current');
		
		callPlayer('current','pauseVideo');
		/*var id_frame = $("#slider .item.active .vid").attr('id');
		alert(id_frame+'-1');*/
		/* title */
		$('#slider').find('.title').addClass('animated');
		$('#slider').find('.title').addClass('bounceInDown');
		
		$('#slider').find('.title').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass('animated');
			$(this).removeClass('bounceInDown');
		});
		
		/* info */
		$('#slider').find('.info').addClass('animated');
		$('#slider').find('.info').addClass('bounceInRight');
		
		$('#slider').find('.info').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass('animated'); 
			$(this).removeClass('bounceInRight');
		});
		
		/* button */
		$('#slider').find('.button').addClass('animated');
		$('#slider').find('.button').addClass('bounceInUp');
		
		$('#slider').find('.button').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass('animated');
			$(this).removeClass('bounceInUp');
		});
	});
			
	/* Carousel progressbar */
	var percent = 0, bar = $('.carousel-bar'), crsl = $('#slider');
	function progressBarCarousel() {
		bar.css({width:percent+'%'});
		percent = percent +1;
		if (percent>100) {
			percent=0;
			crsl.carousel('next');
		}
	}
	var barInterval = setInterval(progressBarCarousel, 100);
	crsl.carousel({
		interval: false,
		pause: false
	}).on('slid.bs.carousel', function () {percent=0;});
	crsl.hover(
		function(){
			clearInterval(barInterval);
		},
		function(){
			barInterval = setInterval(progressBarCarousel, 100);
		}
	)
	/* Carousel progressbar */





	/*---------------------------------------------------
	Owl Carousel 
	----------------------------------------------------*/
	$(".slider-udate").owlCarousel({
		items : 3,
		autoPlay: true,
		lazyLoad : true,
		navigation : false,
		pagination : false,
		itemsDesktop: true,
		itemsDesktopSmall: [979,1],
		itemsTablet: [768,1],
		responsiveClass:true,
		
		//navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
	});

	/*---------------------------------------------------
	LightGallery 
	----------------------------------------------------*/
	$('.light-gallery').lightGallery({
		thumbnail: true,
		closable: false,
		currentPagerPosition: 'middle',
		animateThumb: true
	});

		/*---------------------------------------------------
	Owl Carousel to detail produk
	----------------------------------------------------*/
	$("#detailproduk").owlCarousel({
		items : 1,
		autoPlay: false,
		lazyLoad : true,
		navigation : false,
		pagination : false,
		itemsDesktop: true,
		itemsDesktopSmall: [979,1],
		itemsTablet: [768,1],
		responsiveClass:true,
		afterMove: moved
		/* navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'] */
	});
	
	$('.custom-control').on('click', '.nav-slider', function() {
			var $this = $(this);
			var slideNum = $(this).data('slide');
			$("#detailproduk").trigger('owl.goTo', slideNum);
	});
	
	function moved() {
     var owl = $("#detailproduk").data('owlCarousel');
     var $buttons = $('.custom-control .nav-slider');
     $buttons.removeClass('active').removeAttr('disabled');
     $('.custom-control').find('[data-slide="'+owl.currentItem +'"]').addClass('active').attr('disabled', 'disabled');
   }
	
	
	$('#video-gallery').lightGallery();
	/* $(".ytp-large-play-button svg").css("display","none"); */
	
	$(".content-product").mouseenter(function(){
		$(this).addClass("hover");
	}).mouseleave(function(){
		$(this).removeClass("hover");
	});
		 
	$(".box-gallery").mouseenter(function(){
		$(this).addClass("not-hover");
	}).mouseleave(function(){
		$(this).removeClass("not-hover");
	});
	
	$(".produk-related").mouseenter(function(){
		$(this).addClass("not-hover");
	}).mouseleave(function(){
		$(this).removeClass("not-hover");
	});
	  
	
	
	$(window).load(function(){
		$(this).load(ajaxURL+"awp-content/modules/statistik/callstats.php");
	});
	
	
	
});