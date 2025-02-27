jQuery(document).ready(function($) {

  // Accordion Toggle
  var iconOpen = 'icon-minus', iconClose = 'icon-plus';

  $(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function(e) {
    var $target = $(e.target)
    $target.siblings('.accordion-heading')
      .find('em').toggleClass(iconOpen + ' ' + iconClose);
    if (e.type == 'show')
      $target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
    if (e.type == 'hide')
      $(this).find('.accordion-toggle').not($target).removeClass('active');
  });

  // DM Top
  $(window).scroll(function() {
    if ($(this).scrollTop() > 1) {
      $('.dmtop').css({
        bottom: "25px"
      });
    } else {
      $('.dmtop').css({
        bottom: "-100px"
      });
    }
  });

  $('.dmtop').click(function() {
    $('html, body').animate({
      scrollTop: '0px'
    }, 800);
    return false;
  });

  // DM Menu
  $('#nav').affix({
    offset: {
      top: $('#nav').offset().top
    }
  });

  // Menu
  $(".panel a").click(function(e) {
    e.preventDefault();
    var style = $(this).attr("class");
    $(".jetmenu").removeAttr("class").addClass("jetmenu").addClass(style);
  });
  $().jetmenu();

  // Facts
  function count($this) {
    var current = parseInt($this.html(), 10);
    current = current + 1; /* Where 50 is increment */

    $this.html(++current);
    if (current > $this.data('count')) {
      $this.html($this.data('count'));
    } else {
      setTimeout(function() {
        count($this)
      }, 50);
    }
  }

  $(".stat-count").each(function() {
    $(this).data('count', parseInt($(this).html(), 10));
    $(this).html('0');
    count($(this));
  });

  // Tooltip
  $('.social_buttons, .client').tooltip({
    selector: "a[data-toggle=tooltip]"
  })

  $('.social_buttons, .client').tooltip();

  // prettyPhoto
  $(document).ready(function() {
    $('a[data-gal]').each(function() {
      $(this).attr('rel', $(this).data('gal'));
    });
    $("a[data-rel^='prettyPhoto']").prettyPhoto({
      animationSpeed: 'slow',
      theme: 'light_square',
      slideshow: false,
      overlay_gallery: false,
      social_tools: false,
      deeplinking: false
    });
  });

  // Hover and Carousel
  $('.owl-carousel > .item ').each(function() {
    $(this).hoverdir();
  });
  $("#owl-demo").owlCarousel({
    items: 5,
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    stopOnHover: true,
    lazyLoad: true,
    transitionStyle: "fade",
    navigation: true,
    pagination: false,
  });

  // tooltip demo
  $("[data-toggle=tooltip]").tooltip();

  // popover demo
  $("[data-toggle=popover]").popover();

  // Chart Effects;
	$('.chart').easyPieChart({
		easing: 'easeOutBounce',
		size : 180,
		animate : 2000,
		lineWidth : 10,
		lineCap : 'square',
		lineWidth : 18,
		barColor : '#3498db',
		trackColor : '#f9f9f9',
		scaleColor : false,
		onStep: function(from, to, percent) {
		$(this.el).find('.percent').text(Math.round(percent)+'%');
		}
	});

  // Popular Items Carousel
  $(document).ready(function() {
    $("#popularitems").owlCarousel({
      items: 3,
      lazyLoad: true,
      navigation: false
    });
  });

  // Hover and Carousel on Home #1
  $('.owl-carousel > .item ').each(function() {
    $(this).hoverdir();
  });

  $("#owl-related").owlCarousel({
    items: 3,
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    stopOnHover: true,
    lazyLoad: true,
    transitionStyle: "fade",
    navigation: true,
    pagination: false,
  });

  // Portfolio
  var $container = $('.portfolio'),
    $items = $container.find('.market-item'),
    portfolioLayout = 'fitRows';

  if ($container.hasClass('portfolio-centered')) {
    portfolioLayout = 'masonry';
  }

  $container.isotope({
    filter: '*',
    animationEngine: 'best-available',
    layoutMode: portfolioLayout,
    animationOptions: {
      duration: 750,
      easing: 'linear',
      queue: false
    },
    masonry: {}
  }, refreshWaypoints());

  function refreshWaypoints() {
    setTimeout(function() {}, 1000);
  }

  $('nav.portfolio-filter ul a').on('click', function() {
    var selector = $(this).attr('data-filter');
    $container.isotope({
      filter: selector
    }, refreshWaypoints());
    $('nav.portfolio-filter ul a').removeClass('active');
    $(this).addClass('active');
    return false;
  });

  function getColumnNumber() {
    var winWidth = $(window).width(),
      columnNumber = 2;
  }

  function setColumns() {
    var winWidth = $(window).width(),
      columnNumber = getColumnNumber(),
      itemWidth = Math.floor(winWidth / columnNumber);

    $container.find('.market-item').each(function() {
      $(this).css({
        width: itemWidth + 'px'
      });
    });
  }

  function setPortfolio() {
    setColumns();
    $container.isotope('reLayout');
  }

  $container.imagesLoaded(function() {
    setPortfolio();
  });

  $(window).on('resize', function() {
    setPortfolio();
  });

});
jQuery.fn.jetmenu = function(options){
	var settings = {
		 indicator	 		:true     			// indicator that indicates a submenu
		,speed	 			:300     			// submenu speed
		,hideClickOut		:true     			// hide submenus when click outside menu
	}
	$.extend( settings, options );
	
	var menu = $(".jetmenu");
	var lastScreenWidth = window.innerWidth;
	
	if(settings.indicator == true){
		$(menu).find("a").each(function(){
			if($(this).siblings(".dropdown, .megamenu").length > 0){
				$(this).append("<span class='indicator'>+</span>");
			}
		});
	}
	
	$(menu).prepend("<li class='showhide'><span class='menutitle'>MENU</span><span class='icon'><em></em><em></em><em></em><em></em></span></li>");
	
	screenSize();
	
	$(window).resize(function() {
		if(lastScreenWidth <= 768 && window.innerWidth > 768){
			unbindEvents();
			hideCollapse();
			bindHover();
		}
		if(lastScreenWidth > 768 && window.innerWidth <= 768){
			unbindEvents();
			showCollapse();
			bindClick();
		}
		lastScreenWidth = window.innerWidth;
	});
	
	function screenSize(){
		if(window.innerWidth <= 768){
			showCollapse();
			bindClick();
		}
		else{
			hideCollapse();
			bindHover();
		}
	}
	
	function bindHover(){
		if (navigator.userAgent.match(/Mobi/i) || window.navigator.msMaxTouchPoints > 0){						
			$(menu).find("a").on("click touchstart", function(e){
				e.stopPropagation(); 
				e.preventDefault();
				window.location.href = $(this).attr("href");
				$(this).parent("li").siblings("li").find(".dropdown, .megamenu").stop(true, true).fadeOut(settings.speed);
				if($(this).siblings(".dropdown, .megamenu").css("display") == "none"){
					$(this).siblings(".dropdown, .megamenu").stop(true, true).fadeIn(settings.speed);
				}
				else{
					$(this).siblings(".dropdown, .megamenu").stop(true, true).fadeOut(settings.speed);
					$(this).siblings(".dropdown").find(".dropdown").stop(true, true).fadeOut(settings.speed);
				}
			});
			
			if(settings.hideClickOut == true){
				$(document).bind("click.menu touchstart.menu", function(ev){
					if($(ev.target).closest(menu).length == 0){
						$(menu).find(".dropdown, .megamenu").fadeOut(settings.speed);
					}
				});
			}
		}
		else{
			$(menu).find("li").bind("mouseenter", function(){
				$(this).children(".dropdown, .megamenu").stop(true, true).fadeIn(settings.speed);
			}).bind("mouseleave", function(){
				$(this).children(".dropdown, .megamenu").stop(true, true).fadeOut(settings.speed);
			});
		}
	}
	
	function bindClick(){
		$(menu).find("li:not(.showhide)").each(function(){
			if($(this).children(".dropdown, .megamenu").length > 0){
				$(this).children("a").bind("click", function(){
					if($(this).siblings(".dropdown, .megamenu").hasClass("menu-visible")){
						$(this).siblings(".dropdown, .megamenu").slideUp(settings.speed);
						$(this).siblings(".dropdown, .megamenu").removeClass("menu-visible");
					}
					else{
						$(this).siblings(".dropdown, .megamenu").slideDown(settings.speed);
						$(this).siblings(".dropdown, .megamenu").addClass("menu-visible");
						firstItemClick = 1;
					}
				});
			}
		});
	}
	
	function showCollapse(){
		$(menu).children("li:not(.showhide)").hide(0);
		$(menu).children("li.showhide").show(0);
		$(menu).children("li.showhide").bind("click", function(){
			if($(menu).children("li").is(":hidden")){
				$(menu).children("li").slideDown(settings.speed);
			}
			else{
				$(menu).children("li:not(.showhide)").slideUp(settings.speed);
				$(menu).children("li.showhide").show(0);
			}
		});
	}
	
	function hideCollapse(){
		$(menu).children("li").show(0);
		$(menu).children("li.showhide").hide(0);
	}	
	
	function unbindEvents(){
		$(menu).find("li, a").unbind();
		$(document).unbind("click.menu touchstart.menu");
		$(menu).find(".dropdown, .megamenu").hide(0);
	}

}







