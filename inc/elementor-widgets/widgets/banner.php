<?php
namespace Fitzoneelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Fitzone elementor about us section widget.
 *
 * @since 1.0
 */
class Fitzone_Banner extends Widget_Base {

	public function get_name() {
		return 'fitzone-banner';
	}

	public function get_title() {
		return __( 'Banner', 'fitzone' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'fitzone-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Overlay Text', 'fitzone' ),
            ]
        );
        $this->add_control(
            'txt_first_word',
            [
                'label'         => esc_html__( 'Text First Word', 'fitzone' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Join ', 'fitzone' )
            ]
        );
        $this->add_control(
            'txt_sec_word',
            [
                'label'         => esc_html__( 'Text Second Word', 'fitzone' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'now', 'fitzone' )
            ]
        );
        $this->add_control(
            'txt_short',
            [
                'label'         => esc_html__( 'Text Short Brief', 'fitzone' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'get in shape today', 'fitzone' )
            ]
        );

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Banner Overlay Text Style', 'fitzone' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Title First Word Color', 'fitzone' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fa0347',
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_text_iner h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'suc_title_color', [
                'label'     => __( 'Title Second Word Color', 'fitzone' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .banner_text_iner h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'fitzone' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'fitzone' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings       = $this->get_settings();
        $txt_first_word = !empty( $settings['txt_first_word'] ) ? $settings['txt_first_word'] : 'Join ';
        $txt_sec_word   = !empty( $settings['txt_sec_word'] ) ? $settings['txt_sec_word'] : 'now';
        $txt_short      = !empty( $settings['txt_short'] ) ? $settings['txt_short'] : 'get in shape today';
    ?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <div class="banner_text text-center">
                        <div class="banner_text_iner">
                            <?php
                                echo '<h2>' . esc_html($txt_first_word) .'<span> '. esc_html($txt_sec_word) .'</span> </h2>';
                                echo '<p>' . esc_html($txt_short) .'</p>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part end-->      
    <?php

    }
	
}
