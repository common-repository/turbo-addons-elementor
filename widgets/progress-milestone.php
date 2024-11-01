<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class TRAD_Progress_Milestone extends Widget_Base {

    public function get_name() {
        return 'trad-progress-milestone';
    }

    public function get_title() {
        return esc_html__( 'Progress Milestones', 'turbo-addons-elementor' );
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return [ 'turbo-addons' ];
    }

    public function _register_controls() {
  

    // Progress Milestone Container Control//
        $this->start_controls_section(
            'progress-container-style',
            [
                'label' => esc_html__( 'Progress Container Style', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // background//
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'container_background',
                'label' => esc_html__( 'Container Background', 'turbo-addons-elementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .trad-progress-milestone',
            ]
        );

        //  Box Shadow and Border
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'container_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-progress-milestone',
            ]
        );
        // border style///
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'label' => esc_html__( 'Border', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-progress-milestone',
            ]
        );
        // paddaing style//
        $this->add_control(
            'padding_control',
            [
                'label' => esc_html__( 'Padding', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ], // Units you can control the padding in
                'selectors' => [
                    '{{WRAPPER}} .trad-progress-milestone' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        

      // Milestone Content Section
        $this->start_controls_section(
            'progress_bar_section',
            [
                'label' => esc_html__( 'Progress Bar', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'milestone_title',
            [
                'label' => esc_html__( 'Title', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Milestone Title', 'turbo-addons-elementor' ),
            ]
        );

        $this->add_control(
            'milestone_value',
            [
                'label' => esc_html__( 'Progress Value (%)', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
            ]
        );

        $this->add_control(
            'milestone_color',
            [
                'label' => esc_html__( 'Progress Bar Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1a7efb',
            ]
        );

        $this->add_control(
            'milestone_icon',
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
            'milestone_icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
            ]
        );

        $this->add_control(
            'milestone_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon' => 'color: {{VALUE}};', // Font-based icon color
                    '{{WRAPPER}} .elementor-icon svg' => 'fill: {{VALUE}};', // SVG icon color
                ],
            ]
        );

        $this->add_control(
            'milestone_icon_direction',
            [
                'label' => esc_html__( 'Icon and Description Alignment', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__( 'Left', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__( 'Right', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'column' => [
                        'title' => esc_html__( 'Column', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__( 'Column Reverse', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'row',
                'selectors' => [
                    '{{WRAPPER}} .trad-progress-milestone-description-icon' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'milestone_description',
            [
                'label' => esc_html__( 'Description', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Description goes here.', 'turbo-addons-elementor' ),
            ]
        );

        $this->add_control(
            'milestone_description',
            [
                'label' => esc_html__( 'Description', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Description goes here.', 'turbo-addons-elementor' ),
            ]
        );

        $this->end_controls_section();

        // Title Style Controls
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__( 'Title Style', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-progress-milestone-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-progress-milestone-title',
            ]
        );

        $this->add_control(
            'title_alignment',
            [
                'label' => esc_html__( 'Title Alignment', 'turbo-addons-elementor' ),
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
                    '{{WRAPPER}} .trad-progress-milestone-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        // =============================Description Style Controls==================
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => esc_html__( 'Description Style', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Description Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-progress-milestone-info' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__( 'Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-progress-milestone-info',
            ]
        );


        $this->end_controls_section();

        // Progress Bar Height Control
        $this->start_controls_section(
            'progress_bar_style_section',
            [
                'label' => esc_html__( 'Progress Bar Style', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'progress_bar_height',
            [
                'label' => esc_html__( 'Progress Bar Height', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-progress-milestone-progress-bar' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'progress_vertical_space',
            [
                'label' => esc_html__( 'Progress Vertical Space', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%','em' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-progress-milestone-progress-bar' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Progress Bar Background Style
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'progress_bar_background',
                'label' => esc_html__( 'Progress Bar Background', 'turbo-addons-elementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .trad-progress-milestone-progress-bar',
            ]
        );

        // Progress Bar Box Shadow and Border
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'progress_bar_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-progress-milestone-progress-bar',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'progress_bar_border',
                'label' => esc_html__( 'Border', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-progress-milestone-progress-bar',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $milestone_title = sanitize_text_field( $settings['milestone_title'] );
        $milestone_value = absint( $settings['milestone_value']['size'] );
        $milestone_color = sanitize_hex_color( $settings['milestone_color'] );
        $milestone_icon_size = absint( $settings['milestone_icon_size']['size'] );
        $milestone_description = wp_kses_post( $settings['milestone_description'] );

        $progress_bar_height = isset( $settings['progress_bar_height']['size'] ) ? esc_attr( $settings['progress_bar_height']['size'] ) : '20';

        ?>
        <div class="trad-progress-milestone-container">
            <div class="trad-progress-milestone">
                <div class="trad-progress-milestone-title">
                    <?php echo esc_html( $milestone_title ); ?>
                </div>
                <div class="trad-progress-milestone-description-icon" style="display: flex; align-items: center;">
                    <?php if ( ! empty( $settings['milestone_icon']['value'] ) ) : ?>
                        <span class="trad-progress-milestone-icon elementor-icon" style="font-size: <?php echo esc_attr( $milestone_icon_size ); ?>px; width: <?php echo esc_attr( $milestone_icon_size ); ?>px; height: <?php echo esc_attr( $milestone_icon_size ); ?>px;">
                            <?php Icons_Manager::render_icon( $settings['milestone_icon'], [ 'aria-hidden' => 'true', 'class' => 'trad-progress-milestone-icon' ] ); ?>
                        </span>
                    <?php endif; ?>
                    <div class="trad-progress-milestone-info">
                        <?php echo esc_html( $milestone_description ); ?>
                    </div>
                </div>
                <div class="trad-progress-milestone-progress-bar" style="height: <?php echo esc_attr($progress_bar_height); ?>px;">
            <div class="trad-progress-milestone-progress" style="width: <?php echo esc_attr( $milestone_value ); ?>%; background-color: <?php echo esc_attr( $milestone_color ); ?>;">
                <span class="trad-progress-milestone-value"><?php echo esc_html( $milestone_value ); ?>%</span>
            </div>
        </div>
            </div>
        </div>
        <?php
    }
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Progress_Milestone() );

