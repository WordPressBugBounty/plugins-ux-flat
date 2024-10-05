<?php
add_ux_builder_shortcode( 'ux_image', array(
    'name' => __( 'Image', 'ux-builder'),
    'category' => __( 'Content' ),
    'toolbar_thumbnail' => 'id',
    'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/ux_image.svg',
    'wrap' => false,

    'presets' => array(
        array(
            'name' => __( 'Blank' ),
            'content' => '[ux_image][/ux_image]',
        ),
    ),
    
    'styles' => array(
      'uxf-animate' => UXF_URL . 'assets/css/animate.min.css',
      'uxf-hover' => UXF_URL . 'assets/css/hover.min.css'
    ),
    
    'scripts' => array(
      'uxf-anidynamic' => UXF_URL . 'assets/js/animate.min.js',
    ),

    'options' => array(

        'id' => array(
            'type' => 'image',
            'heading' => __('Image'),
            'default' => ''
        ),
        'image_size' => array(
            'type' => 'select',
            'heading' => 'Image Size',
            'param_name' => 'image_size',
            'default' => 'large',
            'options' => flatsome_uxf_builder_image_sizes(),
        ),
        'url_id' =>   array(
          'type' => 'textfield',
          'conditions' => 'id == ""',
          'heading' => __('IMG URL'),
        ),
        'url_caption' =>   array(
          'type' => 'textfield',
          'conditions' => 'id == ""',
          'heading' => __('IMG Caption'),
        ),
        'width' => array(
          'type' => 'slider',
          'heading' => 'Width',
          'responsive' => true,
          'default' => '100',
          'unit' => '%',
          'max' => '100',
          'min' => '0',
          // 'on_change' => array(
          //   'style' => 'width: {{ value }}%'
          // ),
        ),
        'height' => array(
              'type' => 'scrubfield',
              'heading' => __('Height'),
              'default' => '',
              'placeholder' => __('Auto'),
              'min' => 0,
              'max' => 1000,
              'step' => 1,
              'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/image-heights.php' ),
               'on_change' => array(
                    'selector' => '.image-cover',
                    'style' => 'padding-top: {{ value }}'
                )
        ),
        'radius' => array(
              'type' => 'scrubfield',
              'heading' => __('Radius'),
              'default' => '',
              'placeholder' => __('Auto'),
              'min' => 0,
              'max' => 1000,
              'step' => 1,
              'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/image-heights.php' ),
               'on_change' => array(
                    'selector' => '.img-inner img',
                    'style' => 'border-radius: {{ value }}'
                )
        ),
        'margin' => array(
          'type' => 'margins',
          'heading' => __( 'Margin' ),
          'value' => '',
          'full_width' => true,
          'min' => -100,
          'max' => 100,
          'step' => 1,
        ),
        'lightbox' => array(
            'type' => 'radio-buttons',
            'heading' => __('Lightbox'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),

        'lightbox_image_size' => array(
	        'type'       => 'select',
	        'heading'    => __( 'Lightbox Image Size' ),
	        'conditions' => 'lightbox == "true"',
	        'default'    => 'large',
	        'options'    => flatsome_uxf_builder_image_sizes(),
        ),

        'caption' => array(
            'type' => 'radio-buttons',
            'heading' => __('Caption'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),

		'lightbox_caption'    => array(
			'type'       => 'radio-buttons',
			'heading'    => __( 'Caption on Lightbox' ),
			'conditions' => 'lightbox == "true"',
			'default'    => '',
			'options'    => array(
				''     => array( 'title' => 'Off' ),
				'true' => array( 'title' => 'On' ),
			),
		),

        'image_overlay' => array(
            'type' => 'colorpicker',
            'heading' => __( 'Image Overlay' ),
            'default' => '',
            'alpha' => true,
            'format' => 'rgb',
            'position' => 'bottom right',
            'on_change' => array(
              'selector' => '.overlay',
              'style' => 'background-color: {{ value }}',
            ),
         ),
        'parallax' => array(
            'type' => 'slider',
            'heading' => 'Parallax',
            'default' => '0',
            'max' => '10',
            'min' => '-10',
        ),
		// Animate
		'ani_options' => require( UXF_PATH . '/inc/builder/shortcodes/commons/animate.php' ),
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
        'link_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/links.php' ),
        'positions' => require( get_template_directory() . '/inc/builder/shortcodes/commons/position.php' ),
        'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
    ),
) );
