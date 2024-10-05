<?php
/**
 * Accordion Shortcode
 *
 * Accordion and Accordion Item Shortcode builder.
 *
 * @author UX Themes
 * @package Flatsome/Shortcodes/Accordion
 * @version 3.9.0
 */

$flatsome_accordion_state = array();
$flatsome_accordion_faq_schema = array();

/**
 * Output the accordion shortcode.
 *
 * @param array  $atts Shortcode attributes.
 * @param string $content Accordion content.
 *
 * @return string.
 */
function uxf_accordion( $atts, $content = null ) {
	global $flatsome_accordion_state;

	extract( shortcode_atts( array(
		'auto_open'  => '',
		'open'       => '',
		'title'      => '',
		'class'      => '',
		'faq_schema' => '',
	), $atts ) );

	if ($auto_open) $open = 1;

	array_push( $flatsome_accordion_state, array(
		'open'       => (int) $open,
		'current'    => 1,
		'faq_schema' => filter_var( $faq_schema, FILTER_VALIDATE_BOOLEAN ),
	) );

	$classes                 = array( 'accordion' );
	if ( $class ) $classes[] = $class;

	if ($title) $title = '<h2 class="accordion_title">' . $title . '</h2>';

	$result = $title . '<div class="' . implode( ' ', $classes ) . '">' . do_shortcode( $content ) . '</div>';

	array_pop( $flatsome_accordion_state );

	return $result;
}
add_shortcode( 'accordion', 'uxf_accordion' );


/**
 * Output the accordion-item shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Accordion content.
 * @param string $tag     The name of the shortcode, provided for context to enable filtering.
 *
 * @return string.
 */
function uxf_accordion_item( $atts, $content = null, $tag = '' ) {
	global $flatsome_accordion_state, $flatsome_accordion_faq_schema;

	$current = count( $flatsome_accordion_state ) - 1;
	$state   = isset( $flatsome_accordion_state[ $current ] )
		? $flatsome_accordion_state[ $current ]
		: null;

	$atts = shortcode_atts(
		array(
			'id'     => 'accordion-' . wp_rand(),
			'title'  => 'Accordion Panel',
			'anchor' => '',
			'class'  => '',
		),
		$atts,
		$tag
	);

	$is_open       = false;
	$classes       = array( 'accordion-item' );
	$title_classes = array( 'accordion-title', 'plain' );

	if ( is_array( $state ) && $state['current'] === $state['open'] ) {
		$is_open         = true;
		$title_classes[] = 'active';
	}

	if ( ! empty( $atts['class'] ) ) $classes[] = $atts['class'];

	if ( isset( $flatsome_accordion_state[ $current ]['current'] ) ) {
		$flatsome_accordion_state[ $current ]['current'] ++;
	}

	if ( isset( $flatsome_accordion_state[ $current ]['faq_schema'] ) && $flatsome_accordion_state[ $current ]['faq_schema'] ) {
		$question = wp_strip_all_tags( $atts['title'] );
		$answer   = $content;

		$answer = do_shortcode( $answer );
		$answer = shortcode_unautop( $answer );
		$answer = wptexturize( $answer );

		if ( $GLOBALS['wp_embed'] instanceof \WP_Embed ) {
			$answer = $GLOBALS['wp_embed']->autoembed( $answer );
		}

		$flatsome_accordion_faq_schema[] = array(
			'question' => $question,
			'answer'   => $answer,
		);
	}

	$link_atts = array(
		'id'            => esc_attr( $atts['id'] ) . '-label',
		'class'         => esc_attr( implode( ' ', $title_classes ) ),
		'href'          => ! empty( $atts['anchor'] )
			? '#' . rawurlencode( $atts['anchor'] )
			: esc_url( '#accordion-item-' . flatsome_to_dashed( $atts['title'] ) ),
		'aria-expanded' => $is_open ? 'true' : 'false',
		'aria-controls' => esc_attr( $atts['id'] ) . '-content',
	);

	$accordion_inner_atts = array(
		'id'              => esc_attr( $atts['id'] ) . '-content',
		'class'           => 'accordion-inner',
		'style'           => $is_open ? 'display: block;' : null,
		'aria-labelledby' => esc_attr( $atts['id'] ) . '-label',

	);

	ob_start();

	?>
	<div id="<?php echo esc_attr( $atts['id'] ); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<a <?php echo flatsome_html_atts( $link_atts ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<button class="toggle" aria-label="<?php esc_attr_e( 'Toggle', 'flatsome' ); ?>"><i class="icon-angle-down"></i></button>
			<h3 class="mb is-large"><?php echo $atts['title']; // phpcs:ignore WordPress.Security.EscapeOutput ?></h3>
		</a>
		<div <?php echo flatsome_html_atts( $accordion_inner_atts ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
	<?php

	return ob_get_clean();
}
add_shortcode( 'accordion-item', 'uxf_accordion_item' );