<?php
if ( ! function_exists( 'hocwp_plugin_debug' ) ) {
	function hocwp_plugin_debug( $value ) {
		if ( is_array( $value ) || is_object( $value ) ) {
			error_log( print_r( $value, true ) );
		} else {
			error_log( $value );
		}
	}
}