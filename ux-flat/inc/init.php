<?php
/**
 * Flatsome Engine Room.
 * This is where all Theme Functions runs.
 *
 * @package flatsome
 */
 
function get_theme_parent() {
    $parent = wp_get_theme()->get('Template');
    return $parent ? wp_get_theme($parent)->get('Name') : null;
}

function UXFPro() {
	return defined('UXF_PRO');
}

function uxf_shortcode() {
        
    /** Theme Options **/
    if( current_user_can( 'manage_options') ){
        require UXF_DIR . '/inc/admin/admin-init.php';
    }
    
    require_once get_template_directory() . '/inc/helpers/helpers-grid.php';
    require_once get_template_directory() . '/inc/helpers/helpers-shortcode.php';
    
    remove_action( 'flatsome_footer', 'flatsome_go_to_top');
    
    if (get_theme_mod('elements', 0)) {
        $sc_elements = [
            'background', 'section', 'section_inner', 
            'title', 'divider', 'button', 'ux_menu_link', 'follow', 
            'map', 'ux_gallery', 'ux_slider', 'blog_posts', 'lightbox'
        ];
        foreach ($sc_elements as $element) {
            if (shortcode_exists($element)) {
                remove_shortcode($element);
            }
        }
        require_once UXF_DIR . '/inc/shortcodes/sections.php';
        require_once UXF_DIR . '/inc/shortcodes/title.php';
        require_once UXF_DIR . '/inc/shortcodes/divider.php';
        require_once UXF_DIR . '/inc/shortcodes/button.php';
        require_once UXF_DIR . '/inc/shortcodes/ux_menu_link.php';
        require_once UXF_DIR . '/inc/shortcodes/follow.php';
        require_once UXF_DIR . '/inc/shortcodes/google_maps.php';
        require_once UXF_DIR . '/inc/shortcodes/ux_gallery.php';
        require_once UXF_DIR . '/inc/shortcodes/ux_slider.php';
        require_once UXF_DIR . '/inc/shortcodes/blog_posts.php';
        require_once UXF_DIR . '/inc/shortcodes/lightbox.php';
    }
    if(get_theme_mod('uxf_module', 0)){
        require_once UXF_DIR . '/inc/shortcodes/module.php';
    }
    if(get_theme_mod('uxf_typed', 0)){
        require_once UXF_DIR . '/inc/shortcodes/ux_typed.php';
    }
    if(get_theme_mod('uxf_menus', 0)){
        require_once UXF_DIR . '/inc/shortcodes/menu.php';
    }
}
add_action('after_setup_theme', 'uxf_shortcode', 5);

// Templates
function uxf_builder_setup() {
    require_once UXF_DIR . '/inc/admin/admin-init.php';
    //Load image
    require_once get_template_directory() . '/inc/builder/helpers.php';
    require_once UXF_DIR . '/inc/builder/helpers.php';
    if (get_theme_mod('elements', 0)) {
        require UXF_DIR . '/inc/builder/shortcodes/section.php';
        require UXF_DIR . '/inc/builder/shortcodes/title.php';
        require UXF_DIR . '/inc/builder/shortcodes/divider.php';
        require UXF_DIR . '/inc/builder/shortcodes/follow.php';
        require UXF_DIR . '/inc/builder/shortcodes/map.php';
        require UXF_DIR . '/inc/builder/shortcodes/button.php';
        require UXF_DIR . '/inc/builder/shortcodes/ux_gallery.php';
        require UXF_DIR . '/inc/builder/shortcodes/ux_slider.php';
        require UXF_DIR . '/inc/builder/shortcodes/blog_posts.php';
        require UXF_DIR . '/inc/builder/shortcodes/lightbox.php';
    }
    if(get_theme_mod('uxf_module', 0)){
        require UXF_DIR . '/inc/builder/shortcodes/module.php';
    }
    if(get_theme_mod('uxf_typed', 0)){
        require UXF_DIR . '/inc/builder/shortcodes/ux_typed.php';
    }
    if(get_theme_mod('uxf_categories', 0)){
        require UXF_DIR . '/inc/builder/shortcodes/blog_categories.php';
    }
    if(get_theme_mod('uxf_menus', 0)){
        require UXF_DIR . '/inc/builder/shortcodes/menu.php';
    }
}
add_action('ux_builder_setup', 'uxf_builder_setup');

function uxf_go_to_top(){
    include UXF_DIR . '/template-parts/footer/back-to-top.php';
}
add_action( 'flatsome_footer', 'uxf_go_to_top');

function get_breadcrumbs() { 
    if (!is_front_page() && get_theme_mod('breadcrums_posts', 0)) {
    ?><div class="flex-row medium-flex-wrap container">
        <?php flatsome_breadcrumb(); ?>
    </div><?php
    }
}
add_action( 'flatsome_before_blog' , 'get_breadcrumbs', 10 ); 

function uxflat_scripts() {
    wp_enqueue_style( 'uxflat', UXF_URL . 'assets/css/uxflat.min.css', [], null, 'all' );
    // Scroll To Top
    if (get_theme_mod( 'back_to_top_pro' )) {
       wp_enqueue_script( 'scroll', UXF_URL. 'assets/js/scroll.min.js', ['jquery'], null, true );
    }
    $content = '';
    // Font family customization
    if($fonts = get_theme_mod('custom_font_family')) { 
        $content .= 'body,h1,h2,h3,h4,h5,h6, .heading-font, .off-canvas-center .nav-sidebar.nav-vertical > li > a,.nav > li > a, .mobile-sidebar-levels-2 .nav > li > ul > li > a, .alt-font{
            font-family: '.wp_kses_post($fonts).'
        }';
    }

    // Single divider visibility
    if ( get_theme_mod( 'blog_single_divider' ) ) {
        $content .= '.single .entry-header .entry-divider {
            display: none !important;
        }';
    }

    // Back to top position
    if ( $btt_bottom = get_theme_mod( 'back_to_top_bottom' ) ) {
        $content .= '.back-to-top{bottom:'.esc_attr($btt_bottom).'!important;}';
    }

    // Box shadow customization
    if (get_theme_mod('uxf_boxshadow')) {
        $box_horizontal = get_theme_mod('uxf_boxshadow_horizontal', 0);
        $box_vertical = get_theme_mod('uxf_boxshadow_vertical', 0);
        $box_blur = get_theme_mod('uxf_boxshadow_blur', 20);
        $box_spread = get_theme_mod('uxf_boxshadow_spread', 0);
        
        $boxshadow_1 = "{$box_horizontal}px {$box_vertical}px {$box_blur}px {$box_spread}px " . get_theme_mod('uxf_boxshadow_1', 'rgba(0,51,90,.12)');
        $boxshadow_2 = "{$box_horizontal}px {$box_vertical}px " . ($box_blur + 2) . "px {$box_spread}px " . get_theme_mod('uxf_boxshadow_2', 'rgba(0,51,90,.16)');
        $boxshadow_3 = "{$box_horizontal}px {$box_vertical}px " . ($box_blur + 4) . "px {$box_spread}px " . get_theme_mod('uxf_boxshadow_3', 'rgba(0,51,90,.19)');
        $boxshadow_4 = "{$box_horizontal}px {$box_vertical}px " . ($box_blur + 6) . "px {$box_spread}px " . get_theme_mod('uxf_boxshadow_4', 'rgba(0,51,90,.25)');
        $boxshadow_5 = "{$box_horizontal}px {$box_vertical}px " . ($box_blur + 8) . "px {$box_spread}px " . get_theme_mod('uxf_boxshadow_5', 'rgba(0,51,90,.3)');

        $content .= ".box-shadow-1,
        .box-shadow-1-hover:hover,
        .row-box-shadow-1 .col-inner,
        .row-box-shadow-1-hover .col-inner:hover {
            box-shadow: " . esc_attr($boxshadow_1) . ";
        }
        .box-shadow-2,
        .box-shadow-2-hover:hover,
        .row-box-shadow-2 .col-inner,
        .row-box-shadow-2-hover .col-inner:hover {
            box-shadow: " . esc_attr($boxshadow_2) . ";
        }
        .box-shadow-3,
        .box-shadow-3-hover:hover,
        .row-box-shadow-3 .col-inner,
        .row-box-shadow-3-hover .col-inner:hover {
            box-shadow: " . esc_attr($boxshadow_3) . ";
        }
        .box-shadow-4,
        .box-shadow-4-hover:hover,
        .row-box-shadow-4 .col-inner,
        .row-box-shadow-4-hover .col-inner:hover {
            box-shadow: " . esc_attr($boxshadow_4) . ";
        }
        .box-shadow-5,
        .box-shadow-5-hover:hover,
        .row-box-shadow-5 .col-inner,
        .row-box-shadow-5-hover .col-inner:hover {
            box-shadow: " . esc_attr($boxshadow_5) . ";
        }";
    }

    // Pagination styles
    if(get_theme_mod('uxf_pagination', 0)){
        $content .= ".nav-pagination>li>.current, .nav-pagination>li>a:hover, .nav-pagination>li>span:hover {
            color: " . esc_attr(get_theme_mod('uxf_pagination_hovercolor', '#fff')) . ";
            background-color: " . esc_attr(get_theme_mod('uxf_pagination_hoverbgcolor', 'var(--fs-color-primary)')) . ";
            border-color: " . esc_attr(get_theme_mod('uxf_pagination_hoverbgborder', 'var(--fs-color-primary)')) . ";
        }
        .nav-pagination>li>a, .nav-pagination>li>span {
            background-color: " . esc_attr(get_theme_mod('uxf_pagination_bgcolor', '#fff')) . ";
            border-color: " . esc_attr(get_theme_mod('uxf_pagination_border', 'currentColor')) . ";
            border-radius: " . intval(get_theme_mod('uxf_pagination_border_radius', 99)).'px' . ";
        }
        .nav-pagination>li>a {
            color: " . esc_attr(get_theme_mod('uxf_pagination_color', 'currentColor')) . ";
        }";
    }

    // Tooltip styles
    if(get_theme_mod('tooltips_size')){
        $content .= ".tooltipster-content{
            font-size:" . esc_attr(get_theme_mod('tooltips_size')) . "px!important;
        }";
    }

    // Posted on meta styles
    if (get_theme_mod( 'uxf_posted_on', 0 )) {
        $content .= ".entry-header .entry-meta {
            text-transform: none;
            align-items: center;
            display: flex;
            flex-flow: row nowrap;
            justify-content: " . esc_attr(get_theme_mod('uxf_posted_align', 'flex-start')) . ";
            width: 100%;
        }
        .entry-meta > span {
            margin-right: 20px;
        }
        .entry-meta i {
            vertical-align: middle;
            margin: 0 5px;
            font-size:18px;
        }
        .entry-meta .posted-right {
            margin-left: auto;
        }";
    }

    // Blog archive styles
    if (get_theme_mod( 'blog_style_list' )) {
        $content .= ".blog-archive .post-item:nth-child(1) .box-image {width: 50%!important;}
        .blog-archive .post-item:nth-child(2), 
        .blog-archive .post-item:nth-child(3), 
        .blog-archive .post-item:nth-child(4), 
        .blog-archive .post-item:nth-child(5) {
            max-width: 50%; 
            flex-basis: 50%; 
            display: block !important;
        }
        .blog-archive .post-item:nth-child(2) .box-text p, 
        .blog-archive .post-item:nth-child(3) .box-text p, 
        .blog-archive .post-item:nth-child(4) .box-text p, 
        .blog-archive .post-item:nth-child(5) .box-text p {
            display:none;
        }
        .blog-archive .box-vertical.box-image, 
        .blog-archive .box-vertical .box-text {
            display: inherit;
        }";
    }

    // Add inline styles if content exists
    if ( ! empty( $content ) ) {
        wp_add_inline_style( 'uxflat', $content );
    }
}
add_action( 'wp_enqueue_scripts', 'uxflat_scripts', 150 );

//Change Icons
if(get_theme_mod('uxf_fl_icons')){
    require UXF_DIR . '/inc/helpers/helpers-icons.php';
}
    
// Typing Search
if (get_theme_mod('search_typing') && get_theme_mod('uxf_typed', 0)) {
    function add_shortcode_search_typing() {
        $search_text = get_theme_mod('search_typing');
        echo do_shortcode('[ux_typed target=".search-field" typespeed="100" loop="true" attr="placeholder"]'.esc_html($search_text).'[/ux_typed]');
    }
    add_action('wp_footer', 'add_shortcode_search_typing');
}

if(get_theme_mod('default_title_hidden')){
    add_action( 'flatsome_before_header', 'title_front_page');
    function title_front_page() {
        if(is_front_page()){ 
            echo '<h1 class="hidden">'.esc_attr( get_bloginfo( 'name', 'display' ) ).'</h1>';
            if(get_theme_mod('default_title_hidden') == 2) {
                echo '<h2 class="hidden">'.esc_attr( get_bloginfo( 'description', 'display' ) ).'</h2>';
            }
        } 
    }
}

//Of Option
if ( get_theme_mod( 'tooltips', 0 ) ) {
    function remove_tooltip_from_links( $links ) {
        foreach ( $links as $key => $link ) {
            if ( ! empty( $link['atts']['title'] ) ) {
                $links[ $key ]['atts']['title'] = null;
            }
            if ( ! empty( $link['atts']['class'] ) ) {
                $links[ $key ]['atts']['class'] = implode( ' ', array_diff( explode( ' ', $link['atts']['class'] ), array( 'tooltip' ) ) );
            }
        }
        return $links;
    }
    add_filter( 'flatsome_follow_links', 'remove_tooltip_from_links', 10, 2 );
    add_filter( 'flatsome_share_links', 'remove_tooltip_from_links', 10, 2 );
}

// Change Woocommerce heading tag
if (get_theme_mod('product_title')) {
    add_action('woocommerce_shop_loop_item_title', 'uxf_woo_template_loop_product_title', 9);
    function uxf_woo_template_loop_product_title() {
        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
        $tag = esc_attr(get_theme_mod('product_title', 'h2'));
        echo '<' . $tag . ' class="name product-title ' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">';
        woocommerce_template_loop_product_link_open();
        echo esc_html(get_the_title());
        woocommerce_template_loop_product_link_close();
        echo '</' . $tag . '>';
    }
}


// Translated Text
if(get_theme_mod('uxf_translate')){
    add_filter('gettext', 'flatsome_translation', 10, 3);
    function flatsome_translation($translated_text, $untranslated_text, $domain) {
        $translations_text = get_theme_mod('uxf_translate');
        if ($domain === 'flatsome') {
            $translations_lines = explode("\n", $translations_text);
            $translations_array = array();
            foreach ($translations_lines as $line) {
                $pair = explode('|', $line);
                if (count($pair) == 2) {
                    $translations_array[trim($pair[0])] = trim($pair[1]);
                }
            }
            if (isset($translations_array[$untranslated_text])) {
                $translated_text = $translations_array[$untranslated_text];
            }
        }
        return $translated_text;
    }
}

// Remove the last static crumb on single post 
if(get_theme_mod('wpseo_breadcrumb_remove_last', 0)){
    function remove_last_crumb_blog( $crumbs ) {
        if ( is_single () && count( $crumbs ) > 1 ) {
            array_pop( $crumbs );
        }
        return $crumbs;
    }
    add_filter( 'wpseo_breadcrumb_links', 'remove_last_crumb_blog' );
}

if ( ! function_exists( 'flatsome_posted_on' )  && get_theme_mod( 'uxf_posted_on' )) {
    
    function flatsome_posted_on() {
        $display_type = get_theme_mod('uxf_posted_on');
        $posted_options = get_theme_mod('uxf_posted_all', []);

        if (empty($display_type)) {
            return;
        }

        if (in_array(1, $posted_options)) {
            $author_id = get_post_field('post_author', get_the_ID());
            $author_icon = $display_type == 2 ? '<i class="icon-user-o"></i>' : __('Author:');
            echo '<span class="byline">' . $author_icon . ' <span class="meta-author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url($author_id)) . '">' . esc_html(get_the_author_meta('display_name', $author_id)) . '</a></span></span>';
        }

        if (in_array(2, $posted_options)) {
            $time_string = get_the_time('U') !== get_the_modified_time('U') ?
                '<time class="entry-date published" datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time><time class="updated" datetime="' . esc_attr(get_the_modified_date('c')) . '">' . esc_html(get_the_modified_date()) . '</time>' :
                '<time class="entry-date published updated" datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>';

            $clock_icon = $display_type == 2 ? '<i class="icon-clock"></i>' : __('Published').': ';
            echo '<span class="posted-on">' . $clock_icon . $time_string . '</span>';
        }

        if (in_array(3, $posted_options) && $views = get_theme_mod('uxf_posted_view')) {
            $view_icon = $display_type == 2 ? '<span class="dashicons dashicons-chart-bar"></span>' : __('View').': ';
            echo '<span class="views">' . $view_icon . do_shortcode($views) . '</span>';
        }

        if (in_array(4, $posted_options)) {
            $read_icon = $display_type == 2 ? '<i class="icon-eye"></i>' : '';
            echo '<span class="read-count">' . $read_icon . do_shortcode('[post-reads]') . '</span>';
        }

        if (in_array(5, $posted_options) && ($video_url = get_theme_mod('uxf_posted_video')) && UXFPro()) {
            $video_view = get_post_meta(get_the_ID(), $video_url, true);
            if ($video_view) {
                $video_icon = $display_type == 2 ? '<i class="icon-youtube"></i> ' : '';
                echo '<span class="video-link">' . $video_icon . '<a href="' . esc_url($video_view) . '" class="open-video">' . esc_html__('View Video') . '</a></span>';
            }
        }

        if (in_array(6, $posted_options) && $ratings = get_theme_mod('uxf_posted_rating')) {
            echo '<span class="rating hide-for-small">' . do_shortcode($ratings) . '</span>';
        }

        if (in_array(7, $posted_options) && get_theme_mod('uxf_posted_ggnews', 0)) {
            echo '<a class="google-news-link" target="_blank" rel="nofollow" href="' . esc_url(get_theme_mod('uxf_posted_ggnews')) . '" title="' . esc_attr__('Google News') . '"><span class="text">' . esc_html__('Follow us on ') . '</span><img src="' . esc_url(UXF_URL . 'assets/img/ggnews.svg') . '" width="100" alt="' . esc_attr__('Google News') . '"></a>';
        }
    }
    
    function time_to_read() {
        if (empty($GLOBALS['post']->post_content)) return '';

        $time = max(1, floor(str_word_count(wp_strip_all_tags($GLOBALS['post']->post_content)) / 200));
        return sprintf(_n('One minute', '%s minutes', $time, 'ux-flat'), $time);
    }
    add_shortcode('post-reads', 'time_to_read');
}

if ( get_theme_mod( 'wpseo_title_shortcode' ) || get_theme_mod( 'rank_math_title_shortcode' )) {
    add_filter( 'the_title', 'do_shortcode' );
    //if ( class_exists( 'WPSEO_Options' ) ) {
    //}
    if ( class_exists( 'RankMath' ) ) {
        add_filter( 'rank_math/frontend/title', function( $title ) {
            $title = do_shortcode($title);
            return $title;
        });
        add_filter( 'rank_math/frontend/description', function( $description ) {
            $description = do_shortcode($description);
            return $description;
        });
    }
}

require UXF_DIR . '/inc/helpers/class.author.php';
require UXF_DIR . '/inc/helpers/class.avatar.php';
    
if(get_theme_mod('uxf_categories', 0)){
    require UXF_DIR . '/inc/shortcodes/blog_categories.php';
    require UXF_DIR . '/inc/helpers/class.categories.php';
}

if(get_theme_mod('uxf_category_layout', 0)){
    require UXF_DIR . '/inc/helpers/class.categories-layout.php';
}

if (get_theme_mod( 'blog_archive_layout')) {
    function custom_archive_layout($template) {
        if (is_category() || is_home()) {
            $template = UXF_DIR . 'template-parts/posts/archive-layout.php';
        }
        return $template;
    }
    add_filter('template_include', 'custom_archive_layout');
}

if(get_theme_mod('author_box', 0)){
    add_action('flatsome_before_comments', 'custom_blog_author_box', 10);
    function custom_blog_author_box(){
        $author_id = !empty($atts['id']) ? intval($atts['id']) : get_the_author_meta('ID');
        ?>
            <div class="entry-author author-box">
                <div class="flex-row align-top">
                    <div class="flex-col mr circle text-center">
                        <div class="blog-author-image mb-half">
                            <?php echo get_avatar($author_id, apply_filters('flatsome_author_bio_avatar_size', 90)); ?>
                        </div><?php echo do_shortcode('[social id="' . $author_id . '"]'); ?>
        </div>
                    <div class="flex-col flex-grow">
                        <p class="author-name is-bold uppercase mb-half">
                            <a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
                        </p>
                        <p class="author-desc is-small"><?php echo get_the_author_meta('description', $author_id); ?></p>
                    </div>
                </div>
            </div>
        <?php
        if(get_theme_mod('single_next_prev_nav', 0)){
            flatsome_content_nav( 'nav-below' );
            echo '<div class="gap-element clearfix" style="padding-top:30px;"></div>';
        }
    }
}

if(get_theme_mod('blog_archive_description', 0)){
    add_action('flatsome_before_blog', 'custom_flatsome_archive_title', 10);
    function custom_flatsome_archive_title(){ 
        remove_action('flatsome_before_blog', 'flatsome_archive_title', 15 );
        if ( get_theme_mod( 'blog_archive_title', 1 ) && ( is_archive() || is_search() ) ) {
            require UXF_DIR . '/template-parts/posts/partials/archive-title.php';
        }
    }
    
    add_action('flatsome_after_blog', 'custom_flatsome_archive_description');
    function custom_flatsome_archive_description() {
        if ( get_theme_mod( 'blog_archive_title', 1 ) ) {
            if ( is_category() ) :
                $category_description = category_description();
                if ( ! empty( $category_description ) ) :
                    echo apply_filters( 'category_archive_meta', '<div class="row"><div class="large-12 col"><div class="taxonomy-description">' . $category_description . '</div></div></div>' );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                endif;
            elseif ( is_tag() ) :
                $tag_description = tag_description();
                if ( ! empty( $tag_description ) ) :
                    echo apply_filters( 'tag_archive_meta', '<div class="row"><div class="large-12 col"><div class="taxonomy-description">' . $tag_description . '</div></div></div>' );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                endif;
            endif;
        }
    }
}

// Custom Blog Featured
if (get_theme_mod('blog_archive_featured')) {
    add_action('flatsome_before_blog', 'custom_flatsome_blog_featured');
    function custom_flatsome_blog_featured() {
        if (!is_category()) { return; }
        $cat = get_queried_object_id();
        if (!empty($cat)) {
            $shortcode_template = get_theme_mod('blog_archive_featured');
            if (strpos($shortcode_template, 'blog_posts') !== false) {
                $shortcode = str_replace("blog_posts", "blog_posts cat='{$cat}' show='featured'", $shortcode_template);
                echo do_shortcode($shortcode);
            }
        }
    }
}

// Flatsome Issues
if(get_theme_mod('fs_issues', 0)){
    add_action( 'init', 'flatsome_nag' );
    function flatsome_nag() {
        remove_action( 'admin_notices', 'flatsome_maintenance_admin_notice' );
    }
}

if(get_theme_mod('blog_single_refresh')){
    add_action('wp_head','meta_post_refresh', 1);
    function meta_post_refresh() {
        if (is_single()) {
            echo '<meta http-equiv="refresh" content="'.intval(get_theme_mod('blog_single_refresh')).'">';
        }
    }
}

if(get_theme_mod('uxf_related')){
    function get_related_posts($args, $current_post_id) {
        $query = new WP_Query($args);
        $post_ids = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                if ($post_id != $current_post_id) {
                    $post_ids[] = $post_id;
                }
            }
        }
        wp_reset_postdata();
        return $post_ids;
    }
    
    function display_related_posts($args, $current_post_id, $shortcode_template) {
        $post_ids = get_related_posts($args, $current_post_id);
        if (!empty($post_ids) && strpos($shortcode_template, 'blog_posts') !== false) {
            $ids = implode(',', $post_ids);
            $shortcode = str_replace("blog_posts", "blog_posts ids='{$ids}'", $shortcode_template);
            echo do_shortcode($shortcode);
        }
    }

    function uxf_post_after_blog() {
        if (!is_singular('post')) return;
        global $post;
        $current_post_id = $post->ID;
        $related_order = get_theme_mod('uxf_related_order', []);
        $related_total = intval(get_theme_mod('uxf_related_posts', 4)+1);
        $tags = wp_get_post_tags($current_post_id);
        if ($tags && in_array(1, $related_order)){
            $tags_args = array(
                'tag__in' => wp_get_post_tags($current_post_id, array('fields' => 'ids')),
                'posts_per_page' => $related_total,
            );
            $post_tags = get_theme_mod('uxf_related_tags');
            display_related_posts($tags_args, $current_post_id, $post_tags);
        }

        if (in_array(2, $related_order)) {
            $cat_args = array(
                'category__in' => wp_get_post_categories($current_post_id, array('fields' => 'ids')),
                'posts_per_page' => $related_total,
            );
            $post_cats = get_theme_mod('uxf_related_cats');
            display_related_posts($cat_args, $current_post_id, $post_cats);
        }

        if (in_array(3, $related_order)) {
            $latest_args = array(
                'date_query' => array(
                    array(
                        'after' => get_the_time('Y-m-d H:i:s', $current_post_id),
                    ),
                ),
                'posts_per_page' => $related_total,
            );
            $post_latest = get_theme_mod('uxf_related_latest');
            display_related_posts($latest_args, $current_post_id, $post_latest);
        }

        if (in_array(4, $related_order)) {
            $older_args = array(
                'date_query' => array(
                    array(
                        'before' => get_the_time('Y-m-d H:i:s', $current_post_id),
                    ),
                ),
                'posts_per_page' => $related_total,
            );
            $post_older = get_theme_mod('uxf_related_older');
            display_related_posts($older_args, $current_post_id, $post_older);
        }
        
        if (in_array(5, $related_order)) {
            $related_posts_meta = get_post_meta($current_post_id, '_related_posts', true);
            if (!empty($related_posts_meta) && is_array($related_posts_meta)) {
                $related_post_ids = array_filter($related_posts_meta, 'is_numeric');
                if (!empty($related_post_ids)) {
                    $post_field = get_theme_mod('uxf_related_field');
                    $related_ids = implode(', ', $related_post_ids);
                    $shortcode = str_replace("blog_posts", "blog_posts ids='" . esc_attr($related_ids) . "'", $post_field);
                    echo do_shortcode($shortcode);
                }
            }
        }

    }

    if(get_theme_mod('uxf_related') == 1) {
        add_action('flatsome_after_blog', 'uxf_post_after_blog');
    } else {
        add_action('flatsome_before_comments','uxf_post_after_blog');
    }
}

if(get_theme_mod('lightbox_close', 0)){
    add_filter( 'flatsome_lightbox_close_btn_inside', '__return_true' );
    add_filter( 'flatsome_lightbox_close_button', function ( $html ) {
        $html = '<button title="%title%" type="button" class="mfp-close">';
        $html .= '×';
        $html .= '</button>';
        return $html;
    } );
}

if (get_theme_mod( 'type_font_size')) {
    function fs_mce_text_sizes( $text_array ){
        $text_size = esc_attr(get_theme_mod( 'type_font_size' ));
        if ($text_size == "pixel") {
            $text_array['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px 40px 44px 48px 50px 56px 64px 72px";
        } elseif ($text_size == "point") {
            $text_array['fontsize_formats'] = "5pt 6pt 7pt 8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 22pt 24pt 26pt 28pt 30pt 32pt 34pt 36pt 38pt";  
        }
        return $text_array;
    }
    add_filter( 'tiny_mce_before_init', 'fs_mce_text_sizes', 99 );
}


if(get_theme_mod('uxf_search', 0)){
    function search_only_title($search, $wp_query) {
        global $wpdb;
        if (empty($search)) {
            return $search;
        }
        $q = $wp_query->query_vars;
        $n = !empty($q['exact']) ? '' : '%';
        $search = $searchand = '';
        foreach ((array)$q['search_terms'] as $term) {
            $term = esc_sql($wpdb->esc_like($term));
            $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
            $searchand = ' AND ';
        }
        if (!empty($search)) {
            $search = " AND ({$search}) ";
            if (!is_user_logged_in()) {
                $search .= " AND ($wpdb->posts.post_password = '') ";
            }
        }
        return $search;
    }
    add_filter('posts_search', 'search_only_title', 500, 2);
}
