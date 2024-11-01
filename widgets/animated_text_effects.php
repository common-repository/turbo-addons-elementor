<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class TRAD_Text_Animation_Widget extends Widget_Base {

    public function get_name() {
        return 'trad_text_animation_widget';
    }

    public function get_title() {
        return esc_html__( 'Text Animation', 'turbo-addons-elementor' ); // Escaped output
    }

    public function get_icon() {
        return 'eicon-animation-text';
    }

    public function get_categories() {
        return [ 'turbo-addons' ];
    }

    public function get_script_depends() {
        return [ 'typed-js', 'turbo-addons-elementor' ];
    }

    public function get_style_depends() {
        return [ 'text-animation-style' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'turbo-addons-elementor' ), // Escaped output
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $this->add_control(
            'static_text',
            [
                'label' => esc_html__( 'Static Text', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( "We have", 'turbo-addons-elementor' ), // Escaped output
                'placeholder' => esc_html__( 'Enter your static text', 'turbo-addons-elementor' ), // Escaped output
            ]
        );
    
        $this->add_control(
            'animated_texts',
            [
                'label' => esc_html__( 'Animated Texts', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( "Not_Remove_this_text,Graphics Designer, Web Designer,Web Developer", 'turbo-addons-elementor' ), // Escaped output
                'placeholder' => esc_html__( 'Enter animated texts separated by commas', 'turbo-addons-elementor' ), // Escaped output
            ]
        );
    
        $this->add_control(
            'type_speed',
            [
                'label' => esc_html__( 'Type Speed', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
            ]
        );
    
        $this->add_control(
            'back_speed',
            [
                'label' => esc_html__( 'Back Speed', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 40,
            ]
        );
    
        $this->add_control(
            'loop',
            [
                'label' => esc_html__( 'Loop', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'turbo-addons-elementor' ), // Escaped output
                'label_off' => esc_html__( 'No', 'turbo-addons-elementor' ), // Escaped output
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
    
        $this->end_controls_section();
    
        // Style Controls
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'turbo-addons-elementor' ), // Escaped output
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
    
        // Static Text Style
        $this->add_control(
            'static_text_style',
            [
                'label' => esc_html__( 'Static Text', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
    
        $this->add_control(
            'static_text_color',
            [
                'label' => esc_html__( 'Color', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .trad-text-animation-widget .trad-iam' => 'color: {{VALUE}};',
                ],
            ]
        );
    
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'static_text_typography',
                'selector' => '{{WRAPPER}} .trad-text-animation-widget .trad-iam',
            ]
        );
    
        // Animated Text Style
        $this->add_control(
            'animated_text_style',
            [
                'label' => esc_html__( 'Animated Text', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
    
        $this->add_control(
            'animated_text_color',
            [
                'label' => esc_html__( 'Color', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff1e00',
                'selectors' => [
                    '{{WRAPPER}} .trad-text-animation-widget .trad-text' => 'color: {{VALUE}};',
                ],
            ]
        );
    
        $this->add_control(
            'animated_text_cursor_color',
            [
                'label' => esc_html__( 'Cursor Color', 'turbo-addons-elementor' ), // Escaped output
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff1e00',
                'selectors' => [
                    '{{WRAPPER}} .trad-typed-cursor' => 'color: {{VALUE}};',
                ],
            ]
        );
    
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'animated_text_typography',
                'selector' => '{{WRAPPER}} .trad-text-animation-widget .trad-text',
            ]
        );
    
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings_for_display();
    
        // Prepare variables with escaping
        $static_text = esc_html( $settings['static_text'] );
        $animated_texts = array_map( 'esc_js', explode( ',', $settings['animated_texts'] ) );
        $type_speed = absint( $settings['type_speed'] );
        $back_speed = absint( $settings['back_speed'] );
        $loop = $settings['loop'] === 'yes' ? 'true' : 'false';
    
        // Prepare JSON-encoded strings and other data attributes
        $data_strings = esc_attr( json_encode( $animated_texts ) );
        ?>
        <div class="trad-text-animation-widget">
            <div class="trad-iam"><?php echo esc_html( $static_text ); ?></div>
            <div class="trad-text"
                 data-strings="<?php echo esc_attr( $data_strings ); ?>"
                 data-type-speed="<?php echo esc_attr( $type_speed ); ?>"
                 data-back-speed="<?php echo esc_attr( $back_speed ); ?>"
                 data-loop="<?php echo esc_attr( $loop ); ?>">
            </div>
        </div>
        <?php
    }

}

// Register the widget with Elementor.
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Text_Animation_Widget() );
