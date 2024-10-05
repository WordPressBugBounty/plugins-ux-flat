<?php

function uxf_gallery_att($atts) {
    extract(shortcode_atts(array(
      // meta
      '_id' => 'gallery-'.wp_rand(),
      'class' => '',
      'visibility' => '',
      'ids' => '', // Gallery IDS
      'lightbox' => true,
      'lightbox_image_size' => 'large',
      'thumbnails' => true,
      'orderby' => 'date',
      'order' => 'DESC',

      // Layout
      'style' => 'overlay',
      'columns' => '4',
      'columns__sm' => '',
      'columns__md' => '',
      'col_spacing' => '',
      'type' => '', // slider, row, masonery, grid
      'width' => '',
      'grid' => '1',
      'grid_height' => '600px',
      'slider_nav_style' => 'reveal',
      'slider_bullets' => 'false',
      'slider_nav_position' => '',
      'slider_nav_color' => '',
      'slider_arrows' => 'true',
      'auto_slide' => 'false',
      'infinitive' => 'true',
      'depth' => '',
      'depth_hover' => '',

       // Box styles
      'animate' => '',
      'text_pos' => '',
      'text_padding' => '',
      'text_bg' => '',
      'text_color' => '',
      'text_hover' => '',
      'text_align' => 'left',
      'text_size' => '',
      'image_size' => 'medium',
      'image_mask' => '',
      'image_width' => '',
      'image_height' => '',
      'image_radius' => '',
      'image_hover' => '',
      'image_hover_alt' => '',
      'image_overlay' => '',
      'name' => '',
      'tag_name' => 'h3',
		'text_attribute'  => false,
        'image_icon' => '',

      ), $atts));

	ob_start();

	$classes = explode( ' ', $class );
      $classes_box = array('box','has-hover','gallery-box');
      $classes_image = array('box-image');
      $classes_text = array('box-text');

      // Create Grid
      if($type == 'grid'){
        if(!$text_pos) $text_pos = 'center';
        if(!$text_color) $text_color = 'dark';
        if($style !== 'shade') $style = 'overlay';
        $columns = null;
        $current_grid = 0;
        $grid = flatsome_get_grid($grid);
        $grid_total = count($grid);
        flatsome_get_grid_height($grid_height, $_id);
      }
      if($type == 'slider-full'){
        $columns = null;
      }

      // Add Animations
      if($animate) {$animate = 'data-animate="'.$animate.'"';}

      // Set box style
      if($style) $classes_box[] = 'box-'.$style;
      if($style == 'overlay') $classes_box[] = 'dark';
      if($style == 'shade') $classes_box[] = 'dark';
      if($style == 'badge') $classes_box[] = 'hover-dark';
      if($text_pos) $classes_box[] = 'box-text-'.$text_pos;
      if($style == 'overlay' && !$image_overlay) $image_overlay = 'rgba(0,0,0,.15)';

      // Set image styles
      if($image_hover)  $classes_image[] = 'image-'.$image_hover;
      if($image_hover_alt)  $classes_image[] = 'image-'.$image_hover_alt;
      if($depth) $classes_image[] = 'box-shadow-'.$depth;
      if($depth_hover) $classes_image[] = 'box-shadow-'.$depth_hover.'-hover';
      if($image_height) $classes_image[] = 'image-cover';

      // Text classes
      if($text_hover) $classes_text[] = 'show-on-hover hover-'.$text_hover;
      if($text_align) $classes_text[] = 'text-'.$text_align;
      if($text_size) $classes_text[] = 'is-'.$text_size;

      if($text_color == 'dark') $classes_text[] = 'dark';

      $css_args_img = array(
        array( 'attribute' => 'border-radius', 'value' => $image_radius, 'unit' => '%'),
        array( 'attribute' => 'width', 'value' => $image_width, 'unit' => '%' ),
        array( 'attribute' => 'padding-top', 'value' => $image_height),
      );

	$css_args_text = array(
            array( 'attribute' => 'background-color', 'value' => $text_bg ),
            array( 'attribute' => 'padding', 'value' => $text_padding ),
      );

	if ( $is_multi_gallery = get_theme_mod( 'flatsome_lightbox_multi_gallery' ) ) {
		$classes[] = 'lightbox-multi-gallery';
	}

      // Repeater options
      $repeater['id'] = $_id;
      $repeater['type'] = $type;
      $repeater['style'] = $style;
      $repeater['class'] = implode ( ' ', $classes );
      $repeater['visibility'] = $visibility;
      $repeater['slider_style'] = $slider_nav_style;
      $repeater['slider_nav_position'] = $slider_nav_position;
      $repeater['slider_bullets'] = $slider_bullets;
      $repeater['slider_nav_color'] = $slider_nav_color;
      $repeater['auto_slide'] = $auto_slide;
	  $repeater['infinitive'] = $infinitive;
      $repeater['row_spacing'] = $col_spacing;
      $repeater['row_width'] = $width;
      $repeater['columns'] = $columns;
      $repeater['columns__sm'] = $columns__sm;
      $repeater['columns__md'] = $columns__md;

      if ($name && ($name_ids = get_post_meta(get_the_ID(), $name, true))) {
            $ids = $name_ids;
        } elseif (isset($ids) && $ids === '') {
            return '';
        }


      // Get attachments
      $_attachments = get_posts( array( 'include' => $ids, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

      $attachments = array();
      foreach ( $_attachments as $key => $val ) {
          $attachments[$val->ID] = $_attachments[$key];
      }

      if ( empty( $attachments ) ) {
	      ob_end_clean();
	      return '';
      }


      get_flatsome_repeater_start($repeater);

      foreach ( $attachments as $id => $attachment ) {

        $link_start = '';
        $link_end = '';

        $content = $attachment->post_content;
        $classes_col = array('gallery-col','col');


        // Add Video icon
        $has_video = false;
        
        $text_att = $attachment->post_excerpt;
        if ($text_attribute) $text_att = $attachment->post_title;

        if(isset($content) && strpos($content, 'watch?v=') !== false){
            $has_video = true;
            if(!$image_overlay) $image_overlay = 'rgba(0,0,0,.2)';
            $link_start = '<a href="'.$content.'" class="open-video" title="'. esc_attr( $text_att ) . '">';
            $link_end = '</a>';

        } else if( 'false' !== $lightbox) {
           $get_image = wp_get_attachment_image_src( $attachment->ID, $lightbox_image_size);
           $link_class = $is_multi_gallery ? '' : 'image-lightbox lightbox-gallery';
           $link_start = '<a class="' . $link_class . '" href="'.$get_image[0].'" title="'. esc_attr( $text_att ) . '">';
           $link_end = '</a>';
        }

        if($type == 'grid'){
            if($grid_total > $current_grid) $current_grid++;
            $current = $current_grid-1;
            $classes_col[] = 'grid-col';
            if($grid[$current]['height']) $classes_col[] = 'grid-col-'.$grid[$current]['height'];
            if($grid[$current]['span']) $classes_col[] = 'large-'.$grid[$current]['span'];
            if($grid[$current]['md']) $classes_col[] = 'medium-'.$grid[$current]['md'];

            // Set image size
            if($grid[$current]['size'] == 'large') $image_size = 'large';
            if($grid[$current]['size'] == 'medium') $image_size = 'medium';
        }
        
      ?><div class="<?php echo esc_attr(implode(' ', $classes_col)); ?>" <?php echo esc_attr($animate);?>>
          <div class="col-inner">
            <?php echo wp_kses_post($link_start); ?>
            <div class="<?php echo esc_attr(implode(' ', $classes_box)); ?>">
              <div class="<?php echo esc_attr(implode(' ', $classes_image)); ?>" <?php echo get_shortcode_inline_css($css_args_img); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                <?php echo wp_get_attachment_image( $id, $image_size, false, $atts ); ?>
                <?php if($image_overlay){ ?>
                  <div class="overlay fill" style="background-color: <?php echo esc_attr($image_overlay);?>">
                    <?php if($image_icon) { ?>
                        <div class="absolute no-click x50 y50 md-x50 md-y50 lg-x50 lg-y50">
                            <div class="overlay-icon">
                                <i class="<?php echo esc_attr($image_icon); ?>"></i>
                            </div>
                        </div>
                     <?php } ?>
                  </div>
                <?php } ?>
                <?php if($style == 'shade'){ ?>
                  <div class="shade"></div>
                <?php } ?>
                <?php if($has_video) { ?>
                    <div class="absolute no-click x50 y50 md-x50 md-y50 lg-x50 lg-y50 text-shadow-2">
                        <div class="overlay-icon">
                            <i class="icon-play"></i>
                        </div>
                    </div>
                <?php } ?>
              </div>
              <div class="<?php echo esc_attr(implode(' ', $classes_text)); ?>" <?php echo get_shortcode_inline_css($css_args_text); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                <<?php echo esc_attr($tag_name); ?>><?php echo esc_attr( $text_att ); ?></<?php echo esc_attr($tag_name); ?>>
              </div>
            </div>
            <?php echo wp_kses_post($link_end); ?>
          </div>
         </div><?php
    } // Loop

    get_flatsome_repeater_end($repeater);

    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode("ux_gallery", "uxf_gallery_att");

//Replace Gallery Shortcode
function fs_gallery_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'ids' => false,
        'columns' => null,
        'size' => null,
        'link' => null,
        'orderby' => 'date',
        'order' => 'DESC',
    ), $atts, 'gallery' );
    if ( $atts['size'] == 'full' ) $atts['size'] = 'original';
    $link_file = '';
    if ( $atts['link'] !== 'file' ) $link_file = 'false';
    if ( empty ( $atts['ids'] ) ) return "";
    $shortcode = '[ux_gallery ids="' .$atts['ids']. '" columns="' .$atts['columns']. '" image_size="'.$atts['size'].'" lightbox="'.$link_file.'" orderby="'.$atts['orderby'].'" order="'.$atts['order'].'" style="default" type="slider" slider_nav_style="simple" image_height="75%" text_align="center" text_size="large"]';
    return do_shortcode( $shortcode );
}
add_shortcode('gallery', 'fs_gallery_shortcode'); 
