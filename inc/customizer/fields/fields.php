<?php 
/**
 * @Packge     : Fitzone
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/

 // Theme color field
Epsilon_Customizer::add_field(
    'fitzone_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'fitzone' ),
        'description' => esc_html__( 'Select the theme color.', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_general_section',
        'default'     => '#fa0347',
    )
);

 // Theme color field
Epsilon_Customizer::add_field(
    'fitzone_theme_box_shadow_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Box Color', 'fitzone' ),
        'description' => esc_html__( 'Select the theme color.', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_general_section',
        'default'     => 'rgba(190, 0, 88, 0.5)',
    )
);

 
// Header background color field
Epsilon_Customizer::add_field(
    'fitzone_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header BG Color', 'fitzone' ),
        'description' => esc_html__( 'Select the header background color.', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_header_section',
        'default'     => 'rgba(43, 27, 52, 0.8)',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'fitzone_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_header_section',
        'default'     => '#fff',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'fitzone_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_header_section',
        'default'     => '#fa0347',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'fitzone_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_header_section',
        'default'     => '#000',
    )
);

// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'fitzone_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_header_section',
        'default'     => '#fa0347',
    )
);

// Header right button toggle section
Epsilon_Customizer::add_field(
    'fitzone_header_button_section_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header right button toggle Section', 'fitzone' ),
        'section'     => 'fitzone_header_section',

    )
);


// Header right button toggle
Epsilon_Customizer::add_field(
	'fitzone_header_right_button',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Header right button show/hide', 'fitzone' ),
		'section'     => 'fitzone_header_section',
		'default'     => true
	)
);

// Header right button toggle
Epsilon_Customizer::add_field(
	'fitzone_header_right_button_lbl',
	array(
		'type'              => 'text',
		'label'             => esc_html__( 'Header right button label', 'fitzone' ),
		'section'           => 'fitzone_header_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Get started', 'fitzone' ),
	)
);

// Header right button toggle
Epsilon_Customizer::add_field(
	'fitzone_header_right_button_url',
	array(
		'type'              => 'url',
		'label'             => esc_html__( 'Header right button URL', 'fitzone' ),
		'section'           => 'fitzone_header_section',
        'sanitize_callback' => 'esc_url_raw'
	)
);

// Header right button bg color field
Epsilon_Customizer::add_field(
    'fitzone_header_right_btn_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header right button bg color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_header_section',
        'default'     => '#fa0347'
    )
);

// Header right button hover bg color field
Epsilon_Customizer::add_field(
    'fitzone_header_right_btn_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header right button hover bg color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_header_section',
        'default'     => '#fa0347'
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'fitzone_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'fitzone' ),
        'description' => esc_html__( 'Set post excerpt length.', 'fitzone' ),
        'section'     => 'fitzone_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'fitzone_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'fitzone' ),
        'section'     => 'fitzone_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'fitzone_like_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Like Button show/hide', 'fitzone' ),
        'section'     => 'fitzone_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'fitzone_blog_share',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Share show/hide', 'fitzone' ),
        'section'     => 'fitzone_blog_section',
        'default'     => true
    )
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'fitzone_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'fitzone' ),
        'section'           => 'fitzone_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'fitzone_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'fitzone' ),
        'section'           => 'fitzone_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'fitzone_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'fitzone_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'fitzone_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'fitzone' ),
        'section'     => 'fitzone_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'fitzone_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'fitzone' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'fitzone' ),
        'section'     => 'fitzone_footer_section',
        'default'     => true,
    )
);

// Footer Copyright section
Epsilon_Customizer::add_field(
    'fitzone_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'fitzone' ),
        'section'     => 'fitzone_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'fitzone' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'fitzone_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'fitzone' ),
        'section'     => 'fitzone_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);


// Footer social icons
Epsilon_Customizer::add_field(
    'fitzone_footer_social_icons_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer Social Icons show/hide', 'fitzone' ),
        'description' => esc_html__( 'Toggle to display footer Social Icons.', 'fitzone' ),
        'section'     => 'fitzone_footer_section',
        'default'     => true,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'fitzone_footer_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'fitzone_footer_section',
		'label'        => esc_html__( 'Social Profile Links', 'fitzone' ),
		'button_label' => esc_html__( 'Add new social link', 'fitzone' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
		),
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'fitzone' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'fitzone' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'fitzone' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),
			
		),
	)
);


// Footer widget background color field
Epsilon_Customizer::add_field(
    'fitzone_footer_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_footer_section',
        'default'     => '#080a19',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'fitzone_footer_widget_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'fitzone_footer_widget_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_footer_section',
        'default'     => '#ffffff',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'fitzone_footer_widget_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_footer_section',
        'default'     => '#fa0347',
    )
);

// Footer widget subscription button hover shadow color field
Epsilon_Customizer::add_field(
    'fitzone_footer_subs_btn_hvr_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer subscription button hover shadow Color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_footer_section',
        'default'     => 'rgba(250, 22, 61, 0.3)',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'fitzone_footer_widget_anchor_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'fitzone' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fitzone_footer_section',
        'default'     => '#fa0347',
    )
);

