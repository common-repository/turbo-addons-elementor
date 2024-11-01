<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Background;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class TRAD_Info_Box extends Widget_Base {

    public function get_name() {
        return 'trad-info-box';
    }

    public function get_title() {
        return esc_html__('Infobox', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_categories() {
        return [ 'turbo-addons' ]; 
    }

    protected function _register_controls() {

        // Icon Section
        $this->start_controls_section(
            'icon_section',
            [
                'label' => esc_html__('Icon', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-info-circle',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon i' => 'font-size: {{SIZE}}{{UNIT}};', // Font Awesome or other font-based icons
                    '{{WRAPPER}} .elementor-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};', // SVG icons
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon i' => 'color: {{VALUE}};', // Font Awesome or other font-based icons
                    '{{WRAPPER}} .elementor-icon svg' => 'fill: {{VALUE}};', // SVG icons
                ],
            ]
        );

        $this->add_control(
            'icon_margin',
            [
                'label' => esc_html__('Icon Margin', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_alignment',
            [
                'label' => esc_html__('Icon Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-icon-wrapper' => 'text-align: {{VALUE}};', // Wrap the icon
                ],
            ]
        );

        $this->end_controls_section();

        // Heading Section
        $this->start_controls_section(
            'heading_section',
            [
                'label' => esc_html__('Heading', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading Text', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Infobox Heading', 'turbo-addons-elementor'),
                'placeholder' => esc_html__('Type your heading here', 'turbo-addons-elementor'),
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Heading Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_margin',
            [
                'label' => esc_html__('Heading Margin', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_padding',
            [
                'label' => esc_html__('Heading Padding', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_alignment',
            [
                'label' => esc_html__('Heading Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-heading' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => esc_html__('Heading Typography', 'turbo-addons-elementor'),
                'selector' => '{{WRAPPER}} .trad-infobox-heading',
            ]
        );
    



        $this->end_controls_section();

        // Description Section
        $this->start_controls_section(
            'description_section',
            [
                'label' => esc_html__('Description', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description Text', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('This is a short description of the infobox.', 'turbo-addons-elementor'),
                'placeholder' => esc_html__('Type your description here', 'turbo-addons-elementor'),
            ]
        );

        $this->add_control(
            'description_margin',
            [
                'label' => esc_html__('Description Margin', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_padding',
            [
                'label' => esc_html__('Description Padding', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_alignment',
            [
                'label' => esc_html__('Description Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-description' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Description Typography', 'turbo-addons-elementor'),
                'selector' => '{{WRAPPER}} .trad-infobox-description',
            ]
        );

        // description color control//
        $this->add_control(
            'description_text_color',
            [
                'label' => esc_html__('Description Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

       // Button Section
        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Button Text Control
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Click Me', 'turbo-addons-elementor'),
            ]
        );

        // Button URL Control
        $this->add_control(
            'button_url',
            [
                'label' => esc_html__('Button URL', 'turbo-addons-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'turbo-addons-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        // Button Background Color Control
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Button Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button Text Color Control
        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Hover Text Color Control
        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__('Button Hover Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Hover Background Color Control
        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__('Button Hover Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button Margin Control
        $this->add_control(
            'button_margin',
            [
                'label' => esc_html__('Button Margin', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; display: inline-block;', // Ensure the button behaves as an inline-block element
                ],
            ]
        );

        // Button Padding Control
        $this->add_control(
            'button_padding',
            [
                'label' => esc_html__('Button Padding', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Button Border Control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => esc_html__('Button Border', 'turbo-addons-elementor'),
                'selector' => '{{WRAPPER}} .trad-infobox-button',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Button Border Radius', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Button Box Shadow Control
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'label' => esc_html__('Button Box Shadow', 'turbo-addons-elementor'),
                'selector' => '{{WRAPPER}} .trad-infobox-button',
            ]
        );

        // Button Alignment Control
        $this->add_control(
            'button_alignment',
            [
                'label' => esc_html__('Button Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .trad-infobox-button-wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section for Background
        $this->start_controls_section(
            'background_section',
            [
                'label' => esc_html__('Box Background', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_background',
                'label' => esc_html__('Background', 'turbo-addons-elementor'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .trad-info-box',
            ]
        );

        // Box Shadow Section
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'turbo-addons-elementor'),
            'selector' => '{{WRAPPER}} .trad-info-box',
        ]
    );


     // Border Section
     $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'turbo-addons-elementor'),
            'selector' => '{{WRAPPER}} .trad-info-box',
        ]
    );

    // Border Radius
    $this->add_control(
        'box_border_radius',
        [
            'label' => esc_html__('Border Radius', 'turbo-addons-elementor'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .trad-info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
    
        <div class="trad-info-box" style="<?php echo esc_attr($settings['box_background'] ?? ''); ?>">
            <!-- Icon Rendering -->
            <?php if ( ! empty( $settings['icon']['value'] ) ) : ?>
                <div class="trad-infobox-icon-wrapper">
                    <div class="elementor-icon trad-infobox-icon">
                        <?php
                        // Render the icon with proper sanitization
                        Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
                        ?>
                    </div>
                </div>
            <?php endif; ?>
    
            <!-- Heading Rendering -->
            <?php if ( ! empty( $settings['heading'] ) ) : ?>
                <h3 class="trad-infobox-heading">
                    <?php echo esc_html( $settings['heading'] ); ?>
                </h3>
            <?php endif; ?>
    
            <!-- Description Rendering -->
            <?php if ( ! empty( $settings['description'] ) ) : ?>
                <p class="trad-infobox-description">
                    <?php echo esc_html( $settings['description'] ); ?>
                </p>
            <?php endif; ?>
    
            <!-- Button Rendering -->
            <?php if ( ! empty( $settings['button_text'] ) && ! empty( $settings['button_url']['url'] ) ) : ?>
                <div class="trad-infobox-button-wrapper">
                    <a class="trad-infobox-button" href="<?php echo esc_url( $settings['button_url']['url'] ); ?>"
                       <?php if ( isset( $settings['button_url']['is_external'] ) && $settings['button_url']['is_external'] ) : ?>
                           target="_blank"
                       <?php endif; ?>
                       <?php if ( isset( $settings['button_url']['nofollow'] ) && $settings['button_url']['nofollow'] ) : ?>
                           rel="nofollow"
                       <?php endif; ?>>
                        <?php echo esc_html( $settings['button_text'] ); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    
        <?php
    }
    
    }

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Info_Box() );

