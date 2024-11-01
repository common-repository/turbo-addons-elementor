<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class TRAD_Top_Bar extends Widget_Base {

    public function get_name() {
        return 'top_bar_widget';
    }

    public function get_title() {
        return esc_html__( 'Top Bar', 'turbo-addons-elementor' );
    }

    public function get_icon() {
        return 'eicon-header';
    }

    public function get_categories() {
        return [ 'turbo-addons' ];
    }

    protected function _register_controls() {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Left Text
        $this->add_control(
            'left_text',
            [
                'label' => esc_html__( 'Left Side Text', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Follow Us: ', 'turbo-addons-elementor' ),
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );

        // Right Text
        $this->add_control(
            'right_text',
            [
                'label' => esc_html__( 'Right Side Text', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Contact email: support@turbo-addons.com', 'turbo-addons-elementor' ),
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );

        // Swap Left and Right Content
        $this->add_control(
            'swap_content',
            [
                'label' => esc_html__( 'Swap Left and Right Content', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => esc_html__( 'Yes', 'turbo-addons-elementor' ),
                'label_off' => esc_html__( 'No', 'turbo-addons-elementor' ),
            ]
        );

        // Repeater for multiple icons
        $repeater = new Repeater();

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'e-font-icon-svg e-fab-facebook',
                    'library' => 'all',
                ],
            ]
        );

        // Icon link
        $repeater->add_control(
            'icon_link',
            [
                'label' => esc_html__( 'Link', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'turbo-addons-elementor' ),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'sanitize_callback' => 'esc_url_raw',
            ]
        );

        $this->add_control(
            'icons',
            [
                'label' => esc_html__( 'Icons', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icon' => [
                            'value' => 'fas fa-phone',
                            'library' => 'all',
                        ],
                        'icon_link' => [ 'url' => '#' ],
                    ],
                ],
                'title_field' => '{{{ elementor.helpers.renderIcon( this, icon, {}, "i", "panel" ) }}}',
            ]
        );

        // Spacing between icons
        $this->add_control(
            'icon_spacing',
            [
                'label' => esc_html__( 'Icon Spacing', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-most-top-bar .trad-most-top-bar-icon-wrapper' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon Size Control
        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 16,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-most-top-bar .trad-most-top-bar-icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .trad-most-top-bar .trad-most-top-bar-icon-wrapper svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon Color Control
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .trad-most-top-bar .trad-most-top-bar-icon-wrapper i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .trad-most-top-bar .trad-most-top-bar-icon-wrapper svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Background Color (with fallback for default)
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__( 'Background Color', 'turbo-addons-elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .trad-most-top-bar',
            ]
        );

        // Text Color
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Text Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .trad-most-top-bar' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => esc_html__( 'Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-most-top-bar',
            ]
        );

        // Padding Control
        $this->add_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .trad-most-top-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Margin Control
        $this->add_control(
            'margin',
            [
                'label' => esc_html__( 'Margin', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .trad-most-top-bar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    
        $left_text = esc_html( $settings['left_text'] );
        $right_text = esc_html( $settings['right_text'] );
    
        $swap_content = $settings['swap_content'] === 'yes';
        $left_side_content = $swap_content ? $right_text : $left_text;
        $right_side_content = $swap_content ? $left_text : $right_text;
    
        // Check if the user has selected a background color via the background control
        $background_color = isset( $settings['background_color_background'] ) ? $settings['background_color_background'] : '';
    
        // Apply inline style for default background color only if no user background color is selected
        $background_style = empty( $background_color ) ? 'background-color: #000080;' : '';
    
        ?>
        <div class="trad-most-top-bar" style="<?php echo esc_attr( $background_style ); ?> display: flex; justify-content: space-between; align-items: center;">
            <div class="trad-most-top-bar-left-side">
                <?php if ( ! $swap_content ) : ?>
                    <?php if ( ! empty( $settings['icons'] ) ) : ?>
                        <?php foreach ( $settings['icons'] as $icon ) : ?>
                            <?php if ( ! empty( $icon['icon'] ) ) : ?>
                                <div class="trad-most-top-bar-icon-wrapper">
                                    <?php
                                    if ( ! empty( $icon['icon']['value'] ) ) {
                                        Icons_Manager::render_icon( $icon['icon'], [ 'aria-hidden' => 'true' ] );
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <span class="trad-topbar-social-before-text"><?php echo esc_html( $left_side_content ); ?></span>
            </div>
            <div class="trad-most-topbar-right-side">
                <span class="trad-topbar-social-before-text"><?php echo esc_html( $right_side_content ); ?></span>
                <?php if ( $swap_content ) : ?>
                    <?php if ( ! empty( $settings['icons'] ) ) : ?>
                        <?php foreach ( $settings['icons'] as $icon ) : ?>
                            <?php if ( ! empty( $icon['icon'] ) ) : ?>
                                <div class="trad-most-top-bar-icon-wrapper">
                                    <?php
                                    if ( ! empty( $icon['icon']['value'] ) ) {
                                        Icons_Manager::render_icon( $icon['icon'], [ 'aria-hidden' => 'true' ] );
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
    

    protected function _content_template() {
        ?>
        <#
        var left_text = settings.left_text ? _.escape( settings.left_text ) : '';
        var right_text = settings.right_text ? _.escape( settings.right_text ) : '';
        var swap_content = settings.swap_content === 'yes';
        var left_side_content = swap_content ? right_text : left_text;
        var right_side_content = swap_content ? left_text : right_text;
    
        // Get the user-selected background color
        var background_color = settings.background_color_background ? settings.background_color_background : '';
    
        // If no user background is set, apply the default color
        var background_style = background_color ? '' : 'background-color: #000080;';
        #>
        
        <div class="trad-most-top-bar" style="{{ background_style }} display: flex; justify-content: space-between; align-items: center;">
            <div class="trad-most-top-bar-left-side">
                <# if ( ! swap_content ) { #>
                    <# _.each( settings.icons, function( icon ) { #>
                        <div class="trad-most-top-bar-icon-wrapper">
                            <i class="{{ icon.icon.value }}"></i>
                        </div>
                    <# }); #>
                <# } #>
                <span>{{{ left_side_content }}}</span>
            </div>
            <div class="trad-most-topbar-right-side">
                <span>{{{ right_side_content }}}</span>
                <# if ( swap_content ) { #>
                    <# _.each( settings.icons, function( icon ) { #>
                        <div class="trad-most-top-bar-icon-wrapper">
                            <i class="{{ icon.icon.value }}"></i>
                        </div>
                    <# }); #>
                <# } #>
            </div>
        </div>
        <?php
    }
    
}

// Register the widget with Elementor.
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Top_Bar() );
