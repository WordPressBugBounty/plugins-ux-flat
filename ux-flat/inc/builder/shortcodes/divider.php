<?php

add_ux_builder_shortcode( 'divider', array(
    'name' => __( 'Divider' ),
    'category' => __( 'Content' ),
    'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/divider.svg',
    'options' => array(
        'align' => array(
            'type' => 'radio-buttons',
            'heading' => __('Align'),
            'default' => '',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
        ),
    	'width' => array(
    		'type' => 'scrubfield',
    		'heading' => __('Width'),
    		'default' => '30px',
            'min' => 0,
    	),
    	'height' => array(
    		'type' => 'scrubfield',
    		'heading' => __('Height'),
    		'default' => '3px',
            'min' => 0,
    	),
    	'margin' => array(
    		'type' => 'scrubfield',
    		'heading' => __('Margin'),
    		'default' => '1.0em',
            'step' => 0.1,
    	),
    	'radius' => array(
    		'type' => 'scrubfield',
    		'heading' => __('Radius'),
    		'default' => '',
            'step' => 1,
    	),
		'color' => array(
	      'type' => 'colorpicker',
	      'heading' => __('Color'),
	      'default' => '',
	      'alpha' => true,
	      'format' => 'rgb',
	      'position' => 'bottom right',
	    ),
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
        'img_color' => array(
            'conditions' => 'img !== ""',
            'type'     => 'colorpicker',
            'heading'  => 'SVG Fill Color',
            'default' => '',
            'format'   => 'hex',
            'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
        ),
        'img_bgcolor' => array(
            'conditions' => 'img !== ""',
            'type'     => 'colorpicker',
            'heading'  => 'SVG BG Color',
            'default' => '',
            'format'   => 'hex',
            'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
        ),
		'icon_options' => require( UXF_DIR . '/inc/builder/shortcodes/commons/icon.php' ),
        'icon_align' => array(
            'type' => 'radio-buttons',
            'heading' => 'Icon Align',
            'default' => '',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
        ),
        'icon_padding' => array(
          'type' => 'margins',
          'heading' => __( 'Padding' ),
          'value' => '',
          'full_width' => true,
          'min' => 0,
          'max' => 100,
          'step' => 1,
          'on_change' => array(
                'selector' => '.divider > i',
                'style' => 'padding: {{ value }}'
            )
        ),
    	'icon_radius' => array(
    		'type' => 'scrubfield',
    		'heading' => __('Radius'),
    		'default' => '',
            'step' => 1,
    	),
    )


) );