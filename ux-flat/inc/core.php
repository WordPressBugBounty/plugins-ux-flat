<?php
/**
 * Core
 */

if ( ! function_exists( 'get_flatsome' ) ) {
    function get_flatsome() {
        $theme = wp_get_theme();
        $parent_theme = $theme->parent();
        if ( $theme->template == 'flatsome' ) {
            return true;
        }
        return false;
    }
}

// Warning
if ( ! function_exists( 'uxf_warning' ) ) {
    function uxf_warning() {
        $theme = wp_get_theme();
        $parent_theme = $theme->parent();
        if ( $theme->template !== 'flatsome' ) {
            echo '<div class="notice notice-error"><p>' . esc_html__( 'Warning: Please install the "Flatsome" parent theme or deactivate UX Flat.', 'ux-flat' ) . '</p></div>';
            return;
        }
        if ( version_compare( $parent_theme->version, '3.19.2', '<' ) ) {
            echo '<div class="notice notice-warning"><p>' . sprintf( __( '<strong>Warning</strong>: You are using <strong>Flatsome v%1$s</strong> which is only compatible with <a href="%2$s" target="_blank">UX Flat v5.0</a>', 'ux-flat' ), esc_html( $parent_theme->version ), 'https://downloads.wordpress.org/plugin/ux-flat.5.0.zip' ) . '</p></div>';
        }
    }
    add_action( 'admin_notices', 'uxf_warning' );
}

// Load translations
if ( ! function_exists( 'uxf_textdomain' ) ) {
    function uxf_textdomain() {
        load_plugin_textdomain( 'ux-flat', false, dirname( plugin_basename( UXF_FILE ) ) . '/languages/' );
    }
    add_action( 'plugins_loaded', 'uxf_textdomain' );
}

// Redirect link
if ( ! function_exists( 'uxf_plugin_redirect' ) ) {
    function uxf_plugin_redirect( $plugin_file ) {
        if( !wp_doing_ajax() && $plugin_file == plugin_basename( UXF_FILE ) ) {
            wp_safe_redirect( admin_url( 'admin.php?page=optionsframework#of-option-uxflatoptions' ) );
            exit();
        }
    }
    add_action( 'activated_plugin', 'uxf_plugin_redirect' );
}

// Settings link
if ( ! function_exists( 'uxf_action_links' ) ) {
	function uxf_action_links( $links ) {
		$links[]     = '<a href="' . esc_url( admin_url( 'admin.php?page=optionsframework#of-option-uxflatoptions' ) ) . '">' . __( 'Settings' ) . '</a>';
		$upgradeable = apply_filters( 'uxflat_upgradeable', true );
		if ( $upgradeable ) {
			$links[] = '<a href="https://wpvnteam.com/ux-flat/pricing/" style="color: #39b54a; font-weight: bold" target="_blank">' . __( 'Upgrade', 'ux-flat' ) . '</a>';
		}
		return $links;
	}
    add_filter( 'plugin_action_links_' . plugin_basename( UXF_FILE ), 'uxf_action_links' );
}

// Row Meta
if ( ! function_exists( 'uxf_plugin_row_meta' ) ) {
	function uxf_plugin_row_meta( $meta, $file ) {
		if ( $file !== plugin_basename( UXF_FILE ) ) {
			return $meta;
		}
        $upgradeable = apply_filters( 'uxflat_upgradeable', true );
        $meta[] = '<a href="https://wpvnteam.com/ux-flat/doc/" target="_blank">' . __( 'Documentation' ) . '</a>';
		if ( !$upgradeable ) {
            $meta[] = '<a href="https://wpvnteam.com/support/" target="_blank">' . __( 'Support' ) . '</a>';
        } else {
            $meta[] = '<a href="https://wpvnteam.com/donate/" target="_blank">' . __( 'Donate', 'ux-flat' ) . '</a>';
            $meta[] = '<a href="https://wordpress.org/support/plugin/ux-flat/reviews/?filter=5" target="_blank" title="' . esc_html__( 'Rate UX Flat on WordPress.org', 'ux-flat' ) . '" style="color: #ffb900">'
                . str_repeat( '<span class="dashicons dashicons-star-filled" style="font-size:13px;width:13px;height:13px;line-height:1.8;"></span>', 5 )
                . '</a>';
        }
		return $meta;
	}
    add_filter( 'plugin_row_meta', 'uxf_plugin_row_meta', 10, 2 );
}
