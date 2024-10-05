<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfglobalstype',
	'section'  => 'global-styles',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'uxf_btn_hover',
	'label'       => __( 'Enable Button Hover', 'flatsome-admin' ),
	'section'     => 'global-styles',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_btn_horizontal',
	'label'       => __( 'Horizontal Length', 'flatsome-admin' ),
	'section'     => 'global-styles',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_btn_hover',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 0,
	'choices'     => array(
		'min'  => '-100',
		'max'  => 100,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_btn_vertical',
	'label'       => __( 'Vertical Length', 'flatsome-admin' ),
	'section'     => 'global-styles',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_btn_hover',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 0,
	'choices'     => array(
		'min'  => '-100',
		'max'  => 100,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_btn_blur',
	'label'       => __( 'Blur Radius', 'flatsome-admin' ),
	'section'     => 'global-styles',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_btn_hover',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 20,
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_btn_spread',
	'label'       => __( 'Spread Radius', 'flatsome-admin' ),
	'section'     => 'global-styles',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_btn_hover',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 0,
	'choices'     => array(
		'min'  => '-100',
		'max'  => 100,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_btn_shadow',
    'label'       => __( 'Text Shadow Color', 'flatsome-admin' ),
    'section'     => 'global-styles',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_btn_hover',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'rgba(0,51,90,.12)',
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_btn_gradient_first',
    'label'       => __( 'Button Gradient First', 'flatsome-admin' ),
    'section'     => 'global-styles',
	'default'     => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_btn_gradient_second',
    'label'       => __( 'Button Gradient Second', 'flatsome-admin' ),
    'section'     => 'global-styles',
	'default'     => '',
));