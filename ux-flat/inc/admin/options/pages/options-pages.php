<?php
Flatsome_Option::add_field( 'option', array(
	'type'     => 'select',
	'settings' => 'default_title_hidden',
	'label'    => 'Auto-hide Title Tag',
	'tooltip'    => __( 'Hidden H1 & H2 is incorporated into the Homepage / Frontpage for user experience.', 'ux-flat' ),
	'section'  => 'pages',
	'default'  => '',
    'choices'  => array(
        '' => __('None'),
        1 => 'H1',
        2 => 'H1 & H2',
	),
));