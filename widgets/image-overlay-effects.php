<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Trad_Image_Overlay_Effects extends Widget_Base {
    public function get_name() {
        return 'trad-image-overlay-effects';
    }

    public function get_title() {
        return esc_html__('Image Overlay Effects', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-image'; // Choose an appropriate icon
    }

    public function get_categories() {
        return ['turbo-addons']; // Change to your desired category
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Image Overlay', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'template_select',
            [
                'label' => esc_html__( 'Select Template', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'template-1' => esc_html__( 'Template One', 'turbo-addons-elementor' ),
                    'template-2' => esc_html__( 'Template Two', 'turbo-addons-elementor' ),
                ],
                'default' => 'template-1',
            ]
        );

        $this->add_control(
            'trad_overlay_image_upload',
            [
                'label' => esc_html__( 'Image', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Title Controller
        $this->add_control(
            'trad_overlay_image_title',
            [
                'label' => esc_html__('Title', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Overlay Title', 'turbo-addons-elementor'),
                'placeholder' => esc_html__('Enter title here', 'turbo-addons-elementor'),
            ]
        );

        // Button Text & Link Controller
        $this->add_control(
            'trad_overlay_image_button_text',
            [
                'label' => esc_html__('Button Text', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Learn More', 'turbo-addons-elementor'),
                'placeholder' => esc_html__('Enter button text', 'turbo-addons-elementor'),
                'condition' => [
                    'template_select' => 'template-2',
                ],
            ]
        );

        $this->add_control(
            'trad_overlay_image_button_link',
            [
                'label' => esc_html__('Button Link', 'turbo-addons-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'turbo-addons-elementor'),
                'default' => [
                    'url' => '#',
                ],
                'condition' => [
                    'template_select' => 'template-2',
                ],
            ]
        );

        // Create a new Repeater instance
        $repeater = new Repeater();

        $repeater->add_control(
            'trad_overlay_image_social_icon',
            [
                'label' => esc_html__('Social Icon', 'turbo-addons-elementor'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-wallet', // Correct FontAwesome Facebook icon class
                    'library' => 'solid', // Make sure the library matches the default value
                ],
            ]
        );
        
        $repeater->add_control(
            'trad_overlay_image_social_link',
            [
                'label' => esc_html__('Social Link', 'turbo-addons-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'turbo-addons-elementor'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );
        
        $repeater->add_control(
            'trad_overlay_image_icon_color', // Updated control name
            [
                'label' => esc_html__('Icon Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000', // Default color is black
            ]
        );
        
        $this->add_control(
            'social_icons_list',
            [
                'label' => esc_html__('Social Icons', 'turbo-addons-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'trad_overlay_image_social_icon' => [
                            'value' => 'fas fa-wallet', // Correct FontAwesome Facebook icon class
                            'library' => 'solid', // Specifying the correct library
                        ],
                        'trad_overlay_image_social_link' => [
                            'url' => '#',
                        ],
                        'trad_overlay_image_icon_color' => '#3b5998', // Default Facebook blue
                    ],
                    [
                        'trad_overlay_image_social_icon' => [
                            'value' => 'fas fa-wallet', // Correct FontAwesome Twitter icon class
                            'library' => 'solid', // Specifying the correct library
                        ],
                        'trad_overlay_image_social_link' => [
                            'url' => '#',
                        ],
                        'trad_overlay_image_icon_color' => '#1da1f2', // Default Twitter blue
                    ],
                ],
                'title_field' => '{{{ trad_overlay_image_social_icon.value }}}',
            ]
        );
        
    
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Image & Button Overlay', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'template_select' => ['template-1', 'template-2'],
                ],
            ]
        );

        $this->add_control(
            'trad_overlay_image_template_one_background_color',
            [
                'label' => esc_html__('Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#7DA9F8',
                'selectors' => [
                    '{{WRAPPER}} .trad-image-overlay-template-one-overlay' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'template_select' => 'template-1',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'trad_overlay_image_template_one_typography', // Unique name for the control
                'label'    => esc_html__( 'Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-image-overlay-template-one-text-title',
                'condition' => [
                    'template_select' => 'template-1',
                ],
            ]
        );

        $this->add_control(
            'trad_overlay_image_template_one_title_color',
            [
                'label' => esc_html__('Title Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .trad-image-overlay-template-one-text-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'template_select' => 'template-1',
                ],
            ]
        );

        $this->add_control(
            'trad_overlay_image_template_two_button_background_color',
            [
                'label' => esc_html__('Button Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#7DA9F8',
                'selectors' => [
                    '{{WRAPPER}} .trad-image-overlay-template-two-text' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'template_select' => 'template-2',
                ],
            ]
        );

        $this->add_control(
            'trad_overlay_image_template_two_button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .trad-image-overlay-template-two-text-link' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'template_select' => 'template-2',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'trad_overlay_image_template_two_button_text_typography', // Unique name for the control
                'label'    => esc_html__( 'Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-image-overlay-template-two-text-link',
                'condition' => [
                    'template_select' => 'template-2',
                ],
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'trad_image_overlay_template_one_icon_style_section',
            [
                'label' => esc_html__('Icon', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'template_select' => 'template-1',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-social-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'template_select' => 'template-1',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_space',
            [
                'label' => esc_html__('Space Between Icons', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-social-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'template_select' => 'template-1',
                ],
            ]
        );

        $this->end_controls_section();
    }
    
    

    protected function render() {
        $settings = $this->get_settings_for_display();
        $selected_template_for_testimonial = isset( $settings['template_select'] ) ? $settings['template_select'] : 'template-1';
        $social_icons = $settings['social_icons_list'];
        $button_url = !empty($settings['trad_overlay_image_button_link']['url']) ? esc_url_raw($settings['trad_overlay_image_button_link']['url']) : '#'; // Sanitize and escape URL
        if ( 'template-1' === $selected_template_for_testimonial ) {
            include plugin_dir_path( __FILE__ ) . '../templates/overlay/overlay-template-one.php';
        } elseif ( 'template-2' === $selected_template_for_testimonial ) {
            include plugin_dir_path( __FILE__ ) . '../templates/overlay/overlay-template-two.php';
        }
    }
    
}
// Register the widget with Elementor.
Plugin::instance()->widgets_manager->register_widget_type( new Trad_Image_Overlay_Effects() );