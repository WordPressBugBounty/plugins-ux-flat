<?php

/**
 * [button]
 */
// Register scripts
function uxf_button_scripts() {
    wp_register_style('hovercss', plugins_url('/assets/css/hover.min.css', UXF_FILE), [], null);
    wp_register_style('ihovercss', plugins_url('/assets/css/ihover.min.css', UXF_FILE), [], null);
}
add_action('wp_enqueue_scripts', 'uxf_button_scripts');

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
		'id'          => 'btn-' . wp_rand(),
		'block'       => '',
		//UXF
		'weight'      => '',
		'hover'     => '',
		'icon_hover'    => '',
		'text_color'       => '',
		'bg_color'       => '',
		'bg_gradient'       => '',
		'bg_gradient_to'       => 'left',
		'border_style'       => '',
		'border_color'       => '',
		'letter_spacing' => '',
		'icon_custom'    => '',
		'icon_size'    => '',
		'onclick' => '',
	), $atts ) );

	if($hover) wp_enqueue_style( 'hovercss');
	if($icon_hover) wp_enqueue_style( 'ihovercss');

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
    if ($icon == "custom") $icon = $icon_custom;
    
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
	if ( $icon && $icon_reveal ) {
		$classes[] = 'reveal-icon';
	}
	if ( $expand ) {
		$classes[] = 'expand';
	}
	if ( !$text ) {
		$classes[] = 'icon';
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
		$attributes['title'] = wp_kses_post( $tooltip );
	}
	if($hover) {
        $classes[] = 'hvr-'.$hover;
    }
	if($icon_hover) {
        $classes[] = 'ihvr-'.$icon_hover;
        $icon .= ' ihvr-icon';
    }
	$classes    = implode( ' ', $classes );
	ob_start();
	?>
	<a id="<?php echo esc_attr($id); ?>" <?php echo flatsome_html_atts( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="<?php echo esc_attr( $classes ); ?>" <?php if($onclick) echo 'onclick="'.esc_attr($onclick).'"'; ?>>
            <?php if (($icon_left  = $icon) && ($icon_pos == 'left')) { ?>
                <?php echo get_flatsome_icon( $icon, null, array( 'aria-hidden' => 'true'  ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            <?php } ?>
            <?php if ($text) echo '<span>'. esc_attr($text). '</span>'; ?>
            <?php if (($icon_right  = $icon) && ($icon_pos !== 'left')) { ?>
                <?php echo get_flatsome_icon( $icon, null, array( 'aria-hidden' => 'true' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            <?php } ?>
	</a>
    <?php
        // Get custom CSS
        $args = array(
            'radius' => array(
                'selector' => '',
                'property' => 'border-radius',
                'unit'     => 'px',
                'important' => true,
            ),
            'border'  => array(
                'selector' => '',
                'property' => 'border-width',
                'unit'     => 'px',
            ),
            'border_style'  => array(
                'selector' => '',
                'property' => 'border-style',
            ),
            'border_color'   => array(
                'selector' => '',
                'property' => 'border-color',
            ),
            'letter_spacing'  => array(
                'selector' => '',
                'property' => 'letter-spacing',
                'unit'     => 'px',
            ),
            'padding'   => array(
                'selector' => '',
                'property' => 'padding',
            ),
            'text_color'   => array(
                'selector' => '',
                'property' => 'color',
            ),
            'bg_color'   => array(
                'selector' => '',
                'property' => 'background',
            ),
            'icon_size'  => array(
                'selector' => '>i',
                'property' => 'font-size',
                'unit'     => 'px',
            ),
        );
        echo ux_builder_element_style_tag($id, $args, $atts);
      ?>
	<?php if($bg_gradient){ ?>
    <style>
        #<?php echo esc_attr($id); ?> {
            background: linear-gradient(to right, <?php echo esc_attr($bg_color); ?> 0%, <?php echo esc_attr($bg_gradient); ?>  51%, <?php echo esc_attr($bg_color); ?>  100%); transition: 0.5s; background-size: 200% auto !important;
        }
        #<?php echo esc_attr($id); ?>:hover {
            background-position: right center !important;
        }
    </style>
    <?php }
    return ob_get_clean();
}
add_shortcode( 'button', 'uxf_button_shortcode' );