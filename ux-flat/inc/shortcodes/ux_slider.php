<?php // [ux_slider]
function shortcode_uxf_slider($atts, $content=null) {

    extract( shortcode_atts( array(
        '_id' => 'slider-'.wp_rand(),
        'timer' => '6000',
        'bullets' => 'true',
        'visibility' => '',
        'class' => '',
        'type' => 'slide',
        'bullet_style' => '',
        'auto_slide' => 'true',
        'auto_height' => 'true',
        'bg_color' => '',
        'slide_align' => 'center',
        'style' => 'normal',
        'slide_width' => '',
        'slide_width__md' => null,
        'slide_width__sm' => null,
        'arrows' => 'true',
        'pause_hover' => 'true',
        'hide_nav' => '',
        'nav_style' => 'circle',
        'nav_color' => 'light',
        'nav_size' => 'large',
        'nav_pos' => '',
        'infinitive' => 'true',
        'freescroll' => 'false',
        'parallax' => '0',
        'margin' => '',
        'margin__md' => '',
        'margin__sm' => '',
        'columns' => '1',
        'height' => '',
        'rtl' => 'false',
        'draggable' => 'true',
        'friction' => '0.6',
        'selectedattraction' => '0.1',
        'threshold' => '10',

        // Derpicated
        'mobile' => 'true',

        // UXF Option
        'ken_burns' => '',
        'auto_marquee' => '',
        'slide_classes' => '',
        'slide_click' => '',
        'nav_position' => '',
        'nav_invert' => '',
        'nav_radius' => '',
        'arrow_shape' => '',
        
    ), $atts ) );

    // Stop if visibility is hidden
    if($visibility == 'hidden') return;
    if($mobile !==  'true' && !$visibility) {$visibility = 'hide-for-small';}
    ob_start();

    $wrapper_classes = array('slider-wrapper', 'relative');
    if( $visibility ) $wrapper_classes[] = $visibility;
    $wrapper_classes = implode(" ", $wrapper_classes);

    $classes = array('slider');
    
    if( $class ) $classes[] = $class;

    if ($type == 'fade') $classes[] = 'slider-type-'.$type;

    // Bullet style
    if($bullet_style) $classes[] = 'slider-nav-dots-'.$bullet_style;

    // Nav style
    if($nav_style) $classes[] = 'slider-nav-'.$nav_style;

    // Nav size
    if($nav_size) $classes[] = 'slider-nav-'.$nav_size;

    // Nav Color
    if($nav_color) $classes[] = 'slider-nav-'.$nav_color;

    // Nav Position
    if($nav_pos) $classes[] = 'slider-nav-'.$nav_pos;

    // Add timer
    if($auto_slide == 'true') $auto_slide = $timer;

    // Add Slider style
    if($style) $classes[] = 'slider-style-'.$style;

    // Always show Nav if set
    if($hide_nav ==  'true') {$classes[] = 'slider-show-nav';}

    // Slider Nav visebility
    $is_arrows = 'true';
    $is_bullets = 'true';

    if($arrows == 'false') $is_arrows = 'false';
    if($bullets == 'false') $is_bullets = 'false';
    
    $is_shape = 'M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z';
    if($arrow_shape == 'style1') {
        $is_shape = 'M 10,50 L 60,100 L 60,95 L 15,50  L 60,5 L 60,0 Z';
    } elseif($arrow_shape == 'style2') {
        $is_shape = 'M 0,50 L 60,00 L 50,30 L 80,30 L 80,70 L 50,70 L 60,100 Z';
    } elseif($arrow_shape == 'style3') {
        $is_shape = 'M62.5 0l3.6 2.1L38.7 50l27.4 47.9-3.6 2.1-28.6-50L62.5 0z';
    }

    if(is_rtl()) $rtl = 'true';

    $classes = implode(" ", $classes);

    // Inline CSS.
	$css_args = array(
		'bg_color' => array(
			'attribute' => 'background-color',
			'value'     => esc_attr($bg_color),
		),
	);

	$args = array(
		'margin'      => array(
			'selector' => '',
			'property' => 'margin-bottom',
		),
		'slide_width' => array(
			'selector'  => '.ux-slider .flickity-slider > *',
			'property'  => 'max-width',
			'important' => true,
		),
        'nav_invert' => array(
            'selector' => '.flickity-prev-next-button svg',
			'property' => 'background-color',
        ),
        'nav_radius'     => array(
            'selector' => '.flickity-prev-next-button svg',
            'property' => 'border-radius',
            'unit'     => 'px',
        ),
	);
?>
<div class="<?php echo esc_attr($wrapper_classes); ?>" id="<?php echo esc_attr($_id); ?>" <?php echo get_shortcode_inline_css($css_args); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <div class="ux-slider <?php echo esc_attr($classes); ?>"
        data-flickity-options='{
            "cellAlign": "<?php echo esc_attr($slide_align); ?>",
            "imagesLoaded": true,
            "lazyLoad": 1,
            "freeScroll": <?php echo esc_attr($freescroll); ?>,
            "wrapAround": <?php echo esc_attr($infinitive); ?>,
            "autoPlay": <?php echo esc_attr($auto_slide);?>,
            "pauseAutoPlayOnHover" : <?php echo esc_attr($pause_hover); ?>,
            "prevNextButtons": <?php echo esc_attr($is_arrows); ?>,
            "contain" : true,
            "adaptiveHeight" : <?php echo esc_attr($auto_height);?>,
            "dragThreshold" : <?php echo esc_attr($threshold) ;?>,
            "percentPosition": true,
            "pageDots": <?php echo esc_attr($is_bullets); ?>,
            "rightToLeft": <?php echo esc_attr($rtl); ?>,
            "draggable": <?php echo esc_attr($draggable); ?>,
            "selectedAttraction": <?php echo esc_attr($selectedattraction); ?>,
            "parallax" : <?php echo esc_attr($parallax); ?>,
            "friction": <?php echo esc_attr($friction); ?>,
            "arrowShape": "<?php echo esc_attr($is_shape); ?>"
        }'
        >
        <?php echo do_shortcode( $content ); ?>
    </div>
    <div class="loading-spin dark large centered"></div>
<style>
    <?php if ($nav_position == "top-left") { ?>
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button { top: 5%; bottom: unset; } 
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button.next { left: 5%; }
    <?php } elseif ($nav_position == "top-right") { ?>
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button { top: 5%; bottom: unset; } 
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button.previous { left: unset; right: 5%; }
    <?php } elseif($nav_position == "bottom-right") { ?>
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button { top: unset; bottom: 5% } 
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button.previous { left: unset; right: 5%; }
    <?php } elseif($nav_position == "bottom-center") { ?>
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button { top: unset; bottom: 5%; left: 50%; } 
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button, .slider-nav-outside .flickity-prev-next-button.next { left: 50%; } 
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button.previous, .slider-nav-outside .flickity-prev-next-button.previous { left: 47%; }
    #<?php echo esc_attr($_id); ?> .slider-nav-outside .flickity-prev-next-button { bottom: -50px; }
    <?php } elseif($nav_position == "bottom-left") { ?>
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button { top: unset; bottom: 5% } 
    #<?php echo esc_attr($_id); ?> .flickity-prev-next-button.next { left: 5%; }
    <?php } ?>
    <?php if($ken_burns == "true") { ?>
    #<?php echo esc_attr($_id); ?> .is-selected img, #<?php echo esc_attr($_id); ?> .is-selected .bg {
        animation: flickity-fade 20s ease;
        -ms-animation: flickity-fade 20s ease;
        -webkit-animation: flickity-fade 20s ease;
        -0-animation: flickity-fade 20s ease;
        -moz-animation: flickity-fade 20s ease;
    }
    @-webkit-keyframes flickity-fade {
        0% {
        -webkit-transform-origin: bottom left;
        -moz-transform-origin: bottom left;
        -ms-transform-origin: bottom left;
        -o-transform-origin: bottom left;
        transform-origin: bottom left;
        transform: scale(1.0);
        -ms-transform: scale(1.0);
        -webkit-transform: scale(1.0);
        -o-transform: scale(1.0);
        -moz-transform: scale(1.0);
        }
        100% {
        transform: scale(1.2);
        -ms-transform: scale(1.2);
        -webkit-transform: scale(1.2);
        -o-transform: scale(1.2);
        -moz-transform: scale(1.2);
        }
    }
    <?php } ?>
</style>
<?php if ( $slide_click || $slide_classes || $auto_marquee ) : ?>
<script>
jQuery(document).on('flatsome-flickity-ready', function($) {
    var mainSlider = jQuery('<?php echo esc_js("#{$_id}"); ?> .flickity-slider');
    var closeSlider = mainSlider.closest('.slider');
    var dataSlider = closeSlider.data('flickity');
    var itemSlider = mainSlider.children();
    <?php if ( $slide_click ) : ?>
    itemSlider.on('click', function() {
        dataSlider.select(jQuery(this).index());
    });
    <?php endif; ?>
    <?php if ( $slide_classes ) : ?>
        function updatePrevNextClasses() {
            var selectedIndex = dataSlider.selectedIndex;
            var numCells = dataSlider.cells.length;
            itemSlider.removeClass(function(index, className) {
                return (className.match(/(^|\s)is-(prev|next)-\d+/g) || []).join(' ');
            });
            for (var i = 1; i <= 2; i++) {
                var prevIndex = (selectedIndex - i + numCells) % numCells;
                var nextIndex = (selectedIndex + i) % numCells;
                itemSlider.eq(prevIndex).addClass('is-prev-' + i);
                itemSlider.eq(nextIndex).addClass('is-next-' + i);
            }
        }
        closeSlider.on('change.flickity', updatePrevNextClasses);
        updatePrevNextClasses();
    <?php endif; ?>
    <?php if ($auto_marquee) : ?>
        var sliderWidth = mainSlider.width();
        var mainTicker = {
            x: 0,
            settle: function(x) {
                mainSlider.css('transform', 'translateX(' + x + 'px)');
            },
            resetPosition: function() {
                if (this.x < -mainSlider.width()) {
                    this.x = 0;
                    dataSlider.select(0);
                }
            }
        };
        var idSlider;
        function playSlider() {
            mainTicker.x -= 1.5;
            mainTicker.resetPosition();
            mainTicker.settle(mainTicker.x);
            idSlider = window.requestAnimationFrame(playSlider);
        }
        <?php if ($pause_hover == 'true') : ?>
        function pauseSlider() {
            if (idSlider) {
                window.cancelAnimationFrame(idSlider);
                idSlider = undefined;
            }
        }
        mainSlider.on('mouseenter', pauseSlider);
        <?php endif; ?>
        mainSlider.on('mouseleave', playSlider);
        playSlider();
    <?php endif; ?>
});
</script>
<?php endif; ?>
    </div>
    <?php echo ux_builder_element_style_tag( esc_attr($_id), $args, $atts ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
add_shortcode("ux_slider", "shortcode_uxf_slider");
