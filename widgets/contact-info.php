<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Class TRAD_ContactInfo
 *
 * Elementor widget for displaying contact information.
 *
 * @since 1.0.0
 */
class TRAD_ContactInfo extends Widget_Base {

    public function get_name() {
        return 'trad-contact-info';
    }

    public function get_title() {
        return esc_html__( 'Contact Info', 'turbo-addons-elementor' );
    }

    public function get_icon() {
        return 'eicon-table-of-contents';
    }
    

    public function get_categories() {
        return [ 'turbo-addons' ];
    }

    public function get_keywords() {
        return [ 'Contact', 'turbo', 'info' ];
    }

    protected function register_controls() {

        // Contact Info Section
        $this->start_controls_section(
            'contact_content',
            [
                'label' => esc_html__( 'Contact Info', 'turbo-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_title',
            [
                'label'       => esc_html__( 'Title', 'turbo-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter Title', 'turbo-addons-elementor' ),
                'default'     => esc_html__( 'Dhaka Office', 'turbo-addons-elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_address',
            [
                'label'       => esc_html__( 'Address', 'turbo-addons-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 3,
                'placeholder' => esc_html__( 'Enter Contact Address', 'turbo-addons-elementor' ),
                'default'     => esc_html__( 'House, Road, Area, Block, Bangladesh.', 'turbo-addons-elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_email_one',
            [
                'label'       => esc_html__( 'Email ID', 'turbo-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter Email ID', 'turbo-addons-elementor' ),
                'default'     => esc_html__( 'example@example.com', 'turbo-addons-elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_email_two',
            [
                'label'       => esc_html__( 'Secondary Email ID', 'turbo-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter Secondary Email ID', 'turbo-addons-elementor' ),
                'default'     => esc_html__( 'example@example.com', 'turbo-addons-elementor' ),
                'label_block' => true,
            ]
        );

        // Repeater for phone numbers
        $repeater = new Repeater();

        $repeater->add_control(
            'contact_phone',
            [
                'label'       => esc_html__( 'Phone Number', 'turbo-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter Phone Number', 'turbo-addons-elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_phones',
            [
                'label'       => esc_html__( 'Phone Numbers', 'turbo-addons-elementor' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ contact_phone }}}',
                'default'     => [
                    [
                        'contact_phone' => esc_html__( '017xxxxxxxx', 'turbo-addons-elementor' ),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Title Style Section
        $this->start_controls_section(
            'name_style',
            [
                'label' => esc_html__( 'Title', 'turbo-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__( 'Text Color', 'turbo-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-dm-contact-info__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'label'    => esc_html__( 'Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-dm-contact-info__title',
            ]
        );

        $this->end_controls_section();

        // Contact Info Style Section
        $this->start_controls_section(
            'info_style',
            [
                'label' => esc_html__( 'Contact Info', 'turbo-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'info_color',
            [
                'label'     => esc_html__( 'Color', 'turbo-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-dm-contact-info__list li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'info_typography',
                'label'    => esc_html__( 'Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-dm-contact-info__list li',
            ]
        );

        $this->end_controls_section();

        // Contact Container Style Section
        $this->start_controls_section(
            'contact_container_style',
            [
                'label' => esc_html__( 'Contact Container', 'turbo-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'contact_bg_color',
            [
                'label'     => esc_html__( 'Background Color', 'turbo-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-dm-contact-info' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'contact_border',
                'label'    => esc_html__( 'Border', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-dm-contact-info',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'contact_box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-dm-contact-info',
            ]
        );

        $this->add_control(
            'contact_padding',
            [
                'label'      => esc_html__( 'Padding', 'turbo-addons-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .trad-dm-contact-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'contact_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'turbo-addons-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .trad-dm-contact-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="trad-dm-contact-info">
            <!-- Title -->
            <?php if ( ! empty( $settings['contact_title'] ) ) : ?>
                <h3 class="trad-dm-contact-info__title">
                    <?php echo esc_html( $settings['contact_title'] ); ?>
                </h3>
            <?php endif; ?>
    
            <!-- Address -->
            <?php if ( ! empty( $settings['contact_address'] ) ) : ?>
                <p class="trad-dm-contact-info__address">
                    <?php echo nl2br( esc_html( $settings['contact_address'] ) ); ?>
                </p>
            <?php endif; ?>
    
            <!-- Emails -->
            <ul class="trad-dm-contact-info__list">
                <?php if ( ! empty( $settings['contact_email_one'] ) ) : ?>
                    <li class="trad-dm-contact-info__email">
                        <strong>Email:</strong> 
                        <a href="mailto:<?php echo esc_url( $settings['contact_email_one'] ); ?>">
                            <?php echo esc_html( $settings['contact_email_one'] ); ?>
                        </a>
                    </li>
                <?php endif; ?>
    
                <?php if ( ! empty( $settings['contact_email_two'] ) ) : ?>
                    <li class="trad-dm-contact-info__email">
                        <strong>Secondary Email:</strong> 
                        <a href="mailto:<?php echo esc_url( $settings['contact_email_two'] ); ?>">
                            <?php echo esc_html( $settings['contact_email_two'] ); ?>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
    
            <!-- Phone Numbers -->
            <?php if ( ! empty( $settings['contact_phones'] ) ) : ?>
                <ul class="trad-dm-contact-info__phones">
                    <?php foreach ( $settings['contact_phones'] as $phone ) : ?>
                        <?php if ( ! empty( $phone['contact_phone'] ) ) : ?>
                            <li class="trad-dm-contact-info__phone">
                                <strong>Phone:</strong> 
                                <a href="tel:<?php echo esc_url( $phone['contact_phone'] ); ?>">
                                    <?php echo esc_html( $phone['contact_phone'] ); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php
    }
}

// Register the widget with Elementor.
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_ContactInfo() );
