<?php
/**
 * Page loader.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

$color = get_theme_mod('site_loader_color');
$bg_color = get_theme_mod('site_loader_bg');
if(empty($bg_color) && $color == 'dark'){
	$bg_color = get_theme_mod('color_primary', Flatsome_Default::COLOR_PRIMARY );
} else if(empty($bg_color)){
	$bg_color = '#fff';
}
?>
<div class="page-loader fixed fill z-top-3 <?php if($color == 'dark') echo 'nav-dark dark'; ?>">
	<div class="page-loader-inner x50 y50 md-y50 md-x50 lg-y50 lg-x50 absolute">
		<div class="page-loader-logo" style="padding-bottom: 30px;">
			<img alt="<?php echo esc_attr__('Loading', 'ux-flat'); ?>" src="<?php echo esc_url( get_theme_mod('site_loader_img') ) ?>"/>
            <div class="page-circle"></div>
	    </div>
	</div>
	<style>
        .page-loader{opacity: 0; transition: opacity .3s; transition-delay: .3s;
			background-color: <?php echo esc_attr($bg_color); ?>;
		}
		.loading-site .page-loader{opacity: .98;}
		.page-loader-logo{max-width: <?php echo intval(get_theme_mod('logo_width', 200)); ?>px; animation: pageLoadZoom 1.3s ease-out; -webkit-animation: pageLoadZoom 1.3s ease-out;}
		@keyframes pageLoadZoom {
		    0%   {opacity:0; transform: translateY(30px);}
		    100% {opacity:1; transform: translateY(0);}
		}
		@keyframes pageLoadZoomSpin {
		    0%   {opacity:0; transform: translateY(60px);}
		    100% {opacity:1; transform: translateY(0);}
		}
	</style>
</div>