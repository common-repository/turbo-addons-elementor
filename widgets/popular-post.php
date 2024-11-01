<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TRAD_Popular_Posts extends Widget_Base {

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
		return 'trad-popular-posts';
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
		return esc_html__( 'Popular Posts', 'turbo-addons-elementor' );
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
		return 'eicon-post-list';
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

		$this->start_controls_section(
			'section_query',
			[
				'label' => esc_html__( 'Basic', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'heading_text',
			[
				'label'       => esc_html__( 'Heading Text', 'turbo-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Popular Posts', 'turbo-addons-elementor' ),
				'title'       => esc_html__( 'Enter some text', 'turbo-addons-elementor' ),
				'placeholder' => esc_html__( 'Popular Posts', 'turbo-addons-elementor' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'   => esc_html__( 'Number of Posts', 'turbo-addons-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 5,
				'options' => [
					1  => esc_html__( 'One', 'turbo-addons-elementor' ),
					2  => esc_html__( 'Two', 'turbo-addons-elementor' ),
					5  => esc_html__( 'Five', 'turbo-addons-elementor' ),
					10 => esc_html__( 'Ten', 'turbo-addons-elementor' ),
					-1 => esc_html__( 'All', 'turbo-addons-elementor' ),
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Generates the final HTML on the frontend using settings from the editor.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$custom_text = ! empty( $settings['heading_text'] ) ? esc_html( $settings['heading_text'] ) : esc_html__( 'Popular Posts', 'turbo-addons-elementor' );
		$post_count = ! empty( $settings['posts_per_page'] ) ? (int) $settings['posts_per_page'] : 5;

		// Output heading
		echo '<h3>' . esc_html( $custom_text ) . '</h3>';

		// Query arguments to get popular posts
		$args = [
			'numberposts' => $post_count,
			'post_status' => 'publish',
		];

		$recent_posts = wp_get_recent_posts( $args );
		if ( ! empty( $recent_posts ) ) {
			echo '<ul class="trad-popular-posts">';
			foreach ( $recent_posts as $recent ) {
				echo '<li><a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '">' . esc_html( $recent['post_title'] ) . '</a></li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . esc_html__( 'No popular posts found.', 'turbo-addons-elementor' ) . '</p>';
		}

		// Reset post data
		wp_reset_postdata();
	}

	
}

// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TRAD_Popular_Posts() );
