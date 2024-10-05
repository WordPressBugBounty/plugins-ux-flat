<?php

function uxf_section( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'_id'              => 'section_' . wp_rand(),
		'class'            => '',
		'label'            => '',
		'visibility'       => '',
		'sticky'           => '',
		// Background.
		'bg'               => '',
		'bg_size'          => '',
		'bg_color'         => '',
		'bg_overlay'       => '',
		'bg_overlay__sm'   => '',
		'bg_overlay__md'   => '',
		'bg_pos'           => '',
		'parallax'         => '',
		'effect'           => '',
		// Video.
		'video_mp4'        => '',
		'video_ogg'        => '',
		'video_webm'       => '',
		'video_sound'      => 'false',
		'video_loop'       => 'true',
		'youtube'          => '',
		'video_visibility' => 'hide-for-medium',
		// Layout.
		'dark'             => 'false',
		'mask'             => '',
		'padding'          => '30px',
		'padding__sm'      => '',
		'padding__md'      => '',
		'height'           => '',
		'height__sm'       => '',
		'height__md'       => '',
		'margin'           => '',
		'loading'          => '',
		'scroll_for_more'  => '',
		// Shape divider.
		'divider_top'            => '',
		'divider_top_height'     => '150px',
		'divider_top_height__sm' => null,
		'divider_top_height__md' => null,
		'divider_top_width'      => '100',
		'divider_top_width__sm'  => null,
		'divider_top_width__md'  => null,
		'divider_top_fill'       => '',
		'divider_top_flip'       => 'false',
		'divider_top_to_front'   => 'false',
		'divider'                => '',
		'divider_height'         => '150px',
		'divider_height__sm'     => null,
		'divider_height__md'     => null,
		'divider_width'          => '100',
		'divider_width__sm'      => null,
		'divider_width__md'      => null,
		'divider_fill'           => '',
		'divider_flip'           => 'false',
		'divider_to_front'       => 'false',
		// Border Control.
		'border'           => '',
		'border_hover'     => '',
		'border_color'     => '',
		'border_margin'    => '',
		'border_radius'    => '',
		'border_style'     => '',
		// UX Flat
		'bg_gradient'               => '',
		'bg_gradient_to'            => 'left',
		'bg_radius'        => '',
		'bg_overflow'        => '',
		'bg_repeat'        => '',
		'bg_cover'          => '',
	), $atts );

	extract( $atts );
    
	// Hide if visibility is hidden.
	if ( $visibility === 'hidden' ) {
		return;
	}

	ob_start();

	$classes = array( 'section' );

	$classes_bg = array( 'section-bg', 'fill' );
    
	$css_gradient   = array();
	$css_mask   = array();

	// Fix old.
	if ( strpos( $bg, '#' ) !== false ) {
		$atts['bg_color'] = $bg;
		$atts['bg']       = false;
	}

	// Add Custom Classes.
	if ( $class ) {
		$classes[] = $class;
	}

	// Add Dark text.
	if ( $dark === 'true' ) {
		$classes[] = 'dark';
	}

	// If sticky section.
	if ( $sticky ) {
		$classes[] = 'sticky-section';
	}

	// Add Mask.
	if ( $mask ) {
		$classes[] = 'has-mask mask-' . $mask;
	}

	// Add visibility class.
	if ( $visibility ) {
		$classes[] = $visibility;
	}

	// Add Parallax.
	if ( $parallax ) {
		$classes[] = 'has-parallax';
	}

	// Background effects.
	if ( $effect ) {
		wp_enqueue_style( 'uxf-effect' );
	}

	// Add Full Height Class.
	if ( $height === '100vh' ) {
		$classes[] = 'is-full-height';
	}

	if ( $border_hover ) {
		$classes[] = 'has-hover';
	}
    
    if($bg_gradient && $bg){
        $css_gradient[] = array( 'attribute' => 'background','value' => 'linear-gradient(to '.$bg_gradient_to.', '.$bg_color.', '.$bg_gradient.')' );
        $css_mask[] = array( 'attribute' => '-webkit-mask-image','value' => 'linear-gradient(to '.$bg_gradient_to.', '.$bg_color.', '.$bg_gradient.')' );
    } elseif($bg_gradient) {
        $css_gradient[] = array( 'attribute' => 'background','value' => 'linear-gradient(to '.$bg_gradient_to.', '.$bg_color.', '.$bg_gradient.')' );
    }
    
	$classes    = implode( ' ', $classes );
	$classes_bg = implode( ' ', $classes_bg );
	?>
	<section class="<?php echo esc_attr($classes); ?>" id="<?php echo esc_attr($_id); ?>" <?php echo get_shortcode_inline_css( $css_gradient ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<div class="<?php echo esc_attr($classes_bg); ?>" <?php if($parallax) echo 'data-parallax-container=".section" data-parallax-background data-parallax="-' . esc_attr( $parallax ) . '"'; ?> <?php echo get_shortcode_inline_css( $css_mask ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<?php require( get_template_directory() . '/inc/shortcodes/commons/background-image.php' ); ?>
        
			<?php require( get_template_directory() . '/inc/shortcodes/commons/video.php' ); ?>
            
			<?php
			if ( $bg_overlay ) {
				echo '<div class="section-bg-overlay absolute fill"></div>';
			}
			if ( $loading ) {
				echo '<div class="loading-spin centered"></div>';
			}
			if ( $scroll_for_more ) {
				echo '<button class="scroll-for-more z-5 icon absolute bottom h-center" aria-label="' . esc_attr__( 'Scroll for more', 'flatsome' ) . '">' . get_flatsome_icon( 'icon-angle-down', '42px' ) . '</button>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
            
            if ( $effect ) {
				echo '<div class="effect-' . esc_attr($effect) . ' bg-effect fill no-click"><ul><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul></div>';
			}
			?>
			<?php require( get_template_directory() . '/inc/shortcodes/commons/border.php' ); ?>

		</div>

		<?php require get_template_directory() . '/inc/shortcodes/commons/shape-divider.php'; ?>

		<div class="section-content relative">
			<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>

        <?php
		// Get custom CSS.
		$args = array(
			'padding'    => array(
				'selector' => '',
				'property' => 'padding-top, padding-bottom',
			),
			'margin'     => array(
				'selector' => '',
				'property' => 'margin-bottom',
			),
			'height'     => array(
				'selector' => '',
				'property' => 'min-height',
			),
			'bg_color'   => array(
				'selector' => '',
				'property' => 'background-color',
			),
			'bg_overlay' => array(
				'selector' => '.section-bg-overlay',
				'property' => 'background-color',
			),
			'bg_pos'     => array(
				'selector' => '.section-bg img',
				'property' => 'object-position',
			),
			'bg_cover'     => array(
				'selector' => '.section-bg img',
				'property' => 'object-fit',
			),
		);

		if ( $bg_radius ) {
			$args = array_merge( $args, array(
                'bg_radius'     => array(
                    'selector' => '',
                    'property' => 'border-radius',
                    'unit'     => 'px',
                ),
                'bg_overflow'     => array(
                    'selector' => '',
                    'property' => 'overflow',
                ),
			) );
		}

		if ( $bg_repeat ) {
			$args = array_merge( $args, array(
                'bg'         => array(
                    'selector' => '.section-bg > div',
                    'property' => 'background-image',
                    'size'     => $bg_size,
                ),
                'bg_repeat'     => array(
                    'selector' => '.section-bg > div',
                    'property' => 'background-repeat',
                    'important' => true,
                ),
			) );
		}

		if ( $divider_top ) {
			$args = array_merge( $args, array(
				'divider_top_height' => array(
					'selector' => '.ux-shape-divider--top svg',
					'property' => 'height',
				),
				'divider_top_width'  => array(
					'selector' => '.ux-shape-divider--top svg',
					'property' => '--divider-top-width',
					'unit'     => '%',
				),
				'divider_top_fill'   => array(
					'selector' => '.ux-shape-divider--top .ux-shape-fill',
					'property' => 'fill',
				),
			) );
		}

		if ( $divider ) {
			$args = array_merge( $args, array(
				'divider_height' => array(
					'selector' => '.ux-shape-divider--bottom svg',
					'property' => 'height',
				),
				'divider_width'  => array(
					'selector' => '.ux-shape-divider--bottom svg',
					'property' => '--divider-width',
					'unit'     => '%',
				),
				'divider_fill'   => array(
					'selector' => '.ux-shape-divider--bottom .ux-shape-fill',
					'property' => 'fill',
				),
			) );
		}
		echo ux_builder_element_style_tag( $_id, $args, $atts ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
    <?php if($effect == "sliding"){ ?>
    <style>
    <?php echo '#'.esc_attr($_id); ?> .effect-sliding li:nth-of-type(1),<?php echo '#'.esc_attr($_id); ?> .effect-sliding li:nth-of-type(2),<?php echo '#'.esc_attr($_id); ?> .effect-sliding li:nth-of-type(3) {
      background-image: linear-gradient(-60deg, <?php echo esc_attr($bg_color); ?> 50%, <?php echo esc_attr($bg_gradient); ?> 50%);
    }
    </style>
    <?php } ?>
	</section>
	<?php
	$content = ob_get_contents();
	ob_end_clean();

	return do_shortcode( $content );
}
add_shortcode('background', 'uxf_section');
add_shortcode('section', 'uxf_section');
add_shortcode('section_inner', 'uxf_section');