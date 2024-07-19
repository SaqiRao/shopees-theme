<?php

/**
 * Plugin Name: Elementor Test Addon
 * Description: Custom Elementor addon.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Saqib Rao
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-test-addon
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.21.0
 * Elementor Pro tested up to: 3.21.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class My_Elementor_Addon
{

    public function __construct()
    {

        // Register the widget.
        add_action('elementor/widgets/widgets_registered', [$this, 'on_widgets_registered']);
        // Register custom category
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);
    }

    public function on_widgets_registered()
    {
        require_once(__DIR__ . '/widgets/hero-first.php');
        require_once(__DIR__ . '/widgets/ads-simple.php');
        require_once(__DIR__ . '/widgets/advo-saving.php');
        require_once(__DIR__ . '/widgets/shop-us.php');
        require_once(__DIR__ . '/widgets/gift-for.php');
        require_once(__DIR__ . '/widgets/map-for.php');
        require_once(__DIR__ . '/widgets/user-rat.php');
    }

    public function add_elementor_widget_categories($elements_manager)
    {
        $elements_manager->add_category(
            'shopees-widgets',
            [
                'title' => __('Shopees Widgets', 'my-elementor-addon'),
                'icon' => 'fa fa-plug',
            ]
        );
    }
}

// Instantiate the plugin class.
new My_Elementor_Addon();
