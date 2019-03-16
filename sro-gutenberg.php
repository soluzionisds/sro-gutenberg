<?php
/*
Plugin Name: sr(o) Gutenberg Blocks
Plugin URI: https://github.com/soluzionisds/sro-gutenberg
Description: The custom Gutenberg blocks of sebastiano.riva (office)
Author: sebastiano.riva (office)
Author URI: http://www.sebastianoriva.com/
Text Domain: sro-gutenberg
Version: 1.0
*/

defined('ABSPATH') || exit;

if ( ! function_exists( 'sro_gutenberg' ) ) {
  function sro_gutenberg() {
    wp_register_script(
      'sro-gutenberg-block-section-backend-script',
      plugins_url( 'block-section/block-section.js', __FILE__ ),
      array( 'wp-blocks', 'wp-i18n', 'wp-element' )
    );
    wp_register_style(
      'sro-gutenberg-block-section-backend-style',
      plugins_url( 'block-section/editor.css', __FILE__ ),
      array( 'wp-edit-blocks' ),
      filemtime( plugin_dir_path( __FILE__ ) . 'block-section/editor.css' )
    );
    wp_register_style(
       'sro-gutenberg-block-section-frontend-style',
       plugins_url( 'block-section/style.css', __FILE__ ),
       array(),
       filemtime( plugin_dir_path( __FILE__ ) . 'block-section/style.css' )
   );
    register_block_type( 'sro-gutenberg/block-section', array(
      'editor_script' => 'sro-gutenberg-block-section-backend-script',
      'editor_style'  => 'sro-gutenberg-block-section-backend-style',
      'style' => 'sro-gutenberg-block-section-frontend-style',
    ));
  }
  add_action( 'init', 'sro_gutenberg' );
}

/*if ( ! function_exists( 'sro_gutenberg_frontend' ) ) {
  function sro_gutenberg_frontend() {
  	wp_enqueue_style(
  		'sro-gutenberg-block-section-frontend-style',
  		plugins_url( 'block-section/style.css', __FILE__ ),
  		array( 'wp-blocks' ),
  		filemtime( plugin_dir_path( __FILE__ ) . 'block-section/style.css' )
  	);
  }
  add_action( 'enqueue_block_assets', 'sro_gutenberg_frontend' );
}*/

/*function loadMyBlockFiles() {
  wp_enqueue_script(
    'my-super-unique-handle',
    plugin_dir_url(__FILE__) . 'my-block.js',
    array('wp-blocks', 'wp-i18n', 'wp-editor'),
    true
  );
}

add_action('enqueue_block_editor_assets', 'loadMyBlockFiles');*/
