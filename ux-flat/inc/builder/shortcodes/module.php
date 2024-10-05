<?php
add_ux_builder_shortcode( 'module', array(
    'type' => 'container',
    'name' => __( 'Module' ),
    'category' => __( 'UX Flat' ),
    'template' => flatsome_uxf_builder_template( 'module.html' ),
    'thumbnail' =>  flatsome_uxf_builder_thumbnail( 'module' ),
    'info' => '{{ text }}',
    'wrap' => false,
    'resize' => array( 'right' ),
    'move' => 'top-left',
    'options' => array(
      'layout_options' => array(
        'type' => 'group',
        'heading' => __( 'Layout' ),
        'options' => array(
            'sticky' => array(
                'type' => 'radio-buttons',
                'heading' => __('Sticky Column'),
                'default' => '',
                'options' => array(
                    ''  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'position' => array(
                'type' => 'select',
                'heading'    => __('Position'),
                'default' => '',
                'options' => array(
                    '' => 'Unset',
                    'absolute' => 'absolute',
                    'relative' => 'relative',
                    'fixed' => 'fixed',
                    'sticky' => 'sticky',
                )
            ),
            'top' => array(
              'type'    => 'scrubfield',
              'heading' => __( 'Top' ),
              'min'     => 0,
              'max'     => 1200,
              'step'    => 5,
            ),
            'left' => array(
              'type'    => 'scrubfield',
              'heading' => __( 'Left' ),
              'min'     => 0,
              'max'     => 1200,
              'step'    => 5,
            ),
            'right' => array(
              'type'    => 'scrubfield',
              'heading' => __( 'Right' ),
              'min'     => 0,
              'max'     => 1200,
              'step'    => 5,
            ),
            'bottom' => array(
              'type'    => 'scrubfield',
              'heading' => __( 'Bottom' ),
              'min'     => 0,
              'max'     => 1200,
              'step'    => 5,
            ),
            'zindex'    => array(
                'type'    => 'textfield',
                'heading' => 'Z-Index',
            ),
           'style' => array(
                'type' => 'radio-buttons',
                'heading' => __('Style'),
                'full_width' => true,
                'default' => '',
                'options' => array(
                    ''  => array( 'title' => 'Normal'),
                    'square'  => array( 'title' => 'Square'),
                    'circle'  => array( 'title' => 'Circle'),
                ),
            ),
            'text_color' => array(
                'type' => 'radio-buttons',
                'heading' => __('Color'),
                'default' => 'dark',
                'options' => array(
                    'light'  => array( 'title' => 'Light'),
                    'dark'  => array( 'title' => 'Dark'),
                ),
            ),
            'width' => array(
                'type' => 'slider',
                'heading' => __('Width'),
                'responsive' => true,
                'default' => '',
                'unit' => '%',
                'max' => '100',
                'min' => '0',
            ),
           'margin' => array(
              'type' => 'margins',
              'heading' => __('Margin'),
              'full_width' => true,
              'responsive' => true,
              'unit' => 'px',
              'min' => -200,
              'max' => 200,
              'step' => 1,
          ),
          'padding' => array(
                'type' => 'margins',
                'heading' => __('Padding'),
                'full_width' => true,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'responsive' => true,
          ),
           'rotate' => array(
              'type' => 'slider',
              'heading' => __('Rotate'),
              'default' => 0,
              'max' => 180,
              'min' => -180,
            ),
           'animate' => array(
              'type' => 'select',
              'heading' => __('Animate'),
              'default' => '',
              'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/animate.php' ),
          ),
        ),
    ),
    'text_options' => array(
        'type' => 'group',
        'heading' => __( 'Text' ),
        'options' => array(
          'text_align' => array(
              'type' => 'radio-buttons',
              'heading' => __('Align'),
              'default' => 'center',
              'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
            ),
           'text_depth' => array(
              'type' => 'slider',
              'heading' => __('Shadow'),
              'default' => '0',
              'unit' => '+',
              'max' => '5',
              'min' => '0',
            ),
            'onclick'    => array(
                'type'    => 'textfield',
                'heading' => 'OnClick',
            ),
        )
    ),
    'bg_options' => array(
        'type' => 'group',
        'heading' => __( 'Background' ),
        'options' => array(

          'bg' => array(
            'type' => 'colorpicker',
            'heading' => __('BG Color'),
            'alpha' => true,
            'format' => 'rgb',
            'position' => 'bottom right',
          ),
          'opacity' => array(
              'type'    => 'radio-buttons',
              'heading' => 'Opacity',
              'default' => '',
              'options' => array(
                  ''     => array( 'title' => 'Off' ),
                  'true' => array( 'title' => 'On' ),
              ),
          ),
            'radius' => array(
              'type' => 'slider',
              'heading' => __('Radius'),
              'default' => 0,
              'unit' => 'px',
              'max' => 500,
              'min' => 0,
            ),
            'depth' => array(
              'type' => 'slider',
              'heading' => __('Depth'),
              'default' => '0',
              'unit' => '+',
              'max' => '5',
              'min' => '0',
            ),
            'depth_hover' => array(
              'type' => 'slider',
              'heading' => __('Depth :hover'),
              'default' => '0',
              'unit' => '+',
              'max' => '5',
              'min' => '0',
            ),
        )
    ),
    'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
  )
));
