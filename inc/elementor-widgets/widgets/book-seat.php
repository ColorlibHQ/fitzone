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
class Fitzone_Book_Seat extends Widget_Base {

	public function get_name() {
		return 'fitzone-book-seat';
	}

	public function get_title() {
		return __( 'Book A Seat', 'fitzone' );
	}

	public function get_icon() {
		return 'eicon-click';
	}

	public function get_categories() {
		return [ 'fitzone-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'book_section',
            [
                'label' => __( 'Book A Seat Section', 'fitzone' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'fitzone' ),
                'description'   => __( "Use < span> tag for color and italic word", "fitzone" ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>Book your seat!</h2><p>Firmament their creepeth bearing every have bearing without fly tree one Deep is void days bearing in night after own of</p>', 'fitzone' )
            ]
        );

        $this->add_control(
            'book_form',
            [
                'label'         => esc_html__( 'Paste the booking form shortcode', 'fitzone' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section(); // End content


        /**
         * Style Tab
         * ------------------------------ Color Settings ------------------------------
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
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .calculate_part .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'section_txt_color', [
				'label'     => __( 'Section Title Short Text Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .calculate_part .section_tittle p' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .calculate_part',
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
                'selector' => '{{WRAPPER}} .regervation_part_iner .regerv_btn .btn_2',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings       = $this->get_settings();
        $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $book_form = !empty( $settings['book_form'] ) ? $settings['book_form'] : '';
    ?>

    <!--::calculate_part start::-->
    <section class="calculate_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xl-5">
                    <div class="section_tittle">
                        <?php
                            // Section Title =============
                            if( $sec_title ){
                                echo wp_kses_post( wpautop( $sec_title ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="regervation_part_iner">
                        <?php echo do_shortcode( $book_form )?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::calculate_part end::-->     
    <?php

    }
	
}
