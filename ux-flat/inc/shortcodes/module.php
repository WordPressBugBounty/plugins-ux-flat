<?php
/**
 * [module]
 */

function ux_module( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'id' => 'module-'.wp_rand(),
		'style' => '',
		'sticky' => '',
		'res_text' => 'true',
		'position' => '',
		'top' => '',
		'left' => '',
		'bottom' => '',
		'right' => '',
		'zindex'    => '',
		'text_color' => 'dark',
		'bg' => '',
		'opacity'   => '',
		'width' => '',
		'width__sm' => '',
		'width__md' => '',
		'height' => '',
		'height__sm' => '',
		'height__md' => '',
		'text_align' => 'center',
		'animate' => '',
		'padding' => '',
		'padding__sm' => '',
		'padding__md' => '',
		'margin' => '',
		'margin__sm' => '',
		'margin__md' => '',
		'radius' => '',
		'rotate' => '',
		'class' => '',
		'visibility' => '',
		// Depth
		'depth' => '',
		'depth_hover' => '',
		// Text depth
		'text_depth' => '',
		'onclick' => '',
	
	  ), $atts );
	
    extract( $atts );
      
    ob_start();

    $classes[] = 'text-box banner-layer';
    $classes_text = array('text-inner');

    if($sticky) $classes[] = 'is-sticky-column';
    if($style) $classes[] = 'text-box-'.$style;
    if($class) $classes[] = $class;
    if($visibility) $classes[] = $visibility;

    $classes_inner = array();

    if($depth) $classes_inner[] = 'box-shadow-'.$depth;
    if($text_color == 'light') {$classes_inner[] = 'dark';}
    if($text_depth) {$classes_inner[] = "text-shadow-".$text_depth;}

    if($text_align) {$classes_text[] = "text-".$text_align;}

    /* Responive text */
    if($res_text) $classes[] = 'res-text';
    if($opacity) $classes[] = 'hover-fade-in';
    

    $classes_text =  implode(" ", $classes_text);
    $classes_inner =  implode(" ", $classes_inner);
    $classes =  implode(" ", $classes);
    ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>" <?php if($animate) echo 'data-animate="'.esc_attr($animate).'"'; ?> <?php if($onclick) echo 'onclick="'.esc_attr($onclick).'"'; ?>>
        <div class="text-box-content text <?php echo esc_attr($classes_inner); ?>">
            <div class="<?php echo esc_attr($classes_text); ?>">
                <?php echo do_shortcode($content); ?>
            </div>
        </div>
    </div>
    <?php
        $args = array(
            'position' => array('selector' => '', 'property' => 'position'),
            'top' => array('selector' => '', 'property' => 'top'),
            'left' => array('selector' => '', 'property' => 'left'),
            'right' => array('selector' => '', 'property' => 'right'),
            'bottom' => array('selector' => '', 'property' => 'bottom'),
            'zindex' => array('selector' => '', 'property' => 'z-index'),
            'margin' => array('selector' => '', 'property' => 'margin'),
            'bg' => array('selector' => '.text-box-content', 'property' => 'background-color'),
            'padding' => array('selector' => '.text-inner', 'property' => 'padding'),
            'radius' => array('selector' => '.text-box-content', 'property' => 'border-radius', 'unit' => 'px'),
            'width' => array('selector' => '', 'property' => 'width', 'unit' => '%'),
            'height' => array('selector' => '', 'property' => 'height', 'unit' => '%'),
            'rotate' => array('selector' => '.text-box-content', 'property' => 'rotate', 'unit' => 'deg'),
        );
        echo ux_builder_element_style_tag($id, $args, $atts); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    ?>
    <?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode( 'module', 'ux_module' );