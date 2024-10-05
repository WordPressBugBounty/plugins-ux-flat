<?php

/**
 * Get theme icon by classname.
 *
 * @param string $name The icon name.
 * @param string $size Optional size corresponding to font size.
 * @param array  $atts Optional element attributes.
 *
 * @return string Icon markup.
 */

function flatsome_remove_icons_css() {
    remove_action( 'wp_enqueue_scripts', 'flatsome_add_icons_css', 150 );
}
add_action( 'after_setup_theme', 'flatsome_remove_icons_css' );

function flatsome_custom_icons_css() {
    ob_start(); ?>
<style id="uxf-icon-css" type="text/css">
@font-face {
font-family: "fl-icons";
font-display: block;
src: url(<?php echo esc_url(UXF_URL . 'assets/css/icons/fl-icons.eot'); ?>);
src:
    url(<?php echo esc_url(UXF_URL . 'assets/css/icons/fl-icons.eot#iefix'); ?>) format("embedded-opentype"),
    url(<?php echo esc_url(UXF_URL . 'assets/css/icons/fl-icons.woff2'); ?>) format("woff2"),
    url(<?php echo esc_url(UXF_URL . 'assets/css/icons/fl-icons.ttf'); ?>) format("truetype"),
    url(<?php echo esc_url(UXF_URL . 'assets/css/icons/fl-icons.woff'); ?>) format("woff"),
    url(<?php echo esc_url(UXF_URL . 'assets/css/icons/fl-icons.svg#fl-icons'); ?>) format("svg");
}
.icon-heart:before { content: '\e800'!important; }
.icon-twitter:before { content: '\e801'!important; }
.icon-facebook:before { content: '\e802'!important; }
.icon-envelop:before { content: '\e803'!important; }
.icon-tag:before { content: '\e804'!important; }
.icon-star:before { content: '\e805'!important; }
.icon-star-o:before { content: '\e806'!important; }
.icon-feed:before { content: '\e807'!important; }
.icon-map-pin-fill:before { content: '\e808'!important; }
.icon-checkmark:before { content: '\e809'!important; }
.icon-plus:before { content: '\e80a'!important; }
.icon-instagram:before { content: '\e80b'!important; }
.icon-pinterest:before { content: '\e80c'!important; }
.icon-skype:before { content: '\e80d'!important; }
.icon-search:before { content: '\e80e'!important; }
.icon-dribbble:before { content: '\e80f'!important; }
.icon-discord:before { content: '\e810'!important; }
.icon-expand:before { content: '\e811'!important; }
.icon-linkedin:before { content: '\e812'!important; }
.icon-pen-alt-fill:before { content: '\e813'!important; }
.icon-youtube:before { content: '\e814'!important; }
.icon-flickr:before { content: '\e815'!important; }
.icon-clock:before { content: '\e816'!important; }
.icon-phone:before { content: '\e817'!important; }
.icon-px:before { content: '\e818'!important; }
.icon-vk:before { content: '\e819'!important; }
.icon-tumblr:before { content: '\e81a'!important; }
.icon-gift:before { content: '\e81b'!important; }
.icon-play:before { content: '\e81c'!important; }
.icon-menu:before { content: '\e81d'!important; }
.icon-messenger:before { content: '\e83a'!important; }
.icon-zalo:before { content: '\e83b'!important; }
.icon-user-o:before { content: '\e900'!important; }
.icon-user:before { content: '\e901'!important; }
.icon-snapchat:before { content: '\e902'!important; }
.icon-chat:before { content: '\e903'!important; }
.icon-lock:before { content: '\e904'!important; }
.icon-google-plus:before { content: '\e905'!important; }
.icon-heart-o:before { content: '\e906'!important; }
.icon-whatsapp:before { content: '\e907'!important; }
.icon-shopping-cart:before { content: '\e908'!important; }
.icon-shopping-basket:before { content: '\e909'!important; }
.icon-shopping-bag:before { content: '\e90a'!important; }
.icon-tiktok:before { content: '\e90b'!important; }
.icon-twitch:before { content: '\e90c'!important; }
.icon-x:before { content: '\e90d'!important; }
.icon-threads:before { content: '\e90e'!important; }
.icon-equalizer:before { content: '\e992'!important; }
.icon-cross:before { content: '\ea0f'!important; }
.icon-telegram:before { content: '\ea95'!important; }
.icon-certificate:before { content: '\f0a3'!important; }
.icon-angle-left:before { content: '\f104'!important; }
.icon-angle-right:before { content: '\f105'!important; }
.icon-angle-up:before { content: '\f106'!important; }
.icon-angle-down:before { content: '\f107'!important; }
.icon-eye:before { content: '\f108'!important; }
.icon-eye-blocked:before { content: '\f109'!important; }
.star-rating:before, .woocommerce-page .star-rating:before { content: '\e806\e806\e806\e806\e806'!important; }
.star-rating span:before { content: '\e805\e805\e805\e805\e805'!important; }
</style><?php
    $buffer = ob_get_clean();
    echo flatsome_minify_css($buffer); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'wp_enqueue_scripts', 'flatsome_custom_icons_css', 150 );

