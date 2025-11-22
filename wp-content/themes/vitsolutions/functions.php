<?php
/**
 * vitsolutions functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vitsolutions
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vitsolutions_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on vitsolutions, use a find and replace
		* to change 'vitsolutions' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'vitsolutions', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'vitsolutions' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'vitsolutions_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);


// create portfolio shortcode 
function vit_portfolio_shortcode($atts) {
    ob_start();
    get_template_part('template-parts/sections/portfolio'); // ✅ FIXED path
    return ob_get_clean();
}
add_shortcode('portfolio', 'vit_portfolio_shortcode');
}
add_action( 'after_setup_theme', 'vitsolutions_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vitsolutions_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vitsolutions_content_width', 640 );
}
add_action( 'after_setup_theme', 'vitsolutions_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vitsolutions_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'vitsolutions' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'vitsolutions' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vitsolutions_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vitsolutions_scripts() {
	wp_enqueue_style( 'vitsolutions-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'vitsolutions-style', 'rtl', 'replace' );

	wp_enqueue_script( 'vitsolutions-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// Vendor CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');
    wp_enqueue_style('aos-css', get_template_directory_uri() . '/assets/vendor/aos/aos.css');
    wp_enqueue_style('glightbox-css', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');

    // Main CSS
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');

    // JS (Load in footer)
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('aos-js', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), null, true);
    wp_enqueue_script('glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), null, true);
    wp_enqueue_script('imagesloaded-js', get_template_directory_uri() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js', array(), null, true);
    wp_enqueue_script('isotope-js', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), null, true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), null, true);

    // Main JS
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
    wp_enqueue_script('custom-mail-js', get_template_directory_uri() . '/assets/js/custom-mail.js', array(), null, true);
}
add_action( 'wp_enqueue_scripts', 'vitsolutions_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * adding elementor plugin 
 */
function mytheme_add_elementor_support() {
    add_post_type_support('page', 'elementor');
    // Example: if you have a custom post type
    add_post_type_support('my_custom_post', 'elementor');
}
add_action('init', 'mytheme_add_elementor_support');


/**
 * adding custom services. portfolio, team --- post type
 */
function register_custom_post_types() {

  $post_types = [
    'services' => [
      'name' => 'Services',
      'singular' => 'Service',
      'icon' => 'dashicons-hammer'
    ],
    'portfolio' => [
      'name' => 'Portfolio',
      'singular' => 'Portfolio Item',
      'icon' => 'dashicons-format-gallery'
    ],
    'team' => [
      'name' => 'Team',
      'singular' => 'Team Member',
      'icon' => 'dashicons-groups'
    ],
	'testimonials' => [
	'name' => 'Testimonials',
	'singular' => 'Testimonial',
	'icon' => 'dashicons-format-quote'
	],
  ];

  foreach ($post_types as $slug => $settings) {
    $labels = array(
      'name' => $settings['name'],
      'singular_name' => $settings['singular'],
      'menu_name' => $settings['name'],
      'name_admin_bar' => $settings['singular'],
      'add_new' => 'Add New',
      'add_new_item' => 'Add New ' . $settings['singular'],
      'new_item' => 'New ' . $settings['singular'],
      'edit_item' => 'Edit ' . $settings['singular'],
      'view_item' => 'View ' . $settings['singular'],
      'all_items' => 'All ' . $settings['name'],
      'search_items' => 'Search ' . $settings['name'],
      'not_found' => 'No ' . strtolower($settings['name']) . ' found.',
      'not_found_in_trash' => 'No ' . strtolower($settings['name']) . ' found in Trash.'
    );

    $args = array(
      'labels' => $labels,
      'public' => true,
      'menu_position' => 5,
      'menu_icon' => $settings['icon'],
      'has_archive' => false,
      'supports' => array('title', 'editor', 'thumbnail'),
      'show_in_rest' => true,
    );

    register_post_type($slug, $args);
  }
}
add_action('init', 'register_custom_post_types');

function register_portfolio_taxonomy() {
  register_taxonomy(
    'portfolio_category',
    'portfolio',
    array(
      'label' => 'Portfolio Categories',
      'hierarchical' => true,
      'rewrite' => array('slug' => 'portfolio-category'),
      'show_admin_column' => true,
      'show_in_rest' => true,
    )
  );
}
add_action('init', 'register_portfolio_taxonomy');

// Add social media fields to user profiles
function custom_user_social_links($user_contact) {
    $user_contact['twitter'] = __('Twitter URL', 'textdomain');
    $user_contact['facebook'] = __('Facebook URL', 'textdomain');
    $user_contact['instagram'] = __('Instagram URL', 'textdomain');
    return $user_contact;
}
add_filter('user_contactmethods', 'custom_user_social_links');

// custom email send for custom home page contact form instead contact 7 form 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $phone   = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    $to      = 'contact@vitsolutions24x7.com'; // Change to your email
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        "From: $name <$email>"
    ];

    $body = "
        <strong>Name:</strong> $name<br>
        <strong>Email:</strong> $email<br>
        <strong>Phone:</strong> $phone<br>
        <strong>Subject:</strong> $subject<br><br>
        <strong>Message:</strong><br>$message
    ";

    wp_mail($to, "New Inquiry - : $subject", $body, $headers);
}
