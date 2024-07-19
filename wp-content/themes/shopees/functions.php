<?php

/* ENQUEUE STYLES AND SCRIPTS */
/* ------------------------------------------------ */
function shopees_enqueue_styles()
{

    /* ENQUEUE OWL CAROUSEL STYLE */
    /* ------------------------------------------------ */
    wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '2.3.4');
    /* ------------------------------------------------ */

    /* ENQUEUE STYLES AND SCRIPTS */
    /* ------------------------------------------------ */
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '4.0.0');
    /* ------------------------------------------------ */

    /* ENQUEUE BOOTSTRAPS STYLE */
    /* ------------------------------------------------ */
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array('bootstrap'), '1.0.0');
    /* ------------------------------------------------ */

    /* ENQUEUE RESPONSIVE STYLE */
    /* ------------------------------------------------ */
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array('custom-style'), '1.0.0');
    /* ------------------------------------------------ */



    /* ENQUEUE STYLES AND SCRIPT */
    /* ------------------------------------------------ */
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js', array('jquery'), '3.4.1', true);
    /* ------------------------------------------------ */

    /* ENQUEUE BOOTSTRAPS SCRIPT */
    /* ------------------------------------------------ */
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js',  array('jquery'), null, true);
    /* ------------------------------------------------ */

    /* ENQUEUE OWL CAROUSEL SCRIPT */
    /* ------------------------------------------------ */
    wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), null, true);
    /* ------------------------------------------------ */
}
add_action('wp_enqueue_scripts', 'shopees_enqueue_styles');
/* ------------------------------------------------ */


/* AFTER THEME SETUP */
/* ------------------------------------------------ */
function shopees_theme_setup()
{

    /* THEME TRANSLATIONS */
    /* ------------------------------------------------ */
    load_theme_textdomain('shopees', get_template_directory() . '/languages');
    /* ------------------------------------------------ */

    if (class_exists('Redux')) {

        /* THEME OPTION */
        /* ------------------------------------------------ */
        require_once get_template_directory() . '/inc/shopees-option.php';
        /* ------------------------------------------------ */
    }

    /* TGM */
    /* ------------------------------------------------ */
    require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';
    /* ------------------------------------------------ */

    /* FEED LINK */
    /* ------------------------------------------------ */
    add_theme_support('automatic-feed-links');
    /* ------------------------------------------------ */

    /* TITLE */
    /* ------------------------------------------------ */
    add_theme_support('title-tag');

    /* POST THUMBNAILS */
    /* ------------------------------------------------ */
    add_theme_support('post-thumbnails');
    /* ------------------------------------------------ */

    /* PRIMARY MENU */
    /* ------------------------------------------------ */
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-theme'),
    ));
    /* ------------------------------------------------ */


    /* OUTPUT VALID HTML5 */
    /* ------------------------------------------------ */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    /* ------------------------------------------------ */

    /* POST FORMATS */
    /* ------------------------------------------------ */
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
    ));
    /* ------------------------------------------------ */

    /* BACKGROUND FEATURE */
    /* ------------------------------------------------ */
    add_theme_support('custom-background', apply_filters('my_theme_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));
    /* ------------------------------------------------ */

    /* SELECTIVE REFRESH WIDGETS */
    /* ------------------------------------------------ */
    add_theme_support('customize-selective-refresh-widgets');
    /* ------------------------------------------------ */

    /* WIDGETS BLOCK EDITER */
    /* ------------------------------------------------ */
    remove_theme_support('widgets-block-editor');
    /* ------------------------------------------------ */

    /* SELECTIVE REFRESH WIDGETS */
    /* ------------------------------------------------ */
    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));
    /* ------------------------------------------------ */
}
add_action('after_setup_theme', 'shopees_theme_setup');
/* ------------------------------------------------ */


/* Add class to <li> elements */
/* ------------------------------------------------ */
function add_additional_class_on_li($classes, $item, $args)
{
    $classes[] = 'nav-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
/* ------------------------------------------------ */

/* Add class to <a> elements */
/* ------------------------------------------------ */
function add_additional_class_on_link($atts, $item, $args)
{
    if (!isset($atts['class'])) {
        $atts['class'] = '';
    }
    $atts['class'] .= 'nav-link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_link', 10, 3);
/* ------------------------------------------------ */

/* TGM REQUIRE PLUGIN */
/* ------------------------------------------------ */
function my_theme_register_required_plugins()
{

    $plugins = array(
        array(
            'name' => esc_html__('Woocommerce', 'adforest'),
            'slug' => 'woocommerce',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/woocommerce.8.8.3.zip'),
            'is_callable' => '',
        ),

        array(
            'name' => esc_html__('Classic Editor', 'adforest'),
            'slug' => 'classic-editor',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/classic-editor.zip'),
            'is_callable' => '',
        ),

        array(
            'name' => esc_html__('Elementor', 'adforest'),
            'slug' => 'elementor',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/elementor.zip'),
            'is_callable' => '',
        ),

        array(
            'name' => esc_html__('Elementor Addon Test', 'adforest'),
            'slug' => 'elementor-addon-test',
            'source' => get_template_directory() . '/required-plugins/elementor-addon-test.zip',
            'required' => false,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
            'is_callable' => '',
        ),

        array(
            'name' => esc_html__('One Click Demo Import', 'adforest'),
            'slug' => 'one-click-demo-import',
            'source' => '',
            'required' => false,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/one-click-demo-import.zip'),
            'is_callable' => '',
        ),

        array(
            'name' => esc_html__('Redux Framework', 'adforest'),
            'slug' => 'redux-framework',
            'source' => '',
            'required' => false,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/redux-framework.zip'),
            'is_callable' => '',
        ),
    );

    $config = array(
        'id'           => 'shopees-theme',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',

        'strings'      => array(
            'page_title'                      => __('Install Required Plugins', 'my-theme'),
            'menu_title'                      => __('Install Plugins', 'my-theme'),
            'installing'                      => __('Installing Plugin: %s', 'my-theme'),
            'updating'                        => __('Updating Plugin: %s', 'my-theme'),
            'oops'                            => __('Something went wrong with the plugin API.', 'my-theme'),
            'notice_can_install_required'     => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'my-theme'
            ),
            'notice_can_install_recommended'  => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'my-theme'
            ),
            'notice_ask_to_update'            => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'my-theme'
            ),
            'notice_ask_to_update_maybe'      => _n_noop(
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'my-theme'
            ),
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'my-theme'
            ),
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'my-theme'
            ),
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'my-theme'
            ),
            'update_link'                     => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'my-theme'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'my-theme'
            ),
            'return'                          => __('Return to Required Plugins Installer', 'my-theme'),
            'plugin_activated'                => __('Plugin activated successfully.', 'my-theme'),
            'activated_successfully'          => __('The following plugin was activated successfully:', 'my-theme'),
            'plugin_already_active'           => __('No action taken. Plugin %1$s was already active.', 'my-theme'),
            'plugin_needs_higher_version'     => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'my-theme'),
            'complete'                        => __('All plugins installed and activated successfully. %1$s', 'my-theme'),
            'dismiss'                         => __('Dismiss this notice', 'my-theme'),
            'notice_cannot_install_activate'  => __('There are one or more required or recommended plugins to install, update or activate.', 'my-theme'),
            'contact_admin'                   => __('Please contact the administrator of this site for help.', 'my-theme'),
            'nag_type'                        => 'updated',
        ),
    );

    shopees_tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'my_theme_register_required_plugins');
/* ------------------------------------------------ */


/* DEMO IMPORTER */
/* ------------------------------------------------ */
function my_theme_import_files()
{
    return array(
        array(
            'import_file_name'           => 'Shopees Demo',
            'categories'                 => array('Category 1', 'Category 2'),
            'local_import_file'          => trailingslashit(get_template_directory()) . 'demo-data/content.xml',
            // Uncomment these lines if you have widget and customizer files
            // 'local_import_widget_file'   => trailingslashit( get_template_directory() ) . 'demo-data/widgets.wie',
            // 'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-data/customizer.dat',
            'local_import_redux'         => array(
                array(
                    'file_path'   => trailingslashit(get_template_directory()) . 'demo-data/theme-options.json',
                    'option_name' => 'Shopees_theme',
                ),
            ),
            'import_preview_image_url'   => trailingslashit(get_template_directory()) . 'screenshot.png',
            'import_notice'              => __('Please be patient while the import process completes.', 'your-textdomain'),
            'preview_url'                => 'http://www.your-site.com/',
        ),
    );
}
add_filter('ocdi/import_files', 'my_theme_import_files');

function my_theme_after_import_setup()
{
    add_image_size('related-post-thumb', 300, 200, true);
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
        'primary' => $main_menu->term_id,
    ));


    $front_page_id = get_page_by_title('Home');
    $blog_page_id  = get_page_by_title('Blog');


    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);
}
add_action('ocdi/after_import', 'my_theme_after_import_setup');

/* ------------------------------------------------ */