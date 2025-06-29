<?php
/**
 * Plugin name:         UX Flat
 * Description:         This plugin will create new elements for Flatsome.
 * Version:             5.4.0
 * Requires at least:   6.2
 * Requires PHP:        7.4
 * Author:              TienCOP
 * Author URI:          https://profiles.wordpress.org/wpvncom/
 * Text Domain:         ux-flat
 * Domain Path:         /languages
 * License:             GPL-3.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (!defined('ABSPATH')) { exit; }

if ( ! defined( 'UXF_VERSION' ) ) {
    define( 'UXF_VERSION', '5.4.0' );
}
if ( ! defined( 'UXF_FILE' ) ) {
    define( 'UXF_FILE', __FILE__ );
}
if ( ! defined( 'UXF_DIR' ) ) {
    define( 'UXF_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'UXF_URL' ) ) {
    define( 'UXF_URL', plugin_dir_url( __FILE__ ) );
}

require_once __DIR__ . '/inc/core.php';

if ( !get_flatsome() ) {
    return;
}

require_once __DIR__ . '/inc/of_options.php';
require_once __DIR__ . '/inc/init.php';