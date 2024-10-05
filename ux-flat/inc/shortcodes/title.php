<?php
// [title]
function uxf_title_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    '_id' => 'title-'.wp_rand(),
    'class' => '',
    'visibility' => '',
    'text' => 'Lorem ipsum dolor sit amet...',
    'tag_name' => 'h3',
    'sub_text' => '',
    'style' => 'normal',
    'size' => '100',
    'link' => '',
    'link_text' => '',
	'target'      => '_self',
    'margin_top' => '',
    'margin_bottom' => '',
    'color' => '',
    'width' => '',
    'icon' => '',
    //UXF Animate
    'ani'     => '',
    'ani_infinite'     => '',
    'ani_repeat'     => '',
    'ani_delay'     => '',
    'ani_duration'     => '',
    'ani_dynamic'     => '',
    'ani_text'     => '',
    //Box Hover
    'box_hover' => '',
    //Custom tag b
    'b_height' => '',
    'b_bg_color' => '',
    'b_border_width' => '',
    'b_border_color' => '',
    'b_transform' => '',
    'b_opacity' => '',
    'm_border_width' => '',
    'm_border_color' => '',
    //Custom text
    'bg_color' => '',
    'bg_transform' => '',
    'text_transform' => '',
    'box_color' => '',
    'box_margin' => '',
    'box_padding' => '',
    'box_radius' => '',
    'padding' => '',
  ), $atts ) );

  $classes = array('container', 'section-title-container');
  $css_args_tag = array();
  $css_args_title = array();
  if ( $class ) $classes[] = $class;
  if ( $visibility ) $classes[] = $visibility;
  
  $classes = implode(' ', $classes);

  $small_text = '';
  if($sub_text) $small_text = '<small class="sub-title">'.$atts['sub_text'].'</small>';
  
  if($icon) $icon = get_flatsome_icon($icon);

  // fix old
  if($style == 'bold_center') $style = 'bold-center';

  if($size !== '100'){
    $css_args_title[] = array( 'attribute' => 'font-size', 'value' => $size, 'unit' => '%');
  }
  if($color){
    $css_args_title[] = array( 'attribute' => 'color', 'value' => $color);
  }
  if($box_color){ 
    $css_args_title[] = array( 'attribute' => 'background', 'value' => $box_color); 
  }
  if($box_margin){ 
    $css_args_title[] = array( 'attribute' => 'margin', 'value' => $box_margin); 
  }
  if($box_padding){ 
    $css_args_title[] = array( 'attribute' => 'padding', 'value' => $box_padding); 
  }
  if($box_radius){ 
    $css_args_title[] = array( 'attribute' => 'border-radius', 'value' => $box_radius, 'unit' => 'px'); 
  }
  if($m_border_width){
    $css_args_title[] = array( 'attribute' => 'border-bottom-width', 'value' => $m_border_width); 
  }
  if($m_border_color){ 
    $css_args_title[] = array( 'attribute' => 'border-bottom-color', 'value' => $m_border_color); 
  }

  $css_args = array(
    array( 'attribute' => 'overflow', 'value' => 'hidden'),
    array( 'attribute' => 'background', 'value' => $bg_color),
    array( 'attribute' => 'margin-top', 'value' => $margin_top),
    array( 'attribute' => 'margin-bottom', 'value' => $margin_bottom),
    array( 'attribute' => 'padding', 'value' => $padding),
  );

  $link_output = '';
  $link_all = '';
  $link_color = '';
  if($color) $link_color = 'style="color:'.esc_attr($color).'"';
  
  if($link && $link_text){
        $link_all = $icon.$text.$small_text;
        $link_output = '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" '.$link_color.'>'.$link_text.get_flatsome_icon('icon-angle-right').'</a>';
  } elseif ($link){
        $link_all = '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" '.$link_color.'>'.$icon.$text.$small_text.'</a>';
  } else {
        $link_all = $icon.$text.$small_text;
  }
  
  if($width) {
    $css_args[] = array( 'attribute' => 'max-width', 'value' => $width);
  }

  if($bg_transform) {
    $css_args[] = array( 'attribute' => 'transform', 'value' => 'skewX('.$bg_transform.'deg)');
  }
  
  $css_args_tag = array(
    array( 'attribute' => 'border-bottom-width', 'value' => $b_border_width),
    array( 'attribute' => 'border-bottom-color', 'value' => $b_border_color),
    array( 'attribute' => 'transform', 'value' => ($text_transform ? '' : 'skewX(-'.$bg_transform.'deg)')),
  );

  $css_b1 = array(
    array( 'attribute' => 'height', 'value' => $b_height),
    array( 'attribute' => 'background-color', 'value' => $b_bg_color),
    array( 'attribute' => 'opacity', 'value' => $b_opacity),
    array( 'attribute' => 'transform', 'value' => ($b_transform ? 'rotate(-'.$b_transform.'deg)' : '')),
  );
  $css_b2 = array(
    array( 'attribute' => 'height', 'value' => $b_height),
    array( 'attribute' => 'background-color', 'value' => $b_bg_color),
    array( 'attribute' => 'opacity', 'value' => $b_opacity),
    array( 'attribute' => 'transform', 'value' => ($b_transform ? 'rotate(-'.$b_transform.'deg)' : '')),
  );

  return '<div class="'.esc_attr($classes).'" '.get_shortcode_inline_css($css_args).'>
          <'. esc_attr($tag_name) . ' class="section-title section-title-'.esc_attr($style).'" '.get_shortcode_inline_css($css_args_tag).'>
          <b '.get_shortcode_inline_css($css_b1).'></b>
          <span class="section-title-main" '.get_shortcode_inline_css($css_args_title).'>'.wp_kses_post($link_all).'</span>
          <b '.get_shortcode_inline_css($css_b2).'></b>'.wp_kses_post($link_output).'</' . esc_attr($tag_name) .'>
          </div>';
}
add_shortcode('title', 'uxf_title_shortcode');