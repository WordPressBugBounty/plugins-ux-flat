<?php

add_ux_builder_shortcode( 'icon', array(
	'name'      => __( 'Icon' ),
	'category'  => __( 'UX Flat' ),
	'template'  => flatsome_uxf_builder_template( 'icon.html' ),
    'thumbnail' =>  flatsome_uxf_builder_thumbnail( 'icon' ),
	'info'      => '{{ text }}',
	'inline'    => true,
	'wrap'      => false,
	'priority'  => 1,
    'styles' => array(
      'uxf-animate' => UXF_URL . 'assets/css/animate.min.css',
      'uxf-hover' => UXF_URL . 'assets/css/hover.min.css'
    ),
    'scripts' => array(
      'uxf-anidynamic' => UXF_URL . 'assets/js/animate.min.js',
    ),
	'options'   => array(
        'icon_options'     => array(
			'type'    => 'group',
			'heading' => 'Icon',
			'options' => array(
				'icon'        => array(
					'type'    => 'select',
					'heading' => 'Icon',
					'options' => require( UXF_PATH . '/inc/builder/shortcodes/values/icons.php' ),
				),
                'icon_custom' => array(
					'conditions' => 'icon == "custom"',
                    'type'       => 'textfield',
                    'heading'    => 'Icon Class',
                    'default'    => '',
                ),
                'icon_size' => array(
                    'type' => 'scrubfield',
					'heading' => __( 'Icon Size' ),
                    'default' => '16px',
                    'min' => 0,
				),
				'icon_color' => array(
					'type'     => 'colorpicker',
					'heading'  => __( 'Icon Color' ),
					'default' => '',
					'format'   => 'hex',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
			),
		),
		// Animate
		'ani_options' => require( UXF_PATH . '/inc/builder/shortcodes/commons/animate.php' ),
		'hover_options'     => array(
			'type'    => 'group',
			'heading' => 'UXF Hover',
			'options' => array(
				'box_hover'     => array(
					'type'    => 'select',
					'heading' => 'Hover',
					'default' => '',
					'options' => require( UXF_PATH . '/inc/builder/shortcodes/values/hover.php' ),
				),
			),
		),
		'link_options'     => require get_template_directory() . '/inc/builder/shortcodes/commons/links.php',
		'advanced_options' => require get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php',
	),
) );
