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
class Fitzone_Email_Subscription extends Widget_Base {

	public function get_name() {
		return 'fitzone-email-subscription';
	}

	public function get_title() {
		return __( 'Email Subscription', 'fitzone' );
	}

	public function get_icon() {
		return 'eicon-mailchimp';
	}

	public function get_categories() {
		return [ 'fitzone-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'email_subscription_section',
            [
                'label' => __( 'Email Subscription Section', 'fitzone' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'fitzone' ),
                'description'   => __( "Use < span> tag for color and italic word", "fitzone" ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h1>Start 15 days free trial</h1><p>Deep saw bearing seasons in two itself days hath</p>', 'fitzone' )
            ]
        );
        $this->add_control(
            'action_url',
            [
                'label'         => esc_html__( 'Action URL', 'fitzone' ),
                'type'          => Controls_Manager::URL,
                'description'   => esc_html( 'Enter here your MailChimp action URL.', 'fitzone' ),
                'label_block'   => true,
                'default'       => [
                    'url'       => 'https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01'
                ]
            ]
        );
        $this->add_control(
            'btn_lbl',
            [
                'label'         => esc_html__( 'Button Label', 'fitzone' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html( 'Subscribe', 'fitzone' ),
                'label_block'   => true,
            ]
        );

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        // Color Settings ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Color Settings', 'fitzone' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'bigger_title', [
				'label'     => __( 'Bigger Title Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#2c3033',
				'selectors' => [
					'{{WRAPPER}} .sibscribe-area h1' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'section_txt_color', [
				'label'     => __( 'Section Title Short Text Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#888888',
				'selectors' => [
					'{{WRAPPER}} .sibscribe-area .sibscribe-text p' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .sibscribe-area',
            ]
        );
        $this->end_controls_section();

        // Subscription Button Background Style ==============================
        $this->start_controls_section(
            'subs_btn_bg_sec', [
                'label' => __( 'Style Button Background', 'fitzone' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'subs_btn_bg',
                'label' => __( 'Subscription Button Background', 'fitzone' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .sibscribe-area .sibscribe-form .sibscribe-btm',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings   = $this->get_settings();
        $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $btn_lbl    = !empty( $settings['btn_lbl'] ) ? $settings['btn_lbl'] : '';
        $action_url = !empty( $settings['action_url']['url'] ) ? $settings['action_url']['url'] : '';
    ?>

    <!--:::::::::::sibscribe part start:::::::::::::-->
    <section class="sibscribe-area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="sibscribe-text text-center">
                        <?php
                            // Section Title =============
                            if( $sec_title ){
                                echo wp_kses_post( wpautop( $sec_title ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <form class="sibscribe-form" action="<?php echo esc_url( $action_url )?>" method="post" target="_blank">
                        <input type="email" name="EMAIL" class="form-control" id="exampleInputEmail11"  placeholder='Enter Email Address'
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address'">
                        <button type="submit" class="btn_2 sibscribe-btm"><?php echo esc_html( $btn_lbl )?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--:::::::::::sibscribe part end:::::::::::::-->      
    <?php

    }
	
}
