<?php

/**
 * Generate position classes for banner content.
 *
 * @param  string $axis
 * @param  string $default
 * @param  string $sm
 * @param  string $md
 * @return string
 */

function get_uxf_repeater_start( $atts ) {
    $atts = wp_parse_args( $atts, array(
        'class' => '',
        'visibility' => '',
        'title' => '',
        'style' => '',
        'columns' => '',
        'columns__sm' => '',
        'columns__md' => '',
        'slider_nav_position' => '',
        'slider_bullets' => 'false',
        'slider_nav_color' => '',
        'auto_slide' => 'false',
        'slide_style' => 'normal',
        'slide_width' => '',
        'slide_align' => 'center',
        'infinitive' => 'true',
        'format' => '',
        'attrs' => '',
    ) );

	$row_classes      = array();
	$row_classes_full = array();

	if ( $atts['class'] ) {
		$row_classes[]      = $atts['class'];
		$row_classes_full[] = $atts['class'];
	}

	if ( $atts['visibility'] ) {
		$row_classes[]      = $atts['visibility'];
		$row_classes_full[] = $atts['visibility'];
	}

    if($atts['type'] == 'slider-full'){
      $atts['columns'] = false;
      $atts['columns__sm'] = false;
      $atts['columns__md'] = false;
    }

    if(empty($atts)) return;

    if(!empty($atts['filter'])){
      $row_classes[] = 'row-isotope';
    }

    $rtl = 'false';

    if(is_rtl()) {
      $rtl = 'true';
    }

    if(empty($atts['auto_slide'])) $atts['auto_slide'] = 'false';

    // Group slider cells
    if(!empty($atts['slide_width'])) {
        $group_cells = '"'.$atts['slide_width'].'"';
    } else {
        $group_cells = '"100%"';
    }
    
    // Add column classes
    if(!empty($atts['columns']) && $atts['type'] !== 'grid'){
      if($atts['columns'])  $row_classes[] = 'large-columns-'.$atts['columns'];

      if(empty($atts['columns__md']) && $atts['columns'] > 3) {$row_classes[] = 'medium-columns-3';}
      else{$row_classes[] = 'medium-columns-'.$atts['columns__md'];}

      if(empty($atts['columns__sm']) && $atts['columns'] > 2) {$row_classes[] = 'small-columns-2';}
      else{$row_classes[] = 'small-columns-'.$atts['columns__sm'];}
    }

    // Add Row spacing
    if(!empty($atts['row_spacing'])){
      $row_classes[] = 'row-'.$atts['row_spacing'];
    }

    // Add row width
    if(!empty($atts['row_width'])){
      if($atts['row_width'] == 'full-width') $row_classes[] = 'row-full-width';
    }

    // Add Shadows
    if(!empty($atts['depth'])){
       $row_classes[] = 'has-shadow';
          $row_classes_full[] = 'box-shadow-'.$atts['depth'];
          $row_classes[] = 'row-box-shadow-'.$atts['depth'];
    }
    if(!empty($atts['depth_hover'])){
       $row_classes[] = 'has-shadow';
          $row_classes_full[] = 'box-shadow-'.$atts['depth_hover'].'-hover';
          $row_classes[] = 'row-box-shadow-'.$atts['depth_hover'].'-hover';
    }

    if($atts['type'] == 'masonry'){
      wp_enqueue_script('flatsome-masonry-js');
      $row_classes[] = 'row-masonry';
    }

    if($atts['type'] == 'grid'){
      wp_enqueue_script('flatsome-masonry-js');
      $row_classes[] = 'row-grid';
    }

    if($atts['type'] == 'slider'){
      $row_classes[] = 'slider row-slider';

      if($atts['slider_style']) $row_classes[] = 'slider-nav-'.$atts['slider_style'];

      if($atts['slider_nav_position']) $row_classes[] = 'slider-nav-'.$atts['slider_nav_position'];

      if($atts['slider_nav_color']) $row_classes[] = 'slider-nav-'.$atts['slider_nav_color'];

      if($atts['slide_style']) $row_classes[] = 'slider-style-'.$atts['slide_style'];

      // Add slider push class to normal text boxes
      if(!$atts['style'] || $atts['style'] == 'default' || $atts['style'] == 'normal' || $atts['style'] == 'bounce') $row_classes[] = 'slider-nav-push';

      $slider_options = '{"imagesLoaded": true, "groupCells": '.$group_cells.', "dragThreshold" : 5, "cellAlign": "'.$atts['slide_align'].'" ,"wrapAround": '.$atts['infinitive'].',"prevNextButtons": true,"percentPosition": true,"pageDots": '.$atts['slider_bullets'].', "rightToLeft": '.$rtl.', "autoPlay" : '.$atts['auto_slide'].'}';

    } else if($atts['type'] == 'slider-full'){
      $row_classes_full[] = 'slider slider-auto-height row-collapse';

      if($atts['slider_nav_position']) $row_classes_full[] = 'slider-nav-'.$atts['slider_nav_position'];

      if($atts['slider_style']) $row_classes_full[] = 'slider-nav-'.$atts['slider_style'];

      $slider_options = '{"imagesLoaded": true, "dragThreshold" : 5, "cellAlign": "center","wrapAround": '.$atts['infinitive'].',"prevNextButtons": true,"percentPosition": true,"pageDots": '.$atts['slider_bullets'].', "rightToLeft": '.$rtl.', "autoPlay" : '.$atts['auto_slide'].'}';
    }
    
	$row_classes_full = array_unique( $row_classes_full );
	$row_classes      = array_unique( $row_classes );

	$row_classes_full = implode( ' ', $row_classes_full );
	$row_classes      = implode( ' ', $row_classes );
  ?>

  <?php if($atts['title']){?>
  <div class="row">
    <div class="large-12 col">
      <h3 class="section-title"><span><?php echo esc_html($atts['title']); ?></span></h3>
    </div>
  </div>
  <?php } ?>

  <?php if($atts['type'] == 'slider') { // Slider grid ?>
  <div class="row <?php echo esc_attr($row_classes); ?>"  data-flickity-options='<?php echo esc_attr($slider_options); ?>' <?php echo esc_attr($atts['attrs']) ?>>

  <?php } else if($atts['type'] == 'slider-full') { // Full slider ?>
  <div id="<?php echo esc_attr($atts['id']); ?>" class="<?php echo esc_attr($row_classes_full); ?>" data-flickity-options='<?php echo esc_attr($slider_options); ?>'>

  <?php } else if($atts['type'] == 'masonry') { // Masonry grid ?>
  <div id="<?php echo esc_attr($atts['id']); ?>" class="row <?php echo esc_attr($row_classes); ?>" data-packery-options='{"itemSelector": ".col", "gutter": 0, "presentageWidth" : true}'>

  <?php } else if($atts['type'] == 'grid') { ?>
  <div id="<?php echo esc_attr($atts['id']); ?>" class="row <?php echo esc_attr($row_classes); ?>" data-packery-options='{"itemSelector": ".col", "gutter": 0, "presentageWidth" : true}'>

  <?php } else if($atts['type'] == 'blank') { //Blank type ?>
  <div class="container">

  <?php } else { // Normal Rows ?>
  <div class="row <?php echo esc_attr($row_classes); ?>" <?php echo esc_attr($atts['attrs']) ?>>
  <?php }
}
