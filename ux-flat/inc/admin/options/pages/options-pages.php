<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfpages',
	'section'  => 'pages',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'select',
	'settings' => 'default_title_hidden',
	'label'    => __( 'Hidden Page Title', 'flatsome-admin' ),
	'description'    => __( 'Hidden H1 & H2 is incorporated into the Homepage / Frontpage for user experience.', 'flatsome-admin' ),
	'section'  => 'pages',
	'default'  => '',
    'choices'  => array(
        '' => '-- None --',
        1 => 'H1',
        2 => 'H1 & H2',
	),
));