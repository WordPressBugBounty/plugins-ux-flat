<?php
function uxf_image_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'_id'                 => 'image_' . wp_rand(),
		'class'               => '',
		'visibility'          => '',
		'id'                  => '',
		'org_img'             => '',
		'caption'             => '',
		'animate'             => '',
		'animate_delay'       => '',
		'lightbox'            => '',
		'lightbox_image_size' => 'large',
		'lightbox_caption'    => '',
		'image_title'         => '',
		'height'              => '',
		'image_overlay'       => '',
		'image_hover'         => '',
		'image_hover_alt'     => '',
		'image_size'          => 'large',
		'icon'                => '',
		'width'               => '',
		'margin'              => '',
		'position_x'          => '',
		'position_x__sm'      => '',
		'position_x__md'      => '',
		'position_y'          => '',
		'position_y__sm'      => '',
		'position_y__md'      => '',
		'depth'               => '',
		'parallax'            => '',
		'depth_hover'         => '',
		'link'                => '',
		'target'              => '_self',
		'rel'                 => '',
		//UXF URL
		'url_id'            => '',
		'url_caption'         => '',
		//UXF Animate
        'ani'               => '',
        'ani_outin'      	=> '',
        'ani_infinite'      => '',
        'ani_repeat'        => '',
        'ani_delay'         => '',
        'ani_duration'      => '',
        'ani_dynamic'       => '',
        'ani_text'          => '',
		//Box Hover
		'box_hover'          => '',
		'radius'          => '',
	), $atts ) );

	
   // Ani CSS
	if($ani) {
        wp_enqueue_style( 'uxf-animate');
        wp_enqueue_script( 'uxf-anidynamic');
    }
    if($box_hover) wp_enqueue_style( 'uxf-hover');

	if ( empty( $id ) && empty( $url_id ) ) {
		return '<div class="uxb-no-content uxb-image">Upload Image...</div>';
	}

	// Ensure key existence when builder setting is
	// not touched, to extract responsive widths.
	if ( ! array_key_exists( 'width', $atts ) ) {
		$atts['width'] = '100';
	}

	$classes = array();
	if ( $class ) $classes[] = $class;
	if ( $visibility ) $classes[] = $visibility;

	$classes_inner = array( 'img-inner' );
	$image_meta    = wp_prepare_attachment_for_js( $id );
	$image_title   = filter_var( $image_title, FILTER_VALIDATE_BOOLEAN );
	$link_atts     = array(
		'target' => $target,
		'rel'    => array( $rel ),
	);

	if ( is_numeric( $id ) ) {
		if ( ! $org_img ) {
			$org_img = wp_get_attachment_image_src( $id, $lightbox_image_size );
			$org_img = $org_img ? $org_img[0] : '';
		}
		if ( $caption && $caption == 'true' ) {
			$caption = is_array( $image_meta ) ? $image_meta['caption'] : '';
		}
	} else {
		if ( ! $org_img ) {
			$org_img = $id;
		}
	}

	// If caption is enabled.
	$link_start = '';
	$link_end   = '';
	$link_class = '';
    $get_image = '';

	if ( $link ) {
		if ( strpos( $link, 'watch?v=' ) !== false ) {
			$icon       = 'icon-play';
			$link_class = 'open-video';
			if ( ! $image_overlay ) {
				$image_overlay = 'rgba(0,0,0,.2)';
			}
		}
		$link_start = '<a class="' . esc_attr($link_class) . '" href="' . esc_url($link) . '"' . flatsome_parse_target_rel( $link_atts ) . '>';
		$link_end   = '</a>';
	} elseif ( $lightbox ) {
		$title      = $lightbox_caption ? $image_meta['caption'] : '';
		$link_start = '<a class="image-lightbox lightbox-gallery" title="' . esc_attr( $title ) . '" href="' . esc_url($org_img) . '">';
		$link_end   = '</a>';
	}

	// Set positions
	if ( function_exists( 'ux_builder_is_active' ) && ux_builder_is_active() ) {
		// Do not add positions if builder is active.
		// They will be set by the onChange handler.
	} else {
		$classes[] = flatsome_position_classes( 'x', $position_x, $position_x__sm, $position_x__md );
		$classes[] = flatsome_position_classes( 'y', $position_y, $position_y__sm, $position_y__md );
	}

	if ( $image_hover ) {
		$classes_inner[] = 'image-' . $image_hover;
	}
	if ( $image_hover_alt ) {
		$classes_inner[] = 'image-' . $image_hover_alt;
	}
	if ( $height ) {
		$classes_inner[] = 'image-cover';
	}
	if ( $depth ) {
		$classes_inner[] = 'box-shadow-' . $depth;
	}
	if ( $depth_hover ) {
		$classes_inner[] = 'box-shadow-' . $depth_hover . '-hover';
	}

	if($ani_outin) {
        $classes[] = 'aniCus_OutIn-'.$ani_outin.'-'.$ani.' aniUtil_active';
    } else {
		if($ani) {
			$classes[] = 'ani_'.$ani.' animate__animated animate__'.$ani;
		}
		if($ani_dynamic) {
			if ( ! is_array( $ani_dynamic ) ) {
				$ani_dynamic = explode( ',', $ani_dynamic );
			}
			foreach ( $ani_dynamic as $key => $value ) {
				$classes[] = $value;
			}
		}
		if($ani_text) {
			$classes[] = 'aniCus_text-'.$ani;
		} 
		if($ani_infinite) {
			$classes[] = 'animate__infinite';
		}
		if($ani_repeat) {
			$classes[] = 'animate__repeat-'.$ani_repeat;
		}
		if($ani_delay) {
			$classes[] = 'animate__delay-'.$ani_delay.'s';
		}
		if($ani_duration) {
			$classes[] = 'animate__'.$ani_duration;
		}
	}
    
	if ( $url_id ) {
		$get_image = '<img class="size-full" title="'.esc_attr($url_caption).'" src="'.esc_attr($url_id).'" alt="'.esc_attr($url_caption).'" />';
	} else {
		$get_image = flatsome_get_image( $id, $image_size, $caption, false, $image_title );
    }

	// Set image height.
	$css_image_height = array(
		array( 'attribute' => 'padding-top', 'value' => $height ),
		array( 'attribute' => 'margin', 'value' => $margin ),
	);

	$classes       = implode( " ", $classes );
	$classes_inner = implode( " ", $classes_inner );

	ob_start();
	?>
    <div class="img has-hover <?php echo esc_attr($classes); ?>" id="<?php echo esc_attr($_id); ?>">
		<?php echo wp_kses_post($link_start); ?>
		<?php if ( $parallax ) echo '<div data-parallax-fade="true" data-parallax="' . esc_attr($parallax) . '">'; ?>
		<?php if ( $box_hover ) echo '<div class="hvr-'.esc_attr($box_hover).'">'; ?>
		<div class="<?php echo esc_attr($classes_inner); ?> dark" <?php echo get_shortcode_inline_css( $css_image_height ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>        
			<?php echo wp_kses_post($get_image); ?>
			<?php if ( $image_overlay ) { ?>
				<div class="overlay" style="background-color: <?php echo esc_attr($image_overlay); ?>"></div>
			<?php } ?>
			<?php if ( $icon ) { ?>
				<div class="absolute no-click x50 y50 md-x50 md-y50 lg-x50 lg-y50 text-shadow-2">
					<div class="overlay-icon">
						<i class="icon-play"></i>
					</div>
				</div>
			<?php } ?>

			<?php if ( $caption && $id ) { ?>
				<div class="caption"><?php echo esc_attr($caption); ?></div>
			<?php } ?>
		</div>
		<?php if ( $box_hover ) echo '</div>'; ?>
		<?php if ( $parallax ) echo '</div>'; ?>
		<?php echo wp_kses_post($link_end); ?>
		<?php if ( $width == '0' ) { ?>
			<?php echo '<style>#' . esc_attr($_id) . ' img{width: auto}</style>'; ?>
		<?php } else { ?>
		<?php
		$args = array(
			'width' => array(
				'selector' => '',
				'property' => 'width',
				'unit'     => '%',
			),
			'radius' => array(
				'selector' => '.img-inner img',
				'property' => 'border-radius',
			),
		);
		echo ux_builder_element_style_tag( $_id, $args, $atts ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
		<?php } ?>
	</div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();

	return $content;
}

add_shortcode( 'ux_image', 'uxf_image_shortcode' );
