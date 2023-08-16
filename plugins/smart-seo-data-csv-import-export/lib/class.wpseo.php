<?php 
if (!class_exists('FL_WPSEO_Taxonomy_Meta')) {
	class FL_WPSEO_Taxonomy_Meta{
		
		// defaults
		public function __construct() {
			
		}

		public function get_term_meta($term_meta, $term_id, $taxonomy){
			$meta = array( 
						'wpseo_title' => $term_meta[$taxonomy][$term_id]['wpseo_title'], 
						'wpseo_desc' => $term_meta[$taxonomy][$term_id]['wpseo_desc']
					);

			return $meta;
		}
	}
}
?>