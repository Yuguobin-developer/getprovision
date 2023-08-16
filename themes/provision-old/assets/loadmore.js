jQuery(function($) {
	/*
	 * Load More
	 */
	$("#glide_loadmore").click(function() {
		$.ajax({
			url: glide_loadmore_params.ajaxurl, // AJAX handler
			data: {
				action: "loadmore", // the parameter for admin-ajax.php
				query: glide_loadmore_params.posts, // loop parameters passed by wp_localize_script()
				page: glide_loadmore_params.current_page, // current page
			},
			type: "POST",
			beforeSend(xhr) {
				$("#glide_loadmore").text("Loading..."); // some type of preloader
			},
			success(data) {
				if (data) {
					$("#glide_loadmore").text("Load More");
					$("#glide_posts_wrap").append(data); // insert new posts
					glide_loadmore_params.current_page++;

					if (glide_loadmore_params.current_page == glide_loadmore_params.max_page)
						$("#glide_loadmore").hide(); // if last page, HIDE the button
				} else {
					$("#glide_loadmore").hide(); // if no data, HIDE the button as well
				}
			},
		});
		return false;
	});

	/*
	 * Filter
	 */
	$("#glide_filters").submit(function() {
		$.ajax({
			url: glide_loadmore_params.ajaxurl,
			data: $("#glide_filters").serialize(), // form data
			dataType: "json", // this data type allows us to receive objects from the server
			type: "POST",
			beforeSend(xhr) {
				$("#glide_filters")
					.find("button")
					.text("Filtering...");
			},
			success(data) {
				// when filter applied:
				// set the current page to 1
				glide_loadmore_params.current_page = 1;

				// set the new query parameters
				glide_loadmore_params.posts = data.posts;

				// set the new max page parameter
				glide_loadmore_params.max_page = data.max_page;

				// change the button label back
				$("#glide_filters")
					.find("button")
					.text("Apply filter");

				// insert the posts to the container
				$("#glide_posts_wrap").html(data.content);

				// hide load more button, if there are not enough posts for the second page
				if (data.max_page < 2) {
					$("#glide_loadmore").hide();
				} else {
					$("#glide_loadmore").show();
				}
			},
		});

		// do not submit the form
		return false;
	});
});
