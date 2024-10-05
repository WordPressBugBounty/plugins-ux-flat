<?php
/**
 * Flatsome Infinite scrollpost extension
 *
 * @author     UX Themes
 * @category   Extension
 * @package    Flatsome/Extensions
 * @since      3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Flatsome_Infinite_ScrollPost
 */
class Flatsome_Infinite_ScrollPost {

	/**
	 * Version number
	 *
	 * @var string
	 */
	private $version;

	/**
	 * Holds loader type selected from theme settings.
	 * ex. button, spinner, image, etc.
	 *
	 * @var string
	 */
	private $loader_type;

	/**
	 * Holds category list style from theme settings.
	 * ex. grid, list, masonry
	 *
	 * @var string
	 */
	private $list_style;

	/**
	 * Static instance
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Flatsome_Infinite_ScrollPost constructor.
	 */
	private function __construct() {
		$theme         = wp_get_theme( get_template() );
		$this->version = $theme->get( 'Version' );

		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Initializes the extension object and returns its instance
	 *
	 * @return object The extension object instance
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initialize extension
	 */
	public function init() {
		if ( is_admin() ) {
			return;
		} // Disable for admin

		$this->loader_type = get_theme_mod( 'uxf_scroll_loader_type', 'spinner' );
		//$this->list_style  = get_theme_mod( 'blog_style_type', 'row' );

		add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ), 99 );
		add_action( 'flatsome_after_blog', array( $this, 'add_page_loader' ), 20 );
		add_action( 'wp_head', array( $this, 'add_css' ), 110 );
	}

	/**
	 * Add extension scripts
	 */
	public function add_scripts() {
        if (!is_category()){
			return;
		}
		//global $extensions_uri;
		wp_enqueue_script( 'flatsome-infinite-scroll-js', get_template_directory_uri() . '/assets/libs/infinite-scroll.pkgd.min.js', array( 'jquery', 'flatsome-js' ), '4.0.1', true );
		wp_enqueue_script( 'flatsome-infinite-scrollpost', UXF_URL . 'inc/extensions/flatsome-infinite-scrollpost/flatsome-infinite-scrollpost.js', array( 'jquery', 'flatsome-js' ), $this->version, true );

		$params = array(
			'scroll_threshold' => 400,
			'fade_in_duration' => 300,
			'type'             => $this->loader_type,
			'list_style'       => 'row',
			'history'          => 'push',
		);

		wp_localize_script( 'flatsome-infinite-scrollpost', 'flatsome_infinite_scrollpost', apply_filters( 'flatsome_infinite_scrollpost_params', $params ) );
	}

	/**
	 *  Adds page loader template
	 */
	public function add_page_loader() {
        if (!is_category()){
			return;
		}
		$this->get_template( $this->loader_type );
	}

	/**
	 * Add extension CSS
	 */
	public function add_css() {
		ob_start();
        if (!is_category()){
			return;
		}
		?>
		<style id="infinite-scroll-css" type="text/css">
			.page-load-status,
			.blog-archive .nav-pagination {
				display: none;
			}
		</style>
		<?php
		$css = ob_get_clean();
		echo flatsome_minify_css( $css ); // @codingStandardsIgnoreLine
	}

	/**
	 * Gets and includes loader template file specified by name.
	 *
	 * @param string $name Name of the template.
	 */
	private function get_template( $name ) {
		//global $extensions_url;
		$template = UXF_PATH . "/inc/extensions/flatsome-infinite-scrollpost/templates/{$name}.php";
		include $template;
	}
}

/**
 * Init Flatsome_Infinite_ScrollPost
 */
Flatsome_Infinite_ScrollPost::get_instance();
