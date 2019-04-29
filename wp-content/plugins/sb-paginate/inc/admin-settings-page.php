<div class="wrap">
	<h1><?php _e( 'Pagination Settings', 'hocwp-pagination' ); ?></h1>

	<form method="post" action="options.php" novalidate="novalidate" autocomplete="off">
		<?php settings_fields( 'hocwp_pagination' ); ?>
		<table class="form-table">
			<?php do_settings_fields( 'hocwp_pagination', 'default' ); ?>
		</table>
		<?php submit_button(); ?>
	</form>
</div>