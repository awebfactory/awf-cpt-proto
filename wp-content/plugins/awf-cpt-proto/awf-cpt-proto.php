<?php
/**
 * Plugin Name:       Awf Cpt Proto
 * Description:       A custom block for editing and rendering a cpt and its fields stored as post meta.
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
  register_block_type( __DIR__ . '/build' );
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
  register_post_meta(
    'project',
    'description',
    array(
      'show_in_rest'       => true,
      'single'             => true,
      'type'               => 'string',
      'sanitize_callback'  => 'wp_kses_post',
    )
  );
}
add_action( 'init', 'awebfactory_awf_cpt_proto_block_init' );

