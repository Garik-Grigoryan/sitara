$(document).ready(function() {
	$('.hotels-filtr :reset').click(function(){
		$('.jq-selectbox__dropdown ul li:first-child').addClass('selected sel');
		
	})
	
	$('#menu-item-120, #menu-item-121, #menu-item-122, #menu-item-123, #menu-item-124').hover(function(){
		
	$('#menu-item-120 ul, #menu-item-121 ul, #menu-item-122 ul, #menu-item-123 ul, #menu-item-124 ul ').css({'left':'auto','right':'0'});
});
	
		$(".top_nav a, .top").mPageScroll2id({
		offset : 50,
		scrollSpeed : 200
	});
	
	$('.close-mod').click(function(){
		$('.modal-wind').slideUp();		
	})
	
		
		
	
    $('.fancy').fancybox({
		helpers: {
            overlay: {
              locked: false
            }
          }
	});

	$('input[type="radio"],input[type="checkbox"], select').styler();
	$( ".datepicker" ).datepicker();

    $(window).load(function() {
		$('.min-gallery').jCarouselLite({
			auto: true,
			visible:1,
			speed:800
		});
		

		$('.c-main-slider-inner').jCarouselLite({
			auto: true,
			visible:1,
			speed:500
		});
		
		 $('#slider').nivoSlider({
			 
			
		 });
		 
    })

	$('.lang-header').click(function() {
		$(this).next('ul').slideToggle('fast');
	});


	var langHeader = $('.lang-header');
	if(langHeader.css('display') == 'block') {
		var active = $('.lang-nav').find('a.active').html();
		langHeader.find('.this-inner').html(active);
		$('.lang-nav').find('ul').css('display', 'none');
		// $('.lang-nav').find('a.active').parent().remove();
	}else {
		$('.lang-nav').find('ul').css('display', 'block');
	}


	$(window).resize(function() {
		var langHeader = $('.lang-header');	
		if(langHeader.css('display') == 'block') {
			var active = $('.lang-nav').find('a.active').html();
			langHeader.find('.this-inner').html(active);
			$('.lang-nav').find('ul').css('display', 'none');
			// $('.lang-nav').find('a.active').parent().remove();
		}else {
			$('.lang-nav').find('ul').css('display', 'block');
		}	
	});



	var menuHeader = $('.menu-header');
	var nav = $('.main-nav');
	var hasDrop = nav.find('> ul').find('> li').find('> ul').parent().find('>a');

	menuHeader.click(function() {
		nav.slideToggle('fast');
	});
	hasDrop.click(function(e) {
		if(menuHeader.css('display')=='block') {
			e.preventDefault();
			$(this).next('ul').slideToggle('fast').parent().nextAll().find('>ul').slideUp('fast');
			$(this).parent().prevAll().find('>ul').slideUp('fast');
			// alert('test');
		}
	});
	if(menuHeader.css('display')=='none') {
		nav.attr('style', '');
		hasDrop.next('ul').attr('style', '');
	}

	$(window).resize(function() {
		if(menuHeader.css('display')=='none') {
			nav.attr('style', '');
			hasDrop.next('ul').attr('style', '');
		}
	});


	var searchHeader = $('.search-header');
	searchHeader.click(function() {
		$(this).nextAll().slideToggle('fast');
	});

	if(searchHeader.css('display')=='none') {
		searchHeader.nextAll().attr('style', '');
	}

	$(window).resize(function() {
		var searchHeader = $('.search-header');
		if(searchHeader.css('display')=='none') {
			searchHeader.nextAll().attr('style', '');
		}
	});


	/*$(window).load(function() {
		$('.modal-wind').prepend("<div class='modal_overlay'>");
		$('.modal-wind-inner').prepend("<div class='close-m'>");
		$('.modal_overlay').click(function() {
			$(this).parent().hide('fast');
		});
		$('.close-m').click(function(e) {
			e.preventDefault();
			$(this).parents('.modal-wind').hide('fast');
		});
	});*/

	$('.app-send a, .mob-send a').click(function(e) {
		e.preventDefault();
		$('#appSend').slideToggle('fast');
	});
	

	// catalog slider	 
	$('.i-m-s-tabs > ul > li:first-child > .panel-cont').css('display', 'block').addClass('active');
	$('.i-m-s-tabs > ul > li:first-child > a').addClass('active');
	var i_c_h = $('.i-m-s-tabs').find('.panel-cont.active').css('height');
	$('.i-m-s-tabs').animate({'height': parseInt(i_c_h)+50+'px'},200);
	
	
			
	$('.i-m-s-tabs > ul > li > a:first-child').click(function (e) {
		e.preventDefault();
		if($(this).hasClass('active')) {

		}else {
			i_c_h = $(this).next('.panel-cont').css('height');
			$('.i-m-s-tabs').animate({'height': parseInt(i_c_h)+50+'px'},200);
			$('.i-m-s-tabs > ul > li > .panel-cont.active').each(function () {
				$(this).removeClass("active");
			});
			var ul = $(this).next(".panel-cont");
			ul.addClass("active");
				$('.i-m-s-tabs > ul > li > div:not(.active)').each(function () {
				$(this).slideUp('fast');
			});
			
			// adding class active to the link
			ul.slideToggle('fast');
			$(this).parent('li').prevAll('li').find('> a').removeClass('active');
			$(this).parent('li').nextAll('li').find('> a').removeClass('active');
			if (ul.css('display')== 'block') {
				$(this).parent('li').find('> a').toggleClass('active');
				$(this).parent('li').nextAll('li').find('> a').removeClass('active');
				$(this).parent('li').prevAll('li').find('> a').removeClass('active');
			}
		}
			
	});

	$('.i-m-s-tabs').find('.panel-cont').each(function() {
		var h = $(this).css('height');

	});


		

	
$('.leaveComment').click(function(e) {
		e.preventDefault();
		var h = $(this).parents('.panel-cont').find('.commentForm').css('height');
		$('.i-m-s-tabs').animate({'height': parseInt(h)+250+'px'});
	});

	$('.coloseCommentForm').click(function(e) {
		e.preventDefault();
		var h = $(this).parents('.panel-cont').find('.comments-list').css('height');
		// alert(h);
		$('.i-m-s-tabs').animate({'height': parseInt(h)+250+'px'});
	});


	$('.inputNumber').each(function() {
		if($(this).find('input').attr('value')<1) {
			$(this).find('.minus').addClass('disable');
		}else {
			$(this).find('.minus').removeClass('disable');
		}
	})

	$('.inputNumber').find('.minus').click(function(e) {
    	e.preventDefault();
    	var v = $(this).parent().find('input').attr('value');
    	var res =  --v;
    	if(v==0 || v<1) {
    		$(this).addClass('disable');
    		var res = '';
    	}
    	$(this).parent().find('input').attr('value', res);
    });

    $('.inputNumber').find('.plus').click(function(e) {
    	e.preventDefault();
    	$(this).parent().find('.minus').removeClass('disable');
    	var v = $(this).parent().find('input').attr('value');
    	var res =  ++v;
    	// alert(res);
    	$(this).parent().find('input').attr('value', res);
    });
	lang = $('#langdiv').attr('rel');

	if(lang == 'en')
		$('.selectBox .jq-selectbox__select-text').empty().text('Choose...');


    toggleComment($('.leaveComment'),$('.coloseCommentForm'), $('.hiddenCommentForm-title'),$('.hiddenCommentForm'), $('.comment-list-title'), $('.comments-list'));
    toggleComment($('.coloseCommentForm'),$('.leaveComment'), $('.hiddenCommentForm-title'),$('.hiddenCommentForm'), $('.comment-list-title'), $('.comments-list'));
	
});


function toggleComment (link,link2, block1,block2, hideBlock1,hideBlock2) {
	link.click(function(e) {
		e.preventDefault();
		$(this).slideToggle('fast');
		link2.slideToggle('fast');
		block1.slideToggle('fast');
		block2.slideToggle('fast');
		hideBlock1.slideToggle('fast');
		hideBlock2.slideToggle('fast');
	})
	
	
	
	
	
	
	 var sync1 = $("#sync1");
  var sync2 = $("#sync2");

  sync1.owlCarousel({
    singleItem : true,
    slideSpeed : 1000,
    navigation: true,
    pagination:false,
    afterAction : syncPosition,
    responsiveRefreshRate : 200,
  });

  sync2.owlCarousel({
    items : 5,
    itemsDesktop      : [1199,3],
    itemsDesktopSmall     : [991,5],
    itemsTablet       : [767,5],
	itemsTablet       : [667,4],
    itemsMobile       : [479,3],
	itemsMobile       : [450,3],
    pagination:false,
    responsiveRefreshRate : 100,
    afterInit : function(el){
      el.find(".owl-item").eq(0).addClass("synced");
    }
  });

  function syncPosition(el){
    var current = this.currentItem;
    $("#sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced")
    if($("#sync2").data("owlCarousel") !== undefined){
      center(current)
    }
  }

  $("#sync2").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).data("owlItem");
    sync1.trigger("owl.goTo",number);
  });

  function center(number){
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in sync2visible){
      if(num === sync2visible[i]){
        var found = true;
      }
    }

    if(found===false){
      if(num>sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", num - sync2visible.length+2)
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        sync2.trigger("owl.goTo", num);
      }
    } else if(num === sync2visible[sync2visible.length-1]){
      sync2.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
      sync2.trigger("owl.goTo", num-1)
    }
    
  }
	
	
     var owl = $("#sync2");

      owl.owlCarousel();

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })


	
	$('.inner-main-slider').hover(function(){
		$('.owl-buttons .owl-prev, .owl-buttons .owl-next, .customNavigation .btn.prev, .customNavigation .btn.next ').fadeIn('fast');
	},
	function(){
		$('.owl-buttons .owl-prev, .owl-buttons .owl-next, .customNavigation .btn.prev, .customNavigation .btn.next ').fadeOut(800);
	}
	)
	

	
	
}
