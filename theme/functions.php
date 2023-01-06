<?php
/**
 * CB Center functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CB_Center
 */

if (!defined('CB_CENTER_VERSION')) {
	// Replace the version number of the theme on each release.
	define('CB_CENTER_VERSION', '0.1.0');
}

if (!function_exists('cb_center_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cb_center_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CB Center, use a find and replace
		 * to change 'cb-center' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('cb-center', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'cb-center'),
				'menu-2' => __('Footer Menu', 'cb-center'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'cb_center_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cb_center_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Footer', 'cb-center'),
			'id' => 'sidebar-1',
			'description' => __('Add widgets here to appear in your footer.', 'cb-center'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}

add_action('widgets_init', 'cb_center_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cb_center_scripts()
{
	wp_enqueue_style('cb-center-style', get_stylesheet_uri(), array(), CB_CENTER_VERSION);
	wp_enqueue_script('cb-center-script', get_template_directory_uri() . '/js/script.min.js', array(), CB_CENTER_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'cb_center_scripts');

/**
 * Add the block editor class to TinyMCE.
 *
 * This allows TinyMCE to use Tailwind Typography styles.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function cb_center_tinymce_add_class($settings)
{
	$settings['body_class'] = 'block-editor-block-list__layout';
	return $settings;
}

add_filter('tiny_mce_before_init', 'cb_center_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


// set_site_transient('update_themes', null);
function geko_check_update($transient)
{
	if (empty($transient->checked)) {
		return $transient;
	}
	$theme_data = wp_get_theme(wp_get_theme()->template);
	$theme_slug = $theme_data->get_template();
	//Delete '-master' from the end of slug
	$theme_uri_slug = preg_replace('/-master$/', '', $theme_slug);

	$remote_version = '0.0.0';
	$style_css = wp_remote_get("https://raw.githubusercontent.com/job-net/cb_center_wp_theme/master/tailwind/custom/file-header.css")['body'];
	if (preg_match('/^[ \t\/*#@]*' . preg_quote('Version', '/') . ':(.*)$/mi', $style_css, $match) && $match[1])
		$remote_version = _cleanup_header_comment($match[1]);

	if (version_compare($theme_data->version, $remote_version, '<')) {
		$transient->response[$theme_slug] = array(
			'theme' => $theme_slug,
			'new_version' => $remote_version,
			'url' => 'https://github.com/job-net/cb_center_wp_theme/',
			'package' => 'https://github.com/job-net/cb_center_wp_theme/blob/master/cb-center.zip?raw=true',
		);
	}

	return $transient;
}

add_filter('pre_set_site_transient_update_themes', 'geko_check_update');
