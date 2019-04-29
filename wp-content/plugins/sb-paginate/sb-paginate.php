<?php
/*
Plugin Name: Pagination by HocWP Team
Plugin URI: http://hocwp.net/project/
Description: Pagination by HocWP is a pagination plugin that allows to set up navigation on WordPress site. Pagination by HocWP not only supports the default query but also it can be used to show navigation for the custom query on WordPress.
Author: HocWP Team
Version: 2.0.1
Author URI: http://hocwp.net/
Text Domain: hocwp-pagination
Domain Path: /languages/
*/

define( 'HOCWP_PAGINATION_FILE', __FILE__ );
define( 'HOCWP_PAGINATION_PATH', dirname( HOCWP_PAGINATION_FILE ) );
define( 'HOCWP_PAGINATION_URL', plugins_url( '', HOCWP_PAGINATION_FILE ) );
define( 'HOCWP_PAGINATION_BASENAME', plugin_basename( HOCWP_PAGINATION_FILE ) );

global $hocwp_plugins;

if ( ! is_array( $hocwp_plugins ) ) {
	$hocwp_plugins = array();
}
$hocwp_plugins[ HOCWP_PAGINATION_BASENAME ] = new stdClass();

$defaults = array(
	'label'         => '',
	'show_all'      => 0,
	'end_size'      => 1,
	'mid_size'      => 2,
	'prev_next'     => 1,
	'dynamic_size'  => 0,
	'prev_text'     => __( 'Previous', 'hocwp-pagination' ),
	'next_text'     => __( 'Next', 'hocwp-pagination' ),
	'first_last'    => 0,
	'first_text'    => __( 'First', 'hocwp-pagination' ),
	'last_text'     => __( 'Last', 'hocwp-pagination' ),
	'current_total' => ''
);

$options = get_option( 'hocwp_pagination' );

$options = wp_parse_args( $options, $defaults );

$hocwp_plugins[ HOCWP_PAGINATION_BASENAME ]->options = $options;

require HOCWP_PAGINATION_PATH . '/inc/functions.php';
require HOCWP_PAGINATION_PATH . '/inc/global.php';

if ( is_admin() ) {
	require HOCWP_PAGINATION_PATH . '/inc/backend.php';
} else {
	require HOCWP_PAGINATION_PATH . '/inc/frontend.php';
}