<?php
/**
 * Advanced UXFlat
 */
if (!function_exists('uxf_of_options')) {
    add_action( 'init', 'uxf_of_options', 20 );
    function uxf_of_options(){
        global $of_options;
        
        if(!$of_options) return;
        
        $of_options[] = array(
            'name' => 'UX Flat',
            'type' => 'heading',
        );
        if ( UXFPro() ) {
            $of_options[] = array(
                'name' => '',
                'type' => 'info',
                'desc' => '<p style="font-size:12px">Version: '.UXF_VERSION.'<span style="background: #ff3030;" class="of-tag">PRO</span> | <a href="' . admin_url( 'plugins.php#uxflat_license' ) . '">License</a> | <a target="_blank" rel="noopener" href="https://wpvnteam.com/ux-flat/doc/">'.__('Documentation').'</a></p>',
            );
        } else {
            $of_options[] = array(
                'name' => '',
                'type' => 'info',
                'desc' => '<p style="font-size:12px">Version: '.UXF_VERSION.'<span style="background: #72aee6;" class="of-tag">LITE</span> | <a target="_blank" rel="noopener" href="https://wpvnteam.com/ux-flat/">'.__('Upgrade', 'ux-flat').'</a> | <a targer="_blank" href="https://www.paypal.me/copvn" rel="nofollow">'.__('Donate', 'ux-flat').'</a></p>',
            );
        }
        
        $of_options[] = array(
            'name' => __('Enhance Elements', 'ux-flat'),
            'desc' => 'Section | Title | Divider | Button | UX Menu | Gallery | Slider | Blog Posts | Google Maps | Lightbox',
            'id'   => 'elements',
            'std'  => 0,
            'type' => 'checkbox',
        );
        
        $of_options[] = array(
            'id'   => 'elements_pro',
            'desc' => 'Icon Box | Tabs | Countdown | Product Categories <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'name' => __('New Elements', 'ux-flat'),
            'id'   => 'uxf_categories',
            'desc' => __('Blog Categories', 'ux-flat'),
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_menus',
            'desc' => 'Menu',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_verticle_menu',
            'desc' => __( 'Vertical Menu', 'flatsome' ).'<span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_more',
            'desc' => 'More <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_tables',
            'desc' => 'Table <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_module',
            'desc' => 'Module',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_typed',
            'desc' => 'Typed',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_iframe',
            'desc' => 'Iframe <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_thumbs',
            'desc' => 'Slider Thumbnails <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );
        
        $of_options[] = array(
            'id'   => 'uxf_animate',
            'desc' => 'Animate <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );
        
        $of_options[] = array(
            'id'   => 'uxf_agent',
            'desc' => 'Agent <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_progressbar',
            'desc' => 'Progress Bar & Skill Bar <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_filter',
            'desc' => 'Filter <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'name' => __('Performance'),
            'id'   => 'fs_issues',
            'desc' => __('Disable Flatsome issues', 'ux-flat'),
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'uxf_search',
            'desc' => __('Search by Title Only', 'ux-flat'),
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'id'   => 'breadcrums_posts',
            'desc' => __('Add breadcrums to posts', 'ux-flat'),
            'std'  => 0,
            'type' => 'checkbox',
        );
            
        $of_options[] = array(
            'desc' => __('Cache Page', 'ux-flat').' <span class="of-tag">PRO</span>',
            'id'   => 'uxf_cache',
            'std'  => 0,
            'type' => 'checkbox',
        );
        
        $of_options[] = array(
            'name' => __('Translate & Block'),
            'type' => 'heading',
        );
            
        $of_options[] = array(
            'name' => __('Translate'),
            'desc' => 'E.g: <br>Author Archives: %s|%s
<br>Category Archives: %s|%s
<br>This entry was posted in %1$s and tagged %2$s.|%2$s
<br>This entry was posted in %1$s. Bookmark the < a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.|',
            'id'   => 'uxf_translate',
            'std'  => '',
            'type' => 'textarea',
        );
        
        $of_options[] = array(
            'name' => __('Unregister Block'),
            'desc' => 'E.g: <br>yoast-seo<br>woocommerce',
            'id'   => 'uxf_unblock',
            'std'  => '',
            'type' => 'textarea',
        );
        
    }
}