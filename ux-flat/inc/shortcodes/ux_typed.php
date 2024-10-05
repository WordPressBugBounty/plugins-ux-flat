<?php

function flatsome_render_ux_typed_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
		'id'        => 'typed_' . wp_rand(),
        'target'    => '',
        'typespeed' => 50,
        'backspeed' => 50,
        'backdelay' => 500,
        'startdelay' => 500,
        'loop'      => 'false',
        'attr'      => '',
        'loopcount' => 'Infinity',
        'fadeout'   => 'false',
        'fadeoutdelay'  => 500,
        'smartbackspace' => 'true',
        'shuffle'       => 'false',
        'showcursor'    => 'true',
        'cursorchar'    => '|',
        'cursorcolor'   => '',
        'class'         => '',
        'visibility'    => '',
	), $atts ) );

	extract( $atts );
    wp_enqueue_script( 'typedjs');
    $classes = array();
    if ( ! empty( $atts['class'] ) ) {
        $classes[] = $atts['class'];
    }
    if ( ! empty( $atts['visibility'] ) ) {
        $classes[] = $atts['visibility'];
    }
    $id_el = $target ? 'null' : '"#' . $id . '_el"';
    $strings = '';
    $idtyped = $target ? $target : "#" . $id;
    $attrs = $attr ? '"'.$attr.'"' : 'null';
    if ( $target ) {
        $content = str_replace( array( '\r\n', '"' ), array( '\n', "'" ), do_shortcode( $content ) );
        $strings_exp = array_filter( explode( "\n", $content ) );
        $strings_map = array_map( 'trim', $strings_exp );
        $strings = '"' . implode( '","', $strings_map ) . '"';
    }
    ob_start();
    ?>
    <?php if ( ! $target ) : ?>
        <div id="<?php echo esc_attr( $id . '_el' ); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"><?php echo do_shortcode( $content ); ?></div>
        <span id="<?php echo esc_attr( $id ); ?>"></span>
    <?php endif; ?>
    <script>
        document.querySelectorAll('<?php echo esc_attr( $idtyped ); ?>').forEach(function(el) {
            new Typed(el, {
                strings: [<?php echo $strings; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>],
                stringsElement: <?php echo $id_el;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>,
                typeSpeed: <?php echo esc_attr( $typespeed ); ?>,
                backSpeed: <?php echo esc_attr( $backspeed ); ?>,
                backDelay: <?php echo esc_attr( $backdelay ); ?>,
                startDelay: <?php echo esc_attr( $startdelay ); ?>,
                loop: <?php echo esc_attr( $loop ); ?>,
                attr: <?php echo $attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>,
                loopCount: <?php echo esc_attr( $loopcount ); ?>,
                fadeOut: <?php echo esc_attr( $fadeout ); ?>,
                fadeOutDelay: <?php echo esc_attr( $fadeoutdelay ); ?>,
                smartBackspace: <?php echo esc_attr( $smartbackspace ); ?>,
                shuffle: <?php echo esc_attr( $shuffle ); ?>,
                showCursor: <?php echo esc_attr( $showcursor ); ?>,
                cursorChar: "<?php echo esc_attr( $cursorchar ); ?>"
            });
        });
    </script>
    <?php if ( $cursorcolor ) : ?>
        <style>.typed-cursor { color: <?php echo esc_attr( $cursorcolor ); ?>;}</style>
    <?php endif; ?>
    <?php
    return ob_get_clean();
}
add_shortcode( 'ux_typed', 'flatsome_render_ux_typed_shortcode' );
