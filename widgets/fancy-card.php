<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class TRAD_Fancy_Card extends Widget_Base {

    public function get_name() {
        return 'trad-fancy-card';
    }

    public function get_title() {
        return esc_html__( 'Fancy Card', 'turbo-addons-elementor' );
    }

    public function get_icon() {
        return 'eicon-posts-grid'; 
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
            'image',
            [
                'label' => esc_html__( 'Image', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'image_position',
            [
                'label' => esc_html__( 'Image Position', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'top' => [
                        'title' => esc_html__( 'Top', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => esc_html__( 'Bottom', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'top',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-image' => 'vertical-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Card Title', 'turbo-addons-elementor' ),
                'placeholder' => esc_html__( 'Add Title', 'turbo-addons-elementor' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Card description goes here.', 'turbo-addons-elementor' ),
                'placeholder' => esc_html__( 'Type your description here', 'turbo-addons-elementor' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Click Here', 'turbo-addons-elementor' ),
                'placeholder' => esc_html__( 'Type your button text here', 'turbo-addons-elementor' ),
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => esc_html__( 'Button URL', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                ],
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
            'image_border_radius',
            [
                'label' => esc_html__( 'Image Border Radius', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '0' => esc_html__( '0%', 'turbo-addons-elementor' ),
                    '50%' => esc_html__( '50% (Circle)', 'turbo-addons-elementor' ),
                    '100%' => esc_html__( '100% (Ellipse)', 'turbo-addons-elementor' ),
                ],
                'default' => '0',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card  .trad-fancy-card-image img' => 'border-radius: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'image_width',
            [
                'label' => esc_html__( 'Image Width', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_height',
            [
                'label' => esc_html__( 'Image Height', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_hover_effect',
            [
                'label' => esc_html__( 'Image Hover Effect', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'none' => [
                        'title' => esc_html__( 'None', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-none',
                    ],
                    'zoom' => [
                        'title' => esc_html__( 'Zoom', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-image-zoom',
                    ],
                    'blur' => [
                        'title' => esc_html__( 'Blur', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-image-blur',
                    ],
                ],
                'default' => 'none',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-image img:hover' => 'transform: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_alignment',
            [
                'label' => esc_html__( 'Title Alignment', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description_alignment',
            [
                'label' => esc_html__( 'Description Alignment', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-description' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_alignment',
            [
                'label' => esc_html__( 'Button Alignment', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card-button-wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__( 'Button Background Color', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073e6',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__( 'Button Text Color', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__( 'Button Hover Background Color', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#005bb5',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__( 'Button Hover Text Color', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff', 
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-card .trad-fancy-card-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'neon_effect_color',
            [
                'label' => esc_html__( 'Neon Effect Color', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#bbb', 
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $neon_color = isset($settings['neon_effect_color']) ? sanitize_hex_color($settings['neon_effect_color']) : '#00FF00';
        $button_background_color = isset($settings['button_background_color']) ? sanitize_hex_color($settings['button_background_color']) : '#0073e6';
        $button_text_color = isset($settings['button_text_color']) ? sanitize_hex_color($settings['button_text_color']) : '#fff';
        $button_hover_background_color = isset($settings['button_hover_background_color']) ? sanitize_hex_color($settings['button_hover_background_color']) : '#005bb5';
        $button_hover_text_color = isset($settings['button_hover_text_color']) ? sanitize_hex_color($settings['button_hover_text_color']) : '#fff';

        $image_url = isset($settings['image']['url']) ? esc_url_raw($settings['image']['url']) : '';
        $title = isset($settings['title']) ? sanitize_text_field($settings['title']) : '';
        $description = isset($settings['description']) ? wp_kses_post($settings['description']) : '';
        $button_url = isset($settings['button_url']['url']) ? esc_url_raw($settings['button_url']['url']) : '';
        $button_text = isset($settings['button_text']) ? sanitize_text_field($settings['button_text']) : '';
        ?>

        <div class="trad-fancy-card" style="border: 2px solid <?php echo esc_attr($neon_color); ?>;">
            <div class="trad-fancy-card-image">
                <?php if ($image_url) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
                <?php endif; ?>
            </div>
            <h2 class="trad-fancy-card-title"><?php echo esc_html($title); ?></h2>
            <p class="trad-fancy-card-description"><?php echo wp_kses_post($description); ?></p>
            <a class="trad-fancy-card-button" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_text); ?></a>
        </div>

        <style>
            .trad-fancy-card:hover {
                border-color: <?php echo esc_attr($neon_color); ?>;
            }

            .trad-fancy-card .trad-fancy-card-button {
                background-color: <?php echo esc_attr($button_background_color); ?>;
                color: <?php echo esc_attr($button_text_color); ?>;
            }

            .trad-fancy-card .trad-fancy-card-button:hover {
                background-color: <?php echo esc_attr($button_hover_background_color); ?>;
                color: <?php echo esc_attr($button_hover_text_color); ?>;
            }
        </style>

        <?php
    }


}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Fancy_Card() );
