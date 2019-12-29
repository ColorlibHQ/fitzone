<?php 
/**
 * @Packge 	   : Fitzone
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class Fitzone{

		
		// Theme Version
		private $fitzone_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			if( class_exists('Epsilon_Framework') ){
				$this->customizer_init();
			}
			
			// Instantiate  Dashboard
			$Epsilon_init_Dashboard = Epsilon_init_Dashboard::get_instance();
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new fitzone_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->fitzone_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'fitzone_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'fitzone', FITZONE_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 59,
				'width'       => 182,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 450,
				'default-image' => get_template_directory_uri() . '/assets/img/breadcrumb.png'
			) );

			//Custom background
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff'
			) );

	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails', array( 'post' ) );
			
			// Site logo size
			add_image_size( 'fitzone_logo_182x59', 182, 59, true );
										
			// About section image size
			add_image_size( 'fitzone_about_section_550x690', 550, 690, true );
										
			// Intro video section image sizes
			add_image_size( 'fitzone_intro_video_left_section_683x570', 683, 570, true );
			add_image_size( 'fitzone_intro_video_right_section_426x517', 426, 517, true );

			// Courses image size
			add_image_size( 'fitzone_courses_img_480x609', 480, 609, true );

			// Testimonial client image size
			add_image_size( 'fitzone_review_client_image_310x338', 310, 338, true );

			// Team member image size
			add_image_size( 'fitzone_team_img_360x441', 360, 441, true );

			// Latest post thumbnail Widget thumbnail size
			add_image_size( 'fitzone_widget_post_thumb', 80, 80, true );

			// Single blog post image size
			add_image_size( 'fitzone_single_blog_750x375', 750, 375, true );
			add_image_size( 'fitzone_np_thumb', 60, 60, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'   => esc_html__( 'Primary Menu', 'fitzone' ),
				'important-link' => esc_html__( 'Important Link', 'fitzone' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = FITZONE_DIR_CSS_URI;
			$jsPath  = FITZONE_DIR_JS_URI;

			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'themify',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'flaticon',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'magnific-popup-css',
						'file' 			=> $cssPath.'magnific-popup.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'style-css',
						'file' 			=> $cssPath.'style.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					
					array(
						'handler'		=> 'fitzone-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'popper',
						'file' 			=> $jsPath.'popper.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '4.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '4.1.3',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'magnific-popup-js',
						'file' 			=> $jsPath.'jquery.magnific-popup.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'swiper-min-js',
						'file' 			=> $jsPath.'swiper.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'instagram-feed-js',
						'file' 			=> $jsPath.'jquery.instagramFeed.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'masonry-pkgd-js',
						'file' 			=> $jsPath.'masonry.pkgd.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'owl-carousel-js',
						'file' 			=> $jsPath.'owl.carousel.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'gijgo-min-js',
						'file' 			=> $jsPath.'gijgo.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'slick-min-js',
						'file' 			=> $jsPath.'slick.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'jquery-nice-select-min-js',
						'file' 			=> $jsPath.'jquery.nice-select.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),
					
					array(
						'handler'		=> 'fitzone-custom',
						'file' 			=> $jsPath.'custom.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> $this->fitzone_version,
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){

			$fontUrl = '';
			
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'fitzone' ) ) {
				
				$font_families = array(
					'Open+Sans:300,300i,400,600,700',
					'Teko:400,500,600,700',
				);

				$familyArgs = array(
					'family' => htmlentities( implode( '|', $font_families ) ),
					'subset' => urlencode( 'latin, latin-text' ),
				);

				$fontUrl = add_query_arg( $familyArgs, '//fonts.googleapis.com/css' );
			}
			
			return esc_url_raw( $fontUrl );

		} //End google_font method

		// epsilon customizer init
		private function customizer_init(){

			// epsilon customizer quickie settings
		
			add_filter( 'epsilon_quickie_bar_shortcuts', array( $this, 'epsilon_quickie' ) );
			
			// Instantiate Epsilon Framework object
			$Epsilon_Framework = new Epsilon_Framework();

			
			// Instantiate fitzone theme customizer
			$fitzone_theme_customizer = new fitzone_theme_customizer();
		}

		public function epsilon_quickie(){

				return	array(

				'links' => array(
					array(
						'link_to'   => 'fitzone_theme_options_panel',
						'icon'      => 'dashicons dashicons-admin-home',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'nav_menus',
						'icon'      => 'dashicons dashicons-menu',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'widgets',
						'icon'      => 'dashicons dashicons-archive',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'custom_css',
						'icon'      => 'dashicons dashicons-editor-code',
						'link_type' => 'section',
					),

				),
				'logo'  => array(
					'url' => EPSILON_URI . '/assets/img/epsilon-logo.png',
					'alt' => 'Epsilon Builder Logo',
				),
			);

		}

	} // End Fitzone Class

?>