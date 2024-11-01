<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TRAD_Preview_Card_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'trad-preview-card';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Preview Card', 'turbo-addons-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-lightbox';
	}

	/**
	 * Get script dependencies.
	 *
	 * Retrieve the scripts the widget requires.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget scripts.
	 */
	public function get_script_depends() {
		return [
			'turbo-script'
		];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'turbo-addons' ];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->trad_register_image_controls();
		$this->trad_register_content_controls();
		$this->trad_register_badge_controls();
		$this->trad_register_button_controls();
		$this->trad_register_card_style_controls();
		$this->trad_register_button_style_controls();
		$this->trad_register_badge_top_controls();
		$this->trad_register_badge_bottom_controls();
	}

	protected function trad_register_image_controls() {
		$this->start_controls_section(
			'image_section',
			[
				'label' => esc_html__( 'Image', 'turbo-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Choose Image', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'show_image_link',
			[
				'label'        => esc_html__( 'Show Image Link', 'turbo-addons-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'turbo-addons-elementor' ),
				'label_off'    => esc_html__( 'Hide', 'turbo-addons-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'image_link',
			[
				'label'       => esc_html__( 'Image Link', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'turbo-addons-elementor' ),
				'show_external' => true,
				'default'     => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition'   => [
					'show_image_link' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function trad_register_content_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'turbo-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_title',
			[
				'label'       => esc_html__( 'Title', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Default title', 'turbo-addons-elementor' ),
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your title here', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'show_divider',
			[
				'label'        => esc_html__( 'Show Divider', 'turbo-addons-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'turbo-addons-elementor' ),
				'label_off'    => esc_html__( 'Hide', 'turbo-addons-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'item_description',
			[
				'label'       => esc_html__( 'Description', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => esc_html__( 'Default description', 'turbo-addons-elementor' ),
				'placeholder' => esc_html__( 'Type your description here', 'turbo-addons-elementor' ),
			]
		);

		$this->end_controls_section();
	}

	protected function trad_register_badge_controls() {
		$this->start_controls_section(
			'badge_section',
			[
				'label' => esc_html__( 'Badge', 'turbo-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_top_badge',
			[
				'label'        => esc_html__( 'Show Top Badge', 'turbo-addons-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'turbo-addons-elementor' ),
				'label_off'    => esc_html__( 'Hide', 'turbo-addons-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'top_badge_text',
			[
				'label'       => esc_html__( 'Top Badge Text', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'On Sale!', 'turbo-addons-elementor' ),
				'placeholder' => esc_html__( 'Type your text here', 'turbo-addons-elementor' ),
				'condition'   => [
					'show_top_badge' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_bottom_badge',
			[
				'label'        => esc_html__( 'Show Bottom Badge', 'turbo-addons-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'turbo-addons-elementor' ),
				'label_off'    => esc_html__( 'Hide', 'turbo-addons-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'bottom_badge_text',
			[
				'label'       => esc_html__( 'Bottom Badge Text', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( '$19.99', 'turbo-addons-elementor' ),
				'placeholder' => esc_html__( 'Type your text here', 'turbo-addons-elementor' ),
				'condition'   => [
					'show_bottom_badge' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function trad_register_button_controls() {
		$this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'turbo-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'       => esc_html__( 'Link', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'turbo-addons-elementor' ),
				'show_external' => true,
				'default'     => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Text', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Buy Now', 'turbo-addons-elementor' ),
				'placeholder' => esc_html__( 'Type your text here', 'turbo-addons-elementor' ),
			]
		);

		$this->end_controls_section();
	}

	// ====================Box Style Tab
	// ====================================================//
	protected function trad_register_card_style_controls() {
		// Style Controls
		$this->start_controls_section(
			'preview_card_style_section',
				[
					'label' => esc_html__( 'Preview Card', 'turbo-addons-elementor' ), // Escaped output
					'tab' => Controls_Manager::TAB_STYLE,
				]
		);

		$this->add_control(
			'preview_card_background_color',
			[
				'label' => esc_html__('Preview Card Background Color', 'turbo-addons-elementor'),
				'type' =>  Controls_Manager::COLOR,
				'default' => '#FFF9F9',
				'selectors' => [
					'{{WRAPPER}} .trad-image-card' => 'background-color: {{VALUE}};',
				],

			]
		);

		$this->add_control(
			'preview_card_border_radius',
			[
				'label'   => esc_html__( 'Preview Card Radius', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'default'    => [
					'top'    => '1',
					'right'  => '1',
					'bottom' => '1',
					'left'   => '1',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .trad-image-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		// Add the typography control for the title

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'preview_card_title_typography',
                'label' => __('Priview Card Title Typography', 'turbo-addons-elementor'),
                'selector' => '{{WRAPPER}} .trad-preview-card-title h2',
            ]
        );

		$this->add_control(
            'preview_card_title_color',
            [
                'label' => __('Preview Card Title Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .trad-preview-card-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
            'preview_card_title_alignment',
            [
                'label' => __('Preview Card Title Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .trad-preview-card-title h2' => 'text-align: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'preview_card_description_typography',
                'label' => __('Priview Card Description Typography', 'turbo-addons-elementor'),
                'selector' => '{{WRAPPER}} .trad-preview-card-excerpt p',
            ]
        );

		$this->add_control(
            'preview_card_description_color',
            [
                'label' => __('Preview Card Description Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .trad-preview-card-excerpt p' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
            'preview_card_description_alignment',
            [
                'label' => __('Preview Card Description Alignment', 'turbo-addons-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'turbo-addons-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .trad-preview-card-excerpt p' => 'text-align: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
            'divider_background_color',
            [
                'label' => __('Divider Background Color', 'turbo-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f0f0f0',
                'selectors' => [
                    '{{WRAPPER}} .trad-preview-card-divider' => 'background-color: {{VALUE}};',
                ],
				'condition' => [
					'show_divider' => 'yes',
				],
            ]
        );

        $this->add_responsive_control(
            'divider_width',
            [
                'label' => __('Width', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 53,
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-preview-card-divider' => 'width: {{SIZE}}{{UNIT}};',
                ],
				'condition' => [
					'show_divider' => 'yes',
				],
            ]
        );

        // Height Control
        $this->add_responsive_control(
            'divider_height',
            [
                'label' => __('Height', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'default' => [
                    'size' => 2,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-preview-card-divider' => 'height: {{SIZE}}{{UNIT}};',
                ],
				'condition' => [
					'show_divider' => 'yes',
				],
            ]
        );

        // Positioning Controls for Left, Right, Top, Bottom
        $this->add_responsive_control(
            'divider_position_left',
            [
                'label' => __('Divider Left', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-preview-card-divider' => 'left: {{SIZE}}{{UNIT}};',
                ],
				'condition' => [
					'show_divider' => 'yes',
				],
            ]
        );

        $this->add_responsive_control(
            'divider_position_top',
            [
                'label' => __('Divider Top', 'turbo-addons-elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                ],
				'default' => [
                    'size' => 7,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .trad-preview-card-divider' => 'top: {{SIZE}}{{UNIT}};',
                ],
				'condition' => [
					'show_divider' => 'yes',
				],
            ]
        );		


		$this->end_controls_section();
	}

	protected function trad_register_button_style_controls() {
		// Style Controls
		$this->start_controls_section(
			'button_style_section',
				[
					'label' => esc_html__( 'Button Style', 'turbo-addons-elementor' ), // Escaped output
					'tab' => Controls_Manager::TAB_STYLE,
				]
		);

		$this->add_control(
			'enable_hover',
			[
				'label' => esc_html__('Enable Hover', 'turbo-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'turbo-addons-elementor'),
				'label_off' => esc_html__('No', 'turbo-addons-elementor'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_responsive_control(
			'button_font_size',
			[
				'label'      => esc_html__('Button Font Size', 'turbo-addons-elementor'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
					'em' => [
						'min' => 1,
						'max' => 10,
					],
					'%'  => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors'  => [
					'{{WRAPPER}} .button-readmore' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__('Button Text Color', 'turbo-addons-elementor'),
				'type' =>  Controls_Manager::COLOR,
				'default' => '#FFFFFF',
				'selectors' => [
					'{{WRAPPER}} .button-readmore' => 'color: {{VALUE}};',
				],

			]
		);

		// Button Text Hover Color Control
		$this->add_control(
			'button_text_hover_color',
			[
				'label' => esc_html__('Button Hover Text Color', 'turbo-addons-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '#FF0000',
				'selectors' => [
					'{{WRAPPER}} .button-readmore:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'enable_hover' => 'yes',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__('Button Color', 'turbo-addons-elementor'),
				'type' =>  Controls_Manager::COLOR,
				'default' => '#001166',
				'selectors' => [
					'{{WRAPPER}} .button-readmore' => 'background-color: {{VALUE}};',
				],

			]
		);

		// Button Hover Background Color Control
		$this->add_control(
			'button_hover_background_color',
			[
				'label' => esc_html__('Button Hover Background Color', 'turbo-addons-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '#FF0000',
				'selectors' => [
					'{{WRAPPER}} .button-readmore:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'enable_hover' => 'yes',
				],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label' => esc_html__('Button Border Color', 'turbo-addons-elementor'),
				'type'  => Controls_Manager::COLOR,
				'default' => '#001166',
				'selectors' => [
					'{{WRAPPER}} .button-readmore' => 'border-color: {{VALUE}}',
				],
			]
		);

		// Button Hover Border Color Control
		$this->add_control(
			'button_hover_border_color',
			[
				'label' => esc_html__('Button Hover Border Color', 'turbo-addons-elementor'),
				'type'  => Controls_Manager::COLOR,
				'default' => '#FF0000',
				'selectors' => [
					'{{WRAPPER}} .button-readmore:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'enable_hover' => 'yes',
				],
			]
		);		

		// Button Border Width Control
		$this->add_responsive_control(
			'button_border_width',
			[
				'label'   => esc_html__( 'Button Border Width', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default'    => [
					'top'    => '1',
					'right'  => '1',
					'bottom' => '1',
					'left'   => '1',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .button-readmore' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Border Width on Hover Control
		$this->add_responsive_control(
			'button_hover_border_width',
			[
				'label'   => esc_html__( 'Button Hover Border Width', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default'    => [
					'top'    => '1',
					'right'  => '1',
					'bottom' => '1',
					'left'   => '1',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .button-readmore:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Border Radius Control
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label'   => esc_html__( 'Button Border Radius', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default'    => [
					'top'    => '1',
					'right'  => '1',
					'bottom' => '1',
					'left'   => '1',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .button-readmore' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Border Radius on Hover Control
		$this->add_responsive_control(
			'button_hover_border_radius',
			[
				'label'   => esc_html__( 'Button Hover Border Radius', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'default'    => [
					'top'    => '1',
					'right'  => '1',
					'bottom' => '1',
					'left'   => '1',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .button-readmore:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Border Style Control
		$this->add_control(
			'button_border_style',
			[
				'label'   => esc_html__( 'Border Style', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'solid'  => esc_html__( 'Solid', 'turbo-addons-elementor' ),
					'dashed' => esc_html__( 'Dashed', 'turbo-addons-elementor' ),
					'dotted' => esc_html__( 'Dotted', 'turbo-addons-elementor' ),
					'double' => esc_html__( 'Double', 'turbo-addons-elementor' ),
					'none'   => esc_html__( 'None', 'turbo-addons-elementor' ),
				],
				'default' => 'solid',
				'selectors' => [
					'{{WRAPPER}} .button-readmore' => 'border-style: {{VALUE}};',
				],
			]
		);

		// Button Border Style on Hover Control
		$this->add_control(
			'button_hover_border_style',
			[
				'label'   => esc_html__( 'Button Hover Border Style', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'solid'  => esc_html__( 'Solid', 'turbo-addons-elementor' ),
					'dashed' => esc_html__( 'Dashed', 'turbo-addons-elementor' ),
					'dotted' => esc_html__( 'Dotted', 'turbo-addons-elementor' ),
					'double' => esc_html__( 'Double', 'turbo-addons-elementor' ),
					'none'   => esc_html__( 'None', 'turbo-addons-elementor' ),
				],
				'default' => 'solid',
				'selectors' => [
					'{{WRAPPER}} .button-readmore:hover' => 'border-style: {{VALUE}};',
				],
			]
		);		

		$this->end_controls_section();
	}

	protected function trad_register_badge_top_controls() {
		// Style Controls
		$this->start_controls_section(
			'badge_top',
			[
				'label' => esc_html__( 'Badge Top', 'turbo-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'badge_top_background_color',
			[
				'label' => esc_html__('Badge Background Color', 'turbo-addons-elementor'),
				'type' =>  Controls_Manager::COLOR,
				'default' => '#001166',
				'selectors' => [
					'{{WRAPPER}} .trad-top-price-badge ' => 'background-color: {{VALUE}};',
				],

			]
		);

		$this->add_control(
			'badge_top_text_color',
			[
				'label' => esc_html__('Badge Text Color', 'turbo-addons-elementor'),
				'type' =>  Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .trad-top-price-badge' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_responsive_control(
			'badge_top_font_size',
			[
				'label'      => esc_html__('Badge Font Size', 'turbo-addons-elementor'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
					'em' => [
						'min' => 1,
						'max' => 10,
					],
					'%'  => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors'  => [
					'{{WRAPPER}} .trad-top-price-badge' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Badge Border Radius Control
		$this->add_responsive_control(
			'badge_top_border_radius',
			[
				'label'   => esc_html__( 'Badge Border Radius', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'default'    => [
					'top'    => '50',
					'right'  => '50',
					'bottom' => '50',
					'left'   => '50',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .trad-top-price-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'badge_top_position_top',
			[
				'label'      => esc_html__('Top', 'turbo-addons-elementor'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range'      => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 6, 
				],
				'selectors'  => [
					'{{WRAPPER}} .trad-top-price-badge' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'badge_top_position_right',
			[
				'label'      => esc_html__('Right', 'turbo-addons-elementor'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range'      => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14, 
				],
				'selectors'  => [
					'{{WRAPPER}} .trad-top-price-badge' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);		

		$this->end_controls_section();
	}

	protected function trad_register_badge_bottom_controls() {
		// Style Controls
		$this->start_controls_section(
			'badge_bottom',
			[
				'label' => esc_html__( 'Badge Bottom', 'turbo-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'badge_bottom_background_color',
			[
				'label' => esc_html__('Badge Background Color', 'turbo-addons-elementor'),
				'type' =>  Controls_Manager::COLOR,
				'default' => '#001166',
				'selectors' => [
					'{{WRAPPER}} .trad-bottom-price-badge ' => 'background-color: {{VALUE}};',
				],

			]
		);

		$this->add_control(
			'badge_bottom_text_color',
			[
				'label' => esc_html__('Badge Text Color', 'turbo-addons-elementor'),
				'type' =>  Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .trad-bottom-price-badge' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_responsive_control(
			'badge_bottom_font_size',
			[
				'label'      => esc_html__('Badge Font Size', 'turbo-addons-elementor'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
					'em' => [
						'min' => 1,
						'max' => 10,
					],
					'%'  => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors'  => [
					'{{WRAPPER}} .trad-bottom-price-badge' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Badge Border Radius Control
		$this->add_responsive_control(
			'badge_bottom_border_radius',
			[
				'label'   => esc_html__( 'Badge Border Radius', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'default'    => [
					'top'    => '50',
					'right'  => '50',
					'bottom' => '50',
					'left'   => '50',
					'unit'   => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .trad-bottom-price-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'badge_bottom_position_bottom',
			[
				'label'      => esc_html__('Bottom', 'turbo-addons-elementor'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range'      => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 19, 
				],
				'selectors'  => [
					'{{WRAPPER}} .trad-bottom-price-badge' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'badge_bottom_position_right',
			[
				'label'      => esc_html__('Right', 'turbo-addons-elementor'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range'      => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14, 
				],
				'selectors'  => [
					'{{WRAPPER}} .trad-bottom-price-badge' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);		

		$this->end_controls_section();
	}



	protected function render() {
		$settings = $this->get_settings_for_display();

		// Handle target and nofollow attributes for image link
		$image_target = ! empty( $settings['image_link']['is_external'] ) ? ' target="_blank"' : '';
		$image_nofollow = ! empty( $settings['image_link']['nofollow'] ) ? ' rel="nofollow"' : '';

		// Handle target and nofollow attributes for button link
		$button_target = ! empty( $settings['button_link']['is_external'] ) ? ' target="_blank"' : '';
		$button_nofollow = ! empty( $settings['button_link']['nofollow'] ) ? ' rel="nofollow"' : '';

		$this->add_inline_editing_attributes( 'card_title', 'none' );
		$this->add_inline_editing_attributes( 'item_description', 'advanced' );

		?>
		<div class="trad-image-card">
			<div class="trad-image-wrapper">
				<div class="trad-image">
					<img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="card_image">
					
					<?php if ( 'yes' === $settings['show_image_link'] ) : ?>
						<a href="<?php echo esc_url( $settings['image_link']['url'] ); ?>" <?php echo esc_attr( $image_target ); ?> <?php echo esc_attr( $image_nofollow ); ?>></a>
					<?php endif; ?>
					
					<?php if ( 'yes' === $settings['show_top_badge'] ) : ?>
						<span class="trad-top-price-badge trad-badge-blue"><?php echo esc_html( $settings['top_badge_text'] ); ?></span>
					<?php endif; ?>
					
				</div>
			</div>
			<div class="trad-preview-card-content">
				<div class="trad-preview-card-title">
					<h2 <?php echo esc_attr( $this->get_render_attribute_string( 'card_title' ) ); ?>><?php echo esc_html( $settings['card_title'] ); ?></h2>
				</div>

				<?php if ( 'yes' === $settings['show_divider'] ) : ?>
					<div class="trad-preview-card-divider"></div>
				<?php endif; ?>

				<div class="trad-preview-card-excerpt">
					<p <?php echo esc_attr( $this->get_render_attribute_string( 'item_description' ) ); ?>>
    					<?php echo wp_kses_post( $settings['item_description'] ); ?>
					</p>
				</div>

				<div class="trad-preview-card-readmore">
					<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" <?php echo esc_attr( $button_target ); ?> <?php echo esc_attr( $button_nofollow ); ?> class="button button-readmore"><?php echo esc_html( $settings['button_text'] ); ?></a>
					<?php if ( 'yes' === $settings['show_bottom_badge'] ) : ?>
						<span class="trad-bottom-price-badge trad-badge-blue"><?php echo esc_html( $settings['bottom_badge_text'] ); ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Preview_Card_Widget() );
