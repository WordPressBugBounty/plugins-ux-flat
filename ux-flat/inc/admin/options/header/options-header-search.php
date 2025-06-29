<?php
Flatsome_Option::add_field( 'option',  array(
    'type'        => 'textarea',
    'settings'    => 'search_typing',
    'label'       => __( 'Multi-line Placeholder', 'ux-flat' ),
    'tooltip'  => __( 'Enabled' ).': UXF → Typed',
    'section'     => 'header_search',
    'active_callback' => array(
        array(
            'setting'  => 'search_placeholder',
            'operator' => '!=',
            'value'    => '',
        ),
    ),
	'default'     => '',
));