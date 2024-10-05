<?php
/*
	Plugin Name: UX Flat
	Plugin URI: https://uxflat.com
	Description: This plugin will create new elements for Flatsome > v3.19.2 <code>Flatsome → Advanced → UXFlat</code>
	Version: 5.3.3
	Author: TienCOP
	Author URI: https://profiles.wordpress.org/wpvncom/
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Text Domain: ux-flat
	Domain Path: /languages
*/

if (!defined('ABSPATH')) { exit; }
if ( ! defined( 'UXF_VERSIONS' ) ) {
    define('UXF_VERSIONS', '5.3.3');
}
if ( ! defined( 'UXF_PATH' ) ) {
    define('UXF_PATH', plugin_dir_path(__FILE__));
}
if ( ! defined( 'UXF_URL' ) ) {
    define('UXF_URL', plugins_url('/', __FILE__));
}

//Warning
add_action( 'admin_notices', 'uxf_warning' );
function uxf_warning() {
    $theme = wp_get_theme();
    $parent_theme = $theme->parent();
    if ( $theme->template !== 'flatsome' ) {
        echo '<div class="notice notice-error"><p>' . esc_html__( 'Warning: Please install the "Flatsome" parent theme or deactivate UX Flat.', 'ux-flat' ) . '</p></div>';
        return;
    }
    if ( version_compare( $parent_theme->version, '3.19.2', '<' ) ) {
        echo '<div class="notice notice-warning"><p>' . sprintf( __( '<strong>Warning</strong>: You are using <strong>Flatsome v%1s</strong> which is only compatible with <a href="%2s" target="_blank">UX Flat v5.0</a>', 'ux-flat' ), esc_html( $parent_theme->version ), 'https://downloads.wordpress.org/plugin/ux-flat.5.0.zip' ) . '</p></div>';
    }
}

//Load translations
function uxf_plugins_loaded() {
	load_plugin_textdomain('ux-flat', false, dirname(plugin_basename( __FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'uxf_plugins_loaded');

//Settings link in plugins table
function uxf_action_links($actions, $plugin_file) {
	if(plugin_basename(__FILE__) == $plugin_file) {
		$settings_url = admin_url('admin.php?page=optionsframework#of-option-uxflatoptions');
		$settings_link = array('settings' => '<a href="' . $settings_url . '">' . __('Settings') . '</a>');
		$actions = array_merge($settings_link, $actions);
	}
	return $actions;
}
add_filter('plugin_action_links', 'uxf_action_links', 10, 5);

//Row Meta
function uxf_plugin_row_meta($plugin_meta, $plugin_file) {
    if ((plugin_basename(__FILE__) == $plugin_file) && !uxf_pro_enabled()) {
        $row_meta = array(
            '<a href="https://wpvnteam.com/donate/" target="_blank">' .__('Donate') . '</a>',
        );
        $row_meta[] = '<a href="https://wpvnteam.com/ux-flat/pricing/" target="_blank"><strong style="color:#d54e21;font-weight:bold">' .__('Go Pro') . '</strong></a>';
        return array_merge($plugin_meta, $row_meta);
    }
    return $plugin_meta;
}
add_filter('plugin_row_meta', 'uxf_plugin_row_meta', 10, 2 );

require_once UXF_PATH . 'inc/of_options.php';
require_once UXF_PATH . 'inc/init.php';
