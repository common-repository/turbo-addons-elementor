<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Trad_Tooltip extends Widget_Base {
    public function get_name() {
        return 'trad-tooltip';
    }

    public function get_title() {
        return esc_html__('Turbo Tooltip', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-info-circle'; // Choose an appropriate icon
    }

    public function get_categories() {
        return ['turbo-addons']; // Change to your desired category
    }

    protected function get_upsale_data() {
		return [
			'condition' => ! Utils::has_pro(),
			'image' => esc_url( ELEMENTOR_ASSETS_URL . 'images/go-pro.svg' ),
			'image_alt' => esc_attr__( 'Upgrade', 'turbo-addons-elementor' ),
			'title' => esc_html__( "Hey Grab your visitors' attention", 'turbo-addons-elementor' ),
			'description' => esc_html__( 'Get the widget and grow website with Elementor Pro.', 'turbo-addons-elementor' ),
			'upgrade_url' => esc_url( 'https://turbo-addons.com/pricing/' ),
			'upgrade_text' => esc_html__( 'Upgrade Now', 'turbo-addons-elementor' ),
		];
	}

    protected function _register_controls() {
        $this->start_controls_section(
            'tooltip_content',
            [
                'label' => esc_html__('Tooltip Content', 'turbo-addons-elementor'),
            ]
        );
    
        $this->add_control(
            'tooltip_target_html',
            [
                'label' => esc_html__('Target HTML', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hover over me!', 'turbo-addons-elementor'),
                'placeholder' => esc_html__('Add your button, text, or heading here', 'turbo-addons-elementor'),
            ]
        );
    
        $this->add_control(
            'tooltip_text',
            [
                'label' => esc_html__('Tooltip Text', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('This is a tooltip!', 'turbo-addons-elementor'),
            ]
        );
    
        $this->add_control(
            'tooltip_position',
            [
                'label' => esc_html__('Position', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'top' => esc_html__('Top', 'turbo-addons-elementor'),
                    'bottom' => esc_html__('Bottom', 'turbo-addons-elementor'),
                    'left' => esc_html__('Left', 'turbo-addons-elementor'),
                    'right' => esc_html__('Right', 'turbo-addons-elementor'),
                ],
                'default' => 'top',
            ]
        );
    
        // Typography Controls for Tooltip Text
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tooltip_typography',
                'label' => esc_html__( 'Tooltip Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-tooltip',
            ]
        );
    
        // Text Color Control
        $this->add_control(
            'tooltip_text_color',
            [
                'label' => esc_html__('Tooltip Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff', // Default color
                'selectors' => [
                    '{{WRAPPER}} .trad-tooltip' => 'color: {{VALUE}}',
                ],
            ]
        );
    
        // Background Color Control
        $this->add_control(
            'tooltip_background_color',
            [
                'label' => esc_html__('Tooltip Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000', // Default background color
                'selectors' => [
                    '{{WRAPPER}} .trad-tooltip' => 'background-color: {{VALUE}}',
                ],
            ]
        );
    
        $this->end_controls_section();
    }
    
    

    protected function render() {
        $settings = $this->get_settings_for_display();
    
        // Sanitize and escape settings
        $tooltip_position = isset($settings['tooltip_position']) ? esc_attr($settings['tooltip_position']) : 'top'; // Default to 'top'
        $tooltip_target_html = isset($settings['tooltip_target_html']) ? wp_kses_post($settings['tooltip_target_html']) : '';
        $tooltip_text_color = !empty($settings['tooltip_text_color']) ? esc_attr($settings['tooltip_text_color']) : '';
        $tooltip_background_color = !empty($settings['tooltip_background_color']) ? esc_attr($settings['tooltip_background_color']) : '';
        $tooltip_font_size = !empty($settings['tooltip_font_size']['size']) ? esc_attr($settings['tooltip_font_size']['size']) . esc_attr($settings['tooltip_font_size']['unit']) : 'inherit'; // Default to 'inherit'
        $tooltip_text = !empty($settings['tooltip_text']) ? esc_html($settings['tooltip_text']) : '';
    
        ?>
        <div class="trad-tooltip-container" data-position="<?php echo esc_attr( $tooltip_position ); ?>">
            <span class="trad-tooltip-target"><?php echo wp_kses_post( $tooltip_target_html ); ?></span>
            <span class="trad-tooltip" style="
                <?php if ($tooltip_text_color) : ?>
                    color: <?php echo esc_attr($tooltip_text_color); ?>;
                <?php endif; ?>
                <?php if ($tooltip_background_color) : ?>
                    background-color: <?php echo esc_attr($tooltip_background_color); ?>;
                <?php endif; ?>
                <?php if ($tooltip_font_size) : ?>
                    font-size: <?php echo esc_attr($tooltip_font_size); ?>;
                <?php endif; ?>
            ">
                <?php echo esc_html($tooltip_text); ?> <!-- Ensure the tooltip text is escaped -->
            </span>
        </div>
        <?php
    }
    
    

    protected function _content_template() {
        ?>
        <div class="trad-tooltip-container" data-position="{{ settings.tooltip_position }}">
            <span class="trad-tooltip-target">{{{ settings.tooltip_target_html }}}</span>
            <span class="trad-tooltip">{{{ settings.tooltip_text }}}</span>
        </div>
        <?php
    }
}
// Register the widget with Elementor.
Plugin::instance()->widgets_manager->register_widget_type( new Trad_Tooltip() );