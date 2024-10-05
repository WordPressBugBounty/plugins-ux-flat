<?php
$repeater_columns = '4'; //Set defaults
$repeater_col_spacing = 'small'; //Set defaults
$repeater_type = 'row';
$default_text_align = 'left';

$options = array(
'pages_options' => array(
    'type' => 'group',
    'heading' => __( 'Options' ),
    'options' => array(
        'name' => array(
            'type'    => 'textfield',
            'heading' => 'Field Name (ACF)',
            'default' => '',
        ),
      'ids' => array(
	    'conditions' => 'name == ""',
        'type' => 'gallery',
        'heading' => __( 'Images' ),
      ),
     'style' => array(
            'type' => 'select',
            'heading' => __( 'Style' ),
            'default' => 'overlay',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/box-layouts.php' )
     ),
    'lightbox' => array(
          'type' => 'radio-buttons',
          'heading' => __('Open in Lightbox'),
          'default' => 'true',
          'options' => array(
              'false'  => array( 'title' => 'Off'),
              'true'  => array( 'title' => 'On'),
          ),
      ),

	'lightbox_image_size' => array(
	    'type'       => 'select',
	    'heading'    => __( 'Lightbox Image Size' ),
	    'conditions' => 'lightbox == "true"',
	    'default'    => 'large',
	    'options'    => flatsome_uxf_builder_image_sizes(),
    ),
    'tag_name' => array(
        'type'    => 'select',
        'heading' => 'Title Tag',
        'default' => 'h3',
        'options' => array(
            'h3' => 'H3',
            'h4' => 'H4',
            'h5' => 'H5',
            'h6' => 'H6',
            'p' => 'P',
            'span' => 'Span',
            'div' => 'Div',
        ),
    ),
    'text_attribute' => array(
        'type'    => 'checkbox',
        'heading' => __( 'Title Attribute' ),
        'default' => 'false',
    ),
     'orderby'       => array(
	     'type'       => 'select',
	     'heading'    => 'Order by',
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
	     'default'    => 'DESC',
	     'options'    => array(
		     'ASC'  => 'ASC',
		     'DESC' => 'DESC',
	     ),
     ),
  ),
),
'layout_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/repeater-options.php' ),
'layout_options_slider' => require( get_template_directory() . '/inc/builder/shortcodes/commons/repeater-slider.php' ),
);

$box_styles = require( UXF_PATH . '/inc/builder/shortcodes/commons/box-styles.php' );
$options = array_merge($options, $box_styles);

add_ux_builder_shortcode( 'ux_gallery', array(
  'name' => __( 'Gallery','ux-builder'),
  'category' => __( 'Content' ),
  'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/ux_gallery.svg',
  'scripts' => array(
    'flatsome-masonry-js' => get_template_directory_uri() .'/assets/libs/packery.pkgd.min.js',
  ),
  'presets' => array(
    array(
      'name' => __( 'Default' ),
      'content' => '[ux_gallery]',
      ),
    ),
    'options' => $options
) );
