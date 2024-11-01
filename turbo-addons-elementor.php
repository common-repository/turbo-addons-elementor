<?php
/**
 * Plugin Name: Turbo Addons Elementor
 * Plugin URI: https://turbo-addons.com/turbo-addons
 * Description: Turbo-Addons is towards limitless Elementor Addons with 30+ Elementor Free & Pro Widgets Coming for easy Customization.
 * Version: 1.5.0
 * Author: Turbo Addons
 * Author URI: https://turbo-addons.com/
 * License: GPLv3
 * License URI: https://opensource.org/licenses/GPL-3.0
 * Text Domain: turbo-addons-elementor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main Plugin Class
 * @since 1.0.0
 */
final class TRAD_Turbo_Addons {

    const TRAD_TURBO_ADDONS_PLUGIN_VERSION = '1.0.0';
    const TRAD_TURBO_ADDONS_MIN_ELEMENTOR_VERSION = '3.0.0';
    const TRAD_TURBO_ADDONS_MIN_PHP_VERSION = '7.4';
    
    private static $_instance = null;

    /**
     * Singleton Instance Method
     * @since 1.0.0
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     * @since 1.0.0
     */
    public function __construct() {
        $this->define_constants();
        // Include the helper file
        include_once plugin_dir_path(__FILE__) . 'helper/helper.php';
        add_action( 'wp_enqueue_scripts', 'trad_enqueue_scripts_styles' );
        add_action( 'init', [ $this, 'trad_load_textdomain' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );

        add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'trad_enqueue_panel_scripts' ], 999 );
        // Check if Elementor is active
        if ( did_action( 'elementor/loaded' ) ) {
            register_activation_hook( __FILE__, [ $this, 'turbo_addons_elementor_activate' ] );
            add_action( 'admin_init', [ $this, 'handle_activation_redirect' ] );
        } else {
            add_action( 'admin_notices', [ $this, 'trad_admin_notice_missing_main_plugin' ] );
        }
    }

    /**
     * Define Plugin Constants
     * @since 1.0.0
     */
    private function define_constants() {
        define( 'TRAD_TURBO_ADDONS_PLUGIN_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
        define( 'TRAD_TURBO_ADDONS_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
    }

    // Register activation hook to redirect after plugin activation
    public function turbo_addons_elementor_activate() {
        // Set a transient to show the redirect
        set_transient( 'turbo_addons_activation_redirect', true, 30 ); // 30 seconds
    }

    public function handle_activation_redirect() {
        if ( get_transient( 'turbo_addons_activation_redirect' ) ) {
            delete_transient( 'turbo_addons_activation_redirect' ); // Clean up the transient
            wp_redirect( admin_url( 'admin.php?page=turbo_addons' ) ); // Redirect to the admin homepage
            exit; // Always exit after redirecting
        }
    }


    /**
     * Enqueue Scripts & Styles
     * @since 1.0.0
     */

    public function trad_enqueue_panel_scripts() {
		wp_enqueue_script(
			'turbo-premium-promotion-script',
			TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/admin/editor.min.js',
			[ 'jquery'],
			TRAD_TURBO_ADDONS_PLUGIN_PATH,
			true
		);
	}

    /**
     * Load Text Domain for Translations
     * @since 1.0.0
     */
    public function trad_load_textdomain() {
        load_plugin_textdomain( 'turbo-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
     * Initialize the plugin
     * @since 1.0.0
     */
    public function init() {
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'trad_admin_notice_missing_main_plugin' ] );
            return;
        }

        if ( ! version_compare( ELEMENTOR_VERSION, self::TRAD_TURBO_ADDONS_MIN_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'trad_admin_notice_minimum_elementor_version' ] );
            return;
        }

        if ( ! version_compare( PHP_VERSION, self::TRAD_TURBO_ADDONS_MIN_PHP_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'trad_admin_notice_minimum_php_version' ] );
            return;
        }

        add_action( 'elementor/init', [ $this, 'trad_init_category' ] );
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'trad_init_widgets' ] );
        $this->custom_actions();

        if (is_admin()) {
            if(did_action( 'elementor/loaded' )) {
                require_once plugin_dir_path(__FILE__) . 'admin/admin-page.php';
            }else{
                add_action( 'admin_notices', [ $this, 'trad_admin_notice_missing_main_plugin' ] );
                return;
            }
            
        }
    }

    /**
     * Initialize Widgets
     * @since 1.0.0
     */
    public function trad_init_widgets() {
        // Retrieve the widget settings from the database
        $widgets = get_option('turbo_addons_widgets', []);
    
        // Define an array to map widget keys to their corresponding file paths
        $widget_files = get_widget_lists();

        if (empty($widgets)) {
            $widgets = [
                'contact-info',            
                'Heading',                        
                'popular-post',            
                'preview-card',            
                'pricing-table',          
                'animated_text_effects', 
                'icon-button',              
                'section-shape-divider', 
                'countdown-timer',      
                'social-bar',                 
                'review-star',               
                'most-top-bar',             
                'team-slider',              
                'fancy-card',                
                'fancy-alert',             
                'dual-header',               
                'info-box',                     
                'business-hour',           
                'carousel',                     
                'call-to-action',       
                'accordion',                 
                'tooltip',                      
                'floating-effect',       
                'image-overlay-effects',  
            ];
        }

        // Include each widget based on the stored settings
        foreach ($widget_files as $widget_key => $file) {
            if (in_array($widget_key, $widgets)) {
                require_once TRAD_TURBO_ADDONS_PLUGIN_PATH . 'widgets/' . $file;
            }
        }
    }
    

    // Premium Promotions

    /**
     * Initialize Category Section
     * @since 1.0.0
     */
    public function trad_init_category() {
        Elementor\Plugin::instance()->elements_manager->add_category(
            'turbo-addons',
            [
                'title' => esc_html__( 'Turbo Addons', 'turbo-addons-elementor' )
            ]
        );

        // Add Premium Widgets category in panel
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'trad-premium-widgets',
            [
                'title' => esc_html__( 'Turbo Premium Widgets', 'turbo-addons-elementor' ),
                'icon' => 'font',
            ]
        );
    }

    public function trad_promote_premium_widgets($config) {

        $config['promotionWidgets'] = [];

        // Get promotion widgets data from the helper function
        $promotion_widgets_data = get_promotion_widgets_data();
        $config['promotionWidgets'] = array_merge($config['promotionWidgets'], $promotion_widgets_data);

        // Additional expert widgets
        $expert_widgets_data = get_expert_widgets_data();
        $config['promotionWidgets'] = array_merge($config['promotionWidgets'], $expert_widgets_data);

        return $config;
    }

    protected function custom_actions() {
        // Promote Premium Widgets
        if ( current_user_can('administrator') ) {
            add_filter('elementor/editor/localize_settings', [$this, 'trad_promote_premium_widgets']);
        }
    }

    /**
     * Admin Notice for Missing Elementor
     * @since 1.0.0
     */
    public function trad_admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) && isset( $_GET['_wpnonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'turbo_addons_activate_nonce' ) ) {
            return; // Nonce verification failed
        }

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        printf(
            '<div class="notice notice-warning is-dismissible"><p>%s</p></div>',
            wp_kses_post( sprintf(
                /* translators: 1: Plugin name (Turbo Addons), 2: Dependency name (Elementor) */
                esc_html__( '"%1$s" requires %2$s to be installed and activated. Please install and activate %2$s to use all features of %1$s.', 'turbo-addons-elementor' ),
                '<strong>' . esc_html__( 'Turbo Addons', 'turbo-addons-elementor' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'turbo-addons-elementor' ) . '</strong>'
            ) )
        );
     }

    /**
     * Admin Notice for Minimum Elementor Version
     * @since 1.0.0
     */
    public function trad_admin_notice_minimum_elementor_version() {
        if ( isset( $_GET['activate'] ) && isset( $_GET['_wpnonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'activate_plugin' ) ) {
            return; // Nonce verification failed
        }

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        printf(
            '<div class="notice notice-warning is-dismissible"><p>%s</p></div>',
            wp_kses_post( sprintf(
                /* translators: 1: Plugin name (Turbo Addons), 2: Dependency name (Elementor), 3: Minimum required Elementor version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'turbo-addons-elementor' ),
                '<strong>' . esc_html__( 'Turbo Addons', 'turbo-addons-elementor' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'turbo-addons-elementor' ) . '</strong>',
                esc_html( self::TRAD_TURBO_ADDONS_MIN_ELEMENTOR_VERSION )
            ) )
        );
    }

    /**
     * Admin Notice for Minimum PHP Version
     * @since 1.0.0
     */
    public function trad_admin_notice_minimum_php_version() {
        if ( isset( $_GET['activate'] ) && isset( $_GET['_wpnonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'activate_plugin' ) ) {
            return; // Nonce verification failed
        }

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        printf(
            '<div class="notice notice-warning is-dismissible"><p>%s</p></div>',
            wp_kses_post( sprintf(
                /* translators: 1: Plugin name (Turbo Addons), 2: Software name (PHP), 3: Minimum required PHP version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'turbo-addons-elementor' ),
                '<strong>' . esc_html__( 'Turbo Addons', 'turbo-addons-elementor' ) . '</strong>',
                '<strong>' . esc_html__( 'PHP', 'turbo-addons-elementor' ) . '</strong>',
                esc_html( self::TRAD_TURBO_ADDONS_MIN_PHP_VERSION )
            ) )
        );

    }
}

/**
 * Initializes the Plugin
 * @since 1.0.0
 */
function trad_turbo_addons() {
    return TRAD_Turbo_Addons::instance();
}

trad_turbo_addons();
