<?php
// Icon Control
return array(
    'type'    => 'group',
    'heading' => 'Icon',
    'options' => array(
        'icon'        => array(
            'type'    => 'select',
            'heading' => 'Icon',
            'options' => require( UXF_DIR . '/inc/builder/shortcodes/values/icons.php' ),
        ),
        'icon_custom' => array(
            'conditions' => 'icon == "custom"',
            'type'       => 'textfield',
            'heading'    => 'Icon Class',
            'default'    => '',
        ),
        'icon_size' => array(
            'conditions' => 'icon !== ""',
            'type' => 'scrubfield',
            'heading' => 'Icon Size',
            'default' => '16px',
            'min' => 0,
        ),
        'icon_color' => array(
            'conditions' => 'icon !== ""',
            'type'     => 'colorpicker',
            'heading'  => 'Icon Color',
            'default' => '',
            'format'   => 'hex',
            'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
        ),
        'icon_bgcolor' => array(
            'conditions' => 'icon !== ""',
            'type'     => 'colorpicker',
            'heading'  => 'Icon BG Color',
            'default' => '',
            'format'   => 'hex',
            'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
        ),
    ),
);