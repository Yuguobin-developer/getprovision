<?php
/**
 * Functions for custom Gutenberg blocks
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Redica
 * @since 1.0.0
 */

/**
 * Register custom Gutenberg blocks category
 */
function acf_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'glide-blocks',
				'title' => __( 'Redica Blocks', 'provision_td' ),
				'icon'  => 'admin-generic',
			),
		)
	);
}
add_filter( 'block_categories', 'acf_block_categories', 10, 2 );


/**
 * Register custom Gutenberg blocks
 */
add_action( 'acf/init', 'theme_acf_init' );
function theme_acf_init() {

	if ( function_exists( 'acf_register_block' ) ) {

		// Icon List w/ Description  - Block
		acf_register_block(
			array(
				'name'            => 'icon-list-description',
				'title'           => __( 'Icon List w/ Description ', 'provision_td' ),
				'description'     => __( 'A custom icon list w/ description  block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Icon List  - Block
		acf_register_block(
			array(
				'name'            => 'icon-list',
				'title'           => __( 'Icon List ', 'provision_td' ),
				'description'     => __( 'A custom Icon List  block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Mid Page CTA w/ Steps  - Block
		acf_register_block(
			array(
				'name'            => 'midpage-cta-steps',
				'title'           => __( 'Mid Page CTA w/ Steps ', 'provision_td' ),
				'description'     => __( 'A custom Mid Page CTA w/ Steps  block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Mid Page CTA w/ Image  - Block
		acf_register_block(
			array(
				'name'            => 'midpage-cta-image',
				'title'           => __( 'Mid Page CTA w/ Image ', 'provision_td' ),
				'description'     => __( 'A custom Mid Page CTA w/ Image  block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// State CTA  - Block
		acf_register_block(
			array(
				'name'            => 'state-cta',
				'title'           => __( 'State CTA ', 'provision_td' ),
				'description'     => __( 'A custom State CTA  block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Image Alongside Text  - Block
		acf_register_block(
			array(
				'name'            => 'image-alongside-text',
				'title'           => __( 'Image Alongside Text ', 'provision_td' ),
				'description'     => __( 'A custom image alongside text block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Energy Choice CTA  - Block
		acf_register_block(
			array(
				'name'            => 'energy-choice-cta',
				'title'           => __( 'Energy Choice CTA ', 'provision_td' ),
				'description'     => __( 'A custom Energy Choice CTA block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Lead Paragraph  - Block
		acf_register_block(
			array(
				'name'            => 'lead-paragraph',
				'title'           => __( 'Lead Paragraph ', 'provision_td' ),
				'description'     => __( 'A custom Lead Paragraph block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// How it Works  - Block
		acf_register_block(
			array(
				'name'            => 'how-it-works',
				'title'           => __( 'How it Works ', 'provision_td' ),
				'description'     => __( 'A custom How it Works block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Energy Choice Options  - Block
		acf_register_block(
			array(
				'name'            => 'energy-choice-options',
				'title'           => __( 'Energy Choice Options ', 'provision_td' ),
				'description'     => __( 'A custom Energy Choice Options block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// FAQ  - Block
		acf_register_block(
			array(
				'name'            => 'faq',
				'title'           => __( 'FAQ ', 'provision_td' ),
				'description'     => __( 'A custom FAQ block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Comparison Table  - Block
		acf_register_block(
			array(
				'name'            => 'comparison-table',
				'title'           => __( 'Comparison Table ', 'provision_td' ),
				'description'     => __( 'A custom Comparison Table block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Intro with Columns  - Block
		acf_register_block(
			array(
				'name'            => 'intro-with-columns',
				'title'           => __( 'Intro with Columns ', 'provision_td' ),
				'description'     => __( 'A custom Intro with Columns block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Partner List  - Block
		acf_register_block(
			array(
				'name'            => 'partner-list',
				'title'           => __( 'Partner List ', 'provision_td' ),
				'description'     => __( 'A custom Partner List block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Team Members  - Block
		acf_register_block(
			array(
				'name'            => 'team',
				'title'           => __( 'Team Members ', 'provision_td' ),
				'description'     => __( 'A custom Team Members block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Block Quote  - Block
		acf_register_block(
			array(
				'name'            => 'block-quote',
				'title'           => __( 'Block Quote ', 'provision_td' ),
				'description'     => __( 'A custom Block Quote block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Multiple Reviews  - Block
		acf_register_block(
			array(
				'name'            => 'multiple-reviews',
				'title'           => __( 'Multiple Reviews ', 'provision_td' ),
				'description'     => __( 'A custom Multiple Reviews block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Logo List  - Block
		acf_register_block(
			array(
				'name'            => 'logo-list',
				'title'           => __( 'Logo List ', 'provision_td' ),
				'description'     => __( 'A custom Logo List block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Video  - Block
		acf_register_block(
			array(
				'name'            => 'video',
				'title'           => __( 'Video ', 'provision_td' ),
				'description'     => __( 'A custom Video block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Switching Steps  - Block
		acf_register_block(
			array(
				'name'            => 'switching-steps',
				'title'           => __( 'Switching Steps ', 'provision_td' ),
				'description'     => __( 'A custom Switching Steps block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Form  - Block
		acf_register_block(
			array(
				'name'            => 'form',
				'title'           => __( 'Form ', 'provision_td' ),
				'description'     => __( 'A custom Form block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Contact Info  - Block
		acf_register_block(
			array(
				'name'            => 'contact-info',
				'title'           => __( 'Contact Info ', 'provision_td' ),
				'description'     => __( 'A custom Contact Info block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		acf_register_block(
			array(
				'name'            => 'contact-details',
				'title'           => __( 'Contact Details ', 'provision_td' ),
				'description'     => __( 'A custom Contact Details block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		
		// button  - Block
		acf_register_block(
			array(
				'name'            => 'button',
				'title'           => __( 'Button ', 'provision_td' ),
				'description'     => __( 'A custom button block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// spacer  - Block
		acf_register_block(
			array(
				'name'            => 'spacer',
				'title'           => __( 'Spacer ', 'provision_td' ),
				'description'     => __( 'A custom spacer block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Graphic w/ Toggle  - Block
		acf_register_block(
			array(
				'name'            => 'graphic-with-toggle',
				'title'           => __( 'Graphic w/ Toggle ', 'provision_td' ),
				'description'     => __( 'A custom Graphic w/ Toggle block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Utility Partners  - Block
		acf_register_block(
			array(
				'name'            => 'utility-partners',
				'title'           => __( 'Utility Partners ', 'provision_td' ),
				'description'     => __( 'A custom Utility Partners block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Bullet List  - Block
		acf_register_block(
			array(
				'name'            => 'bullet-list',
				'title'           => __( 'Bullet List ', 'provision_td' ),
				'description'     => __( 'A custom Bullet List block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Features List  - Block
		acf_register_block(
			array(
				'name'            => 'features-list',
				'title'           => __( 'Features List ', 'provision_td' ),
				'description'     => __( 'A custom Features List block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// Zipcode List  - Block
		acf_register_block(
			array(
				'name'            => 'zipcode-list',
				'title'           => __( 'Zipcode List ', 'provision_td' ),
				'description'     => __( 'A custom Zipcode List block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// City List  - Block
		acf_register_block(
			array(
				'name'            => 'city-list',
				'title'           => __( 'City List ', 'provision_td' ),
				'description'     => __( 'A custom City List block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);
		// State CTA Small  - Block
		acf_register_block(
			array(
				'name'            => 'state-cta-small',
				'title'           => __( 'State CTA Small ', 'provision_td' ),
				'description'     => __( 'A custom State CTA Small block.', 'provision_td' ),
				'render_callback' => 'acf_block_render_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'excerpt-view',
				'mode'            => 'edit',
				'keywords'        => array( 'icons', 'numbers' ),
			)
		);

	}
}

/**
 * Reder custom Gutenberg blocks
 */
function acf_block_render_callback( $block ) {

	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace( 'acf/', '', $block['name'] );

	// include a template part from within the blocks folder
	if ( file_exists( get_theme_file_path( "/blocks/block-{$slug}.php" ) ) ) {
		include get_theme_file_path( "/blocks/block-{$slug}.php" );
	}
}
