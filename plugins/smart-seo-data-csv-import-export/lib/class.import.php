<?php
/**
 * The PHP class that manages the import functionality of Smart SEO Data CSV Import/Export
 * @author Freddie S. Lore <freddielore.com>
 * @version 6.0.2
 */
if (!class_exists('FL_SEO_CSV_Import')) {
	class FL_SEO_CSV_Import extends FL_SEO_CSV_Import_Helper{
		
		/**
		 * Import batch size, can be overwritten using 'smart_seo_import_size' filter
		 * @private
		 */
		private $limit;
		
		/**
		 * Whether it's the last iteration or not
		 * @private
		 */
		private $last_iteration;
		
		private $post_count;
		
		private $total_iteration;
		
		private $offset;

		private $logger;

		function __construct(){
			$this->last_iteration = false;
			$this->post_count = 0;
			$this->total_iteration = 1;
			$this->logger = new FL_SEO_CSV_Logger( FL_UPLOADS . '/smartseo-' . date('d-M-Y') . '.log' );

			add_action('after_setup_theme', array(&$this, 'custom_filters_hooks') );
			
		}

		function smart_seo_import_size_callback( $size ) {
		    return $size;
		}

		function fl_yoast_ajax_csv_import(){

			if( get_option('smart_csv_is_key_valid') ){
				if( $_POST['csv_file'] and $_POST['action'] and $_POST['action'] == 'fl_csv_import' ){

					$_POST['current'] *= 1; 

					// import processes need to be capped to avoid server timeout
					$this->set_limit();

					// get total # of post to import
					$this->post_count = $this->get_total_csv_entries( $_POST['csv_file'] );
					
					// set total # of iteration/chunks to process the import
					$this->set_total_iteration();

					// set the query offset
					$this->set_offset( $_POST );

					// if first iteration, set offset to 0
					$this->offset = ( $_POST['current']  > 0 ) ? $this->offset : 0;

					// no offset if total csv entries is less than the set limit
					$this->offset = ( $this->post_count <= $this->limit ) ? 0 : $this->offset;
					
					// last iteration
					$this->limit = 	( $this->last_iteration ) ? ($this->limit * 2) : $this->limit;

					$res = array(
		   				'code' => 203,
	   					'message' => 'Invalid request',
	   					'records' => $_POST['records'],
	   					'total' => $this->post_count,
	   					'limit' => $this->limit,
	   					'offset' => $this->offset,
	   					'completion_status' => 0,
	   					'current' => ( isset($_POST['current']) ) ? $_POST['current'] : 0,
	   					'total_iteration' => $this->total_iteration,
	   					'id_alias' => trim( $_POST['id_alias'] ),
	   					'post_type_alias' => trim( $_POST['post_type_alias'] ),
	   					'post_title_alias' => trim( $_POST['post_title_alias'] ),
	   					'post_slug_alias' => trim( $_POST['post_slug_alias'] ),
	   					'seo_title_alias' => trim( $_POST['seo_title_alias'] ),
	   					'description_alias' => trim( $_POST['description_alias'] ),
	   					'keywords_alias' => trim( $_POST['keywords_alias'] ),
	   					'focus_keywords_alias' => trim( $_POST['focus_keywords_alias'] ),
	   					'csv_file' => $_POST['csv_file'],
	   					'action' => 'fl_csv_import'
		   			);

					if( $this->post_count == $this->limit ){
						$csv = new parseCSV();
						$csv->heading = true;
						$csv->offset = $this->offset;
						$csv->limit = $this->limit;
						$csv->auto( $_POST['csv_file'] );
						$final = $csv->data;
					}
					else{
						$head = new parseCSV();
						$head->heading = false;
						$head->offset = 0;
						$head->limit = 1;
						$head->auto( $_POST['csv_file'] );

						$csv_columns = array();
						foreach ($head->data as $key) {
							$csv_columns[] = $key;
						}
						$head_columns = $csv_columns[0];

						$csv = new parseCSV();
						$csv->heading = false;
						$csv->offset = $this->offset;
						$csv->limit = $this->limit;
						$csv->auto( $_POST['csv_file'] );
						$final = $this->reindex_array( $head_columns, $csv->data );	
					}


					$id_alias = $this->remove_brackets( $_POST['id_alias'] );
					$post_type_alias = $this->remove_brackets( $_POST['post_type_alias'] );
					$post_title_alias = $this->remove_brackets( $_POST['post_title_alias'] );
					$post_slug_alias = $this->remove_brackets( $_POST['post_slug_alias'] );
				    $seo_title_alias = $this->remove_brackets( $_POST['seo_title_alias'] );
				    $description_alias = $this->remove_brackets( $_POST['description_alias'] );
				    $keywords_alias = $this->remove_brackets( $_POST['keywords_alias'] );
				    $focus_keywords_alias = $this->remove_brackets( $_POST['focus_keywords_alias'] );

				    // $res['data'] = $final;

				    //die( 'description_alias: "' . $description_alias . '"' );

				    if( $_POST['id_alias'] ){


				    	// using ID as unique key
			            if( $this->current_installation() == 'WordPress SEO By Yoast' || $this->current_installation() == 'WordPress SEO Premium' ){

			            	// process taxonomy
							$term_meta = get_option( 'wpseo_taxonomy_meta' );

			            	foreach($final as $item) {


			            		// making sure we are processing the right content/post type
		            			if( !taxonomy_exists($item[$post_type_alias]) ){

		            				// update the meta title ONLY if data is provided
				            		if( $_POST['seo_title_alias'] ){
				            			$this->smartseo_update( $item[$id_alias], '_yoast_wpseo_title', $item[$seo_title_alias] );
					                }

					                // update the meta description ONLY if data is provided
					                if( $_POST['description_alias'] ){
					                	$this->smartseo_update( $item[$id_alias], '_yoast_wpseo_metadesc', $item[$description_alias] );
					            	}

					                // update the meta keyword ONLY if data is provided
					                if( $_POST['keywords_alias'] ){
						               	$this->smartseo_update( $item[$id_alias], '_yoast_wpseo_metakeywords', $item[$keywords_alias] );
				            		}

				            		// update the focus keyword ONLY if data is provided
					                if( $_POST['focus_keywords_alias'] ){
						                $this->smartseo_update( $item[$id_alias], '_yoast_wpseo_focuskw', $item[$focus_keywords_alias] );
				            		}

				            		// setup post args to update
									$post_args = array( 'ID' => $item[$id_alias] );

									// only update post title if data is specified
									if( $_POST['post_title_alias'] ){
										$post_args['post_title'] = sanitize_text_field( $item[$post_title_alias] );
									}
									// only update post slug if data is specified
									if( $_POST['post_slug_alias'] ){
										$post_args['post_name'] = sanitize_text_field( $item[$post_slug_alias] );
									}

									// Update the post into the database
									if( $_POST['post_title_alias'] || $_POST['post_slug_alias'] ){
										wp_update_post( $post_args );
									}

									$this->smart_seo_import_update( $item[$id_alias], $item );

			            		}
								else{
									
									// update the meta title ONLY if data is provided
									if( $_POST['seo_title_alias'] ){
										$term_meta[$item[$post_type_alias]][$item[$id_alias]]['wpseo_title'] = sanitize_text_field( $item[$seo_title_alias] );
									}

									// update the meta description ONLY if data is provided
					                if( $_POST['description_alias'] ){
										$term_meta[$item[$post_type_alias]][$item[$id_alias]]['wpseo_desc'] = sanitize_text_field( $item[$description_alias] );
									}
								}
			            	}

			            	update_option( 'wpseo_taxonomy_meta', $term_meta );

			            }

		            	if( $this->current_installation() == 'All-In-One SEO Pack' || $this->current_installation() == 'All-In-One SEO Pack Pro' ){

		            		foreach($final as $item) {

		            			// making sure we are processing the right content/post type
		            			if( !taxonomy_exists($item[$post_type_alias]) ){

				            		// update the meta title ONLY if data is provided
					                if( $_POST['seo_title_alias'] ){
					                	$this->smartseo_update( $item[$id_alias], '_aioseop_title', $item[$seo_title_alias] );
					                }

					                // update the meta description ONLY if data is provided
					                if( $_POST['description_alias'] ){
					                	$this->smartseo_update( $item[$id_alias], '_aioseop_description', $item[$description_alias] );
					                }

					                if( $_POST['keywords_alias'] ){
					                	$this->smartseo_update( $item[$id_alias], '_aioseop_keywords', $item[$keywords_alias] );
				            		}

				            		// setup post args to update
									$post_args = array( 'ID' => $item[$id_alias] );

									// only update post title if data is specified
									if( $_POST['post_title_alias'] ){
										$post_args['post_title'] = sanitize_text_field( $item[$post_title_alias] );
									}
									// only update post slug if data is specified
									if( $_POST['post_slug_alias'] ){
										$post_args['post_name'] = sanitize_text_field( $item[$post_slug_alias] );
									}

									// Update the post into the database
									if( $_POST['post_title_alias'] || $_POST['post_slug_alias'] ){
										wp_update_post( $post_args );
									}

									$this->smart_seo_import_update( $item[$id_alias], $item );
								}
								else{
									update_term_meta( $item[$id_alias], '_aioseop_title', $item[$seo_title_alias] );
									update_term_meta( $item[$id_alias], '_aioseop_description', $item[$description_alias] );
									$this->smart_seo_import_update( $item[$id_alias], $item );
								}

							}

		            	}

		            	if( $this->current_installation() == 'SEOPress' || $this->current_installation() == 'SEOPress' ){

		            		foreach($final as $item) {
			            		
			            		// making sure we are processing the right content/post type
		            			if( !taxonomy_exists($item[$post_type_alias]) ){

				            		// update the meta title ONLY if data is provided
					                if( $_POST['seo_title_alias'] ){
					                	$this->smartseo_update( $item[$id_alias], '_seopress_titles_title', $item[$seo_title_alias] );
					                }

					                // update the meta description ONLY if data is provided
					                if( $_POST['description_alias'] ){
					                	$this->smartseo_update( $item[$id_alias], '_seopress_titles_desc', $item[$description_alias] );
					                }

					                if( $_POST['keywords_alias'] ){
					                	$this->smartseo_update( $item[$id_alias], '_seopress_analysis_target_kw', $item[$keywords_alias] );
				            		}

				            		// update the focus keyword ONLY if data is provided
					                if( $_POST['focus_keywords_alias'] ){
						                $this->smartseo_update( $item[$id_alias], '_seopress_analysis_target_kw', $item[$focus_keywords_alias] );
				            		}

				            		// setup post args to update
									$post_args = array( 'ID' => $item[$id_alias] );

									// only update post title if data is specified
									if( $_POST['post_title_alias'] ){
										$post_args['post_title'] = sanitize_text_field( $item[$post_title_alias] );
									}
									// only update post slug if data is specified
									if( $_POST['post_slug_alias'] ){
										$post_args['post_name'] = sanitize_text_field( $item[$post_slug_alias] );
									}

									// Update the post into the database
									if( $_POST['post_title_alias'] || $_POST['post_slug_alias'] ){
										wp_update_post( $post_args );
									}

									$this->smart_seo_import_update( $item[$id_alias], $item );
								}
								else{
									update_term_meta( $item[$id_alias], '_seopress_titles_title', $item[$seo_title_alias] );
									update_term_meta( $item[$id_alias], '_seopress_titles_desc', $item[$description_alias] );
									$this->smart_seo_import_update( $item[$id_alias], $item );
								}
							}
		            	}

		            	if( $this->current_installation() == 'The SEO Framework' ){

		            		foreach($final as $item) {
			            		
			            		// making sure we are processing the right content/post type
		            			if( !taxonomy_exists($item[$post_type_alias]) ){

				            		// update the meta title ONLY if data is provided
					                if( $_POST['seo_title_alias'] ){
					                	$this->smartseo_update( $item[$id_alias], '_genesis_title', $item[$seo_title_alias] );
					                }

					                // update the meta description ONLY if data is provided
					                if( $_POST['description_alias'] ){
					                	$this->smartseo_update( $item[$id_alias], '_genesis_description', $item[$description_alias] );
					                }

					                // setup post args to update
									$post_args = array( 'ID' => $item[$id_alias] );

									// only update post title if data is specified
									if( $_POST['post_title_alias'] ){
										$post_args['post_title'] = sanitize_text_field( $item[$post_title_alias] );
									}
									// only update post slug if data is specified
									if( $_POST['post_slug_alias'] ){
										$post_args['post_name'] = sanitize_text_field( $item[$post_slug_alias] );
									}

									// Update the post into the database
									if( $_POST['post_title_alias'] || $_POST['post_slug_alias'] ){
										wp_update_post( $post_args );
									}

									$this->smart_seo_import_update( $item[$id_alias], $item );
								}
								else{

									// setting the default
									$tsf_new = array( 	'doctitle' => $item[$seo_title_alias],
														'description' => $item[$description_alias],
														'noindex' => 0,
														'nofollow' => 0,
														'noarchive' => 0,
														'saved_flag' => 1 	);	

									// get metas to update
									$tsf_metas = get_term_meta( $item[$id_alias] );
									if( isset( $tsf_metas['autodescription-term-settings'][0] ) ){
										
										$tsf_metas = unserialize( $tsf_metas['autodescription-term-settings'][0] );
										
										// leave other info as is
										$tsf_new['noindex'] = $tsf_metas['noindex'];
										$tsf_new['nofollow'] = $tsf_metas['nofollow'];
										$tsf_new['noarchive'] = $tsf_metas['noarchive'];
										$tsf_new['saved_flag'] = $tsf_metas['saved_flag'];
									}

									update_term_meta( $item[$id_alias], 'autodescription-term-settings', $tsf_new );
									$this->smart_seo_import_update( $item[$id_alias], $item );
								} 
							}
		            	}
			    	} 
		    		
		    		if( $this->post_count <= $this->limit ){						
						$res['code'] = 200;
						$res['message'] = 'Import successful';
						$res['completion_status'] = 100;
						$res['x'] = 'post count is less than or equal to limit';
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
						$res['message'] = 'Importing... ' . $completion_status . '%';
						$res['x'] = 'Still importing..';
					}
		    	}
			}

			echo @json_encode( $res );
			wp_die();

		}

		/**
		* @param {array} $keys, {array} $haystack Clean and reindex the array
		*/
		function reindex_array($keys, $values){
			// holds the final data to be returned
			$final_array = array();

			// $values contains multiple arrays, we need to reindex them one by one
			foreach ($values as $value) {
				// reset index keys to numeric
				$numeric_keys = array_values( $value );

				// store the alpha keys
				$alpha_keys = array();
				for ($i=0; $i < sizeof($numeric_keys); $i++) { 
					$alpha_keys[$keys[$i]] = $numeric_keys[$i];
				}

				// the final array
				$final_array[] = $alpha_keys;
			}

			return $final_array;

		}

		/**
		Create or update the custom field
		*/
		function smartseo_update($id, $field, $value){

			if( $id != "post_id" ){
				if ( get_post_meta( $id, $field, true ) ) {
	        		update_post_meta( $id, $field, sanitize_text_field( $value ) );
	        		$this->logger->info( 'Post ' . $id . ' `' . $field . '` updated to `' . $value . '`' );
	        	}
	        	else{
	        		add_post_meta( $id, $field, sanitize_text_field( $value ) );
	        		// create a an update_post_meta fallback
	        		update_post_meta( $id, $field, sanitize_text_field( $value ) );
	        		$this->logger->info( 'Post ' . $id . ' `' . $field . '` created with value `' . $value . '`' );
	        	}
	        }
		}

		/**
		* Set the total number of entries to import
		*/
		function get_total_csv_entries($file){
			$csv = new parseCSV();
			$csv->auto( $file );
			return sizeof( $csv->data );
		}

		/**
		* Set the total number of csv import iteration
		*/
		function set_total_iteration(){
			$this->total_iteration = ( $this->post_count > $this->limit ) ? number_format( (int) ($this->post_count / $this->limit), 0) : 1;
			$this->total_iteration = $this->total_iteration*1;
		}

		/**
		* Set the maximum number of posts to process in 1 import iteration
		*/
		function set_limit(){
			$this->limit = apply_filters( 'smart_seo_import_size', FL_SEO_BATCH_IMPORT_SIZE );
		}

		/**
		* @param {object} data Set the offset to query 
		*/
		function set_offset($data){

			if( isset( $data['offset'] ) ){

				if( $data['current'] == $this->total_iteration ){
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

		function custom_filters_hooks(){
			add_filter( 'smart_seo_import_size', array(&$this, 'smart_seo_import_size_callback'), 10, 1 );
			$this->limit = apply_filters( 'smart_seo_import_size', FL_SEO_BATCH_IMPORT_SIZE );

		}

		function smart_seo_import_update( $post_id, $data ) {
	        do_action( 'smart_seo_import_update', $post_id, $data );
	    }


	}
}