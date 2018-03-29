<?php
/**
 * baladesauxjardins functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package baladesauxjardins
 */

if ( ! function_exists( 'baladesauxjardins_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function baladesauxjardins_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on baladesauxjardins, use a find and replace
		 * to change 'baladesauxjardins' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'baladesauxjardins', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary_menu', 'baladesauxjardins' ),
                        'menu-2' => esc_html__( 'Footer_menu', 'baladesauxjardins' ),
                        'menu-3' => esc_html__( 'Category_menu', 'baladesauxjardins' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'baladesauxjardins_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'baladesauxjardins_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function baladesauxjardins_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'baladesauxjardins_content_width', 640 );
}
add_action( 'after_setup_theme', 'baladesauxjardins_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function baladesauxjardins_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'baladesauxjardins' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'baladesauxjardins' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'baladesauxjardins_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function baladesauxjardins_scripts() {
	wp_enqueue_style( 'baladesauxjardins-style', get_stylesheet_uri() );

	wp_enqueue_script( 'baladesauxjardins-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'baladesauxjardins-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'baladesauxjardins_scripts' );

/**
 * Implement the Custom Post Type Agenda
 */
function agenda_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Rendez-vous', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Rendez-vous', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Agenda'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les rendez-vous'),
		'view_item'           => __( 'Voir les rendez-vous'),
		'add_new_item'        => __( 'Ajouter un nouveau rendez-vous'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le rendez-vous'),
		'update_item'         => __( 'Modifier le rendez-vous'),
		'search_items'        => __( 'Rechercher un rendez-vous'),
		'not_found'           => __( 'Non trouvé'),
		'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Rendez-vous'),
		'description'         => __( 'Agenda des visites et conférences'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'custom-fields', 'author' ),
		/* 
		* Différentes options supplémentaires
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'rendez-vous'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'agenda', $args );

}

add_action( 'init', 'agenda_custom_post_type', 0 );

add_filter('manage_agenda_posts_columns', 'agenda_table_head');
function agenda_table_head( $defaults ) {
    
    $defaults['agenda_date']  = 'Date';
    $defaults['agenda_heure']    = 'Heure';
    $defaults['agenda_partenaire']   = 'Partenaire';
    return $defaults;
}

add_action( 'manage_agenda_posts_custom_column', 'agenda_table_content', 10, 2 );

function agenda_table_content( $column_name, $post_id ) {
    if ($column_name == 'agenda_date') {
    echo get_post_meta( $post_id, 'Date', true );
    }
    if ($column_name == 'agenda_heure') {
    echo get_post_meta( $post_id, 'Heure', true );
    }
    if ($column_name == 'agenda_partenaire') {
    echo get_post_meta( $post_id, 'Partenaire', true );
    }

}

/**
 * Implement the Custom Post Type Références
 */
function reference_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Références', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Référence', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Références'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les références'),
		'view_item'           => __( 'Voir les références'),
		'add_new_item'        => __( 'Ajouter une nouvelle référence'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la référence'),
		'update_item'         => __( 'Modifier la référence'),
		'search_items'        => __( 'Rechercher une référence'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Référence'),
		'description'         => __( 'Références presse, télévision et autres'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'author' ),
		/* 
		* Différentes options supplémentaires
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'reference'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'reference', $args );

}

add_action( 'init', 'reference_custom_post_type', 0 );


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

