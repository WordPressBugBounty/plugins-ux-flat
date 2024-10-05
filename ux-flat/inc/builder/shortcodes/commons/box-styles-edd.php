<?php

if(!$default_text_align) $default_text_align = 'left';

return array(

    //
    // Image options
    //
    'image_options' => array(
        'type' => 'group',
        'heading' => __( 'Image' ),
        'options' => array(

            'image_height' => array(
              'type' => 'scrubfield',
              'heading' => __('Height'),
              'conditions' => 'type !== "grid"',
              'default' => '',
              'placeholder' => __('Auto'),
              'min' => 0,
              'max' => 1000,
              'step' => 1,
              'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/image-heights.php' ),
               'on_change' => array(
                    'selector' => '.box-image-inner',
                    'style' => 'padding-top: {{ value }}'
                )
            ),

            'image_width' => array(
                'type' => 'slider',
                'heading' => __( 'Width' ),
                'unit' => '%',
                'default' => 100,
                'max' => 100,
                'min' => 0,
                'on_change' => array(
                    'selector' => '.box-image',
                    'style' => 'width: {{ value }}%'
                )
            ),

            'image_direction' => array(
                'type' => 'radio-buttons',
                'heading' => __( 'Direction' ),
                'conditions' => 'style == "vertical"',
                'default' => '',
                'options' => array(
                    '' => array( 'title' => 'Default' ),
                    'reverse' => array( 'title' => 'Reverse' ),
                ),
            ),

            'image_radius' => array(
                'type' => 'slider',
                'heading' => __( 'Radius' ),
                'unit' => 'px',
                'default' => 0,
                'max' => 100,
                'min' => 0,
                'on_change' => array(
                    'selector' => '.box-image-inner',
                    'style' => 'border-radius: {{ value }}px'
                )
            ),

            'image_size' => array(
                'type' => 'select',
                'heading' => __( 'Size' ),
                'default' => '',
                'options' => array(
                    '' => 'Default',
                    'large' => 'Large',
                    'medium' => 'Medium',
                    'thumbnail' => 'Thumbnail',
                    'original' => 'Original',
                )
            ),

            'image_overlay' => array(
                'type' => 'colorpicker',
                'heading' => __( 'Overlay' ),
                'default' => '',
                'alpha' => true,
                'format' => 'rgb',
                'position' => 'bottom right',
                'on_change' => array(
                    'selector' => '.overlay',
                    'style' => 'background-color: {{ value }}'
                )
            ),
            
            'image_icon' => array(
                'conditions' => 'image_overlay',
                'type'       => 'textfield',
                'heading'    => 'Icon Class',
                'default'    => '',
                'auto_focus' => true,
            ),

            'image_hover' => array(
                'type' => 'select',
                'heading' => __( 'Hover' ),
                'default' => '',
                'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/image-hover.php' ),
                'on_change' => array(
                    'selector' => '.image-cover',
                    'class' => 'image-{{ value }}'
                )
            ),
            'image_hover_alt' => array(
                'type' => 'select',
                'heading' => __( 'Hover Alt' ),
                'default' => '',
                'conditions' => 'image_hover',
                'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/image-hover.php' ),
                'on_change' => array(
                    'selector' => '.image-cover',
                    'class' => 'image-{{ value }}'
                )
            ),
           'image_depth' => array(
                'type' => 'slider',
                'heading' => __( 'Image Depth' ),
                'default' => '0',
                'max' => '5',
                'min' => '0',
                'on_change' => array(
                    'selector' => '.box-image',
                    'class' => 'box-shadow-{{ value }}'
                )
            ),
            'image_depth_hover' => array(
                'type' => 'slider',
                'heading' => __( 'Image Depth Hover' ),
                'default' => '0',
                'max' => '5',
                'min' => '0',
                'on_change' => array(
                    'selector' => '.box-image',
                    'class' => 'box-shadow-{{ value }}-hover'
                )
            ),
        ),
    ),

    //
    // Text options
    //

    'text_options' => array(
        'type' => 'group',
        'heading' => __( 'Text' ),
        'options' => array(

            'text_pos' => array(
                'type' => 'select',
                'heading' => __( 'Position' ),
                'conditions' => 'style === "vertical" || style === "shade" || style === "overlay"',
                'default' => 'bottom',
                'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-v.php' ),

                'on_change' => array(
                    'selector' => '.box',
                    'class' => 'box-text-{{ value }}'
                )
            ),

            'text_align' => array(
                'type' => 'radio-buttons',
                'heading' => __( 'Align' ),
                'default' => $default_text_align,
                'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
                'on_change' => array(
                    'selector' => '.box-text',
                    'class' => 'text-{{ value }}'
                )
            ),

            'text_size' => array(
                'type' => 'radio-buttons',
                'heading' => __( 'Size' ),
                'default' => 'medium',
                'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/text-sizes.php' ),
                'on_change' => array(
                    'selector' => '.box-text',
                    'class' => 'is-{{ value }}'
                )
            ),

            'text_hover' => array(
                'type' => 'select',
                'heading' => __( 'Hover' ),
                'default' => '',
                'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/text-hover.php' ),
            ),
            
            'text_only'      => array(
                'type'    => 'checkbox',
                'heading' => 'Only Text',
                'conditions' => 'text_hover !== ""',
            ),
            'text_only_padding' => array(
              'type' => 'margins',
              'heading' => __( 'Only Text Padding' ),
              'conditions' => 'text_hover !== ""',
              'value' => '',
              'full_width' => true,
              'min' => 0,
              'max' => 100,
              'step' => 1,

              'on_change' => array(
                    'selector' => '.box-text-only',
                    'style' => 'padding: {{ value }}'
                )
            ),

            'text_bg' => array(
                'type' => 'colorpicker',
                'heading' => __( 'Bg Color' ),
                'default' => '',
                'alpha' => true,
                'format' => 'rgb',
                'position' => 'bottom right',
                'on_change' => array(
                    'selector' => '.box-text',
                    'style' => 'background-color:{{ value }}'
                )
            ),

            'text_color' => array(
                'type' => 'radio-buttons',
                'heading' => __( 'Color' ),
                'conditions' => 'style !== "shade" && style !== "overlay"',
                'default' => 'light',
                'options' => array(
                    'light' => array( 'title' => 'Dark' ),
                    'dark' => array( 'title' => 'Light' ),
                ),
            ),
            'text_padding' => array(
              'type' => 'margins',
              'heading' => __( 'Padding' ),
              'value' => '',
              'full_width' => true,
              'min' => 0,
              'max' => 100,
              'step' => 1,

              'on_change' => array(
                    'selector' => '.box-text',
                    'style' => 'padding: {{ value }}'
                )
            ),
        ),
    ),
    'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php')
);
