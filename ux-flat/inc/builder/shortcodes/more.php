<?php
add_ux_builder_shortcode( 'more', array(
    'type' => 'container',
    'name' => __( 'More' ),
    'category' => __( 'UX Flat' ),
    'template' => flatsome_uxf_builder_template( 'more.html' ),
    'thumbnail' =>  flatsome_uxf_builder_thumbnail( 'more' ),
    'info' => '{{ text }}',
    'wrap' => false,
    'options' => array(
        'text' => array(
            'type' => 'textfield',
            'heading' => __( 'Text' ),
            'default' => __('View details'),
            'auto_focus' => true,
        ),
        'split' => array(
            'type' => 'checkbox',
            'heading' => __( 'Split Content' ),
            'default' => '',
        ),
        'color'       => array(
            'type'    => 'select',
            'heading' => 'Color',
            'default' => 'primary',
            'options' => array(
                'primary'   => 'Primary',
                'secondary' => 'Secondary',
                'alert'     => 'Alert',
                'success'   => 'Success',
                'white'     => 'White',
            ),
        ),
        'style'       => array(
            'type'    => 'select',
            'heading' => 'Style',
            'default' => '',
            'options' => array(
                ''          => 'Default',
                'outline'   => 'Outline',
                'link'      => 'Simple',
                'underline' => 'Underline',
                'shade'     => 'Shade',
                'bevel'     => 'Bevel',
                'gloss'     => 'Gloss',
            ),
        ),
        'round'  => array(
            'type'    => 'checkbox',
            'heading' => __('Round'),
        ),
        'height'          => array(
            'type'       => 'scrubfield',
            'heading'    => 'Height',
            'default' => '100px',
            'responsive' => true,
            'min'        => 0,
            'max'        => 1000,
        ),
        'divider' => array(
            'type' => 'checkbox',
            'heading' => __( 'Divider' ),
            'default' => '',
        ),
		'advanced_options' => require get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php',
    ),
) );
