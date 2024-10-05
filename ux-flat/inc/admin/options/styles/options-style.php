<?php

Flatsome_Option::add_section( 'uxf-style', array(
	'title'       => __( 'Global Styles', 'flatsome-admin' ),
	'panel'       => 'uxf_theme_options',
) );

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfstyle',
	'section'  => 'uxf-style',
	'default'  => '<div class="options-title-divider">Button Color</div>',
) );
