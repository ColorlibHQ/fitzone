<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : FITZONE
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
// enqueue css
function fitzone_common_custom_css(){
    
    wp_enqueue_style( 'fitzone-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = fitzone_opt( 'fitzone_theme_color' ) != '#fa0347' ? fitzone_opt( 'fitzone_theme_color' ) : '';
		$boxShadowColor    		  = fitzone_opt( 'fitzone_theme_box_shadow_color' );

		$buttonBorderColor     	  = fitzone_opt( 'fitzone_button_border_color' );
		$hoverColor     	  	  = fitzone_opt( 'fitzone_hover_color');

		$headerTop_bg     		  = fitzone_opt( 'fitzone_top_header_bg_color' );
		$headerTop_col     		  = fitzone_opt( 'fitzone_top_header_color' );

		$headerBg          		  = fitzone_opt( 'fitzone_header_bg_color');
		$menuColor          	  = fitzone_opt( 'fitzone_header_menu_color' );
		$menuHoverColor           = fitzone_opt( 'fitzone_header_menu_hover_color' );
		$dropMenuColor            = fitzone_opt( 'fitzone_header_drop_menu_color' );
		$dropMenuHovColor         = fitzone_opt( 'fitzone_header_drop_menu_hover_color' );
		$getStrtBtnColor          = fitzone_opt( 'fitzone_header_right_btn_color' ) != '#fa0347' ? fitzone_opt( 'fitzone_header_right_btn_color' ) : '';
		$getStrtBtnHrvColor       = fitzone_opt( 'fitzone_header_right_btn_hover_color' ) != '#fa0347' ? fitzone_opt( 'fitzone_header_right_btn_hover_color' ) : '';


		$footerwbgColor     	  = fitzone_opt('fitzone_footer_bg_color');
		$footerwTextColor   	  = fitzone_opt('fitzone_footer_widget_text_color') != '#888888' ? fitzone_opt('fitzone_footer_widget_text_color') : '';
		$widgettitlecolor  		  = fitzone_opt('fitzone_footer_widget_title_color');
		$footerwanchorcolor 	  = fitzone_opt('fitzone_footer_widget_anchor_color') != '#fa0347' ? fitzone_opt('fitzone_footer_widget_anchor_color') : '';
		$footerwanchorhovcolor    = fitzone_opt('fitzone_footer_widget_anchor_hover_color');
		$footerwsubboxshadowcolor = fitzone_opt('fitzone_footer_subs_btn_hvr_color');
		$themeColorDef 			  = fitzone_opt( 'fitzone_theme_color' );

		$customcss ="
			.hero-banner{
				{$header_bg_img}
			}
			
			.menu_btn .btn_2{
				background: {$getStrtBtnColor};
				border-color: {$getStrtBtnColor};
			}
			.menu_btn .btn_2:hover{
				background: {$getStrtBtnHrvColor};
			}
			.blog_right_sidebar .single_sidebar_widget.widget_fitzone_newsletter .btn{
				background: {$themeColorDef}
			}
			.btn_2
			{
				border-color: {$buttonBorderColor};
			}

			.blog_part .single-home-blog .card h5:hover, .blog_part .single-home-blog .card ul li i
			{
				color: {$themeColor}
			}			
			.banner_part .banner_text .banner_text_iner h2, .section_tittle > p:first-child, .blog_part .single-home-blog .card .card-body a:hover, .pre_icon a:hover, .next_icon a:hover, .banner-breadcrumb > ol > li.breadcrumb-item > a.bread-link:hover, .banner-breadcrumb .breadcrumb-item a:hover, .blog_details a:hover, .blog_right_sidebar .widget_categories ul li:hover, .blog_right_sidebar .widget_categories ul li:hover a, .blog_right_sidebar .widget_categories ul li a:hover, .team_member_section .single_blog_img .social_icon a:hover, .team_member_section .single_blog_text h3 a:hover, .about_us .single_feature_item h3 a:hover, .blog_area a h2:hover{
				color: {$themeColor}!important;
			}

			.btn_1, .review_part .intro_video_bg .video-play-button, .review_part .owl-prev span:after, .review_part .owl-next span:after, .review_part .intro_video_bg .video-play-button:after, .review_part .intro_video_bg .video-play-button:before, .review_part .intro_video_bg .video-play-button:hover:after, .blog_item_img .blog_item_date, .button, .single_sidebar_widget .tagcloud a:hover, .blog_right_sidebar .single_sidebar_widget.widget_fitzone_newsletter .btn, .pre_icon :after, .next_icon :after, .review_part .owl-dots button.owl-dot.active, .calculate_part [type=\"radio\"]:checked + .wpcf7-list-item-label:after
			{
				background: {$themeColor}
			}

			.service_part .single_service_part:hover .single_service_part_iner span
			{
				background: {$themeColor}!important;
			}

			.btn_2:hover,
			.copyright_part .footer-social a:hover
			{
				background: {$hoverColor}!important;
			}

			.blog_part .single-home-blog .card h5:hover
			{
				color: {$hoverColor};
			}

			.about_part .about_img h2:after, .copyright_part .footer-social a
			{
				border-color: {$themeColor}
			}
			.btn_1:hover {
				box-shadow: 0px 10px 30px {$boxShadowColor};
			}


			.sub_header{
				background: {$headerTop_bg}
			}
			.sub_header .sub_header_social_icon a,
			.sub_header .sub_header_social_icon .register_icon
			{
				color: {$headerTop_col}
			}

			.menu_fixed:after
			{
				background: {$headerBg};
			}
			.main_menu .main-menu-item ul li a
			{
			   color: {$menuColor}!important;
			}
			.main_menu .main-menu-item ul li a:hover
			{
			   color: {$menuHoverColor}!important;
			}
			
			.dropdown .dropdown-menu .dropdown-item
			{
			   color: {$dropMenuColor}!important;
			}
			.dropdown .dropdown-menu .dropdown-item:hover
			{
			   color: {$dropMenuHovColor}!important;
			}

			.footer-area {
				background-color: {$footerwbgColor};
			}

			.footer-area .single-footer-widget p, .footer-area .widget_fitzone_newsletter .input-group input, .footer-area .copyright_part_text p, .footer-area .single-footer-widget ul li a, .footer-area .copyright_social_icon a
			{
				color: {$footerwTextColor}
			}
			.footer-area .widget_fitzone_newsletter .input-group, .footer-area .copyright_part_text {
				border-color: {$footerwTextColor}
			}
			.footer-area .single-footer-widget h4, .footer-area .contact_info p strong
			{
				color: {$widgettitlecolor}
			}

			.footer-area .btn:hover{
				box-shadow: 0px 10px 20px 0px {$footerwsubboxshadowcolor};
			}
			.footer-area .copyright_part_text .footer-text a{
				color: {$footerwanchorcolor};
			}
			.footer-area .btn{
				background: {$footerwanchorcolor};
			}
			.footer-area .copyright_part_text a:hover, .footer-area .single-footer-widget ul li a:hover, .footer-area .footer_2 .social_icon a:hover
			{
			   color: {$footerwanchorhovcolor}!important;
			}

        ";
       
    wp_add_inline_style( 'fitzone-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'fitzone_common_custom_css', 50 );