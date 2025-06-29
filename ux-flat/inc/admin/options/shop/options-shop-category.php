<?php
Flatsome_Option::add_field( 'option', array(
	'type'     => 'select',
	'settings' => 'product_title',
	'label'    => __( 'Change Product Title', 'ux-flat' ),
	'section'  => 'woocommerce_product_catalog',
    'choices' => array(
        ''  => __('No'),
        'h3' => 'h3',
        'h4' => 'h4',
        'h5' => 'h5',
        'h6' => 'h6',
        'div' => 'div',
        'span' => 'span',
    ),
	'default'  => '',
));