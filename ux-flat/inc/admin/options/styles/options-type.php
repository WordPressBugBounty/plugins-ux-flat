<?php
Flatsome_Option::add_field( '', array(
    'type'     => 'custom',
    'settings' => 'type_uxf',
    'section'  => 'type',
    'default'  => '<div class="options-title-divider" style="background: #00a0d2;">UX Flat</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings' => 'font_awesome_cdn',
	'label'    => __( 'Load Font Awesome v6 from CDN', 'ux-flat' ),
	'section'  => 'type',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-buttonset',
	'settings' => 'uxf_fl_icons',
	'label'    => __( 'Custom Icons', 'ux-flat' ),
	'section'  => 'type',
	'default'  => '',
    'choices'  => array(
        ''  => __( 'Default' ),
        1 => __('New'),
        2 => 'Font Awesome',
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-buttonset',
	'settings' => 'type_font_size',
	'label'    => __( 'MCE Font Sizes', 'ux-flat' ),
	'section'  => 'type',
	'default'  => '',
    'choices'  => array(
        ''  => __( 'Default' ),
        'pixel' => 'Pixel (Px)',
        'point' => 'Point (Pt)',
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'text',
	'settings'     => 'custom_font_family',
	'label'       => __( 'Custom Font Family', 'ux-flat' ),
    'description' => __( 'E.g: "Helvetica Neue",Helvetica,Arial,sans-serif ', 'ux-flat' ),
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