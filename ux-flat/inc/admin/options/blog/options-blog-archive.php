<?php 

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfblogarchive',
	'section'  => 'blog-archive',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_meta_desc',
	'label'    => __( 'Add meta description to top', 'flatsome-admin' ),
	'section'  => 'blog-archive',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_cat_desc',
	'label'    => __( 'Move description to bottom', 'flatsome-admin' ),
	'section'  => 'blog-archive',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_blog_style_archive',
	'label'    => __( 'Blog Style Archive', 'flatsome-admin' ),
	'section'  => 'blog-archive',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_archive_layout',
	'label'    => __( 'Custom Archive Layout', 'flatsome-admin' ),
	'section'  => 'blog-archive',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'textarea',
	'settings'     => 'uxf_blog_shortcode',
	'label'       => __( 'Blog Shortcode', 'flatsome-admin' ),
	'description' => __( 'Enter HTML for list post here. Will be placed above content. Shortcodes are allowed. F.ex [blog_posts style="default" type="row"]', 'flatsome-admin' ),
	'section'     => 'blog-archive',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_archive_layout',
			'operator' => '===',
			'value'    => true,
		),
	),
));

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfblogarchivepro',
	'section'  => 'blog-archive',
	'default'  => '<div class="options-title-divider">UXF Pro Options</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_cat_sub',
	'label'    => __( 'Enable Sub Categories', 'flatsome-admin' ),
	'section'  => 'blog-archive',
	'default'  => 0,
));