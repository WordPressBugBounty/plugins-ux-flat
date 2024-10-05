<?php
// [blog_posts]
function shortcode_latest_from_uxf_blog($atts, $content = null, $tag = '' ) {
	$defined_atts = $atts;
	extract($atts = shortcode_atts(array(
		"_id" => 'row-'.wp_rand(),
		'style' => '',
		'class' => '',
		'visibility' => '',
		// Layout
		"columns" => '4',
		"columns__sm" => '1',
		"columns__md" => '',
		'col_spacing' => '',
		"type" => 'slider', // slider, row, masonery, grid
		'width' => '',
		'grid' => '1',
		'grid_height' => '600px',
		'grid_height__md' => '500px',
		'grid_height__sm' => '400px',
		'slider_nav_style' => 'reveal',
		'slider_nav_position' => '',
		'slider_nav_color' => '',
		'slider_bullets' => 'false',
	 	'slider_arrows' => 'true',
        'slide_style' => 'normal',
        'slide_width' => '',
        'slide_align' => 'center',
		'auto_slide' => 'false',
		'infinitive' => 'true',
		'depth' => '',
   		'depth_hover' => '',
		// Relay
		'relay' => '',
		'relay_control_result_count' => 'true',
		'relay_control_position' => 'bottom',
		'relay_control_align' => 'center',
		'relay_id' => '',
		'relay_class' => '',
		// posts
		'posts' => '8',
		'ids' => '', // Custom IDs
		'cat' => '',
		'category' => '', // Added for Flatsome v2 fallback
		'excerpt' => 'visible',
		'excerpt_length' => 15,
		'custom_fields' => '',
		'offset' => '',
		'orderby' => 'date',
		'order' => 'DESC',
		'tags' => '',
		'page_number' => '1',

		// Read more
		'readmore' => '',
		'readmore_color' => '',
		'readmore_style' => 'outline',
		'readmore_size' => 'small',

		// div meta
		'post_icon' => 'true',
		'comments' => '',
		'show_date' => 'badge', // badge, text
		'badge_style' => '',
		'show_category' => 'false',

		//Title
		'title_size' => 'large',
		'title_style' => '',

		// Box styles
		'animate' => '',
		'text_pos' => 'bottom',
	  	'text_padding' => '',
	  	'text_bg' => '',
	  	'text_size' => '',
	 	'text_color' => '',
	 	'text_hover' => '',
	 	'text_align' => 'center',
	 	'image_size' => 'medium',
	 	'image_width' => '',
	 	'image_radius' => '',
	 	'image_height' => '56%',
	    'image_hover' => '',
	    'image_hover_alt' => '',
	    'image_overlay' => '',
	    'image_depth' => '',
	    'image_depth_hover' => '',
        
        //UX Flat
		'metakey' => '',
		'not_ids' => false,
		'author' => '',
		'show_author' => 'false',
		'show_avatar' => '',
        'title_tag' => 'h3',
	    'image_direction' => '',
	  	'col_padding' => '',
		'col_bg' => '',
		'col_bg_radius' => '',
		'v_align' => '',
        'col_style' => '',
	  	'divider' => '',
        'image_icon' => '',
	 	'text_only' => '',
	 	'text_only_padding' => '',
	 	'banner' => '',
	 	'banner_posts' => '4',
	 	'banner_img' => '',
	 	'banner_url' => '',
	), $atts));

	// Stop if visibility is hidden
    if($visibility == 'hidden') return;
    
	ob_start();
	$classes_box = array();
	$classes_image = array();
	$classes_image_depth = array();
	$classes_text = array();
	$classes_text_only = array();
	$classes_repeater = array( $class );

	// Fix overlay color
    if($style == 'text-overlay'){
      $image_hover = 'zoom';
    }
    $style = str_replace('text-', '', $style);

	// Fix grids
	if($type == 'grid'){
	  if(!$text_pos) $text_pos = 'center';
	  $columns = 0;
	  $current_grid = 0;
	  $grid = uxf_get_posts($grid);
	  $grid_total = count($grid);
	}

	// Fix overlay
	if($style == 'overlay' && !$image_overlay) $image_overlay = 'rgba(0,0,0,.25)';

	// Set box style
	if($style) $classes_box[] = 'box-'.$style;
	if($style == 'overlay') $classes_box[] = 'dark';
	if($style == 'shade') $classes_box[] = 'dark';
	if($style == 'badge') $classes_box[] = 'hover-dark';
	if($image_direction == 'reverse') $classes_box[] = 'flex row-reverse';
	if($text_pos) $classes_box[] = 'box-text-'.$text_pos;

	if($image_hover)  $classes_image[] = 'image-'.$image_hover;
	if($image_hover_alt)  $classes_image[] = 'image-'.$image_hover_alt;
	if($image_height) $classes_image[] = 'image-cover';
    
	if($image_depth)  $classes_image_depth[] = 'box-shadow-'.$image_depth;
	if($image_depth_hover)  $classes_image_depth[] = 'box-shadow-'.$image_depth_hover.'-hover';

	// Text classes
	if($text_hover && !$text_only) $classes_text[] = 'show-on-hover hover-'.$text_hover;
	if($text_hover && $text_only) $classes_text_only[] = 'show-on-hover hover-'.$text_hover;
	if($text_align) $classes_text[] = 'text-'.$text_align;
	if($text_size && !$text_only) $classes_text[] = 'is-'.$text_size;
	if($text_size && $text_only) $classes_text_only[] = 'is-'.$text_size;
	if(($text_color == 'dark') && !$text_only) $classes_text[] = 'dark';
	if(($text_color == 'dark') && $text_only) $classes_text_only[] = 'dark';

	if($image_depth)  {
        $css_args_img = array(
          array( 'attribute' => 'border-radius', 'value' => $image_radius, 'unit' => 'px' ),
          array( 'attribute' => 'width', 'value' => $image_width, 'unit' => '%' ),
          array( 'attribute' => '-webkit-mask-image', 'value' => 'unset' ),
        );
    } else {
        $css_args_img = array(
          array( 'attribute' => 'border-radius', 'value' => $image_radius, 'unit' => 'px' ),
          array( 'attribute' => 'width', 'value' => $image_width, 'unit' => '%' ),
        );
    }

	$css_image_height = array(
        array( 'attribute' => 'padding-top', 'value' => $image_height),
        array( 'attribute' => 'border-radius', 'value' => $image_radius, 'unit' => 'px' ), //Fix Vertical
  	);

	if($text_only)  {
        $css_args = array(
          array( 'attribute' => 'padding', 'value' => $text_padding ),
        );
        $css_args_text = array(
          array( 'attribute' => 'background-color', 'value' => $text_bg ),
          array( 'attribute' => 'padding', 'value' => $text_only_padding ),
        );
    } else {
        $css_args = array(
          array( 'attribute' => 'background-color', 'value' => $text_bg ),
          array( 'attribute' => 'padding', 'value' => $text_padding ),
        );
        $css_args_text = '';
    }

	$css_args_col = array(
		array( 'attribute' => 'background-color', 'value' => $col_bg ),
		array( 'attribute' => 'border-radius', 'value' => $col_bg_radius, 'unit' => 'px' ),
      	array( 'attribute' => 'padding', 'value' => $col_padding ),
  	);

	$css_slider = array(
      	array( 'attribute' => 'max-width', 'value' => $slide_width ),
  	);

	$classes_text = implode(' ', $classes_text);
	$classes_text_only = implode(' ', $classes_text_only);
	$classes_image = implode(' ', $classes_image);
	$classes_image_depth = implode(' ', $classes_image_depth);
	$classes_box = implode(' ', $classes_box);

	// Repeater styles
	$repeater['id'] = $_id;
	$repeater['tag'] = $tag;
	$repeater['type'] = $type;
	$repeater['class'] = implode( ' ', $classes_repeater );
	//$repeater['class'] = $class;
	$repeater['visibility'] = $visibility;
	$repeater['style'] = $style;
	$repeater['slider_style'] = $slider_nav_style;
	$repeater['slider_nav_position'] = $slider_nav_position;
	$repeater['slider_nav_color'] = $slider_nav_color;
	$repeater['slider_bullets'] = $slider_bullets;
    $repeater['auto_slide'] = $auto_slide;
    $repeater['slide_style'] = $slide_style;
    $repeater['slide_width'] = $slide_width;
    $repeater['slide_align'] = $slide_align;
	$repeater['infinitive'] = $infinitive;
	$repeater['row_spacing'] = $col_spacing;
	$repeater['row_width'] = $width;
	$repeater['columns'] = $columns;
	if ( $v_align ) $repeater['columns'] .= ' align-equal';
	if ( $col_style ) $repeater['columns'] .= ' row-'.$col_style;
	$repeater['columns__md'] = $columns__md;
	$repeater['columns__sm'] = $columns__sm;
	$repeater['depth'] = $depth;
	$repeater['depth_hover'] = $depth_hover;
    
	$args = array(
		'post_status' => 'publish',
		'post_type' => 'post',
		'offset' => $offset,
		'cat' => $cat,
		'author' => $author,
		'tag__in' => $tags ? array_filter( array_map( 'trim', explode( ',', $tags ) ) ) : '',
		'posts_per_page' => $posts,
		'ignore_sticky_posts' => true,
		'orderby'             => $orderby,
		'order'               => $order,
		'post__not_in' => $not_ids ? array_filter( array_map( 'trim', explode( ',', $not_ids ) ) ) : '',
	);
    
    if ($metakey && $orderby == "meta_value_num") {
        $args['meta_key'] = $metakey;
    } elseif ($metakey) {
        $args['meta_query'] = array(
            'relation' => 'OR',
            array(
                'key'     => $metakey,
                'compare' => 'NOT EXISTS',
            ),
            array(
                'key'     => $metakey,
                'value'   => '',
                'compare' => '=',
            ),
        );
    }

	// Added for Flatsome v2 fallback
	if ( get_theme_mod('flatsome_fallback', 0) && $category ) {
		$args['category_name'] = $category;
	}

	// If custom ids
	if ( !empty( $ids ) ) {
		$ids = explode( ',', $ids );
		$ids = array_map( 'trim', $ids );
		$args = array(
			'post__in' => $ids,
            'post_type' => array(
                'post',
                'featured_item', // Include for its tag archive listing.
            ),
			'numberposts' => -1,
			'orderby' => 'post__in',
			'posts_per_page' => 9999,
			'ignore_sticky_posts' => true,
		);
		// Include for search archive listing.
		if ( is_search() ) {
			$args['post_type'][] = 'page';
		}
	}
    
	if ( is_numeric( $banner_img ) ) {
        $banners = wp_get_attachment_image_src( $banner_img, 'original' );
        $banners = $banners ? $banners[0] : '';
	}

    $recentPosts = new WP_Query( $args );
    Flatsome_Relay::render_container_open( $recentPosts, $tag, $defined_atts, $atts );
    if ( $type == 'grid' ) {
        uxf_get_posts_height( $grid_height, $_id );
    }

    get_uxf_repeater_start($repeater);
    $counter = 0;
    while ( $recentPosts->have_posts() ) : $recentPosts->the_post();
    $counter++;

    $col_class    = array( 'post-item' );
    $show_excerpt = $excerpt;

    if($slide_style == 'normal' || $slide_style == '') $col_class[] = 'col';
    if(get_post_format() == 'video') $col_class[] = 'has-post-icon';

    if($type == 'grid'){
    if($grid_total > $current_grid) $current_grid++;
    $current = $current_grid-1;

    $col_class[] = 'grid-col';
    if($grid[$current]['height']) $col_class[] = 'grid-col-'.$grid[$current]['height'];

    if($grid[$current]['span']) $col_class[] = 'large-'.$grid[$current]['span'];
    if($grid[$current]['md']) $col_class[] = 'medium-'.$grid[$current]['md'];

    // Set image size
    if($grid[$current]['size']) $image_size = $grid[$current]['size'];

    // Hide excerpt for small sizes
    if($grid[$current]['size'] == 'thumbnail') $show_excerpt = 'false';
    
}

?><div class="<?php echo esc_attr(implode(' ', $col_class)); ?>" <?php if($animate) echo 'data-animate="'.esc_attr($animate).'"';?> <?php echo get_shortcode_inline_css($css_slider); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <div class="col-inner" <?php echo get_shortcode_inline_css($css_args_col); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
        <div class="box <?php echo esc_attr($classes_box); ?> box-blog-post has-hover">
        <?php if(has_post_thumbnail() && $image_width !== "0") { ?>
            <div class="box-image <?php echo esc_attr($classes_image_depth); ?>" <?php echo get_shortcode_inline_css($css_args_img); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                <div class="<?php echo esc_attr($classes_image); ?>" <?php echo get_shortcode_inline_css($css_image_height); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                    <a href="<?php the_permalink() ?>" class="plain" aria-label="<?php echo esc_attr( the_title() ); ?>">
                        <?php the_post_thumbnail( $image_size ); ?>
                    </a>
                    <?php if($image_overlay){ ?>
                        <div class="overlay" style="background-color: <?php echo esc_attr($image_overlay);?>">
                            <?php if($image_icon) { ?>
                                <div class="absolute no-click x50 y50 md-x50 md-y50 lg-x50 lg-y50">
                                    <div class="overlay-icon">
                                        <i class="<?php echo esc_attr($image_icon); ?>"></i>
                                    </div>
                                </div>
                             <?php } ?>
                         </div>
                     <?php } ?>
                    <?php if($style == 'shade'){ ?><div class="shade"></div><?php } ?>
                </div>
                <?php if($show_category == 'badge') { ?>
                    <div class="absolute no-click x95 y5 md-x95 md-y5 lg-x95 lg-y5">
                        <div class="cat-label tag-label is-small is-bold">
                        <?php
                            foreach((get_the_category()) as $cat) {
                                echo esc_html($cat->cat_name) . ' ';
                            }
                        ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if($text_only) { ?>
                    <div class="absolute no-click x0 y100 md-x0 md-y100 lg-x0 lg-y100">
                        <div class="box-text-only <?php echo esc_attr($classes_text_only); ?>" <?php echo get_shortcode_inline_css($css_args_text); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                            <?php if ($custom_fields) { ?>
                                <?php do_action('flatsome_blog_post_field'); ?>
                            <?php } else { ?>
                                <?php echo flatsome_get_the_excerpt( $excerpt_length ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if($show_author == 'badge') { ?>
                    <div class="absolute no-click x5 y95 md-x5 md-y95 lg-x5 lg-y95">
                        <div class="author-box tag-label lowercase is-small" style="border-radius:99px;">
                            <div class="flex-row align-center">
                            <?php if($show_avatar) { ?>
                                <div class="flex-col circle">
                                    <div class="blog-author-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'flatsome_author_bio_avatar_size', 30 ) ); ?></div>
                                </div>
                                <div class="flex-col flex-grow badge-circle-inside mr-half">
                                    <?php the_author_meta( 'display_name' ); ?>
                                </div>
                            <?php } else { ?>
                                <div class="flex-col flex-grow">
                                    <?php the_author_meta( 'display_name' ); ?>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if($post_icon && get_post_format()) { ?>
                    <div class="absolute no-click x50 y50 md-x50 md-y50 lg-x50 lg-y50">
                        <div class="overlay-icon">
                            <i class="icon-play"></i>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
            <div class="box-text <?php echo esc_attr($classes_text); ?>" <?php echo get_shortcode_inline_css($css_args); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                <div class="box-text-inner blog-post-inner">
                <?php do_action('flatsome_blog_post_before'); ?>
                <?php if($show_category == 'label') { ?>
                    <div class="cat-label tag-label is-small is-bold">
                        <?php
                            foreach((get_the_category()) as $cat) {
                                echo esc_html($cat->cat_name) . ' ';
                            }
                        ?>
                    </div>
                <?php } ?>
                <<?php echo esc_attr($title_tag); ?> class="post-title is-<?php echo esc_attr($title_size); ?> <?php echo esc_attr($title_style);?>">
                    <a href="<?php the_permalink() ?>" class="plain"><?php the_title(); ?></a>
                </<?php echo esc_attr($title_tag); ?>>
                <?php if($show_author == 'text') { ?>
                    <div class="inline-block author-box" style="border-radius:99px;">
                        <div class="flex-row align-center">
                        <?php if($show_avatar) { ?>
                            <div class="flex-col circle">
                                <div class="blog-author-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'flatsome_author_bio_avatar_size', 22 ) ); ?></div>
                            </div>
                            <div class="flex-col flex-grow badge-circle-inside is-small is-bold">
                                <?php the_author_meta( 'display_name' ); ?>
                            </div>
                        <?php } else { ?>
                            <div class="flex-col flex-grow is-small is-bold">
                                <?php the_author_meta( 'display_name' ); ?>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if($show_category == 'text') { ?>
                    <div class="cat-label inline-block is-small is-bold">
                        <?php
                            foreach((get_the_category()) as $cat) {
                                echo esc_html($cat->cat_name) . ' ';
                            }
                        ?>
                    </div>
                <?php } ?>
                <?php if((!has_post_thumbnail() && $show_date !== 'false') || $show_date == 'text') {?>
                    <div class="post-meta inline is-small op-8"><?php echo get_the_date(); ?></div>
                <?php } ?>
                <?php if($divider) { ?>
                    <div class="is-divider"></div>
                <?php } ?>
                <?php if(($show_excerpt !== 'false') && !$text_only) { ?>
                <p class="from_the_blog_excerpt op-8 <?php if($show_excerpt !== 'visible'){ echo 'show-on-hover hover-'.esc_attr($show_excerpt); } ?>">
                    <?php if ($custom_fields) { ?>
                        <?php do_action('flatsome_blog_post_field'); ?>
                    <?php } else { ?>
                        <?php echo flatsome_get_the_excerpt( $excerpt_length ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    <?php } ?>
                </p>
                <?php } ?>
                
                <?php if ( $comments && comments_open() && '0' != get_comments_number() ) { ?>
                    <p class="from_the_blog_comments is-xsmall">
                        <?php
                            $comments_number = get_comments_number( get_the_ID() );
                            /* translators: %s: Comment count */
                            printf( _n( '%s Comment', '%s Comments', $comments_number, 'flatsome' ), number_format_i18n( $comments_number ) ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?>
                    </p>
                <?php } ?>

                <?php if($readmore) { ?>
                    <a href="<?php the_permalink(); ?>" class="button <?php echo esc_attr($readmore_color); ?> is-<?php echo esc_attr($readmore_style); ?> is-<?php echo esc_attr($readmore_size); ?> mb-0">
                        <?php echo esc_attr($readmore) ;?>
                    </a>
                <?php } ?>
                <?php do_action('flatsome_blog_post_after'); ?>
                </div>
                </div>
                <?php if(has_post_thumbnail() && ($show_date == 'badge' || $show_date == 'true')) {?>
                <?php if(!$badge_style) $badge_style = get_theme_mod('blog_badge_style', 'outline'); ?>
                    <div class="badge absolute top post-date badge-<?php echo esc_attr($badge_style); ?>">
                        <div class="badge-inner">
                            <span class="post-date-day"><?php echo esc_html(get_the_time('d', get_the_ID())); ?></span><br>
                            <span class="post-date-month is-xsmall"><?php echo esc_html(get_the_time('M', get_the_ID())); ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if ($banner && ($counter % intval($banner_posts) == 0 && $counter != 0)) {
        echo '<div class="col post-item post-banner"><div class="col-inner"><a href="'.esc_url($banner_url).'" target="_blank"><img src="'.esc_url($banners).'" /></a></div></div>';
    } ?>
    <?php endwhile;
    wp_reset_query();
    // Get repeater end.
    get_flatsome_repeater_end($atts);
	Flatsome_Relay::render_container_close();
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode("blog_posts", "shortcode_latest_from_uxf_blog");
