<?php
// [map]
function uxf_flatsome_shortcode_map( $atts, $content = null, $tag = '' ) {

	$atts = shortcode_atts(array(
		'_id'                 => 'map-' . wp_rand(),
		'class'               => '',
		'visibility'          => '',
		'lat'                 => '40.79028',
		'long'                => '-73.95972',
		'height'              => '400px',
		'height__sm'          => '',
		'height__md'          => '',
		'color'               => '',
		'margin'              => '',
		'position_x'          => '95',
		'position_x__sm'      => '',
		'position_x__md'      => '',
		'position_y'          => '95',
		'position_y__sm'      => '',
		'position_y__md'      => '',
		'content_enable'      => 'true',
		'content_bg'          => '#fff',
		'content_width'       => '30',
		'content_width__sm'   => '',
		'content_width__md'   => '',
		'saturation'          => '',
		'invert'          => '',
		'zoom'                => '17',
		'controls'            => 'true',
		'zoom_control'        => 'true',
		'street_view_control' => 'true',
		'map_type_control'    => 'false',
		'pan'                 => 'true',
	), $atts);

    extract( $atts );

    $classes = array('box');
    if( $class ) $classes[] = $class;
    if( $visibility ) $classes[] = $visibility;
    if( $color ) $classes[] = 'has-hover';
    $classes = implode(' ', $classes);

    $content_classes = array( 'map_inner', 'map-inner', 'last-reset absolute' );
    $content_classes[] = flatsome_position_classes( 'x', $position_x, $position_x__sm, $position_x__md );
    $content_classes[] = flatsome_position_classes( 'y', $position_y, $position_y__sm, $position_y__md );
    $map_url = 'output=embed';
    if( $map_type_control == 'true' ) $map_url .= '&t=k';
    if( $pan ) {
        $url_content = wp_strip_all_tags(do_shortcode($content));
        $map_url .= '&q='.urlencode($url_content);
    }
    if( $lat && $long ) {
        $map_url .= '&ll='.$lat.','.$long;
    }
    if( $zoom ) $map_url .= '&z='.$zoom;
    
    $grayscale = [];
    if ($saturation && $invert) {
        $grayscale[] = array('attribute' => 'filter', 'value' => 'grayscale(' . $saturation . '%) invert(100%)');
    } elseif ($saturation) {
        $grayscale[] = array('attribute' => 'filter', 'value' => 'grayscale(' . $saturation . '%)');
    }

      
	ob_start();
	?>
    <div id="<?php echo esc_attr($_id); ?>" class="<?php echo esc_attr($classes); ?>" <?php echo get_shortcode_inline_css($grayscale); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<div class="box-image">
            <?php if($color) echo '<div class="image-overlay-remove">'; ?>
				<iframe src="https://maps.google.com/maps?<?php echo esc_attr($map_url); ?>" width="100%" frameborder="0" style="height:<?php echo esc_attr($height); ?>; width:100%;  padding:0 !important;" allowfullscreen=""></iframe>
            <?php if($color) echo '<div class="overlay"></div></div>'; ?>
        </div>
		<?php if($content_enable) {?>
         <div class="<?php echo esc_attr(implode( ' ', $content_classes )); ?>">
              <?php echo do_shortcode( $content ); ?>
         </div>
       <?php }?>
       <?php
        // Get custom CSS
        $args = array(
            'content_bg' => array(
              'selector' => '.map-inner',
              'property' => 'background-color',
            ),
            'content_width' => array(
              'selector' => '.map-inner',
              'property' => 'max-width',
              'unit' => '%'
            ),
            'color' => array(
              'selector' => '.overlay',
              'property' => 'background-color',
            ),
          );
          echo ux_builder_element_style_tag($_id, $args, $atts); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        ?>
    </div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode('map', 'uxf_flatsome_shortcode_map');
