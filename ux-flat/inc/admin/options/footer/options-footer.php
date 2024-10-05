<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxffooter',
	'section'  => 'footer',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-buttonset',
	'settings' => 'back_to_top_custom',
	'label'    => __( 'Back To Top Custom', 'flatsome-admin' ),
	'section'  => 'footer',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => '',
	'choices'     => array(
      '' => __( 'Default', 'flatsome-admin' ),
      'style' => __( 'New Style', 'flatsome-admin' ),
      'progress' => __( 'Progress Indicator', 'flatsome-admin' ),
    ),
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-buttonset',
	'settings' => 'back_to_top_bg',
	'label'    => __( 'Back To Top Background', 'flatsome-admin' ),
	'section'  => 'footer',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top_custom',
			'operator' => '===',
			'value'    => 'style',
		),
	),
	'default'  => '',
    'choices'  => array(
        ''  => __( 'Default', 'flatsome-admin' ),
        'primary'  => __( 'Primary', 'flatsome-admin' ),
        'secondary'  => __( 'Secondary', 'flatsome-admin' ),
        'white'  => __( 'White', 'flatsome-admin' ),
        'transparent'  => __( 'Transparent', 'flatsome-admin' ),
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-image',
	'settings' => 'back_to_top_icon',
	'label'    => __( 'Back To Top Icon Color', 'flatsome-admin' ),
	'section'  => 'footer',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top_custom',
			'operator' => '===',
			'value'    => 'style',
		),
	),
	'default'  => 'dark',
    'choices'  => array(
        'dark'  => flatsome_customizer_images_uri() . '/text-light.svg',
        'light' => flatsome_customizer_images_uri() . '/text-dark.svg',
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-buttonset',
	'settings' => 'back_to_top_size',
	'label'    => __( 'Back To Top Size', 'flatsome-admin' ),
	'section'  => 'footer',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top_custom',
			'operator' => '===',
			'value'    => 'style',
		),
	),
	'default'  => '',
	'choices'     => array(
      'is-xsmall' => __( 'XS', 'flatsome-admin' ),
      'is-small' => __( 'S', 'flatsome-admin' ),
      '' => __( 'Default', 'flatsome-admin' ),
      'is-medium' => __( 'M', 'flatsome-admin' ),
      'is-large' => __( 'L', 'flatsome-admin' ),
      'is-xlarge' => __( 'XL', 'flatsome-admin' ),
    ),
));

Flatsome_Option::add_field( 'option',
	array(
		'type'      => 'text',
		'settings'  => 'back_to_top_bottom',
		'default'   => '',
		'label'     => __( 'Back To Top Bottom', 'flatsome-admin' ),
		'section'   => 'footer',
        'active_callback' => array(
            array(
                'setting'  => 'back_to_top',
                'operator' => '===',
                'value'    => true,
            ),
        ),
	)
);
