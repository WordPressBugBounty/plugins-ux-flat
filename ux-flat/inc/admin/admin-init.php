<?php
/**
 * Flatsome Admin Engine Room.
 * This is where all Admin Functions run
 *
 * @package flatsome
 */
if(class_exists( 'Flatsome_Option' )){
    
    include_once( UXF_DIR.'/inc/admin/options/blog/options-blog-archive.php');
    include_once( UXF_DIR.'/inc/admin/options/blog/options-blog-layout.php');
    include_once( UXF_DIR.'/inc/admin/options/blog/options-blog-single.php');
    
    include_once( UXF_DIR.'/inc/admin/options/header/options-header-search.php');
    include_once( UXF_DIR.'/inc/admin/options/header/options-header-sticky.php');
    include_once( UXF_DIR.'/inc/admin/options/header/options-header-content.php');
    
    include_once( UXF_DIR.'/inc/admin/options/styles/options-type.php');
    include_once( UXF_DIR.'/inc/admin/options/styles/options-colors.php');
    include_once( UXF_DIR.'/inc/admin/options/styles/options-lightbox.php');
    
    include_once( UXF_DIR.'/inc/admin/options/pages/options-pages.php');
    include_once( UXF_DIR.'/inc/admin/options/footer/options-footer.php');
    include_once( UXF_DIR.'/inc/admin/options/social/options-social.php');
    if(get_theme_mod('fl_portfolio', 1)){
        include_once( UXF_DIR.'/inc/admin/options/portfolio/options-portfolio.php');
    }
    if(is_woocommerce_activated()) {
        include_once( UXF_DIR.'/inc/admin/options/shop/options-shop-category.php');
    }
}
