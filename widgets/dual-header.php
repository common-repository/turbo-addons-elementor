<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class TRAD_Dual_Header extends Widget_Base {

    public function get_name() {
        return 'trad-dual-header';
    }

    public function get_title() {
        return esc_html__( 'Dual Header', 'turbo-addons-elementor' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return [ 'turbo-addons' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
                'content_section',
                [
                    'label' => esc_html__( 'Content', 'turbo-addons-elementor' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'primary_text',
                [
                    'label' => esc_html__( 'Primary Text', 'turbo-addons-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Change', 'turbo-addons-elementor' ),
                ]
        );

        $this->add_control(
                'secondary_text',
                [
                    'label' => esc_html__( 'Secondary Text', 'turbo-addons-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Headers', 'turbo-addons-elementor' ),
                ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
                'style_section',
                [
                    'label' => esc_html__( 'Style', 'turbo-addons-elementor' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
            'primary_text_color',
            [
                'label' => esc_html__( 'Primary Text Color', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-text .primary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'primary_font_size',
            [
                'label' => esc_html__( 'Primary Font Size', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-text .primary' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'primary_font_style',
            [
                'label' => esc_html__( 'Primary Font Style', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'normal' => esc_html__( 'Normal', 'turbo-addons-elementor' ),
                    'italic' => esc_html__( 'Italic', 'turbo-addons-elementor' ),
                    'oblique' => esc_html__( 'Oblique', 'turbo-addons-elementor' ),
                ],
                'default' => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-text .primary' => 'font-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'primary_font_weight',
            [
                'label' => esc_html__( 'Primary Font Weight', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '100' => esc_html__( '100', 'turbo-addons-elementor' ),
                    '200' => esc_html__( '200', 'turbo-addons-elementor' ),
                    '300' => esc_html__( '300', 'turbo-addons-elementor' ),
                    '400' => esc_html__( '400', 'turbo-addons-elementor' ),
                    '500' => esc_html__( '500', 'turbo-addons-elementor' ),
                    '600' => esc_html__( '600', 'turbo-addons-elementor' ),
                    '700' => esc_html__( '700', 'turbo-addons-elementor' ),
                    '800' => esc_html__( '800', 'turbo-addons-elementor' ),
                    '900' => esc_html__( '900', 'turbo-addons-elementor' ),
                ],
                'default' => '400',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-text .primary' => 'font-weight: {{VALUE}};',
                ],
            ]
        );


        // Secondary Text Styling
        $this->add_control(
            'secondary_text_color',
            [
                'label' => esc_html__( 'Secondary Text Color', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-text .secondary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'secondary_font_size',
            [
                'label' => esc_html__( 'Secondary Font Size', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-text .secondary' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'secondary_font_style',
            [
                'label' => esc_html__( 'Secondary Font Style', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'normal' => esc_html__( 'Normal', 'turbo-addons-elementor' ),
                    'italic' => esc_html__( 'Italic', 'turbo-addons-elementor' ),
                    'oblique' => esc_html__( 'Oblique', 'turbo-addons-elementor' ),
                ],
                'default' => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-text .secondary' => 'font-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'secondary_font_weight',
            [
                'label' => esc_html__( 'Secondary Font Weight', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '100' => esc_html__( '100', 'turbo-addons-elementor' ),
                    '200' => esc_html__( '200', 'turbo-addons-elementor' ),
                    '300' => esc_html__( '300', 'turbo-addons-elementor' ),
                    '400' => esc_html__( '400', 'turbo-addons-elementor' ),
                    '500' => esc_html__( '500', 'turbo-addons-elementor' ),
                    '600' => esc_html__( '600', 'turbo-addons-elementor' ),
                    '700' => esc_html__( '700', 'turbo-addons-elementor' ),
                    '800' => esc_html__( '800', 'turbo-addons-elementor' ),
                    '900' => esc_html__( '900', 'turbo-addons-elementor' ),
                ],
                'default' => '400',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-text .secondary' => 'font-weight: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
                'letter_spacing',
                [
                    'label' => esc_html__( 'Letter Spacing', 'turbo-addons-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => -10,
                            'max' => 50,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .trad-fancy-text-content' => 'letter-spacing: {{SIZE}}{{UNIT}};',
                    ],
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
    
        $letter_spacing_size = isset($settings['letter_spacing']['size']) ? floatval($settings['letter_spacing']['size']) : 0;
        $letter_spacing_unit = isset($settings['letter_spacing']['unit']) ? sanitize_key($settings['letter_spacing']['unit']) : 'px';
        $letter_spacing = ($letter_spacing_size > 0) ? $letter_spacing_size . $letter_spacing_unit : 'normal';
    
        $primary_text = isset($settings['primary_text']) ? sanitize_text_field($settings['primary_text']) : '';
        $secondary_text = isset($settings['secondary_text']) ? sanitize_text_field($settings['secondary_text']) : '';
    
        ?>
        <div class="trad-fancy-text">
            <span class="primary" style="letter-spacing: <?php echo esc_attr($letter_spacing); ?>;">
                <?php echo esc_html($primary_text); ?>
            </span>
            <span class="secondary" style="letter-spacing: <?php echo esc_attr($letter_spacing); ?>;">
                <?php echo esc_html($secondary_text); ?>
            </span>
        </div>
        <?php
    }
    
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Dual_Header() );
