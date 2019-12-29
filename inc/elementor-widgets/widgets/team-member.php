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
class Fitzone_Team_Member extends Widget_Base {

	public function get_name() {
		return 'fitzone-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'fitzone' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'fitzone-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Team Section ------------------------------
        $this->start_controls_section(
            'team_heading',
            [
                'label' => __( 'Team Heading', 'fitzone' ),
            ]
        );
        $this->add_control(
            'team_header',
            [
                'label'         => esc_html__( 'Team Header', 'fitzone' ),
                'description'   => esc_html__('Use <br> tag for line break', 'fitzone'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>our team</p><h2>Meet with trainers</h2><p>Stars fowl deep she greater bearing to seed dont is let you\'re appear first thing saying it years abundantly fowl tree you shall also</p>', 'fitzone' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Teams content ------------------------------
		$this->start_controls_section(
			'teams_block',
			[
				'label' => __( 'Teams', 'fitzone' ),
			]
		);
		$this->add_control(
            'teams_content', [
                'label' => __( 'Create Team', 'fitzone' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ teammate_name }}}',
                'fields' => [
                    [
                        'name'  => 'image',
                        'label' => __( 'Member Image', 'fitzone' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'teammate_name',
                        'label' => __( 'Name', 'fitzone' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Jhosef Williams', 'fitzone' )
                    ],
                    [
                        'name'      => 'desg',
                        'label'     => __( 'Designation', 'fitzone' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'Web developer', 'fitzone' )
                    ],
                    [
                        'name'      => 'fb',
                        'label'     => __( 'Facebook URL', 'fitzone' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'tw',
                        'label'     => __( 'Twitter URL', 'fitzone' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'ins',
                        'label'     => __( 'Instagram URL', 'fitzone' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'skp',
                        'label'     => __( 'Skype URL', 'fitzone' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Teams content

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
			'color_title', [
				'label'     => __( 'Title Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fa0347',
				'selectors' => [
					'{{WRAPPER}} .team_member_section .section_tittle p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bigger_title', [
				'label'     => __( 'Bigger Title Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#2c3033',
				'selectors' => [
					'{{WRAPPER}} .team_member_section .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'section_txt_color', [
				'label'     => __( 'Section Title Short Text Color', 'fitzone' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#666666',
				'selectors' => [
					'{{WRAPPER}} .team_member_section .section_tittle p:last-child' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .team_member_section',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $team_header = !empty( $settings['team_header'] ) ? $settings['team_header'] : '';
    $teams = !empty( $settings['teams_content'] ) ? $settings['teams_content'] : '';
    ?>

    <!--::team start::-->
    <section class="team_member_section section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    <div class="section_tittle">
                        <?php
                            // Team Header =============
                            if( $team_header ){
                                echo wp_kses_post( wpautop( $team_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <?php
                if( is_array( $teams ) && count( $teams ) > 0 ){
                    foreach ( $teams as $team ) {
                        $team_img   = !empty( $team['image']['id'] ) ? wp_get_attachment_image( $team['image']['id'], 'fitzone_team_img_360x441', false, array( 'alt' => $team['teammate_name'] ) ) : '';
                        $name       = !empty( $team['teammate_name'] ) ? $team['teammate_name'] : '';
                        $desig      = !empty( $team['desg'] ) ? $team['desg'] : '';
                        $fb         = !empty( $team['fb']['url'] ) ? $team['fb']['url'] : '';
                        $tw         = !empty( $team['tw']['url'] ) ? $team['tw']['url'] : '';
                        $ins        = !empty( $team['ins']['url'] ) ? $team['ins']['url'] : '';
                        $skp        = !empty( $team['skp']['url'] ) ? $team['skp']['url'] : '';
                ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <?php
                                if( $team_img ){
                                    echo wp_kses_post( $team_img );
                                }
                            ?>
                            <div class="social_icon">
                                <ul>
                                    <li><a href="<?php echo esc_url( $fb );?>"><i class="ti-facebook"></i></a></li>
                                    <li><a href="<?php echo esc_url( $tw );?>"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="<?php echo esc_url( $ins );?>"><i class="ti-instagram"></i></a></li>
                                    <li><a href="<?php echo esc_url( $skp );?>"><i class="ti-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single_blog_text">
                            <h3><a href="<?php echo esc_url( $fb );?>"><?php echo esc_html( $name );?></a></h3>
                            <p><?php echo esc_html( $desig );?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!--::team end::-->
    <?php
    }
}
