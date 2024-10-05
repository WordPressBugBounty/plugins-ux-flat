<?php

add_ux_builder_shortcode( 'ux_slider', array(
    'type' => 'container',
    'name' => __( 'Slider' ),
    'category' => __( 'Layout' ),
    'message' => __( 'Add slides here' ),
    'directives' => array( 'ux-slider' ),
    'allow' => array( 'ux_banner','ux_image','ux_lottie','section','row','ux_banner_grid','logo'),
    'template' => flatsome_uxf_builder_template( 'ux_slider.html' ),
    'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/slider.svg',
    'tools' => 'shortcodes/ux_slider/ux-slider-tools.directive.html',
    'wrap'   => false,
    'info' => '{{ label }}',
    'priority' => -1,

    'toolbar' => array(
        'show_children_selector' => true,
        'show_on_child_active' => true,
    ),

    'children' => array(
        'inline' => true,
        'addable_spots' => array( 'left', 'right' )
    ),

    /*
    'presets' => array(
        array(
            'name' => __( 'Default' ),
            'content' => '[ux_slider]',
        ),
        array(
            'name' => __( 'Simple Banner' ),
            'content' => '[ux_slider][ux_banner][/ux_slider]',
        ),
    ), */

    'options' => array(
        'label' => array(
            'type' => 'textfield',
            'heading' => 'Admin label',
            'placeholder' => 'Enter admin label...'
        ),
        'type' => array(
          'type' => 'select',
          'heading' => 'Type',
          'default' => 'slide',
          'options' => array(
            'slide' => 'Slide',
            'fade' => 'Fade',
          ),
        ),
        'ken_burns' => array(
            'type' => 'radio-buttons',
            'heading' => __('Ken Burns'),
            'conditions' => 'type !== "slide"',
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),
        'layout_options' => array(
          'type' => 'group',
          'heading' => __( 'Layout' ),
          'options' => array(
            'style' => array(
              'type' => 'select',
              'heading' => 'Style',
              'default' => 'normal',
              'options' => array(
                  'normal' => 'Default',
                  'container' => 'Container',
                  'focus' => 'Focus',
                  'shadow' => 'Shadow',
              ),
              'conditions' => 'type !== "fade"',
            ),
            'slide_width' => array(
              'type' => 'scrubfield',
              'responsive' => true,
              'heading' => 'Slide Width',
              'placeholder' => 'Width in Px',
              'default' => '',
              'min' => '0',
              'conditions' => 'type !== "fade"',
            ),

            'slide_align' => array(
              'type' => 'select',
              'heading' => 'Slide Align',
              'default' => 'center',
              'options' => array(
                  'center' => 'Center',
                  'left' => 'Left',
                  'right' => 'Right',
              ),
              'conditions' => 'type !== "fade"',
            ),
            'slide_classes' => array(
                'type' => 'radio-buttons',
                'heading' => __('Next Prev Classes'),
                'default' => '',
                'options' => array(
                    ''  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'slide_click' => array(
                'type' => 'radio-buttons',
                'heading' => __('Slide Click'),
                'default' => '',
                'options' => array(
                    ''  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'bg_color' => array(
              'type' => 'colorpicker',
              'heading' => __('Bg Color'),
              'format' => 'rgb',
              'position' => 'bottom right',
              'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
            ),
            'margin' => array(
              'type' => 'scrubfield',
              'responsive' => true,
              'heading' => __('Margin'),
              'default' => '0px',
              'min' => 0,
              'max' => 100,
              'step' => 1
            ),
            'infinitive' => array(
                'type' => 'radio-buttons',
                'heading' => __('Infinitive'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'freescroll' => array(
                'type' => 'radio-buttons',
                'heading' => __('Free Scroll'),
                'default' => 'false',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'draggable' => array(
                'type' => 'radio-buttons',
                'heading' => __('Draggable'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'parallax' => array(
                'type' => 'slider',
                'heading' => 'Parallax',
                'unit' => '+',
                'default' => 0,
                'max' => 10,
                'min' => 0,
            ),
            'mobile' => array(
                'type' => 'radio-buttons',
                'heading' => __('Show for Mobile'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
          ),
        ),

        'nav_options' => array(
          'type' => 'group',
          'heading' => __( 'Navigation' ),
          'options' => array(
            'hide_nav' => array(
                'type' => 'radio-buttons',
                'heading' => __('Always Visible'),
                'default' => '',
                'options' => array(
                    ''  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'nav_pos' => array(
              'type' => 'select',
              'heading' => 'Position',
              'default' => '',
              'options' => array(
                  '' => 'Inside',
                  'outside' => 'Outside',
              )
            ),
           'nav_size' => array(
              'type' => 'select',
              'heading' => 'Size',
              'default' => 'large',
              'options' => array(
                  'large' => 'Large',
                  'normal' => 'Normal',
              )
            ),
            'arrows' => array(
              'type' => 'radio-buttons',
              'heading' => __('Arrows'),
              'default' => 'true',
              'options' => array(
                'false'  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
                ),
            ),
            'arrow_shape' => array(
              'type' => 'select',
              'heading' => 'Arrow Shape',
              'default' => '',
              'options' => array(
                  '' => 'Default',
                  'style1' => 'Style 1',
                  'style2' => 'Style 2',
                  'style3' => 'Style 3',
              )
            ),
            'nav_style' => array(
              'type' => 'select',
              'heading' => __('Arrow Style'),
              'default' => 'circle',
              'options' => array(
                  'circle' => 'Circle',
                  'simple' => 'Simple',
                  'reveal' => 'Reveal',
              )
            ),
            'nav_color' => array(
                'type' => 'radio-buttons',
                'heading' => __('Arrow Color'),
                'default' => 'light',
                'options' => array(
                    'dark'  => array( 'title' => 'Dark'),
                    'light'  => array( 'title' => 'Light'),
                ),
            ),
            'nav_position' => array(
              'type' => 'select',
              'heading' => 'Arrow Position',
              'default' => '',
              'options' => array(
                  '' => 'Default',
                  'top-left' => 'Top Left',
                  'top-right' => 'Top Right',
                  'bottom-left' => 'Bottom Left',
                  'bottom-center' => 'Bottom Center',
                  'bottom-right' => 'Bottom Right',
              )
            ),
            'nav_invert' => array(
              'type' => 'colorpicker',
              'heading' => __('Arrows Invert'),
              'format' => 'rgb',
              'position' => 'bottom right',
              'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
              'conditions' => 'nav_style == "simple"',
            ),
            'nav_radius' => array(
                'type' => 'slider',
                'heading' => 'Arrows Radius',
                'unit' => 'px',
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'conditions' => 'nav_style == "simple"',
            ),
            'bullets' => array(
              'type' => 'radio-buttons',
              'heading' => __('Bullets'),
              'default' => 'true',
              'options' => array(
                  'false'  => array( 'title' => 'Off'),
                  'true'  => array( 'title' => 'On'),
              ),
            ),
            'bullet_style' => array(
              'type' => 'select',
              'heading' => 'Bullet Style',
              'default' => 'circle',
              'options' => array(
                'circle' => 'Circle',
                'dashes' => 'Dashes',
                'dashes-spaced' => 'Dashes (Spaced)',
                'simple' => 'Simple',
                'square' => 'Square',
                ),
                'conditions' => 'bullets == "true"',
            ),
          ),
        ),
        'slide_options' => array(
          'type' => 'group',
          'heading' => __( 'Auto Slide' ),
          'options' => array(
            'auto_slide' => array(
                'type' => 'radio-buttons',
                'heading' => __('Auto slide'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'auto_marquee' => array(
                'type' => 'radio-buttons',
                'heading' => __('Auto marquee'),
                'default' => '',
                'options' => array(
                    ''  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
            'timer' => array(
                'type' => 'textfield',
                'heading' => 'Timer (ms)',
                'default' => 6000,
            ),
            'pause_hover' => array(
                'type' => 'radio-buttons',
                'heading' => __('Pause on Hover'),
                'default' => 'true',
                'options' => array(
                    'false'  => array( 'title' => 'Off'),
                    'true'  => array( 'title' => 'On'),
                ),
            ),
          ),
        ),
        'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
    ),
) );
