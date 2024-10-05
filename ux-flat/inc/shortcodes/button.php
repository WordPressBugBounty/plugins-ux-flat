<?php

/**
 * [button]
 */
function uxf_button_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'text'        => '',
		'style'       => '',
		'color'       => 'primary',
		'size'        => '',
		'animate'     => '',
		'link'        => '',
		'target'      => '_self',
		'rel'         => '',
		'border'      => '',
		'expand'      => '',
		'tooltip'     => '',
		'padding'     => '',
		'radius'      => '',
		'letter_case' => '',
		'mobile_icon' => '',
		'icon'        => '',
		'icon_pos'    => '',
		'icon_reveal' => '',
		'depth'       => '',
		'depth_hover' => '',
		'class'       => '',
		'visibility'  => '',
		'id'          => '',
		'block'       => '',
		'weight'      => '',
		//Animate
		'ani'     => '',
		'ani_infinite'     => '',
		'ani_repeat'     => '',
		'ani_delay'     => '',
		'ani_duration'     => '',
		'ani_dynamic'     => '',
		'ani_text'     => '',
		//Box Hover
		'hover'     => '',
		'box_hover' => '',
		'box_cover'     => '',
		'box_bg'     => '',
		'box_border'     => '',
		'text_color'       => '',
		'bg_color'       => '',
		'bg_gradient'       => '',
		'bg_gradient_to'       => 'left',
		'border_style'       => '',
		'border_color'       => '',
		'border_width'       => '',
		'outline_style'       => '',
		'outline_color'       => '',
		'outline_width'       => '',
		'letter_spacing' => '',
		'icon_custom'    => '',
		'onclick' => '',
	), $atts ) );

    // Ani CSS
	if($ani) {
        wp_enqueue_style( 'uxf-animate');
        wp_enqueue_script( 'uxf-anidynamic');
    }
	if($box_hover) wp_enqueue_style( 'uxf-hover');

	// Old button Fallback.
	if ( strpos( $style, 'primary' ) !== false ) {
		$color = 'primary';
	} elseif ( strpos( $style, 'secondary' ) !== false ) {
		$color = 'secondary';
	} elseif ( strpos( $style, 'white' ) !== false ) {
		$color = 'white';
	} elseif ( strpos( $style, 'success' ) !== false ) {
		$color = 'success';
	} elseif ( strpos( $style, 'alert' ) !== false ) {
		$color = 'alert';
	}

	if ( strpos( $style, 'alt-button' ) !== false ) {
		$style = 'outline';
	}

	$attributes = array();
    if ($icon == 'custom') $icon = $icon_custom;
    
	// Add Button Classes.
	$classes   = array();
	$classes[] = 'button';
    
    if ( $color ) {
		$classes[] = $color;
	}
	if ( $style ) {
		$classes[] = 'is-' . $style;
	}
	if ( $size ) {
		$classes[] = 'is-' . $size;
	}
	if ( $weight ) {
		$classes[] = 'is-' . $weight;
	}
	if ( $depth ) {
		$classes[] = 'box-shadow-' . $depth;
	}
	if ( $depth_hover ) {
		$classes[] = 'box-shadow-' . $depth_hover . '-hover';
	}
	if ( $letter_case ) {
		$classes[] = $letter_case;
	}
	if ( $icon_reveal ) {
		$classes[] = 'reveal-icon';
	}
	if ( $expand ) {
		$classes[] = 'expand';
	}
	if ( $class ) {
		$classes[] = $class;
	}
	if ( $visibility ) {
		$classes[] = $visibility;
	}
	if ( $animate ) {
		$attributes['data-animate'] = $animate;
	}
	if ( $target == '_blank' ) {
		$attributes['rel'][] = 'noopener noreferrer';
	}
	if ( $rel ) {
		$attributes['rel'][] = $rel;
	}
	if ( $link ) {
		// Smart links.
		$link               = flatsome_smart_links( $link );
		$attributes['href'] = $link;
		if ( $target ) {
			$attributes['target'] = $target;
		}
	}
	if ( $tooltip ) {
		$classes[]           = 'has-tooltip';
		$attributes['title'] = $tooltip;
	}

	if($box_hover) {
        $classes[] = 'hvr-'.$box_hover;
    }
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

	$styles = array(
		array(
			'unit'      => 'px!important',
			'attribute' => 'border-radius',
			'value'     => intval( $radius ),
		),
		array(
			'unit'      => 'px',
			'attribute' => 'border-width',
			'value'     => intval( $border ),
		),
		array(
			'unit'      => 'px',
			'attribute' => 'letter-spacing',
			'value'     => intval( $letter_spacing ),
		),
		array(
			'attribute' => 'padding',
			'value'     => esc_attr($padding),
		),
		array(
			'attribute' => 'color',
			'value'     => esc_attr($text_color),
		),
		array(
            'attribute' => 'background',
            'value'     => ($bg_gradient ? 'linear-gradient(to right, '.esc_attr($bg_color).' 0%, '.esc_attr($bg_gradient).'  51%, '.esc_attr($bg_color).'  100%); transition: 0.5s; background-size: 200% auto' : esc_attr($bg_color)),
        ),
        array(
            'attribute' => 'border',
            'value'     => ($border_style ? esc_attr($border_width).' '.esc_attr($border_style).' '.esc_attr($border_color) : ''),
        ),
        array(
            'attribute' => 'outline',
            'value'     => ($outline_width ? esc_attr($outline_width).' '.esc_attr($outline_style).' '.esc_attr($outline_color) : ''),
        ),
	);

	$classes    = implode( ' ', $classes );
	//$attributes          = flatsome_html_atts( $attributes );
	ob_start();

	?>
	<a <?php echo flatsome_html_atts( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="<?php echo esc_attr( $classes ); ?>" <?php if($onclick) echo 'onclick="'.esc_attr($onclick).'"'; ?> <?php echo get_shortcode_inline_css($styles); ?>>
            <?php if (($icon_left  = $icon) && ($icon_pos == 'left')) { ?>
                <?php echo get_flatsome_icon( $icon, null, array( 'aria-hidden' => 'true' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            <?php } ?>
			<span><?php echo esc_attr($text); ?></span>
            <?php if (($icon_right  = $icon) && ($icon_pos !== 'left')) { ?>
                <?php echo get_flatsome_icon( $icon, null, array( 'aria-hidden' => 'true' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            <?php } ?>
	</a>
	<?php if($bg_gradient){ ?>
        <style>.gradientbtn:hover{background-position: right center !important;}</style>
    <?php }
    return ob_get_clean();
}
add_shortcode( 'button', 'uxf_button_shortcode' );