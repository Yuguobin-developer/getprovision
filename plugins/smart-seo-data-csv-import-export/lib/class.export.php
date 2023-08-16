<?php
/**
* The CSV Export class
*/
if (!class_exists('FL_SEO_CSV_Export')) {

	class FL_SEO_CSV_Export extends FL_SEO_CSV_Import_Helper{
		
		private $limit;
		
		private $last_iteration;
		
		private $post_type;
		
		private $post_count;
		
		private $total_iteration;
		
		private $offset;

		private $mysql_offset;

		private $date_from;

		private $date_to;

		private $exclude_default;

		public $wpseo;

		private $export_fields;

		/**
		* Setting the defaults
		*/
		function __construct(){
			$this->last_iteration = false;
			$this->post_count = 0;
			$this->total_iteration = 1;

			$this->wpseo = new FL_WPSEO_Taxonomy_Meta();

			$this->date_from = '';
			$this->date_to = '';

			add_action('after_setup_theme', array(&$this, 'custom_filters_hooks') );

		}

		function smart_seo_export_size_callback($size){
			return $size;
		}

		function smart_seo_export_fields_callback($fields){
			return $fields;
		}

		function smart_seo_export_title_callback($title){
			return $title;
		}

		function smart_seo_export_desc_callback($desc){
			return $desc;
		}

		/**
		* @param {object} $_GET Initiate the CSV export
		*/
		function fl_yoast_ajax_csv_export(){

			// the post type to export
			$this->post_type = $_GET['post_type'];

			// processes need to be capped to avoid server timeout
			$this->set_limit();

			// set the starting export date
			$this->date_from = $_GET['seo_export_from'];

			// set the ending export date
			$this->date_to = $_GET['seo_export_to'];

			// exclude posts with default meta info from being exported
			$this->exclude_default = ( isset( $_GET['exclude_default'] ) ) ? $_GET['exclude_default'] : "off";

			// set total # of post to export
			$this->set_post_count();
			
			// set total # of iteration/chunks to process the export
			$this->set_total_iteration();

			// set the query offset
			$this->set_offset( $_GET );

			// set the defaults
			$res = array(
		   				'code' => 203,
		   				'current' => 0,
	   					'message' => 'Invalid request',
	   					'post_type' => $this->post_type,
	   					'seo_export_from' => $this->date_from,
	   					'seo_export_to' => $this->date_to,
	   					'total' => $this->post_count,
	   					'limit' => $this->limit,
	   					'completion_status' => 0,
	   					'current' => ( isset( $_GET['current'] ) ) ? $_GET['current'] : 0,
	   					'exclude_default' => $this->exclude_default,
	   					'total_iteration' => $this->total_iteration,
	   					'_wpnonce' => $_GET['_wpnonce'],
	   					'action' => 'fl_csv_export'
		   			);

			$upload_dir = wp_upload_dir();
			
			// check if uploads directory is writeable
			if(!wp_is_writable( $upload_dir['basedir'] )){

				$res = array(
	   				'code' => 403,
	   				'message' => 'Please ensure your /wp-content/uploads directory is writable. You may need to contact your hosting provider to remove this restriction.'
	   			);
			    echo @json_encode( $res );
				wp_die();
			}
			
			if( get_option('smart_csv_is_key_valid') ){

				if( $this->post_type and $_GET['action'] and $_GET['action'] == 'fl_csv_export' ){
					if ( !wp_verify_nonce( $_GET['_wpnonce'], "csv_export_nonce")) {
				      	$res['message'] = "Failed";
				   	}
				   	else{

				   		global $wpdb;

				   		$posts = array();

						$mysql_offset = $this->offset - $this->limit * 1;
						$mysql_limit = $this->limit;

						if( $this->post_count <= $this->limit ){	
							$mysql_offset = 0;
						}

						if( $this->last_iteration ){
							$mysql_offset = $this->offset * 1;
							$this->limit *= 2;
						}

						$res['mysql_offset'] = $mysql_offset;

						if( $this->current_installation() == 'WordPress SEO By Yoast' || $this->current_installation() == 'WordPress SEO Premium' ){

							if ( taxonomy_exists( $this->post_type ) ) {
								$temp = $this->getTaxonomies();
							}
							else{

								// get all posts based on the selected post type
								$posttype = $this->get_registered_post_types();

								// retrieve posts to export
								$posts = $this->getPosts( $posttype, $this->date_from, $this->date_to, $mysql_limit, $mysql_offset );

								$temp = array();
								foreach($posts as $post) {

									$meta = get_post_custom( $post->ID );

									if( $this->exclude_default == "on" ){
										if( !empty( $meta['_yoast_wpseo_title'][0] ) && !empty( $meta['_yoast_wpseo_metadesc'][0] ) ){
											continue;
										}
									}

								    $post->post_slug = $post->post_name;
								    $post->post_title = $post->post_title;

								    // WPML - get the correct translated permalink 
								    if( class_exists( 'SitePress' ) ){ 
								    	$post_language_details = apply_filters( 'wpml_post_language_details', NULL, $post->ID ) ;
								    	$post->permalink = apply_filters( 'wpml_permalink', get_permalink( $post->ID ), $post_language_details['language_code'], true );

								    }
								    else{
								    	$post->permalink = get_permalink( $post->ID );
								    }

								    $post->seo_title = apply_filters( 'smart_seo_export_title', $meta['_yoast_wpseo_title'][0], $post );

								    $post->seo_metadesc = apply_filters( 'smart_seo_export_desc', $meta['_yoast_wpseo_metadesc'][0], $post );

								    $post->seo_metakw = $meta['_yoast_wpseo_metakeywords'][0];
								    $post->seo_focuskw = $meta['_yoast_wpseo_focuskw'][0];

								    if( !empty( $this->export_fields ) && is_array( $this->export_fields ) ){
								    	for ($i=0; $i < sizeof( $this->export_fields ); $i++) { 
								    		$field_name = $this->export_fields[$i];

								    		if( !is_array( $field_name ) ){
								    			$post->{$field_name} = $meta[$field_name][0];
								    		}
								    		else{
								    			$post->{$field_name[0]} = call_user_func( $field_name[1], $post );
								    		}
								    	}
								    }

								    $temp[] = $post;
								}

							}
						}


						if( $this->current_installation() == 'All-In-One SEO Pack' || $this->current_installation() == 'All-In-One SEO Pack Pro' ){

							if ( taxonomy_exists($this->post_type ) ) {
								$temp = $this->getTaxonomies();
							}
							else{
								
								// get all posts based on the selected post type
								$posttype = $this->get_registered_post_types();

								// retrieve posts to export
								$posts = $this->getPosts( $posttype, $this->date_from, $this->date_to, $mysql_limit, $mysql_offset );

								$temp = array();
								foreach($posts as $post) {

									$meta = get_post_custom( $post->ID );

									if( $this->exclude_default == "on" ){
										if( !empty( $meta['_aioseop_title'][0] ) || !empty( $meta['_aioseop_description'][0] ) ){
											continue;
										}
									}

									$post->post_slug = $post->post_name;
									$post->post_title = $post->post_title;

									if( class_exists( 'SitePress' ) ){
								    	$post_language_details = apply_filters( 'wpml_post_language_details', NULL, $post->ID ) ;
								    	$post->permalink = apply_filters( 'wpml_permalink', get_permalink( $post->ID ), $post_language_details['language_code'], true );
								    }
								    else{
								    	$post->permalink = get_permalink( $post->ID );
								    }
									
								    $post->seo_title = apply_filters( 'smart_seo_export_title', $meta['_aioseop_title'][0], $post );
								    $post->seo_metadesc = apply_filters( 'smart_seo_export_desc', $meta['_aioseop_description'][0], $post );
								    $post->seo_metakw = $meta['_aioseop_keywords'][0];
								    $post->seo_focuskw = $meta['_aioseop_keywords'][0];

								    if( !empty( $this->export_fields ) && is_array( $this->export_fields ) ){
								    	for ($i=0; $i < sizeof( $this->export_fields ); $i++) { 
								    		
								    		$field_name = $this->export_fields[$i];

								    		if( !is_array( $field_name ) ){
								    			$post->{$field_name} = $meta[$field_name][0];
								    		}
								    		else{
								    			$post->{$field_name[0]} = call_user_func( $field_name[1], $post );
								    		}
								    	}
								    }

									$temp[] = $post;
								}
							}
						}

						if( $this->current_installation() == 'SEOPress' || $this->current_installation() == 'SEOPress Pro' ){

							if ( taxonomy_exists($this->post_type ) ) {
								$temp = $this->getTaxonomies();
							}
							else{
								
								// get all posts based on the selected post type
								$posttype = $this->get_registered_post_types();

								// retrieve posts to export
								$posts = $this->getPosts( $posttype, $this->date_from, $this->date_to, $mysql_limit, $mysql_offset );

								$temp = array();
								foreach($posts as $post) {

									$meta = get_post_custom( $post->ID );

									if( $this->exclude_default == "on" ){
										if( !empty( $meta['_seopress_titles_title'][0] ) || !empty( $meta['_seopress_titles_desc'][0] ) ){
											continue;
										}
									}

									$post->post_slug = $post->post_name;
									$post->post_title = $post->post_title;

									if( class_exists( 'SitePress' ) ){
								    	$post_language_details = apply_filters( 'wpml_post_language_details', NULL, $post->ID ) ;
								    	$post->permalink = apply_filters( 'wpml_permalink', get_permalink( $post->ID ), $post_language_details['language_code'], true );
								    }
								    else{
								    	$post->permalink = get_permalink( $post->ID );
								    }
									
								    $post->seo_title = apply_filters( 'smart_seo_export_title', $meta['_seopress_titles_title'][0], $post );
								    $post->seo_metadesc = apply_filters( 'smart_seo_export_desc', $meta['_seopress_titles_desc'][0], $post );
								    $post->seo_metakw = $meta['_seopress_analysis_target_kw'][0];
								    $post->seo_focuskw = $meta['_seopress_analysis_target_kw'][0];

								    if( !empty( $this->export_fields ) && is_array( $this->export_fields ) ){
								    	for ($i=0; $i < sizeof( $this->export_fields ); $i++) { 
								    		
								    		$field_name = $this->export_fields[$i];

								    		if( !is_array( $field_name ) ){
								    			$post->{$field_name} = $meta[$field_name][0];
								    		}
								    		else{
								    			$post->{$field_name[0]} = call_user_func( $field_name[1], $post );
								    		}
								    	}
								    }

									$temp[] = $post;
								}
							}
						}

						if( $this->current_installation() == 'The SEO Framework' ){

							if ( taxonomy_exists($this->post_type ) ) {
								// Do nothing for now
								$temp = $this->getTaxonomies();
							}
							else{
								
								// get all posts based on the selected post type
								$posttype = $this->get_registered_post_types();

								// retrieve posts to export
								$posts = $this->getPosts( $posttype, $this->date_from, $this->date_to, $mysql_limit, $mysql_offset );

								$temp = array();
								foreach($posts as $post) {

									$meta = get_post_custom( $post->ID );

									if( $this->exclude_default == "on" ){
										if( !empty( $meta['_genesis_title'][0] ) || !empty( $meta['_genesis_description'][0] ) ){
											continue;
										}
									}

									$post->post_slug = $post->post_name;
									$post->post_title = $post->post_title;

									if( class_exists( 'SitePress' ) ){
								    	$post_language_details = apply_filters( 'wpml_post_language_details', NULL, $post->ID ) ;
								    	$post->permalink = apply_filters( 'wpml_permalink', get_permalink( $post->ID ), $post_language_details['language_code'], true );
								    }
								    else{
								    	$post->permalink = get_permalink( $post->ID );
								    }
									
								    $post->seo_title = apply_filters( 'smart_seo_export_title', $meta['_genesis_title'][0], $post );
								    $post->seo_metadesc = apply_filters( 'smart_seo_export_desc', $meta['_genesis_description'][0], $post );
								    
								    $post->seo_metakw = '';
								    $post->seo_focuskw = '';

								    if( !empty( $this->export_fields ) && is_array( $this->export_fields ) ){
								    	for ($i=0; $i < sizeof( $this->export_fields ); $i++) { 
								    		
								    		$field_name = $this->export_fields[$i];

								    		if( !is_array( $field_name ) ){
								    			$post->{$field_name} = $meta[$field_name][0];
								    		}
								    		else{
								    			$post->{$field_name[0]} = call_user_func( $field_name[1], $post );
								    		}
								    	}
								    }

									$temp[] = $post;
								}
							}
						}

				   		// store in a temporary csv file
				   		$timestamp = date('M_j_Y__') . $_GET['_wpnonce'] . '_' . $this->post_type;
				   		$domain_name = preg_replace( "![^a-z0-9]+!i", "_", $this->remove_http( get_home_url() ) );
				   		$download_url = $this->protocol_agnostic( FL_UPLOADS_BASE_URL ) . '/' . $domain_name . '_seo_' . $timestamp . '.csv';
				   		
				   		
				   		$filename = FL_UPLOADS . '/' . $domain_name . '_seo_' . $timestamp . '.csv';

				   		// csv headings if exporting taxonomies
				   		$headings = array('taxonomy_id', 'taxonomy_created', 'taxonomy_type', 'taxonomy_title', 'taxonomy_slug', 'seo_meta_title', 'seo_meta_description', 'seo_meta_keyword', 'seo_focus_keyword', 'permalink' );

				   		if ( !taxonomy_exists( $this->post_type ) ){

				   			// csv headings if exporting posts/pages and custom posts
				   			$headings = array('post_id', 'post_date', 'post_type', 'post_title', 'post_slug', 'seo_meta_title', 'seo_meta_description', 'seo_meta_keyword', 'seo_focus_keyword', 'permalink' );

					   		// add new columns if defined, applies to posts only
					   		if( !empty( $this->export_fields ) && is_array( $this->export_fields ) ){
						    	for ($i=0; $i < sizeof( $this->export_fields ); $i++) {
						    		if( !is_array( $this->export_fields[$i] ) ){ 
							    		$headings[] = $this->export_fields[$i];
							    	}
							    	else{
							    		$headings[] = $this->export_fields[$i][0];
							    	}
						    	}
						    }
						}

				   		if( file_exists( $filename ) ){
				   			// if on first iteration, remove existing export file
				   			if( $res['current'] == 0 ){
				   				@unlink( $filename );
				   				// recreate the file
				   				$output = @fopen($filename, "w");
							    if( $output ){

								    // add the column headings
								    @fputcsv( $output, $headings );
									$this->csv_export_file_update($temp, $filename);
									@fclose($output);
								}
				   			}
				   			else{
				   				// update the existing csv
				   				$this->csv_export_file_update($temp, $filename);
				   			}
				   		}
				   		else{
				   			$output = @fopen($filename, "w");
						    
						    if( $output ){
							    // add the column headings if on first iteration & append the initial iteration
								@fputcsv( $output, $headings );
								
								$this->csv_export_file_update($temp, $filename);
								@fclose($output);
							}
				   		}
						
						if( $this->post_count <= $this->limit ){						
							$res['code'] = 200;
							$res['message'] = 'Export successful';
							$res['completion_status'] = 100;

							// admin-ajax.php was not designed for file downloads. Return download URL instead
							$res['url'] = $download_url;
							$res['path'] = $filename;
						}
						else{
							// process by batch
							$completion_status = ( $this->last_iteration ) ? 100 : number_format( ($this->offset / $this->post_count * 100), 0);
							// $download_url = ( $completion_status * 1 == 100 ) ? $download_url : '';

							$res['current'] += 1;
							$res['limit'] = $this->limit;
							$res['offset'] = $this->offset;
							$res['completion_status'] = $completion_status * 1;
							$res['code'] = ( $completion_status * 1 < 100 ) ? 201 : 200;
							$res['url'] = $download_url;
							$res['path'] = $filename;
							$res['message'] = 'Exporting... ' . $completion_status . '%';
						}
					}
				}

			}

			echo @json_encode( $res );
			
			wp_die();

		}

		/**
		* Set the total number of posts to export
		*/
		function set_post_count(){
			// get post count based on the selected taxonomy
			if ( taxonomy_exists($this->post_type ) ) {
				$this->post_count = $this->get_total_taxonomy_count( $this->post_type ) * 1;
			}
			else{
				$this->post_count = $this->get_total_post_count( $this->post_type, $this->date_from, $this->date_to )*1;
			}
		}

		/**
		* Set the total number of csv export iteration
		*/
		function set_total_iteration(){
			$this->total_iteration = ( $this->post_count > $this->limit ) ? number_format( (int) ($this->post_count / $this->limit), 0) : 1;
			$this->total_iteration = $this->total_iteration*1;
		}

		/**
		* Set the maximum number of posts to process in 1 export iteration
		*/
		function set_limit(){
			if ( taxonomy_exists($this->post_type ) ) {
				$this->limit = $this->get_total_taxonomy_count( $this->post_type ) * 1;
			}
			else{
				$this->limit = apply_filters( 'smart_seo_export_size', FL_SEO_BATCH_EXPORT_SIZE );
			}
		}

		/**
		* @param {object} data Set the offset to query 
		*/
		function set_offset($data){
			if( isset($data['offset']) ){
				if( $data['current'] == $data['total_iteration'] ){
					$this->offset = (int) $data['offset'];
					$this->last_iteration = true;
				}
				else{
					$this->offset = (int) $data['offset'] + $this->limit;
				}
			}
			else{
				$this->offset = ( $this->post_count > $this->limit ) ? $this->limit : 0;
			}
		}

		/**
		* @param {object} data, {file} file Append entries to CSV
		*/
		function csv_export_file_update($data, $file){

			$output = @fopen($file, 'a');
			foreach($data as $post) {

				$rows = array( $post->ID, $post->post_date, $post->post_type, $post->post_title, $post->post_slug, $post->seo_title, $post->seo_metadesc, $post->seo_metakw, $post->seo_focuskw, $post->permalink );

				if ( !taxonomy_exists( $this->post_type ) ){
					if( !empty( $this->export_fields ) && is_array( $this->export_fields ) ){
				    	for ($i=0; $i < sizeof( $this->export_fields ); $i++) { 
				    		$field_name = $this->export_fields[$i];
				    		if( !is_array( $field_name ) ){ 
					    		$rows[] = $post->{$field_name};
					    	}
					    	else{
					    		$rows[] = $post->{$field_name[0]};
					    	}
				    	}
				    }


				}

				@fputcsv( $output, $rows );
			}
			fclose($output);
		}

		/**
		* @param {object} data, {file} file Append entries to CSV
		*/
		function get_registered_post_types(){
			global $wpdb;
			$posttype = '';
			if( $this->post_type == 'all' ){
				
				$posttype = "$wpdb->posts.post_type = 'page' OR $wpdb->posts.post_type = 'post'";

				$args = array(
				   'public'   => true,
				   '_builtin' => false
				);

				$out = 'names'; 
				$operator = 'and'; 

				$post_types = get_post_types( $args, $out, $operator );

				foreach ( $post_types  as $post_type ) {
				   	$posttype .= " OR $wpdb->posts.post_type = '{$post_type}'";
				}
				wp_reset_query();
			}
			else{
				$posttype = "$wpdb->posts.post_type = '" . $this->post_type . "'";
			}
			return $posttype;
		}

		/**
		* Returns posts object to be processed during export
		* @param {object} posttype, {string} date_from, {string} date_to, {int} limit, {int} offset 
		*/
		function getPosts( $posttype, $date_from, $date_to, $mysql_limit, $mysql_offset ){
			global $wpdb;
			if( $date_from != "" && $date_to != "" ){
				$posts = $wpdb->get_results("
					SELECT 
					$wpdb->posts.ID, 
					$wpdb->posts.post_date, 
					$wpdb->posts.post_name, 
					$wpdb->posts.post_type, 
					$wpdb->posts.post_title 
					FROM `$wpdb->posts`
						WHERE $wpdb->posts.post_status = 'publish'
						AND ( $wpdb->posts.post_date BETWEEN '$date_from' AND '$date_to' )
						AND (" . $posttype . ") LIMIT $mysql_limit OFFSET $mysql_offset
				");
			}
			else{
				$posts = $wpdb->get_results("
					SELECT 
					$wpdb->posts.ID, 
					$wpdb->posts.post_date, 
					$wpdb->posts.post_name, 
					$wpdb->posts.post_type, 
					$wpdb->posts.post_title 
					FROM `$wpdb->posts`
						WHERE $wpdb->posts.post_status = 'publish'
						AND (" . $posttype . ") LIMIT $mysql_limit OFFSET $mysql_offset
				");
			}
			return $posts;
		}

		/**
		* Returns taxonomies object to be processed during export
		*/
		function getTaxonomies(){

			$temp = array();

			if( class_exists('WPSEO_Option' ) ){
				$term_meta = get_option( 'wpseo_taxonomy_meta' );
				$taxonomy = $this->post_type;

				if ( $taxonomy ) {

			  		$_args = array( 'taxonomy' => $taxonomy, 'hide_empty' => false );

			    	$terms = get_terms($_args);
					
			    	foreach ( $terms as $term ) {

			    		$post = array();

						$meta = $this->wpseo->get_term_meta( $term_meta, $term->term_id, $taxonomy );

						$post['post_type'] = $taxonomy;
						$post['ID'] = $term->term_id;
						$post['post_title'] = $term->name;
						$post['post_slug'] = $term->slug;

					    $post['seo_title'] = $meta['wpseo_title'];
					    $post['seo_metadesc'] = $meta['wpseo_desc'];

					    $temp[] = $this->objectify($post);
						
					}
				}
			}
			elseif ( class_exists('All_in_One_SEO_Pack') || class_exists('seopress_pro_options') || class_exists('seopress_options') ) { // SEOPress and All in one SEO store their taxonomy data in terms
				
				$taxonomy = $this->post_type;

				if ( $taxonomy ) {

			  		$_args = array( 'taxonomy' => $taxonomy, 'hide_empty' => false );

			    	$terms = get_terms($_args);

					foreach ( $terms as $term ) {

			    		$post = array();

			    		$term_meta = get_term_meta( $term->term_id );

						$post['post_type'] = $taxonomy;
						$post['ID'] = $term->term_id;
						$post['post_title'] = $term->name;
						$post['post_slug'] = $term->slug;

						if( class_exists('seopress_pro_options') || class_exists('seopress_options') ){
						    $post['seo_title'] = $term_meta['_seopress_titles_title'][0];
						    $post['seo_metadesc'] = $term_meta['_seopress_titles_desc'][0];
						}

						if( class_exists('All_in_One_SEO_Pack') ){
							$post['seo_title'] = $term_meta['_aioseop_title'][0];
							$post['seo_metadesc'] = $term_meta['_aioseop_description'][0];
						}

						$temp[] = $this->objectify($post);
						
					}
				}
				
			}
			elseif ( class_exists('\The_SEO_Framework\Core') ) {

				$taxonomy = $this->post_type;

				if ( $taxonomy ) {

			  		$_args = array( 'taxonomy' => $taxonomy, 'hide_empty' => false );

			    	$terms = get_terms($_args);

					foreach ( $terms as $term ) {

			    		$post = array();

			    		$term_meta = get_term_meta( $term->term_id );
			    		
			    		// set default titles and desc
			    		$tsf_metas = array( 'doctitle' => '', 'description' => '' );

			    		// extract taxonomy metas if available
			    		if( isset( $term_meta['autodescription-term-settings'][0] ) ){
			    			$tsf_metas = unserialize( $term_meta['autodescription-term-settings'][0] );
			    		}

						$post['post_type'] = $taxonomy;
						$post['ID'] = $term->term_id;
						$post['post_title'] = $term->name;
						$post['post_slug'] = $term->slug;
						$post['seo_title'] = $tsf_metas['doctitle'];
						$post['seo_metadesc'] = $tsf_metas['description'];

						$temp[] = $this->objectify($post);
						
					}
				}
			}

			return $temp;
			
		}
		
		function custom_filters_hooks(){
			// allow external scripts t define export batch size
			add_filter( 'smart_seo_export_size', array(&$this, 'smart_seo_export_size_callback'), 10, 1 );
			$this->limit = apply_filters( 'smart_seo_export_size', FL_SEO_BATCH_EXPORT_SIZE );

			// allow external scripts to define exportable custom fields
			add_filter( 'smart_seo_export_fields', array(&$this, 'smart_seo_export_fields_callback'), 10, 1 );
			$this->export_fields = apply_filters( 'smart_seo_export_fields', array() );

			// allow external scripts to manipulate exported SEO title
			add_filter( 'smart_seo_export_title', array(&$this, 'smart_seo_export_title_callback'), 10, 2 );

			// allow external scripts to manipulate exported SEO description
			add_filter( 'smart_seo_export_desc', array(&$this, 'smart_seo_export_desc_callback'), 10, 2 );

		}

	}
}