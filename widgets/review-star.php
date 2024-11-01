<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class TRAD_Review_Star extends Widget_Base {

    public function get_name() {
        return 'trad-review-star';
    }

    public function get_title() {
        return esc_html__('Review Star', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-star';
    }

    public function get_categories() {
        return ['turbo-addons'];
    }

    public function get_style_depends() {
        return ['custom-widget-css'];
    }

    protected function _register_controls() {
        // Star Rating Settings
        $this->start_controls_section(
            'star_rating_content',
            [
                'label' => esc_html__('Star Rating Settings', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Star Rating Value
        $this->add_control(
            'star_rating',
            [
                'label' => esc_html__('Star Rating', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [''],
                'range' => [
                    '' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 2.5,
                ],
            ]
        );

        // Star Background Color
        $this->add_control(
            'star_background_color',
            [
                'label' => esc_html__('Review Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fc0',
            ]
        );

        // Star Color
        $this->add_control(
            'star_color',
            [
                'label' => esc_html__('Star Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
            ]
        );

        // Star Size
        $this->add_control(
            'star_size',
            [
                'label' => esc_html__('Star Size', 'turbo-addons-elementor'),
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
                    'size' => 60,
                ],
            ]
        );

        // Hover Effect
        $this->add_control(
            'enable_hover',
            [
                'label' => esc_html__('Enable Hover Effect', 'turbo-addons-elementor'),
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
        $rating = $settings['star_rating']['size'];
        $star_color = sanitize_hex_color($settings['star_color']);
        $star_background_color = sanitize_hex_color($settings['star_background_color']);
        $star_size = isset($settings['star_size']['size']) ? absint($settings['star_size']['size']) . 'px' : '60px';
        $hover_class = $settings['enable_hover'] === 'yes' ? 'trad-stars-hover' : '';

        ?>
        <div class="trad-stars <?php echo esc_attr($hover_class); ?>" style="--rating: <?php echo esc_attr($rating); ?>; --star-size: <?php echo esc_attr($star_size); ?>; --star-color: <?php echo esc_attr($star_color); ?>; --star-background: <?php echo esc_attr($star_background_color); ?>;" aria-label="Rating of this product is <?php echo esc_attr($rating); ?> out of 5.">
        </div>
        <?php
    }

    protected function _content_template() {
        ?>
        <#
        var rating = settings.star_rating.size;
        var starColor = settings.star_color;
        var starBackgroundColor = settings.star_background_color;
        var starSize = settings.star_size.size + 'px';
        var hoverClass = settings.enable_hover === 'yes' ? 'trad-stars-hover' : '';
        #>
        <div class="trad-stars {{ hoverClass }}" style="--rating: {{ rating }}; --star-size: {{ starSize }}; --star-color: {{ starColor }}; --star-background: {{ starBackgroundColor }};" aria-label="Rating of this product is {{ rating }} out of 5.">
        </div>
        <?php
    }
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Review_Star() );
