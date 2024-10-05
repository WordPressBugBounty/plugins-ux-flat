<?php
/**
 * Advanced UXFlat Options
 */

add_action( 'init', 'uxf_of_options', 20 );
function uxf_of_options(){
    global $of_options;
    
    if(!$of_options) return;
    
    $of_options[] = array(
        'name' => 'UXFlat Options',
        'type' => 'heading',
    );
    if ( uxf_pro_enabled() ) {
		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => '<p style="font-size:12px">Version: '.UXF_VERSION.'<span style="background: #ff3030;" class="of-tag">PRO</span> | <a href="' . admin_url( 'admin.php?page=ux-flat-pro' ) . '">License</a> | <a target="_blank" rel="noopener" href="https://wpvnteam.com/ux-flat/doc/">Documentation</a></p>',
		);
    } else {
		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => '<p style="font-size:12px">Version: '.UXF_VERSIONS.'<span style="background: #72aee6;" class="of-tag">LITE</span> | <a target="_blank" rel="noopener" href="https://wpvnteam.com/ux-flat/">Go Pro</a> | <a targer="_blank" href="https://www.paypal.me/copvn" rel="nofollow">Donate to this plugin</a></p>',
		);
    }

    $of_options[] = array(
        'name' => 'Replace Elements',
        'desc' => 'Section | Banner | Title | Button | Gallery | Slider | Image | Blog Posts | Portfolio | Google Maps',
        'id'   => 'uxf_elements',
        'std'  => 0,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'name' => 'New Elements',
        'id'   => 'uxf_categories',
        'desc' => 'Blog Categories',
        'std'  => 0,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'id'   => 'uxf_more',
        'desc' => 'More',
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
        'id'   => 'uxf_icons',
        'desc' => 'Icon',
        'std'  => 0,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'id'   => 'uxf_lightbox',
        'desc' => 'Lightbox',
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
    
    if ( is_plugin_active( 'extra-agent/extra-agent.php' ) ) {
        $of_options[] = array(
            'id'   => 'uxf_agent',
            'desc' => 'Agent <span class="of-tag">PRO</span>',
            'std'  => 0,
            'type' => 'checkbox',
        );
    }

    $of_options[] = array(
        'id'   => 'uxf_progressbar',
        'desc' => 'Progress Bar & Skill Bar <span class="of-tag">PRO</span>',
        'std'  => 0,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'id'   => 'uxf_verticle_menu',
        'desc' => __( 'Vertical Menu', 'flatsome' ).'<span class="of-tag">PRO</span>',
        'std'  => 0,
        'type' => 'checkbox',
    );
    
    if ( class_exists( 'Easy_Digital_Downloads' )) {
        $of_options[] = array(
            'id'   => 'uxf_download',
            'desc' => 'Easy Digital Downloads',
            'std'  => 0,
            'type' => 'checkbox',
        );
    }

    $of_options[] = array(
        'name' => 'Performance',
        'id'   => 'uxf_issues',
        'desc' => 'Disable Flatsome issues',
        'std'  => 0,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'id'   => 'uxf_cdn',
        'desc' => 'Enable CDN jsDelivr (hover, animate)',
        'std'  => 0,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'id'   => 'uxf_search',
        'desc' => 'Search by Title Only',
        'std'  => 0,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'id'   => 'uxf_builder',
        'desc' => 'Disable Builder Edit Post/Product <span class="of-tag">PRO</span>',
        'std'  => 0,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'id'   => 'uxf_view_page',
        'desc' => 'Quick view the Page',
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'id'   => 'uxf_responsive',
        'desc' => 'Responsive Media <span class="of-tag">PRO</span>',
        'std'  => 0,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'name' => 'Apperance',
        'id'   => 'uxf_lightbox_close',
        'desc' => 'Lightbox Close Inside',
        'std'  => 0,
        'type' => 'checkbox',
    );
    
    if ( class_exists( 'WooCommerce' ) ) {
        $of_options[] = array(
            'name' => 'WooCommerce Global',
            'id'   => 'uxf_product_title',
            'desc'    => 'Change Product Title to in WooCommerce Category Layout',
            'std'     => '',
            'type'    => 'select',
            'options' => array(
                ''  => 'Default (p)',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
                'div' => 'div',
                'span' => 'span',
            ),
        );

        $of_options[] = array(
            'id'   => 'uxf_category_product',
            'desc' => 'Move category/product description to bottom',
            'std'  => 0,
            'type' => 'checkbox',
        );
    }

    $of_options[] = array(
        'id'   => 'uxf_scrollpost',
        'desc' => 'Infinite scroll for category.',
        'std'  => 0,
        'folds'  => 1,
        'type' => 'checkbox',
    );

    $of_options[] = array(
        'id'      => 'uxf_scroll_loader_type',
        'std'     => 'spinner',
        'fold'    => 'uxf_scrollpost',
        'type'    => 'select',
        'options' => array(
            'button'  => 'Button (On click)',
            'spinner' => 'Spinner',
            'image'   => 'Custom Image',
        ),
    );

    $of_options[] = array(
        'desc' => "Upload or choose a custom loader image (for loading type 'Custom Image').",
        'id'   => 'uxf_scroll_loader_img',
        'std'  => '',
        'fold' => 'uxf_scrollpost',
        'type' => 'upload',
    );

    $of_options[] = array(
        'name'    => 'Allow SVG & Webp',
        'id'   => 'uxf_allow_svg',
        'desc' => 'Enable SVG & Webp Support',
        'std'  => 0,
        'type' => 'checkbox',
    );
 
    $of_options[] = array(
        'name' => 'Site Loader Image',
        'desc' => 'Upload or choose a custom loader image (GIF, SVG)',
        'id'   => 'site_loader_img',
        'std'  => '',
        'type' => 'upload',
    );
        
    $of_options[] = array(
        'name' => 'Translated Text',
        'desc' => 'Ex: Category Archives: %s|%s',
        'id'   => 'uxf_translate',
        'std'  => '',
        'type' => 'textarea',
    );
        
    $of_options[] = array(
        'name' => 'UX Kits',
        'desc' => 'Export Page',
        'id'   => 'uxf_export',
        'std'  => 0,
        'type' => 'checkbox',
    );
        
    $of_options[] = array(
        'desc' => 'Show Hook <span class="of-tag">PRO</span>',
        'id'   => 'uxf_showhook',
        'std'  => 0,
        'type' => 'checkbox',
    );
    
    // Yoast options.
	if ( class_exists( 'WPSEO_Options' ) ) {
        $of_options[] = array(
            'name' => 'Yoast SEO',
            'id'   => 'wpseo_manages_post_layout_priority',
            'desc' => 'Manage custom post layout priority.',
            'std'  => 0,
            'type' => 'checkbox',
        );
        $of_options[] = array(
            'name' => '',
            'id'   => 'wpseo_breadcrumb_post_remove_last',
            'desc' => 'Remove the last static crumb on single post (post title).',
            'std'  => 1,
            'fold' => 'wpseo_breadcrumb',
            'type' => 'checkbox',
        );
        $of_options[] = array(
            'name' => '',
            'id'   => 'wpseo_title_shortcode',
            'desc' => 'Add shortcode [day] [month] [year] to title',
            'std'  => 0,
            'type' => 'checkbox',
        );
        $of_options[] = array(
            'name' => '',
            'id'   => 'wpseo_canonical_url',
            'desc' => 'Use Canonical URL to Resolve Duplicate Content Issues',
            'std'  => 0,
            'type' => 'checkbox',
        );
    }
    
    // Rank Math options.
	if ( class_exists( 'RankMath' ) ) {
        $of_options[] = array(
            'name' => 'Rank Math',
            'id'   => 'rank_math_manages_post_layout_priority',
            'desc' => 'Manage custom post layout priority.',
            'std'  => 0,
            'type' => 'checkbox',
        );
        $of_options[] = array(
            'name' => '',
            'id'   => 'rank_math_title_shortcode',
            'desc' => 'Add shortcode [day] [month] [year] to title',
            'std'  => 0,
            'type' => 'checkbox',
        );
        $of_options[] = array(
            'name' => '',
            'id'   => 'rank_math_canonical_url',
            'desc' => 'Use Canonical URL to Resolve Duplicate Content Issues',
            'std'  => 0,
            'type' => 'checkbox',
        );
    }

}