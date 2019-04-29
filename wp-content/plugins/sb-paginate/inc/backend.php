<?php
function hocwp_pagination_admin_menu() {
	add_options_page( __( 'Pagination by HocWP Team', 'hocwp-pagination' ), __( 'Pagination', 'hocwp-pagination' ), 'manage_options', 'hocwp_pagination', 'hocwp_pagination_admin_settings_page_callback' );
}

add_action( 'admin_menu', 'hocwp_pagination_admin_menu' );

function hocwp_pagination_admin_settings_page_callback() {
	include HOCWP_PAGINATION_PATH . '/inc/admin-settings-page.php';
}

function hocwp_pagination_add_settings_field( $id, $title, $callback, $section = 'default' ) {
	add_settings_field( $id, $title, $callback, 'hocwp_pagination', $section, array( 'label_for' => 'hocwp_pagination_' . $id ) );
}

function hocwp_pagination_admin_init() {
	register_setting( 'hocwp_pagination', 'hocwp_pagination', 'hocwp_pagination_admin_settings_page_sanitize_callback' );
	hocwp_pagination_add_settings_field( 'label', __( 'Label', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_label_callback' );
	hocwp_pagination_add_settings_field( 'show_all', __( 'Show All', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_show_all_callback' );
	hocwp_pagination_add_settings_field( 'end_size', __( 'End Size', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_end_size_callback' );
	hocwp_pagination_add_settings_field( 'mid_size', __( 'Mid Size', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_mid_size_callback' );
	hocwp_pagination_add_settings_field( 'dynamic_size', __( 'Dynamic Size', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_dynamic_size_callback' );
	hocwp_pagination_add_settings_field( 'prev_next', __( 'Prev Next', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_prev_next_callback' );
	hocwp_pagination_add_settings_field( 'prev_text', __( 'Prev Text', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_prev_text_callback' );
	hocwp_pagination_add_settings_field( 'next_text', __( 'Next Text', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_next_text_callback' );
	hocwp_pagination_add_settings_field( 'first_last', __( 'First Last', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_first_last_callback' );
	hocwp_pagination_add_settings_field( 'first_text', __( 'First Text', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_first_text_callback' );
	hocwp_pagination_add_settings_field( 'last_text', __( 'Last Text', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_last_text_callback' );
	hocwp_pagination_add_settings_field( 'current_total', __( 'Current Total', 'hocwp-pagination' ), 'hocwp_pagination_admin_setting_field_current_total_callback' );
}

add_action( 'admin_init', 'hocwp_pagination_admin_init' );

function hocwp_pagination_admin_settings_page_sanitize_callback( $input ) {
	return $input;
}

function hocwp_pagination_admin_setting_field_label_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['label'] ) ? $options['label'] : '';
	?>
	<label for="hocwp_pagination_label">
		<input name="hocwp_pagination[label]" id="hocwp_pagination_label" value="<?php echo esc_attr( $value ); ?>"
		       class="regular-text" type="text">
	</label>
	<?php
}

function hocwp_pagination_admin_setting_field_show_all_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['show_all'] ) ? $options['show_all'] : '';
	?>
	<label for="hocwp_pagination_show_all">
		<input name="hocwp_pagination[show_all]" id="hocwp_pagination_show_all" value="1"
		       type="checkbox" <?php checked( 1, $value ); ?>> <?php _e( 'Show all of the pages instead of a short list of the pages near the current page', 'hocwp-pagination' ); ?>
	</label>
	<?php
}

function hocwp_pagination_admin_setting_field_end_size_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['end_size'] ) ? $options['end_size'] : '';
	?>
	<label for="hocwp_pagination_end_size">
		<input name="hocwp_pagination[end_size]" id="hocwp_pagination_end_size"
		       value="<?php echo esc_attr( $value ); ?>"
		       class="small-text" type="number" min="0">
	</label>
	<p class="description"><?php _e( 'How many numbers on either the start and the end list edges.', 'hocwp-pagination' ); ?></p>
	<?php
}

function hocwp_pagination_admin_setting_field_mid_size_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['mid_size'] ) ? $options['mid_size'] : '';
	?>
	<label for="hocwp_pagination_mid_size">
		<input name="hocwp_pagination[mid_size]" id="hocwp_pagination_mid_size"
		       value="<?php echo esc_attr( $value ); ?>"
		       class="small-text" type="number" min="1">
	</label>
	<p class="description"><?php _e( 'How many numbers to either side of current page, but not including current page.', 'hocwp-pagination' ); ?></p>
	<?php
}

function hocwp_pagination_admin_setting_field_dynamic_size_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['dynamic_size'] ) ? $options['dynamic_size'] : '';
	?>
	<label for="hocwp_pagination_dynamic_size">
		<input name="hocwp_pagination[dynamic_size]" id="hocwp_pagination_dynamic_size" value="1"
		       type="checkbox" <?php checked( 1, $value ); ?>> <?php _e( 'Display page items automatically', 'hocwp-pagination' ); ?>
	</label>
	<?php
}

function hocwp_pagination_admin_setting_field_prev_next_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['prev_next'] ) ? $options['prev_next'] : '';
	?>
	<label for="hocwp_pagination_prev_next">
		<input name="hocwp_pagination[prev_next]" id="hocwp_pagination_prev_next" value="1"
		       type="checkbox" <?php checked( 1, $value ); ?>> <?php _e( 'Whether to include the previous and next links in the list or not', 'hocwp-pagination' ); ?>
	</label>
	<?php
}

function hocwp_pagination_admin_setting_field_prev_text_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['prev_text'] ) ? $options['prev_text'] : '';
	?>
	<label for="hocwp_pagination_prev_text">
		<input name="hocwp_pagination[prev_text]" id="hocwp_pagination_prev_text" value="<?php echo esc_attr( $value ); ?>"
		       class="regular-text" type="text">
	</label>
	<?php
}

function hocwp_pagination_admin_setting_field_next_text_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['next_text'] ) ? $options['next_text'] : '';
	?>
	<label for="hocwp_pagination_next_text">
		<input name="hocwp_pagination[next_text]" id="hocwp_pagination_next_text" value="<?php echo esc_attr( $value ); ?>"
		       class="regular-text" type="text">
	</label>
	<?php
}

function hocwp_pagination_admin_setting_field_first_last_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['first_last'] ) ? $options['first_last'] : '';
	?>
	<label for="hocwp_pagination_first_last">
		<input name="hocwp_pagination[first_last]" id="hocwp_pagination_first_last" value="1"
		       type="checkbox" <?php checked( 1, $value ); ?>> <?php _e( 'Whether to include the first and last links in the list or not', 'hocwp-pagination' ); ?>
	</label>
	<?php
}

function hocwp_pagination_admin_setting_field_first_text_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['first_text'] ) ? $options['first_text'] : '';
	?>
	<label for="hocwp_pagination_first_text">
		<input name="hocwp_pagination[first_text]" id="hocwp_pagination_first_text" value="<?php echo esc_attr( $value ); ?>"
		       class="regular-text" type="text">
	</label>
	<?php
}

function hocwp_pagination_admin_setting_field_last_text_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['last_text'] ) ? $options['last_text'] : '';
	?>
	<label for="hocwp_pagination_last_text">
		<input name="hocwp_pagination[last_text]" id="hocwp_pagination_last_text" value="<?php echo esc_attr( $value ); ?>"
		       class="regular-text" type="text">
	</label>
	<?php
}

function hocwp_pagination_admin_setting_field_current_total_callback() {
	$options = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;
	$value   = isset( $options['current_total'] ) ? $options['current_total'] : '';
	?>
	<label for="hocwp_pagination_current_total">
		<input name="hocwp_pagination[current_total]" id="hocwp_pagination_current_total" value="<?php echo esc_attr( $value ); ?>"
		       class="regular-text" type="text">
	</label>
	<p class="description"><?php _e( 'Show current page of total pages. You can use tag [CURRENT] and [TOTAL] in this field.', 'hocwp-pagination' ); ?></p>
	<?php
}