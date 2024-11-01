<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Turbo_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'turbo-carousel';
    }

    public function get_title() {
        return esc_html__('Turbo Carousel', 'turbo-addons-elementor');
    }

    public function get_categories() {
        return ['turbo-addons'];
    }

    public function get_style_depends() {
        return ['owl-carousel', 'owl-carousel-theme', 'custom-carousel-style'];
    }

    public function get_script_depends() {
        return ['jquery', 'owl-carousel', 'custom-carousel-script'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'carousel_content',
            [
                'label' => esc_html__('Carousel Images', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'responsive_items',
            [
                'label' => esc_html__('Responsive Items', 'turbo-addons-elementor'),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'breakpoint' => '0',
                        'items' => 1,
                    ],
                    [
                        'breakpoint' => '600',
                        'items' => 1,
                    ],
                    [
                        'breakpoint' => '1024',
                        'items' => 1,
                    ],
                    [
                        'breakpoint' => '1366',
                        'items' => 1,
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'breakpoint',
                        'label' => esc_html__('Breakpoint', 'turbo-addons-elementor'),
                        'type' => Controls_Manager::TEXT,
                        'default' => '0',
                    ],
                    [
                        'name' => 'items',
                        'label' => esc_html__('Items', 'turbo-addons-elementor'),
                        'type' => Controls_Manager::NUMBER,
                        'default' => 1,
                        'min' => 1,
                        'max' => 10,
                    ],
                ],
                'title_field' => '{{{ breakpoint }}}',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'carousel_image', 
            [
                'label' => esc_html__('Upload Image', 'turbo-addons-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'carousel_items',
            [
                'label' => esc_html__('Carousel Items', 'turbo-addons-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'carousel_image' => Utils::get_placeholder_image_src(),
                    ],
                    [
                        'carousel_image' => Utils::get_placeholder_image_src(),
                    ],
                ],
                'title_field' => '{{{ carousel_image.url }}}',
            ]
        );

        $this->end_controls_section();

            // Add a new control for navigation button top position
        $this->start_controls_section(
            'nav_position_section',
            [
                'label' => esc_html__('Navigation Position', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'nav_top_position',
            [
                'label' => esc_html__('Navigation Top Position', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 34,
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-nav button' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'dots_margin_top',
            [
                'label' => esc_html__('Dots Margin Top', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => -7, // Default value
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => -10,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-dots' => 'margin-top: {{SIZE}}{{UNIT}};', // Apply the margin to owl-dots
                ],
            ]
        );

        $this->add_control(
            'nav_icon_color',
            [
                'label' => esc_html__('Nav Icon Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-nav button svg' => 'fill: {{VALUE}};', // Apply the color to the SVG icons
                ],
            ]
        );

        $this->add_control(
            'dots_background_color',
            [
                'label' => esc_html__('Dots Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-dots button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'active_dots_background_color',
            [
                'label' => esc_html__('Active Dots Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-dots button.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_display',
            [
                'label' => esc_html__('Show Navigation', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'turbo-addons-elementor'),
                'label_off' => esc_html__('No', 'turbo-addons-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'dots_display',
            [
                'label' => esc_html__('Show Dots', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'turbo-addons-elementor'),
                'label_off' => esc_html__('No', 'turbo-addons-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        // Prepare the responsive settings
        $responsive = [];
        if (!empty($settings['responsive_items'])) {
            foreach ($settings['responsive_items'] as $item) {
                $responsive[$item['breakpoint']] = $item['items'];
            }
        }
        ?>
        <div class="owl-slider">
            <div id="carousel" class="owl-carousel">
                <?php
                if ($settings['carousel_items']) {
                    foreach ($settings['carousel_items'] as $item) {
                        $image_url = $item['carousel_image']['url'];
                        ?>
                        <div class="trad-basic-carousel-item">
                            <img src="<?php echo esc_url($image_url); ?>" alt="Carousel Image">
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    
        <style>
            .owl-dots {
                display: <?php echo ($settings['dots_display'] === 'yes') ? 'block' : 'none'; ?>;
            }
            .owl-nav {
                display: <?php echo ($settings['nav_display'] === 'yes') ? 'block' : 'none'; ?>;
            }

        </style>
    
        <script>
            jQuery(document).ready(function($) {
                var isEditMode = <?php echo Plugin::instance()->editor->is_edit_mode() ? 'true' : 'false'; ?>;
                if (isEditMode || !isEditMode) {
                    $("#carousel").owlCarousel({
                        autoplay: true,
                        loop: true,
                        margin: 20,
                        nav: <?php echo ($settings['nav_display'] === 'yes') ? 'true' : 'false'; ?>,
                        dots: <?php echo ($settings['dots_display'] === 'yes') ? 'true' : 'false'; ?>, // Use the dots setting here
                        navText: [
                            '<svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>',
                            '<svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>'
                        ],
                        responsive: {
                            <?php
                                foreach ($responsive as $breakpoint => $items) {
                                    echo esc_js($breakpoint) . ': { items: ' . esc_js($items) . ' },';
                                }
                            ?>
                        }
                    });
                }
            });
        </script>
        <?php
    }
    
    
}

Plugin::instance()->widgets_manager->register_widget_type(new Turbo_Carousel_Widget());
