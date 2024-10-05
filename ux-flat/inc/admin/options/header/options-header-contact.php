<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfheadercontact',
	'section'  => 'header_contact',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_contact_fixed',
	'label'    => __( 'Contact All in One', 'flatsome-admin' ),
	'section'  => 'header_contact',
	'default'  => 0,
));