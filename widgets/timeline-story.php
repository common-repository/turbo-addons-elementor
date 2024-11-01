<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class TRAD_Timeline_Story extends Widget_Base {

    public function get_name() {
        return 'trad-timeline-story';
    }

    public function get_title() {
        return esc_html__('Turbo Timeline', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return ['turbo-addons'];
    }

    protected function _register_controls() {

        // Adding the repeater to the widget control
        $this->start_controls_section(
            'timeline_story_content',
            [
                'label' => esc_html__('Timeline Items', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Create a repeater control for multiple timeline items
        $repeater = new Repeater();

        // Title
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Timeline Title', 'turbo-addons-elementor'),
                'label_block' => true,
            ]
        );

        // Description
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Timeline Description', 'turbo-addons-elementor'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'media_type',
            [
                'label' => esc_html__('Choose Media Type', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'turbo-addons-elementor'),
                    'icon' => esc_html__('Icon', 'turbo-addons-elementor'),
                ],
            ]
        );

        // Image
        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'turbo-addons-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'media_type' => 'image', // Display only if 'image' is selected
                ],
            ]
        );

        $repeater->add_control(
            'image_alignment',
            [
                'label' => __( 'Image Alignment', 'turbo-addons-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'turbo-addons-elementor' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                // 'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-image' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        

        // Icon Selection Control (conditionally shown if 'Icon' is selected)
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-down', // Default to a down arrow
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'media_type' => 'icon', // Display only if 'icon' is selected
                ],
            ]
        );

        $repeater->add_control(
            'icon_alignment',
            [
                'label' => esc_html__('Icon Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'left',
                'condition' => [
                    'media_type' => 'icon',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-icon' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
    
        // Position: Left or Right
        $repeater->add_control(
            'position',
            [
                'label' => esc_html__('Position', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Left', 'turbo-addons-elementor'),
                    'right' => esc_html__('Right', 'turbo-addons-elementor'),
                ],
            ]
        );

        // Repeater control to add multiple timeline items
        $this->add_control(
            'timeline_items',
            [
                'label' => esc_html__('Timeline Items', 'turbo-addons-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}', // Display title in repeater
                'default' => [
                    [
                        'title' => esc_html__('First Timeline Event', 'turbo-addons-elementor'),
                        'description' => esc_html__('Description for the first event.', 'turbo-addons-elementor'),
                        'media_type' => 'image',
                        'image' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
                        'position' => 'left',
                    ],
                    [
                        'title' => esc_html__('Second Timeline Event', 'turbo-addons-elementor'),
                        'description' => esc_html__('Description for the second event.', 'turbo-addons-elementor'),
                        'media_type' => 'icon',
                        'icon' => ['value' => 'fas fa-check'],
                        'position' => 'right',
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Adding the repeater to the widget control
        $this->start_controls_section(
            'trad_timeline_story_style',
            [
                'label' => esc_html__('Background Style', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'trad_story_line_container_background_color',
            [
                'label' => esc_html__('Container Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FDF3F3',
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one .trad-content-story-line-temp-one' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Left item before pseudo-element border color
        $this->add_control(
            'left_before_border_color',
            [
                'label' => esc_html__('Left Arrow Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff', // Default to white
                'selectors' => [
                    '{{WRAPPER}} .trad-left-story-line-temp-one::before' => 'border-color: transparent transparent transparent {{VALUE}};',
                ],
            ]
        );

        // Right item before pseudo-element border color
        $this->add_control(
            'right_before_border_color',
            [
                'label' => esc_html__('Right Arrow Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff', // Default to white
                'selectors' => [
                    '{{WRAPPER}} .trad-right-story-line-temp-one::before' => 'border-color: transparent {{VALUE}} transparent transparent;',
                ],
            ]
        );

        $this->add_control(
            'trad_dot_bg_color',
            [
                'label' => esc_html__('Circle Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => 'red',
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one .trad-container-story-line-temp-one::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        
        $this->add_control(
            'border_color',
            [
                'label' => __( 'Border Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1c155c', // Default border color
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one .trad-container-story-line-temp-one::after' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'trad_timeline_story_vertical_line_bg_color',
            [
                'label' => __( 'Line Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1c155c', // Default border color
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'trad_timeline_story_dot_style',
            [
                'label' => esc_html__('Circle Style', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        // Border Width Control
        $this->add_control(
            'border_width',
            [
                'label' => __( 'Border Width', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 4,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one .trad-container-story-line-temp-one::after' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        // Border Style Control
        $this->add_control(
            'border_style',
            [
                'label' => __( 'Border Style', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'solid', // Default border style
                'options' => [
                    'none' => __( 'None', 'turbo-addons-elementor' ),
                    'solid' => __( 'Solid', 'turbo-addons-elementor' ),
                    'dotted' => __( 'Dotted', 'turbo-addons-elementor' ),
                    'dashed' => __( 'Dashed', 'turbo-addons-elementor' ),
                    'double' => __( 'Double', 'turbo-addons-elementor' ),
                    'groove' => __( 'Groove', 'turbo-addons-elementor' ),
                    'ridge' => __( 'Ridge', 'turbo-addons-elementor' ),
                    'inset' => __( 'Inset', 'turbo-addons-elementor' ),
                    'outset' => __( 'Outset', 'turbo-addons-elementor' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one .trad-container-story-line-temp-one::after' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'trad_left_dot_position',
            [
                'label' => __( 'Left Dot', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => -16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one .trad-container-story-line-temp-one::after' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'trad_right_dot_position',
            [
                'label' => __( 'Right Dot', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => -16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one .trad-right-story-line-temp-one::after' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'trad_timeline_story_vertical_line_width',
            [
                'label' => esc_html__('Vertical Line Width', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px', // Default unit
                    'size' => 6, // Default size
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-line-temp-one::after' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'trad_timeline_story_image_or_icon',
            [
                'label' => esc_html__('Image or Icon', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_width',
            [
                'label' => esc_html__('Image Width', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px', // Default unit
                    'size' => 100, // Default size
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-content-story-line-temp-one img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'image_height',
            [
                'label' => esc_html__('Image Height', 'turbo-addons-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh', '%'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px', // Default unit
                    'size' => 100, // Default size
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-content-story-line-temp-one img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'image_border_radius',
            [
                'label' => esc_html__('Image Border Radius', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px', // Default unit
                    'size' => 10, // Default size
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-content-story-line-temp-one img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'turbo-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ddd',
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .trad-timeline-story-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

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
                    'size' => 25,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .trad-timeline-story-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'trad_timeline_story_typography',
            [
                'label' => esc_html__('Typography', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'trad_timeline_story_title_typography', // Unique name for the control
                'label'    => esc_html__( 'Title Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-timeline-story-title',
            ]
        );

        // Alignment Control for Title
        $this->add_control(
            'trad_timeline_story_title_alignment',
            [
                'label' => esc_html__('Title Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'turbo-addons-elementor' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'turbo-addons-elementor' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'turbo-addons-elementor' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'turbo-addons-elementor' ),
                        'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left', // Default alignment
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        

        $this->add_control(
            'trad_timeline_story_title_color',
            [
                'label' => esc_html__('Title Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ddd', // Default to white
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'trad_timeline_story_description_typography', // Unique name for the control
                'label'    => esc_html__( 'Description Typography', 'turbo-addons-elementor' ),
                'selector' => '{{WRAPPER}} .trad-timeline-story-description',
            ]
        );

        // Alignment Control for Title
        $this->add_control(
            'trad_timeline_story_description_alignment',
            [
                'label' => esc_html__('Description Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'turbo-addons-elementor' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'turbo-addons-elementor' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'turbo-addons-elementor' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'turbo-addons-elementor' ),
                        'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left', // Default alignment
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-description' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        

        $this->add_control(
            'trad_timeline_story_description_color',
            [
                'label' => esc_html__('Description Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ddd', // Default to white
                'selectors' => [
                    '{{WRAPPER}} .trad-timeline-story-description' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( !empty( $settings['timeline_items'] ) ) {
            echo '<div class="trad-timeline-story-line-temp-one">';
            foreach ( $settings['timeline_items'] as $index => $item ) {

                // Determine if the container is left or right
                $position_class = $item['position'] == 'left' ? 'trad-container-story-line-temp-one trad-left-story-line-temp-one' : 'trad-container-story-line-temp-one trad-right-story-line-temp-one';

                ?>
                <div class="<?php echo esc_attr( $position_class ); ?>">
                    <div class="trad-content-story-line-temp-one">
                        <?php
                            // Show the image if selected
                            if ( $item['media_type'] == 'image' && !empty( $item['image']['url'] ) ) : ?>
                            <div class="trad-timeline-story-image">
                                <img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>">
                            </div>
                                
                            <?php
                            // Show the icon if selected
                            elseif ( $item['media_type'] == 'icon' && !empty( $item['icon']['value'] ) ) : ?>
                            <?php 
                                echo '<span class="trad-timeline-story-icon">';
                                    Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] );
                                echo '</span>';
                            ?>
                        <?php endif; ?>
                            <h2 class="trad-timeline-story-title"><?php echo esc_html( $item['title'] ); ?></h2>
                            <p class="trad-timeline-story-description"><?php echo esc_html( $item['description'] ); ?></p>
                    </div>
                </div>
                <?php
            }
            echo '</div>';
        }
    }

}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Timeline_Story() );
