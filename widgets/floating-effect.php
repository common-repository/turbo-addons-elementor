<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class TRAD_Image_Floating_Effect extends Widget_Base {

    public function get_name() {
        return 'trad-image-floating-effect';
    }

    public function get_title() {
        return esc_html__( 'Image Floating Effect', 'turbo-addons-elementor' );
    }

    public function get_icon() {
        return 'eicon-image';
    }

    public function get_categories() {
        return [ 'turbo-addons' ];
    }

    public function _register_controls() {

        // Image Control
        $this->start_controls_section(
            'image_section',
            [
                'label' => esc_html__( 'Image', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Choose Image', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Animation Controls
        $this->start_controls_section(
            'animation_section',
            [
                'label' => esc_html__( 'Animation Controls', 'turbo-addons-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Animation Type: Y Movement, X Movement, Rotate, 360 Rotation
        $this->add_control(
            'animation_type',
            [
                'label' => esc_html__( 'Animation Type', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'y_movement' => esc_html__( 'Y-axis Movement', 'turbo-addons-elementor' ),
                    'x_movement' => esc_html__( 'X-axis Movement', 'turbo-addons-elementor' ),
                    'rotate' => esc_html__( 'Rotate (180 Degrees)', 'turbo-addons-elementor' ),
                    'spin' => esc_html__( '360-degree Rotation', 'turbo-addons-elementor' ),
                ],
                'default' => 'y_movement',
            ]
        );

        // Y Movement Speed and Range
        $this->add_control(
            'y_movement_speed',
            [
                'label' => esc_html__( 'Y-Movement Speed (seconds)', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    's' => [
                        'min' => 0.1,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 2,
                ],
                'condition' => [
                    'animation_type' => 'y_movement',
                ],
            ]
        );

        $this->add_control(
            'y_movement_range',
            [
                'label' => esc_html__( 'Y-Movement Range (px)', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 20,
                ],
                'condition' => [
                    'animation_type' => 'y_movement',
                ],
            ]
        );

        // X Movement Speed and Range
        $this->add_control(
            'x_movement_speed',
            [
                'label' => esc_html__( 'X-Movement Speed (seconds)', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    's' => [
                        'min' => 0.1,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 2,
                ],
                'condition' => [
                    'animation_type' => 'x_movement',
                ],
            ]
        );

        $this->add_control(
            'x_movement_range',
            [
                'label' => esc_html__( 'X-Movement Range (px)', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 20,
                ],
                'condition' => [
                    'animation_type' => 'x_movement',
                ],
            ]
        );

        // Rotate Speed
        $this->add_control(
            'rotate_speed',
            [
                'label' => esc_html__( 'Rotate Speed (seconds)', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    's' => [
                        'min' => 0.1,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 2,
                ],
                'condition' => [
                    'animation_type' => 'rotate',
                ],
            ]
        );

        // Spin (360 Rotation) Speed
        $this->add_control(
            'spin_speed',
            [
                'label' => esc_html__( 'Spin Speed (seconds)', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    's' => [
                        'min' => 0.1,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 5,
                ],
                'condition' => [
                    'animation_type' => 'spin',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $image = $settings['image']['url'];
        $animation_type = $settings['animation_type'];

        // Set animation class based on selected type
        $animation_class = '';
        $speed = 2; // Default speed for all animations
        $movement_range = 20; // Default movement range

        if ( 'y_movement' === $animation_type ) {
            $animation_class = 'trad-y-movement-animation';
            $speed = $settings['y_movement_speed']['size'];
            $movement_range = $settings['y_movement_range']['size'];
        } elseif ( 'x_movement' === $animation_type ) {
            $animation_class = 'trad-x-movement-animation';
            $speed = $settings['x_movement_speed']['size'];
            $movement_range = $settings['x_movement_range']['size'];
        } elseif ( 'rotate' === $animation_type ) {
            $animation_class = 'trad-rotate-animation';
            $speed = $settings['rotate_speed']['size'];
        } elseif ( 'spin' === $animation_type ) {
            $animation_class = 'trad-spin-animation';
            $speed = $settings['spin_speed']['size'];
        }

        ?>
        <div class="trad-floating-image <?php echo esc_attr( $animation_class ); ?>" style="--animation-speed: <?php echo esc_attr( $speed ); ?>s; --movement-range: <?php echo esc_attr( $movement_range ); ?>px;">
            <img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'Floating Image', 'turbo-addons-elementor' ); ?>" />
        </div>
        <?php
    }
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Image_Floating_Effect() );
