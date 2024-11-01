<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class TR_Accordion_Widget extends Widget_Base {

    public function get_name() {
        return 'trad-accordion';
    }

    public function get_title() {
        return esc_html__( 'Turbo Accordion', 'turbo-addons-elementor' );
    }

    public function get_icon() {
        return 'eicon-accordion'; // Using Elementor's default accordion icon
    }

    public function get_categories() {
        return [ 'turbo-addons' ];
    }

    protected function _register_controls() {
        // Title & Content Section
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__( 'Title & Content', 'turbo-addons-elementor' ),
            ]
        );

        // Define the Repeater
        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Accordion Title', 'turbo-addons-elementor' ),
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Accordion Content', 'turbo-addons-elementor' ),
            ]
        );

        // Add the Elementor Icons Manager control for the toggle icon
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-down', // Default to a down arrow
                    'library' => 'fa-solid',
                ],
            ]
        );

        // Icon Color
        $repeater->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .trad-accordion-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .trad-accordion-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 16,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-accordion-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .trad-accordion-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'accordion_items',
            [
                'label' => esc_html__( 'Accordion Items', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__( 'Website Design and Development', 'turbo-addons-elementor' ),
                        'content' => esc_html__( 'Content for Website Design and Development...', 'turbo-addons-elementor' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__( 'Title', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Background Color
        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Background Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1C3389',
                'selectors' => [
                    '{{WRAPPER}} .trad-accordion' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // Title Text Color
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .trad-accordion-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Title for accordion Content
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Title Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-accordion-title',
            ]
        );

        // Title Padding
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Title Padding', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '20',    // Default top padding
                    'right' => '20',  // Default right padding
                    'bottom' => '12', // Default bottom padding
                    'left' => '20',   // Default left padding
                    'unit' => 'px',   // Default unit
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-accordion-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Active Section
        $this->start_controls_section(
            'is_open_section',
            [
                'label' => esc_html__( 'Is Open', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'first_open',
            [
                'label' => esc_html__( 'First Item Open', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'turbo-addons-elementor' ),
                'label_off' => esc_html__( 'No', 'turbo-addons-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Content Background Color
        $this->add_control(
            'content_background_color',
            [
                'label' => esc_html__( 'Content Background Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#eee',
                'selectors' => [
                    '{{WRAPPER}} .trad-accordion-content' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // Content Text Color
        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Content Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-accordion-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Typography for Content
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => esc_html__( 'Content Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-accordion-content p',
            ]
        );

        // Content Alignment
        $this->add_responsive_control(
            'content_alignment',
            [
                'label' => esc_html__( 'Content Alignment', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .trad-accordion-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Content Padding
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__( 'Content Padding', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '15',    // Default top padding
                    'right' => '15',  // Default right padding
                    'bottom' => '15', // Default bottom padding
                    'left' => '15',   // Default left padding
                    'unit' => 'px',   // Default unit
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    
        // Render accordion items
        echo '<div class="trad-accordion-container">';
    
        foreach ( $settings['accordion_items'] as $index => $item ) {
            $is_open = $index == 0 && $settings['first_open'] === 'yes' ? 'is-open' : '';
    
            echo '<div class="trad-accordion ' . esc_attr($is_open) . '" data-index="' . esc_attr($index) . '">';
            echo '<span class="trad-accordion-title">' . esc_html( $item['title'] );
    
            // Render the icon using Elementor's Icons_Manager
            if ( ! empty( $item['icon'] ) ) {
                echo '<span class="trad-accordion-icon" style="color: ' . esc_attr( $item['icon_color'] ) . '; font-size: ' . esc_attr( $item['icon_size']['size'] ) . 'px;">';
                Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] );
                echo '</span>';
            }
    
            echo '</span>'; // Close the accordion title
            echo '</div>'; // Close the accordion
    
            echo '<div class="trad-accordion-content ' . esc_attr($is_open) . '">';
            echo '<p>' . esc_html( $item['content'] ) . '</p>';
            echo '</div>';
        }
    
        echo '</div>'; // Close accordion container
    
        // JavaScript for accordion toggle
        ?>
    <script>
    jQuery(document).ready(function($) {
        // Function to initialize accordion behavior
        function initAccordion() {
            $('.trad-accordion-title').off('click').on('click', function(event) {
                event.preventDefault(); // Prevent default behavior

                // Get the parent accordion
                var accordion = $(this).closest('.trad-accordion');
                var content = accordion.next('.trad-accordion-content');

                // Toggle current accordion content
                content.slideToggle();

                // Close other accordions
                $('.trad-accordion-content').not(content).slideUp();
            });
        }

        // Initialize accordion on document ready
        initAccordion();

        // Reinitialize accordion when Elementor is editing
        $(window).on('elementor:init', function() {
            initAccordion();
        });
    });
    </script>
        <?php
    }    
}

// Register the widget with Elementor.
Plugin::instance()->widgets_manager->register_widget_type( new TR_Accordion_Widget() );
