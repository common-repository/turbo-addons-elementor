<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Class Heading
 *
 * Elementor widget for displaying a heading with various customization options.
 *
 * @since 1.0.0
 */
class TRAD_Heading extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'trad-heading';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Heading', 'turbo-addons-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-heading';
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
	 * Get widget keywords.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'heading', 'title', 'sub-title' ];
	}

	/**
	 * Register Heading widget controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		// Heading Content Section
		$this->start_controls_section(
			'section_tab',
			[
				'label' => esc_html__( 'Heading', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Style', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one' => esc_html__( 'Style 1', 'turbo-addons-elementor' ),
					'two' => esc_html__( 'Style 2', 'turbo-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label'       => esc_html__( 'Sub Title', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Sub Title', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'title_text',
			[
				'label'       => esc_html__( 'Title', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'rows'        => 2,
				'placeholder' => esc_html__( 'Title', 'turbo-addons-elementor' ),
				'default'     => esc_html__( 'Section Title', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'secondary_title_enable',
			[
				'label'        => __( 'Secondary Title Enable', 'turbo-addons-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'turbo-addons-elementor' ),
				'label_off'    => __( 'No', 'turbo-addons-elementor' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_control(
			'secondary_title',
			[
				'label'       => esc_html__( 'Secondary Title', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'rows'        => 2,
				'placeholder' => esc_html__( 'Secondary Title', 'turbo-addons-elementor' ),
				'default'     => esc_html__( 'Secondary Title', 'turbo-addons-elementor' ),
				'condition'   => [
					'secondary_title_enable' => 'yes',
				],
			]
		);

		$this->add_control(
			'title_size',
			[
				'label'   => __( 'Title HTML Tag', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_control(
			'description_text',
			[
				'label'       => __( 'Description', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type your description here', 'turbo-addons-elementor' ),
				'separator'   => 'before',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render section heading widget output on the frontend.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
	
		// Prepare variables and sanitize/escape data
		$title            = esc_html( $settings['title_text'] );
		$secondary_title  = esc_html( $settings['secondary_title'] );
		$sub_title        = esc_html( $settings['sub_title'] );
		$description_text = wp_kses_post( $settings['description_text'] );
	
		// Wrapper Classes
		$this->add_render_attribute( 'wrapper', 'class', 'section-heading' );
	
		if ( ! empty( $settings['style'] ) ) {
			$this->add_render_attribute( 'wrapper', 'class', 'heading-style--' . esc_attr( $settings['style'] ) );
		}
	
		$this->add_render_attribute( 'title_text', 'class', 'section-title' );
	
		if ( $settings['secondary_title_enable'] === 'yes' ) {
			$this->add_render_attribute( 'title_text', 'class', 'has-secondary-title' );
		}
	
		$this->add_render_attribute( 'secondary_title_text', 'class', 'section-title-secondary' );
		$this->add_render_attribute( 'sub_title', 'class', 'subtitle' );
		$this->add_render_attribute( 'description_text', 'class', 'description' );
	
		?>
	
		<div <?php echo esc_attr( $this->get_render_attribute_string( 'wrapper' ) ); ?>>
	
			<?php if ( ! empty( $sub_title ) ) : ?>
				<h3 <?php echo esc_attr( $this->get_render_attribute_string( 'sub_title' ) ); ?>>
					<?php echo esc_html( $sub_title ); ?>
				</h3>
			<?php endif; ?>
	
			<?php if ( ! empty( $title ) ) : ?>
				<?php
				echo sprintf(
					'<%1$s %2$s>%3$s</%1$s>',
					esc_attr( Utils::validate_html_tag( $settings['title_size'] ) ),
					esc_attr( $this->get_render_attribute_string( 'title_text' ) ), // Explicit escaping here
					esc_html( $title )
				);
				?>
			<?php endif; ?>
	
			<?php if ( ! empty( $secondary_title ) && $settings['secondary_title_enable'] === 'yes' ) : ?>
				<?php
				echo sprintf(
					'<%1$s %2$s>%3$s</%1$s>',
					esc_attr( Utils::validate_html_tag( $settings['title_size'] ) ),
					esc_attr( $this->get_render_attribute_string( 'secondary_title_text' ) ), // Explicit escaping here
					esc_html( $secondary_title )
				);
				?>
			<?php endif; ?>
	
			<?php if ( ! empty( $description_text ) ) : ?>
				<div <?php echo esc_attr( $this->get_render_attribute_string( 'description_text' ) ); ?>>
					<?php echo wp_kses_post( $description_text ); ?>
				</div>
			<?php endif; ?>
	
		</div>
	
		<?php
	}
	
	

	

}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Heading() );
