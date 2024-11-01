<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class TR_Call_To_Action_Widget extends Widget_Base {

    public function get_name() {
        return 'trad-call-to-action';
    }

    public function get_title() {
        return esc_html__('Call to Action', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return ['turbo-addons'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'trad_heading',
            [
                'label' => esc_html__('Heading', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('A nice attention grabbing header!', 'turbo-addons-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'trad_paragraph',
            [
                'label' => esc_html__('Paragraph', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('A descriptive sentence for the Call To Action (CTA).', 'turbo-addons-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'trad_button_text',
            [
                'label' => esc_html__('Button Text', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contact Us Now!', 'turbo-addons-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'trad_button_url',
            [
                'label' => esc_html__('Button URL', 'turbo-addons-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'turbo-addons-elementor'),
            ]
        );

        $this->end_controls_section();

        // Style section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'trad_width',
            [
                'label' => esc_html__('Width', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 2000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100, // Set the default size to 100
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-wrapper-full' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'trad_padding',
            [
                'label' => esc_html__('Padding', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '10',
                    'right' => '10',
                    'bottom' => '10',
                    'left' => '10',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-wrapper-full' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Background color or image controller
        $this->add_control(
            'trad_background',
            [
                'label' => esc_html__('Background', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3686BE',
                'selectors' => [
                    '{{WRAPPER}} .trad-wrapper-full' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Heading font size controller
        $this->add_control(
            'trad_heading_font_size',
            [
                'label' => esc_html__('Heading Font Size', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-details-wrapper h2' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'size' => 28,
                    'unit' => 'px',
                ],
            ]
        );


        // Heading color controller
        $this->add_control(
            'trad_heading_color',
            [
                'label' => esc_html__('Heading Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-details-wrapper h2' => 'color: {{VALUE}};',
                ],
            ]
        );

         // Paragraph font size controller
         $this->add_control(
            'trad_paragraph_font_size',
            [
                'label' => esc_html__('Paragraph Font Size', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-details-wrapper p' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'size' => 16,
                    'unit' => 'px',
                ],
            ]
        );       

        // Paragraph color controller
        $this->add_control(
            'trad_paragraph_color',
            [
                'label' => esc_html__('Paragraph Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-details-wrapper p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Button background color controller
        $this->add_control(
            'trad_button_bg_color',
            [
                'label' => esc_html__('Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-blue-cta-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button text color controller
        $this->add_control(
            'trad_button_text_color',
            [
                'label' => esc_html__('Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3686BE',
                'selectors' => [
                    '{{WRAPPER}} .trad-blue-cta-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button hover background color controller
        $this->add_control(
            'trad_button_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-blue-cta-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button hover text color controller
        $this->add_control(
            'trad_button_hover_text_color',
            [
                'label' => esc_html__('Hover Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-blue-cta-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'trad_button_border_color',
            [
                'label' => esc_html__('Border Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .trad-blue-cta-button' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        // Button border controller
        $this->add_control(
            'trad_button_border',
            [
                'label' => esc_html__('Border Width', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .trad-blue-cta-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '2',
                    'right' => '2',
                    'bottom' => '2',
                    'left' => '2',
                    'unit' => 'px',
                ],
            ]
        );

        // Button border style controller
        $this->add_control(
            'trad_button_border_style',
            [
                'label' => esc_html__('Border Style', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'solid' => esc_html__('Solid', 'turbo-addons-elementor'),
                    'dashed' => esc_html__('Dashed', 'turbo-addons-elementor'),
                    'dotted' => esc_html__('Dotted', 'turbo-addons-elementor'),
                    'double' => esc_html__('Double', 'turbo-addons-elementor'),
                    'groove' => esc_html__('Groove', 'turbo-addons-elementor'),
                    'ridge' => esc_html__('Ridge', 'turbo-addons-elementor'),
                    'inset' => esc_html__('Inset', 'turbo-addons-elementor'),
                    'outset' => esc_html__('Outset', 'turbo-addons-elementor'),
                    'none' => esc_html__('None', 'turbo-addons-elementor'),
                ],
                'default' => 'solid',
                'selectors' => [
                    '{{WRAPPER}} .trad-blue-cta-button' => 'border-style: {{VALUE}};'
                ],
            ]
        );

        // Button border radius controller
        $this->add_control(
            'trad_button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .trad-blue-cta-button' => 'border-top-left-radius: {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}}; border-bottom-left-radius: {{BOTTOM}}{{UNIT}}; border-bottom-right-radius: {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '5',
                    'right' => '5',
                    'bottom' => '5',
                    'left' => '5',
                    'unit' => 'px',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        
        <div class="trad-wrapper-full">
            <div class="trad-cta-wrapper">
                <div class="trad-details-wrapper">
                    <h2 style="font-size: <?php echo esc_attr($settings['trad_heading_font_size']['unit']); ?>;">
                        <?php echo esc_html($settings['trad_heading']); ?>
                    </h2>
                    <p style="font-size: <?php echo esc_attr($settings['trad_paragraph_font_size']['unit']); ?>;">
                        <?php echo esc_html($settings['trad_paragraph']); ?>
                    </p>
                </div>
                <a class="trad-blue-cta-button" href="<?php echo esc_url($settings['trad_button_url']['url']); ?>">
                    <?php echo esc_html($settings['trad_button_text']); ?>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
    
        <?php
    }
    
    
}

Plugin::instance()->widgets_manager->register( new TR_Call_To_Action_Widget() );