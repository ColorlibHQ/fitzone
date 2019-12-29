<?php
namespace Fitzoneelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
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
 * Fitzone elementor Team Member section widget.
 *
 * @since 1.0
 */
class Fitzone_Courses extends Widget_Base {

	public function get_name() {
		return 'fitzone-courses';
	}

	public function get_title() {
		return __( 'Courses', 'fitzone' );
	}

	public function get_icon() {
		return 'eicon-time-line';
	}

	public function get_categories() {
		return [ 'fitzone-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Course Section ------------------------------
        $this->start_controls_section(
            'course_heading',
            [
                'label' => __( 'Course Heading', 'fitzone' ),
            ]
        );
        $this->add_control(
            'course_header',
            [
                'label'         => esc_html__( 'Course Header', 'fitzone' ),
                'description'   => esc_html__('Use <br> tag for line break', 'fitzone'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>best Courses</p><h2>Why you Join with us</h2>
                <span>Stars fowl deep she greater bearing to seed dont is let you\'re appear first thing saying it years abundantly fowl tree you shall also</span>', 'fitzone' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Courses content ------------------------------
		$this->start_controls_section(
			'courses_block',
			[
				'label' => __( 'Courses', 'fitzone' ),
			]
		);
		$this->add_control(
            'courses_content', [
                'label' => __( 'Create Course', 'fitzone' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'      => 'image',
                        'label'     => __( 'Select Image', 'fitzone' ),
                        'type'      => Controls_Manager::MEDIA
                    ],
                    [
                        'name'  => 'title',
                        'label' => __( 'Title', 'fitzone' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Fitness Training', 'fitzone' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Details', 'fitzone' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Fly replenish dominion evening make veriety of ', 'fitzone' )
                    ],
                    [
                        'name'      => 'course_url',
                        'label'     => __( 'Course URL', 'fitzone' ),
                        'type'      => Controls_Manager::URL,
                        'default'   => [
                            'url'   => '#'
                        ]
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Courses content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
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
			'title_color', [
				'label'     => __( 'Title Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fa0347',
				'selectors' => [
					'{{WRAPPER}} .our_offer .section_tittle p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bigger_title', [
				'label'     => __( 'Bigger Title Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#2c3033',
				'selectors' => [
					'{{WRAPPER}} .our_offer .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'section_txt_color', [
				'label'     => __( 'Section Title Short Text Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#666666',
				'selectors' => [
					'{{WRAPPER}} .our_offer .section_tittle p:last-child' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .our_offer',
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
                'selector' => '{{WRAPPER}} .our_offer .single_offer_part .single_offer .hover_text .offer_btn:after',
            ]
        );
        $this->end_controls_section();
	}

	protected function render() {

    $settings = $this->get_settings();
    $course_header   = !empty( $settings['course_header'] ) ? $settings['course_header'] : '';
    $courses_content = !empty( $settings['courses_content'] ) ? $settings['courses_content'] : '';
    ?>

    <!--::exclusive_item_part start::-->
    <section class="our_offer">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-5">
                    <div class="section_tittle">
                        <?php
                            // Course Header =============
                            if( $course_header ){
                                echo wp_kses_post( wpautop( $course_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <?php
                    if( is_array( $courses_content ) && count( $courses_content ) > 0 ){
                        foreach ( $courses_content as $course ) {
                            $image      = !empty( $course['image']['id'] ) ? wp_get_attachment_image( $course['image']['id'], 'fitzone_courses_img_480x609', false, array( 'alt' => 'course image' ) ) : '';
                            $title      = !empty( $course['title'] ) ? $course['title'] : '';
                            $desc       = !empty( $course['desc'] ) ? $course['desc'] : '';
                            $course_url = !empty( $course['course_url']['url'] ) ? $course['course_url']['url'] : '';
                    ?>
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <?php
                                if( $image ){
                                    echo wp_kses_post( $image );
                                }
                            ?>
                            <div class="hover_text">
                                <?php
                                    //Header ==============
                                    if( $title ){
                                        echo '<h2>'.esc_html( $title ).'</h2>';
                                    }

                                    //Details ==============
                                    if( $desc ){
                                        echo wp_kses_post( wpautop( $desc ) );
                                    }

                                    // Button =============
                                    if( $course_url ){
                                        echo '<a class="offer_btn" href="'. esc_url( $course_url ) .'"><span class="flaticon-slim-right"></span></a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </section>
    <!--::course end::-->
    <?php
    }
}
