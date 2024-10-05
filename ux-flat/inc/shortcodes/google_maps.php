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
		'saturation'          => '-30',
		'zoom'                => '17',
		'controls'            => 'false',
		'zoom_control'        => 'true',
		'street_view_control' => 'true',
		'map_type_control'    => 'true',
		'pan'                 => 'true',
	), $atts);

  extract( $atts );

  $classes = array('google-map', 'relative', 'mb');
  if( $class ) $classes[] = $class;
  if( $visibility ) $classes[] = $visibility;
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
  wp_enqueue_script('flatsome-maps');
	ob_start();
	?>
    <div class="<?php echo esc_attr($classes); ?>" id="<?php echo esc_attr($_id); ?>" style="overflow:hidden; margin:0 auto; position: relative;">
        <div class="map-height" id="<?php echo esc_attr($_id); ?>-inner" style="padding-top:1px !important;">
            <iframe 
                src="https://maps.google.com/maps?<?php echo esc_attr($map_url); ?>"
                width="100%"
                frameborder="0"
                style="height:<?php echo esc_attr($height); ?>; width:100%;  padding:0 !important;"
                allowfullscreen=""
                >
            </iframe>
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
            'height' => array(
              'selector' => '.map-height',
              'property' => 'height',
            )
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
