<?php

add_ux_builder_shortcode( 'tabgroup', array(
    'type' => 'container',
    'name' => __( 'Tabs' ),
    'image' => '',
    'category' => __( 'Content' ),
    'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/tabs.svg',
    'template' => flatsome_uxf_builder_template( 'tabgroup.html' ),
    'tools' => 'shortcodes/tabgroup/tabgroup.tools.html',
    'info' => '{{ title }}',
    'allow' => array( 'tab' ),

    'children' => array(
        'draggable' => false,
        'addable_spots' => array( 'center' ),
    ),

    'toolbar' => array(
        'show_children_selector' => true,
        'show_on_child_active' => true,
    ),

    'presets' => array(
        array(
            'name' => __( 'Default' ),
            'content' => '
                [tabgroup title="Tab Title"]
                    [tab title="Tab 1 Title"][/tab]
                    [tab title="Tab 2 Title"][/tab]
                    [tab title="Tab 3 Title"][/tab]
                [/tabgroup]
            '
        ),
    ),

    'options' => array(

        'title' => array(
            'type' => 'textfield',
            'heading' => __( 'Title' ),
            'default' => '',
        ),

        'style' => array(
            'type' => 'select',
            'heading' => __( 'Style' ),
            'default' => 'line',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/nav-styles.php' ),
        ),

        'type' => array(
            'type' => 'select',
            'heading' => __( 'Type' ),
            'default' => 'horizontal',
            'options' => array(
                'horizontal' => 'Horizontal',
                'vertical' => 'Vertical',
            )
        ),

        'nav_touch' => array(
            'type' => 'radio-buttons',
            'conditions' => 'type == "horizontal"',
            'heading' => __('Nav Touch'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),

        'nav_style' => array(
          'type' => 'radio-buttons',
          'heading' => 'Nav Style',
          'default' => 'uppercase',
          'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/nav-types-radio.php' ),
        ),

        'nav_size' => array(
            'type' => 'radio-buttons',
            'heading' => __( 'Size' ),
            'default' => 'medium',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/text-sizes.php' ),
        ),

        'align' => array(
            'type' => 'radio-buttons',
            'heading' => 'Tabs Align',
            'default' => 'left',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
        ),
        'bahavior_group' => array(
	        'type' => 'group',
	        'heading' => __( 'Behavior' ),
	        'options' => array(
		        'event' => array(
			        'type'    => 'radio-buttons',
			        'heading' => __( 'Activate' ),
			        'description' => 'On hover takes effect in non-edit mode.',
			        'default' => '',
			        'options' => array(
				        ''      => array( 'title' => 'On click' ),
				        'hover' => array( 'title' => 'On hover' ),
			        ),
		        ),
	        ),
        ),
        'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
    ),
) );
