<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class TR_Flip_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'trad-flip-box';
    }

    public function get_title() {
        return esc_html__('3D Flip Box', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-flip-box';
    }

    public function get_categories() {
        return ['turbo-addons'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'flip_box_content',
            [
                'label' => esc_html__('Content', 'turbo-addons-elementor'),
            ]
        );

        // Front Title
        $this->add_control(
            'front_title',
            [
                'label' => esc_html__("Front Title", 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Turbo Addons', 'turbo-addons-elementor'),
            ]
        );
        

        // Front Description
        $this->add_control(
            'front_description',
            [
                'label' => esc_html__("Front Description", 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('A short sentence describing this callout.', 'turbo-addons-elementor'),
            ]
        );

        // Front Image
        $this->add_control(
            'front_image',
            [
                'label' => esc_html__("Front Image", 'turbo-addons-elementor'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        // Front Icon (added icon control)
        $this->add_control(
            'front_icon',
            [
                'label' => esc_html__('Front Icon', 'turbo-addons-elementor'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'solid',
                ],
            ]
        );

        // Back Title
        $this->add_control(
            'back_title',
            [
                'label' => esc_html__("Back Title", 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Custom Domains', 'turbo-addons-elementor'),
            ]
        );

        // Back Button Text
        $this->add_control(
            'back_button_text',
            [
                'label' => esc_html__("Back Button Text", 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Click Me', 'turbo-addons-elementor'),
            ]
        );

        // Back Button URL (added URL control)
        $this->add_control(
            'back_button_url',
            [
                'label' => esc_html__("Back Button URL", 'turbo-addons-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'turbo-addons-elementor'),
            ]
        );

        // Back Image
        $this->add_control(
            'back_image',
            [
                'label' => esc_html__("Back Image", 'turbo-addons-elementor'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'front_text_section',
            [
                'label' => esc_html__('Front Title', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'front_title_color',
            [
                'label' => esc_html__('Title Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-header' => 'color: {{VALUE}};',
                ],
                'default' => '#ffffff',
            ]
        );

        // Title for Content
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'front_title_typography',
                'label' => esc_html__( 'Title Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-flip-box-header',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'front_description_section',
            [
                'label' => esc_html__('Front Description', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'front_description_color',
            [
                'label' => esc_html__('Description Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-description' => 'color: {{VALUE}};',
                ],
                'default' => '#ffffff',
            ]
        );

        // Title for Content
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'front_description_typography',
                'label' => esc_html__( 'Description Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-flip-box-description',
            ]
        );


        $this->end_controls_section();  

        $this->start_controls_section(
            'front_icon_section',
            [
                'label' => esc_html__('Icon Style', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .trad-flip-box-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // Icon Size
        $this->add_control(
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
                    'size' => 40,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .trad-flip-box-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
                
        $this->end_controls_section();         

        $this->start_controls_section(
            'back_text_section',
            [
                'label' => esc_html__('Back Title', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'back_title_color',
            [
                'label' => esc_html__('Title Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-header-back' => 'color: {{VALUE}};',
                ],
                'default' => '#ffffff',
            ]
        );

        // Title for Content
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Title Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-flip-box-header-back',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button Style', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Button Text Color
        $this->add_control(
            'back_button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-button' => 'color: {{VALUE}};',
                ],
                'default' => '#ffffff',
            ]
        );

        // Button Background Color
        $this->add_control(
            'back_button_background_color',
            [
                'label' => esc_html__('Button Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-button' => 'background-color: {{VALUE}};',
                ],
                'default' => '#1C3389', // Default red background color
            ]
        );
        
        // Button Border Color
        $this->add_control(
            'back_button_border_color',
            [
                'label' => esc_html__('Button Border Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-button' => 'border-color: {{VALUE}};',
                ],
                'default' => '#fff',
            ]
        );        

        // Back Button Padding (added padding control)
        $this->add_responsive_control(
            'back_button_padding',
            [
                'label' => esc_html__('Button Padding', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Button Margin
        $this->add_responsive_control(
            'back_button_margin',
            [
                'label' => esc_html__('Button Margin', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '15',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                ]
            ]
        );        

        // Back Button Border Radius (added border radius control)
        $this->add_responsive_control(
            'back_button_border_radius',
            [
                'label' => esc_html__('Button Border Radius', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
			'active_hover',
			[
				'label'        => esc_html__( 'Active Hover', 'turbo-addons-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'turbo-addons-elementor' ),
				'label_off'    => esc_html__( 'No', 'turbo-addons-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);


        // Button Hover - Text Color
        $this->add_control(
            'back_button_hover_text_color',
            [
                'label' => esc_html__('Button Hover Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-button:hover' => 'color: {{VALUE}};',
                ],
                'default' => '#ffffff',
                'condition'   => [
                    'active_hover' => 'yes',
                ],
            ]
        );

        // Button Hover - Background Color
        $this->add_control(
            'back_button_hover_background_color',
            [
                'label' => esc_html__('Button Hover Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-button:hover' => 'background-color: {{VALUE}};',
                ],
                'default' => '#e91e63', // Default pink color on hover
                'condition'   => [
                    'active_hover' => 'yes',
                ],
            ]
        );

        // Button Hover - Border Color
        $this->add_control(
            'back_button_hover_border_color',
            [
                'label' => esc_html__('Button Hover Border Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trad-flip-box-button:hover' => 'border-color: {{VALUE}};',
                ],
                'default' => '#e91e63',
                'condition'   => [
                    'active_hover' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    
        // Sanitize default image path (it doesn't need to be escaped since it's a static value)
        $default_image = esc_url(TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/images/tard-default-image.png'); 
    
        // Sanitize front and back image URLs with a fallback to the default image
        $front_image_url = !empty($settings['front_image']['url']) ? esc_url_raw($settings['front_image']['url']) : $default_image;
        $back_image_url = !empty($settings['back_image']['url']) ? esc_url_raw($settings['back_image']['url']) : $default_image;
    
        // Start rendering the flip-box structure
        echo '<div class="trad-box-container">';
        echo '<div class="trad-box-item">';
        echo '<div class="trad-flip-box">';
    
        // Front content
        echo '<div class="trad-flip-box-front trad-flip-text-center" style="background-image: url(' . esc_url($front_image_url) . ');">'; // Escape URL
        echo '<div class="trad-flip-inner trad-flip-color-white">';
        
        // Front Title
        if (!empty($settings['front_title'])) {
            echo '<h3 class="trad-flip-box-header">' . esc_html($settings['front_title']) . '</h3>'; // Escape title
        }
    
        // Front Description
        if (!empty($settings['front_description'])) {
            echo '<p class="trad-flip-box-description">' . esc_html($settings['front_description']) . '</p>'; // Escape description
        }
    
        // Render front icon if it's set
        if (!empty($settings['front_icon']['value'])) {
            // Sanitize and escape icon color and size
            $icon_color = !empty($settings['icon_color']) ? 'color: ' . esc_attr($settings['icon_color']) . ';' : '';
            $icon_size = !empty($settings['icon_size']['size']) ? 'font-size: ' . esc_attr($settings['icon_size']['size']) . esc_attr($settings['icon_size']['unit']) . ';' : '';
    
            // Render icon using Icon Manager
            echo '<div class="trad-flip-box-icon">';
            Icons_Manager::render_icon($settings['front_icon'], ['aria-hidden' => 'true', 'class' => 'trad-flip-box-icon', 'style' => esc_attr($icon_color . $icon_size)]);
            echo '</div>';
        }
    
        echo '</div></div>'; // Close front
    
        // Back content
        echo '<div class="trad-flip-box-back trad-flip-text-center" style="background-image: url(' . esc_url($back_image_url) . ');">'; // Escape URL
        echo '<div class="trad-flip-inner trad-flip-color-white">';
    
        // Back Title
        if (!empty($settings['back_title'])) {
            echo '<h3 class="trad-flip-box-header-back">' . esc_html($settings['back_title']) . '</h3>'; // Escape title
        }
    
        // Button with URL
        $button_url = !empty($settings['back_button_url']['url']) ? esc_url_raw($settings['back_button_url']['url']) : '#'; // Sanitize and escape URL
        echo '<a href="' . esc_url($button_url) . '" class="trad-flip-box-button">'; // Escape URL
        if (!empty($settings['back_button_text'])) {
            echo esc_html($settings['back_button_text']); // Escape button text
        }
        echo '</a>';
    
        echo '</div></div>'; // Close back
        echo '</div></div>'; // Close box-item
        echo '</div>'; // Close box-container
    }    

    public function get_style_depends() {
        return ['tr-flip-box-css'];
    }
}

// Register the widget with Elementor.
Plugin::instance()->widgets_manager->register_widget_type(new TR_Flip_Box_Widget());
