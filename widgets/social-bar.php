<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class TRAD_Social_Bar extends Widget_Base {

    public function get_name() {
        return 'trad-social-bar';
    }

    public function get_title() {
        return esc_html__('Social Bar', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-social-icons';
    }

    public function get_categories() {
        return ['turbo-addons'];
    }

    public function get_style_depends() {
        return ['custom-widget-css'];
    }

    protected function _register_controls() {
        // Social Links
        $repeater = new Repeater();

        $repeater->add_control(
            'social_icon',
            [
                'label' => esc_html__('Icon', 'turbo-addons-elementor'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-facebook',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'social_link',
            [
                'label' => esc_html__('Link', 'turbo-addons-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'turbo-addons-elementor'),
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .trad-social-icon[data-id="{{ID}}"] i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->start_controls_section(
            'social_content',
            [
                'label' => esc_html__('Social Links', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'social_list',
            [
                'label' => esc_html__('Social Links', 'turbo-addons-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_icon' => ['value' => 'fas fa-phone', 'library' => 'solid'],
                        'social_link' => ['url' => '#'],
                        'icon_color' => '#000',
                    ],
                ],
                'title_field' => '{{{ social_icon.value }}}',
            ]
        );

        $this->end_controls_section();

        // Icon Style
        $this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__('Icon Style', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
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
            ]
        );

        $this->add_control(
            'icon_space',
            [
                'label' => esc_html__('Space Between Icons', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
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
            ]
        );

        // New Icon Alignment Control
        $this->add_control(
            'icon_alignment',
            [
                'label' => esc_html__('Icon Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'left' => esc_html__('Left', 'turbo-addons-elementor'),
                    'center' => esc_html__('Center', 'turbo-addons-elementor'),
                    'right' => esc_html__('Right', 'turbo-addons-elementor'),
                ],
                'default' => 'left',
            ]
        );      

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        // Handle defaults if not provided
        $social_list = !empty($settings['social_list']) ? $settings['social_list'] : [
            [
                'social_icon' => ['value' => 'fa fa-facebook', 'library' => 'fa-solid'],
                'social_link' => ['url' => '#'],
                'icon_color' => '#000',
            ],
        ];

        $icon_space = isset($settings['icon_space']['size']) ? absint($settings['icon_space']['size']) . 'px' : '10px';
        // Handling alignment based on user selection
        $alignment_map = [
            'left' => 'flex-start',
            'center' => 'center',
            'right' => 'flex-end',
        ];
        $icon_alignment = isset($settings['icon_alignment']) ? $alignment_map[$settings['icon_alignment']] : 'flex-start';

        ?>
         <div class="trad-social-icons" style="display: flex; justify-content: <?php echo esc_attr($icon_alignment); ?>; gap: <?php echo esc_attr($icon_space); ?>;">
            <?php foreach ($social_list as $item): 
                $icon_value = isset($item['social_icon']['value']) ? esc_attr($item['social_icon']['value']) : 'fa fa-facebook'; // default icon if empty
                $icon_color = isset($item['icon_color']) ? esc_attr($item['icon_color']) : '#000'; // default color if empty
                $link_url = isset($item['social_link']['url']) ? esc_url($item['social_link']['url']) : '#'; // default link if empty
            ?>
            <a class="trad-social-icon" 
            href="<?php echo esc_url($link_url); ?>" 
            target="_blank" 
            data-id="<?php echo esc_attr($item['_id']); ?>" 
            style="color: <?php echo esc_attr($icon_color); ?>;">
                <i class="<?php echo esc_attr($icon_value); ?>" style="color: <?php echo esc_attr($icon_color); ?>"></i>
                <span class="trad-social-title"><?php echo esc_html($item['social_icon']['value']); ?></span>
            </a>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new TRAD_Social_Bar());