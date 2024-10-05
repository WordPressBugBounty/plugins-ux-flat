<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfbloglayout',
	'section'  => 'blog-layout',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_category_layout',
	'label'    => __( 'Custom Category Layout', 'flatsome-admin' ),
	'section'  => 'blog-layout',
	'default'  => 0,
));
