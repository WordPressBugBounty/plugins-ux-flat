<?php 
Flatsome_Option::add_field( '', array(
    'type'     => 'custom',
    'settings' => 'blog_archive_uxf',
    'section'  => 'blog-archive',
    'default'  => '<div class="options-title-divider" style="background: #00a0d2;">UX Flat</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_archive_meta',
	'label'    => __( 'Enable Blog Archive Meta Description', 'ux-flat' ),
	'section'  => 'blog-archive',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_archive_description',
	'label'    => __( 'Move Description To Bottom', 'ux-flat' ),
	'section'  => 'blog-archive',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_archive_subcat',
	'label'    => __( 'Enable Sub Categories', 'ux-flat' ),
	'section'  => 'blog-archive',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'blog_style_list',
	'label'    => __( 'List New Style', 'ux-flat' ),
	'section'  => 'blog-archive',
	'active_callback' => array(
		array(
			'setting'  => 'blog_style_archive',
			'operator' => '==',
			'value'    => 'list',
		),
	),
	'default'  => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'blog_archive_featured',
	'label'         => __( 'Blog Archive Featured', 'ux-flat' ),
	'description' => __( 'Enter HTML for list post here. Will be placed above content. Shortcodes are allowed. F.ex [blog_posts style="default" type="row"]', 'ux-flat' ),
	'section'     => 'blog-archive',
	'default'  => '',
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'blog_archive_layout',
	'label'       => __( 'Blog Archive Layout', 'ux-flat' ),
	'description' => __( 'Enter HTML for list post here. Will be placed above content. Shortcodes are allowed. F.ex [blog_posts style="default" type="row"]', 'ux-flat' ),
	'section'     => 'blog-archive',
	'default'  => '',
));