<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue necessary styles and scripts
function turbo_addons_admin_enqueue_styles_scripts() {
    wp_enqueue_style('turbo-addons-admin-style', plugin_dir_url(__FILE__) . 'assets/css/admin-style.css', array(), '1.0.0');
    wp_enqueue_script('turbo-addons-admin-script', plugin_dir_url(__FILE__) . 'assets/js/admin-script.js', array('jquery'), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'turbo_addons_admin_enqueue_styles_scripts');

// Function to render the admin page
function turbo_addons_admin_page() {
    ?>
    <div id="turbo-dashboard-navbar">
        <div>
        <img class="turbo-dashboard-navbar-logo" src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'assets/images/turbo-logo.png' ); ?>" alt="<?php echo esc_attr( 'turbo-logo' ); ?>">
        </div>
        <div>
            <input type="checkbox" id="turbo-dashboard-navbar-theme-input">
            <label for="turbo-dashboard-navbar-theme-input" id="turbo-dashboard-navbar-theme-label">
                <span>
                    <img id="turbo-dashboard-navbar-theme-sun" src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'assets/images/sun.png' ); ?>" alt="<?php echo esc_attr( 'sun-icon' ); ?>">
                </span>
                <span>
                    <img id="turbo-dashboard-navbar-theme-moon" src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'assets/images/moon.png' ); ?>" alt="<?php echo esc_attr( 'moon-icon' ); ?>">
                </span>
            </label>
        </div>
    </div>

    <div class="trad_wrap_dashboard turbo-addons-dashboard">
        <?php 
            $current_tab = isset($_POST['current_tab']) ? sanitize_text_field(wp_unslash($_POST['current_tab'])) : 'general-tab'; 
        ?>

        <div class="turbo-addons-sidebar" id="turbo-addons-sidebar-menu">
            <ul class="trad-turbo-dashboard-menu-list">
                <li class="trad-tab-link tab-link active" data-tab="general-tab"><a href="#"><?php esc_html_e('General', 'turbo-addons-elementor'); ?></a></li>
                <li class="trad-tab-link tab-link" data-tab="elements-tab"><a href="#"><?php esc_html_e('Elements', 'turbo-addons-elementor'); ?></a></li>
                <li class="trad-tab-link tab-link" data-tab="premium-tab"><a href="#"><?php esc_html_e('Go Premium', 'turbo-addons-elementor'); ?></a></li>
            </ul>
        </div> 


        <div class="turbo-addons-content" id="turbo-addons-content-details">


            <!-- ==tab1======================General Tab Content
             ============================================================================== -->
             <div id="general-tab" class="trad-tab-content tab-content trad-dashboard-tab <?php echo $current_tab === 'general-tab' ? 'active' : ''; ?>">
                <div class="trad-dashboard-tab-general-wraper">
                <div class="trad-dashboard-tab-general-left" 
                style=
                "background-image: url('<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/images/fourcolorbg.png'); ?>');
                 background-position:center-center;
                 background-size:cover;
                 background-repeat:none;
                ">
                        <div class="trad-header-section trad-general-p">
                            <h1><?php esc_html_e(" What's New In Turbo Addons in 1.5.0?", 'turbo-addons-elementor'); ?></h1>
                            <p>☞ Added New Widgets <span style="color:rgb(0, 3, 124)">"Turbo Testimonial Slider"</span>. <a href="https://turbo-addons.com/testimonial-slider/" target="_blank">
                               <span style="color:">See Preview</span>
                            </a> </p>
                            <p>☞ Added New Widgets <span style="color:rgb(0, 3, 124)">"Turbo Timeline"</span>. <a href="https://turbo-addons.com/testimonial-slider/" target="_blank">
                               <span style="#444">See Preview</span>
                            </a> </p>
                            <p>☞ Added New Widgets <span style="color:rgb(0, 3, 124)">"3D Carousel"</span>. <a href="https://turbo-addons.com/testimonial-slider/" target="_blank">
                               <span style="color:#444">See Preview</span>
                            </a> </p>
                            <p>☞ Added New Widgets <span style="color:rgb(0, 3, 124)">"Image Overlay Effects"</span>. <a href="https://turbo-addons.com/testimonial-slider/" target="_blank">
                               <span style="color:#444">See Preview</span>
                            </a> </p>
                            
                        </div>
                        <div class="trad-widgets-section">
                          <a href="https://wordpress.org/plugins/turbo-addons-elementor/#developers" target="_blank"> <button>See the changelog</button></a>
                        </div>
                    </div>
                    <div class="trad-dashboard-tab-general-right">
                        <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/images/comming_BANNER.gif'); ?>" alt="<?php echo esc_attr('Banner of coming soon'); ?>"> 
                        <a href="https://turbo-addons.com/pricing/" target="blank">
                            <button class="trad-dashboard-general-tabs-top-btn" >Upgrade To Pro</button> 
                        </a>
                    </div>
                </div>
            </div>

            <!-- ====tab-2============================Elements Tab Content
             ================================================================================ -->
            <div id="elements-tab" class="trad-tab-content tab-content trad-dashboard-elements-tab <?php echo $current_tab === 'elements-tab' ? 'active' : ''; ?>" 
            style=
                "background-image: url('<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/images/fourcolorbg.png'); ?>');
                 background-position:center-center;
                 background-size:cover;
                 background-repeat:none;
                ">
                <div class="trad-header-section">
                    <h1><?php esc_html_e('Elements', 'turbo-addons-elementor'); ?></h1>
                    <p>New features, improvements, and updates for Turbo Addons.</p>
                </div>
                <div class="trad-widgets-section">
                    <h2><?php esc_html_e('Manage Widgets', 'turbo-addons-elementor'); ?></h2>
                    <form method="post" action="">
                        <?php
                        wp_nonce_field('save_turbo_addons_widgets', 'turbo_addons_nonce');
                        // Check if the form was submitted
                        if (isset($_POST['save_changes'])) {

                            // Verify nonce to ensure the form submission is secure
                            if (!isset($_POST['turbo_addons_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['turbo_addons_nonce'])), 'save_turbo_addons_widgets')) {
                                wp_die(esc_html__('Nonce verification failed. Please try again.', 'turbo-addons-elementor'));
                            }
            
                            // Apply your line after nonce verification
                            $widgets = isset($_POST['widgets']) && is_array($_POST['widgets']) ? array_map('sanitize_text_field', wp_unslash($_POST['widgets'])) : [];
                        
                            update_option('turbo_addons_widgets', $widgets);
                            echo '<div class="trad-alert-updated-div updated">
                                <p>' . esc_html__('Settings saved.', 'turbo-addons-elementor') . '</p>
                                <button class="trad-alert-dismiss-button" type="button">×</button>
                            </div>';

                        }

                        // Retrieve the current widget settings
                        $widgets = get_option('turbo_addons_widgets', []);

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

                        // If no widgets are saved, default to all widgets being active
                        if (empty($widgets)) {
                            $widgets = array_keys($all_widgets); // This sets all widgets as active by default
                        } 

                        $all_widgets = [
                            'contact-info' => 'Contact Info',            
                            'Heading' => 'Heading',                        
                            'popular-post' => 'Popular Posts',            
                            'preview-card' => 'Preview Card',            
                            'pricing-table' => 'Pricing Table',          
                            'animated_text_effects' => 'Text Animation', 
                            'icon-button' => 'Icon Button',              
                            'section-shape-divider' => 'Shape Divider', 
                            'countdown-timer' => 'Turbo Timer',      
                            'social-bar' => 'Social Bar',                 
                            'review-star' => 'Review Star',               
                            'most-top-bar' => 'Top Bar',             
                            'team-slider' => 'Team Slider',              
                            'fancy-card' => 'Fancy Card',                
                            'fancy-alert' => 'Fancy Alert',             
                            'dual-header' => 'Dual Header',               
                            'info-box' => 'Info Box',                     
                            'business-hour' => 'Business Hour',           
                            'carousel' => 'Carousel',                     
                            'call-to-action' => 'Call To Action',       
                            'accordion' => 'Accordion',                 
                            'tooltip' => 'Turbo Tooltip',                      
                            'floating-effect' => 'Floating Effect',       
                            'image-overlay-effects' => 'Hover Overlay',  
                        ];

                        // Display the widgets
                        echo '<div class="trad-widgets-grid">';
                        foreach ($all_widgets as $widget_key => $widget_name) {
                            $is_active = in_array($widget_key, $widgets);
                            ?>
                            <div class="trad-widget-card">
                                <label class="trad-elements-tab-icon-text">
                                    <input type="checkbox" name="widgets[]" value="<?php echo esc_attr($widget_key); ?>" <?php checked($is_active); ?> />
                                    <span><?php echo esc_html($widget_name); ?></span>
                                </label>
                            </div>
                            <?php
                        }
                        echo '</div>';
                        ?>
                        <input type="hidden" id="current_tab" name="current_tab" value="<?php echo esc_attr(!empty($current_tab) ? $current_tab : 'general-tab'); ?>">

                        <p>
                            <input type="submit" name="save_changes" class="button trad-dashboard-elements-btn-submit " value="<?php esc_attr_e('Save Changes', 'turbo-addons-elementor'); ?>" />
                        </p>
                    </form>
                </div>
            </div>

            <!-- ======tab-3/// ========================================Premium tabs=========================
             ====================================================================================================-->

            <div id="premium-tab" class="trad-tab-content tab-content trad-dashboard-premium-tab <?php echo $current_tab === 'premium-tab' ? 'active' : ''; ?>"
            style=
                "background-image: url('<?php echo esc_url(plugin_dir_url(__FILE__) . 'assets/images/fourcolorbg.png'); ?>');
                 background-position:center-center;
                 background-size:cover;
                 background-repeat:none;
            ">
                <div class="trad-header-section">
                    <div class="trad-dashboard-pro-tabs-top">
                        <h2>
                            Elevate Your Elementor Experience
                        </h2>
                        <h1>
                            Unlock the power of 30 Advanced widgets Elements <br/> and dive into <span style="color:#aa0088">6 Premium PRO Features</span> <br/> designed to transform your website’s potential.
                        </h1>
                        <p>
                            With Turbo Addons, you’ll gain access to powerful, flexible tools tailored for creatives, marketers, and businesses alike. Supercharge your Elementor toolkit and bring your ideas to life like never before!
                        </p>
                        <a href="https://turbo-addons.com/pricing/" target="blank">
                           <button class="trad-dashboard-pro-tabs-top-btn" >Upgrade To Pro</button> 
                        </a>
                    </div>
                </div>


                <div class="trad-widgets-section">
                    
                </div>
            </div>

            <!-- Add other tab contents like 'extensions-tab', 'tools-tab', 'integrations-tab', and 'premium-tab' similarly -->

        </div>
    </div>
    <?php
}
// Function to safely construct the URL for the icon
function safe_url($url) {
    return esc_url($url); // Use WordPress's esc_url() to sanitize the URL
}

// Register the admin menu
function turbo_addons_add_admin_menu() {
    $icon_url = safe_url(plugin_dir_url(__FILE__) . 'assets/images/turbo-icon.png');
    add_menu_page(
        'Turbo Addons',
        'Turbo Addons',
        'manage_options',
        'turbo_addons',
        'turbo_addons_admin_page',
        $icon_url,
        20
    );
}
add_action('admin_menu', 'turbo_addons_add_admin_menu');

