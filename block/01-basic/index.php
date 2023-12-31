<?php
/**
 * BLOCK: Basic
 *
 * Gutenberg Custom Block assets.
 *
 * @since   1.0.0
 * @package GB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'gb_block_01_basic_editor_assets' );

/**
 * Enqueue the block's assets for the editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 */
function gb_block_01_basic_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'gb-block-01-basic', // Handle.
		plugins_url( 'block.js', __FILE__ ), // Block.js: We register the block here.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
	);

	// Styles.
	wp_enqueue_style(
		'gb-block-01-basic-editor', // Handle.
		plugins_url( 'editor.css', __FILE__ ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	);
} // End function gb_block_01_basic_editor_assets().


// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'gb_block_01_basic_block_assets' );

/**
 * Enqueue the block's assets for the frontend.
 *
 * @since 1.0.0
 */
function gb_block_01_basic_block_assets() {
	// Styles.
	wp_enqueue_style(
		'gb-block-01-basic-frontend', // Handle.
		plugins_url( 'style.css', __FILE__ ), // Block frontend CSS.
		array( 'wp-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	);

	wp_enqueue_style(
		'gb-block-01-basic-frontend-2', // Handle.
		site_url() . '/wp-content/plugins/Gutenberg-Boilerplate-master/libs/threejs-starter/dist/index.b17e59d1.css', // Block.js: We register the block here.
		null, // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	);

} // End function gb_block_01_basic_block_assets().



function script_footer() { 
	?>
	<script src="<?php echo site_url() . '/wp-content/plugins/Gutenberg-Boilerplate-master/libs/threejs-starter/dist/index.e988342d.js'; ?> "></script>
	<script src="<?php echo site_url() . '/wp-content/plugins/Gutenberg-Boilerplate-master/libs/threejs-starter/dist/index.3213d814.js'; ?> "></script>
	<?php 
} 
add_action('wp_footer', 'script_footer');
