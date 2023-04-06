<?php
/**
 * Plugin Name:       Multi-dyanamic example
 * Description:       Multiple dynamic blocks
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            victorkane
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       multi-dynamic-example
 * Domain Path:       awebfactory
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
function awebfactory_multi_dynamic_example_block_init() {
	register_block_type( __DIR__ . '/build/block-1' );
	register_block_type( __DIR__ . '/build/block-2' );
}
add_action( 'init', 'awebfactory_multi_dynamic_example_block_init' );
