<?php


// WPForms
$forms = array('' => '-- Forms --');
foreach(get_posts(array('post_type' => 'wpforms', 'posts_per_page' => -1)) as $wpForms){
    $forms[$wpForms->ID] = $wpForms->post_title;
}

add_ux_builder_shortcode( 'wpforms', array(
    'name' => __( 'WPForms' ),
    'category' => __( 'UX Flat' ),
    'thumbnail' =>  flatsome_uxf_builder_thumbnail( 'forms' ),
    'allow_in' => array('text_box'),
    'options' => array(
        'id' => array(
            'type' => 'select',
            'heading' => 'Select Form',
            'default' => '',
            'options' => $forms
        )
    )
) );
