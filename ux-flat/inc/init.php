<?php
/**
 * Flatsome Engine Room.
 * This is where all Theme Functions runs.
 *
 * @package flatsome
 */
 
 /**
 * Theme Admin
 */
function uxf_pro_enabled() {
	return defined('UXF_PRO');
}
function uxf_pro_class() {
	return uxf_pro_enabled() ? 'active' : 'inactive';
}
function uxf_customizer( $wp_customize ) {
    require UXF_PATH . '/inc/admin/admin-init.php';
}
add_action( 'after_setup_theme', 'uxf_customizer', 10 );

function uxf_custom_css() {
ob_start();
?>
<style id="uxf-custom-css" type="text/css">
<?php 
if(get_theme_mod('uxf_boxshadow')) { 
    $boxshadow_horizontal = intval(get_theme_mod('uxf_boxshadow_horizontal'));
    $boxshadow_vertical = intval(get_theme_mod('uxf_boxshadow_vertical'));
    $boxshadow_blur = intval(get_theme_mod('uxf_boxshadow_blur'));
    $boxshadow_spread = intval(get_theme_mod('uxf_boxshadow_spread'));
    $boxshadow_1 = $boxshadow_horizontal.'px '.$boxshadow_vertical.'px '.$boxshadow_blur.'px '.$boxshadow_spread.'px '.get_theme_mod('uxf_boxshadow_1','rgba(0,51,90,.12)');
    $boxshadow_2 = $boxshadow_horizontal.'px '.$boxshadow_vertical.'px '.($boxshadow_blur+2).'px '.$boxshadow_spread.'px '.get_theme_mod('uxf_boxshadow_2','rgba(0,51,90,.16)');
    $boxshadow_3 = $boxshadow_horizontal.'px '.$boxshadow_vertical.'px '.($boxshadow_blur+4).'px '.$boxshadow_spread.'px '.get_theme_mod('uxf_boxshadow_3','rgba(0,51,90,.19)');
    $boxshadow_4 = $boxshadow_horizontal.'px '.$boxshadow_vertical.'px '.($boxshadow_blur+6).'px '.$boxshadow_spread.'px '.get_theme_mod('uxf_boxshadow_4','rgba(0,51,90,.25)');
    $boxshadow_5 = $boxshadow_horizontal.'px '.$boxshadow_vertical.'px '.($boxshadow_blur+8).'px '.$boxshadow_spread.'px '.get_theme_mod('uxf_boxshadow_5','rgba(0,51,90,.3)');
?>
.box-shadow-1,
.box-shadow-1-hover:hover,
.row-box-shadow-1 .col-inner,
.row-box-shadow-1-hover .col-inner:hover {
    box-shadow: <?php echo esc_attr($boxshadow_1); ?>;
}

.box-shadow,
.box-shadow-2,
.box-shadow-2-hover:hover,
.row-box-shadow-2 .col-inner,
.row-box-shadow-2-hover .col-inner:hover {
    box-shadow: <?php echo esc_attr($boxshadow_2); ?>;
}

.box-shadow-3,
.box-shadow-3-hover:hover,
.row-box-shadow-3 .col-inner,
.row-box-shadow-3-hover .col-inner:hover {
    box-shadow: <?php echo esc_attr($boxshadow_3); ?>;
}

.box-shadow-4,
.box-shadow-4-hover:hover,
.row-box-shadow-4 .col-inner,
.row-box-shadow-4-hover .col-inner:hover {
    box-shadow: <?php echo esc_attr($boxshadow_4); ?>;
}

.box-shadow-5,
.box-shadow-5-hover:hover,
.row-box-shadow-5 .col-inner,
.row-box-shadow-5-hover .col-inner:hover {
    box-shadow: <?php echo esc_attr($boxshadow_5); ?>;
}

<?php }
if(get_theme_mod('uxf_textshadow')) { 
    $textshadow_horizontal = intval(get_theme_mod('uxf_textshadow_horizontal'));
    $textshadow_vertical = intval(get_theme_mod('uxf_textshadow_vertical'));
    $textshadow_blur = intval(get_theme_mod('uxf_textshadow_blur'));
    $textshadow_1 = $textshadow_horizontal.'px '.$textshadow_vertical.'px '.$textshadow_blur.'px '.get_theme_mod('uxf_textshadow_1','rgba(0, 0, 0, .2)');
    $textshadow_2 = ($textshadow_horizontal+1).'px '.($textshadow_vertical+1).'px '.($textshadow_blur+3).'px '.get_theme_mod('uxf_textshadow_2','rgba(0, 0, 0, .3)');
    $textshadow_3 = ($textshadow_horizontal+2).'px '.($textshadow_vertical+2).'px '.($textshadow_blur+6).'px '.get_theme_mod('uxf_textshadow_3','rgba(0, 0, 0, .4)');
    $textshadow_4 = ($textshadow_horizontal+3).'px '.($textshadow_vertical+3).'px '.($textshadow_blur+9).'px '.get_theme_mod('uxf_textshadow_4','rgba(0, 0, 0, .5)');
    $textshadow_5 = ($textshadow_horizontal+4).'px '.($textshadow_vertical+4).'px '.($textshadow_blur+12).'px '.get_theme_mod('uxf_textshadow_5','rgba(0, 0, 0, .6)');
?>
.text-shadow,
.text-shadow-1 {
    text-shadow: <?php echo esc_attr($textshadow_1); ?>;
}
.text-shadow-2 {
    text-shadow: <?php echo esc_attr($textshadow_2); ?>;
}
.text-shadow-3 {
    text-shadow: <?php echo esc_attr($textshadow_3); ?>;
}
.text-shadow-4 {
    text-shadow: <?php echo esc_attr($textshadow_4); ?>;
}
.text-shadow-5 {
    text-shadow: <?php echo esc_attr($textshadow_5); ?>;
}
<?php } ?>
<?php if(get_theme_mod('uxf_font_family')) { ?>
body,h1,h2,h3,h4,h5,h6,.heading-font,.off-canvas-center .nav-sidebar.nav-vertical>li>a,.nav>li>a,.mobile-sidebar-levels-2 .nav>li>ul>li>a, .tooltipster-content {
    font-family: "<?php echo esc_attr(get_theme_mod('uxf_font_family')); ?>",-apple-system, BlinkMacSystemFont, "Segoe UI", "Noto Sans", Helvetica, Arial, sans-serif;
}
<?php } ?>
<?php if(get_theme_mod('uxf_btn_hover')) {
    $btnshadow_horizontal = intval(get_theme_mod('uxf_btn_horizontal'));
    $btnshadow_vertical = intval(get_theme_mod('uxf_btn_vertical'));
    $btnshadow_blur = intval(get_theme_mod('uxf_btn_blur'));
    $btnshadow_spread = intval(get_theme_mod('uxf_btn_spread'));
    $btnshadow = $btnshadow_horizontal.'px '.$btnshadow_vertical.'px '.$btnshadow_blur.'px '.$btnshadow_spread.'px '.get_theme_mod('uxf_btn_shadow','rgba(0, 0, 0, .2)');
?>
.button:hover,.dark .button.is-form:hover,input[type=button]:hover,input[type=reset]:hover,input[type=submit]:hover {
    -webkit-box-shadow: <?php echo esc_attr($btnshadow); ?>;
    -moz-box-shadow: <?php echo esc_attr($btnshadow); ?>;
    box-shadow: <?php echo esc_attr($btnshadow); ?> !important;
}
<?php } ?>
<?php if(get_theme_mod('uxf_btn_gradient_first') && get_theme_mod('uxf_btn_gradient_second')) { ?>
.button.primary:not(.is-outline) {
    background: linear-gradient(to right, <?php echo esc_attr(get_theme_mod('uxf_btn_gradient_first')); ?>, <?php echo esc_attr(get_theme_mod('uxf_btn_gradient_second')); ?>);
    border: unset;
} 
.is-outline.primary {
    color: <?php echo esc_attr(get_theme_mod('uxf_btn_gradient_first')); ?>;
    background: linear-gradient(to right, <?php echo esc_attr(get_theme_mod('uxf_btn_gradient_first')); ?>, <?php echo esc_attr(get_theme_mod('uxf_btn_gradient_second')); ?>);
    background-origin: border-box;
    box-shadow: inset 0 1000px white;
    border: 2px solid transparent;
}
.is-outline.primary:hover {
    border: 2px solid transparent;
}
<?php } ?>
<?php if(get_theme_mod('uxf_tooltips_size')){ ?>
.tooltipster-content{font-size:<?php echo esc_attr(get_theme_mod('uxf_tooltips_size')); ?>px!important;padding:0px 5px!important;}
<?php } ?>
<?php if(get_theme_mod('uxf_tooltips_color')){ ?>
.tooltipster-base {--tooltip-color: #fff;--tooltip-bg-color: <?php echo esc_attr(get_theme_mod('uxf_tooltips_color')); ?>;}
<?php } ?>
<?php if(get_theme_mod('uxf_pagination', 0)){ ?>
.nav-pagination>li>.current, .nav-pagination>li>a:hover, .nav-pagination>li>span:hover {
    color: <?php echo esc_attr(get_theme_mod('uxf_pagination_hovercolor')); ?>;
    background-color: <?php echo esc_attr(get_theme_mod('uxf_pagination_hoverbgcolor')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('uxf_pagination_hoverbgborder')); ?>;
}
.nav-pagination>li>a, .nav-pagination>li>span {
    background-color: <?php echo esc_attr(get_theme_mod('uxf_pagination_bgcolor')); ?>;
    border-color: <?php echo esc_attr(get_theme_mod('uxf_pagination_border')); ?>;
    border-radius: <?php echo intval(get_theme_mod('uxf_pagination_border_radius')).'px'; ?>;
}
.nav-pagination>li>a {
    color: <?php echo esc_attr(get_theme_mod('uxf_pagination_color')); ?> !important;
}
<?php } ?>
<?php if(get_theme_mod('default_title_hidden', 0) && is_front_page()){ ?>
.entry-header {
    display: none !important;
}
<?php } ?>
<?php if(get_theme_mod('uxf_single_divider', 0)){ ?>
.single .entry-header .entry-divider {
    display: none !important;
}
<?php } ?>
<?php if (get_theme_mod( 'uxf_contact_fixed')) { ?>
@media screen and (min-width: 768px) {
    .header-contact-wrapper {
        position: fixed !important;
        right: 10px;
        top: 200px;
        z-index: 9999;
    }
    .header-contact-wrapper .tooltipster-sidetip {
        pointer-events: none;
        display: none !important;
    }
    .header-contact-wrapper ul {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style: none;
        padding: 0.5rem !important;
        margin:0;
        border-radius: 3rem;
        background: #333;
    }
    .header-contact-wrapper li:not(:last-child) {
        margin-bottom: 5px;
    }
    .header-contact-wrapper li a:after {
        border-left: none !important;
    }
    .header-contact-wrapper li {
        position: relative;
        margin-left:0 !important;
        margin-right:0 !important;
    }
    .header-contact-wrapper li a img {
        width: 25px;
    }
    .header-contact-wrapper li a {
        display: flex;
        align-items: center;
        transition: color 0.3s,background 0.3s;
        border-radius: 50%;
        color: #fff;
        perspective: 200px;
        padding: 0 !important;
        text-transform: none;
    }
    .header-contact-wrapper li i {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        margin: 0 !important;
    }
    .header-contact-wrapper a.zalo {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .header-contact-wrapper span {
        position: absolute;
        display: block;
        padding: 10px 20px;
        right: 140%;
        top: 50%;
        transform: translate(0%,-50%) rotateY(-60deg);
        transform-origin: right;
        border-radius: 7px;
        background-color: #333;
        color: #fff;
        perspective: 300px;
        transform-style: preserve-3d;
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s,visibility 0.3s,transform 0.3s cubic-bezier(.22,.61,.36,1);
        visibility: hidden;
        backface-visibility: hidden;
        white-space: nowrap;
    }
    .header-contact-wrapper span:after {
        content: '';
        position: absolute;
        border: 10px solid transparent;
        border-left-color: #333;
        top: 50%;
        margin-top: -10px;
        right: -15px;
    }
    .header-contact-wrapper li a:focus, .header-contact-wrapper li a:hover {
        text-decoration: none;
        background: var(--primary-color);
        color: #FFF;
    }
    .header-contact-wrapper a:hover>span {
        transform: translate(0,-50%);
        opacity: 1;
        visibility: visible;
        transition: opacity 0.3s,transform 0.3s cubic-bezier(.22,.61,.36,1);
    }
}
<?php } ?>
<?php if (get_theme_mod('uxf_scrollbar', 0)) { ?>
::-webkit-scrollbar {
    width: 10px;
    height: 10px;
    transition: all 1s ease 0s;
}
::-webkit-scrollbar-corner {
    background: none;
}
::-webkit-scrollbar-thumb {
    background-color: rgba(127, 127, 127, 0.6);
    background-clip: padding-box;
    border-width: 2px;
    border-style: solid;
    border-color: transparent;
    border-image: initial;
    border-radius: 5px;
    transition: all 1s ease 0s;
}
::-webkit-scrollbar-track {
    background-color: transparent;
}
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
<?php } ?>
<?php if (get_theme_mod('uxf_header_disable')) { ?>
.header-<?php echo esc_attr(get_theme_mod('uxf_header_disable')); ?> {display: none;}.stuck .header-<?php echo esc_attr(get_theme_mod('uxf_header_disable')); ?> {display: block;}
<?php } ?>
<?php if (get_theme_mod('uxf_tag_hover')) { ?>
.has-hover:hover .tag-label{background-color:<?php echo esc_attr(get_theme_mod('uxf_tag_hover')); ?>}
<?php } ?>
<?php if (get_theme_mod( 'uxf_social', 0 )) { ?>
.social-icons a {
    background-color: #f6f6f6;
    text-align: center;
    display: inline-block;
    border-radius: 100%;
    transition: 0.3s;
    color: #6b7385;
    z-index: 2;
    position: relative;
    background: #f6f6f6;
}
.social-icons a::after {
    position: absolute;
    content: '';
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background-color: var(--primary-color);
    transform: scale(0.5);
    opacity: 0;
    transition: 0.3s;
    border-radius: 100%;
}
.social-icons a:hover {
    color: #ffffff;
}
.social-icons a:hover::after {
    transform: scale(1);
    opacity: 1;
}
<?php } ?>
<?php if (get_theme_mod( 'back_to_top_custom') == 'progress') { ?>
.back-to-top.button.icon {
    padding: 0 !important;
}
.back-to-top.button.is-outline{
    border: none !important;
}
.back-to-top.button i{
    top: 0 !important;
}
.back-to-top {
  height: 50px;
  width: 50px;
  display: none;
  place-items: center;
  border-radius: 50%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}
.back-to-top .icon-angle-up {
  display: block;
  height: calc(100% - 5px);
  width: calc(100% - 5px);
  background-color: #ffffff;
  border-radius: 50%;
  display: grid;
  place-items: center;
  color: #001a2e;
}
<?php } ?>
<?php if (get_theme_mod( 'back_to_top_bottom')) { ?>
.back-to-top {
    bottom: <?php echo esc_attr(get_theme_mod('back_to_top_bottom')); ?> !important;
}
<?php } ?>
<?php if (get_theme_mod( 'uxf_posted_on', 0 )) { ?>
.entry-header .entry-meta {
    border-bottom: 2px solid #ececec;
    border-top: 1px solid #ececec;
    padding: 0.5em 0 0.6em;
    text-transform: none;
    display: flex;
    align-items: center;
}
.entry-meta span, .entry-meta i, .entry-meta time {
    vertical-align: middle;
}
.entry-meta .dashicons, .entry-meta i {
    margin: 0 5px;
    font-size:18px;
}
.entry-meta .posted-right {
    margin-left: auto;
}
<?php } ?>
<?php if(get_theme_mod('uxf_box_image', 0)) { ?>
.entry-content img, .blog-author-image img {
    box-shadow: 0px 0px 15px #aaa;
    border-radius: 10px;
}
<?php } ?>
<?php if (get_theme_mod( 'uxf_blog_style_archive', 0 )) { ?>
.blog-archive .post-item:nth-child(1) .box-image {width: 50%!important;}
.blog-archive .post-item:nth-child(2), .blog-archive .post-item:nth-child(3), .blog-archive .post-item:nth-child(4), .blog-archive .post-item:nth-child(5) {    max-width: 50%; flex-basis: 50%; display: block !important;}
.blog-archive .post-item:nth-child(2) .box-text p, .blog-archive .post-item:nth-child(3) .box-text p, .blog-archive .post-item:nth-child(4) .box-text p, .blog-archive .post-item:nth-child(5) .box-text p{display:none;}
.blog-archive .box-vertical.box-image, .blog-archive .box-vertical .box-text {display: inherit;}
<?php } ?>
li {
    margin-left: 18px;
}
</style>
<?php
$buffer = ob_get_clean();
echo flatsome_minify_css($buffer); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'wp_head', 'uxf_custom_css', 100 );
add_action('wp_enqueue_scripts', 'uxf_scripts', 100);

if(get_theme_mod('uxf_elements', 0)){
    add_action('after_setup_theme', 'uxf_setup_shortcode');
    function uxf_setup_shortcode() {
        remove_shortcode('sections');
        require UXF_PATH . '/inc/shortcodes/sections.php';
        remove_shortcode('ux_banner');
        require UXF_PATH . '/inc/shortcodes/ux_banner.php';
        remove_shortcode('title');
        require UXF_PATH . '/inc/shortcodes/title.php';
        remove_shortcode('follow');
        require UXF_PATH . '/inc/shortcodes/follow.php';
        remove_shortcode('map');
        require UXF_PATH . '/inc/shortcodes/google_maps.php';
        remove_shortcode('ux_image');
        require UXF_PATH . '/inc/shortcodes/ux_image.php';
        remove_shortcode('button');
        require UXF_PATH . '/inc/shortcodes/button.php';
        remove_shortcode('gallery');
        remove_shortcode('ux_gallery');
        require UXF_PATH . '/inc/shortcodes/ux_gallery.php';
        remove_shortcode('ux_slider');
        require UXF_PATH . '/inc/shortcodes/ux_slider.php';
        remove_shortcode( 'blog_posts' );
        require UXF_PATH . '/inc/shortcodes/blog_posts.php';
        remove_shortcode( 'featured_box' );
        require UXF_PATH . '/inc/shortcodes/featured_box.php';
        remove_shortcode( 'accordion' );
        remove_shortcode( 'accordion-item' );
        require UXF_PATH . '/inc/shortcodes/accordion.php';
        remove_shortcode( 'tabgroup' );
        remove_shortcode( 'tabgroup_vertical' );
        remove_shortcode( 'tab' );
        require UXF_PATH . '/inc/shortcodes/tabs.php';
        if(is_portfolio_activated()){
            remove_shortcode( 'portfolio' );
            remove_shortcode( 'featured_items_slider' );
            remove_shortcode( 'featured_items_grid' );
            require UXF_PATH . '/inc/shortcodes/portfolio.php';
        }
    }
    require UXF_PATH . '/inc/helpers/helpers-shortcode.php';
    require UXF_PATH . '/inc/helpers/helpers-grid.php';
    
    if(get_theme_mod('uxf_icons', 0)){
        require UXF_PATH . '/inc/shortcodes/icon.php';
    }
    if(get_theme_mod('uxf_module', 0)){
        require UXF_PATH . '/inc/shortcodes/module.php';
    }
    if(get_theme_mod('uxf_typed', 0)){
        require UXF_PATH . '/inc/shortcodes/ux_typed.php';
    }
}

// Templates
add_action( 'ux_builder_setup', function () {
    require UXF_PATH . '/inc/admin/admin-init.php';
    require_once UXF_PATH . '/inc/builder/helpers.php';
    if(get_theme_mod('uxf_elements', 0)){
        include UXF_PATH . '/inc/builder/shortcodes/section.php';
        include UXF_PATH . '/inc/builder/shortcodes/ux_banner.php';
        include UXF_PATH . '/inc/builder/shortcodes/title.php';
        include UXF_PATH . '/inc/builder/shortcodes/follow.php';
        include UXF_PATH . '/inc/builder/shortcodes/map.php';
        include UXF_PATH . '/inc/builder/shortcodes/button.php';
        include UXF_PATH . '/inc/builder/shortcodes/ux_image.php';
        include UXF_PATH . '/inc/builder/shortcodes/ux_gallery.php';
        include UXF_PATH . '/inc/builder/shortcodes/ux_slider.php';
        include UXF_PATH . '/inc/builder/shortcodes/blog_posts.php';
        include UXF_PATH . '/inc/builder/shortcodes/featured_box.php';
        include UXF_PATH . '/inc/builder/shortcodes/tab.php';
        include UXF_PATH . '/inc/builder/shortcodes/tabgroup.php';
        if(is_portfolio_activated()){
            include UXF_PATH . '/inc/builder/shortcodes/portfolio.php';
        }
        if ( class_exists( 'WPForms' ) ) {
            include UXF_PATH . '/inc/builder/shortcodes/wpforms.php';
        }
    }
    if(get_theme_mod('uxf_icons', 0)){
        include UXF_PATH . '/inc/builder/shortcodes/icon.php';
    }
    if(get_theme_mod('uxf_module', 0)){
        include UXF_PATH . '/inc/builder/shortcodes/module.php';
    }
    if(get_theme_mod('uxf_typed', 0)){
        include UXF_PATH . '/inc/builder/shortcodes/ux_typed.php';
    }
    if(get_theme_mod('uxf_lightbox', 0)){
        include UXF_PATH . '/inc/builder/shortcodes/lightbox.php';
    }
} );

//Change Icons
if(get_theme_mod('uxf_fl_icons', 0)){
    require UXF_PATH . '/inc/helpers/helpers-icons.php';
}

// Register Scripts
function uxf_scripts() {
    if(get_theme_mod('uxf_elements', 0)){
        // Check if CDN option is enabled
        if (get_theme_mod('uxf_cdn', 0)) {
            wp_register_style('uxf-hover', '//cdn.jsdelivr.net/npm/hover.css@2.3.2/css/hover.min.css', array(), '2.3.2', 'all');
            wp_enqueue_style('uxf-hover');
            wp_register_style('uxf-animate', '//cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css', array(), '4.1.1', 'all');
            wp_enqueue_style('uxf-animate');
            wp_enqueue_script('typedjs', '//cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.js', array(), '2.1.0', false);
        } else {
            wp_register_style('uxf-hover', UXF_URL . 'assets/css/hover.min.css', array(), '2.3.2', 'all');
            wp_enqueue_style('uxf-hover');
            wp_register_style('uxf-animate', UXF_URL . 'assets/css/animate.min.css', array(), '4.1.1', 'all');
            wp_enqueue_style('uxf-animate');
            wp_enqueue_script('typedjs', UXF_URL . 'assets/js/typed.umd.js', array(), '2.1.0', false);
        }
        wp_register_style('uxf-effect', UXF_URL . 'assets/css/effect.min.css', array(), '1.0', 'all');
        wp_enqueue_style('uxf-effect');
        wp_enqueue_script('uxf-anidynamic', UXF_URL . 'assets/js/animate.min.js', array('jquery'), '1.0', true);
    }
    // Check if CDN option for icons is enabled
    if (get_theme_mod('uxf_cdn_icon') == "6") {
        wp_enqueue_style('cdn-icons', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '1.0', false);
    } elseif (get_theme_mod('uxf_cdn_icon') == "5") {
        wp_enqueue_style('cdn-icons', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '1.0', false);
    }
    // Scroll To Top
    if (get_theme_mod( 'back_to_top_custom' ) == 'progress') {
       wp_enqueue_script( 'scroll-to-top', UXF_URL. 'assets/js/scroll.min.js', array('jquery'), '1.0', true );
    }
}
    
// Typing Search
if (get_theme_mod('search_typing') && get_theme_mod('uxf_typed', 0)) {
    function add_shortcode_search_typing() {
        $search_text = get_theme_mod('search_typing');
        echo do_shortcode('[ux_typed target=".search-field" typespeed="100" loop="true" attr="placeholder"]'.$search_text.'[/ux_typed]');
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

if ( get_theme_mod( 'site_loader_img' )) {
	remove_action( 'flatsome_before_header', 'flatsome_add_page_loader', 1 );
    if(!function_exists('uxf_custom_loader_img')){
        function uxf_custom_loader_img() {
            include UXF_PATH . 'template-parts/header/page-loader.php';
        }
    }
    add_action( 'flatsome_before_header', 'uxf_custom_loader_img', 0 );
}

// Add Top Link
if(get_theme_mod('back_to_top_custom')){
    function uxf_hide_gototop() {
        remove_action( 'flatsome_footer', 'flatsome_go_to_top');
    }
    add_action( 'init', 'uxf_hide_gototop' );
    function uxf_go_to_top(){
        include UXF_PATH . 'template-parts/footer/back-to-top.php';
    }
    add_action( 'flatsome_footer', 'uxf_go_to_top');
}

if (get_theme_mod( 'uxf_tooltips', 0 )) {
    add_filter( 'flatsome_follow_links', function ( $links, $args ) {
        foreach ( $links as $key => $link ) {
            if ( ! empty( $link['atts']['title'] ) ) {
                $links[ $key ]['atts']['title'] = null;
            }
            if ( empty( $link['atts']['class'] ) ) continue;
            $links[ $key ]['atts']['class'] = implode( ' ', array_diff( explode( ' ', $link['atts']['class'] ), array( 'tooltip' ) ) );
        }
        return $links;
    }, 10, 2 );
}

if(get_theme_mod('uxf_allow_svg', 0)){
    // Allow SVG
	function uxf_ignore_upload_ext($checked, $file, $filename, $mimes){
		if(!$checked['type']){
			$wp_filetype = wp_check_filetype( $filename, $mimes );
			$ext = $wp_filetype['ext'];
			$type = $wp_filetype['type'];
			$proper_filename = $filename;
			if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
				$ext = $type = false;
			}
			$checked = compact('ext','type','proper_filename');
		}
		return $checked;
	}
	add_filter('wp_check_filetype_and_ext', 'uxf_ignore_upload_ext', 10, 4);
    
    // Allow WEBP
    function uxf_webp_upload_mimes($existing_mimes) {
        $existing_mimes['webp'] = 'image/webp';
        return $existing_mimes;
    }
    add_filter('mime_types', 'uxf_webp_upload_mimes');
    function uxf_webp_is_displayable($result, $path) {
        if ($result === false) {
            $displayable_image_types = array( IMAGETYPE_WEBP );
            $info = @getimagesize( $path );
            if (empty($info)) {
                $result = false;
            } elseif (!in_array($info[2], $displayable_image_types)) {
                $result = false;
            } else {
                $result = true;
            }
        }
        return $result;
    }
    add_filter('file_is_displayable_image', 'uxf_webp_is_displayable', 10, 2);
}

// Change Woocommerce heading tag
if (get_theme_mod('uxf_product_title')) {
    add_action('woocommerce_shop_loop_item_title', 'uxf_woo_template_loop_product_title', 9);
    
    function uxf_woo_template_loop_product_title() {
        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
        echo '<'.esc_attr(get_theme_mod('uxf_product_title')).' class="name product-title ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">';
        woocommerce_template_loop_product_link_open();
        echo esc_html(get_the_title());
        woocommerce_template_loop_product_link_close();
        echo '</'.esc_attr(get_theme_mod('uxf_product_title')).'>';
        
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

// Manage custom post layout priority
if(get_theme_mod('wpseo_manages_post_layout_priority', 0) || get_theme_mod('rank_math_manages_post_layout_priority', 0)){
    function get_flatsome_blog_breadcrumbs() { 
        if ( is_singular( 'post' )) {
        ?>
            <div class="flex-row medium-flex-wrap container">
                <?php flatsome_breadcrumb(); ?>
            </div><?php
        }
	}
    add_action( 'flatsome_before_blog' , 'get_flatsome_blog_breadcrumbs', 10 ); 
}

// Remove the last static crumb on single post 
if(get_theme_mod('wpseo_breadcrumb_post_remove_last', 0)){
    function remove_last_crumb_blog( $crumbs ) {
        if ( is_single () && count( $crumbs ) > 1 ) {
            array_pop( $crumbs );
        }
        return $crumbs;
    }
    add_filter( 'wpseo_breadcrumb_links', 'remove_last_crumb_blog' );
}

// move category description to bottom of pages
if(get_theme_mod('uxf_category_product', 0)){
    add_action('woocommerce_archive_description', 'custom_archive_description', 2);
    function custom_archive_description(){ 
      if ( is_product_category() ){
        remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
        add_action('woocommerce_after_main_content', 'woocommerce_taxonomy_archive_description', 5 );
      }
    }
}

if ( get_theme_mod( 'uxf_scrollpost', 0 ) ) {
    require UXF_PATH . '/inc/extensions/flatsome-infinite-scrollpost/class-flatsome-infinite-scrollpost.php';
}

if ( ! function_exists( 'flatsome_posted_on' )  && get_theme_mod( 'uxf_posted_on', 0 )) :
	function flatsome_posted_on() {
        if (get_theme_mod('uxf_posted_author', 0)) {
            if (get_theme_mod('uxf_posted_icon', 0)) {
                echo '<span class="byline"><i class="icon-user-o"></i><span class="meta-author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span></span>';
            } else {
                echo '<span class="byline"><span class="meta-author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span></span>';
            }
        }

        if (get_theme_mod('uxf_posted_time', 0)) {
            $time_string = get_the_time('U') !== get_the_modified_time('U') ?
                '<time class="entry-date published" datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time><time class="updated" datetime="' . esc_attr(get_the_modified_date('c')) . '">' . esc_html(get_the_modified_date()) . '</time>' :
                '<time class="entry-date published updated" datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>';

            if (get_theme_mod('uxf_posted_icon', 0)) {
                echo '<span class="posted-on"><i class="icon-clock"></i>' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            } else {
                echo '<span class="posted-on"> | ' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }


        if (get_theme_mod('uxf_posted_view', 0) && get_theme_mod('uxf_posted_viewsc') == "post-views-counter") {
            echo '<span class="posted-on hide-for-small"><span class="views">' . do_shortcode('[post-views]') . '</span></span>';
        } elseif (get_theme_mod('uxf_posted_view', 0) && get_theme_mod('uxf_posted_viewsc') == "wp-postviews") {
            if (get_theme_mod('uxf_posted_icon', 0)) {
                echo '<span class="hide-for-small"><span class="dashicons dashicons-chart-bar"></span>' . do_shortcode('[views]') . '</span>';
            } else {
                echo '<span class="hide-for-small"> | ' . do_shortcode('[views]') . '</span>';
            }
        }

        if (get_theme_mod('uxf_posted_read', 0)) {
            if (get_theme_mod('uxf_posted_icon', 0)) {
                echo '<span class="hide-for-small"><span class="dashicons dashicons-visibility"></span><span class="views">' . do_shortcode('[post-reads]') . '</span></span>';
            } else {
                echo '<span class="hide-for-small"> | <span class="views">' . do_shortcode('[post-reads]') . '</span></span>';
            }
        }

        if (($video_url = get_theme_mod('uxf_posted_video')) && uxf_pro_enabled()) {
            $video_view = get_post_meta(get_the_ID(), $video_url, true);
            if ($video_view) {
                if (get_theme_mod('uxf_posted_icon', 0)) {
                    echo '<span><i class="icon-youtube"></i><a href="'.esc_url($video_view).'" class="open-video">' . sprintf('%s Video', esc_html__('View') ). '</a></span>';
                } else {
                    echo '<span> | <a href="'.esc_url($video_view).'" class="open-video">' . sprintf('%s Video', esc_html__('View') ) . '</a></span>';
                }
            }
        }

        if (get_theme_mod('uxf_posted_kkstar', 0)) {
            echo '<span class="posted-right hide-for-small">' . do_shortcode('[kkstarratings]') . '</span>';
        } elseif (get_theme_mod('uxf_posted_ggnewsurl', 0)) {
            echo '<a class="posted-right hide-for-small" target="_blank" rel="nofollow" href="' . esc_url(get_theme_mod('uxf_posted_ggnewsurl')) . '" title="' . esc_attr__('Google News', 'ux-flat') . '"><span class="text">' . esc_attr__('Follow us on ', 'ux-flat') . '</span><img src="' . esc_url(UXF_URL) . 'assets/images/ggnews.svg" width="100" alt="' . esc_attr__('Google News', 'ux-flat') . '"></a>';
        }
    }
    
    function time_to_read() {
        global $post;
        if ( !isset($post) || !is_a($post, 'WP_Post') ) {
            return '';
        }
        $content = wp_strip_all_tags($post->post_content);
        if (empty($content)) {
            return '';
        }
        $time = floor(str_word_count($content) / 200);
        if ($time < 1) {
            return __('One minute', 'ux-flat');
        }
        // translators: %s is minutes
        return sprintf(__('%s minutes', 'ux-flat'), $time);
    }
    add_shortcode('post-reads', 'time_to_read');
endif;
        
if ( get_theme_mod( 'wpseo_canonical_url', 0 ) || get_theme_mod( 'rank_math_canonical_url', 0 )) {
    if ( class_exists( 'WPSEO_Options' ) ) {
        add_filter( 'wpseo_canonical', 'seo_canonical_url' );
    }
    if ( class_exists( 'RankMath' ) ) {
        add_filter('rank_math/frontend/canonical', 'seo_canonical_url');
    }
    function seo_canonical_url($canonical_url){
        if ( function_exists( 'is_woocommerce' )) {
            if(is_shop()){
            $canonical_url = get_permalink( wc_get_page_id( 'shop' ) );
            } elseif (is_product_taxonomy()){
                $canonical_url = get_term_link(get_queried_object_id());
            }
        }
        if (is_category() || is_tag()){
            $canonical_url = get_term_link(get_queried_object_id());
        } elseif (is_home()){
           $canonical_url = get_permalink(get_option( 'page_for_posts' ));
        }
        return $canonical_url;
    }
}

if ( get_theme_mod( 'wpseo_title_shortcode' ) || get_theme_mod( 'rank_math_title_shortcode' )) {
    add_filter( 'the_title', 'do_shortcode' );
    if ( class_exists( 'WPSEO_Options' ) ) {
        add_filter( 'wpseo_title', 'do_shortcode' );
        add_filter( 'wpseo_metadesc', 'do_shortcode' );
    }
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
    add_shortcode('year', 'get_year');
    function get_year() {
        $year = gmdate("Y");
        return "$year";
    }

    add_shortcode('month', 'get_month');
    function get_month() {
        $month = gmdate("m");
        return "$month";
    }

    add_shortcode('day', 'get_day');
    function get_day() {
        $day = gmdate("d");
        return "$day";
    }

}

if(get_theme_mod('uxf_categories', 0)){
    require UXF_PATH . '/inc/shortcodes/blog_categories.php';
    require UXF_PATH . '/inc/helpers/class.categories.php';
}

if(get_theme_mod('uxf_category_layout', 0)){
    require UXF_PATH . '/inc/helpers/class.categories-layout.php';
}

if (get_theme_mod( 'uxf_archive_layout')) {
    function custom_archive_layout($template) {
        if (is_category() || is_home()) {
            $template = UXF_PATH . 'template-parts/posts/archive-layout.php';
        }
        return $template;
    }
    add_filter('template_include', 'custom_archive_layout');
}

if(get_theme_mod('uxf_author_box', 0)){
    add_action('flatsome_before_comments', 'custom_blog_author_box', 10);
    function custom_blog_author_box(){ 
        ?><div class="entry-author author-box">
		<div class="flex-row align-top">
			<div class="flex-col mr circle">
				<div class="blog-author-image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'flatsome_author_bio_avatar_size', 90 ) ); ?>
				</div>
			</div>
			<div class="flex-col flex-grow">
				<p class="author-name uppercase pt-half is-bold">
                    <?php the_author_posts_link(); ?>
				</p>
				<p class="author-desc small"><?php the_author_meta( 'description' ); ?></p>
			</div>
		</div>
        </div><?php
        if(get_theme_mod('uxf_single_next_prev_nav', 0)){
            flatsome_content_nav( 'nav-below' );
        }
        echo '<div class="gap-element clearfix" style="padding-top:30px;"></div>';
    }
}

if(get_theme_mod('uxf_cat_desc', 0)){
    add_action('flatsome_before_blog', 'custom_flatsome_archive_title', 10);
    function custom_flatsome_archive_title(){ 
        remove_action('flatsome_before_blog', 'flatsome_archive_title', 15 );
        if ( get_theme_mod( 'blog_archive_title', 1 ) && ( is_archive() || is_search() ) ) {
            require UXF_PATH . '/template-parts/posts/partials/archive-title.php';
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
 
if(get_theme_mod('uxf_more', 0)){
    require UXF_PATH . '/inc/shortcodes/more.php';
    require UXF_PATH . '/inc/helpers/class.more.php';
}
 
if(get_theme_mod('uxf_menus', 0)){
    require UXF_PATH . '/inc/shortcodes/ux_menu.php';
}

// Templates
add_action( 'ux_builder_setup', function () {
    if(get_theme_mod('uxf_categories', 0)){
        require UXF_PATH . '/inc/builder/shortcodes/blog_categories.php';
    }
    if(get_theme_mod('uxf_more', 0)){
        require UXF_PATH . '/inc/builder/shortcodes/more.php';
    }
    if(get_theme_mod('uxf_menus', 0)){
        require UXF_PATH . '/inc/builder/shortcodes/ux_menu.php';
    }
} );

// Flatsome Issues
if(get_theme_mod('uxf_issues', 0)){
    add_action( 'init', 'uxf_fs_nag' );
    function uxf_fs_nag() {
        remove_action( 'admin_notices', 'flatsome_maintenance_admin_notice' );
    }
}

if(get_theme_mod('uxf_post_refresh')){
    add_action('wp_head','uxf_meta_refresh', 1);
    function uxf_meta_refresh() {
        if (is_single()) {
            echo '<meta http-equiv="refresh" content="'.intval(get_theme_mod('uxf_post_refresh')).'">';
        }
    }
}

if(get_theme_mod('uxf_post_tags') || get_theme_mod('uxf_post_cats') || get_theme_mod('uxf_post_latest') || get_theme_mod('uxf_post_older')){
    
    function get_related_posts($args) {
        $related_query = new WP_Query($args);
        $related_posts = array();
        if ($related_query->have_posts()) {
            while ($related_query->have_posts()) {
                $related_query->the_post();
                $related_posts[] = get_the_ID();
            }
        }
        wp_reset_postdata();
        return $related_posts;
    }

    function display_related_posts($args, $current_post_id, $related_name) {
        $related_title = sanitize_text_field(get_theme_mod('uxf_related_title'));
        $related_posts = sanitize_text_field(get_theme_mod('uxf_related_posts'));

        $related_posts_ids = get_related_posts($args);
        $related_posts_ids = array_diff($related_posts_ids, array($current_post_id));

        if (!empty($related_posts_ids)) {
            $ids = implode(',', $related_posts_ids);
            $related_title = str_replace("{title}", $related_name, $related_title);
            echo do_shortcode($related_title);
            $related_posts = str_replace("blog_posts", "blog_posts ids='{$ids}'", $related_posts);
            echo do_shortcode($related_posts);
        }
    }

    function uxf_post_after_blog() {
        if (is_single()) {
            $post_tags = get_theme_mod('uxf_post_tags', 0);
            $post_cats = get_theme_mod('uxf_post_cats', 0);
            $post_latest = get_theme_mod('uxf_post_latest', 0);
            $post_older = get_theme_mod('uxf_post_older', 0);
            $related_total = intval(get_theme_mod('uxf_related_total', 5));
            global $post;
            $current_post_id = $post->ID;
            
            $tags = wp_get_post_tags($current_post_id);
            if ($tags && $post_tags){
                $tags_args = array(
                    'tag__in' => wp_get_post_tags($current_post_id, array('fields' => 'ids')),
                    'posts_per_page' => $related_total,
                );
                $tags_lang = __('Related Posts by Tags', 'ux-flat');
                display_related_posts($tags_args, $current_post_id, $tags_lang);
            }

            if ($post_cats) {
                $cat_args = array(
                    'category__in' => wp_get_post_categories($current_post_id, array('fields' => 'ids')),
                    'posts_per_page' => $related_total,
                );
                $cats_lang = __('Related Posts by Category', 'ux-flat');
                display_related_posts($cat_args, $current_post_id, $cats_lang);
            }

            if ($post_latest) {
                $latest_args = array(
                    'date_query' => array(
                        array(
                            'after' => get_the_time('Y-m-d H:i:s', $current_post_id),
                        ),
                    ),
                    'posts_per_page' => $related_total,
                );
                $latest_lang = __('Latest Posts', 'ux-flat');
                display_related_posts($latest_args, $current_post_id, $latest_lang);
            }

            if ($post_older) {
                $older_args = array(
                    'date_query' => array(
                        array(
                            'before' => get_the_time('Y-m-d H:i:s', $current_post_id),
                        ),
                    ),
                    'posts_per_page' => $related_total,
                );
                $older_lang = __('Older Posts', 'ux-flat');
                display_related_posts($older_args, $current_post_id, $older_lang);
            }
        }
    }

    if(get_theme_mod('uxf_related_position', 0)) {
        add_action('flatsome_before_comments','uxf_post_after_blog');
    } else {
        add_action('flatsome_after_blog', 'uxf_post_after_blog');
    }
}

if(get_theme_mod('uxf_lightbox_close', 0)){
    add_filter( 'flatsome_lightbox_close_btn_inside', '__return_true' );
    add_filter( 'flatsome_lightbox_close_button', function ( $html ) {
        $html = '<button title="%title%" type="button" class="mfp-close">';
        $html .= '×';
        $html .= '</button>';
        return $html;
    } );
}

if (get_theme_mod( 'uxf_text_size')) {
    if ( ! function_exists( 'uxf_mce_text_sizes' ) ) {
        function uxf_mce_text_sizes( $initArray ){
            $text_size = esc_attr(get_theme_mod( 'uxf_text_size' ));
            if ($text_size == "pixel") {
                $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px 40px 44px 48px 50px 56px 64px 72px";
            } elseif ($text_size == "point") {
                $initArray['fontsize_formats'] = "5pt 6pt 7pt 8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 22pt 24pt 26pt 28pt 30pt 32pt 34pt 36pt 38pt";  
            }
            return $initArray;
        }
        add_filter( 'tiny_mce_before_init', 'uxf_mce_text_sizes', 99 );
    }
}

if ( get_theme_mod( 'uxf_view_page', 0 ) ) {
    function custom_preview_button() {
        if ( ! isset( $_GET['app'] ) || ! isset( $_GET['type'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
            return;
        }
        $type = isset( $_GET['type'] ) ? sanitize_text_field( $_GET['type'] ) : '';  // phpcs:ignore WordPress.Security.NonceVerification
        if ( $type === 'editor' && isset( $_GET['post'] ) ) {  // phpcs:ignore WordPress.Security.NonceVerification
            $post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : 0;  // phpcs:ignore WordPress.Security.NonceVerification
            $permalink = get_permalink( $post_id );
            echo '<a style="padding: 10px 0; width: 40px; z-index: 12; position: absolute; right: 0; text-align: center;" href="' . esc_url( $permalink ) . '" target="_blank"><button type="button" class="button blank has-tooltip"><span class="dashicons dashicons-welcome-view-site"></span><div class="uxb-tooltip">' . esc_attr__( 'View page', 'ux-flat' ) . '</div></button></a>';
        }
    }
    add_action( 'init', 'custom_preview_button' );
}

if(get_theme_mod('uxf_search', 0)){
    function uxf_search_title($search, $wp_query) {
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
    add_filter('posts_search', 'uxf_search_title', 500, 2);
}

// UX Kits
if(get_theme_mod('uxf_export', 0)){
    function export_row_actions( $actions, $page_object ) {
        if ( function_exists( 'is_woocommerce' ) && $page_object->ID == wc_get_page_id( 'shop' ) ) {
            return $actions;
        }
        if (current_user_can('manage_options')) {
            $link = admin_url('edit.php?post_type='.$page_object->post_type.'&post_id='.$page_object->ID.'&export_ux=1');
            $link = wp_nonce_url( $link, -1, 'nonce' );
            $actions["export_ux"] = '<a href="'.$link.'">'.__('Export UX', 'ux-flat').'</a>';
        }

        return $actions;
    }
    add_filter( 'page_row_actions', 'export_row_actions', 10, 2 );
    
    function export_ux_page(){
        if ( isset( $_GET['nonce'] ) && !wp_verify_nonce($_GET['nonce'], 'nonce') && isset( $_GET['export_ux'] ) && isset($_GET['post_id']) ) {
            if($_GET['post_id'] > 0 && current_user_can('manage_options')){
                $page_object = get_post($_GET['post_id']);
                $content = $page_object->post_content;
                $content = str_replace("\n", '', $content);
                $to_replace = array(
                    '<!-- wp:flatsome/uxbuilder -->',
                    '<!-- /wp:flatsome/uxbuilder -->'
                );
                $content = str_replace($to_replace, '', $content);
                $content = preg_replace_callback(
                    '/ux_gallery ids=("|\')([0-9,]+)("|\')/',
                    function($match) {
                        $image_ids = explode(',', $match[2]);
                        $image_links = array();
                        foreach ($image_ids as $image_id) {
                            $src_thumbnail = wp_get_attachment_image_src($image_id, 'full');
                            $image_links[] = $src_thumbnail[0];
                        }
                        $image_links_string = implode(',', $image_links);
                        return 'ux_gallery ids="' . $image_links_string . '"';
                    },
                    $content
                );

                $content = preg_replace_callback(
                    '/ux_image id=("|\')(\d+)("|\')/',
                    function($match) {
                        $image_id = $match[2];
                        $src_thumbnail = wp_get_attachment_image_src($image_id , 'full');
                        return 'ux_image id="' . $src_thumbnail[0] . '"';
                    },
                    $content
                );

                $content = preg_replace_callback(
                    '/bg\=("|\')(\d+)("|\')/',
                    function($match) {
                        $image_id = $match[2];
                        $src_thumbnail = wp_get_attachment_image_src($image_id , 'full');
                        return 'bg="' . $src_thumbnail[0] . '"';
                    },
                    $content
                );

                $content = preg_replace_callback(
                    '/img\=("|\')(\d+)("|\')/',
                    function($match) {
                        $image_id = $match[2];
                        $src_thumbnail = wp_get_attachment_image_src($image_id , 'full');
                        return 'img="' . $src_thumbnail[0] . '"';
                    },
                    $content
                );
                nocache_headers();
                header( 'Content-Type: application/json; charset=utf-8' );
                header( 'Content-Disposition: attachment; filename='.$page_object->post_title. '.json' );
                header( 'Expires: 0' );
                echo wp_kses_post($content);
                exit;
            }
        }
    }
    add_action( 'admin_init', 'export_ux_page' );
}
