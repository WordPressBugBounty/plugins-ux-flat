<?php

/* $listmenus = get_registered_nav_menus();
foreach ( $listmenus as $location => $description ) {
	$listmenu[$description] = $description;
} */

$listmenus = wp_get_nav_menus();
foreach ($listmenus as $itemmenu) {
    $listmenu[$itemmenu->name] = $itemmenu->name;
}

add_ux_builder_shortcode( 'menu', array(
    'name' => __( 'Menu' ),
    'category' => __( 'UX Flat' ),
    'thumbnail' =>  flatsome_uxf_builder_thumbnail( 'ux_menu' ),
    'options' => array(
        'menu' => array(
            'type' => 'select',
            'heading' => __( 'Menu' ),
            'default' => '',
            'options' => $listmenu,
        ),
        'name' => array(
            'type'    => 'checkbox',
            'heading' => __( 'Name' ),
            'default' => '',
        ),
		'parent'          => array(
            'type' => 'checkbox',
			'heading'    => __( 'Parent', 'flatsome' ),
			'default'    => '',
		),
		'dropdown'          => array(
            'type' => 'checkbox',
			'heading'    => __( 'Icon & Dropdown', 'flatsome' ),
			'default'    => '',
		),
        'color' => array(
            'type'     => 'colorpicker',
            'heading'  => __( 'Icon SVG Color' ),
            'default' => '',
            'format'   => 'hex',
            'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
        ),
		'type' => array(
          'type' => 'select',
          'heading' => __( 'Direction','ux-builder' ),
          'default' => 'vertical',
          'options' => array(
              'horizontal' => 'Horizontal',
              'vertical' => 'Vertical',
              'menu' => __('Vertical Menu', 'flatsome'),
          )
        ),
		'border'          => array(
            'conditions' => 'type !== "horizontal"',
            'type' => 'checkbox',
			'heading'    => __( 'Border Top', 'flatsome' ),
			'default'    => '',
		),
        'style' => array(
            'type' => 'select',
            'heading' => __( 'Style','ux-builder'),
            'default' => 'line',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/nav-styles.php' ),
        ),
        'align' => array(
	        'conditions' => 'type == "horizontal"',
            'type' => 'radio-buttons',
            'heading' => 'Text align',
            'default' => 'left',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
        ),
        'size' => array(
            'type' => 'radio-buttons',
            'heading' => __( 'Size' ,'ux-builder'),
            'default' => 'medium',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/text-sizes.php' ),
        ),
        'padding' => array(
          'type' => 'margins',
          'heading' => __( 'Padding', 'flatsome' ),
          'value' => '',
          'full_width' => true,
          'min' => 0,
          'max' => 100,
          'step' => 1,
          'on_change' => array(
                'selector' => '.nav>li>a',
                'style' => 'padding: {{ value }}'
            )
        ),
		'hover' => array(
          'type' => 'select',
          'heading' => __( 'Hover','ux-builder' ),
          'default' => '',
          'options' => array(
              '' => 'None',
              'translatey' => 'translateY',
              'scalex' => 'scaleX',
          )
        ),
        'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
    ),
) );
