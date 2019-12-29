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
 * Fitzone elementor section widget.
 *
 * @since 1.0
 */
class Fitzone_Testimonial extends Widget_Base {

	public function get_name() {
		return 'fitzone-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'fitzone' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'fitzone-elements' ];
	}

	protected function _register_controls() {

        // Testimonial Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'fitzone' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'fitzone' ),
                'description'   => __( "Use < span> tag for color and italic word", "fitzone" ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Testimonials</p><h2>happy customer says</h2><p>Stars fowl deep she greater bearing to seed dont is let you\'re appear first thing saying it years abundantly fowl tree you shall also</p>', 'fitzone' )
            ]
        );
        
		$this->end_controls_section(); 


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'fitzone' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'fitzone' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name'  => 'client_img',
                        'label' => __( 'Client Image', 'fitzone' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'client_name',
                        'label' => __( 'Client Name', 'fitzone' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Mosan Cameron', 'fitzone' )
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'fitzone' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Executive of fedex', 'fitzone' )
                    ],
                    [
                        'name'  => 'ratings',
                        'label' => __( 'Rating Count', 'fitzone' ),
                        'type'  => Controls_Manager::SELECT,
                        'label_block' => true,
                        'default' => '4',
                        'options' => [
                            '1'   => 'One Star',
                            '2'   => 'Two Star',
                            '3'   => 'Three Star',
                            '4'   => 'Four Star',
                            '5'   => 'Five Star',
                        ]
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'fitzone' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Bring and. She\'d upon evening good land under subdue sixth subdue god over spirit fishe the live on above may fish divided itself living very lesser herb his can\'t shall his fowl bring. And She\'d upon evening good land under subdue sixth very', 'fitzone')
                    ],                    
                ],
            ]
		);

		$this->end_controls_section(); // End Customers review content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
        
        
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
					'{{WRAPPER}} .review_part .section_tittle p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bigger_title', [
				'label'     => __( 'Bigger Title Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#2c3033',
				'selectors' => [
					'{{WRAPPER}} .review_part .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'section_txt_color', [
				'label'     => __( 'Section Title Short Text Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#666666',
				'selectors' => [
					'{{WRAPPER}} .review_part .section_tittle p:last-child' => 'color: {{VALUE}}',
				],
			]
        );
        $this->end_controls_section();


        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'fitzone' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Section Background Settings', 'fitzone' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'intro-video-section-bg',
                'label' => __( 'Section Background', 'fitzone' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .review_part',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
	$sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $reviews = !empty( $settings['review_slider'] ) ? $settings['review_slider'] : '';
    $icon_6 = FITZONE_DIR_ANIMATED_ICON_IMG_URI . 'icon_6.png';
    ?>

    <!--::review_part start::-->
    <section class="review_part gray_bg section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    <div class="section_tittle">
                        <?php
                            // Review Header =============
                            if( $sec_title ){
                                echo wp_kses_post( wpautop( $sec_title ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="client_review_part owl-carousel">
                        <?php
                        if( is_array( $reviews ) && count( $reviews ) > 0 ){
                            foreach ($reviews as $review ) {
                                $image = !empty( $review['client_img']['id'] ) ? wp_get_attachment_image( $review['client_img']['id'], 'fitzone_review_client_image_310x338', '', array('alt' => $review['client_name'] ) ) : '';
                                $client_name = !empty( $review['client_name'] ) ? $review['client_name'] : '';
                                $designation = !empty( $review['designation'] ) ? $review['designation'] : '';
                                $ratings = !empty( $review['ratings'] ) ? $review['ratings'] : '';
                                $desc    = !empty( $review['desc'] ) ? $review['desc'] : '';
                            ?>
                        <div class="client_review_single media">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <div class="client_img align-self-center">
                                        <?php
                                            if( $image ){
                                                echo wp_kses_post( $image );
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="client_review_text media-body">
                                        <?php
                                            // Client Name & Designation ---------------
                                            if( $client_name ){
                                                echo '<h4>'. esc_html( $client_name ).
                                                '<span>'.esc_html( $designation ) . '</span></h4>';
                                            }

                                            // Client Ratings ---------------
                                            echo fitzone_rating_function( $ratings );
                                            
                                            // Review Details =============
                                            if( $desc ){
                                                echo wp_kses_post( wpautop( $desc ) );
                                            }
                                        ?>
                                    </div>
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
        </div>
        <div class="overlay_icon">
            <img src="<?php echo $icon_6?>" class="amitated_icon_6" alt="animate_icon">
        </div>
    </section>
    <!--::review_part end::-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $(document).ready(function() {
                var review = $('.client_review_part');
                if (review.length) {
                    review.owlCarousel({
                    items: 1,
                    loop: true,
                    dots: true,
                    autoplay: true,
                    autoplayHoverPause: true,
                    autoplayTimeout: 5000,
                    nav: false,
                    });
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
