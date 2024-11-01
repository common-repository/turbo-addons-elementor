<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TRAD_Pricing_Table_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'trad-pricing-table';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Pricing Table', 'turbo-addons-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
	}

	/**
	 * Get script dependencies.
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
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->trad_register_header_controls();
		$this->trad_register_price_controls();
		$this->trad_register_listing_controls();
		$this->trad_register_button_controls();
	}

	protected function trad_register_header_controls() {
		$this->start_controls_section(
			'header_section',
			[
				'label' => __( 'Header', 'turbo-addons-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'header_title',
			[
				'label' => __( 'Title', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Pricing Title', 'turbo-addons-elementor' ),
				'label_block' => true,
				'placeholder' => __( 'Type your title here', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'header_description',
			[
				'label' => __( 'Description', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => __( 'Default description', 'turbo-addons-elementor' ),
				'placeholder' => __( 'Type your description here', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'show_badge',
			[
				'label' => __( 'Show Badge', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'turbo-addons-elementor' ),
				'label_off' => __( 'Hide', 'turbo-addons-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'header_badge_text',
			[
				'label' => __( 'Badge Text', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Popular', 'turbo-addons-elementor' ),
				'label_block' => true,
				'placeholder' => __( 'Badge text', 'turbo-addons-elementor' ),
				'condition' => [
					'show_badge' => 'yes'
				]
			]
		);

		$this->end_controls_section();
	}

	protected function trad_register_price_controls() {
		$this->start_controls_section(
			'price_section',
			[
				'label' => __( 'Pricing', 'turbo-addons-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pricing_price',
			[
				'label' => __( 'Price', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '$99', 'turbo-addons-elementor' ),
				'label_block' => true,
				'placeholder' => __( 'Type your price here', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'pricing_duration',
			[
				'label' => __( 'Duration', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'year', 'turbo-addons-elementor' ),
				'label_block' => true,
				'placeholder' => __( 'Type your duration here', 'turbo-addons-elementor' ),
			]
		);

		$this->end_controls_section();
	}

	protected function trad_register_listing_controls() {
		$this->start_controls_section(
			'listing_section',
			[
				'label' => __( 'Listing', 'turbo-addons-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'feature_text',
			[
				'label' => __( 'Feature Text', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Feature', 'turbo-addons-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_text' => __( 'Up to 5 users', 'turbo-addons-elementor' ),
					],
					[
						'feature_text' => __( 'Max 100 items/month', 'turbo-addons-elementor' ),
					],
					[
						'feature_text' => __( '500 queries', 'turbo-addons-elementor' ),
					],
					[
						'feature_text' => __( 'Basic statistics', 'turbo-addons-elementor' ),
					],
				],
				'title_field' => '{{{ feature_text }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function trad_register_button_controls() {
		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'turbo-addons-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Get This Plan', 'turbo-addons-elementor' ),
				'label_block' => true,
				'placeholder' => __( 'Type your button text here', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => __( 'Button Link', 'turbo-addons-elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'turbo-addons-elementor' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'show_external' => true, // Show the 'open in new tab' option.
			]
		);

		$this->end_controls_section();
	}



	protected function render() {
		$settings = $this->get_settings_for_display();
		$button_url = ! empty( $settings['button_link']['url'] ) ? esc_url( $settings['button_link']['url'] ) : '#';
		$button_target = ! empty( $settings['button_link']['is_external'] ) ? ' target="_blank"' : '';
		$button_nofollow = ! empty( $settings['button_link']['nofollow'] ) ? ' rel="nofollow"' : '';

		?>
		<div class="trad-pricing-table">
			<div class="trad-pricing-table-header">
				<?php if ( 'yes' === $settings['show_badge'] ) : ?>
					<span class="trad-pr-table-popular"><?php echo esc_html( $settings['header_badge_text'] ); ?></span>
				<?php endif; ?>
				<h2 class="trad-header-title"><?php echo esc_html( $settings['header_title'] ); ?></h2>
				<p class="trad-trad-header-subtitle"><?php echo esc_html( $settings['header_description'] ); ?></p>
			</div>
			<div class="trad-pricing-table-price">
				<div class="trad-priceing"><?php echo esc_html( $settings['pricing_price'] ); ?></div>
				<div class="trad-price-divider">/</div>
				<div class="trad-price-duration"><?php echo esc_html( $settings['pricing_duration'] ); ?></div>
			</div>
			<div class="trad-pricing-table-feature">
				<?php foreach ( $settings['list'] as $item ) : ?>
					<div> <?php echo esc_html( $item['feature_text'] ); ?></div>
				<?php endforeach; ?>
			</div>
			<div class="trad-pricing-table-action">
				<a href="<?php echo esc_url( $button_url ); ?>" <?php echo esc_attr( $button_target ); ?> <?php echo esc_attr( $button_nofollow ); ?> class="button button-pricing-action"><?php echo esc_html( $settings['button_text'] ); ?></a>

			</div>
		</div>
		<?php
	}

	protected function _content_template() {
		?>
		<# 
		view.addInlineEditingAttributes( 'header_title', 'none' );
		view.addInlineEditingAttributes( 'header_description', 'none' );
		view.addInlineEditingAttributes( 'header_badge_text', 'none' );
		view.addInlineEditingAttributes( 'pricing_price', 'none' );
		view.addInlineEditingAttributes( 'pricing_duration', 'none' );
		view.addInlineEditingAttributes( 'button_text', 'none' );
	
		var button_url = settings.button_link.url ? settings.button_link.url : '#';
		var button_target = settings.button_link.is_external ? ' target="_blank"' : '';
		var button_nofollow = settings.button_link.nofollow ? ' rel="nofollow"' : '';
		#>
		<div class="trad-pricing-table">
			<div class="trad-pricing-table-header">
				<# if ( 'yes' === settings.show_badge ) { #>
					<span class="trad-pr-table-popular">{{{ settings.header_badge_text }}}</span>
				<# } #>
				<h2 class="trad-header-title">{{{ settings.header_title }}}</h2>
				<p class="trad-header-subtitle">{{{ settings.header_description }}}</p>
			</div>
			<div class="trad-pricing-table-price">
				<div class="trad-priceing">{{{ settings.pricing_price }}}</div>
				<div class="trad-price-divider">/</div>
				<div class="trad-price-duration">{{{ settings.pricing_duration }}}</div>
			</div>
			<div class="trad-pricing-table-feature">
				<# _.each( settings.list, function( item ) { #>
					<div>{{{ item.feature_text }}}</div>
				<# }); #>
			</div>
			<div class="trad-pricing-table-action">
				<a href="{{ button_url }}"{{ button_target }}{{ button_nofollow }} class="button button-pricing-action">
					{{{ settings.button_text }}}
				</a>
			</div>
		</div>
		<?php
	}
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Pricing_Table_Widget() );
