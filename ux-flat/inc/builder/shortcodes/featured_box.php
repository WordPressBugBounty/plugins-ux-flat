<?php

add_ux_builder_shortcode( 'featured_box',
	array(
		'type'      => 'container',
		'name'      => __( 'Icon Box' ),
		'category'  => __( 'Content' ),
        'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/icon_box.svg',
		'wrap'      => false,
		'presets'   => array(
			array(
				'name'    => __( 'Default' ),
				'content' => '[featured_box]<h3>Lorem ipsum dolor sit amet</h3><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat....</p>[/featured_box]',
			),
		),
        'styles' => array(
          'uxf-hover' => UXF_URL . 'assets/css/hover.min.css'
        ),
		'options'   => array(
			'img'         => array(
				'type'    => 'image',
				'heading' => 'Icon',
				'value'   => '',
			),
			'inline_svg'  => array(
				'type'    => 'checkbox',
                'conditions' => 'img !== ""',
				'heading' => 'Inline SVG',
				'default' => 'true',
			),
            'icon_custom' => array(
                'conditions' => 'img == ""',
                'type'       => 'textfield',
                'heading'    => 'Icon Class',
                'default'    => '',
            ),
			'img_width'   => array(
				'type'      => 'slider',
				'heading'   => 'Icon Width',
				'unit'      => 'px',
				'default'   => 60,
				'max'       => 600,
				'min'       => 20,
				'on_change' => array(
					'selector' => '.icon-box-img',
					'style'    => 'width: {{ value }}px',
				),
			),
			'pos'         => array(
				'type'      => 'select',
				'heading'   => 'Icon Position',
				'default'   => 'top',
				'options'   => array(
					'top'    => 'Top',
					'center' => 'Center',
					'left'   => 'Left',
					'right'  => 'Right',
				),
			),
			'title'       => array(
				'type'      => 'textfield',
				'heading'   => 'Title',
				'value'     => '',
				'on_change' => array(
					'selector' => '.icon-box-text h5',
					'content'  => '{{ value }}',
				),
			),
			'title_small' => array(
				'type'      => 'textfield',
				'heading'   => 'Title Small',
				'value'     => '',
				'on_change' => array(
					'selector' => '.icon-box-text h6',
					'content'  => '{{ value }}',
				),
			),
			'tooltip'     => array(
				'type'    => 'textfield',
				'heading' => 'Tooltip',
				'value'   => '',
			),
			'font_size'   => array(
				'type'      => 'radio-buttons',
				'heading'   => __( 'Text Size' ),
				'default'   => 'medium',
				'options'   => require( get_template_directory() . '/inc/builder/shortcodes/values/text-sizes.php' ),
				'on_change' => array(
					'recompile' => false,
					'class'     => 'is-{{ value }}',
				),
			),
			'margin'      => array(
				'type'      => 'margins',
				'heading'   => __( 'Margin' ),
				'value'     => '',
				'default'   => '',
				'min'       => -100,
				'max'       => 100,
				'step'      => 1,
				'on_change' => array(
					'selector' => '.icon-box',
					'style'    => 'margin: {{ value }}',
				),
			),
			'icon_border' => array(
				'type'      => 'slider',
				'heading'   => 'Icon Border',
				'unit'      => 'px',
				'default'   => 0,
				'max'       => 10,
				'min'       => 0,
				'on_change' => array(
					'selector' => '.has-icon-bg .icon-inner',
					'style'    => 'border-width: {{ value }}px',
				),
			),
			'icon_border_color'  => array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Icon Border Color' ),
				'format'      => 'rgb',
				'position'    => 'bottom right',
				'on_change'   => array(
					'selector' => '.icon-inner',
					'style'    => 'border-color: {{ value }}',
				),
			),
            'icon_size' => array(
                'type' => 'scrubfield',
                'conditions' => 'img == ""',
                'heading' => __( 'Icon Size' ),
                'default' => '16px',
                'min' => 0,
            ),
			'icon_align'         => array(
				'type'      => 'select',
				'heading'   => 'Icon Align',
				'default'   => '',
				'options'   => array(
					''   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
			),
			'icon_bgcolor'  => array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Icon Bg Color' ),
				'format'      => 'rgb',
				'position'    => 'bottom right',
				'on_change'   => array(
					'selector' => '.icon-inner',
					'style'    => 'background-color: {{ value }}',
				),
			),
			'icon_color'  => array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Icon Color' ),
				'description' => __( 'Only works for simple SVG icons' ),
				'format'      => 'rgb',
				'position'    => 'bottom right',
				'on_change'   => array(
					'selector' => '.icon-inner > *',
					'style'    => 'color: {{ value }}',
				),
			),
            'hover_options'     => array(
                'type'    => 'group',
                'heading' => 'UXF Hover',
                'options' => array(
                    'box_hover'     => array(
                        'type'    => 'select',
                        'heading' => 'Hover',
                        'default' => '',
                        'options' => require( UXF_PATH . '/inc/builder/shortcodes/values/hover.php' ),
                    ),
                ),
            ),
            'timeline' => array(
                'type'    => 'radio-buttons',
                'heading' => __( 'Timeline' ),
                'default' => '',
                'options' => array(
                    ''     => array( 'title' => 'Off' ),
                    'true' => array( 'title' => 'On' ),
                ),
            ),
            'timeline_top' => array(
                'type' => 'slider',
                'conditions' => 'timeline == "true"',
                'heading' => __('Timeline Top'),
                'responsive' => true,
                'unit' => '%',
                'max' => '100',
                'min' => '0',
            ),
            'timeline_left' => array(
                'type' => 'slider',
                'conditions' => 'timeline == "true"',
                'heading' => __('Timeline Left'),
                'responsive' => true,
                'unit' => '%',
                'max' => '100',
                'min' => '0',
            ),
            'timeline_height' => array(
                'type' => 'slider',
                'conditions' => 'timeline == "true"',
                'heading' => __('Timeline Height'),
                'responsive' => true,
                'unit' => '%',
                'max' => '100',
                'min' => '0',
            ),
            'timeline_width' => array(
                'type' => 'scrubfield',
                'conditions' => 'timeline == "true"',
                'heading' => __( 'Timeline Width' ),
                'min' => 0,
            ),
			'link_group'  => require( get_template_directory() . '/inc/builder/shortcodes/commons/links.php' ),
			'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
		),
	)
);
