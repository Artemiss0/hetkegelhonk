<?php
function hocwp_pagination_get_paged() {
	return ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
}

function hocwp_pagination( $args = array() ) {
	$defaults = $GLOBALS['hocwp_plugins'][ HOCWP_PAGINATION_BASENAME ]->options;

	$defaults['query'] = $GLOBALS['wp_query'];

	$args  = wp_parse_args( $args, $defaults );
	$query = $args['query'];
	$total = absint( $query->max_num_pages );

	if ( 2 > $total ) {
		return;
	}

	$big     = 999999999;
	$paged   = hocwp_pagination_get_paged();
	$current = max( 1, $paged );

	$pla = array(
		'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'  => '?paged=%#%',
		'current' => $current,
		'total'   => $total,
		'type'    => 'array'
	);

	$args = wp_parse_args( $args, $pla );
	$next = isset( $args['next'] ) ? $args['next'] : isset( $args['next_text'] ) ? $args['next_text'] : '';
	$prev = isset( $args['prev'] ) ? $args['prev'] : isset( $args['prev_text'] ) ? $args['prev_text'] : '';

	if ( ! empty( $next ) || ! empty( $prev ) ) {
		$args['prev_next'] = true;
		if ( is_string( $next ) && ! empty( $next ) ) {
			$args['next_text'] = $next;
		}
		if ( is_string( $prev ) && ! empty( $prev ) ) {
			$args['prev_text'] = $prev;
		}
	}
	if ( empty( $next ) && empty( $prev ) ) {
		$args['prev_next'] = false;
	}

	$dynamic_size = $args['dynamic_size'];

	if ( 1 == $dynamic_size ) {
		$show_all = $args['show_all'];
		if ( 1 != $show_all ) {
			$count = 0;
			$label = $args['label'];
			if ( ! empty( $label ) ) {
				$count ++;
			}
			$end_size = absint( $args['end_size'] );
			$count += $end_size;
			$mid_size = absint( $args['mid_size'] );
			$count += $mid_size;
			$prev_next = $args['prev_next'];
			if ( 1 == $prev_next ) {
				$prev_text = $args['prev_text'];
				if ( ! empty( $prev_text ) ) {
					$count ++;
				}
				$next_text = $args['next_text'];
				if ( ! empty( $next_text ) ) {
					$count ++;
				}
			}
			$first_last = $args['first_last'];
			if ( 1 == $first_last ) {
				$first_text = $args['first_text'];
				if ( ! empty( $first_text ) ) {
					$count ++;
				}
				$last_text = $args['last_text'];
				if ( ! empty( $last_text ) ) {
					$count ++;
				}
			}
			$current_total = $args['current_total'];
			if ( ! empty( $current_total ) ) {
				$count ++;
			}
			if ( 1 == $paged && 11 > $count ) {
				$end_size += ( 11 - $count );
			} elseif ( 3 < $paged && 7 < $count && $paged < $total ) {
				$mid_size = 0;
			} elseif ( $paged == $total && 11 > $count ) {
				$end_size += ( 11 - $count - 1 );
			}
			$args['end_size'] = $end_size;
			$args['mid_size'] = $mid_size;
		}
	}

	$items = paginate_links( $args );
	if ( is_array( $items ) && count( $items ) > 0 ) {
		$first_last = isset( $args['first_last'] ) ? (bool) $args['first_last'] : false;
		echo '<ul class="pagination hocwp-pagination">';
		if ( isset( $args['label'] ) && ! empty( $args['label'] ) ) {
			echo '<li class="label-item page-item"><span class="page-numbers label">' . $args['label'] . '</span></li>';
		}
		if ( $first_last ) {
			$first = isset( $args['first'] ) ? $args['first'] : isset( $args['first_text'] ) ? $args['first_text'] : '';
			if ( ! empty( $first ) && 2 < $current ) {
				if ( true === $first ) {
					$first = __( 'First', 'hocwp-pagination' );
				}
				$url = get_pagenum_link( 1 );
				echo '<li class="page-item"><a class="first page-numbers" href="' . esc_url( $url ) . '">' . $first . '</a></li>';
			}
		}
		foreach ( $items as $item ) {
			echo '<li class="page-item">' . $item . '</li>';
		}
		if ( $first_last ) {
			$last = isset( $args['last'] ) ? $args['last'] : isset( $args['last_text'] ) ? $args['last_text'] : '';
			if ( ! empty( $last ) && $current < ( $total - 1 ) ) {
				if ( true === $last ) {
					$last = __( 'Last', 'hocwp-pagination' );
				}
				$url = get_pagenum_link( $total );
				echo '<li class="page-item"><a class="last page-numbers" href="' . esc_url( $url ) . '">' . $last . '</a></li>';
			}
		}
		$current_total = isset( $args['current_total'] ) ? $args['current_total'] : false;
		if ( $current_total ) {
			if ( ! is_string( $current_total ) || ( false === strpos( $current_total, '[CURRENT]' ) && false === strpos( $current_total, '[TOTAL]' ) ) ) {
				$current_total = __( 'Page [CURRENT]/[TOTAL]', 'hocwp-pagination' );
			}
			$search = array(
				'[CURRENT]',
				'[TOTAL]'
			);

			$replace = array(
				$paged,
				$query->max_num_pages
			);

			$current_total = str_replace( $search, $replace, $current_total );
			?>
			<li class="page-item current-total">
				<a class="page-numbers" href="javascript:" title=""><?php echo $current_total; ?></a>
			</li>
			<?php
		}
		echo '</ul>';
	}
}

function sb_paginate( $args = array() ) {
	hocwp_pagination( $args );
}

function hocwp_pagination_shortcode( $atts, $content = '' ) {
	$atts = shortcode_atts( array(
		'label' => ''
	), $atts, 'hocwp_pagination' );
	ob_start();
	hocwp_pagination( $atts );
	$html = ob_get_clean();

	return $html;
}

add_shortcode( 'hocwp_pagination', 'hocwp_pagination_shortcode' );

function hocwp_pagination_wp_enqueue_scripts() {
	wp_enqueue_style( 'hocwp-pagination-style', HOCWP_PAGINATION_URL . '/css/style.css' );
}

add_action( 'wp_enqueue_scripts', 'hocwp_pagination_wp_enqueue_scripts' );