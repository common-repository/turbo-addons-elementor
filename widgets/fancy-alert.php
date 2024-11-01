<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class TRAD_Fancy_Alert extends Widget_Base {

    public function get_name() {
        return 'trad-fancy-alert';
    }

    public function get_title() {
        return esc_html__('Fancy Alert', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-alert';
    }

    public function get_categories() {
        return ['turbo-addons'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'turbo-addons-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'alert_type',
            [
                'label' => esc_html__('Alert Type', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon' => esc_html__('Icon', 'turbo-addons-elementor'),
                    'image' => esc_html__('Image', 'turbo-addons-elementor'),
                ],
                'default' => 'icon',
            ]
        );

        $this->add_control(
            'alert_icon',
            [
                'label' => esc_html__('Choose Icon', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-bell',
                    'library' => 'solid',
                ],
                'condition' => [
                    'alert_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'alert_image',
            [
                'label' => esc_html__('Upload Image', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'alert_type' => 'image',
                ],
            ]
        );

        $this->add_control(
            'alert_text',
            [
                'label' => esc_html__('Alert Title', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('This is an alert!', 'turbo-addons-elementor'),
            ]
        );

        $this->add_control(
            'alert_text_description',
            [
                'label' => esc_html__('Alert Description', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Alert description goes to here.', 'turbo-addons-elementor'),
                'placeholder' => esc_html__('Enter alert description', 'turbo-addons-elementor'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'turbo-addons-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'alert_width',
            [
                'label' => esc_html__('Alert Width', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
            ]
        );
        
        $this->add_control(
            'alert_height',
            [
                'label' => esc_html__('Alert Height', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 600,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-container' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],  
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-container' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_width',
            [
                'label' => esc_html__('Image Width', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 30,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'condition' => [
                    'alert_type' => 'image',
                ],
            ]
        );

        $this->add_control(
            'image_height',
            [
                'label' => esc_html__('Image Height', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 30,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'condition' => [
                    'alert_type' => 'image',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'condition' => [
                    'alert_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 16,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'condition' => [
                    'alert_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'title_alignment',
            [
                'label' => esc_html__('Title Alignment', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
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
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'description_alignment',
            [
                'label' => esc_html__('Description Alignment', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
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
                'default' => 'left',
                'toggle' => true,
            ]
        );        

        $this->add_control(
            'alert_title_font_size',
            [
                'label' => esc_html__('Alert Title Font Size', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-text' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'alert_description_font_size',
            [
                'label' => esc_html__('Alert Description Font Size', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-description' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );               
        $this->add_control(
            'close_button_bg_color',
            [
                'label' => esc_html__('Close Button Background Color', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff0000', // Default red color
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-close-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'alert_title_font_color',
            [
                'label' => esc_html__('Alert Title Font Color', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000', // Default black color
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-text' => 'color: {{VALUE}};',
                ],
            ]
        );
    
        $this->add_control(
            'alert_description_font_color',
            [
                'label' => esc_html__('Alert Description Font Color', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000', // Default black color
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'close_button_text_color',
            [
                'label' => esc_html__('Close Button Text Color', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff', // Default white color
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-close-button' => 'color: {{VALUE}};',
                ],
            ]
        );        
        $this->add_control(
            'close_button_top_position',
            [
                'label' => esc_html__('Close Button Top Position', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => ['min' => -100, 'max' => 100],
                    '%' => ['min' => -100, 'max' => 100],
                    'em' => ['min' => -10, 'max' => 10],
                ],
                'default' => ['unit' => 'px', 'size' => 2], // Default value
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-close-button' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'close_button_left_position',
            [
                'label' => esc_html__('Close Button Left Position', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => ['min' => -100, 'max' => 100],
                    '%' => ['min' => -100, 'max' => 100],
                    'em' => ['min' => -10, 'max' => 10],
                ],
                'default' => ['unit' => 'px', 'size' => 44], // Default value
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-close-button' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'close_button_font_size',
            [
                'label' => esc_html__('Close Button Font Size', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => ['min' => 10, 'max' => 100],
                    '%' => ['min' => 10, 'max' => 100],
                    'em' => ['min' => 1, 'max' => 10],
                ],
                'default' => ['unit' => 'px', 'size' => 20], // Default size
                'selectors' => [
                    '{{WRAPPER}} .trad-fancy-alert-close-button' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $background_color = !empty($settings['background_color']) ? esc_attr($settings['background_color']) : '#ffffff';
        $border_radius = isset($settings['border_radius']['size']) ? intval($settings['border_radius']['size']) : 0;
        $alert_width = isset($settings['alert_width']['size']) ? esc_attr($settings['alert_width']['size']) : 'auto';
        $alert_width_unit = isset($settings['alert_width']['unit']) ? esc_attr($settings['alert_width']['unit']) : 'px';
        $alert_height = isset($settings['alert_height']['size']) ? esc_attr($settings['alert_height']['size']) : 'auto';
        $alert_height_unit = isset($settings['alert_height']['unit']) ? esc_attr($settings['alert_height']['unit']) : 'px';
        
        $alert_style = sprintf(
            'background-color: %s; border-radius: %dpx; width: %s%s; height: %s%s;',
            $background_color,
            $border_radius,
            $alert_width,
            $alert_width_unit,
            $alert_height,
            $alert_height_unit
        );
        
        $title_alignment = sprintf('text-align: %s !important;', esc_attr($settings['title_alignment']));
        $description_alignment = sprintf('text-align: %s !important;', esc_attr($settings['description_alignment']));
        
        $title_font_size = sprintf(
            'font-size: %s%s !important;',
            isset($settings['alert_title_font_size']['size']) ? esc_attr($settings['alert_title_font_size']['size']) : '18',
            isset($settings['alert_title_font_size']['unit']) ? esc_attr($settings['alert_title_font_size']['unit']) : 'px'
        );
        
        $description_font_size = sprintf(
            'font-size: %s%s !important;',
            isset($settings['alert_description_font_size']['size']) ? esc_attr($settings['alert_description_font_size']['size']) : '16',
            isset($settings['alert_description_font_size']['unit']) ? esc_attr($settings['alert_description_font_size']['unit']) : 'px'
        );

        ?>
        <div class="trad-fancy-alert-container" style="<?php echo esc_attr($alert_style); ?>">
            <?php if ($settings['alert_type'] === 'image') : ?>
                <img src="<?php echo esc_url($settings['alert_image']['url']); ?>" 
                    style="width: <?php echo esc_attr($settings['image_width']['size'] . $settings['image_width']['unit']); ?>; 
                            height: <?php echo esc_attr($settings['image_height']['size'] . $settings['image_height']['unit']); ?>;">
            <?php else : ?>
                <i class="<?php echo esc_attr($settings['alert_icon']['value']); ?>" 
                style="color: <?php echo esc_attr($settings['icon_color']); ?>; 
                        font-size: <?php echo esc_attr($settings['icon_size']['size']); ?>px;"></i>
            <?php endif; ?>
            <div class="trad-fancy-alert-content" style="width: 100%; display: flex; flex-direction: column;">
                <span class="trad-fancy-alert-text" style="<?php echo esc_attr($title_alignment); ?> <?php echo esc_attr($title_font_size); ?> width: 100%;">
                    <?php echo esc_html($settings['alert_text']); ?>
                </span>
                <p class="trad-fancy-alert-description" style="<?php echo esc_attr($description_alignment); ?> <?php echo esc_attr($description_font_size); ?>">
                    <?php echo esc_html($settings['alert_text_description']); ?>
                </p>
            </div>
            <button class="trad-fancy-alert-close-button" style="
                    position: relative; 
                    top: <?php echo isset($settings['close_button_top_position']['size']) ? esc_attr($settings['close_button_top_position']['size']) : '10'; ?>px; 
                    left: <?php echo isset($settings['close_button_left_position']['size']) ? esc_attr($settings['close_button_left_position']['size']) : '10'; ?>px;
                    background-color: <?php echo isset($settings['close_button_bg_color']) ? esc_attr($settings['close_button_bg_color']) : '#ffffff'; ?>;
                    font-size: <?php echo isset($settings['close_button_font_size']['size']) ? esc_attr($settings['close_button_font_size']['size']) : '14'; ?>px; 
                    color: <?php echo isset($settings['close_button_text_color']) ? esc_attr($settings['close_button_text_color']) : '#000000'; ?>;
                ">
                &times;
            </button>
        </div>
        <?php
    }   
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Fancy_Alert() );
