<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'FITZONE_DIR_URI' ) )
		define( 'FITZONE_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'FITZONE_DIR_ASSETS_URI' ) )
		define( 'FITZONE_DIR_ASSETS_URI', FITZONE_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'FITZONE_DIR_CSS_URI' ) )
		define( 'FITZONE_DIR_CSS_URI', FITZONE_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'FITZONE_DIR_JS_URI' ) )
		define( 'FITZONE_DIR_JS_URI', FITZONE_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('FITZONE_DIR_ICON_IMG_URI') )
		define( 'FITZONE_DIR_ICON_IMG_URI', FITZONE_DIR_ASSETS_URI.'img/icon/' );
	
	// Animate Icon Images
	if( !defined('FITZONE_DIR_ANIMATED_ICON_IMG_URI') )
		define( 'FITZONE_DIR_ANIMATED_ICON_IMG_URI', FITZONE_DIR_ASSETS_URI.'img/animate_icon/' );
	
	//DIR inc
	if( !defined( 'FITZONE_DIR_INC' ) )
		define( 'FITZONE_DIR_INC', FITZONE_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'FITZONE_DIR_ELEMENTOR' ) )
		define( 'FITZONE_DIR_ELEMENTOR', FITZONE_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'FITZONE_DIR_PATH' ) )
		define( 'FITZONE_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'FITZONE_DIR_PATH_INC' ) )
		define( 'FITZONE_DIR_PATH_INC', FITZONE_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'FITZONE_DIR_PATH_LIB' ) )
		define( 'FITZONE_DIR_PATH_LIB', FITZONE_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'FITZONE_DIR_PATH_CLASSES' ) )
		define( 'FITZONE_DIR_PATH_CLASSES', FITZONE_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'FITZONE_DIR_PATH_WIDGET' ) )
		define( 'FITZONE_DIR_PATH_WIDGET', FITZONE_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'FITZONE_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'FITZONE_DIR_PATH_ELEMENTOR_WIDGETS', FITZONE_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( FITZONE_DIR_PATH_INC . 'fitzone-breadcrumbs.php' );
	// Sidebar register file include
	require_once( FITZONE_DIR_PATH_INC . 'widgets/fitzone-widgets-reg.php' );
	// Post widget file include
	require_once( FITZONE_DIR_PATH_INC . 'widgets/fitzone-recent-post-thumb.php' );
	// News letter widget file include
	require_once( FITZONE_DIR_PATH_INC . 'widgets/fitzone-newsletter-widget.php' );
	//Social Links
	require_once( FITZONE_DIR_PATH_INC . 'widgets/fitzone-social-links.php' );
	// Instagram Widget
	require_once( FITZONE_DIR_PATH_INC . 'widgets/fitzone-instagram.php' );
	// Nav walker file include
	require_once( FITZONE_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( FITZONE_DIR_PATH_INC . 'fitzone-functions.php' );

	// Theme Demo file include
	require_once( FITZONE_DIR_PATH_INC . 'demo/demo-import.php' );

	// Post Like
	require_once( FITZONE_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( FITZONE_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( FITZONE_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( FITZONE_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( FITZONE_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( FITZONE_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( FITZONE_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( FITZONE_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( FITZONE_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class fitzone dashboard
	require_once( FITZONE_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );
	// Common css
	require_once( FITZONE_DIR_PATH_INC . 'fitzone-commoncss.php' );

	// Admin Enqueue Script
	function fitzone_admin_script(){
		wp_enqueue_style( 'fitzone-admin', get_template_directory_uri().'/assets/css/fitzone_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'fitzone_admin', get_template_directory_uri().'/assets/js/fitzone_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'fitzone_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Fitzone object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Fitzone Dashboard .
	 *
	 */
	
	$Fitzone = new Fitzone();
	


/**
 * A page by title, without get_page_by_title().
 *
 * WordPress deprecated get_page_by_title() in 6.2; this keeps the same
 * signature and return shape so existing calls behave identically.
 *
 * @param string $title     Page title.
 * @param string $output    OBJECT, ARRAY_A or ARRAY_N.
 * @param string $post_type Post type to search.
 * @return WP_Post|array|null
 */
if ( ! function_exists( 'fitzone_get_page_by_title' ) ) {
	function fitzone_get_page_by_title( $title, $output = OBJECT, $post_type = 'page' ) {
		$query = new WP_Query(
			array(
				'post_type'              => $post_type,
				'title'                  => $title,
				'post_status'            => 'all',
				'posts_per_page'         => 1,
				'no_found_rows'          => true,
				'ignore_sticky_posts'    => true,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
				'orderby'                => 'post_date ID',
				'order'                  => 'ASC',
			)
		);

		$page = ! empty( $query->posts ) ? $query->posts[0] : null;

		if ( ! $page ) {
			return null;
		}

		if ( ARRAY_A === $output ) {
			return get_object_vars( $page );
		}

		if ( ARRAY_N === $output ) {
			return array_values( get_object_vars( $page ) );
		}

		return $page;
	}
}


/**
 * Editor and markup support this theme predates.
 */
if ( ! function_exists( 'fitzone_modern_supports' ) ) {
	function fitzone_modern_supports() {
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
	}
	add_action( 'after_setup_theme', 'fitzone_modern_supports', 20 );
}
