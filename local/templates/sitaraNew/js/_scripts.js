$(document).ready(function() {
	
    $('.fancy').fancybox({
		helpers: {
            overlay: {
              locked: false
            }
          }
	});


    $(window).load(function() {
		$('.min-gallery').jCarouselLite({
			auto: true,
			visible:1,
			speed:800
		});
		

		$('.c-main-slider-inner').jCarouselLite({
			auto: true,
			visible:1,
			speed:800
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

	var menuHeader = $('.menu-header');
	menuHeader.click(function() {
		$('.main-menu-cont').slideToggle('fast');
	});
	if(menuHeader.css('display')=='block') {
		$('.main-nav').find('> ul').find('> li').find('>ul').parent().addClass('hasDrop');
		$('.main-menu-cont').css('display', 'none');
	}else {
		$('.main-nav').find('li').removeClass('.hasDrop').find('> a');
		$('.main-menu-cont').css('display', 'block');
	}


	$('.main-nav').find('.hasDrop').find('> a').click(function(e) {
		e.preventDefault();
		$(this).next('ul').slideToggle('fast');
	});

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

		var menuHeader = $('.menu-header');
		if(menuHeader.css('display')=='block') {
			$('.main-nav').find('> ul').find('> li').find('> ul').parent().addClass('hasDrop');
			$('.main-menu-cont').css('display', 'none');
		}else {
			$('.main-nav').find('li').removeClass('hasDrop');
			$('.main-menu-cont').css('display', 'block');
		}

	});



});