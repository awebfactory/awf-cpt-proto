<?php

/*	-----------------------------------------------------------------------------------------------
	THEME SUPPORTS
--------------------------------------------------------------------------------------------------- */

function awforgtheme_setup() {
	add_theme_support( 'wp-block-styles' );
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'awforgtheme_setup' );


/*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLESHEETS
--------------------------------------------------------------------------------------------------- */

function awforgtheme_styles() {
	wp_enqueue_style( 'awforgtheme-styles', get_theme_file_uri( '/style.css' ), array(), wp_get_theme( 'awforgtheme' )->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'awforgtheme_styles' );


/*	-----------------------------------------------------------------------------------------------
	BLOCK PATTERNS
	Register theme specific block pattern categories. The patterns themselves are stored in /patterns/.
--------------------------------------------------------------------------------------------------- */

function awforgtheme_register_block_patterns() {

	// The block pattern categories included in AwfOrgTheme.
	$awforgtheme_block_pattern_categories = apply_filters( 'awforgtheme_block_pattern_categories', array(
		'awforgtheme'  => array(
			'label'			=> esc_html__( 'AwfOrgTheme - All', 'awforgtheme' ),
		),
		'awforgtheme-blog'  => array(
			'label'			=> esc_html__( 'AwfOrgTheme - Blog', 'awforgtheme' ),
		),
		'awforgtheme-cta'  => array(
			'label'			=> esc_html__( 'AwfOrgTheme - Call to Action', 'awforgtheme' ),
		),
		'awforgtheme-general' => array(
			'label'			=> esc_html__( 'AwfOrgTheme - General', 'awforgtheme' ),
		),
		'awforgtheme-hero' => array(
			'label'			=> esc_html__( 'AwfOrgTheme - Hero', 'awforgtheme' ),
		),
		'awforgtheme-media' => array(
			'label'			=> esc_html__( 'AwfOrgTheme - Media', 'awforgtheme' ),
		),
		'awforgtheme-page' => array(
			'label'			=> esc_html__( 'AwfOrgTheme - Page Layouts', 'awforgtheme' ),
		),
	) );

	// Sort the block pattern categories alphabetically based on the label value, to ensure alphabetized order when the strings are localized.
	uasort( $awforgtheme_block_pattern_categories, function( $a, $b ) { 
		return strcmp( $a["label"], $b["label"] ); }
	);

	// Register block pattern categories.
	foreach ( $awforgtheme_block_pattern_categories as $slug => $settings ) {
		register_block_pattern_category( $slug, $settings );
	}

}
add_action( 'init', 'awforgtheme_register_block_patterns' );


/*	-----------------------------------------------------------------------------------------------
	FILTER COMMENT FORM DEFAULTS
	Modify the heading and title of the comments form.
--------------------------------------------------------------------------------------------------- */

function awforgtheme_comment_form_defaults( $defaults ) {
	return array_merge( $defaults, array(
		'title_reply_before' 	=> '<h2 id="reply-title" class="comment-reply-title">',
		'title_reply_after' 	=> '</h2>',
		'title_reply' 			=> __( 'Reply', 'awforgtheme' )
	) );
}
add_filter( 'comment_form_defaults', 'awforgtheme_comment_form_defaults' );


/*	-----------------------------------------------------------------------------------------------
	BLOCK STYLES
	Register theme specific block styles.
--------------------------------------------------------------------------------------------------- */

function awforgtheme_register_block_styles() {

	// Column: -90° Contents On Desktop
	register_block_style( 'core/column', array(
		'name'  	=> 'awforgtheme-minus-90-deg-column-content-desktop',
		'label' 	=> esc_html__( '-90° Contents On Desktop', 'awforgtheme' ),
	) );

	// Cover: Background Blur
	register_block_style( 'core/cover', array(
		'name'  	=> 'awforgtheme-bg-blur',
		'label' 	=> esc_html__( 'Overlay Blur', 'awforgtheme' ),
	) );

	// Featured Image: Ratio: 1/1
	register_block_style( 'core/post-featured-image', array(
		'name'  	=> 'awforgtheme-ar-1x1',
		'label' 	=> esc_html__( 'Ratio: 1/1', 'awforgtheme' ),
	) );

	// Featured Image: Ratio: 4/3
	register_block_style( 'core/post-featured-image', array(
		'name'  	=> 'awforgtheme-ar-4x3',
		'label' 	=> esc_html__( 'Ratio: 4/3', 'awforgtheme' ),
	) );

	// Heading, Paragraph: Tabular Numerals
	foreach( array( 'core/heading', 'core/paragraph' ) as $block_name ) {
		register_block_style( $block_name, array(
			'name'  	=> 'awforgtheme-tabular-nums',
			'label' 	=> esc_html__( 'Tabular Numerals', 'awforgtheme' ),
		) );
	}

	// Post Comments Form: Rotated Title to the Right on Desktop
	register_block_style( 'core/post-comments-form', array(
		'name'  	=> 'awforgtheme-rotated-title',
		'label' 	=> esc_html__( 'Rotated Title to the Right on Desktop', 'awforgtheme' ),
	) );

	// Term: Buttons
	register_block_style( 'core/post-terms', array(
		'name'  	=> 'awforgtheme-terms-buttons',
		'label' 	=> esc_html__( 'Buttons', 'awforgtheme' ),
	) );

}
add_action( 'init', 'awforgtheme_register_block_styles' );
