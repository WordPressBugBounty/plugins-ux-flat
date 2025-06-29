<?php
// [title]
function uxf_title_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    '_id' => 'title-'.rand(),
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
  
    if ( ! preg_match( '/^h[1-6]$/', trim( $tag_name ) ) ) $tag_name = 'h3';

    $classes = array('container', 'section-title-container');
    $css_args_tag = array();
    if ( $class ) $classes[] = $class;
    if ( $visibility ) $classes[] = $visibility;

    $classes = implode(' ', $classes);

    $small_text = '';
    if($sub_text) $small_text = '<small class="sub-title">'.$atts['sub_text'].'</small>';

    if($icon) $icon = get_flatsome_icon($icon);

    // fix old
    if($style == 'bold_center') $style = 'bold-center';


    $css_args = array(
        array( 'attribute' => 'overflow', 'value' => 'hidden')
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
    if($bg_transform) {
        $css_args[] = array( 'attribute' => 'transform', 'value' => 'skewX('.$bg_transform.'deg)');
    }
    if(!$text_transform) {
        $css_args_tag[] = array( 'attribute' => 'transform', 'value' => 'skewX(-'.$bg_transform.'deg)');
    }

    $css_b1 = array(
    array( 'attribute' => 'transform', 'value' => ($b_transform ? 'rotate(-'.$b_transform.'deg)' : '')),
    );
    $css_b2 = array(
    array( 'attribute' => 'transform', 'value' => ($b_transform ? 'rotate(-'.$b_transform.'deg)' : '')),
    );
    // Get custom CSS
    $args = array(
        'bg_color' => array(
            'selector' => '.section-title',
            'property' => 'background',
        ),
        'margin_top' => array(
            'selector' => '.section-title',
            'property' => 'margin-top',
        ),
        'margin_bottom' => array(
            'selector' => '.section-title',
            'property' => 'margin-bottom',
        ),
        'padding' => array(
            'selector' => '.section-title',
            'property' => 'padding',
        ),
        'width' => array(
            'selector' => '.section-title',
            'property' => 'max-width',
        ),
        'b_border_width'  => array(
            'selector' => '.section-title',
            'property' => 'border-bottom-width',
            'unit'     => 'px',
        ),
        'b_border_color'   => array(
            'selector' => '.section-title',
            'property' => 'border-bottom-color',
        ),
        'box_margin' => array(
            'selector' => '.section-title-main',
            'property' => 'margin',
        ),
        'box_padding' => array(
            'selector' => '.section-title-main',
            'property' => 'padding',
        ),
        'm_border_width'  => array(
            'selector' => '.section-title-main',
            'property' => 'border-bottom-width',
            'unit'     => 'px',
        ),
        'm_border_color'   => array(
            'selector' => '.section-title-main',
            'property' => 'border-bottom-color',
        ),
        'color'   => array(
            'selector' => '.section-title-main',
            'property' => 'color',
        ),
        'box_color'   => array(
            'selector' => '.section-title-main',
            'property' => 'background',
        ),
        'box_radius'   => array(
            'selector' => '.section-title-main',
            'property' => 'border-radius',
            'unit' => 'px',
        ),
        'b_height' => array(
            'selector' => '.section-title > b',
            'property' => 'height',
        ),
        'b_bg_color' => array(
            'selector' => '.section-title > b',
            'property' => 'background',
        ),
        'b_opacity' => array(
            'selector' => '.section-title > b',
            'property' => 'opacity',
        ),
    );
    if($size !== '100'){
        $args = array_merge( $args, array(
            'size' => array(
                'selector' => '.section-title-main',
                'property' => 'font-size',
                'unit'     => '%',
            ),
        ) );
    }
    echo ux_builder_element_style_tag($_id, $args, $atts);
    return '<div id="' . esc_attr( $_id ) . '" class="' . esc_attr( $classes ) . '" ' . get_shortcode_inline_css($css_args) . '><'. $tag_name . ' class="section-title section-title-' . esc_attr( $style ) . '"><b ' . get_shortcode_inline_css($css_b1) . '></b><span class="section-title-main">' . wp_kses_post( $link_all ) . '</span><b ' . get_shortcode_inline_css($css_b2) . '></b>' . $link_output . '</' . $tag_name . '></div>';
}
add_shortcode('title', 'uxf_title_shortcode');