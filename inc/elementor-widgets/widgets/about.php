<?php
namespace Fitzoneelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Fitzone elementor section widget.
 *
 * @since 1.0
 */
class Fitzone_About extends Widget_Base {

	public function get_name() {
		return 'fitzone-about';
	}

	public function get_title() {
		return __( 'About', 'fitzone' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'fitzone-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Awesome Feature content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'Awesome Feature Title Section', 'fitzone' ),
			]
		);
        
        $this->add_control(
			'about_img',
			[
				'label'         => esc_html__( 'Select Image', 'fitzone' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
		);
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'fitzone' ),
                'description'   => esc_html__('Use <br> tag for line break', 'fitzone'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Awesome feature</p>
                <h2>Why you Join with us</h2><span>Stars fowl deep she greater bearing to seed dont is let you\'re appear first thing saying it years abundantly fowl tree you shall also</span>', 'fitzone' )
            ]
        );
        $this->end_controls_section(); // End about content
        

        // ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'feature_label_content',
			[
				'label' => __( 'Featured Content Setting', 'fitzone' ),
			]
        );
        
        $this->add_control(
            'feature_contents', [
                'label' => __( 'Create New item, Note: The theme doesn\'t support more than 4 items.', 'fitzone' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'      => 'icon_img',
                        'label'     => __( 'Select Icon', 'fitzone' ),
                        'type'      => Controls_Manager::ICON,
                        'default'   => 'flaticon-footwear',
                        'options'   => fitzone_themify_icon()
                    ],
                    [
                        'name'  => 'title',
                        'label' => __( 'Title', 'fitzone' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Qualified Instructor', 'fitzone' ),
                    ],
                    [
                        'name'  => 'title_url',
                        'label' => __( 'Title URL', 'fitzone' ),
                        'type'  => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url'   => '#'
                        ]
                    ],
                    [
                        'name'  => 'text',
                        'label' => __( 'Second Line', 'fitzone' ),
                        'type'  => Controls_Manager::WYSIWYG,
                        'label_block' => true,
                        'default' => __( 'Stars fowl deep she greater bearing to seed dont is let you\'re appear first thing saying it years abundantly fowl tree you shall', 'fitzone' ),
                    ]
                    
                ]
            ]
        );
        
        $this->end_controls_section(); // End about content

        // Color Settings ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Color Settings', 'fitzone' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'title_color', [
				'label'     => __( 'Title Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fa0347',
				'selectors' => [
					'{{WRAPPER}} .about_us .section_tittle p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bigger_title', [
				'label'     => __( 'Bigger Title Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#2c3033',
				'selectors' => [
					'{{WRAPPER}} .about_us .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'section_txt_color', [
				'label'     => __( 'Section Title Short Text Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#666666',
				'selectors' => [
					'{{WRAPPER}} .about_us .section_tittle p:last-child' => 'color: {{VALUE}}',
				],
			]
        );
        $this->end_controls_section();

        // Item Icon Background Color Style ==============================
        $this->start_controls_section(
            'item_icon_bg_sec', [
                'label' => __( 'Items Icon Background Color Settings', 'fitzone' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item_icon_bg',
                'label' => __( 'Item Background Color', 'fitzone' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .about_us .single_feature_item .feature_item_icon span',
            ]
        );
        $this->end_controls_section();
	}

	protected function render() {
        $settings           = $this->get_settings();
        $content            = !empty( $settings['content'] ) ? $settings['content'] : '';
        $feature_contents   = !empty( $settings['feature_contents'] ) ? $settings['feature_contents'] : '';

		$feature_img  = !empty( $settings['about_img']['id'] ) ? wp_get_attachment_image( $settings['about_img']['id'], 'fitzone_about_section_550x690', false, array( 'alt' => 'about image' ) ) : '';
        $icon_path_1 = FITZONE_DIR_ASSETS_URI .'img/animate_icon/icon_1.png';
        $icon_path_2 = FITZONE_DIR_ASSETS_URI .'img/animate_icon/icon_2.png';
        $icon_path_3 = FITZONE_DIR_ASSETS_URI .'img/animate_icon/icon_3.png';
        $icon_path_4 = FITZONE_DIR_ASSETS_URI .'img/animate_icon/icon_4.png';
        $icon_path_5 = FITZONE_DIR_ASSETS_URI .'img/animate_icon/icon_5.png';
        ?>

    <!-- about part start-->
    <section class="about_us section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    <div class="section_tittle">
                        <?php
                            //Content ==============
                            if( $content ){
                                echo wp_kses_post( wpautop( $content ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="our_feature">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    if( is_array( $feature_contents ) && count( $feature_contents ) > 0 ){  
                                        for ($i=0; $i < 2; $i++) {
                                        ?>
                                        <div class="single_feature_item">
                                            <div class="feature_item_icon">
                                                <span class="<?php echo esc_attr($feature_contents[$i]['icon_img']);?>"></span>
                                            </div>
                                            <h3><a href="<?php echo esc_url($feature_contents[$i]['title_url']['url']); ?>"><?php echo esc_html($feature_contents[$i]['title']);?></a></h3>
                                            <?php echo wp_kses_post( wpautop( $feature_contents[$i]['text'] ) );?>
                                        </div>
                                        <?php
                                        }
                                    }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about_img">
                        <?php
                            if( $feature_img ){
                                echo wp_kses_post( $feature_img );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="our_feature">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    if( is_array( $feature_contents ) && count( $feature_contents ) > 1 ){
                                        for ($i=2; $i < 4; $i++) {
                                        ?>
                                        <div class="single_feature_item">
                                            <div class="feature_item_icon">
                                                <span class="<?php echo esc_attr($feature_contents[$i]['icon_img']);?>"></span>
                                            </div>
                                            <h3><a href="<?php echo esc_url($feature_contents[$i]['title_url']['url']);?>"><?php echo esc_html( $feature_contents[$i]['title'] )?></a></h3>
                                            <?php echo wp_kses_post( wpautop( $feature_contents[$i]['text'] ) );?>
                                        </div>
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay_icon">
            <img src="<?php echo esc_url( $icon_path_1 );?>" class="amitated_icon_1" alt="animated icon 1">
            <img src="<?php echo esc_url( $icon_path_2 );?>" class="amitated_icon_2" alt="animated icon 2">
            <img src="<?php echo esc_url( $icon_path_3 );?>" class="amitated_icon_3" alt="animated icon 3">
            <img src="<?php echo esc_url( $icon_path_4 );?>" class="amitated_icon_4" alt="animated icon 4">
            <img src="<?php echo esc_url( $icon_path_5 );?>" class="amitated_icon_5" alt="animated icon 5">
        </div>
    </section>
    <!--::about part end::-->
    <?php

    }

}
