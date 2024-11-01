<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class TRAD_Icon_Button extends Widget_Base {

    public function get_name() {
        return 'icon_button_widget';
    }

    public function get_title() {
        return esc_html__( 'Icon Button', 'turbo-addons-elementor' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return [ 'turbo-addons' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Button Text
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Connect Wallet', 'turbo-addons-elementor' ),
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );

        // Icon
        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__( 'Icon', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-wallet',
                    'library' => 'solid',
                ],
            ]
        );

        // Icon Position
        $this->add_control(
            'icon_position',
            [
                'label' => esc_html__( 'Icon Position', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__( 'Left', 'turbo-addons-elementor' ),
                    'right' => esc_html__( 'Right', 'turbo-addons-elementor' ),
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
                    'size' => 16,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .trad-custom-button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon Spacing
        $this->add_control(
            'icon_spacing',
            [
                'label' => esc_html__( 'Icon Spacing', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button i' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .trad-custom-button svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'icon_position' => 'left',
                ],
            ]
        );

        $this->add_control(
            'icon_spacing_right',
            [
                'label' => esc_html__( 'Icon Spacing', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button i' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .trad-custom-button svg' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'icon_position' => 'right',
                ],
            ]
        );

        // Button Link
        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'turbo-addons-elementor' ),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'sanitize_callback' => 'esc_url_raw', // Ensure URLs are sanitized properly
            ]
        );

        $this->end_controls_section();

        // ============================== Button Style Section ================================
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Button Text Color
        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__( 'Text Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Icon Color
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .trad-custom-button svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // Button Background Color
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__( 'Button Background Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#007bff',
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button Hover Color
        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__( 'Hover Background Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#0056b3',
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button Radius
        $this->add_control(
            'button_radius',
            [
                'label' => esc_html__( 'Border Radius', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Button Shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow',
                'label' => esc_html__( 'Box Shadow', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-custom-button',
            ]
        );

        // Button Alignment
        $this->add_responsive_control(
            'alignment',
            [
                'label' => esc_html__( 'Alignment', 'turbo-addons-elementor' ),
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button-container' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Button Text Style
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => esc_html__( 'Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-custom-button',
            ]
        );

        // Margin
        $this->add_responsive_control(
            'margin',
            [
                'label' => esc_html__( 'Margin', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Padding
        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .trad-custom-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    
        // Sanitize and escape button attributes
        $button_text = esc_html( $settings['button_text'] );
        $button_url = isset( $settings['link']['url'] ) ? esc_url( $settings['link']['url'] ) : '#';
        $icon_position = esc_attr( $settings['icon_position'] );
    
        // Render the icon using Elementor's Icons_Manager
        $icon_html = '';
        if ( ! empty( $settings['button_icon']['value'] ) ) {
            ob_start();
            Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] );
            $icon_html = ob_get_clean();
        }
    
        // Allow only specific HTML tags and attributes for icons
        $allowed_html = array(
            'i' => array(
                'class' => array(),
                'aria-hidden' => array(),
            ),
            'svg' => array(
                'class' => array(),
                'aria-hidden' => array(),
                'xmlns' => array(),
                'viewbox' => array(),
                'role' => array(),
                'focusable' => array(),
            ),
            'path' => array(
                'fill' => array(),
                'd' => array(),
            ),
            // Add other tags or attributes as needed
        );
        $icon_html = wp_kses( $icon_html, $allowed_html );
    
        // Add classes and attributes to the button
        $this->add_render_attribute( 'button', 'class', 'trad-custom-button' ); 
        $this->add_render_attribute( 'button', 'href', $button_url );
    
        if ( isset($settings['link']['is_external']) && $settings['link']['is_external'] ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }
    
        if ( isset($settings['link']['nofollow']) && $settings['link']['nofollow'] ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
    
        ?>
        
        <div class="trad-custom-button-container">
            <a <?php echo wp_kses( $this->get_render_attribute_string( 'button' ), array(
                    'a' => array(
                        'href' => array(),
                        'class' => array(),
                        'id' => array(),
                        'style' => array(),
                    )
                )); ?> style="display: inline-flex; align-items: center;">
                
                <?php if ( 'left' === $icon_position && $icon_html ) : ?>
                    <span class="icon-wrapper"><?php echo wp_kses( $icon_html, $allowed_html ); ?></span>
                <?php endif; ?>

                <span class="text-wrapper"><?php echo esc_html( $button_text ); ?></span>

                <?php if ( 'right' === $icon_position && $icon_html ) : ?>
                    <span class="icon-wrapper"><?php echo wp_kses( $icon_html, $allowed_html ); ?></span>
                <?php endif; ?>
            </a>
        </div>
    
        <?php
    }
    

    protected function _content_template() {
        ?>
        <#
        var button_text = settings.button_text ? _.escape( settings.button_text ) : '';
        var button_url = settings.link.url ? settings.link.url : '#';
        var icon_position = settings.icon_position ? settings.icon_position : 'left';
        var icon_value = settings.button_icon.value ? settings.button_icon.value : '';
    
        #>
    
        <div class="trad-custom-button-container">
            <a href="{{ button_url }}" class="trad-custom-button" style="display: inline-flex; align-items: center;">
                <# if ( 'left' === icon_position && icon_value ) { #>
                    <span class="icon-wrapper"><i class="{{ icon_value }}"></i></span>
                <# } #>
    
                <span class="text-wrapper">{{{ button_text }}}</span>
    
                <# if ( 'right' === icon_position && icon_value ) { #>
                    <span class="icon-wrapper"><i class="{{ icon_value }}"></i></span>
                <# } #>
            </a>
        </div>
        <?php
    }
}

// Register the widget with Elementor.
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Icon_Button() );
