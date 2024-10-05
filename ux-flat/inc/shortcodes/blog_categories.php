<?php

// [blog_categories]
function blog_categories($atts, $content = null, $tag = '' ) {
  extract( shortcode_atts( array (
      // Meta
      'number'     => null,
      '_id' => 'cats-'.wp_rand(),
      'ids' => false, // Custom IDs
      'title' => '',
      'cat' => '',
      'orderby'    => 'menu_order',
      'order'      => 'ASC',
      'hide_empty' => 1,
      'parent'     => 'false',
      'offset' => '',
      'show_count' => 'true',
	  'excerpt' => 'visible',
      'excerpt_length' => 15,
      'class' => '',
      'visibility' => '',

      // Layout
      'style' => 'badge',
      'columns' => '4',
      'columns__sm' => '',
      'columns__md' => '',
      'col_spacing' => 'small',
      'type' => 'slider', // slider, row, masonery, grid
      'width' => '',
      'grid' => '1',
      'grid_height' => '600px',
      'grid_height__md' => '500px',
      'grid_height__sm' => '400px',
      'slider_nav_style' => 'reveal',
      'slider_nav_color' => '',
      'slider_nav_position' => '',
      'slider_bullets' => 'false',
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
      'text_align' => 'center',
      'text_size' => '',

      'image_size' => '',
      'image_mask' => '',
      'image_width' => '',
      'image_hover' => '',
      'image_hover_alt' => '',
      'image_radius' => '',
      'image_height' => '',
      'image_overlay' => '',

      // depricated
      'bg_overlay' => '#000',

      ), $atts ) );


      if($tag == 'blog_categories_grid'){
        $type = 'grid';
      }

    $hide_empty = ( $hide_empty == true || $hide_empty == 1 ) ? 1 : 0;

        // if Ids
    if ( isset( $atts[ 'ids' ] ) ) {
      $ids = explode( ',', $atts[ 'ids' ] );
      $ids = array_map( 'trim', $ids );
      $parent = '';
      $orderby = 'include';
    } else {
      $ids = array();
    }

	ob_start();
    
    $blog_categories = get_terms( array(
        'taxonomy'   => 'category',
        'orderby'    => $orderby,
        'order'      => $order,
        'hide_empty' => $hide_empty,
        'include'    => $ids,
        'pad_counts' => true,
        'child_of'   => 0,
        'offset'     => $offset,
    ) );


	if ( ! empty( $parent ) ) $blog_categories = wp_list_filter( $blog_categories, array( 'parent' => $parent === 'false' ? 0 : $parent ) );
    if ( !empty($number) ) $blog_categories = array_slice( $blog_categories, 0, $number );

    $classes_box = array('box','box-category','has-hover');
    $classes_image = array();
    $classes_text = array();

    // Create Grid
    if($type == 'grid'){
      $columns = 0;
      $current_grid = 0;
      $grid = flatsome_get_grid($grid);
      $grid_total = count($grid);
      flatsome_get_grid_height($grid_height, $_id);
    }

    // Add Animations
    if($animate) {$animate = 'data-animate="'.$animate.'"';}

    // Set box style
    if($style) $classes_box[] = 'box-'.$style;
    if($style == 'overlay') $classes_box[] = 'dark';
    if($style == 'shade') $classes_box[] = 'dark';
    if($style == 'badge') $classes_box[] = 'hover-dark';
    if($text_pos) $classes_box[] = 'box-text-'.$text_pos;
    if($style == 'overlay' && !$image_overlay) $image_overlay = true;

    // Set image styles
    if($image_hover)  $classes_image[] = 'image-'.$image_hover;
    if($image_hover_alt)  $classes_image[] = 'image-'.$image_hover_alt;
    if($image_height)  $classes_image[] = 'image-cover';

    // Text classes
    if($text_hover) $classes_text[] = 'show-on-hover hover-'.$text_hover;
    if($text_align) $classes_text[] = 'text-'.$text_align;
    if($text_size) $classes_text[] = 'is-'.$text_size;
    if($text_color == 'dark') $classes_text[] = 'dark';

    $css_args_img = array(
      array( 'attribute' => 'border-radius', 'value' => $image_radius, 'unit' => '%'),
      array( 'attribute' => 'width', 'value' => $image_width, 'unit' => '%' ),
    );

    $css_image_height = array(
      array( 'attribute' => 'padding-top', 'value' => $image_height),
    );

    $css_args = array(
          array( 'attribute' => 'background-color', 'value' => $text_bg ),
          array( 'attribute' => 'padding', 'value' => $text_padding ),
    );

    // Repeater options
    $repeater['id'] = $_id;
    $repeater['class'] = $class;
    $repeater['visibility'] = $visibility;
    $repeater['tag'] = $tag;
    $repeater['type'] = $type;
    $repeater['style'] = $style;
    $repeater['format'] = $image_height;
    $repeater['slider_style'] = $slider_nav_style;
    $repeater['slider_nav_color'] = $slider_nav_color;
    $repeater['slider_nav_position'] = $slider_nav_position;
    $repeater['slider_bullets'] = $slider_bullets;
    $repeater['auto_slide'] = $auto_slide;
	$repeater['infinitive'] = $infinitive;
    $repeater['row_spacing'] = $col_spacing;
    $repeater['row_width'] = $width;
    $repeater['columns'] = $columns;
    $repeater['columns__sm'] = $columns__sm;
    $repeater['columns__md'] = $columns__md;
    $repeater['depth'] = $depth;
    $repeater['depth_hover'] = $depth_hover;


    get_flatsome_repeater_start($repeater);

    if ( $blog_categories ) {
      foreach ( $blog_categories as $category ) {

        $classes_col = array('category','col');
		$show_excerpt = $excerpt;

        $thumbnail_size =  '';
        
        if($image_size) $thumbnail_size = $image_size;

        if($type == 'grid'){
            if($grid_total > $current_grid) $current_grid++;
            $current = $current_grid-1;
            $classes_col[] = 'grid-col';
            if($grid[$current]['height']) $classes_col[] = 'grid-col-'.intval($grid[$current]['height']);
            if($grid[$current]['span']) $classes_col[] = 'large-'.intval($grid[$current]['span']);
            if($grid[$current]['md']) $classes_col[] = 'medium-'.intval($grid[$current]['md']);

            // Set image size
            if($grid[$current]['size'] == 'large') $thumbnail_size = 'large';
            if($grid[$current]['size'] == 'medium') $thumbnail_size = 'medium';
            
	        // Hide excerpt for small sizes
	        if($grid[$current]['size'] == 'thumbnail') $show_excerpt = 'false';
        }

        $thumbnail_id = get_term_meta( $category->term_id, '_thumbnail_id', true  );
        $site_logo_id = flatsome_option( 'site_logo' );

        if ( $thumbnail_id ) {
          $image = wp_get_attachment_url( $thumbnail_id, $thumbnail_size);
        } else {
          $image = wp_get_attachment_url( $site_logo_id );
        }

        ?><div class="<?php echo esc_attr(implode(' ', $classes_col)); ?>" <?php echo esc_attr($animate);?>>
            <div class="col-inner">
			<a href="<?php echo esc_url(get_term_link($category->slug, 'category')); ?>">
                <div class="<?php echo esc_attr(implode(' ', $classes_box)); ?> ">
                <div class="box-image" <?php echo get_shortcode_inline_css($css_args_img); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                  <div class="<?php echo esc_attr(implode(' ', $classes_image)); ?>" <?php echo get_shortcode_inline_css($css_image_height); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                  <?php echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="300" height="300" />'; ?>
                  <?php if($image_overlay){ ?><div class="overlay" style="background-color: <?php echo esc_attr($image_overlay);?>"></div><?php } ?>
                  <?php if($style == 'shade'){ ?><div class="shade"></div><?php } ?>
                  </div>
                </div>
                <div class="box-text <?php echo esc_attr(implode(' ', $classes_text)); ?>" <?php echo get_shortcode_inline_css($css_args); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                  <div class="box-text-inner">
                      <h3 class="header-title">
                            <?php echo esc_attr($category->name); ?>
                      </h3>
                        <?php if($show_excerpt !== 'false') { ?>
                        <p class="from_the_blog_excerpt op-8 <?php if($show_excerpt !== 'visible'){ echo 'show-on-hover hover-'.esc_attr($show_excerpt); } ?>"><?php
                          $the_excerpt  = $category->description;
                          $excerpt_more = apply_filters( 'excerpt_more', ' ...' );
                          echo flatsome_string_limit_words($the_excerpt, $excerpt_length) . $excerpt_more; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?>
                        </p>
                        <?php } ?>
                  </div>
                </div>
					<?php do_action('flatsome_blog_categories_after'); ?>
                </div>
                    <?php if($show_count) { ?>
                    <div class="badge absolute top post-date badge-outline">
                      <div class="badge-inner count"><?php echo intval($category->count).' '. esc_attr__('post'); ?></div>
                    </div>
                    <?php } ?>
			</a>
            </div>
            </div><?php
      }
    }
    wp_reset_query();

    get_flatsome_repeater_end($repeater);

    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode("blog_categories", "blog_categories");
add_shortcode("blog_categories_grid", "blog_categories");
