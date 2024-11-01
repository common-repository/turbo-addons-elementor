<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Class TRAD_Team_Slider
 *
 * Elementor widget for displaying team members in a slider.
 *
 * @since 1.0.0
 */
class TRAD_Team_Slider extends Widget_Base {

    public function get_name() {
        return 'team-slider';
    }

    public function get_title() {
        return esc_html__('Team Slider', 'turbo-addons-elementor');
    }

    public function get_icon() {
        return 'eicon-slides'; // Use appropriate Elementor icon
    }

    public function get_categories() {
        return ['turbo-addons']; // Change to your desired category
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Team Members', 'turbo-addons-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'team_member_image',
            [
                'label' => esc_html__('Image', 'turbo-addons-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/images/tard-default-image.png',
                ],
            ]
        );

        $repeater->add_control(
            'team_member_name',
            [
                'label' => esc_html__('Name', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('John Doe', 'turbo-addons-elementor'),
            ]
        );

        $repeater->add_control(
            'team_member_description',
            [
                'label' => esc_html__('Description', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Team Member Description', 'turbo-addons-elementor'),
            ]
        );

        $repeater->add_control(
            'team_member_button_text',
            [
                'label' => esc_html__('Button Text', 'turbo-addons-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'turbo-addons-elementor'),
            ]
        );

        $repeater->add_control(
            'team_member_button_link',
            [
                'label' => esc_html__('Button Link', 'turbo-addons-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'turbo-addons-elementor'),
            ]
        );

        // Team Info Background Color and Border Radius Controls
        $repeater->add_control(
            'info_background_color',
            [
                'label' => esc_html__('Info Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.6)',
            ]
        );

        $repeater->add_control(
            'info_border_radius',
            [
                'label' => esc_html__('Info Border Radius', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
            ]
        );        
        // Name Controls
        $repeater->add_control(
            'name_color',
            [
                'label' => esc_html__('Name Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFD700',
            ]
        );

        $repeater->add_control(
            'name_alignment',
            [
                'label' => esc_html__('Name Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        $repeater->add_control(
            'name_font_size',
            [
                'label' => esc_html__('Name Font Size', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 12,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
            ]
        );

        $repeater->add_control(
            'name_font_weight',
            [
                'label' => esc_html__('Name Font Weight', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '100' => '100',
                    '200' => '200',
                    '300' => '300',
                    '400' => '400',
                    '500' => '500',
                    '600' => '600',
                    '700' => '700',
                    '800' => '800',
                    '900' => '900',
                ],
                'default' => '700',
            ]
        );

        // Description Controls
        $repeater->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f0f0f0',
            ]
        );

        $repeater->add_control(
            'description_alignment',
            [
                'label' => esc_html__('Description Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        $repeater->add_control(
            'description_font_size',
            [
                'label' => esc_html__('Description Font Size', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 12,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
            ]
        );

        $repeater->add_control(
            'description_font_weight',
            [
                'label' => esc_html__('Description Font Weight', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '100' => '100',
                    '200' => '200',
                    '300' => '300',
                    '400' => '400',
                    '500' => '500',
                    '600' => '600',
                    '700' => '700',
                    '800' => '800',
                    '900' => '900',
                ],
                'default' => '400',
            ]
        );

        // Button Controls
        $repeater->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
            ]
        );

        $repeater->add_control(
            'button_alignment',
            [
                'label' => esc_html__('Button Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

        $repeater->add_control(
            'button_text_font_size',
            [
                'label' => esc_html__('Button Text Font Size', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 12,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
            ]
        );

        $repeater->add_control(
            'button_text_font_weight',
            [
                'label' => esc_html__('Button Text Font Weight', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '100' => '100',
                    '200' => '200',
                    '300' => '300',
                    '400' => '400',
                    '500' => '500',
                    '600' => '600',
                    '700' => '700',
                    '800' => '800',
                    '900' => '900',
                ],
                'default' => '600',
            ]
        );

        $repeater->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Button Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff7f50',
            ]
        );

        $this->add_control(
            'team_members',
            [
                'label' => esc_html__('Team Members', 'turbo-addons-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ team_member_name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $members = !empty($settings['team_members']) ? $settings['team_members'] : [];
    
        if (!empty($members)) {
            ?>
            <div class="trad-team-carousel">
                <?php foreach ($members as $member) : 
                    // Check if image is selected and get image HTML, otherwise use the default image URL
                    $image_id = !empty($member['team_member_image']['id']) ? $member['team_member_image']['id'] : '';
                    $image = !empty($image_id) 
                        ? wp_get_attachment_image($image_id, 'full') 
                        : '<img src="' . esc_url(TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/images/tard-default-image.png') . '" alt="' . esc_attr(!empty($member['team_member_name']) ? $member['team_member_name'] : 'Default Image') . '">';
    
                    // Define allowed HTML tags for the image output
                    $allowed_html = [
                        'img' => [
                            'src' => [],
                            'alt' => [],
                            'class' => [],
                            'style' => [],
                        ],
                    ];
    
                    // Escape the image output
                    // $image = wp_kses($image, $allowed_html);
    
                    // Sanitize other member data
                    $name = !empty($member['team_member_name']) ? esc_html($member['team_member_name']) : '';
                    $description = !empty($member['team_member_description']) ? esc_html($member['team_member_description']) : '';
                    $button_text = !empty($member['team_member_button_text']) ? esc_html($member['team_member_button_text']) : '';
                    $button_link = !empty($member['team_member_button_link']['url']) ? esc_url($member['team_member_button_link']['url']) : '#';
    
                    // Apply styles from controls
                    $name_color = esc_attr(!empty($member['name_color']) ? $member['name_color'] : '#000');
                    $name_alignment = esc_attr(!empty($member['name_alignment']) ? $member['name_alignment'] : 'left');
                    $name_font_size = esc_attr(!empty($member['name_font_size']['size']) ? $member['name_font_size']['size'] : '16');
                    $name_font_unit = esc_attr(!empty($member['name_font_size']['unit']) ? $member['name_font_size']['unit'] : 'px');
                    $name_font_weight = esc_attr(!empty($member['name_font_weight']) ? $member['name_font_weight'] : 'normal');
    
                    $description_color = esc_attr(!empty($member['description_color']) ? $member['description_color'] : '#000');
                    $description_alignment = esc_attr(!empty($member['description_alignment']) ? $member['description_alignment'] : 'left');
                    $description_font_size = esc_attr(!empty($member['description_font_size']['size']) ? $member['description_font_size']['size'] : '14');
                    $description_font_unit = esc_attr(!empty($member['description_font_size']['unit']) ? $member['description_font_size']['unit'] : 'px');
                    $description_font_weight = esc_attr(!empty($member['description_font_weight']) ? $member['description_font_weight'] : 'normal');
    
                    $button_text_color = esc_attr(!empty($member['button_text_color']) ? $member['button_text_color'] : '#fff');
                    $button_alignment = esc_attr(!empty($member['button_alignment']) ? $member['button_alignment'] : 'center');
                    $button_text_font_size = esc_attr(!empty($member['button_text_font_size']['size']) ? $member['button_text_font_size']['size'] : '16');
                    $button_text_font_unit = esc_attr(!empty($member['button_text_font_size']['unit']) ? $member['button_text_font_size']['unit'] : 'px');
                    $button_text_font_weight = esc_attr(!empty($member['button_text_font_weight']) ? $member['button_text_font_weight'] : 'normal');
                    $button_background_color = esc_attr(!empty($member['button_background_color']) ? $member['button_background_color'] : '#0073aa');
    
                    // Team Info styles
                    $info_background_color = esc_attr(!empty($member['info_background_color']) ? $member['info_background_color'] : '#fff');
                    $info_border_radius = esc_attr(!empty($member['info_border_radius']['size']) ? $member['info_border_radius']['size'] : '0');
                    $info_border_radius_unit = esc_attr(!empty($member['info_border_radius']['unit']) ? $member['info_border_radius']['unit'] : 'px');
                ?>
                    <div class="trad-team-member">
                        <?php echo wp_kses($image, $allowed_html); ?>
                        <div class="trad-team-info" style="background-color: <?php echo esc_attr($info_background_color); ?>; border-radius: <?php echo esc_attr($info_border_radius . $info_border_radius_unit); ?>;">
                            <h3 class="trad-team-title" style="color: <?php echo esc_attr($name_color); ?>; text-align: <?php echo esc_attr($name_alignment); ?>; font-size: <?php echo esc_attr($name_font_size . $name_font_unit); ?>; font-weight: <?php echo esc_attr($name_font_weight); ?>;"><?php echo esc_html($name); ?></h3>
                            <p class="trad-team-description" style="color: <?php echo esc_attr($description_color); ?>; text-align: <?php echo esc_attr($description_alignment); ?>; font-size: <?php echo esc_attr($description_font_size . $description_font_unit); ?>; font-weight: <?php echo esc_attr($description_font_weight); ?>;"><?php echo esc_html($description); ?></p>
                            <a href="<?php echo esc_url($button_link); ?>" class="trad-team-button" style="color: <?php echo esc_attr($button_text_color); ?>; text-align: <?php echo esc_attr($button_alignment); ?>; font-size: <?php echo esc_attr($button_text_font_size . $button_text_font_unit); ?>; font-weight: <?php echo esc_attr($button_text_font_weight); ?>; background-color: <?php echo esc_attr($button_background_color); ?>;"><?php echo esc_html($button_text); ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
        }
    }
    
    
    protected function _content_template() {
        ?>
        <#
        var members = settings.team_members;
        if (members.length) { #>
            <div class="trad-team-carousel">
                <# for (var i = 0; i < members.length; i++) { #>
                    <div class="trad-team-member">
                        <img src="{{ members[i].team_member_image.url }}" alt="{{ members[i].team_member_name }}">
                        <div class="trad-team-info" style="background-color: {{ members[i].info_background_color }}; border-radius: {{ members[i].info_border_radius.size }}{{ members[i].info_border_radius.unit }};">
                            <h3 class="trad-team-title" style="color: {{ members[i].name_color }}; text-align: {{ members[i].name_alignment }}; font-size: {{ members[i].name_font_size.size }}{{ members[i].name_font_size.unit }}; font-weight: {{ members[i].name_font_weight }};">{{{ members[i].team_member_name }}}</h3>
                            <p class="trad-team-description" style="color: {{ members[i].description_color }}; text-align: {{ members[i].description_alignment }}; font-size: {{ members[i].description_font_size.size }}{{ members[i].description_font_size.unit }}; font-weight: {{ members[i].description_font_weight }};">{{{ members[i].team_member_description }}}</p>
                            <a href="{{ members[i].team_member_button_link.url }}" class="trad-team-button" style="color: {{ members[i].button_text_color }}; text-align: {{ members[i].button_alignment }}; font-size: {{ members[i].button_text_font_size.size }}{{ members[i].button_text_font_size.unit }}; font-weight: {{ members[i].button_text_font_weight }}; background-color: {{ members[i].button_background_color }};">{{{ members[i].team_member_button_text }}}</a>
                        </div>
                    </div>
                <# } #>
            </div>
        <#
        } #>
        <?php
    }
}

// Register the widget with Elementor.
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Team_Slider() );
