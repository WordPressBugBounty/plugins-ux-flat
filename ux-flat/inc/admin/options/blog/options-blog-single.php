<?php

Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfblogsingle',
	'section'  => 'blog-single',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_single_divider',
	'label'    => __( 'Hidden Divider', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_posted_on',
	'label'    => __( 'Customize Post On', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_posted_icon',
	'label'    => __( 'Enable Dashicons', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_posted_author',
	'label'    => __( 'Author', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_posted_time',
	'label'    => __( 'Time', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_posted_view',
	'label'    => __( 'View', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'select',
	'settings' => 'uxf_posted_viewsc',
	'label'    => __( 'View', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_view',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => '',
    'choices'  => array(
        ''  => '-- None --',
        'post-views-counter' => 'Post Views Counter',
        'wp-postviews'   => 'WP-PostViews',
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_posted_read',
	'label'    => __( 'Read', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => 0,
));
if (uxf_pro_enabled()) {
    Flatsome_Option::add_field( 'option', array(
        'type'     => 'text',
        'settings' => 'uxf_posted_video',
        'label'    => __( 'Video Fields', 'flatsome-admin' ),
        'section'  => 'blog-single',
        'active_callback' => array(
            array(
                'setting'  => 'uxf_posted_on',
                'operator' => '===',
                'value'    => true,
            ),
        ),
        'default'  => '',
    ));
    }
Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_posted_kkstar',
	'label'    => __( 'KK Star Rating', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'text',
	'settings' => 'uxf_posted_ggnewsurl',
	'label'    => __( 'Google News', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_author_box',
	'label'    => __( 'Blog author box (Convert h5 to p)', 'flatsome' ),
	'description'    => __( 'Required: Disable Blog author box & Next/Prev navigation', 'flatsome' ),
	'section'  => 'blog-single',
	'default'  => 0,
));
Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_single_next_prev_nav',
	'label'    => __( 'Next/Prev navigation', 'flatsome' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_author_box',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'text',
	'settings' => 'uxf_post_refresh',
	'label'    => __( 'Post Refesh', 'flatsome-admin' ),
	'description'    => __( 'Defines a time interval for the document to refresh itself. E.g. 1200 seconds', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_post_tags',
	'label'    => __( 'Related Post order by tags', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_post_cats',
	'label'    => __( 'Related Post order by category', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_post_latest',
	'label'    => __( 'Related Post order by latest', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_post_older',
	'label'    => __( 'Related Post order by older', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_related_total',
	'label'       => __( 'Related Post Totals', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'     => 5,
	'choices'     => array(
		'min'  => 0,
		'max'  => 10,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'              => 'textarea',
	'settings'          => 'uxf_related_title',
	'label'             => __( 'Related Title', 'flatsome' ),
	'section'           => 'blog-single',
	'description'       => 'E.g: <code>[title style="center" tag_name="h2" size="100" text="{title}"]</code>',
	'default'           => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'              => 'textarea',
	'settings'          => 'uxf_related_posts',
	'label'             => __( 'Related Content', 'flatsome' ),
	'section'           => 'blog-single',
	'description'       => 'E.g: <code>[blog_posts style="push" type="slider" slider_nav_style="simple" columns="3" posts="6" show_date="false" text_align="left" image_height="56.25%"]</code>',
	'default'           => '',
) );

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'uxf_related_position',
	'label'    => __( 'Before Comments', 'flatsome-admin' ),
	'description'    => __( 'Default: After Blog', 'flatsome-admin' ),
	'section'  => 'blog-single',
	'default'  => 0,
));