<?php

add_ux_builder_shortcode( 'ux_typed', array(
	'type'      => 'container',
	'name'      => __( 'Typing', 'flatsome' ),
	'category'  => __( 'UX Flat', 'flatsome' ),
	'compile'   => false,
	'overlay'   => true,
	'thumbnail' => flatsome_uxf_builder_thumbnail( 'ux_typed' ),
	'template'  => flatsome_uxf_builder_template( 'ux_typed.html' ),
	'priority'  => 3,
    'scripts' => array(
      'typedjs' => UXF_URL . 'assets/js/typed.umd.js',
    ),
	'options'   => array(
		'$content'         => array(
			'type'       => 'text-editor',
			'full_width' => true,
			'height'     => 'calc(100vh - 470px)',
		),
        'target' => array(
            'type' => 'textfield',
            'heading' => 'Target ID / Class',
        ),
		'typed_options'   => array(
			'type'    => 'group',
			'heading' => 'Attributes',
			'options' => array(
				'typespeed' => array(
					'type' => 'scrubfield',
					'heading' => 'Speed (ms)',
					'unit' => '',
					'default' => 50,
				),
				'startdelay' => array(
					'type' => 'scrubfield',
					'heading' => 'Start delay (ms)',
					'unit' => '',
					'default' => 500,
				),
				'backspeed' => array(
					'type' => 'scrubfield',
					'heading' => 'Backspacing speed (ms)',
					'unit' => '',
					'default' => 50,
				),
				'backdelay' => array(
					'type' => 'scrubfield',
					'heading' => 'Backspacing delay (ms)',
					'unit' => '',
					'default' => 500,
				),
				'smartbackspace'      => array(
					'type'    => 'checkbox',
					'default' => true,
					'heading' => 'Only backspace',
				),
				'shuffle'      => array(
					'type'    => 'checkbox',
					'heading' => 'Shuffle the strings',
				),
				'fadeout'      => array(
					'type'    => 'checkbox',
					'heading' => 'Fade out instead of backspace',
				),
				'fadeoutdelay' => array(
					'type' => 'scrubfield',
					'heading' => 'Time before fade out (ms)',
					'unit' => '',
					'default' => 500,
				),
				'loop'      => array(
					'type'    => 'checkbox',
					'heading' => 'Loop strings animation',
				),
                'attr' => array(
                    'type' => 'textfield',
                    'heading' => 'Attribute (Ex: placeholder)',
                ),
				'loopcount' => array(
					'type' => 'scrubfield',
					'heading' => 'Amount of loops if enabled',
					'unit' => '',
					'min' => 0,
					'max' => 10,
				),
				'showcursor'      => array(
					'type'    => 'checkbox',
					'default' => true,
					'heading' => 'Show/hide cursor',
				),
				'cursorchar' => array(
					'type' => 'textfield',
					'heading' => 'Character to be used as cursor',
					'default' => '|',
				),
				'cursorcolor' => array(
					'type'     => 'colorpicker',
					'heading'  => 'Cursor Color',
					'default' => '',
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
			),
		),
		'advanced_options' => require( UXF_PATH . '/inc/builder/shortcodes/commons/advanced.php'),
	),
) );
