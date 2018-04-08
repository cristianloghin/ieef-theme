$( function() {

	var dtConfirmation = false;

	if ( $('body').hasClass('home') )
	{
		var activeBanner = 0;
		var totalImages = $('#imageBanner > div').children().length;

		setInterval( function()
		{

			if ( activeBanner == ( totalImages - 1 ) )
			{
				$('#imgBn-0').css('opacity', '1');
				$('#imgBn-0').delay( 300 ).siblings().css('opacity', '1');
				activeBanner = 0;
			}
			else
			{
				$('#imgBn-' + activeBanner).css('opacity', '0');
				activeBanner++;
			}

		}, 7000 );
	}
	
	if ( $('body').hasClass('subpage') )
	{
		//console.log( $('.blk_01').height() );
		$('body,html').animate(
		{
			scrollTop: $('.blk_01').height()
		}, 700
		);
	}


	$('header #menuOpen').click( function()
	{
		$('header .mod_01').addClass('open');
		$('body').css('overflow', 'hidden');
	});

	$('header #menuClose, header .mod_01 > span').click( function()
	{
		$('header .mod_01').removeClass('open');
		$('body').css('overflow', 'auto');
	});

	$('#backTop').click( function(event)
	{
		event.preventDefault();

		duration = ( $('body').height() - $(window).height() ) * .7;

		$('body,html').animate(
		{
			scrollTop: 0 ,
		}, duration
		);
	});

	// Process Actions

	$('.mod_11 .action_button span.icon-angle-down').click( function()
	{
		index = $(this).data('index');
		if ( !$('#pMod-' + ( index + 1 ) ).hasClass('show') )
		{
			$('#pMod-' + ( index + 1 ) ).addClass('show');
			body_scroll = $(document).scrollTop();
			next_height = $('#pMod-' + ( index + 1 ) ).height();


			if ( next_height > $(window).height() )
			{
				scroll_page = body_scroll + $(window).height();
			}
			else
			{
				scroll_page = body_scroll + next_height;
			}

			$('body, html').animate(
			{
				scrollTop: scroll_page
			}, 700
			);
		}
	});	

	// Decision Tree Actions

	$('.mod_12 .action_button span.icon-check').click( function()
	{
		index = $(this).data('index');

		if ( !$('#dtMod-' + ( index + 1 ) ).hasClass('show') && !$('#dtMod-' + index ).hasClass('confirm') )
		{
			$('#dtMod-' + ( index + 1 ) ).addClass('show');
			$('#dtMod-' + index ).addClass('confirm');
			
			body_scroll = $(document).scrollTop();
			next_height = $('#dtMod-' + ( index + 1 ) ).height();

			if ( next_height > $(window).height() )
			{
				scroll_page = body_scroll + $(window).height();
			}
			else
			{
				scroll_page = body_scroll + next_height;
			}

			$('body, html').animate(
			{
				scrollTop: scroll_page
			}, 700
			);

			dtConfirmation = true;
		}	

		if ( $(this).parent().parent().hasClass('last') )
		{
			$('#answerYes').addClass('show');
			
			body_scroll = $(document).scrollTop();
			next_height = $('#answerYes').height();

			if ( next_height > $(window).height() )
			{
				scroll_page = body_scroll + $(window).height();
			}
			else
			{
				scroll_page = body_scroll + next_height;
			}

			$('body, html').animate(
			{
				scrollTop: scroll_page
			}, 700
			);
		}	

	});

	$('.mod_12 .action_button span.icon-cancel').click( function()
	{
		index = $(this).data('index');

		$('#dtMod-' + index ).removeClass('show first');
		
		if ( !$('#dtMod-' + ( index + 1 ) ).hasClass('show') )
		{
			$('#dtMod-' + ( index + 1 ) ).addClass('show');
		}

		if ( $(this).parent().parent().hasClass('last') )
		{
			body_scroll = $(document).scrollTop();
			if ( dtConfirmation )
			{
				$('#answerYes').addClass('show');
				next_height = $('#answerYes').height();
			}
			else
			{
				$('#answerNo').addClass('show');
				next_height = $('#answerNo').height();
			}			

			if ( next_height > $(window).height() )
			{
				scroll_page = body_scroll + $(window).height();
			}
			else
			{
				scroll_page = body_scroll + next_height;
			}

			$('body, html').animate(
			{
				scrollTop: scroll_page
			}, 700
			);
		}
	
	});

	$(window).on('scroll', function()
	{
		
		if ( $(document).scrollTop() >= $('.blk_01').height() && ( $('body').hasClass('subpage') || $('body').hasClass('category') ) )
		{
			$('.content_wrapper').addClass('sticky');
		}
		else
		{
			$('.content_wrapper').removeClass('sticky');
		}
	});
});

function setTransform(x, y) {
	var object = {
		'transform' : 'translate3d('+ x +'%, '+ y +'px, 0)',
		'-webkit-transform' : 'translate3d('+ x +'%, '+ y +'px, 0)',
		'-moz-transform' : 'translate3d('+ x +'%, '+ y +'px, 0)',
		'-o-transform' : 'translate3d('+ x +'%, '+ y +'px, 0)',
		'-ms-transform' : 'translate3d('+ x +'%, '+ y +'px, 0)'
	}
	return object;
}

jQuery.fn.extend({
	newSlider: function() {
		
		var slider = $(this);
		var total_slides = slider.children().length;
		var active_slide = 1;
		var wrapper;
		var pagination;
		var heights = [];
		
		function initSlider() {
			
			wrapper_string = '<div class="slider-wrapper"></div>';
			slider.children().wrapAll(wrapper_string);
			
			wrapper = slider.children(':first-child');
			wrapper.css(setTransform(0, 0));
			
			slider.height(heights[0]);
			
			initNavigation();
			
			$(window).resize(updateSlider);
		}
		
		function initNavigation() {
			
			console.log(total_slides);

			if (total_slides > 1) {
				$('<div class="slider-controls"></div>').insertAfter(slider);
				
				controls = slider.parent().find('.slider-controls');
				
				for (i=1; i<=total_slides; i++) {
					if (i == 1) {
						controls.append('<span class="pag-button icon-dot-circled" id="slide-'+i+'" data-slide="'+i+'"></span>');
					} else {
						controls.append('<span class="pag-button icon-circle-empty" id="slide-'+i+'" data-slide="'+i+'"></span>');
					}
				}
				
				controls.find('.pag-button').click(function() {
					move(parseInt($(this).data('slide')));
					$(this).parent().find('.icon-dot-circled').removeClass('icon-dot-circled').addClass('icon-circle-empty');
					$(this).addClass('icon-dot-circled').removeClass('icon-circle-empty');
				});
				slider.on('click', function() {
					controls = slider.parent().find('.slider-controls');
					if(active_slide < total_slides) {
						move(active_slide+1);
						controls.find('.icon-dot-circled').removeClass('icon-dot-circled').addClass('icon-circle-empty');
						controls.find('#slide-'+active_slide).addClass('icon-dot-circled').removeClass('icon-circle-empty');
					} else {
						move(1);
						controls.find('.icon-dot-circled').removeClass('icon-dot-circled').addClass('icon-circle-empty');
						controls.find('#slide-1').addClass('icon-dot-circled').removeClass('icon-circle-empty');
					}
				});
			}
		}
		
		function updateSlider() {
			wrapper.css(setTransform( - (active_slide-1) * 100, 0 ));
		}
		
		// move the slider
		
		function move(direction) {
			
			value = -((direction-1) * 100);
			active_slide = direction;
					
			wrapper.addClass('transition');
			wrapper.css(setTransform(value, 0));
			wrapper.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(){
				wrapper.removeClass('transition');
				wrapper.css(setTransform(- 100 * (active_slide-1), 0));
				slider.height(heights[direction-1]);
				wrapper.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd");
			});
		}
		
		// initialise the slider after the content has been loaded
		
		$(window).on('load', function() {
			initSlider();
		});		
	}
});