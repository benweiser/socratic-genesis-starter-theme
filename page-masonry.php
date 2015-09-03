<?php

/*
	Template Name: Posts in Masonry Grid
*/

/*
 * @author  Sridhar Katakam
 * @link    http://sridharkatakam.com/genesis-page-template-displaying-posts-masonry/
 */

# Force full width content
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

# Reposition the breadcrumb
// remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
// add_action( 'genesis_before_content', 'genesis_do_breadcrumbs' );

//* Enqueue Masonry
wp_enqueue_script( 'masonry' );

//* Initialize Masonry
wp_enqueue_script( 'masonry-init', get_bloginfo( 'stylesheet_directory' ) . '/js/masonry-init.js', '', '', true );

//* Load the jQuery for placing archive pagination below the Posts list
wp_enqueue_script( 'reposition-pagination', get_bloginfo( 'stylesheet_directory' ) . '/js/reposition-pagination.js', array( 'jquery' ), '1.0.0', true );

//* Add custom body class to the head
add_filter( 'body_class', 'sk_body_class' );
function sk_body_class( $classes ) {

	$classes[] = 'masonry-page';
	return $classes;

}

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'sk_masonry_loop' );
/**
 * Outputs a custom loop
 *
 * @global mixed $paged current page number if paginated
 * @return void
 */
function sk_masonry_loop() {

	$include = genesis_get_option( 'blog_cat' );
	$exclude = genesis_get_option( 'blog_cat_exclude' ) ? explode( ',', str_replace( ' ', '', genesis_get_option( 'blog_cat_exclude' ) ) ) : '';
	$paged   = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	//* Easter Egg
	$query_args = wp_parse_args(
		genesis_get_custom_field( 'query_args' ),
		array(
			'cat'              => $include,
			'category__not_in' => $exclude,
			'showposts'        => genesis_get_option( 'blog_cat_num' ),
			'paged'            => $paged,
		)
	);

	genesis_custom_loop( $query_args );
}

//* Force Content Limit regardless of Content Archive theme settings
add_filter( 'genesis_pre_get_option_content_archive', 'sk_show_full_content' );
add_filter( 'genesis_pre_get_option_content_archive_limit', 'sk_content_limit' );

function sk_show_full_content() {
	return 'full';
}

function sk_content_limit() {
	return '100'; // Limit content to 100 characters
}

//* Remove author and comment link in entry header's entry meta
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter($post_info) {

	$post_info = '[post_date] [post_edit]';
	return $post_info;

}

//* Display Featured image linking to entry
add_action( 'genesis_entry_header', 'sk_image', 2 );
function sk_image() {
	$image_args = array(
		'size' => 'masonry-thumb'
	);

	// Get the featured image HTML
	$image = genesis_get_image( $image_args );

	echo '<a rel="bookmark" href="'. get_permalink() .'">'. $image .'</a>';

}

//* Remove the entry meta in the entry footer (requires HTML5 theme support)
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_before_post_content', 'genesis_post_info' );
genesis();