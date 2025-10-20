<?php
/**
 * iggs-landing functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package iggs-landing
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
function iggs_landing_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on iggs-landing, use a find and replace
		* to change 'iggs-landing' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'iggs-landing', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'iggs-landing' ),
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
			'iggs_landing_custom_background_args',
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
}
add_action( 'after_setup_theme', 'iggs_landing_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function iggs_landing_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'iggs_landing_content_width', 640 );
}
add_action( 'after_setup_theme', 'iggs_landing_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function iggs_landing_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'iggs-landing' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'iggs-landing' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'iggs_landing_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function iggs_landing_scripts() {
	wp_enqueue_style( 'iggs-landing-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'iggs_landing_scripts' );


require get_template_directory() . '/pt-tx/settings.php';
if (get_option('cpt_1_enabled')) {
    require get_template_directory() . '/pt-tx/project.php';
}
if (get_option('cpt_2_enabled')) {
    require get_template_directory() . '/pt-tx/testimonial.php';
}
if (get_option('cpt_3_enabled')) {
    require get_template_directory() . '/pt-tx/member.php';
}
if (get_option('cpt_4_enabled')) {
    require get_template_directory() . '/pt-tx/office.php';
}
if (get_option('cpt_5_enabled')) {
    require get_template_directory() . '/pt-tx/service.php';
}
require get_template_directory() . '/pt-tx/partials/project.php';
require get_template_directory() . '/pt-tx/partials/activity.php';

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Options');
}

add_action( 'wpcf7_init', function() {
    if ( function_exists( 'wpcf7_add_form_tag' ) ) {
        wpcf7_add_form_tag(
            array( 'select_post_types', 'select_post_types*' ),
            'cf7_select_post_types_handler',
            array( 'name-attr' => true )
        );
    }
} );


function cf7_select_post_types_handler( $tag ) {
    if ( empty( $tag->name ) ) {
        return '';
    }

    $name = $tag->name;
    $is_required = $tag->is_required() ? 'required aria-required="true"' : '';
    $classes = '';
    if ( method_exists( $tag, 'get_class_option' ) ) {
        $class_options = $tag->get_class_option();
        if ( is_array( $class_options ) && ! empty( $class_options ) ) {
            $classes = implode( ' ', $class_options );
        }
    } else {
        $opts = $tag->options;
        foreach ( $opts as $o ) {
            if ( strpos( $o, 'class:' ) === 0 ) {
                $classes .= ' ' . trim( substr( $o, strlen('class:') ) );
            }
        }
    }

    $post_type = 'post';
    $show_title = false;
    if ( ! empty( $tag->options ) && is_array( $tag->options ) ) {
        foreach ( $tag->options as $opt ) {
            if ( strpos( $opt, 'post_type:' ) === 0 ) {
                $post_type = trim( substr( $opt, strlen('post_type:') ) );
            }
            if ( strpos( $opt, 'show_title:' ) === 0 ) {
                $show_title = (bool) trim( substr( $opt, strlen('show_title:') ) );
            }
        }
    }

    $posts = get_posts( array(
        'post_type'      => $post_type,
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    $options_html = '';
    if ( empty( $posts ) ) {
        $options_html .= '<option value="">-- No items --</option>';
    } else {
        foreach ( $posts as $p ) {
            $value = esc_attr( $p->post_name );
            $label = $show_title ? esc_html( $p->post_title ) : esc_html( $p->post_title );
            $options_html .= sprintf( '<option value="%s">%s</option>', $value, $label );
        }
    }

    $wpcf7_classes = 'wpcf7-form-control wpcf7-select';
    if ( $tag->is_required() ) {
        $wpcf7_classes .= ' wpcf7-validates-as-required';
    }

    $select = sprintf(
        '<select name="%s" class="%s %s" %s>%s</select>',
        esc_attr( $name ),
        esc_attr( $wpcf7_classes ),
        esc_attr( $classes ),
        $is_required,
        $options_html
    );

    return $select;
}