<?php
/**
 * viewmore class
 **/
if ( ! class_exists( 'UXFVM_MCE' ) ) {
class UXFVM_MCE {
    function __construct() {
        if ( is_admin() ) {
            add_action( 'init', array( &$this, 'setup_tinymce_more_text' ) );
        }
    }

    function setup_tinymce_more_text() {
        if(! current_user_can('edit_posts')){
            return;
        }
        if(get_user_option('rich_editing') !== true ){
            add_filter('mce_external_plugins', array(&$this, 'add_tinymce_more_text'));
            add_filter('mce_buttons', array(&$this, 'add_tinymce_toolbar_button'));
        }
    }

    function add_tinymce_more_text( $plugin_array ) {
        $plugin_array['more_text_shortcode'] = UXF_URL . 'assets/js/mce.more.min.js';
        return $plugin_array;
    }

    function add_tinymce_toolbar_button( $buttons ) {
        array_push( $buttons, 'more_text_shortcode' );
        return $buttons;
    }
}
$UXFVM_MCE = new UXFVM_MCE;
}