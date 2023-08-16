/**
 * scroll to hash URL 
 */
jQuery(window).on("load", function () {
    
    if(window.location.href.split("#")[1]){
        var urlHash = window.location.href.split("#")[1];
        jQuery('html,body').animate({
            scrollTop: jQuery('#' + urlHash).offset().top - jQuery('header.site-header').outerHeight()
        }, 150);
    }
});
/**
 * Sticky header
 */

jQuery(document).on("scroll", function() {
	if (jQuery(document).scrollTop() > 0) {
		jQuery("header, body").addClass("shrink");
	} else {
		jQuery("header, body").removeClass("shrink");
	}
});

jQuery(document).ready(function($) {
	/**
	 * Toggle menu for mobile
	 */

	jQuery.noConflict();
	jQuery(".menu-btn").click(function() {
		jQuery(this).toggleClass("active");
		jQuery(".menu-overlay").toggleClass("open");
		jQuery("html, body").toggleClass("no-overflow");
		jQuery(".main-menu ul li.active").removeClass("active");
		jQuery(".main-menu ul.sub-menu").slideUp();
	});
	jQuery.noConflict();

	/**
	 * Multilevel accordion menu for mobile
	 */

	jQuery("li").each(function() {
		if (jQuery(this).hasClass("menu-item-has-children")) {
			jQuery(this)
				.find("a:first")
				.after('<span class="submenu-icon"></span>');
		}
	});
	jQuery.noConflict();

	jQuery(".mfp-iframe").magnificPopup({
		type: "iframe",
	});

	jQuery(".open-popup-link").magnificPopup({
		type: "inline",
		midClick: true,
		mainClass: "mfp-fade bio-container",
	});
	jQuery("#homepage-banner-button").on("click", function(e) {
		const current_zipcode = jQuery("input#homepage-banner-zipform-input").val();
		jQuery("#popup-box-1 .get-started-form .ginput_container_number input[type=text]").val(current_zipcode);
	});
	jQuery("#homepage-banner-button").magnificPopup({
		type: "inline",
		midClick: true,
		mainClass: "mfp-fade masthead-popup",
	});

	/**
	 * Menu Icon
	 */
	jQuery(".main-menu .submenu-icon").click(function() {
		const link = jQuery(this);
		const closestUl = link.closest("ul");
		const parallelActiveLinks = closestUl.find(".active");
		const closestLi = link.closest("li");
		const linkStatus = closestLi.hasClass("active");
		let count = 0;
		closestUl.find("ul").slideUp(function() {
			if (++count === closestUl.find("ul").length) {
				parallelActiveLinks.removeClass("active");
			}
		});
		if (!linkStatus) {
			closestLi.children("ul").slideDown();
			closestLi.addClass("active");
		}
	});
	jQuery.noConflict();
	function getSelectedValue(id) {
		return jQuery("#" + id)
			.find("dt a span.value")
			.html();
	}

	jQuery(".dropdown dt a").click(function(e) {
		jQuery(".dropdown dd .state-menu-container").toggle();
		e.preventDefault();
	});

	jQuery(".dropdown dd ul li a").click(function() {
		const text = jQuery(this).html();
		jQuery(".dropdown dt a").html(text);
		jQuery(".dropdown dd .state-menu-container").hide();
	});

	jQuery(document).bind("click", function(e) {
		const $clicked = jQuery(e.target);
		if (!$clicked.parents().hasClass("dropdown")) jQuery(".dropdown dd .state-menu-container").hide();
	});

	/**
	 * Faq's
	 */

	jQuery(".faq > a").on("click", function() {
		if (jQuery(this).hasClass("active")) {
			jQuery(this).removeClass("active");
			jQuery(this)
				.siblings(".faq-content")
				.slideUp();
		} else {
			jQuery(".faq > a").removeClass("active");
			jQuery(this).addClass("active");
			jQuery(".faq-content").slideUp();
			jQuery(this)
				.siblings(".faq-content")
				.slideDown();
		}
	});
	jQuery.noConflict();

	jQuery(".tabs").tabs();

	jQuery.noConflict();
	if (jQuery(window).width() <= 1023) {
		jQuery(".multiple-reviews-container").owlCarousel({
			dots: false,
			nav: false,
			responsive: {
				0: {
					items: 1,
					stagePadding: 40,
					margin: 20,
					loop: true,
				},
				500: {
					items: 1,
					stagePadding: 50,
					margin: 30,
					loop: true,
				},
				767: {
					items: 2,
					stagePadding: 50,
					margin: 30,
					loop: true,
				},
			},
		});
	}
	jQuery(".more-contact .contact-title").click(function() {
		jQuery(".mobile-more-contact").slideToggle();
		jQuery(this)
			.parent()
			.toggleClass("active");
	});

	/**
	 * 	Accordian jQuery Script
	 **/
	jQuery.fn.accordion = function() {
		const trigger = jQuery(this).find(".accordion-trigger");
		const collapse = jQuery(this).find(".accordion-collapse");

		//		jQuery(trigger)
		//			.first()
		//			.addClass("accordion-open");
		//		jQuery(collapse)
		//			.first()
		//			.show();

		jQuery(trigger).each(function() {
			jQuery(this).on("click", function() {
				jQuery(this)
					.siblings(".accordion-collapse")
					.slideToggle();
				jQuery(this).toggleClass("accordion-open");
				jQuery(this)
					.parent()
					.siblings(".accordion-item")
					.find(".accordion-trigger")
					.removeClass("accordion-open");
				jQuery(this)
					.parent()
					.siblings(".accordion-item")
					.find(".accordion-collapse")
					.slideUp();
			});
		});



	};

	jQuery(".accordion").accordion();
	if (jQuery(".single-review").length) {
		let highest = null;
		let hi = 0;
		jQuery(".single-review").each(function() {
			const h = jQuery(this).height();
			if (h > hi) {
				hi = h;
				highest = jQuery(this);
			}
		});
		//highest now contains the div with the highest so lets highlight it
		jQuery(".single-review").height(highest.height());
	}

	// jQuery(".single-widget input[type='checkbox']").on("click", function() {
	// 	alert("saleem");
	// 	// in the handler, 'this' refers to the box clicked on
	// 	const $box = jQuery(this);
	// 	if ($box.is(":checked")) {
	// 		// the name of the box is retrieved using the .attr() method
	// 		// as it is assumed and expected to be immutable
	// 		const group = "input:checkbox[name='" + $box.attr("name") + "']";
	// 		// the checked state of the group/box on the other hand will change
	// 		// and the current value is retrieved using .prop() method
	// 		jQuery(group).prop("checked", false);
	// 		$box.prop("checked", true);
	// 	} else {
	// 		$box.prop("checked", false);
	// 	}
	// });
	jQuery(".login-icon.desktop-hide").click(function() {
		jQuery(".contact-dropdown").slideToggle("");
	});
	jQuery(".tooltip-bar .tooltip-inner").each(function() {
            jQuery(this).click(function(event) {
                event.preventDefault();
                const toShow = jQuery(this)
                        .find("a")
                        .attr("href");
                jQuery(toShow).slideToggle();
            });
		/*jQuery(this).click(function(event) {
			event.preventDefault();
			// const toShow = jQuery(this)
			// 	.find("a")
			// 	.attr("href");
			jQuery(jQuery(this)
			.find("a")
			.attr("href")).slideToggle();
			const otherId = jQuery(this).find("a").attr("href");
			jQuery(".tooltip-content").not(otherId).slideUp();
		});*/
	});



	if (jQuery("video").length) {
		document.getElementById("video").play();
		document.getElementById("video").addEventListener("ended", myHandler, false);
		function myHandler(e) {
			document.getElementById("video").currentTime = 10;
			document.getElementById("video").play();
		}
	}
	/**
	 * Start Search Toggle
	 */
	jQuery(".search-area").click(function() {
		jQuery(".site-header").addClass("open");
	});
	jQuery(".search-close").click(function() {
		jQuery(".site-header").removeClass("open");
	});
	jQuery.noConflict();
	/**
	 * End Search Toggle
	 */
	// Search Form focus
	jQuery(".search-area").click(function() {
		setTimeout(function() {
			jQuery("#s").focus();
		}, 100);
	});
        
    if(jQuery('.widget').hasClass('selected')){
        jQuery('#sel_plan_btn').removeAttr('disabled');
    }
    jQuery('.single-step-widget .widget').on('click',function(e){
//        e.preventDefault();
        var $this = jQuery(this);
        jQuery('#sel_plan_btn').removeAttr('disabled');
        if(jQuery(this).find("input[name^='plan']").is(':checked')){
            jQuery(this).find("input[name^='plan']").prop("checked", false);
            $this.parents('.steps-widgets-two').find('.widget').removeClass('selected');
        }else{
            jQuery(this).find("input[name^='plan']").prop("checked", true);
            $this.parents('.steps-widgets-two').find('.widget').removeClass('selected');
            jQuery(this).addClass('selected');
        }
    });
    jQuery("input[name^='utility_']").click(function(){
        var previousValue = $(this).attr('previousValue');
        
        if (previousValue == 'checked') {
          $(this).removeAttr('checked');
          $(this).attr('previousValue', false);
        } else {
          $("input[name^='utility_']:radio").attr('previousValue', false);
          $(this).attr('previousValue', 'checked');
        }
    });
    
    jQuery('.tab').on('click',function(e){
        jQuery('.error-message').remove();
        //jQuery('#postal_code').val('');
        //jQuery('#locality').val('');
       // jQuery('#administrative_area_level_1').val('');
    });
    jQuery('.skip-plans').on('click',function(e){
        e.preventDefault();
//        jQuery(this).parents('.accordion-collapse').click();
        jQuery('.accordion-plans.accordion-trigger').click();
        setTimeout(function(){
            jQuery('html, body').animate({
                scrollTop: (jQuery('.steps-address-container').offset().top - jQuery('header.step-header').height())
            },500);
        }, 350);
    });
    
    if(jQuery('body').hasClass('scroll-to-plan-notification')){
        jQuery('html, body').animate({
            scrollTop: ($('.accordion-notification').offset().top - jQuery('header.step-header').height())
        },500);
    }
    if(jQuery('body').hasClass('scroll-to-plans')){
        jQuery('html, body').animate({
            scrollTop: ($('.accordion-plans').offset().top - jQuery('header.step-header').height())
        },500);
    }
    if(jQuery('body').hasClass('scroll-to-ste-na')){
        jQuery('html, body').animate({
            scrollTop: ($('.step-na').offset().top - jQuery('header.step-header').height() - 30)
        },500);
    }
    
    jQuery('.slide-toggle').click(function(){
        jQuery(this).next('.mobile-toggle').slideToggle("slow");
    });
    
    if(jQuery('body .bg-width').length){
        var position = jQuery('.single-step.current').offset();
	var left_pos = position.left;
	var Width = jQuery('.single-step.current').width() / 2; 
        var final_width = left_pos + Width; 
        
	jQuery('.bg-width').width(final_width+'px');
    }
    
    jQuery('#request_pricing').magnificPopup({
        type: 'inline',
        midClick: true,
        callbacks: {
            open: function() {
              var mp = $.magnificPopup.instance,
                t = $(mp.currItem.el[0]);
                jQuery(t[0].hash).find('h2').text('Send a copy of your plan options by email:');
                jQuery(t[0].hash).find('#input_7_5').val('1');
                var email = jQuery('#notification-email').text();
                
                if(email != ''){
//                    console.log('inside');
                    jQuery('.mfp-content .cta-newsletter #gforms_confirmation_message_7').hide();
                    jQuery('.mfp-content .cta-newsletter #gforms_confirmation_message_7').after("<div id='gform_confirmation_message_7' class='gform_confirmation_message_7 gform_confirmation_message custom'>We\'ve sent a copy of the CarbonBetter<sup>&reg;</sup> plans available in your area to "+email+"</div>");
                }else{
//                    console.log('outside');
                }
                
            },
            close: function() {
              var mp = $.magnificPopup.instance,
                  t = $(mp.currItem.el[0]);
                jQuery(t[0].hash).removeClass('mfp-hide');
                jQuery(t[0].hash).find('#input_7_5').val('0');
                jQuery(t[0].hash).find('.cta-newsletter #gforms_confirmation_message_7').show();
                jQuery(t[0].hash).find('.gform_confirmation_message.custom').remove();
            }
        }
    });
    
    jQuery('.open-popup').magnificPopup({
        type: 'inline',
        midClick: true,
        callbacks: {
            open: function() {
              var mp = $.magnificPopup.instance,
                  t = $(mp.currItem.el[0]);
                jQuery(t[0].hash).find('.popup-first-step').hide();
                jQuery(t[0].hash).find('.popup-second-step').hide();
                jQuery(t[0].hash).find('.popup-default-step').show();
            }
        }
    });
    
    if(!jQuery('body').hasClass('greenish-bg-body') && !jQuery('body').hasClass('page-id-84')){
        var check_cookie = Cookies.get('userEnrolldetails');
        
        if (check_cookie == undefined) {
             
           if(check_cookie == undefined) { check_cookie = {"lclShare":"no"};  }
            
            setTimeout( function() {
                jQuery.magnificPopup.open({
                    items: {
                      src: '#location-subscribe',
                      type: 'inline'
                    }
                });
            },10000);
            //Cookies.set('userEnrolldetails',check_cookie,{ expires: 1, path: '/' });
        }
    }
    
    jQuery('#geolocationGo').click(function(){
//        console.log('button clicked');
//        getLocation();
        jQuery('#geolocationGo').next('.error-message').remove();
        var check_cookie = {"lclShare":"yes"};
        Cookies.set('userEnrolldetails',check_cookie,{ expires: 1, path: '/' });
         if(navigator.geolocation){
//             console.log('navigator enabled');
            var options = {timeout:30000};
            navigator.geolocation.getCurrentPosition(showLocation, errorHandler, options);
         } else{
             jQuery('#geolocationGo').after('<div class="error-message">Sorry, browser does not support geolocation!</div>');
         }

    });
    
    jQuery('.inactive-zipbox').click(function(e){
        e.preventDefault();
        jQuery('.step-na').slideUp();
        jQuery('.step-forms').slideDown();
    });
    
    jQuery('#input_5_10').focusin(function(event){
        event.preventDefault();
        jQuery(this).parent().nextAll('.error').remove();
    });
    jQuery('#input_5_33').focusin(function(event){
        event.preventDefault();
        jQuery(this).parent().nextAll('.error').remove();
    });
    jQuery('#input_5_54').focusin(function(event){
        event.preventDefault();
        jQuery(this).parent().nextAll('.error').remove();
    });
    
    jQuery("#input_5_10").bind("keyup focusout",function(){
//        var reg = /^931\d{9}$/; //12 char long and start with 931
        var isChecked = jQuery('#gform_5').find('.gchoice_5_11_1 input:checkbox:checked').length;
//        console.log(isChecked);
        
        var regex = new RegExp(jQuery(this).data('reg').slice(1, -1));
        var msg = jQuery(this).data('mess');
        var val = jQuery(this).val();
        jQuery(this).parent().nextAll('.error').remove();
        if (!regex.test(val) && !isChecked) {
            jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(jQuery(this).parent());
            jQuery(this).prev('.ac-name-icon').addClass('gray-icon');
            
        }else if(val == 0 && !isChecked){
            //000000000000000
            jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(jQuery(this).parent());
            jQuery(this).prev('.ac-name-icon').addClass('gray-icon');
            
            
        }else{
            jQuery(this).prev('.ac-name-icon').removeClass('gray-icon');
            jQuery(this).parent().nextAll('.error').remove();
            
        }
    });
    jQuery("#input_5_33").bind("keyup focusout",function(){
//        var reg = /^931\d{9}$/; //12 char long and start with 931
        var isChecked = jQuery('#gform_5').find('.gchoice_5_11_1 input:checkbox:checked').length;
//        console.log(isChecked);
        
        var regex = new RegExp(jQuery(this).data('reg').slice(1, -1));
        var msg = jQuery(this).data('mess');
        var val = jQuery(this).val();
        jQuery(this).parent().nextAll('.error').remove();
        if (!regex.test(val) && !isChecked) {
            jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(jQuery(this).parent());
            jQuery(this).prev('.ac-name-icon').addClass('gray-icon');
        }else if(val == 0 && !isChecked){
            //000000000000000
            jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(jQuery(this).parent());
            jQuery(this).prev('.ac-name-icon').addClass('gray-icon');
            
        }else{
            jQuery(this).prev('.ac-name-icon').removeClass('gray-icon');
            jQuery(this).parent().nextAll('.error').remove();
        }
    });
    jQuery("#input_5_54").bind("keyup focusout",function(){
//        var reg = /^931\d{9}$/; //12 char long and start with 931
        var isChecked = jQuery('#gform_5').find('.gchoice_5_11_1 input:checkbox:checked').length;
//        console.log(isChecked);
        
        var regex = new RegExp(jQuery(this).data('reg').slice(1, -1));
        var msg = jQuery(this).data('mess');
        var val = jQuery(this).val();
        jQuery(this).parent().nextAll('.error').remove();
        if (!regex.test(val) && !isChecked) {
            jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(jQuery(this).parent());
            jQuery(this).prev('.ac-name-icon').addClass('gray-icon');
        }else if(val == 0 && !isChecked){
            //000000000000000
            jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(jQuery(this).parent());
            jQuery(this).prev('.ac-name-icon').addClass('gray-icon');
            
        }else{
            jQuery(this).prev('.ac-name-icon').removeClass('gray-icon');
            jQuery(this).parent().nextAll('.error').remove();
        }
    });
    
    jQuery('.glide-block-city-list .link-boxes').each(function(){  
      
      // Cache the highest
      var highestBox = 0;
      
      // Select and loop the elements you want to equalise
      jQuery('.link-box', this).each(function(){
        
        // If this box is higher than the cached highest then store it
        if(jQuery(this).height() > highestBox) {
          highestBox = jQuery(this).height(); 
        }
      
      });  
            
      // Set the height of all those children to whichever was highest 
      jQuery('.link-box',this).height(highestBox);
                    
    });
});

/**
 * Custom functions
 */
function showLocation(position) {
    get_address_by_latlng(position.coords.latitude, position.coords.longitude);
 }
 function errorHandler(err) {
//     console.log('err called');
    if(err.code == 1) {
       jQuery('#geolocationGo').after('<div class="error-message">Access is denied</div>');
    }
    else if( err.code == 2 || err.code == 3 ) {
       jQuery('#geolocationGo').after('<div class="error-message">Position is unavailable. Please enable location Services</div>');
    }else{
//        console.log(err);
    }
    
 }
 
function initialize() {
    geocoder = new google.maps.Geocoder();
}
 
 function get_address_by_latlng(lat, lng) {
//	initialize();

	geocoder = new google.maps.Geocoder();
//	alert('called');
	var latlng = new google.maps.LatLng(lat, lng);
	geocoder.geocode({'latLng': latlng}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
	 
//	  console.log(results.length);
		if (results.length > 1) {
			var j=0;
//                        var city = region = country = zipcode = null;
			for (var indice=0; indice<results.length; indice++) {
				if (results[indice].types[0]=='postal_code') {
                                    j=indice;
                                    break;
				}
			}

                        //console.log(results);
//                        console.log(results[j]);
		
			for (var i=0; i<results[j].address_components.length; i++) {
//				console.log(results[j].address_components[i]);
				if (results[j].address_components[i].types[0] == "locality") {
					//this is the object you are looking for ciity
					city = results[j].address_components[i];
				}
				if (results[j].address_components[i].types[0] == "administrative_area_level_1") {
					//this is the object you are looking for State
					region = results[j].address_components[i];
				}
				if (results[j].address_components[i].types[0] == "country") {
					//this is the object you are looking for country
					country = results[j].address_components[i];
				}
				if (results[j].address_components[i].types[0] == "postal_code") {
					//this is the object you are looking for zipcode
					zipcode = results[j].address_components[i];
				}
			}
                        
//                        console.log(zipcode);
			//city data
			
                        var servedStates = JSON.parse(jQuery("#service_states").val());

                        var state = convertToSlug(region.long_name);

                        jQuery("#serve-in-city").text(zipcode.long_name);

                        if(servedStates.hasOwnProperty(state)) {
                            jQuery("#about-anergy-choice").attr("href", servedStates[state]);

                            jQuery("#clean-anergy-plan").attr("href", "/enroll/?zipcode="+zipcode.long_name);
                            jQuery('#state').val(region.long_name);
                            jQuery('#city').val(city.long_name);
                            jQuery('#zipcode').val(zipcode.long_name);

                            jQuery(".popup-first-step").hide();
                            jQuery(".popup-second-step").show();


                        } else {
                            jQuery("#about-anergy-choice").attr("href", "/renewable-energy/");
                            jQuery(".popup-first-step").hide();
                            jQuery(".popup-second-step").hide();
                            jQuery('#input_4_4').val(zipcode.long_name);
                            jQuery(".popup-default-step").show();
                        }
				

		} else {
                    console.log('google API returned no results');
		}
		//}
	  } else {
		console.log('google API Status issue');
	  }
	});
}

function GravityFormValidation_5_parent(){
    if(GravityFormValidation_5()){
        window["gf_submitting_5"]=false;
        jQuery('#input_5_22').attr('disabled',false);
        return true;
    }else{   
        window["gf_submitting_5"]=false;
        jQuery('#input_5_22').attr('disabled',true);
        return false;
    }
}


function GravityFormValidation_5(){
        var form = jQuery('#gform_5');
        var retrn = true;
        form.find('.error').remove();
        
        var isChecked = form.find('.gchoice_5_11_1 input:checkbox:checked').length;
        
        var uti1 = form.find('#input_5_10');
        var reg = new RegExp(uti1.data('reg').slice(1, -1));
        var msg = uti1.data('mess');
        var val = uti1.val();
        
        if (!reg.test(val) && !isChecked) {
            jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(uti1.parent());
            uti1.prev('.ac-name-icon').addClass('gray-icon');
            
        retrn = false;    
//        return (false);
        }else if (val == 0  && !isChecked) {
            jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(uti1.parent());
            uti1.prev('.ac-name-icon').addClass('gray-icon');
            
        retrn = false;    
//        return (false);
        }
//        http://www.openbookproject.net/books/mi2pwjs/ch13.html
        
        var utiSPI = form.find('#input_5_54');
        var utiAc1 = form.find('#input_5_42').val();
        var utiAc2 = form.find('#input_5_47').val();
        if(utiSPI.data('reg')){
            var reg = new RegExp(utiSPI.data('reg').slice(1, -1));
            var msg = utiSPI.data('mess');
            var val = utiSPI.val();

            if (!reg.test(val) && !isChecked && (utiAc1 == 'PGW' || utiAc2 == 'PGW' )) {
                jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(utiSPI.parent());
                utiSPI.prev('.ac-name-icon').addClass('gray-icon');

            retrn = false;    
    //        return (false);
            }else if (val == 0  && !isChecked && (utiAc1 == 'PGW' || utiAc2 == 'PGW' )) {
                jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(utiSPI.parent());
                utiSPI.prev('.ac-name-icon').addClass('gray-icon');

            retrn = false;    
    //        return (false);
            }
        }
        
        
        var uti2 = form.find('#input_5_33');
        if(uti2.is(":visible") && !isChecked){
            var reg2 = new RegExp(uti2.data('reg').slice(1, -1));
            var msg = uti2.data('mess');
            var val2 = uti2.val();

            if (!reg2.test(val2)) {
                jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(uti2.parent());
                uti2.prev('.ac-name-icon').addClass('gray-icon');
                window["gf_submitting_5"]=false;
                retrn = false;
//                return (false);
            }else if (val2 == 0) {
                jQuery( '<div class="gfield_description validation_message error">'+msg+'</div>' ).insertAfter(uti2.parent());
                uti2.prev('.ac-name-icon').addClass('gray-icon');
                window["gf_submitting_5"]=false;
                retrn = false;
//                return (false);
            }
        }
        
        
        jQuery('#input_5_22').attr('disabled',false);
        
        if(!retrn){
            return (false);
        }else{
            return (true);
        }
        
}

function step_form_1(elem){
    if(jQuery('#tab_zip').hasClass('active')){
        if(jQuery('#postal_code').val() == ""){
            jQuery(elem).parent().find('.error-message').remove();
            jQuery(elem).before('<span class="error-message">Oops, please enter a valid zip code.</span>');
            return false;
        }
        
        var zipRegex = /^\d{5}$/;
    
        if (!zipRegex.test(jQuery('#postal_code').val()))
        {
            jQuery(elem).parent().find('.error-message').remove();
            jQuery(elem).before('<span class="error-message">Zipcode is not valid</span>');
            return false;
        }
    }
    jQuery(elem).parent().find('.error-message').remove();
    jQuery(elem).prop('disabled', true);
    if(jQuery("#address_form").is(":visible")){
        jQuery(".error-message").remove();
//        alert("The paragraph  is visible.");
        var _state = jQuery('#address_form').find('input[name="state"]').val();
        var _city = jQuery('#address_form').find('input[name="city"]').val();
        var _zip = jQuery('#postal_code').val();
        var _address = jQuery('#address_form').find('input[name="address"]').val();
        var _street_number = jQuery('#address_form').find('input[name="street_number"]').val();
        var _route = jQuery('#address_form').find('input[name="route"]').val();
        var _admin_lv_3 = jQuery('#address_form').find('input[name="admin_lv_3"]').val();
        var _admin_lv_2 = jQuery('#address_form').find('input[name="admin_lv_2"]').val();
        
       
        
        jQuery.ajax({
            url : localVars.ajaxurl,
            type : 'post',
            data : {
                action : 'step_form_1_address',
                city : _city,
                state : _state,
                zipcode : _zip,
                address : _address,
                street_number : _street_number,
                route : _route,
                admin_lv_3 : _admin_lv_3,
                admin_lv_2 : _admin_lv_2,
            },
            beforeSend: function(){
                // Show image container
                jQuery(".form-loader").css('display','inline-block');
               },
            success : function( response ) {
                if(response.status == 'success'){
//                    var redirect = '/enroll-step-2/?k='+response.url;
                    var redirect = '/enroll-step-2/?'+response.url;
//                    console.log(redirect);
//                    alert('response');
                    window.location.replace(redirect);
                    jQuery(elem).prop('disabled', false);
                }else if(response.status == 'fail'){
//                    console.log(response);
                    jQuery('.step-na').find('.inactive-zipbox h4').text('Your Address:');
                    jQuery('.step-na').find('.inactive-zipbox p').text(_address);
                    jQuery('#input_6_2').val(_zip);
                    jQuery('#input_6_3').val(_city);
                    jQuery('#input_6_4').val(_state);
                    jQuery('.step-na').slideDown();
                    jQuery('.step-forms').slideUp();
                    jQuery(elem).prop('disabled', false);
                }else{
//                    console.log(response);
                    jQuery(elem).before('<span class="error-message">Oops, please enter your address.</span>');
                    jQuery(elem).prop('disabled', false);
                }
                                                    
            },
            complete:function(data){
                // Hide image container
                jQuery(".form-loader").hide();
               }
        });
    } else{

        var zip = jQuery('#zipcode_form').find('input[name="zip-code"]').val();
        
        jQuery.ajax({
            url : localVars.ajaxurl,
            type : 'post',
            data : {
		a: 'variable',
                action : 'step_form_1_zip',
                zipcode: zip
            },
            beforeSend: function(){
                // Show image container
                jQuery(".form-loader").css('display','inline-block');
               },
            success : function( response ) {
                if(response.status == 'success'){
//                    var redirect = '/enroll-step-2/?k='+response.url;
                    var redirect = '/enroll-step-2/?'+response.url;
                    console.log(redirect);
                    window.location.replace(redirect);
                    jQuery(elem).prop('disabled', false);
                }else if(response.status == 'fail'){
                    
                    jQuery('.step-na').find('.inactive-zipbox h4').text('Your Zip code:');
                    jQuery('.step-na').find('.inactive-zipbox p').text(zip);
                    jQuery('#input_6_2').val(zip);
                    //jQuery('#input_6_3').val(_city);
                    //jQuery('#input_6_4').val(_state);
                    jQuery('.step-na').slideDown();
                    jQuery('.step-forms').slideUp();
                    jQuery(elem).prop('disabled', false);
                }else{
//                    console.log(response.error);
                    jQuery(elem).before('<span class="error-message">Please fill the values.</span>');
                    jQuery(elem).prop('disabled', false);
                }
                                                    
            },
            complete:function(data){
                // Hide image container
                jQuery(".form-loader").hide();
               }
        });
    }
    
}

function step_form_2_1(elem){
    
    jQuery(elem).parent().find('.error-message').remove();
//    jQuery(elem).prop('disabled', true);
    
    var zip = jQuery('#utility_form').find('input[name="zip-code"]').val();
    var _city = jQuery('#utility_form').find('input[name="city"]').val();
    var _state = jQuery('#utility_form').find('input[name="state"]').val();
    var utility = new Array();
    var $inputs = jQuery('#utility_form').find("input[name^='utility']:checked");
    
     $inputs.each(function() {
            utility.push(jQuery(this).val());
        });
    
    if(utility.length === 0){
        jQuery(elem).before('<span class="error-message">Please confirm your utility.</span>');
    }else{
        jQuery.ajax({
            url : localVars.ajaxurl,
            type : 'post',
            data : {
                action : 'step_form_2_1',
                zipcode : zip,
                city : _city,
                state : _state,
                utilityId : utility
            },
            beforeSend: function(){
                // Show image container
                jQuery(".form-loader").css('display','inline-block');
               },
            success : function( response ) {
                if(response.status == 'success'){
//                    var redirect = '/enroll-step-2/?k='+response.url;
                    var redirect = '/enroll-step-2/?'+response.url;
//                    console.log(redirect);
                    window.location.replace(redirect);
                }else if(response.status == 'fail'){
                    jQuery(elem).parent().append('<span class="error-message">Something went wrong!</span>');
                    jQuery(elem).prop('disabled', false);
                }else{
//                    console.log(response);
                    jQuery(elem).before('<span class="error-message">Please confirm your utility.</span>');
                    jQuery(elem).prop('disabled', false);
                }
                                                    
            },
            complete:function(data){
                // Hide image container
                jQuery(".form-loader").hide();
               }
        });
    }
}
function step_form_2_2(elem){
    jQuery(elem).parent().find('.error-message').remove();
    
    
    var zip = jQuery('#plan_form').find('input[name="zip-code"]').val();
    var utility = jQuery('#plan_form').find('input[name="utility"]').val();
    var _city = jQuery('#plan_form').find('input[name="city"]').val();
    var _state = jQuery('#plan_form').find('input[name="state"]').val();
    
    var _email = jQuery('#plan_form').find('input[name="email"]').val();
    var plan = new Array();
    var $inputs = jQuery('.steps-address-container').find("input[name^='plan']:checked");
    
     $inputs.each(function() {
            plan.push(jQuery(this).val());
        });
    
    if(plan.length === 0){
        jQuery(elem).before('<span class="error-message">Please confirm your plan.</span>');
    }else{
//        console.log(utility);
        jQuery.ajax({
            url : localVars.ajaxurl,
            type : 'post',
            data : {
                action : 'step_form_2_2',
                zipcode : zip,
                city : _city,
                state : _state,
                email : _email,
                utilityId : utility,
                planId : plan
            },beforeSend: function(){
                // Show image container
                jQuery(".form-loader").css('display','inline-block');
                jQuery(elem).prop('disabled', true);
               },
            success : function( response ) {
                if(response.status == 'success'){
//                    var redirect = '/enroll-step-3/?k='+response.url;
                    var redirect = '/enroll-step-3/?'+response.url;
//                    console.log(redirect);
                    window.location.replace(redirect);
                    jQuery(elem).prop('disabled', false);
                }else if(response.status == 'fail'){
//                    console.log('zip is not served');
                    jQuery(elem).parent().append('<span class="error-message">Something went wrong!</span>');
                    jQuery(elem).prop('disabled', false);
                }else{
//                    console.log(response);
                    jQuery(elem).before('<span class="error-message">Please confirm your plan.</span>');
                    jQuery(elem).prop('disabled', false);
                }
                                                    
            },
            complete:function(data){
                // Hide image container
                jQuery(".form-loader").hide();
               }
        });
    }
}

//Google autocomplete
var placeSearch, autocomplete2;
  var componentForm = {
    street_number: 'long_name',
    //route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'long_name',
    administrative_area_level_2: 'long_name',
    administrative_area_level_3: 'long_name',
    route: 'long_name',
    postal_code: 'short_name'
  };

function initAutocomplete() {
  var options = {
    types: ['address'],
    componentRestrictions: {country: "us"}
   };
    var input = document.getElementById('autocomplete');
  autocomplete2 = new google.maps.places.Autocomplete(input,options);
  
  autocomplete2.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete2.getPlace();
//  console.log(place);
  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
      var options = {timeout:300};
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete2.setBounds(circle.getBounds());
    });
  }
}


function convertToSlug(Text) {
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}
