<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfheadersticky',
	'section'  => 'header_sticky',
	'default'  => '<div class="options-title-divider">UXF Pro Options</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_toptitle',
	'label'    => __( 'Top Bar - Title Single Post', 'flatsome-admin' ),
	'section'  => 'header_sticky',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'select',
	'settings' => 'uxf_header_disable',
	'label'    => __( 'Disable Sticky on Scroll', 'flatsome-admin' ),
	'section'  => 'header_sticky',
	'active_callback' => array(
		array(
			'setting'  => 'back_to_top',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => '',
    'choices'  => array(
        ''  => '-- None --',
        'top' => 'Top Bar',
        'main' => 'Header Main',
        'bottom' => 'Header Bottom',
	),
));
