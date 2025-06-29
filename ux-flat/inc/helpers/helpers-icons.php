<?php
/**
 * Icon Zalo
 */
add_action( 'init', function () {
    if ( function_exists( 'flatsome_register_follow_link' ) ) {
        flatsome_register_follow_link( 'zalo', 'Zalo', array(
            'icon'     => '<i class="icon-zalo"></i>',
            'priority' => 5,
        ) );
    }
} );

function flatsome_remove_icons() {
    remove_action( 'wp_enqueue_scripts', 'flatsome_add_icons_css', 150 );
}
add_action( 'after_setup_theme', 'flatsome_remove_icons' );

function flatsome_custom_icons() {
    
    if (get_theme_mod('font_awesome_cdn', 0) || get_theme_mod('uxf_fl_icons') == 2) {
        wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', [], null, 'all');
    }
    
    if (get_theme_mod('uxf_fl_icons') == 1) {
        wp_add_inline_style(
            'flatsome-main',
            '@font-face {
                font-family: "fl-icons";
                font-display: block;
                src: url(' . UXF_URL . 'assets/css/icons/fl-icons.eot);
                src:
                    url(' . UXF_URL . 'assets/css/icons/fl-icons.eot#iefix) format("embedded-opentype"),
                    url(' . UXF_URL . 'assets/css/icons/fl-icons.woff2) format("woff2"),
                    url(' . UXF_URL . 'assets/css/icons/fl-icons.ttf) format("truetype"),
                    url(' . UXF_URL . 'assets/css/icons/fl-icons.woff) format("woff"),
                    url(' . UXF_URL . 'assets/css/icons/fl-icons.svg#fl-icons) format("svg");
            }'
        );
        wp_enqueue_style('flatsome-icons', UXF_URL . 'assets/css/icons.min.css', [], null, 'all');
    } elseif (get_theme_mod('uxf_fl_icons') == 2) {
        wp_enqueue_style('flatsome-icons', UXF_URL . 'assets/css/fas.min.css', [], null, 'all');
    }
}
add_action('wp_enqueue_scripts', 'flatsome_custom_icons', 150);

//Change Icons follow & share
if (get_theme_mod('uxf_fl_icons') == 2) {
    function custom_icons($links, $args) {
        $icons = [
            'facebook'   => '<i class="fa-brands fa-facebook-f"></i>',
            'instagram'  => '<i class="fa-brands fa-instagram"></i>',
            'tiktok'     => '<i class="fa-brands fa-tiktok"></i>',
            'snapchat'   => '<i class="fa-brands fa-snapchat"></i>',
            'x'          => '<i class="fa-brands fa-x-twitter"></i>',
            'twitter'    => '<i class="fa-brands fa-twitter"></i>',
            'threads'    => '<i class="fa-brands fa-threads"></i>',
            'email'      => '<i class="fa-regular fa-envelope"></i>', 
            'phone'      => '<i class="fa-solid fa-phone"></i>',
            'pinterest'  => '<i class="fa-brands fa-pinterest-p"></i>',
            'rss'        => '<i class="fa-solid fa-rss"></i>',
            'linkedin'   => '<i class="fa-brands fa-linkedin-in"></i>',
            'youtube'    => '<i class="fa-brands fa-youtube"></i>',
            'flickr'     => '<i class="fa-brands fa-flickr"></i>',
            'px500'      => '<i class="fa-brands fa-500px"></i>',
            'vkontakte'  => '<i class="fa-brands fa-vk"></i>',
            'telegram'   => '<i class="fa-brands fa-telegram"></i>',
            'twitch'     => '<i class="fa-brands fa-twitch"></i>',
            'discord'    => '<i class="fa-brands fa-discord"></i>',
            'reddit'     => '<i class="fa-brands fa-reddit-alien"></i>',
        ];
        foreach ($icons as $key => $icon) {
            if (isset($links[$key])) {
                $links[$key]['icon'] = $icon;
            }
        }
        return $links;
    }
    add_filter( 'flatsome_follow_links', 'custom_icons', 10, 2 );
    add_filter( 'flatsome_share_links', 'custom_icons', 10, 2 );
}