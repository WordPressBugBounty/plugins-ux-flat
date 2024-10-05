<?php
/**
 * [menu]
 */
 function uxf_menu_item( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'menu' => '',
        'name' => '',
        'dropdown' => '',
        'parent' => '',
        'class' => '',
        'visibility' => '',
        'align' => 'left',
        'style' => 'line',
        'type' => 'vertical',
        'border' => '',
        'padding' => '',
        'size' => 'medium',
        'hover' => '',
        'color' => ''
    ), $atts ) );

    $classes = array();
    if ( $type == 'menu') {
        $classes[] = 'ux-nav-vertical-menu nav-vertical-fly-out';
    } else {
        $classes[] = 'nav';
    }
    if ( $class ) $classes[] = $class;
    if ( $visibility ) $classes[] = $visibility;
    if ( $type ) $classes[] = 'nav-' . $type;
    if ( $size ) $classes[] = 'nav-size-' . $size;
    if ( $style ) $classes[] = 'nav-' . $style;
    if ( $align ) $classes[] = 'text-' . $align . ' nav-' . $align;
    
    $walker = null;
    if ( $dropdown ) $walker = new FlatsomeNavDropdown();
    $depth =  $parent ? 0 : 1;

    $menu_content = wp_nav_menu(
        array(
            'menu' => $menu,
            'menu_class' => implode( ' ', $classes ),
            'walker' => $walker,
            'depth' => $depth,
            'echo' => false
        )
    );
    if ( $name ) {
        $menu_content = '<div class="is-large is-bold mb-half">' . esc_attr($menu) . '</div>' . $menu_content;
    }
    ?>
    <style>
    <?php if ( $border ){ ?>
        <?php echo '.menu-'.esc_attr(sanitize_title($menu)).'-container'; ?> .nav-vertical>li+li{border-top:none}
        <?php echo '.menu-'.esc_attr(sanitize_title($menu)).'-container'; ?> .nav>li>a {padding: <?php echo esc_attr($padding); ?>;}
    <?php } ?>
    <?php if ( $hover === 'translatey' ) { ?>
    <?php echo '.menu-'.esc_attr(sanitize_title($menu)).'-container'; ?> ul li a::after {
            position: absolute;
            content: '';
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            left: 0;
            height: 1px;
            width: 0;
        }
        <?php echo '.menu-'.esc_attr(sanitize_title($menu)).'-container'; ?> ul li a:hover {
            color: var(--primary-color);
            padding-left: 15px;
        }
        <?php echo '.menu-'.esc_attr(sanitize_title($menu)).'-container'; ?> ul li a:hover::after {
            background: var(--primary-color);
            width: 10px;
        }
    <?php } ?>
    <?php if ( $hover === 'scalex' ) { ?>
    <?php echo '.menu-'.esc_attr(sanitize_title($menu)).'-container'; ?> ul li > a:after{
            content: '';
            display: block;
            position: absolute;
            top: calc(100% - 2px);
            left: 0;
            width: 100%;
            border-bottom: 1px solid var(--primary-color);
            transition: transform 1s cubic-bezier(.28,.75,.22,.95);
            transform: scaleX(0);
            transform-origin: right center;
        }
        <?php echo '.menu-'.esc_attr(sanitize_title($menu)).'-container'; ?> ul li > a:hover{
            color: var(--primary-color);
        }
        <?php echo '.menu-'.esc_attr(sanitize_title($menu)).'-container'; ?> ul li > a:hover:after{
            transform: scale(1);
            transform-origin: left center;
        }
    <?php } ?>
    <?php if ( $color ) { ?>
        <?php echo '.menu-'.esc_attr(sanitize_title($menu)).'-container'; ?> i:not(.icon-angle-down) {
            color: <?php echo esc_attr($color); ?>;
        }
    <?php } ?>
    </style><?php 
    return $menu_content;
}
add_shortcode( 'menu', 'uxf_menu_item' );


