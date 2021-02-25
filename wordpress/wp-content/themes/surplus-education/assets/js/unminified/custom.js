jQuery(document).ready(function($){

	$('.notice-list-wrap').removeClass('hide-element');
	
	//notification slider
	$('.notice-list-wrap .owl-carousel').owlCarousel({
		items: 1,
		autoplay: true,
		autoplayHoverPause: true,
		//autoplayTimeout:1000,
		loop: true,
		dots: false,
		nav: false,
		animateOut: 'slideOutUp'
		,
		animateIn: 'slideInUp'
	});

	
	var headerHeight;
	$(window).on('load resize', function() {
		headerHeight = $('.site-header').outerHeight();
			$('.site-content .page-header').css('padding-top', headerHeight);
	});

	//responsive menu
	$('.site-header .toggle-btn').click(function(){
		$(this).siblings('.nav-wrap').animate({
			width: 'toggle',
		});
	});
	$('.main-navigation .close').click(function(){
		$(this).parents('.nav-wrap').animate({
			width: 'toggle',
		});
	});

	$('.main-navigation .menu-item-has-children').find('> a').after('<span class="submenu-toggle"><i class="fas fa-caret-down"></i></span>');

	//move login btn into nav menu
	$(window).on('load resize', function() {

		if($(window).width() < 1025) {
			$('.site-header .main-header .main-navigation + .login-register-block').insertAfter('.site-header .main-navigation .nav-menu > li:last-child').addClass('cloned-item');
			$('.main-navigation .menu-item-has-children span').replaceWith('<button class="submenu-toggle"><i class="fas fa-caret-down"></i></button>');
			$('button.submenu-toggle').click(function(){
				$(this).toggleClass('active');
				$(this).siblings('.sub-menu').stop(true, false, true).slideToggle();
			});
		} else {
			$('.site-header .main-navigation ul .login-register-block.cloned-item').insertAfter('.site-header .main-navigation').removeClass('cloned-item');
			$('.main-navigation .menu-item-has-children button').replaceWith('<span class="submenu-toggle"><i class="fas fa-caret-down"></i></span>');
		}
	});

	//back to top js
	$(window).scroll(function() {
		if($(this).scrollTop() > 300) {
			$('.back-to-top').addClass('active');
		}else {
			$('.back-to-top').removeClass('active');
		}

		if( $(this).scrollTop() > headerHeight ) {
			$('.sticky-header').addClass('stick');
		}else {
			$('.sticky-header').removeClass('stick');
		}
	});

	$('.back-to-top').click(function() {
		$('body, html').animate({
			scrollTop: 0,
		}, 700);
	});

	var slider_auto, slider_loop, rtl;
	
	if( sep_data.auto == '1' ){
		slider_auto = true;
	}else{
		slider_auto = false;
	}
	
	if( sep_data.loop == '1' ){
		slider_loop = true;
	}else{
		slider_loop = false;
	}
	
	if( sep_data.rtl == '1' ){
		rtl = true;
	}else{
		rtl = false;
	}

    //banner slider js
    $('.theme-banner .owl-carousel').owlCarousel({
    	items: 1,
    	autoplay: slider_auto,
    	loop: slider_loop,
    	nav: true,
    	dots: false,
    	rtl: rtl,
    	autoplaySpeed: 800,
    	autoplayTimeout: 3000,
    });

	//statcounter
	$('.counter-num').each(function() {
		var $this = $(this),
		countTo = $this.attr('data-count');
		
		$({ countNum: $this.text()}).animate({
			countNum: countTo
		},

		{

			duration: 3000,
			easing:'linear',
			step: function() {
				$this.text(Math.floor(this.countNum));
			},
			complete: function() {
				$this.text(this.countNum);
	      //alert('finished');
	  }

	});  
	});

	//advance search slider toggle
	$('.advance-search-section form .course-attributes > label').click(function(){
		$(this).siblings('.advanced-search-field').toggleClass('open');
	});

	//custom scrollbar for team widget
	$('.flexbox-wrapper-team .flexbox-team-modal').each(function(){ 
		const ps = new PerfectScrollbar($(this)[0], {
			wheelSpeed: 0.5,
  			wheelPropagation: true,
		}); 
	});

	//custom scrollbar for instrucro archive
	$('.instructor-wrap .flexbox-team-modal').each(function(){ 
		const ps = new PerfectScrollbar($(this)[0], {
			wheelSpeed: 0.5,
  			wheelPropagation: true,
		}); 
	});

	//js for accessibility
	$('.main-navigation ul li a, .main-navigation ul li button').focus(function() {
		$(this).parents('li').addClass('focused');
	}).blur(function() {
		$(this).parents('li').removeClass('focused');
	});

	$('.widget_ste_team_widget .team-social-list ul li a').focus(function() {
		$(this).parents('.widget_ste_team_widget').addClass('focused');
	}).blur(function() {
		$(this).parents('.widget_ste_team_widget').removeClass('focused');
	});

	$('.gallery-section .gallery-item a').focus(function() {
		$(this).parents('.gallery-item').addClass('focused');
	}).blur(function() {
		$(this).parents('.gallery-item').removeClass('focused');
	});
	
}); //document close