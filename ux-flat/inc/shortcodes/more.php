<?php
/**
 * [more] shortcode to create a "More" button with expandable content
 */

function split_content($content) {
    if (preg_match('/(<p>.*?<\/p>)/s', $content, $matches)) {
        $first_part = $matches[0]; 
        $second_part = preg_replace('/'.preg_quote($first_part, '/').'/', '', $content, 1);
        return array($first_part, $second_part);
    } else {
        return false;
    }
}

function uxf_more_item( $atts, $content = null ) {
    extract( $atts = shortcode_atts( array(
        '_id'        => 'more-' . wp_rand(),
        'text'      => __('View details'),
        'split'      => '',
        'style'     => '',
        'color'     => 'primary',
        'height'    => '100px',
        'divider'   => '',
        'round'   => '',
        'class'     => '',
		'visibility'  => '',
    ), $atts ) );
    
    $classes = array('mb');
    $button = array('button icon');
    if (strpos($style, 'primary') !== false) {
        $color = 'primary';
    } elseif (strpos($style, 'secondary') !== false) {
        $color = 'secondary';
    } elseif (strpos($style, 'white') !== false) {
        $color = 'white';
    } elseif (strpos($style, 'success') !== false) {
        $color = 'success';
    } elseif (strpos($style, 'alert') !== false) {
        $color = 'alert';
    }
    if (strpos($style, 'alt-button') !== false) {
        $style = 'outline';
    }
    if ($color) {
        $button[] = $color;
    }
    if ($style) {
        $button[] = 'is-' . $style;
    }
    if ($round) {
        $button[] = 'round';
    }
	if ( $class ) {
		$classes[] = $class;
	}
	if ( $visibility ) {
		$classes[] = $visibility;
	}
    $expert = '';
    $content_full = $content;
    if ($split) {
        $split_content = split_content($content);
        if ($split_content) {
            list($expert, $content_full) = $split_content;
        }
    }
    ob_start();
    ?>
    <?php echo do_shortcode($expert); ?>
    <div id="<?php echo esc_attr($_id); ?>" class="<?php echo esc_attr(implode(' ', $classes)); ?>">
        <details>
            <summary>
                <span class="<?php echo esc_attr(implode(' ', $button)); ?>">
                    <span><?php echo esc_attr($text); ?></span>
                    <?php echo get_flatsome_icon('icon-expand'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </span>
            </summary>
            <?php echo do_shortcode($content_full); ?>
        </details>
    </div>
    <style>
        #<?php echo esc_attr($_id); ?> details[open] summary { display: none; }
        #<?php echo esc_attr($_id); ?> details[open] summary ~ * { -webkit-animation: stuckFadeIn .6s; animation: stuckFadeIn .6s; }
        #<?php echo esc_attr($_id); ?> details[open]:before { background-image: unset; height: auto; }
        #<?php echo esc_attr($_id); ?> details { position: relative; }
        #<?php echo esc_attr($_id); ?> summary { text-align: center; width: 100%; cursor: pointer; top: -20px; position: absolute; }
        #<?php echo esc_attr($_id); ?> details:before { content: ""; position: absolute; bottom: 100%; height: <?php echo esc_attr($height); ?>; left: 0; background-image: linear-gradient(180deg, hsla(0, 0%, 100%, 0), rgb(255, 255, 255)); width: 100%; }
        <?php if ($divider) { ?>
            #<?php echo esc_attr($_id); ?> details:before { border-bottom: 1px solid #efefef; }
            <?php if ($style == 'outline' && $color == 'white') { ?>
            #<?php echo esc_attr($_id); ?> .button { background: #FFF!important; }
            <?php } ?>
        <?php } ?>
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('more', 'uxf_more_item');
