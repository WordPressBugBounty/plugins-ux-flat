<?php

// Set defaults
$repeater_columns = '4';
$repeater_type = 'slider';
$repeater_post_type = 'post';
$repeater_col_spacing = 'normal';

$repeater_post_cat = 'category';
$default_text_align = 'center';

$options =  array(
'style_options' => array(
    'type' => 'group',
    'heading' => __( 'Style' ),
    'options' => array(
         'style' => array(
            'type' => 'select',
            'heading' => __( 'Style' ),
            'default' => '',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/box-layouts.php' )
        )
    ),
),
'layout_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/repeater-options.php' ),
'relay_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/relay.php' ),
'layout_options_slider' => require( UXF_PATH . '/inc/builder/shortcodes/commons/repeater-slider.php' ),
'post_options' => require( UXF_PATH . '/inc/builder/shortcodes/commons/repeater-posts.php' ),
'banner_options' => require( UXF_PATH . '/inc/builder/shortcodes/commons/box-banner.php' ),
'post_title_options' => array(
    'type' => 'group',
    'heading' => __( 'Title' ),
        'options' => array(
            'title_size' => array(
                'type' => 'select',
                'heading' => __('Title Size'),
                'default' => '',
                'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/sizes.php' )
            ),
            'title_tag' => array(
                'type'    => 'select',
                'heading' => __('Title Tag'),
                'default' => 'h3',
                'options' => array(
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'p' => 'P',
                    'span' => 'Span',
                    'div' => 'Div',
                ),
            ),
            'title_style' => array(
                'type' => 'radio-buttons',
                'heading' => __('Title Style'),
                'default' => '',
                'options' => array(
                    ''   => array( 'title' => 'Abc'),
                    'uppercase' => array( 'title' => 'ABC'),
                )
        ),
    )
),
'read_more_button' => array(
    'type' => 'group',
    'heading' => __( 'Read More' ),
        'options' => array(
            'readmore' => array(
                'type' => 'textfield',
                'heading' => __('Text'),
                'default' => '',
            ),
            'readmore_color' => array(
            'type' => 'select',
            'heading' => __('Color'),
            'conditions' => 'readmore',
            'default' => '',
            'options' => array(
                '' => 'Default',
                'primary' => 'Primary',
                'secondary' => 'Secondary',
                'alert' => 'Alert',
                'success' => 'Success',
                'white' => 'White',
            )
        ),
        'readmore_style' => array(
            'type' => 'select',
            'heading' => __('Style'),
            'conditions' => 'readmore',
            'default' => 'outline',
            'options' => array(
                '' => 'Default',
                'outline' => 'Outline',
                'link' => 'Simple',
                'underline' => 'Underline',
                'shade' => 'Shade',
                'bevel' => 'Bevel',
                'gloss' => 'Gloss',
            )
        ),
        'readmore_size' => array(
            'type' => 'select',
            'conditions' => 'readmore',
            'heading' => 'Size',
            'default' => '',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/sizes.php' ),
        ),
    )
),
'post_meta_options' => array(
    'type' => 'group',
    'heading' => __( 'Meta' ),
    'options' => array(
    'show_date' => array(
        'type' => 'select',
        'heading' => 'Date',
        'default' => 'badge',
        'options' => array(
            'badge' => 'Badge',
            'text' => 'Text',
            'false' => 'Hidden',
        )
    ),
    'badge_style' => array(
        'type' => 'select',
        'heading' => __('Badge Style'),
        'default' => '',
        'conditions' => 'show_date == "badge"',
        'options' => array(
            '' => __('Default'),
            'outline' => 'Outline',
            'square' => 'Square',
            'circle' => 'Circle',
            'circle-inside' => 'Circle Inside',
        )
    ),
    'excerpt' => array(
        'type' => 'select',
        'heading' => __('Excerpt'),
        'default' => 'visible',
        'options' => array(
            'visible' => __('Visible'),
            'fade' => 'Fade In On Hover',
            'slide' => 'Slide In On Hover',
            'reveal' => 'Reveal On Hover',
            'false' => __('Hidden'),
        )
    ),
   'excerpt_length' => array(
        'type' => 'slider',
        'heading' => __('Excerpt Length'),
        'default' => 15,
        'max' => 100,
        'min' => 5,
    ),
    'custom_fields' => array(
        'type' => 'checkbox',
        'heading' => __('Custom Fields'),
        'description' => 'flatsome_blog_post_field',
        'conditions' => 'excerpt !== "false"',
    ),
    'show_category' => array(
        'type' => 'select',
        'heading' => __('Categories'),
        'default' => 'false',
        'options' => array(
            'label' => __('Label'),
            'text' => __('Text'),
            'false' => __('Hidden'),
        )
    ),
    'show_author' => array(
        'type' => 'select',
        'heading' => __('Author'),
        'default' => 'false',
        'options' => array(
            'badge' => __('Badge'),
            'text' => __('Text'),
            'false' => __('Hidden'),
        )
    ),
    'show_avatar' => array(
        'type' => 'checkbox',
        'heading' => __('Avatar'),
        'conditions' => 'show_author !== "false"',
        'default' => '',
    ),
    'comments' => array(
        'type' => 'checkbox',
        'heading' => __('Comments'),
        'default' => '',
    ),
    'divider' => array(
        'type' => 'checkbox',
        'heading' => __('Divider'),
        'default' => '',
    ),
    'v_align' => array(
        'type' => 'radio-buttons',
        'heading' => __('Align Vertical'),
        'full_width' => true,
        'default' => '',
        'options' => array(
            '' => array( 'title' => 'None'),
            'equal' => array( 'title' => 'Equal'),
        )
    ),
    'col_style' => array(
        'type' => 'radio-buttons',
        'heading' => __('Column Style'),
        'full_width' => true,
        'default' => '',
        'options' => array(
            '' => array( 'title' => 'Normal'),
            'divided' => array( 'title' => 'Divided'),
            'dashed' => array( 'title' => 'Dashed'),
            'solid' => array( 'title' => 'Solid'),
        ),
    ),
    'col_padding' => array(
      'type' => 'margins',
      'heading' => __( 'Column Padding' ),
      'value' => '',
      'full_width' => true,
      'min' => 0,
      'max' => 100,
      'step' => 1,
      'on_change' => array(
            'selector' => '.post-item',
            'style' => 'padding: {{ value }}'
        )
    ),
    'col_bg' => array(
        'type' => 'colorpicker',
        'heading' => __('Column Background'),
        'format' => 'rgb',
        'alpha' => true,
        'position' => 'bottom right',
        'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
    ),

    'col_bg_radius' => array(
        'type'       => 'slider',
        'vertical'   => true,
        'full_width' => true,
        'heading'    => __( 'Column Radius' ),
        'unit'       => 'px',
        'default'    => 0,
        'min'        => 0,
        'max'        => 100,
    ),
),
),
);
$box_styles = require( UXF_PATH . '/inc/builder/shortcodes/commons/box-styles.php' );
$options = array_merge($options, $box_styles);


add_ux_builder_shortcode( 'blog_posts', array(
    'name' => __( 'Blog posts' ),
    'category' => __( 'Content' ),
    'thumbnail' =>  get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/blog_posts.svg',
    'scripts' => array(
        'flatsome-masonry-js' => get_template_directory_uri() .'/assets/libs/packery.pkgd.min.js',
    ),

    'presets' => array(
        array(
            'name' => __( 'Normal' ),
            'content' => '[blog_posts style="normal" columns="3" columns__md="1" image_height="56.25%"]'
        ),
        array(
            'name' => __( 'Bounce' ),
            'content' => '[blog_posts style="bounce" badge_style="square" image_height="75%"]'
        ),
        array(
            'name' => __( 'Push' ),
            'content' => '[blog_posts style="push" columns="3" columns__md="1" badge_style="circle-inside" image_height="75%"]'
        ),
        array(
            'name' => __( 'Vertical' ),
            'content' => '[blog_posts style="vertical" slider_nav_style="simple" slider_nav_position="outside" columns="2" columns__md="1" depth="2" image_height="89%" image_width="43"]'
        ),
        array(
            'name' => __( 'Overlay' ),
            'content' => '[blog_posts style="overlay" depth="1" title_style="uppercase" show_date="text" image_height="144%" image_overlay="rgba(0, 0, 0, 0.17)" image_hover="zoom"]'
        ),
        array(
            'name' => __( 'Overlay - Grayscale' ),
            'content' => '[blog_posts style="overlay" depth="1" animate="fadeInLeft" title_style="uppercase" show_date="text" image_height="144%" image_overlay="rgba(0, 0, 0, 0.56)" image_hover="color" image_hover_alt="overlay-remove-50"]'
       ),
        array(
            'name' => __( 'Masonery' ),
            'content' => '[blog_posts type="masonry" columns="3" depth="2" image_height="180px"]'
       ),
       array(
            'name' => __( 'Grid' ),
            'content' => '[blog_posts style="shade" type="grid" columns="3" depth="1" posts="4" title_size="larger" title_style="uppercase" readmore="Read More" badge_style="circle-inside" image_height="180px"]'
       ),
       array(
            'name' => __( 'Full Slider' ),
            'content' => '[blog_posts style="shade" type="slider-full" grid="2" slider_nav_style="circle" columns="1" title_size="larger" show_date="text" excerpt="false" show_category="label" comments="false" image_size="large" image_overlay="rgba(0, 0, 0, 0.09)" image_hover="overlay-remove" text_size="large" text_hover="bounce" text_padding="10% 0px 10% 0px"]'
        ),
),

    'options' => $options
) );
