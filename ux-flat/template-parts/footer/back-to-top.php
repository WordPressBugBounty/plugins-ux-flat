<?php
/**
 * Back to top.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

$classes   = array( 'back-to-top', 'button', 'icon', 'invert', 'plain', 'fixed', 'bottom', 'z-1', 'is-outline', 'round' );
$classes[] = get_theme_mod( 'back_to_top_position' ) === 'left' ? 'left' : '';
$classes[] = get_theme_mod( 'back_to_top_mobile' ) ? '' : 'hide-for-medium';
$classes[] = get_theme_mod( 'back_to_top_size' ) ? get_theme_mod( 'back_to_top_size' ) : '';
$btt_bg     = get_theme_mod( 'back_to_top_bg' );
if ( $btt_bg ) {
	$classes[] = $btt_bg;
	$classes   = array_diff( $classes, array( 'is-outline' ) );
}
$btt_icon     = get_theme_mod( 'back_to_top_icon' );
if ( $btt_icon === 'dark' ) {
	$classes[] = 'is-link';
	$classes   = array_diff( $classes, array( 'plain' ) );
} elseif ( $btt_icon === 'light' ) {
	$classes[] = '';
	$classes   = array_diff( $classes, array( 'plain' ) );
}
$shape     = get_theme_mod( 'back_to_top_shape', 'circle' );
if ( $shape === 'circle' ) {
	$classes[] = 'circle';
	$classes   = array_diff( $classes, array( 'round' ) );
}
$classes = implode( ' ', array_filter( $classes ) );
?>

<a href="#top" class="<?php echo esc_attr($classes); ?>" id="top-link" aria-label="<?php esc_attr_e('Go to top', 'flatsome' ); ?>"><?php echo get_flatsome_icon( 'icon-angle-up' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>