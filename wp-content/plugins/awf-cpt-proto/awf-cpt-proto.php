<?php
/**
 * Plugin Name:       Awf Cpt Proto
 * Description:       Custom blocks for editing and rendering in varioius ways a CPT and its fields stored as post meta.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       awf-cpt-proto
 *
 * @package           awebfactory
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function awebfactory_awf_cpt_proto_block_init() {
  register_block_type( __DIR__ . '/build/blocks/meta-fields-editor' );
  register_block_type( __DIR__ . '/build/blocks/render-single-meta-field' );
  register_post_type(
    'project',
    array(
      'labels'       => array(
        'name'          => __( 'Projects', 'tutorial' ),
        'singular_name' => __( 'Project', 'tutorial' ),
      ),
      'public'       => true,
			'menu_icon'    => 'dashicons-schedule',
      'has_archive'  => true,
      'show_in_rest' => true,
      'supports'     => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
      ),
    )
  );

  $metafields = [ 'awebfactory_project_short_name', 'awebfactory_project_description', 'awebfactory_project_start_date', 'awebfactory_project_completion_date' ];

  foreach( $metafields as $metafield ){
    // Pass an empty string to register the meta key across all existing post types.
    register_post_meta( '', $metafield, array(
      'show_in_rest' => true,
      'type' => 'string',
      'single' => true,
      'sanitize_callback' => 'wp_kses_post',
      'auth_callback' => function() { 
        return current_user_can( 'edit_posts' );
      }
    ));
  }  
}
add_action( 'init', 'awebfactory_awf_cpt_proto_block_init' );
