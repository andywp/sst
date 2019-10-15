(function($) {
  "use strict";

  /*--------------------------
  preloader
  ---------------------------- */
  $(window).on('load', function() {
    var pre_loader = $('#preloader');
    pre_loader.fadeOut('slow', function() {
      $(this).remove();
    });
  });
	
	
	/*---------------------------------------------------
	Slider
	----------------------------------------------------*/	
/* Animate caption */

/* title */

	$('#slider').carousel({interval: 10000});

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
		/* onYouTubeIframeAPIReady(); */
		$('div.carousel-inner div.active').attr('id', 'current');
		
		/* callPlayer('current','pauseVideo'); */
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





  /*---------------------
   TOP Menu Stick
  --------------------- */
  var s = $("#sticker");
  var pos = s.position();
  $(window).on('scroll', function() {
    var windowpos = $(window).scrollTop() > 300;
    if (windowpos > pos.top) {
      s.addClass("stick");
    } else {
      s.removeClass("stick");
    }
  });

  /*----------------------------
   Navbar nav
  ------------------------------ */
  var main_menu = $(".main-menu ul.navbar-nav li ");
  main_menu.on('click', function() {
    main_menu.removeClass("active");
    $(this).addClass("active");
  });

  /*----------------------------
   wow js active
  ------------------------------ */
  new WOW().init();

  $(".navbar-collapse a:not(.dropdown-toggle)").on('click', function() {
    $(".navbar-collapse.collapse").removeClass('in');
  });

  //---------------------------------------------
  //Nivo slider
  //---------------------------------------------
  /* $('#ensign-nivoslider').nivoSlider({
    effect: 'random',
    slices: 15,
    boxCols: 12,
    boxRows: 8,
    animSpeed: 500,
    pauseTime: 5000,
    startSlide: 0,
    directionNav: true,
    controlNavThumbs: false,
    pauseOnHover: true,
    manualAdvance: false,
  }); */

  /*----------------------------
   Scrollspy js
  ------------------------------ */
  var Body = $('body');
  Body.scrollspy({
    target: '.navbar-collapse',
    offset: 80
  });

  /*---------------------
    Venobox
  --------------------- */
  var veno_box = $('.venobox');
  veno_box.venobox();

  /*----------------------------
  Page Scroll
  ------------------------------ */
  var page_scroll = $('a.page-scroll');
  page_scroll.on('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top - 55
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
  });

  /*--------------------------
    Back to top button
  ---------------------------- */
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });

  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

  /*----------------------------
   Parallax
  ------------------------------ */
  var well_lax = $('.wellcome-area');
  well_lax.parallax("50%", 0.4);
  var well_text = $('.wellcome-text');
  well_text.parallax("50%", 0.6);

  /*--------------------------
   collapse
  ---------------------------- */
  var panel_test = $('.panel-heading a');
  panel_test.on('click', function() {
    panel_test.removeClass('active');
    $(this).addClass('active');
  });

  /*---------------------
   Testimonial carousel
  ---------------------*/
  var test_carousel = $('.testimonial-carousel');
  test_carousel.owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    autoplay: true,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });
  /*----------------------------
   isotope active
  ------------------------------ */
  // portfolio start
  $(window).on("load", function() {
    var $container = $('.awesome-project-content');
    $container.isotope({
      filter: '*',
      animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false
      }
    });
    var pro_menu = $('.project-menu li a');
    pro_menu.on("click", function() {
      var pro_menu_active = $('.project-menu li a.active');
      pro_menu_active.removeClass('active');
      $(this).addClass('active');
      var selector = $(this).attr('data-filter');
      $container.isotope({
        filter: selector,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
        }
      });
      return false;
    });

  });
  //portfolio end

  /*---------------------
   Circular Bars - Knob
--------------------- */
  if (typeof($.fn.knob) != 'undefined') {
    var knob_tex = $('.knob');
    knob_tex.each(function() {
      var $this = $(this),
        knobVal = $this.attr('data-rel');

      $this.knob({
        'draw': function() {
          $(this.i).val(this.cv + '%')
        }
      });

      $this.appear(function() {
        $({
          value: 0
        }).animate({
          value: knobVal
        }, {
          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.val(Math.ceil(this.value)).trigger('change');
          }
        });
      }, {
        accX: 0,
        accY: -150
      });
    });
  }

})(jQuery);
