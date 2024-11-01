<?php
// helper.php

function get_promotion_widgets_data() {
    $category = 'trad-premium-widgets';
    return [
        [
            'name' => 'trad-timeline-story',
            'title' => __('Turbo Timeline', 'turbo-addons-elementor'),
            'icon' => 'eicon-post-list',
            'categories' => '["' . $category . '"]',
        ],
        [
            'name' => 'trad-progress-milestone',
            'title' => __('Progress Milestones', 'turbo-addons-elementor'),
            'icon' => 'eicon-skill-bar',
            'categories' => '["' . $category . '"]',
        ],
        [
            'name' => 'trad-review-archive',
            'title' => __('Turbo Review Archive', 'turbo-addons-elementor'),
            'icon' => 'eicon-post-list',
            'categories' => '["' . $category . '"]',
        ],
        // Add additional promotion widgets here
    ];
}

function get_expert_widgets_data() {
    $category = 'trad-premium-widgets';
    return [
        [
            'name' => 'trad_3d_carousel',
            'title' => __('3D Carousel', 'turbo-addons-elementor'),
            'icon' => 'eicon-carousel',
            'categories' => '["' . $category . '"]',
        ],
        [
            'name' => 'trad_testimonial_slider',
            'title' => __('Turbo Testimonial Slider', 'turbo-addons-elementor'),
            'icon' => 'eicon-post-slider',
            'categories' => '["' . $category . '"]',
        ],
        [
            'name' => 'trad-flip-box',
            'title' => __('3D Flip Box', 'turbo-addons-elementor'),
            'icon' => 'eicon-flip-box',
            'categories' => '["' . $category . '"]',
        ],
        // Add additional expert widgets here
    ];
}

function get_widget_lists() {
    return [
        'contact-info' => 'contact-info.php',            // contact info widget
        'Heading' => 'Heading.php',                        // Heading Widget
        'popular-post' => 'popular-post.php',            // Popular Post Widget
        'preview-card' => 'preview-card.php',            // Preview card widget
        'pricing-table' => 'pricing-table.php',          // Pricing Table Widget
        'animated_text_effects' => 'animated_text_effects.php', // Animated Text Widget
        'icon-button' => 'icon-button.php',              // Section shape divider
        'section-shape-divider' => 'section-shape-divider.php', // Section Shape Divider Widget
        'countdown-timer' => 'countdown-timer.php',      // Countdown timer Widget
        'social-bar' => 'social-bar.php',                 // Social bar Widget
        'review-star' => 'review-star.php',               // Review star Widget
        'most-top-bar' => 'most-top-bar.php',             // Most top bar Widget
        'team-slider' => 'team-slider.php',               // Team slider Widget
        'fancy-card' => 'fancy-card.php',                 // Fancy card Widget
        'fancy-alert' => 'fancy-alert.php',               // Fancy alert Widget
        'dual-header' => 'dual-header.php',               // Dual header Widget 
        'info-box' => 'info-box.php',                     // Info box Widget
        'business-hour' => 'business-hour.php',           // Business hour Widget
        'carousel' => 'carousel.php',                     // Carousel Widget 
        'call-to-action' => 'call-to-action.php',        // Call to action Widget
        'accordion' => 'accordion.php',                   // Accordion Widget
        'tooltip' => 'tooltip.php',                       // Tooltip Widget
        'floating-effect' => 'floating-effect.php',       // Image floating Widget
        'image-overlay-effects' => 'image-overlay-effects.php', // Image overlay effects widget
    ];
}

function trad_enqueue_scripts_styles() {   
    // custom all css style//
    wp_enqueue_style( 'turbo-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/style.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/style.css' ), 'all' );

    //section-shape-divider css
    wp_enqueue_style( 'section-divider-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/section-shape-divider.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/section-shape-divider.css' ), 'all' );
  
    // min.js for textanimation widget//
    wp_enqueue_script( 'typed-js', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/typed.min.js', [], '2.0.12', true );
    // Enqueue jquery JS
    wp_enqueue_script( 'animated-text-effect', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/animated_text_effects.js', [ 'jquery', 'typed-js' ], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );

    // countdown-timer css
    wp_enqueue_style( 'countdown-timer-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/countdown-timer.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/countdown-timer.css' ), 'all' );
    // countdown-timer JS
    wp_enqueue_script( 'countdown-timer-script', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/countdown-timer.js', [], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );

    // social bar css
    wp_enqueue_style( 'social-bar-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/social-bar.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/social-bar.css' ), 'all' );

    // review star css
    wp_enqueue_style( 'review-star-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/review-star.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/review-star.css' ), 'all' );

    // team slider css
    wp_enqueue_style( 'team-slider-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/team-slider.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/team-slider.css' ), 'all' );

    // team slider js 
    wp_enqueue_script( 'team-slider-script', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/team-slider.js', [ 'jquery'], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );

    // fancy card css
    wp_enqueue_style( 'fancy-card-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/fancy-card.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/fancy-card.css' ), 'all' );

    // fancy alert css
    wp_enqueue_style( 'fancy-alert-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/fancy-alert.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/fancy-alert.css' ), 'all' );

    // fancy alert js 
    wp_enqueue_script( 'fancy-alert-script', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/fancy-alert.js', [], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );

    // fancy text css
    wp_enqueue_style( 'dual-header-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/dual-header.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/dual-header.css' ), 'all' );

    // info box css
    wp_enqueue_style( 'info-box-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/info-box.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/info-box.css' ), 'all' );

    // progress milestone css
    wp_enqueue_style( 'progress-milestone-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/progress-milestone.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/progress-milestone.css' ), 'all' );

    // progress milestone js
    wp_enqueue_script( 'progress-milestone-script', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/progress-milestone.js', [ 'jquery'], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );

    // business hour css
    wp_enqueue_style( 'business-hour-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/business-hour.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/business-hour.css' ), 'all' );


    wp_enqueue_style( 'owl-carousel', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/vendor/owl/css/owl.carousel.min.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/vendor/owl/owl.carousel.min.css' ), 'all' );
    wp_enqueue_style( 'owl-carousel-theme', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/vendor/owl/css/owl.theme.default.min.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/vendor/owl/owl.theme.default.min.css' ), 'all' );
    wp_enqueue_style( 'custom-carousel-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/carousel.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/carousel.css' ), 'all' );

    // Enqueue jQuery and Owl Carousel script
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'owl-carousel', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/vendor/owl/js/owl.carousel.min.js', [ 'jquery'], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );
            
    // Enqueue custom JS
    wp_enqueue_script( 'custom-carousel-script', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/carousel.js', [ 'jquery', 'owl-carousel'], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );

    // call to action css
    wp_enqueue_style( 'call-to-action-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/call-to-action.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/call-to-action.css' ), 'all' );

    // accordion css 
    wp_enqueue_style( 'accordion-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/accordion.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/accordion.css' ), 'all' );
    wp_enqueue_script( 'accordion-script', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/accordion.js', [ 'jquery'], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );

    // tooltip css 
    wp_enqueue_style( 'tooltip-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/tooltip.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/tooltip.css' ), 'all' );
    wp_enqueue_style( 'flip-box-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/flip-box.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/flip-box.css' ), 'all' );
    // floating image
    wp_enqueue_style( 'floating-image', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/trad-floating-effect.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/trad-floating-effect.css' ), 'all' );
    
    // review template
    wp_enqueue_style( 'review-template-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/review-template.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/review-template.css' ), 'all' );
    wp_enqueue_script( 'review-template-script', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/review-template.js', [ 'jquery'], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );

    // testimonial template
    wp_enqueue_style( 'testimonial-template-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/testimonial.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/testimonial.css' ), 'all' );
    wp_enqueue_script( 'testimonial-template-script', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/js/testimonial/testimonial.js', [ 'jquery'], TRAD_TURBO_ADDONS_PLUGIN_PATH, true );
    
    // testimonial template
    wp_enqueue_style( 'three-d-carousel', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/polygon3Dcarousel.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/polygon3Dcarousel.css' ), 'all' );
    

    // timeline story
    wp_enqueue_style( 'timeline-story-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/timeline-story.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/timeline-story.css' ), 'all' );

    // image overlay effects
    wp_enqueue_style( 'image-overlay-effects-style', TRAD_TURBO_ADDONS_PLUGIN_URL . 'assets/css/custom-css/image-overlay-effects.css', [], filemtime( TRAD_TURBO_ADDONS_PLUGIN_PATH . 'assets/css/custom-css/image-overlay-effects.css' ), 'all' );
    
}
