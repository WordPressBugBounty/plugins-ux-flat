<?php

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'lightbox_close',
	'label'    => __('Lightbox Close Inside', 'ux-flat'),
	'section'  => 'lightbox',
	'default'  => 0,
) );