<?php

$post_types = get_post_types(array(
    'public' => true,
));
$post_type_options = array();
foreach ($post_types as $post_type) {
    $post_type_object = get_post_type_object($post_type);
    $post_type_label = $post_type_object->labels->name;
    $post_type_options[$post_type] = $post_type_label;
}

$users = get_users();
foreach( $users as $user ) {
    $authors[$user->ID] = $user->display_name;
}

if ( ! isset( $repeater_posts ) ) $repeater_posts = 'posts';


if ( ! isset( $repeater_post_type ) ) $repeater_post_type = 'post';
if ( ! isset( $repeater_post_cat ) ) $repeater_post_cat = 'category';

$tax_options = array();
$taxonomies = get_object_taxonomies( array( 'post_type' => $posttype ) );
foreach( $taxonomies as $taxonomy ) {
    $terms = get_terms( $taxonomy );
    foreach( $terms as $term ) {
        $tax_options[$term] = $term->slug;
    }
}

return array(
    'type' => 'group',
    'heading' => __( 'Posts' ),
    'options' => array(
    
    'posttype' => array(
        'type' => 'select',
        'heading' => 'Post Type',
        'param_name' => 'posttype',
        'default' => $repeater_post_type,
        'options' => $post_type_options,
    ),

     'ids' => array(
        'type' => 'select',
        'heading' => 'Custom Posts',
        'param_name' => 'ids',
        'config' => array(
            'multiple' => true,
            'placeholder' => 'Select..',
            'postSelect' => array(
                'post_type' => array($posttype)
            ),
        )
    ),

    'cat' => array(
        'type' => 'select',
        'heading' => 'Category',
        'param_name' => 'cat',
        'conditions' => 'ids == ""',
        'default' => '',
        'config' => array(
            'multiple' => true,
            'placeholder' => 'Select...',
            'termSelect' => array(
                'post_type' => $posttype,
                'taxonomies' => $tax_options
            ),
        )
    ),

    $repeater_posts => array(
        'type' => 'textfield',
        'heading' => 'Total Posts',
        'conditions' => 'ids == ""',
        'default' => '8',
    ),

    'offset' => array(
        'type' => 'textfield',
        'heading' => 'Offset',
        'conditions' => 'ids == ""',
        'default' => '',
    ),

     'orderby'       => array(
	     'type'       => 'select',
	     'heading'    => 'Order by',
	     'conditions' => 'ids == ""',
	     'default'    => 'date',
	     'options'    => array(
		     'ID'            => 'ID',
		     'title'         => 'Title',
		     'name'          => 'Name',
		     'date'          => 'Published Date',
		     'modified'      => 'Modified Date',
		     'rand'          => 'Random',
		     'comment_count' => 'Comment Count',
		     'menu_order'    => 'Menu Order',
	     ),
     ),

     'order'         => array(
	     'type'       => 'select',
	     'heading'    => 'Order',
	     'conditions' => 'ids == ""',
	     'default'    => 'DESC',
	     'options'    => array(
		     'ASC'  => 'ASC',
		     'DESC' => 'DESC',
	     ),
     ),
     
	'author' => array(
		'type' => 'select',
		'heading' => __( 'Author' ),
		'param_name' => 'author',
		'default' => '',
		'config' => array(
			'multiple' => true,
			'placeholder' => 'Select..',
			'options' => $authors,
		),
	),

    'tags' => array(
	    'type'       => 'select',
	    'heading'    => 'Tag',
	    'conditions' => 'ids == ""',
	    'default'    => '',
	    'config'     => array(
		    'multiple'    => true,
		    'placeholder' => 'Select...',
		    'termSelect'  => array(
			    'post_type'  => $posttype,
			    'taxonomies' => 'product_tag',
		    ),
	    ),
    ),

)
);
