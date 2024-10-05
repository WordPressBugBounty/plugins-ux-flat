<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxftype',
	'section'  => 'type',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_fl_icons',
	'label'    => __( 'Fl Icons', 'flatsome-admin' ),
	'description'    => __( 'Redesign Icons', 'flatsome-admin' ),
	'section'  => 'type',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-buttonset',
	'settings' => 'uxf_cdn_icon',
	'label'    => __( 'Font Awesome', 'flatsome-admin' ),
	'section'  => 'type',
	'default'  => '',
    'choices'  => array(
        ''  => __( 'Off' ),
        '5' => 'v5',
        '6' => 'v6',
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-buttonset',
	'settings' => 'uxf_text_size',
	'label'    => __( 'MCE Font Sizes', 'flatsome-admin' ),
	'section'  => 'type',
	'default'  => '',
    'choices'  => array(
        ''  => __( 'Default', 'flatsome-admin' ),
        'pixel' => 'Pixel (Px)',
        'point' => 'Point (Pt)',
	),
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'uxf_font_family',
	'label'       => __( 'Custom Font Family', 'flatsome-admin' ),
	'section'     => 'type',
	'active_callback' => array(
		array(
			'setting'  => 'disable_fonts',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'     => '',
));