<?php
Flatsome_Option::add_field( '', array(
    'type'     => 'custom',
    'settings' => 'footer_uxf',
    'section'  => 'footer',
    'default'  => '<div class="options-title-divider" style="background: #00a0d2;">UX Flat</div>',
));

Flatsome_Option::add_field( 'option', array(
    'type'      => 'checkbox',
    'settings'  => 'back_to_top_pro',
    'label'     => 'Progress Indicator',
    'section'   => 'footer',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top_shape',
			'operator' => '==',
			'value'    => 'circle',
		),
	),
    'default'   => 0,
) );

Flatsome_Option::add_field( 'option', array(
	'type'      => 'select',
	'settings' => 'back_to_top_style',
	'label'    => __( 'Button Color' ),
    'tooltip'     => 'Plugin: UX Flat',
	'section'  => 'footer',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => '',
    'choices'  => array(
        ''  => __( 'Default'),
        'primary'  => __( 'Primary' ),
        'secondary'  => __( 'Secondary' ),
        'white'  => __( 'White' ),
        'is-link'  => __( 'Transparent' ),
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'radio-image',
	'settings' => 'back_to_top_color',
	'label'    => __( 'Icon Color' ),
	'section'  => 'footer',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => '',
    'choices'  => array(
        'light'  => get_template_directory_uri() . '/inc/admin/customizer/img/text-light.svg',
        '' => get_template_directory_uri() . '/inc/admin/customizer/img/text-dark.svg',
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'radio-buttonset',
	'settings' => 'back_to_top_size',
	'label'    => __( 'Size' ),
	'section'  => 'footer',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => '',
	'choices'     => array(
      'is-xsmall' => 'XS',
      'is-small' => 'S',
      '' => __( 'Default' ),
      'is-medium' => 'M',
      'is-large' => 'L',
      'is-xlarge' => 'XL',
    ),
));

Flatsome_Option::add_field( 'option', array(
	'type'        => 'text',
	'settings' => 'back_to_top_icon',
	'label'    => __( 'Change Icon HTML' ),
    'tooltip'     => 'E.g: i or svg',
	'section'  => 'footer',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
		'type'      => 'text',
		'settings'  => 'back_to_top_bottom',
		'default'   => '',
		'label'     => __( 'Bottom' ),
        'tooltip'     => 'E.g: 20px or 20%',
		'section'   => 'footer',
        'active_callback' => array(
            array(
                'setting'  => 'back_to_top',
                'operator' => '==',
                'value'    => true,
            ),
        ),
	),
);

if (UXFPro()) {
    Flatsome_Option::add_field( 'option',  array(
        'type'        => 'code',
        'settings'    => 'cache_footer',
        'label'       => __( 'Cache Footer', 'ux-flat' ),
        'description'  => __( 'Add Any HTML', 'ux-flat' ),
		'choices'     => [
			'language' => 'html',
		],
        'section'     => 'footer',
    ));
}