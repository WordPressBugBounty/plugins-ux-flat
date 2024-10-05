<?php
/**
 * Flatsome Admin Engine Room.
 * This is where all Admin Functions run
 *
 * @package flatsome
 */
if(is_customize_preview() && class_exists( 'Flatsome_Option' )){
    include_once( UXF_PATH.'/inc/admin/options/styles/options-colors.php');
    include_once( UXF_PATH.'/inc/admin/options/styles/options-type.php');
    include_once( UXF_PATH.'/inc/admin/options/styles/options-global.php');
    include_once( UXF_PATH.'/inc/admin/options/pages/options-pages.php');
    include_once( UXF_PATH.'/inc/admin/options/blog/options-blog-archive.php');
    include_once( UXF_PATH.'/inc/admin/options/blog/options-blog-layout.php');
    include_once( UXF_PATH.'/inc/admin/options/blog/options-blog-single.php');
    include_once( UXF_PATH.'/inc/admin/options/footer/options-footer.php');
    include_once( UXF_PATH.'/inc/admin/options/header/options-header-search.php');
    include_once( UXF_PATH.'/inc/admin/options/header/options-header-sticky.php');
    include_once( UXF_PATH.'/inc/admin/options/header/options-header-contact.php');
    include_once( UXF_PATH.'/inc/admin/options/social/options-social.php');
}