<?php
return array(
    'type' => 'group',
    'heading' => __( 'Banner' ),
    'options' => array(
        'banner'      => array(
            'type'    => 'checkbox',
            'heading' => __( 'Banner' ),
            'conditions' => 'type == "row" || type == "masonry"',
        ),
        'banner_posts' => array(
            'type' => 'slider',
            'heading' => 'Position',
            'conditions' => 'banner == "true"',
            'default' => 4,
            'max' => 20,
            'min' => 3,
        ),
        'banner_img' => array(
            'type' => 'image',
            'heading' => __('Banner Image'),
            'conditions' => 'banner == "true"',
            'default' => ''
        ),
        'banner_url' => array(
            'type'       => 'textfield',
            'conditions' => 'banner == "true"',
            'heading'    => __( 'Banner URL' ),
        ),
    ),
);