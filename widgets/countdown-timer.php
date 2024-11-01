<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class TRAD_Countdown_Timer extends Widget_Base {

    public function get_name() {
        return 'trad-countdown-timer';
    }

    public function get_title() {
        return esc_html__('Turbo Timer', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-countdown';
    }

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
    public function get_categories() {
        return [ 'turbo-addons' ];
    }

    public function get_script_depends() {
        return ['countdown-timer-js'];
    }

    public function get_style_depends() {
        return ['countdown-timer-css'];
    }

    protected function _register_controls() {
        // Countdown Timer Controls
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'target_date',
            [
                'label' => esc_html__('Target Date & Time', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DATE_TIME,
                'default' => gmdate('Y-m-d H:i:s', strtotime('+1 week')),
                'picker_options' => ['enableTime' => true],
            ]
        );

        $this->add_control(
            'message_when_done',
            [
                'label' => esc_html__('Message When Countdown is Over', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Offer is closed!', 'turbo-addons-elementor'),
                'placeholder' => esc_html__('Enter your message', 'turbo-addons-elementor'),
            ]
        );

        $this->add_control(
            'show_months',
            [
                'label' => esc_html__('Show Months', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'turbo-addons-elementor'),
                'label_off' => esc_html__('Hide', 'turbo-addons-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_days',
            [
                'label' => esc_html__('Show Days', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'turbo-addons-elementor'),
                'label_off' => esc_html__('Hide', 'turbo-addons-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_hours',
            [
                'label' => esc_html__('Show Hours', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'turbo-addons-elementor'),
                'label_off' => esc_html__('Hide', 'turbo-addons-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_minutes',
            [
                'label' => esc_html__('Show Minutes', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'turbo-addons-elementor'),
                'label_off' => esc_html__('Hide', 'turbo-addons-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_seconds',
            [
                'label' => esc_html__('Show Seconds', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'turbo-addons-elementor'),
                'label_off' => esc_html__('Hide', 'turbo-addons-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Style Controls
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Countdown Number Style
        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#CAA78C',
                'selectors' => [
                    '{{WRAPPER}} .trad-countdown .trad-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Label Color
        $this->add_control(
            'label_color',
            [
                'label' => esc_html__('Label Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#2C4A64',
                'selectors' => [
                    '{{WRAPPER}} .trad-countdown div span:last-of-type' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Countdown Message Style
        $this->add_control(
            'countdown_message_font_size',
            [
                'label' => esc_html__('Message Font Size', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 18,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-countdown-over-message' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'countdown_message_color',
            [
                'label' => esc_html__('Message Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FF0000', // Default color (red)
                'selectors' => [
                    '{{WRAPPER}} .trad-countdown-over-message' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'countdown_message_background_color',
            [
                'label' => esc_html__('Message Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000088', // Default color (white)
                'selectors' => [
                    '{{WRAPPER}} .trad-countdown-over-message' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'countdown_message_padding',
            [
                'label' => esc_html__('Padding', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '10',
                    'right' => '10',
                    'bottom' => '10',
                    'left' => '10',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-countdown-over-message' => 'padding: {{TOP}} {{RIGHT}} {{BOTTOM}} {{LEFT}};'
                ],
            ]
        );
        
        $this->add_control(
            'countdown_message_border_radius',
            [
                'label' => esc_html__('Border Radius', 'turbo-addons-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '5',
                    'right' => '5',
                    'bottom' => '5',
                    'left' => '5',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-countdown-over-message' => 'border-radius: {{TOP}} {{RIGHT}} {{BOTTOM}} {{LEFT}};'
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $target_date = esc_attr($settings['target_date']);
        $message_when_done = esc_html($settings['message_when_done']);
        $show_months = $settings['show_months'] === 'yes' ? 'block' : 'none';
        $show_days = $settings['show_days'] === 'yes' ? 'block' : 'none';
        $show_hours = $settings['show_hours'] === 'yes' ? 'block' : 'none';
        $show_minutes = $settings['show_minutes'] === 'yes' ? 'block' : 'none';
        $show_seconds = $settings['show_seconds'] === 'yes' ? 'block' : 'none';
    
        // Fetch styles for the countdown message
        $message_font_size = !empty($settings['countdown_message_font_size']['size']) ? $settings['countdown_message_font_size']['size'] . 'px' : '18px';
        $message_color = !empty($settings['countdown_message_color']) ? $settings['countdown_message_color'] : '#FF0000';
        $background_color = !empty($settings['countdown_message_background_color']) ? $settings['countdown_message_background_color'] : '#000088';
    
        // Padding
        $padding_top = !empty($settings['countdown_message_padding']['top']) ? $settings['countdown_message_padding']['top'] . $settings['countdown_message_padding']['unit'] : '10px';
        $padding_right = !empty($settings['countdown_message_padding']['right']) ? $settings['countdown_message_padding']['right'] . $settings['countdown_message_padding']['unit'] : '10px';
        $padding_bottom = !empty($settings['countdown_message_padding']['bottom']) ? $settings['countdown_message_padding']['bottom'] . $settings['countdown_message_padding']['unit'] : '10px';
        $padding_left = !empty($settings['countdown_message_padding']['left']) ? $settings['countdown_message_padding']['left'] . $settings['countdown_message_padding']['unit'] : '10px';
    
        // Border Radius
        $border_radius_top = !empty($settings['countdown_message_border_radius']['top']) ? $settings['countdown_message_border_radius']['top'] . $settings['countdown_message_border_radius']['unit'] : '5px';
        $border_radius_right = !empty($settings['countdown_message_border_radius']['right']) ? $settings['countdown_message_border_radius']['right'] . $settings['countdown_message_border_radius']['unit'] : '5px';
        $border_radius_bottom = !empty($settings['countdown_message_border_radius']['bottom']) ? $settings['countdown_message_border_radius']['bottom'] . $settings['countdown_message_border_radius']['unit'] : '5px';
        $border_radius_left = !empty($settings['countdown_message_border_radius']['left']) ? $settings['countdown_message_border_radius']['left'] . $settings['countdown_message_border_radius']['unit'] : '5px';
    
        ?>
       <div class="trad-countdown-main" 
    data-target-date="<?php echo esc_attr( sanitize_text_field( $target_date ) ); ?>" 
    data-message-when-done="<?php echo esc_attr( sanitize_text_field( $message_when_done ) ); ?>">
    
    <div class="trad-countdown">
        <div style="display: <?php echo esc_attr( $show_months ); ?>;">
            <span class="trad-number trad-months"></span>
            <span><?php echo esc_html__( 'Months', 'turbo-addons-elementor' ); ?></span>
        </div>
        <div style="display: <?php echo esc_attr( $show_days ); ?>;">
            <span class="trad-number trad-days"></span>
            <span><?php echo esc_html__( 'Days', 'turbo-addons-elementor' ); ?></span>
        </div>
        <div style="display: <?php echo esc_attr( $show_hours ); ?>;">
            <span class="trad-number trad-hours"></span>
            <span><?php echo esc_html__( 'Hours', 'turbo-addons-elementor' ); ?></span>
        </div>
        <div style="display: <?php echo esc_attr( $show_minutes ); ?>;">
            <span class="trad-number trad-minutes"></span>
            <span><?php echo esc_html__( 'Minutes', 'turbo-addons-elementor' ); ?></span>
        </div>
        <div style="display: <?php echo esc_attr( $show_seconds ); ?>;">
            <span class="trad-number trad-seconds"></span>
            <span><?php echo esc_html__( 'Seconds', 'turbo-addons-elementor' ); ?></span>
        </div>
    </div>

    <p class="trad-countdown-over-message" id="trad-timer-closed" 
        style="display: none; 
               font-size: <?php echo esc_attr( sanitize_text_field( $message_font_size ) ); ?>; 
               color: <?php echo esc_attr( sanitize_hex_color( $message_color ) ); ?>; 
               background-color: <?php echo esc_attr( sanitize_hex_color( $background_color ) ); ?>; 
               padding: <?php echo esc_attr( sanitize_text_field( $padding_top ) . ' ' . sanitize_text_field( $padding_right ) . ' ' . sanitize_text_field( $padding_bottom ) . ' ' . sanitize_text_field( $padding_left ) ); ?>; 
               border-radius: <?php echo esc_attr( sanitize_text_field( $border_radius_top ) . ' ' . sanitize_text_field( $border_radius_right ) . ' ' . sanitize_text_field( $border_radius_bottom ) . ' ' . sanitize_text_field( $border_radius_left ) ); ?>;">
        <?php echo wp_kses_post( $message_when_done ); ?>
    </p>
</div>

        <?php
    }
    
}

// Register the widget with Elementor
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new TRAD_Countdown_Timer());