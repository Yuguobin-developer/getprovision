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

jQuery(document).ready(function(jQuery) {
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


});
