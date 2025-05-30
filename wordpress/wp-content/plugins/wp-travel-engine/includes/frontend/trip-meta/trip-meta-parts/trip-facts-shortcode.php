<?php
	// shortcode for trip facts
function trip_facts_shortcode( $atts = '' ) {
	ob_start();
	$atts                                    = shortcode_atts(
		array(
			'id' => '',
		),
		$atts,
		'trip_facts_shortcode'
	);
	$facts                                   = get_post_meta( $atts['id'], 'wp_travel_engine_setting', true );
	$trip_min_age                            = get_post_meta( $atts['id'], 'wp_travel_engine_trip_min_age', true );
	$trip_max_age                            = get_post_meta( $atts['id'], 'wp_travel_engine_trip_max_age', true );
	$wp_travel_engine_setting                = get_post_meta( $atts['id'], 'wp_travel_engine_setting', true );
	$wp_travel_engine_setting_option_setting = get_option( 'wp_travel_engine_settings', true );
	if ( isset( $facts['trip_facts'] ) && $facts['trip_facts'] != '' ) :
		$trip_facts = $facts['trip_facts'];
		if ( isset( $wp_travel_engine_setting['trip_facts'] ) && is_array( $wp_travel_engine_setting['trip_facts'] ) ) {
			?>
				<div class="secondary-trip-info">
				<?php
				$i = 0;
				foreach ( $trip_facts['field_type'] as $key => $value ) {
					// $id = $facts['trip_facts']['field_id'][$key];
					if ( isset( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) && $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] != '' ) {
						$i = 1;
					}
				}
				if ( $i == 1 ) :
					?>
						<div class="wte-trip-facts">
							<h2 class="widget-title">
								<?php
								$trip_facts_title = __( 'Trip Facts', 'wp-travel-engine' );
								echo esc_html( apply_filters( 'wp_travel_engine_trip_facts_title', $trip_facts_title ) );
								?>
							</h2>
							<ul class="trip-facts-value">
								<?php
								foreach ( $trip_facts['field_type'] as $key => $value ) {
									$id = $facts['trip_facts']['field_id'][ $key ];
									if ( isset( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) && ! empty( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) ) {
										$icon = isset( $wp_travel_engine_setting_option_setting['trip_facts']['field_icon'][ $key ] ) ? ( $wp_travel_engine_setting_option_setting['trip_facts']['field_icon'][ $key ] ) : '';
										echo '<li><span class="icon-holder">' . wptravelengine_svg_by_fa_icon( $icon, false ) . '</span>';
										switch ( $value ) {
											case 'select':
												$selected_field = isset( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) ? esc_attr( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) : '';
												?>
													<label>
													<?php echo esc_html( $id ); ?>
													</label>
													<div class="trip-facts-select">
														<div class="value"><?php echo esc_html( $selected_field ); ?></div>
													</div>
												<?php
												break;

											case 'number':
												?>
													<label>
														<?php echo esc_html( $id ); ?>
													</label>
													<div class="trip-facts-number">
														<div class="value"><?php echo isset( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) ? esc_attr( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) : ''; ?></div>
													</div>
												<?php
												break;

											case 'text':
												?>
													<label>
														<?php echo esc_html( $id ); ?>
													</label>
													<div class="trip-facts-text">
														<div class="value"><?php echo isset( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) ? esc_attr( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) : ''; ?></div>
													</div>
												<?php
												break;

											case 'duration':
												?>
													<label>
														<?php echo esc_html( $id ); ?>
													</label>
													<div class="trip-facts-text">
														<div class="value">
														<?php
														if ( isset( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) && $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] != '' ) {
															echo isset( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) ? esc_attr( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) : '';
															if ( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] > 1 ) {
																esc_html_e( ' days', 'wp-travel-engine' );
															} else {
																esc_html_e( ' day', 'wp-travel-engine' );}
														}
														?>
														</div>
													</div>
												<?php
												break;

											case 'textarea':
												?>
													<label>
														<?php echo esc_html( $id ); ?>
													</label>
													<div class="trip-facts-textarea">
														<div class="value"><?php echo isset( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) ? apply_filters( 'the_content', html_entity_decode( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ], 3, 'UTF-8' ) ) : ''; ?></div>
													</div>
												<?php
												break;

											default:
												?>
													<label>
													<?php echo esc_html( $id ); ?>
													</label>
													<div class="trip-facts-text">
														<div class="value"><?php echo isset( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) ? esc_attr( $wp_travel_engine_setting['trip_facts'][ $key ][ $key ] ) : ''; ?></div>
													</div>
												<?php
												break;
										}
										echo '</li>';
									}
									?>
									  <?php
								}
									$trip_minimum_age = isset( $trip_min_age ) && ! empty( $trip_min_age ) ? $trip_min_age : false;
									$trip_maximum_age = isset( $trip_max_age ) && ! empty( $trip_max_age ) ? $trip_max_age : false;
								if ( $trip_minimum_age ) :
									if ( isset( $wp_travel_engine_setting_option_setting['trip_minimum_age_icon'] ) && ! empty( $wp_travel_engine_setting_option_setting['trip_minimum_age_icon'] ) ) {
										$trip_minimum_age_icon = esc_attr( $wp_travel_engine_setting_option_setting['trip_minimum_age_icon'] );
									} elseif ( ! isset( $wp_travel_engine_setting_option_setting['trip_minimum_age_icon'] ) ) {
										$trip_minimum_age_icon = 'fas fa-child';
									} else {
										$trip_minimum_age_icon = '';
									}
									?>
									<li>
										<span class="icon-holder"><?php wptravelengine_svg_by_fa_icon( $trip_minimum_age_icon ); ?></span>
										<label><?php esc_html_e( 'Minimum Age', 'wp-travel-engine' ); ?></label>
										<div class="trip-facts-text">
											<div class="value"><?php echo esc_html( $trip_minimum_age ); ?></div>
										</div>
									</li>
									<?php
								endif;
								if ( $trip_maximum_age ) :
									if ( isset( $wp_travel_engine_setting_option_setting['trip_maximum_age_icon'] ) && ! empty( $wp_travel_engine_setting_option_setting['trip_maximum_age_icon'] ) ) {
										$trip_maximum_age_icon = esc_attr( $wp_travel_engine_setting_option_setting['trip_maximum_age_icon'] );
									} elseif ( ! isset( $wp_travel_engine_setting_option_setting['trip_maximum_age_icon'] ) ) {
										$trip_maximum_age_icon = 'fas fa-male';
									} else {
										$trip_maximum_age_icon = '';
									}
									?>
									<li>
									<span class="icon-holder"><?php wptravelengine_svg_by_fa_icon( $trip_maximum_age_icon ); ?></span>
										<label><?php esc_html_e( 'Maximum Age', 'wp-travel-engine' ); ?></label>
										<div class="trip-facts-text">
											<div class="value"><?php echo esc_html( $trip_maximum_age ); ?></div>
										</div>
									</li>
									<?php endif; ?>
							</ul>
						</div>
					<?php
					endif;
				?>
				</div>
			<?php
		}
		endif;
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'Trip_Info_Shortcode', 'trip_facts_shortcode' );
