<?php
/**
 * Block Name: FAQ
 *
 * The template for displaying the custom gutenberg block named FAQ.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Redica
 * @since 1.0.0
 */

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = $block['className'];

// Making the unique ID for the block.
$id = 'block-' . $block['id'];

// Meta fields related to current block.
$block_fields = get_fields( $block['id'] );
$blok_faq_variation = $block_fields['blok_faq_variation'];
$blok_faq_headline = $block_fields['blok_faq_headline'];
$blok_faq_faq = $block_fields['blok_faq_faq'];
$want_to_select_faqs_manually = $block_fields['want_to_select_faqs_manually'];
if($blok_faq_faq) {
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-faq">

	<?php if($blok_faq_variation == 'First'){ ?>
	<section class="s-section green-container">
		<div class="faq-block">
			<div class="wrapper">
				<?php if($blok_faq_headline){ ?>
					<h2><?php echo $blok_faq_headline; ?></h2>
				<?php } ?>
				<?php if($blok_faq_faq){ ?>
				<div class="faqs-area">
					<?php foreach ($blok_faq_faq as $faq ) { ?>
					<div class="faq">
						<a href="javascript:void(0)" class=""><?php echo $faq['title']; ?></a>
						<div class="faq-content" style="display: none;">
							<?php echo $faq['text']; ?>
						</div>
					</div>
					<!--faq-->
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			<!-- /.glide-block -->
		</div>
		<!-- /.wrapper -->
	</section>

	<?php } else if($blok_faq_variation == 'Second'){ ?>

		<section class="s-section faq-variation">
			<div class="faq-block">
				<div class="wrapper">
					<?php if($blok_faq_headline){ ?>
						<h2><?php echo $blok_faq_headline; ?></h2>
					<?php } ?>
					<?php if($blok_faq_faq){ ?>
					<div class="faqs-area">
						<?php foreach ($blok_faq_faq as $faq ) { ?>
						<div class="faq">
							<a href="javascript:void(0)" class=""><?php echo $faq['title']; ?></a>
							<div class="faq-content" style="display: none;">
								<?php echo $faq['text']; ?>
							</div>
						</div>
						<!--faq-->
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<!-- /.glide-block -->
			</div>
			<!-- /.wrapper -->
		</section>

	<?php } elseif($blok_faq_variation == 'Third') { ?>

		<section class="s-section faq-variation faq-variation-2">
			<div class="faq-block">
				<div class="wrapper">
					<?php if($blok_faq_headline){ ?>
						<h2><?php echo $blok_faq_headline; ?></h2>
					<?php } ?>
					<?php if($blok_faq_faq){ ?>
					<div class="faqs-area">
						<?php foreach ($blok_faq_faq as $faq ) { ?>
						<div class="faq">
							<a href="javascript:void(0)" class=""><?php echo $faq['title']; ?></a>
							<div class="faq-content" style="display: none;">
								<?php echo $faq['text']; ?>
							</div>
						</div>
						<!--faq-->
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<!-- /.glide-block -->
			</div>
			<!-- /.wrapper -->
		</section>

	<?php }else{
            ?>
            <div class="steps-form-with-faqs">
                <div class="faqs-area">
                    <?php if($blok_faq_headline){ ?>
                        <h4><?php echo $blok_faq_headline; ?></h4>
                    <?php } ?>
                        <?php if($blok_faq_faq){
                            foreach ($blok_faq_faq as $faq ) { ?>
                                <div class="faq">
                                        <a href="javascript:void(0)" class=""><?php echo $faq['title']; ?></a>
                                        <div class="faq-content" style="display: none;">
                                                <?php echo $faq['text']; ?>
                                        </div>
                                </div>
                            
                            <?php }
                            } ?>
                        
                </div>
                <!-- Faqs Area -->
            </div>
            
                <?php
        } ?>

</div><?php } else { 
    
    if($blok_faq_variation == 'Fourth'):
        ?>
        <div class="steps-form-with-faqs">
            <div class="faqs-area">
                    <?php 
                    if($blok_faq_headline){
                        echo "<h4>$blok_faq_headline</h4>";
                    }
                    if($want_to_select_faqs_manually == "1"){
                        $select_faqs = $block_fields['select_faqs'];
                        if( $select_faqs ): 
                            foreach( $select_faqs as $faq ): 
                                
                                ?>
                                <div class="faq">
                                    <a href="javascript:void(0)" class=""><?php echo $faq->post_title; ?></a>
                                    <div class="faq-content" style="display: none;">
                                            <?php echo $faq->post_content; ?>
                                    </div>
                                </div><?php
                            endforeach; 
                            wp_reset_postdata(); 
                        endif;
                    }else{
                        $select_tags = $block_fields['select_tags'];
                        $select_faq_categories = $block_fields['select_faq_categories'];
                        $no_of_post = $block_fields['no_of_post'];
                        $array_tax_query = array();
                        if(!empty($select_faq_categories)){
                                $array_tax_query = array( // tax querry for taxonomy,category		          
                                    array(
                                                        'taxonomy' => 'categories',
                                                        'field' => 'term_id',
                                                        'terms' => $select_faq_categories
                                                    ),
                                );
                        }
                        if(!empty($select_tags)){
                                $array_tax_query = array( // tax querry for taxonomy,category
                                    array(
                                        'taxonomy' => 'tags', // category name
                                        'field' => 'term_id', // field type basis
                                        'terms' => $select_tags, // term_id or term_name
                                    ),
                                );
                        }
                        if(!empty($select_tags) && !empty($select_taxonomy))
                        {
                                $array_tax_query = array( // tax querry for taxonomy,category
                                  'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'tags', // category name
                                        'field' => 'term_id', // field type basis
                                        'terms' => $select_tags, // term_id or term_name
                                    ),
                                    array(
                                                        'taxonomy' => 'categories',
                                                        'field' => 'term_id',
                                                        'terms' => $select_faq_categories
                                                    ),
                                );
                        }
                        if(empty($no_of_post)){
                                $no_of_post = "-1";
                        }
                                $args = array(
                                'post_type' => 'faqs', // post type
                                'post_status' => 'publish', // post status
                                'posts_per_page'=> $no_of_post, // how many post we want to display
                                'orderby' => 'menu_order', // orderby like menu_order
                                'order' => 'DESC', // order : ASC DESC
                                'tax_query' => $array_tax_query
                        );
                        $query = new WP_Query($args); 
                         if($query->have_posts()) :  
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="faq">
                                <a href="javascript:void(0)" class=""><?php echo get_the_title(); ?></a>
                                <div class="faq-content" style="display: none;">
                                        <?php echo get_the_content(); ?>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    }
                    ?>
                    
                    
            </div>
            <!-- Faqs Area -->
        </div>
            <?php
        
    else: 
        ?>
<div id="<?php echo $id."-new"; ?>" class="<?php echo $align_class . ' ' . $class_name; ?> glide-block glide-block-faq">
        <section class="s-section <?php if($blok_faq_variation == 'First') { echo "green-container"; } else if($blok_faq_variation == 'Second'){ echo "faq-variation"; } else { echo "faq-variation faq-variation-2"; } ?>">
		<div class="faq-block">
			<div class="wrapper">
				<?php if($blok_faq_headline){ ?>
					<h2><?php echo $blok_faq_headline; ?></h2>
				<?php } ?>
				<div class="faqs-area">
				<?php 
				if($want_to_select_faqs_manually == "1"){
					$select_faqs = $block_fields['select_faqs'];
						if( $select_faqs ): 
							foreach( $select_faqs as $faq ): 
					        // Setup this post for WP functions (variable must be named $post).
					        ?>
					        <div class="faq">
								<a href="javascript:void(0)" class=""><?php echo $faq->post_title; ?></a>
								<div class="faq-content" style="display: none;">
									<?php echo $faq->post_content; ?>
								</div>
							</div><?php
			    			endforeach; 
			    			wp_reset_postdata(); 
			    		endif;
				}else{
					$select_tags = $block_fields['select_tags'];
					$select_faq_categories = $block_fields['select_faq_categories'];
					$no_of_post = $block_fields['no_of_post'];
					$array_tax_query = array();
					if(!empty($select_faq_categories)){
						$array_tax_query = array( // tax querry for taxonomy,category		          
					            array(
								        'taxonomy' => 'categories',
								        'field' => 'term_id',
								        'terms' => $select_faq_categories
								    ),
					        );
					}
					if(!empty($select_tags)){
						$array_tax_query = array( // tax querry for taxonomy,category
					            array(
					                'taxonomy' => 'tags', // category name
					                'field' => 'term_id', // field type basis
					                'terms' => $select_tags, // term_id or term_name
					            ),
					        );
					}
					if(!empty($select_tags) && !empty($select_taxonomy))
					{
						$array_tax_query = array( // tax querry for taxonomy,category
					          'relation' => 'AND',
					            array(
					                'taxonomy' => 'tags', // category name
					                'field' => 'term_id', // field type basis
					                'terms' => $select_tags, // term_id or term_name
					            ),
					            array(
								        'taxonomy' => 'categories',
								        'field' => 'term_id',
								        'terms' => $select_faq_categories
								    ),
					        );
					}
					if(empty($no_of_post)){
						$no_of_post = "-1";
					}
						$args = array(
					        'post_type' => 'faqs', // post type
					        'post_status' => 'publish', // post status
					        'posts_per_page'=> $no_of_post, // how many post we want to display
					        'orderby' => 'menu_order', // orderby like menu_order
					        'order' => 'DESC', // order : ASC DESC
					        'tax_query' => $array_tax_query
				    	);
				    	$query = new WP_Query($args); 
				    	 if($query->have_posts()) :  
            				while ($query->have_posts()) : $query->the_post(); ?>
            					<div class="faq">
								<a href="javascript:void(0)" class=""><?php echo get_the_title(); ?></a>
								<div class="faq-content" style="display: none;">
									<?php echo get_the_content(); ?>
								</div>
							</div>
							<?php
            				endwhile;
            			endif;
				}?>
				</div>
			</div>
			<!-- /.glide-block -->
		</div>
		<!-- /.wrapper -->
	</section>
</div>
        <?php
    endif;
    
}
?>