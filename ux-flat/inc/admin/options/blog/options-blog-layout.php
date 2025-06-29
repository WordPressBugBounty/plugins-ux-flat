<?php
Flatsome_Option::add_field( '', array(
    'type'     => 'custom',
    'settings' => 'blog_layout_uxf',
    'section'  => 'blog-layout',
    'default'  => '<div class="options-title-divider">UX Flat</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_category_layout',
	'label'    => __( 'Custom Posts Layout', 'ux-flat' ),
	'tooltip'    => __( 'Custom layout on single category', 'ux-flat' ),
	'section'  => 'blog-layout',
	'default'  => 0,
));