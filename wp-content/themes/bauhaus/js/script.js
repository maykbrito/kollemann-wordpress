window.Parsley.setLocale(unithemeparams.locale);

//message
var uni_popup_message = function(text, type) {
  var message_div = jQuery('#uni_popup');
      message_text = message_div.text(text);

  if (type == 'success') {
    message_div.addClass('success-message');
  }
  if (type == 'warning') {
    message_div.addClass('warning-message');
  }
  if (type == 'error') {
    message_div.addClass('error-message');
  }

  if (text != '') {
    message_div.fadeIn(400).dequeue().animate({ left: 25 }, 250, function(){
      setTimeout(function(){
        message_div.animate({ left: -125 }, 250).dequeue().fadeOut(400, function(){

            setTimeout(function(){
              message_div.removeClass('success-message warning-message error-message');
            }, 1);
        });
      }, 3000);
    });
  }
};

jQuery( document ).ready( function( $ ) {
    'use strict';

	//// ---> Check issue element
	jQuery.fn.exists = function() {
	  return jQuery(this).length;
	}

	// global vars
	var winWidth = $(window).width();
	var winHeight = $(window).height();

	if($('.homeSlider').exists()){
		$('.homeSlider').css({
		   	'height': winHeight
		});
		$('.homeSlider ul li').css({
		   	'height': winHeight
		});

		$(window).resize( function(e)
		{
		    var winWidth = $(window).width();
			var winHeight = $(window).height();
			$('.homeSlider').css({
			   	'height': winHeight
			});
			$('.homeSlider ul li').css({
			   	'height': winHeight
			});
		});
	}

	if($('.homeScreen').exists()){
		$('.homeScreen').css({
		   	'height': winHeight
		});
		var homeScreenDescHeight = $(".homeScreenDesc").height();
		$(".homeScreenDesc").css({'top': ((winHeight - homeScreenDescHeight) / 2 ) + 55 });

		$(window).resize( function(e)
		{
		    var winWidth = $(window).width();
			var winHeight = $(window).height();
			$('.homeScreen').css({
			   	'height': winHeight
			});
			
			var homeScreenDescHeight = $(".homeScreenDesc").height();
			$(".homeScreenDesc").css({'top': ((winHeight - homeScreenDescHeight) / 2 ) + 55 });

		});
	}

	var bodyClass2 = $('.homeScreen').data("screen-style");
	$("body.page-template-templ-home-php").addClass(bodyClass2);


	if($('.singleProjectWrap').exists()){
		var winHeight = winHeight - 60;
		var containerHeight = $(".singleProjectWrap").height();
		
		if (winHeight < containerHeight ) {
			$('.singleProjectGallerySlider ul li').css({
			   	'height': containerHeight
			});	
			$('.singleProjectWrap').css({
			   	'height': containerHeight
			});
		} else {
			$('.singleProjectGallerySlider ul li').css({
			   	'height': winHeight
			});	
			$('.singleProjectWrap').css({
			   	'height': winHeight
			});
		}
		$(window).resize( function(e)
		{
		    var winWidth = $(window).width();
			var winHeight = $(window).height() - 100;
			if (winHeight < containerHeight ) {
				$('.singleProjectGallerySlider ul li').css({
				   	'height': containerHeight
				});	
				$('.singleProjectWrap').css({
				   	'height': containerHeight
				});
			} else {
				$('.singleProjectGallerySlider ul li').css({
				   	'height': winHeight
				});	
				$('.singleProjectWrap').css({
				   	'height': winHeight
				});
			}
		});
	}

	$(".languageSelect span").on("click", function(){
		if ($(this).hasClass("clicked")) {
			$(this).removeClass("clicked").closest(".languageSelect").find("ul").slideUp(300);
		} else {
			$(this).addClass("clicked").closest(".languageSelect").find("ul").slideDown(300);
		}

	});

	$(document).on('click', function(e) {
		if (!$(e.target).parents().hasClass('languageSelect') /* && !$(e.target).parents().hasClass('chat-small')  && $(e.target).hasClass('clicked')*/)  {
			$(".languageSelect span").removeClass("clicked");
	    	$(".languageSelect ul").hide();
		}
	});

	if ( $(".aboutUsDesc p").length > 0 ) {
		$(".aboutUsDesc p").dotdotdot({
			wrap: 'letter'	
		});
    }

    if ( $(".testimonialItem p").length > 0 ) {
		$(".testimonialItem p").dotdotdot({
			wrap: 'letter'	
		});
    }
    if ( $(".ourServiceItemContent p").length > 0 ) {
		$(".ourServiceItemContent p").dotdotdot({
			wrap: 'letter'	
		});
    }


    if (winWidth < 768) {
    	$(".ourClientItem").each(function(){
	    	var clientItemHeight = winWidth / 2;
	    		clientItemHeight = Math.round(clientItemHeight);
	    	$(this).css({
	    		"height" : clientItemHeight,
	    		"line-height" : clientItemHeight + 'px'
	    	});
	    });
    } else {
    	$(".ourClientItem").each(function(){
	    	var clientItemHeight = winWidth / 4;
	    		clientItemHeight = Math.round(clientItemHeight);
	    	$(this).css({
	    		"height" : clientItemHeight,
	    		"line-height" : clientItemHeight + 'px'
	    	});
	    });	
    }

    $(window).resize( function(e)
		{
		    var winWidth = $(window).width();
			if (winWidth < 768) {
		    	$(".ourClientItem").each(function(){
			    	var clientItemHeight = winWidth / 2;
			    		clientItemHeight = Math.round(clientItemHeight);
			    	$(this).css({
			    		"height" : clientItemHeight,
			    		"line-height" : clientItemHeight + 'px'
			    	});
			    });
		    } else {
		    	$(".ourClientItem").each(function(){
			    	var clientItemHeight = winWidth / 4;
			    		clientItemHeight = Math.round(clientItemHeight);
			    	$(this).css({
			    		"height" : clientItemHeight,
			    		"line-height" : clientItemHeight + 'px'
			    	});
			    });	
		    }
	});

	var t=0; // the height of the highest element (after the function runs)
	var t_elem;  // the highest element (after the function runs)
	$(".partnersItem img").each(function () {
	    if ( $(this).outerHeight() > t ) {
	        t_elem = $(this);
	        t = $(this).outerHeight();
	    }
	});
	$(".partnersItem").css({
		"height" : t,
		"line-height" : t + 'px'
	});

    $(".ourClientItem.brand-with-link, .partnersItem.brand-with-link").on("click", function(){
    	var thisHref = $(this).data("href");
    	if (thisHref == '') {

    	} else {
    		window.open(
				thisHref,
				'_blank' // <- This is what makes it open in a new window.
			);
    	}
    });

    $('.ourClientItem.discolored, .partnersItem.discolored').BlackAndWhite();

    $(".comment-metadata").each(function(){
    	$( '<div class="clear"></div>').insertBefore($(this));
	});	
        
/* -------  BxSliders  -------- */

	if($('.homeSlider').exists()){
		var homeSlide = $('.homeSlider').find("ul").bxSlider({
			auto:true,
			mode:"fade",
			speed:1000,
			pause:10000,
			onSliderLoad: function(){
				$('.homeSlider').find('li[data-slide="0"]').addClass("active");
				var bodyClass = $('.homeSlider').find('li[data-slide="0"]').data("slide-style");
				$("body.page-template-templ-home-php").addClass(bodyClass);
			},
			onSlideBefore: function(){
				var gcs = homeSlide.getCurrentSlide();
		        $('.homeSlider').find('li:not(li[data-slide="'+gcs+'"])').addClass("hide");
				$('.homeSlider').find('li[data-slide="'+gcs+'"]').removeClass("hide");
				
		    },
			onSlideAfter: function(){
				var gcs = homeSlide.getCurrentSlide();
		        $('.homeSlider').find('li:not(li[data-slide="'+gcs+'"])').removeClass("active");
				$('.homeSlider').find('li[data-slide="'+gcs+'"]').addClass("active");
				var bodyClass = $('.homeSlider').find('li[data-slide="'+gcs+'"]').data("slide-style");
				$("body.page-template-templ-home-php").removeClass("background--white").removeClass("background--dark").addClass(bodyClass);
				/*BackgroundCheck.refresh();*/
		    }
	    });
	}

	if($('.testimonialsSlider').exists()){
		var testimonialsSlider = $('.testimonialsSlider').bxSlider({
			auto:true,
			mode:"fade",
			speed:800,
			pause:8000
	    });
	}

	if($('.singleProjectGallerySlider').exists()){
		var projectSlider = $('.singleProjectGallerySlider').find("ul").bxSlider({
			mode:"fade",
			speed:600,
			pause:4000,
			infiniteLoop:false
	    });
	}

	$(".singleProjectGallerySlider .bx-wrapper .bx-controls-direction a.bx-next").on("click", function(e){
		e.preventDefault();
		var currentMainSlide = projectSlider.getCurrentSlide();
		projectThumbSlider.goToNextSlide();
		$('#projectGalleryPager').find('li:not(li[data-slide="'+currentMainSlide+'"])').removeClass("active");
		$('#projectGalleryPager').find('li[data-slide="'+currentMainSlide+'"]').addClass("active");
	});
	$(".singleProjectGallerySlider .bx-wrapper .bx-controls-direction a.bx-prev").on("click", function(e){
		e.preventDefault();
		var currentMainSlide = projectSlider.getCurrentSlide();
		projectThumbSlider.goToPrevSlide();	
		$('#projectGalleryPager').find('li:not(li[data-slide="'+currentMainSlide+'"])').removeClass("active");
		$('#projectGalleryPager').find('li[data-slide="'+currentMainSlide+'"]').addClass("active");
	});

	if($('.projectGalleryThumb').exists()){
		var projectThumbSlider = $('.projectGalleryThumb').find("ul").bxSlider({
			slideWidth: 198,
			minSlides: 1,
    		maxSlides: 10,
    		moveSlides: 1,
			controls:false,
			pager:false,
			infiniteLoop:false
	    });
	};

	$("#projectGalleryPager a").on("click", function(e){
		e.preventDefault();
		if (!$(this).closest("li").hasClass("active")) {
			var prevCurrentSlide = $(this).closest("ul").find("li.active").data("slide");
			var currentSlide = $(this).closest("li").data("slide");
			$(this).closest("ul").find("li.active").removeClass("active");
			$(this).closest("li").addClass("active");

			if (prevCurrentSlide < currentSlide ) {
				projectSlider.goToSlide($(this).closest("li").data("slide"));
				projectThumbSlider.goToNextSlide();	
			} else if (prevCurrentSlide > currentSlide) {
				projectSlider.goToSlide($(this).closest("li").data("slide"));
				projectThumbSlider.goToPrevSlide();	
			}
		}
	});

	$(".fullScreen").on("click", function(e){
		e.preventDefault();
		$(this).hide().closest(".singleProjectWrap").addClass("fullWidth").find(".smallScreen").fadeIn(300);
		$(this).closest(".singleProjectWrap").find(".singleProjectDesc").hide().css("opacity", 0);
		projectThumbSlider.reloadSlider();
		var currentMainSlide = projectSlider.getCurrentSlide();
		$('#projectGalleryPager').find('li[data-slide="'+currentMainSlide+'"]').addClass("active");
	});
	$(".smallScreen").on("click", function(e){
		e.preventDefault();
		$(this).hide().closest(".singleProjectWrap").removeClass("fullWidth").find(".fullScreen").fadeIn(300);
		$(this).closest(".singleProjectWrap").find(".singleProjectDesc").show().animate({opacity: 1}, 500);;
		projectThumbSlider.reloadSlider();
		var currentMainSlide = projectSlider.getCurrentSlide();
		$('#projectGalleryPager').find('li[data-slide="'+currentMainSlide+'"]').addClass("active");
	});
/* ------- END  BxSliders  -------- */

/* -------  Archive filter  -------- */

	$(".filterItem span").on("click", function(e){
		e.preventDefault();
		$(this).closest(".filterPanel").find(".filterItem.clicked").not($(this).closest(".filterItem.clicked")).removeClass("clicked").find("ul").slideUp(300);
		$(this).closest(".filterItem").toggleClass("clicked").find("ul").slideToggle(300);
	});

	$(document).on('click', function(e) {
		if (!$(e.target).parents().hasClass('filterItem') /* && !$(e.target).parents().hasClass('chat-small')  && $(e.target).hasClass('clicked')*/)  {
	    	$(".filterItem").removeClass("clicked").find("ul").slideUp(300);
		}
	});
/* -------  END Archive filter  -------- */	

/* -------  Portfolio  -------- */

	$(window).resize( function(e){
		$(".portfolioItemV3Desc h3").each(function(){
			var contentHeight = $(this).closest(".portfolioItemV3Desc").height() - 16;
			var contentWidth = $(this).closest(".portfolioItemV3Desc").width() - 80;
			$(this).css("height",contentHeight);
			$(this).css("width",contentWidth);
		});
	});

	/* Scroll single project */
	if($('.singleProjectDescText').exists()){
		$('.singleProjectDescText').jScrollPane();
	}

    if ( $(".portfolioItemV2Desc p ").length > 0 ) {
		$(".portfolioItemV2Desc p ").dotdotdot({
			wrap: 'letter'	
		});
    }

/* -------  END Portfolio  -------- */

/* -------  Service order form  -------- */

    $(".orderServiceItem").on("click", function (e) {
            e.preventDefault();
            //console.log($(this));
            var title = $(this).data('title'),
                price = $(this).data('price');

            $.fancybox.open('#orderServiceForm', {
		        wrapCSS    : 'fancyboxOrderServiceWrap',
		        helpers : {
			        overlay : {
				        css : {
					        'background' : 'rgba(242,241,241,0.9)'
					        }
				    }
		        },
                beforeShow: function() {
                    $("input[name=uni_contact_subject]").val(title+' - '+price);
                }
            });
    });

/* -------  END Service order form  -------- */

/* -------  Mobile menu  -------- */

	$('.showMobileMenu').on("click", function(e){
		e.preventDefault();
		$(this).toggleClass('open').closest("body").toggleClass('animated');
	});

/* -------  Mobile menu  -------- */


/* ------- Contact and Order Forms --------------- */

    $("body").on("click", ".uni_input_submit", function (e) {
        var submit_button = $(this),
            this_form = submit_button.closest("form");
        this_form.submit();
    });

    $("body").on("submit", ".uni_form", function (e) {

        var submit_button = $(this),
            this_form = submit_button.closest("form"),
            action = this_form.attr('action');
            //console.log(submit_button);
        var form_valid = this_form.parsley({excluded: '[disabled]'}).validate();

            if ( form_valid ) {
                var dataToSend = this_form.serialize();

			    $.ajax({
				    type: 'post',
	        	    url: action,
	        	    data: dataToSend + '&cheaters_always_disable_js=' + 'true_bro',
	        	    dataType: 'json',
	        	    beforeSend: function(){
	        	        this_form.block({
	        	            message: null,
                            overlayCSS: { background: '#fff', opacity: 0.6 }
                        });
	        	    },
	        	    success: function(response) {
	        		    if ( response.status == "success" ) {
                            this_form.unblock();
                            uni_popup_message(response.message, "success");
                            $.fancybox.close();
	        		    } else if ( response.status == "error" ) {
                            this_form.unblock();
                            uni_popup_message(response.message, "error");
	        		    }
	        	    },
	        	    error:function(response){
	        	        this_form.unblock();
	        	        uni_popup_message("Error!", "warning");
	        	    }
	            });
            }
            return false;
    });

/* ------- End Contact Form --------------- */

	$(window).load(function() {
        /* -------  Blog masonry  -------- */

		$(".blogWrap").masonry({
			gutter: 30,
			itemSelector: '.blogArchiveItem'
		});
		//$(".blog-archive").addClass("show");

	/* -------  END Blog masonry  -------- */

		$(".portfolioItemV3Desc h3").each(function(){
			var contentHeight = $(this).closest(".portfolioItemV3Desc").height() - 16;
			var contentWidth = $(this).closest(".portfolioItemV3Desc").width() - 80;
			$(this).css("height",contentHeight);
			$(this).css("width",contentWidth);
		});

	/* ------- Portfolio filter --------------- */

	    var $container = $('.uni_portfolio_one');
	    var filter_string = '';

	    $container.isotope({
	        filter: '*',
	        masonry: {
			    gutter: 30
			},
	        animationOptions: {
	            duration: 750,
	            easing: 'linear',
	            queue: false,
	        }
	    });

	    $('.portfolio_filter').each(function(){
	        var $this_filter = $(this);

	        $this_filter.on('click', 'a', function(){

	            var this_link = $(this),
	                filter_value = this_link.attr('data-option-value');

	            if ( this_link.hasClass('selected') ) {
	                return false;
	            }

	            $this_filter.find('.selected').removeClass('selected');
	            this_link.addClass('selected');

	            $this_filter.attr('data-active', filter_value);

	            reorder();

	            return false;
	        });
	    });

	    function reorder(){
	        var filters = [];
	        $('.portfolio_filter').each(function(){
	            var filter_value = $(this).attr('data-active');
	            //console.log(filter_value);
	            if ( filter_value ) {
	                filters.push( filter_value );
	            }
	        });
	        filter_string = filters.join('');

	        if ( filter_string == '****' || filter_string == '***' || filter_string == '**' ) {
	            filter_string = '*';
	        } else {
	            filter_string = filter_string.replace('*', '');
	            filter_string = filter_string.replace('**', '');
	            filter_string = filter_string.replace('***', '');
	        }

	        //console.log(filter_string);
	        $container.isotope({
	            filter: filter_string,
	            animationOptions: {
	                duration: 750,
	                easing: 'linear',
	                queue: false,
	            }
	        });
	    }

	/* ------- End of Portfolio filter --------------- */

		// hide the loader after page is loaded
        $(".loaderWrap").addClass("hide");
		
		$(".serviceHead img").addClass("done");

		$(".ourServiceItem").each(function(){
	    	var serviceItemHeight = $(this).height();
	    	var serviceItemContentHeight = $(this).find(".ourServiceItemContent").height();
	    	var topPos = (serviceItemHeight - serviceItemContentHeight) / 2;
	    	$(this).find(".ourServiceItemContent").css("top", topPos );
	    });

	    $(window).resize( function(e)
		{
		    var winWidth = $(window).width();
			var winHeight = $(window).height() - 100;
			$(".ourServiceItem").each(function(){
		    	var serviceItemHeight = $(this).height();
		    	var serviceItemContentHeight = $(this).find(".ourServiceItemContent").height();
		    	var topPos = (serviceItemHeight - serviceItemContentHeight) / 2;
		    	$(this).find(".ourServiceItemContent").css("top", topPos );
		    });
		    if ( $(".ourServiceItemContent p").length > 0 ) {
				$(".ourServiceItemContent p").dotdotdot({
					wrap: 'letter'	
				});
		    }
		});

	    $(".portfolioBlock .portfolioLeftWrapper").each(function(){
	    	var winWidth = $(window).width();
	    	$(this).css("height", winWidth / 2 );
	    });
		
		$(window).resize( function(e)
		{
		    var winWidth = $(window).width();
			$(".portfolioBlock .portfolioLeftWrapper").each(function(){
		    	var winWidth = $(window).width();
		    	$(this).css("height", winWidth / 2 );
		    });
		});

    });

});