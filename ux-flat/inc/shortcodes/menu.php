<?php
/**
 * [menu]
 */
 function uxf_menu_item( $atts, $content = null ) {
    extract( shortcode_atts( array(
		'id' => 'menu_'.wp_rand(),
        'menu' => '',
        'name' => '',
        'dropdown' => '',
        'parent' => '',
        'class' => '',
        'visibility' => '',
        'nav_align' => 'left',
        'style' => 'line',
        'nav_type' => 'vertical',
        'padding' => '',
        'nav_size' => 'medium',
        'nav_style' => 'normal',
        'divider' => '',
        'thin' => '',
        'hover' => '',
        'color' => '',
        'touch' => ''
    ), $atts ) );

    $classes = array();
    if ( !$divider ) $classes[] = 'menu';
    if ( $class ) $classes[] = $class;
    if ( $visibility ) $classes[] = $visibility;
    if ( $hover ) $classes[] = 'menu-'.$hover;
    if ( $touch ) $classes[] = 'small-nav-touch no-scrollbar';
    $classes_nav = array('nav');
    if ( $nav_type ) $classes_nav[] = 'nav-' . $nav_type;
    if ( $nav_size ) $classes_nav[] = 'nav-size-' . $nav_size;
    if ( $style ) $classes_nav[] = 'nav-' . $style;
    if ( $thin ) $classes_nav[] = 'nav-' . $thin;
    if ( $nav_style ) $classes_nav[] = 'nav-' . $nav_style;
    if ( $nav_align ) $classes_nav[] = 'text-' . $nav_align . ' nav-' . $nav_align;
    
    $walker = null;
    if ( $dropdown ) $walker = new FlatsomeNavDropdown();
    $depth =  $parent ? 0 : 1;

    $menu_args = array(
        'container_id'		=> $id,
        'container_class' => implode( ' ', $classes ),
        'menu'         => $menu,
        'menu_class'   => implode( ' ', $classes_nav ),
        'walker'       => $walker,
        'depth'        => $depth,
        'echo'         => false,
    );

    if ( $dropdown ) {
        $menu_args['link_before'] = '<span>';
        $menu_args['link_after'] = '</span>';
    }
    $menu_content = wp_nav_menu( $menu_args );
    
    if ( $name ) {
        $menu_content = '<div class="is-large is-bold mb-half">' . esc_attr($menu) . '</div>' . $menu_content;
    }
    $args = array(
        'padding' => array('selector' => '.nav>li>a', 'property' => 'padding'),
        'color' => array('selector' => 'i:not(.icon-angle-down)', 'property' => 'color'),
    );
    echo ux_builder_element_style_tag($id, $args, $atts); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    return $menu_content;
}
add_shortcode( 'menu', 'uxf_menu_item' );


