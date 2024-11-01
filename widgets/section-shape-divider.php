<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class TRAD_section_shap_divider extends Widget_Base {

    public function get_name() {
        return 'trad_section_divider';
    }

    public function get_title() {
        return esc_html__('Section Divider', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-divider-shape';
    }

    public function get_categories() {
        return ['turbo-addons'];
    }

    public function get_style_depends() {
        return ['custom-widget-css'];
    }

    protected function _register_controls() {
        // Divider Style
        $this->start_controls_section(
            'divider_content',
            [
                'label' => esc_html__('Divider Settings', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Divider Shape Selection
        $this->add_control(
            'divider_shape',
            [
                'label' => esc_html__('Divider Shape', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'trad-rectangle' => esc_html__('Rectangle', 'turbo-addons-elementor'),
                    'trad-triangle' => esc_html__('Triangle', 'turbo-addons-elementor'),
                    'trad-curve' => esc_html__('Curve', 'turbo-addons-elementor'),
                ],
                'default' => 'trad-curve',
            ]
        );

        // Divider Shape Color
        $this->add_control(
            'divider_color',
            [
                'label' => esc_html__('Divider Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#0074D9',
            ]
        );

        // Divider Shape Height
        $this->add_control(
            'divider_height',
            [
                'label' => esc_html__('Divider Height', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
            ]
        );

        // Animation Toggle
        $this->add_control(
            'enable_animation',
            [
                'label' => esc_html__('Enable Animation', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'turbo-addons-elementor'),
                'label_off' => esc_html__('No', 'turbo-addons-elementor'),
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $shape = sanitize_html_class($settings['divider_shape']);
        $color = sanitize_hex_color($settings['divider_color']);
        $height = isset($settings['divider_height']['size']) ? absint($settings['divider_height']['size']) . esc_attr($settings['divider_height']['unit']) : '50px';
        $animation = $settings['enable_animation'] === 'yes' ? 'trad-divider-animate' : '';

        // Output the divider with proper escaping
        echo '<div class="trad-divider-wrapper">';
        echo '<div class="' . esc_attr('trad-divider ' . $shape . ' ' . $animation) . '" style="background-color: ' . esc_attr($color) . '; height: ' . esc_attr($height) . ';"></div>';
        echo '</div>';
    }

    protected function _content_template() {
        ?>
        <#
        var shape = settings.divider_shape;
        var color = settings.divider_color;
        var height = settings.divider_height.size + settings.divider_height.unit;
        var animation = settings.enable_animation === 'yes' ? 'trad-divider-animate' : '';

        #>
        <div class="trad-divider-wrapper">
            <div class="trad-divider {{ shape }} {{ animation }}" style="background-color: {{ color }}; height: {{ height }};"></div>
        </div>
        <?php
    }
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_section_shap_divider() );
