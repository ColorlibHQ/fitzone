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
class Fitzone_Intro_Video extends Widget_Base {

	public function get_name() {
		return 'fitzone-intro-video';
	}

	public function get_title() {
		return __( 'Intro Video', 'fitzone' );
	}

	public function get_icon() {
		return 'eicon-video-camera';
	}

	public function get_categories() {
		return [ 'fitzone-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Intro Video content ------------------------------
		$this->start_controls_section(
			'intro_video_content',
			[
				'label' => __( 'Intro Video Section', 'fitzone' ),
			]
		);
        
        $this->add_control(
			'left_img',
			[
				'label'         => esc_html__( 'Left Image', 'fitzone' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
		);
        $this->add_control(
			'shade_img',
			[
				'label'         => esc_html__( 'Shade Image', 'fitzone' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
        );
        $this->add_control(
            'int_vid_url',
            [
                'label'         => esc_html__( 'Intro Video Url', 'fitzone' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false,
                'default'       => [
                    'url'       => 'https://www.youtube.com/watch?v=pBFQdxA-apI'
                ]
            ]
        );
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Right Text', 'fitzone' ),
                'description'   => esc_html__('Use <br> tag for line break', 'fitzone'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>Make yourself <br> stronger than your excuses</h2><p>Creature moveth behold darkness that fill very and don\'t. Together one Living rule. Saying you\'re light called years i be beast bring tree don herb evening the called tree green of</p>', 'fitzone' )
            ]
        );

        $this->add_control(
            'icon_sec_heading',
            [
                'label'     => __( 'Listing Contents', 'fitzone' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'list_contents', [
                'label' => __( 'Create New', 'fitzone' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ text }}}',
                'fields' => [
                    [
                        'name'      => 'list_icon',
                        'label'     => __( 'Select Icon', 'fitzone' ),
                        'type'      => Controls_Manager::ICON,
                        'default'   => 'fa fa-pencil-square-o',
                        'options'   => fitzone_themify_icon()
                    ],
                    [
                        'name'  => 'text',
                        'label' => __( 'List Text', 'fitzone' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => __( 'Earth his there multiply she\'d one open made years called fill', 'fitzone' )
                    ],
                    
                ]
            ]
        );
        $this->add_control(
            'btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'fitzone' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Read More', 'fitzone' )
            ]
        );
        $this->add_control(
            'btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'fitzone' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false,
                'default'       => [
                    'url'       => '#'
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
				'default'   => '#2c3033',
				'selectors' => [
					'{{WRAPPER}} .extends_part .extends_member_text h2' => 'color: {{VALUE}};',
				],
			]
        );

		$this->add_control(
			'txt_color', [
				'label'     => __( 'Text Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#8a8a8a',
				'selectors' => [
					'{{WRAPPER}} .extends_part .extends_member_text p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .extends_part .extends_member_text ul li' => 'color: {{VALUE}};',
					'{{WRAPPER}} .extends_part .extends_member_text ul li span' => 'color: {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'fitzone' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'fitzone' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'fitzone' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .extends_part',
            ]
        );

        $this->end_controls_section();


        // Button Background Style ==============================
        $this->start_controls_section(
            'btn_bg_sec', [
                'label' => __( 'Button Background Color Settings', 'fitzone' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_bg',
                'label' => __( 'Button Background Color', 'fitzone' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .extends_part .extends_member_text .btn_2, .extends_part .extends_video .video-play-button:before, .extends_part .extends_video .video-play-button:after, .extends_part .extends_video .video-play-button, .extends_part .extends_video .video-play-button:hover:after',
            ]
        );

        $this->add_control(
            'section_box_shdw',
            [
                'label'     => __( 'Box Shadow color Settings', 'fitzone' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
			'box_shdw_color', [
				'label'     => __( 'Box Shdow Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(250, 22, 61, 0.3)',
				'selectors' => [
					'{{WRAPPER}} .extends_part .extends_member_text .btn_2:hover' => 'box-shadow: 0px 10px 20px {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();

	}

	protected function render() {
        $settings     = $this->get_settings();
		$left_img     = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'fitzone_intro_video_left_section_683x570', false, array( 'alt' => 'intro video left image' ) ) : '';
        $shade_img    = !empty( $settings['shade_img']['id'] ) ? wp_get_attachment_image_src( $settings['shade_img']['id'], 'fitzone_intro_video_right_section_426x517' ) : '';
        $int_vid_url  = !empty( $settings['int_vid_url']['url'] ) ? $settings['int_vid_url']['url'] : '';
        $right_text   = !empty( $settings['content'] ) ? $settings['content'] : '';
        $button_label = !empty( $settings['btnlabel'] ) ? $settings['btnlabel'] : '';
        $button_url   = !empty( $settings['btnurl']['url'] ) ? $settings['btnurl']['url'] : '';
        $shade_img_bg = !empty( $shade_img ) ? 'background-image: url('. esc_url($shade_img[0]) .')' : '';
        $list_contents= !empty( $settings['list_contents'] ) ? $settings['list_contents'] : '';
        ?>

    <!-- extends part start-->
    <section class="extends_part section_padding">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-5">
                    <div class="extends_img">
                        <?php
                            if( $left_img ){
                                echo wp_kses_post( $left_img );
                            }
                        ?>
                        <div class="extends_video" style="<?php echo $shade_img_bg?>">
                            <div class="intro_video_iner text-center d-flex align-items-center">
                                <div class="intro_video_icon">
                                    <a id="play-video_1" class="video-play-button popup-youtube"
                                        href="<?php echo esc_url( $int_vid_url )?>">
                                        <span class="ti-control-play"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="extends_member_text">
                        <?php
                            //Content ==============
                            if( $right_text ){
                                echo wp_kses_post( wpautop( $right_text ) );
                            }

                            //List Content ==============
                            if( is_array( $list_contents ) && count( $list_contents ) > 0 ){
                                echo '<ul>';
                                foreach ( $list_contents as $list_content ) {
                                    $list_icon = !empty( $list_content['list_icon'] ) ? $list_content['list_icon'] : '';
                                    $text = !empty( $list_content['text'] ) ? $list_content['text'] : '';
                                
                                    echo '<li><span class="'.esc_attr($list_icon).'"></span>'.esc_html($text).'</li>';
                                }
                                echo '</ul>';
                            }

                            // Button =============
                            if( $button_label ){
                                echo '<a class="btn_2" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro-video part end-->
    <?php

    }

}
