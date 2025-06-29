<?php
Flatsome_Option::add_field( '', array(
    'type'     => 'custom',
    'settings' => 'blog_single_uxf',
    'section'  => 'blog-single',
    'default'  => '<div class="options-title-divider">UX Flat</div>',
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'checkbox',
	'settings' => 'blog_single_divider',
	'label'    => __( 'Hide Divider', 'ux-flat' ),
	'section'  => 'blog-single',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-buttonset',
	'settings' => 'uxf_posted_on',
	'label'    => __( 'Customize Post On', 'ux-flat' ),
	'section'  => 'blog-single',
	'default'  => '',
    'choices'  => array(
        ''  => __( 'No' ),
        1 => __( 'Text'),
        2 => __( 'Icon'),
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-buttonset',
	'settings' => 'uxf_posted_align',
	'label'    => __( 'Justify Content', 'ux-flat' ),
	'section'  => 'blog-single',
	'default'  => '',
    'choices'  => array(
        ''  => __( 'Left' ),
        'space-between' => __( 'Between'),
        'space-around' => __( 'Around'),
        
	),
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '!==',
			'value'    => '',
		),
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'multicheck',
	'settings' => 'uxf_posted_all',
	'label'    => __( 'Show Post On', 'ux-flat' ),
	'section'  => 'blog-single',
    'choices'  => [
        1 => __( 'Author' ),
        2 => __( 'Time' ),
        3 => __( 'Views' ),
        4 => __( 'Read' ),
        5 => __( 'Video' ),
        6 => __( 'Rating' ),
        7 => __( 'Google News' ),
    ],
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_on',
			'operator' => '!==',
			'value'    => '',
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'text',
	'settings' => 'uxf_posted_view',
	'label'    => __( 'Views Shortcode', 'ux-flat' ),
    'description'    => 'E.g: [views]',
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_all',
			'operator' => 'contains',
			'value'    => 3,
		),
	),
	'default'  => '',
));

if (UXFPro()) {
    Flatsome_Option::add_field( 'option', array(
        'type'     => 'text',
        'settings' => 'uxf_posted_video',
        'label'    => __( 'Video Fields', 'ux-flat' ),
        'description'    => 'E.g: _video',
        'section'  => 'blog-single',
        'active_callback' => array(
            array(
                'setting'  => 'uxf_posted_all',
                'operator' => 'contains',
                'value'    => 5,
            ),
        ),
        'default'  => '',
    ));
}

Flatsome_Option::add_field( 'option', array(
	'type'     => 'text',
	'settings' => 'uxf_posted_rating',
	'label'    => __( 'Rating Shortcode', 'ux-flat' ),
    'description'    => 'E.g: [kkstarratings]',
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_all',
			'operator' => 'contains',
			'value'    => 6,
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'text',
	'settings' => 'uxf_posted_ggnews',
	'label'    => 'Google News URL',
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_posted_all',
			'operator' => 'contains',
			'value'    => 7,
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'author_box',
	'label'    => __( 'Blog author box (h5 tags, social)', 'ux-flat' ),
    'tooltip'  => __( 'Disable Blog author box & Next/Prev navigation', 'ux-flat' ),
	'section'  => 'blog-single',
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'single_next_prev_nav',
	'label'    => __( 'Next/Prev navigation', 'flatsome' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'author_box',
			'operator' => '===',
			'value'    => true,
		),
	),
	'default'  => 0,
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'text',
	'settings' => 'blog_single_refresh',
	'label'    => __( 'Post Refesh', 'ux-flat' ),
    'tooltip'  => __( 'Defines a time interval for the document to refresh itself. E.g. 1200 seconds', 'ux-flat' ),
	'section'  => 'blog-single',
	'default'  => '',
));


Flatsome_Option::add_field( 'option', array(
	'type'      => 'radio-buttonset',
	'settings' => 'uxf_related',
	'label'    => __( 'Related Post', 'ux-flat' ),
	'section'  => 'blog-single',
	'default'  => '',
    'choices'  => array(
        ''  => __( 'No' ),
        1 => __( 'After Blog', 'ux-flat'),
        2 => __( 'Before Comment', 'ux-flat'),
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'slider',
	'settings'     => 'uxf_related_posts',
	'label'       => __( 'Related Post Limit', 'ux-flat' ),
	'section'  => 'blog-single',
	'default'     => 5,
	'active_callback' => array(
		array(
			'setting'  => 'uxf_related',
			'operator' => '!==',
			'value'    => '',
		),
	),
	'choices'     => array(
		'min'  => 1,
		'max'  => 12,
		'step' => 1
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'multicheck',
	'settings' => 'uxf_related_order',
	'label'    => __( 'Related Post order by', 'ux-flat' ),
	'description'       => 'E.g: <code>[title tag_name="h3" size="100" text="Related Posts"][blog_posts style="normal" type="row" columns="4" columns__md="2"  show_date="false" v_align="equal" col_bg="rgb(239, 239, 239)" col_bg_radius="3" image_radius="3"  image_height="75%" image_hover="zoom" text_align="left" text_padding="20px 20px 20px 20px"]</code>',
	'section'  => 'blog-single',
    'choices'  => [
        1 => __( 'Tags' ),
        2 => __( 'Category' ),
        3 => __( 'Latest' ),
        4 => __( 'Older' ),
        5 => __( 'Custom Fields' ). '<code>related_posts</code> PRO',
    ],
	'active_callback' => array(
		array(
			'setting'  => 'uxf_related',
			'operator' => '!==',
			'value'    => '',
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'textarea',
	'settings' => 'uxf_related_tags',
	'label'    => __( 'Use shortcode by tags', 'ux-flat' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_related_order',
			'operator' => 'contains',
			'value'    => 1,
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'textarea',
	'settings' => 'uxf_related_cats',
	'label'    => __( 'Use shortcode by category', 'ux-flat' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_related_order',
			'operator' => 'contains',
			'value'    => 2,
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'textarea',
	'settings' => 'uxf_related_latest',
	'label'    => __( 'Use shortcode by latest', 'ux-flat' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_related_order',
			'operator' => 'contains',
			'value'    => 3,
		),
	),
	'default'  => '',
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'textarea',
	'settings' => 'uxf_related_older',
	'label'    => __( 'Use shortcode by older', 'ux-flat' ),
	'section'  => 'blog-single',
	'active_callback' => array(
		array(
			'setting'  => 'uxf_related_order',
			'operator' => 'contains',
			'value'    => 4,
		),
	),
	'default'  => '',
));

if (UXFPro()) {
    
    Flatsome_Option::add_field( 'option', array(
        'type'     => 'textarea',
        'settings' => 'uxf_related_field',
        'label'    => __( 'Use shortcode by Custom Field', 'ux-flat' ),
        'section'  => 'blog-single',
        'active_callback' => array(
            array(
                'setting'  => 'uxf_related_order',
                'operator' => 'contains',
                'value'    => 5,
            ),
        ),
        'default'  => '',
    ));

    Flatsome_Option::add_field( '', array(
        'type'     => 'custom',
        'settings' => 'blog_single_uxfp',
        'section'  => 'blog-single',
        'default'  => '<div class="options-title-divider" style="background: #00a0d2;">UX Flat PRO</div>',
    ));

    Flatsome_Option::add_field( 'option', array(
        'type'      => 'radio-buttonset',
        'settings'     => 'font_resizer',
        'label'       => __( 'Font Resizer', 'ux-flat' ),
        'description' => __( 'E.g: [font_resizer text="no"]', 'ux-flat' ),
        'section'  => 'blog-single',
        'default'  => '',
        'choices'  => array(
            ''  => __( 'Disabled' ),
            1 => __( 'Shortcode'),
            2 => __( 'Before Content'),
        ),
    ));

    Flatsome_Option::add_field( 'option',  array(
        'type'        => 'radio-buttonset',
        'settings'     => 'progress_reading',
        'label'       => __( 'Progress Reading', 'ux-flat' ),
        'section'     => 'blog-single',
        'default'  => '',
        'choices'  => array(
            ''  => __( 'Disabled' ),
            1 => __( 'Enabled'),
        ),
    ));

    Flatsome_Option::add_field( 'option', array(
        'type'     => 'radio-buttonset',
        'settings' => 'uxf_share',
        'label'    => __( 'Blog Share Fixed', 'ux-flat' ),
        'section'  => 'blog-single',
        'default'  => '',
        'choices'  => array(
            ''  => __( 'Disabled' ),
            1 => __( 'Enabled'),
        ),
    ));

    Flatsome_Option::add_field( 'option', array(
        'type'     => 'radio-buttonset',
        'settings' => 'uxf_copied',
        'label'    => __( 'URL Copied', 'ux-flat' ),
        'section'  => 'blog-single',
        'default'  => '',
        'choices'  => array(
            ''  => __( 'Disabled' ),
            1 => __( 'Enabled'),
        ),
    ));
}
