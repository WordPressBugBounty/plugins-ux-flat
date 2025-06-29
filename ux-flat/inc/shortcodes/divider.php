<?php

// [divider]
function uxf_divider_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    'width' => '',
    'height' => '',
    'margin' => '',
    'align' => '',
    'color' => '',
    //UXF
    'id' => 'divider-'.wp_rand(),
    'img' => '',
    'inline_svg'  => 'true',
    'img_color' => '',
    'img_bgcolor' => '',
    'icon' => '',
	'icon_custom' => '',
    'icon_size' => '16px',
    'icon_color' => '',
    'icon_align' => '',
	'icon_bgcolor' => '',
    'icon_padding' => '',
    'icon_radius' => '',
  ), $atts ) );

$align_end ='';
$align_start = '';

// Fallback
if($width == 'full') $width = '100%';
if($icon_align) $icon_align = 'flex align-middle align-'.$icon_align;

if($align === 'center'){
  $align_start ='<div class="text-center">';
  $align_end = '</div>';
}
if($align === 'right'){
  $align_start ='<div class="text-right">';
  $align_end = '</div>';
}
$icon_atts =  '';
if ($img) {
    $icon_atts = flatsome_get_image( $img, $size = 'original', null, $inline_svg ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
} elseif ($icon_custom) {
    $icon_atts = get_flatsome_icon( null, null, array ( 'aria-hidden' => 'true', 'class' => $icon_custom ) );
} elseif ( $icon ) {
    $icon_atts = get_flatsome_icon( null, null, array ( 'aria-hidden' => 'true', 'class' => $icon ) );
}
// Get custom CSS
$args = array(
    'margin'  => array(
        'selector' => '',
        'property' => 'margin-top, margin-bottom',
    ),
    'width'   => array(
        'selector' => '',
        'property' => 'max-width',
    ),
    'height'   => array(
        'selector' => '',
        'property' => 'height',
    ),
    'radius'   => array(
        'selector' => '',
        'property' => 'border-radius',
    ),
    'color'   => array(
        'selector' => '',
        'property' => 'background-color',
    ),
    'icon_size'   => array(
        'selector' => 'i',
        'property' => 'font-size',
    ),
    'icon_color'   => array(
        'selector' => 'i',
        'property' => 'color',
    ),
    'icon_bgcolor'   => array(
        'selector' => 'i',
        'property' => 'background',
    ),
    'img_color'   => array(
        'selector' => 'svg, path',
        'property' => 'fill',
    ),
    'img_bgcolor'   => array(
        'selector' => 'svg',
        'property' => 'background',
    ),
    'icon_padding'   => array(
        'selector' => 'i, svg',
        'property' => 'padding',
        'unit'     => 'px',
    ),
    'icon_radius'   => array(
        'selector' => 'i, svg',
        'property' => 'border-radius',
    ),
);
echo ux_builder_element_style_tag($id, $args, $atts);
return $align_start.'<div id="'.esc_attr($id).'" class="is-divider divider clearfix '.esc_attr($icon_align).'">'.$icon_atts.'</div>'.$align_end;
}
add_shortcode('divider', 'uxf_divider_shortcode');