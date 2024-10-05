<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfcolors',
	'section'  => 'colors',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'uxf_boxshadow',
	'label'       => __( 'Enable Box Shadow', 'flatsome-admin' ),
	'section'     => 'colors',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_boxshadow_horizontal',
	'label'       => __( 'Horizontal Offset', 'flatsome-admin' ),
	'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
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
	'settings'     => 'uxf_boxshadow_vertical',
	'label'       => __( 'Vertical Offset', 'flatsome-admin' ),
	'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
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
	'settings'     => 'uxf_boxshadow_blur',
	'label'       => __( 'Blur Radius', 'flatsome-admin' ),
	'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
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
	'settings'     => 'uxf_boxshadow_spread',
	'label'       => __( 'Spread Radius', 'flatsome-admin' ),
	'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
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
    'settings'     => 'uxf_boxshadow_1',
    'label'       => __( 'Box Shadow Color 1', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'rgba(0,51,90,.12)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_boxshadow_2',
    'label'       => __( 'Box Shadow Color 2', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'rgba(0,51,90,.16)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_boxshadow_3',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
    'label'       => __( 'Box Shadow Color 3', 'flatsome-admin' ),
    'section'     => 'colors',
	'default'     => 'rgba(0,51,90,.19)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_boxshadow_4',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
    'label'       => __( 'Box Shadow Color 4', 'flatsome-admin' ),
    'section'     => 'colors',
	'default'     => 'rgba(0,51,90,.25)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_boxshadow_5',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
    'label'       => __( 'Box Shadow Color 5', 'flatsome-admin' ),
    'section'     => 'colors',
	'default'     => 'rgba(0,51,90,.3)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'uxf_textshadow',
	'label'       => __( 'Enable Text Shadow', 'flatsome-admin' ),
	'section'     => 'colors',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_textshadow_horizontal',
	'label'       => __( 'Horizontal Length', 'flatsome-admin' ),
	'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_textshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 4,
	'choices'     => array(
		'min'  => '-100',
		'max'  => 100,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_textshadow_vertical',
	'label'       => __( 'Vertical Length', 'flatsome-admin' ),
	'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_textshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 4,
	'choices'     => array(
		'min'  => '-100',
		'max'  => 100,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_textshadow_blur',
	'label'       => __( 'Blur Radius', 'flatsome-admin' ),
	'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_textshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 2,
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_textshadow_1',
    'label'       => __( 'Text Shadow Color 1', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_textshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'rgba(0, 0, 0, .2)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_textshadow_2',
    'label'       => __( 'Text Shadow Color 2', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_textshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'rgba(0, 0, 0, .3)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_textshadow_3',
    'label'       => __( 'Text Shadow Color 3', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_textshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'rgba(0, 0, 0, .4)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_textshadow_4',
    'label'       => __( 'Text Shadow Color 4', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_textshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'rgba(0, 0, 0, .5)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color-alpha',
    'alpha' => true,
    'settings'     => 'uxf_textshadow_5',
    'label'       => __( 'Text Shadow Color 5', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_textshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 'rgba(0, 0, 0, .6)',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_scrollbar',
	'label'    => __( 'Scrollbar Chrome', 'flatsome-admin' ),
	'section'  => 'colors',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_social',
	'label'    => __( 'Social Icons Hover', 'flatsome-admin' ),
	'section'  => 'colors',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_tag_hover',
    'label'       => __( 'Tag Background Hover', 'flatsome-admin' ),
    'section'     => 'colors',
	'default'     => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_pagination',
	'label'    => __( 'Pagination Style', 'flatsome-admin' ),
	'section'  => 'colors',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_pagination_color',
    'label'       => __( 'Color', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_pagination',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_pagination_bgcolor',
    'label'       => __( 'Background Color', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_pagination',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_pagination_border',
    'label'       => __( 'Border Color', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_pagination',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_pagination_hovercolor',
    'label'       => __( 'Hover Color', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_pagination',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_pagination_hoverbgcolor',
    'label'       => __( 'Hover Background Color', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_pagination',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_pagination_hoverbgborder',
    'label'       => __( 'Hover Border', 'flatsome-admin' ),
    'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_pagination',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => '',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_pagination_border_radius',
	'label'       => __( 'Pagination Border Radius', 'flatsome-admin' ),
	'section'     => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_pagination',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => 99,
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_box_image',
	'label'    => __( 'Shadow & Border Image on Single Post', 'flatsome-admin' ),
	'section'  => 'colors',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_tooltips',
	'label'    => __( 'Hidden Tooltips', 'flatsome-admin' ),
	'section'  => 'colors',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_tooltips_size',
	'label'       => __( 'Tooltip Size', 'flatsome-admin' ),
	'section'     => 'colors',
	'default'     => 14,
	'active_callback' => array(
		array(
			'setting'  => 'uxf_tooltips',
			'operator' => '===',
			'value'    => false,
		),
	),
	'choices'     => array(
		'min'  => 8,
		'max'  => 14,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'color',
	'settings'  => 'uxf_tooltips_color',
	'label'     => __( 'Tooltip Color', 'flatsome-admin' ),
    'section'   => 'colors',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_tooltips',
			'operator' => '===',
			'value'    => false,
		),
	),
	'default'     => '',
));