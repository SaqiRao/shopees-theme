<?php
global $Shopees_theme;
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */
defined('ABSPATH') || exit;
if (!class_exists('Redux')) {
	return;
}

$opt_name = 'Shopees_theme';
$dir = __DIR__ . DIRECTORY_SEPARATOR;

$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if (is_dir($sample_patterns_path)) {
	$sample_patterns_dir = opendir($sample_patterns_path);

	if ($sample_patterns_dir) {

		// phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
		while (false !== ($sample_patterns_file = readdir($sample_patterns_dir))) {
			if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
				$name              = explode('.', $sample_patterns_file);
				$name              = str_replace('.' . end($name), '', $sample_patterns_file);
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);


$theme = wp_get_theme();
$args = array(
	'opt_name'                  => $opt_name,
	'display_name' => __('Theme Options - Shopees Theme', 'adforest'),
	'display_version' => $theme->get('Version'),
	'page_title' => __('Theme Options - Shopees Theme', 'adforest'),
	'menu_type'                 => 'submenu',
	'allow_sub_menu'            => true,
	'menu_title'                => esc_html__('Shopees Options', 'your-textdomain-here'),
	'page_title'                => esc_html__('Shopees Options', 'your-textdomain-here'),
	'disable_google_fonts_link' => false,
	'sub_menu' => true,
	'admin_bar'                 => true,
	'admin_bar_icon'            => 'dashicons-portfolio',
	'admin_bar_priority'        => 50,
	'global_variable'           => $opt_name,
	'dev_mode'                  => false,
	'customizer'                => true,
	'open_expanded'             => false,
	'disable_save_warn'         => false,
	'page_priority'             => 90,
	'page_parent'               => 'themes.php',
	'page_permissions'          => 'manage_options',
	'menu_icon'                 => '',
	'last_tab'                  => '',
	'page_icon'                 => 'icon-themes',
	'page_slug'                 => $opt_name,
	'save_defaults'             => true,
	'default_show'              => true,
	'default_mark'              => '*',
	'show_import_export'        => true,
	'transient_time'            => 60 * MINUTE_IN_SECONDS,
	'output'                    => true,
	'output_tag'                => true,
	'footer_credit'             => '',
	'use_cdn'                   => true,
	'admin_theme'               => 'wp',
	'flyout_submenus'           => true,
	'font_display'              => 'swap',
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//devs.redux.io/',
	'title' => __('Documentation', 'your-textdomain-here'),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => __('Support', 'your-textdomain-here'),
);

$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => 'Like us on Facebook',
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => 'Follow us on Twitter',
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'el el-linkedin',
);

Redux::set_args($opt_name, $args);


$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__('Theme Information 1', 'your-textdomain-here'),
		'content' => '<p>' . esc_html__('This is the tab content, HTML is allowed.', 'your-textdomain-here') . '</p>',
	),
	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__('Theme Information 2', 'your-textdomain-here'),
		'content' => '<p>' . esc_html__('This is the tab content, HTML is allowed.', 'your-textdomain-here') . '</p>',
	),
);
Redux::set_help_tab($opt_name, $help_tabs);

// Set the help sidebar.
$content = '<p>' . esc_html__('This is the sidebar content, HTML is allowed.', 'your-textdomain-here') . '</p>';

Redux::set_help_sidebar($opt_name, $content);
Redux::set_section($opt_name, array(
	'title'   => 'General Settings ',
	'icon'    => 'el-icon-cogs',
	'heading' => 'General Settings',
	'desc'    => '<br />This is General Settings.<br />',
	'fields'  => array(

		array(
			'id'       => 'logo_media',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Website Logo', 'your-textdomain-here'),
			'desc'     => esc_html__('Uploade Website logo image', 'your-textdomain-here'),
			'default'  => array(
				'url' => 'https://s.wordpress.org/style/images/codeispoetry.png'
			),
		),
	),

));
Redux::set_section($opt_name, array(
	'title'   => 'Footer Settings',
	'icon'    => 'el-icon-cogs',
	'heading' => 'Footer Settings',
	'desc'    => '<br />This is the section description.  HTML is permitted.<br />',
	'fields'  => array(
		array(
			'id'       => 'about_us_heading',
			'type'     => 'text',
			'title'    => __('Text Heading', 'redux-framework-demo'),
			'default'  => 'About Us',
		),
		array(
			'id'       => 'info_about',
			'type'     => 'textarea',
			'title'    => __('Discription Heading', 'redux-framework-demo'),
			'default'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
		),
		array(
			'id'       => 'newslatter_heading',
			'type'     => 'text',
			'title'    => __('News Latter Heading', 'redux-framework-demo'),
			'default'  => 'News Latter',
		),
		array(
			'id'       => 'newslatter_btn',
			'type'     => 'text',
			'title'    => __('Newslatter Button text', 'redux-framework-demo'),
			'default'  => 'Subscribe',
		),
		array(
			'id'       => 'needhelp_heading',
			'type'     => 'text',
			'title'    => __('Text Heading', 'redux-framework-demo'),
			'default'  => 'Need Help',
		),
		array(
			'id'       => 'info_needhelp',
			'type'     => 'textarea',
			'title'    => __('Discription Heading', 'redux-framework-demo'),
			'default'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
		),
		array(
			'id'       => 'Contact_heading',
			'type'     => 'text',
			'title'    => __('Contact Us', 'redux-framework-demo'),
			'default'  => 'Contact Us',
		),

		array(
			'id'       => 'web_right_text',
			'type'     => 'text',
			'title'    => __('All Right Text', 'redux-framework-demo'),
			'default'  => 'Shopees',
		),


	),
));

// if (file_exists($dir . '/../README.md')) {
// 	$section = array(
// 		'icon'   => 'el el-list-alt',
// 		'title'  => esc_html__('Documentation', 'your-textdomain-here'),
// 		'fields' => array(
// 			array(
// 				'id'           => 'opt-raw-documentation',
// 				'type'         => 'raw',
// 				'markdown'     => true,
// 				'content_path' => __DIR__ . '/../README.md', // FULL PATH, not relative, please.
// 			),
// 		),
// 	);

// 	Redux::set_section($opt_name, $section);
// }

Redux::set_section(
	$opt_name,
	array(
		'icon'            => 'el el-list-alt',
		'title'           => esc_html__('Customizer Only', 'your-textdomain-here'),
		'desc'            => '<p class="description">' . esc_html__('This Section should be visible only in Customizer', 'your-textdomain-here') . '</p>',
		'customizer_only' => true,
		'fields'          => array(
			array(
				'id'              => 'opt-customizer-only',
				'type'            => 'select',
				'title'           => esc_html__('Customizer Only Option', 'your-textdomain-here'),
				'subtitle'        => esc_html__('The subtitle is NOT visible in customizer', 'your-textdomain-here'),
				'desc'            => esc_html__('The field desc is NOT visible in customizer.', 'your-textdomain-here'),
				'customizer_only' => true,
				'options'         => array(
					'1' => esc_html__('Opt 1', 'your-textdomain-here'),
					'2' => esc_html__('Opt 2', 'your-textdomain-here'),
					'3' => esc_html__('Opt 3', 'your-textdomain-here'),
				),
				'default'         => '2',
			),
		),
	)
);


if (!function_exists('compiler_action')) {
	/**
	 * This is a test function that will let you see when the compiler hook occurs.
	 * It only runs if a field's value has changed and compiler=>true is set.
	 *
	 * @param array  $options        Options values.
	 * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
	 * @param array  $changed_values Any values changed since last save.
	 */
	function compiler_action(array $options, string $css, array $changed_values)
	{
		echo '<h1>The compiler hook has run!</h1>';
		echo '<pre>';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		print_r($changed_values); // Values that have changed since the last save.
		// echo '<br/>';
		// print_r($options); //Option values.
		// echo '<br/>';
		// print_r($css); // Compiler selector CSS values compiler => array( CSS SELECTORS ).
		echo '</pre>';
	}
}

if (!function_exists('redux_validate_callback_function')) {
	/**
	 * Custom function for the callback validation referenced above
	 *
	 * @param array $field          Field array.
	 * @param mixed $value          New value.
	 * @param mixed $existing_value Existing value.
	 *
	 * @return array
	 */
	function redux_validate_callback_function(array $field, $value, $existing_value): array
	{
		$error   = false;
		$warning = false;

		// Do your validation.
		if (1 === (int) $value) {
			$error = true;
			$value = $existing_value;
		} elseif (2 === (int) $value) {
			$warning = true;
			$value   = $existing_value;
		}

		$return['value'] = $value;

		if (true === $error) {
			$field['msg']    = 'your custom error message';
			$return['error'] = $field;
		}

		if (true === $warning) {
			$field['msg']      = 'your custom warning message';
			$return['warning'] = $field;
		}

		return $return;
	}
}


if (!function_exists('dynamic_section')) {
	/**
	 * Custom function for filtering the section array.
	 * Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
	 *
	 * @param array $sections Section array.
	 *
	 * @return array
	 */
	function dynamic_section(array $sections): array
	{
		$sections[] = array(
			'title'  => esc_html__('Section via hook', 'your-textdomain-here'),
			'desc'   => '<p class="description">' . esc_html__('This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'your-textdomain-here') . '</p>',
			'icon'   => 'el el-paper-clip',

			// Leave this as a blank section, no options just some intro text set above.
			'fields' => array(),
		);

		return $sections;
	}
}

if (!function_exists('change_arguments')) {
	/**
	 * Filter hook for filtering the args.
	 * Good for child themes to override or add to the args array.
	 * It can also be used in other functions.
	 *
	 * @param array $args Global arguments array.
	 *
	 * @return array
	 */
	function change_arguments(array $args): array
	{
		$args['dev_mode'] = true;

		return $args;
	}
}

if (!function_exists('change_defaults')) {
	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 *
	 * @param array $defaults Default value array.
	 *
	 * @return array
	 */
	function change_defaults(array $defaults): array
	{
		$defaults['str_replace'] = esc_html__('Testing filter hook!', 'your-textdomain-here');

		return $defaults;
	}
}

if (!function_exists('redux_custom_sanitize')) {
	/**
	 * Function to be used if the field sanitizes argument.
	 * Return value MUST be formatted or cleaned text to display.
	 *
	 * @param string $value Value to evaluate or clean.  Required.
	 *
	 * @return string
	 */
	function redux_custom_sanitize(string $value): string
	{
		$return = '';

		foreach (explode(' ', $value) as $w) {
			foreach (str_split($w) as $k => $v) {
				if (($k + 1) % 2 !== 0 && ctype_alpha($v)) {
					$return .= mb_strtoupper($v);
				} else {
					$return .= $v;
				}
			}

			$return .= ' ';
		}

		return $return;
	}
}
