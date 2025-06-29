<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfcolors',
	'section'  => 'colors',
    'default'  => '<div class="options-title-divider" style="background: #00a0d2;">UX Flat</div>',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'tooltips',
	'label'       => __('Disabled Tooltips', 'ux-flat'),
	'section'     => 'colors',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'tooltips_size',
	'label'       => __( 'Tooltip Size', 'ux-flat' ),
	'section'     => 'colors',
	'default'     => 14,
	'active_callback' => array(
		array(
			'setting'  => 'tooltips',
			'operator' => '!==',
			'value'    => true,
		),
	),
	'choices'     => array(
		'min'  => 8,
		'max'  => 16,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'uxf_boxshadow',
	'label'       => 'Box Shadow',
	'section'     => 'colors',
	'default'     => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_boxshadow_horizontal',
	'label'       => __( 'Horizontal Offset', 'ux-flat' ),
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
	'label'       => __( 'Vertical Offset', 'ux-flat' ),
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
	'label'       => __( 'Blur Radius', 'ux-flat' ),
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
	'label'       => __( 'Spread Radius', 'ux-flat' ),
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
	'type'        => 'color',
    'choices'     => [
        'alpha' => true,
    ],
    'alpha' => true,
    'settings'     => 'uxf_boxshadow_1',
    'label'       => __( 'Box Shadow Color 1', 'ux-flat' ),
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
	'type'        => 'color',
    'choices'     => [
        'alpha' => true,
    ],
    'settings'     => 'uxf_boxshadow_2',
    'label'       => __( 'Box Shadow Color 2', 'ux-flat' ),
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
	'type'        => 'color',
    'choices'     => [
        'alpha' => true,
    ],
    'settings'     => 'uxf_boxshadow_3',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
    'label'       => __( 'Box Shadow Color 3', 'ux-flat' ),
    'section'     => 'colors',
	'default'     => 'rgba(0,51,90,.19)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color',
    'choices'     => [
        'alpha' => true,
    ],
    'settings'     => 'uxf_boxshadow_4',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
    'label'       => __( 'Box Shadow Color 4', 'ux-flat' ),
    'section'     => 'colors',
	'default'     => 'rgba(0,51,90,.25)',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'color',
    'choices'     => [
        'alpha' => true,
    ],
    'settings'     => 'uxf_boxshadow_5',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_boxshadow',
			'operator' => '===',
			'value'    => true,
		),
	),
    'label'       => __( 'Box Shadow Color 5', 'ux-flat' ),
    'section'     => 'colors',
	'default'     => 'rgba(0,51,90,.3)',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_pagination',
	'label'    => __( 'Pagination', 'ux-flat' ),
	'section'  => 'colors',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'color',
    'settings'    => 'uxf_pagination_color',
    'label'       => __( 'Color', 'ux-flat' ),
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
    'label'       => __( 'Background Color', 'ux-flat' ),
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
    'label'       => __( 'Border Color', 'ux-flat' ),
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
    'label'       => __( 'Hover Color', 'ux-flat' ),
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
    'label'       => __( 'Hover Background Color', 'ux-flat' ),
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
    'label'       => __( 'Hover Border', 'ux-flat' ),
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
	'label'       => __( 'Pagination Border Radius', 'ux-flat' ),
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
