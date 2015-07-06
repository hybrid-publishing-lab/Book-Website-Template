<?php

/**
 * This is the required plugin check
 *
 * @package		TGM-Plugin-Activation
 * @subpackage 	Example
 * @version		2.4.2
 * @author		Thomas Griffin <thomasgriffinmedia.com>
 * @author		Gary Jones <gamajo.com>
 * @copyright	Copyright (c) 2014, Thomas Griffin
 * @license		http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link		https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'meson_press_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function meson_press_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		

		// Advanced Custom Fields
		array(
			'name'					=> 'Advanced Custom Fields',
			'slug'					=> 'advanced-custom-fields',
			'required'				=> true,
		),
		// Advanced Custom Fields
		array(
			'name'					=> 'Advanced Custom Fields: Bidirectional Post Relation Field',
			'slug'					=> 'acf-2way-pr',
			'required'				=> true,
		),
		// array(
		// 	'name'					=> 'Disqus Comment System',
		// 	'slug'					=> 'disqus-comment-system',
		// 	'required'				=> true,
		// ),
		// array(
		// 	'name'					=> 'Newsletter',
		// 	'slug'					=> 'newsletter',
		// 	'required'				=> true,
		// ),
		array(
			'name'					=> 'Post Types Order',
			'slug'					=> 'post-types-order',
			'required'				=> true,
		),
		array(
			'name'					=> 'Google Analytics Dashboard for WP',
			'slug'					=> 'google-analytics-dashboard-for-wp',
			'required'				=> false,
		),
		// array(
		// 	'name'					=> 'iThemes Security',
		// 	'slug'					=> 'better-wp-security',
		// 	'required'				=> false,
		// ),
		/*
		array(
			'name'					=> 'Epub Reader', // The plugin name.
			'slug'					=> 'epub-reader', // The plugin slug (typically the folder name).
			'source'				=> '', // The plugin source.
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'external_url'			=> '', // If set, overrides default API URL and points to an external URL.
		),
		array(
			'name'					=> 'OAI Harvester', // The plugin name.
			'slug'					=> 'oaiharvester', // The plugin slug (typically the folder name).
			'source'				=> '', // The plugin source.
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'external_url'			=> '', // If set, overrides default API URL and points to an external URL.
		),


		*/

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'default_path' 								=> '',					  // Default absolute path to pre-packaged plugins.
		'menu'										=> 'tgmpa-install-plugins', // Menu slug.
		'has_notices'								=> true,					// Show admin notices or not.
		'dismissable'								=> true,					// If false, a user cannot dismiss the nag message.
		'dismiss_msg'								=> '',					  // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'								=> false,				   // Automatically activate plugins after installation or not.
		'message'									=> '',					  // Message to output right before the plugins table.
		'strings'									=> array(
			'page_title'							=> __( 'Install Required Plugins', 'tgmpa' ),
			'menu_title'							=> __( 'Install Plugins', 'tgmpa' ),
			'installing'							=> __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
			'oops'									=> __( 'Something went wrong with the plugin API.', 'tgmpa' ),
			'notice_can_install_required'			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'		=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_install'					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
			'notice_can_activate_required'			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended'		=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_activate'				=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
			'notice_ask_to_update'					=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_update'					=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
			'install_link'							=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'							=> _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
			'return'								=> __( 'Return to Required Plugins Installer', 'tgmpa' ),
			'plugin_activated'						=> __( 'Plugin activated successfully.', 'tgmpa' ),
			'complete'								=> __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
			'nag_type'								=> 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}

/**
 *
 * @desc registers a theme activation hook
 * @param string $code : Code of the theme. This can be the base folder of your theme. Eg if your theme is in folder 'mytheme' then code will be 'mytheme'
 * @param callback $function : Function to call when theme gets activated.
 */
function wp_register_theme_activation_hook($code, $function) {
	$optionKey="theme_is_activated_" . $code;
	if(!get_option($optionKey)) {
		call_user_func($function);
		update_option($optionKey , 1);
	}
}

/**
 * @desc registers deactivation hook
 * @param string $code : Code of the theme. This must match the value you provided in wp_register_theme_activation_hook function as $code
 * @param callback $function : Function to call when theme gets deactivated.
 */
function wp_register_theme_deactivation_hook($code, $function) {
	// store function in code specific global
	$GLOBALS["wp_register_theme_deactivation_hook_function" . $code]=$function;

	// create a runtime function which will delete the option set while activation of this theme and will call deactivation function provided in $function
	$fn=create_function('$theme', ' call_user_func($GLOBALS["wp_register_theme_deactivation_hook_function' . $code . '"]); delete_option("theme_is_activated_' . $code. '");');

	// add above created function to switch_theme action hook. This hook gets called when admin changes the theme.
	// Due to wordpress core implementation this hook can only be received by currently active theme (which is going to be deactivated as admin has chosen another one.
	// Your theme can perceive this hook as a deactivation hook.
	add_action("switch_theme", $fn);
}

function meson_press_book_activate() {

	// Set Permalinks
	add_action( 'init', function() {
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
	} );

	$menuname = 'main_nav';
	// Does the menu exist already?
	$menu_exists = wp_get_nav_menu_object( $menuname );

	// $run_once = get_option('menu_check');
	if (!$menu_exists){
		/* 
		 * Generate Pages
		 * 
		 */
		
		// Insert page About
		$home = wp_insert_post(array('post_title' 		=> 'home',
									  'post_name' 		=> 'home',
									  'post_content' 	=> '',
									  'post_status' 	=> 'publish',
									  'post_type' 		=> 'page',
									  'page_template' 	=> 'mpb-home-version1.php'
									));

		if($home) {
			update_option( 'page_on_front', $home );
			update_option( 'show_on_front', 'page' );
			update_usermeta(1,'frontpage_id',$home);
		}

		// Insert page About
		$about = wp_insert_post(array('post_title' 		=> 'This project',
									  'post_name' 		=> 'about-the-project',
									  'post_content' 	=> '',
									  'post_status' 	=> 'publish',
									  'post_type' 		=> 'page',
									  'page_template' 	=> 'mpb-about.php'
									));
		
		// Insert page Authors
		$authors = wp_insert_post(array('post_title' => 'Authors',
									  'post_name' => 'author',
									  'post_content' => '',
									  'post_status' => 'publish',
									  'post_type' => 'page',
									  'page_template' 	=> 'mpb-authors.php'
									));

		// Insert page Meon Press
		$mesonpress = wp_insert_post(array('post_title' => 'Meson Press',
									  'post_name' => 'meson-press',
									  'post_content' => '',
									  'post_status' => 'publish',
									  'post_type' => 'page',
									  'page_template' 	=> 'mpb-meson-press.php'
									));

		// Insert page Book Content
		$bookcontent = wp_insert_post(array('post_title' => 'Book Content',
									  'post_name' => 'book-content',
									  'post_content' => '',
									  'post_status' => 'publish',
									  'post_type' => 'page',
									  'page_template' 	=> 'mpb-book-content.php'
									));

		// Insert page Blog
		$blog = wp_insert_post(array('post_title' => 'Blog',
									  'post_name' => 'blog',
									  'post_content' => '',
									  'post_status' => 'publish',
									  'post_type' => 'page',
									  'page_template' 	=> 'mpb-blog.php'
									));

		if($blog) {
			update_option( 'page_for_posts', $blog );
		}

		// Insert page Imprint
		$imprint = wp_insert_post(array('post_title' => 'Imprint',
									  'post_name' => 'imprint',
									  'post_content' => '',
									  'post_status' => 'publish',
									  'post_type' => 'page',
									  'page_template' 	=> 'mpb-imprint.php'
									));

		// Insert page Contact
		$contact = wp_insert_post(array('post_title' => 'Contact',
									  'post_name' => 'contact',
									  'post_content' => '',
									  'post_status' => 'publish',
									  'post_type' => 'page',
									  'page_template' 	=> 'mpb-contact.php'
									));

		//create the menu
		$menu_id = wp_create_nav_menu($menuname);
		//then get the menu object by its name
		$menu = get_term_by( 'name', $menuname, 'nav_menu' );

		//then add the actuall link/ menu item and you do this for each item you want to add
		$top_menu = wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-object-id' 	=> $about,
			'menu-item-title' 		=> 'About',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		//Sub menu item 
		$first_child = wp_update_nav_menu_item($menu->term_id, 0, array( 
			'menu-item-object-id' 	=> $authors,
			'menu-item-title' 		=> 'Authors',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish',
			'menu-item-parent-id' 	=> $top_menu
		));

		//Sub menu item 
		$second_child = wp_update_nav_menu_item($menu->term_id, 0, array( 
			'menu-item-object-id' 	=> $about,
			'menu-item-title' 		=> 'About the project',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish',
			'menu-item-parent-id' 	=> $top_menu
		));

		//Sub menu item 
		$third_child = wp_update_nav_menu_item($menu->term_id, 0, array( 
			'menu-item-object-id' 	=> $mesonpress,
			'menu-item-title' 		=> 'Meson Press',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish',
			'menu-item-parent-id' 	=> $top_menu
		));

		wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-object-id' 	=> $bookcontent,
			'menu-item-title' 		=>  'Book Content',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		wp_update_nav_menu_item($menu->term_id, 0, array(
			'menu-item-object-id' 	=> $blog,
			'menu-item-title' 		=>  'Blog',
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		$locations = get_theme_mod('nav_menu_locations');
		$locations['main-menu'] = $menu->term_id;
		set_theme_mod( 'nav_menu_locations', $locations );

	}

	$menuname = 'footer_links';
	// Does the menu exist already?
	$footer_menu_exists = wp_get_nav_menu_object( $menuname );

	if (!$footer_menu_exists){

		//create the footer menu
		$menuname = "footer_links";
		$menu_id = wp_create_nav_menu($menuname);
		$footer_menu = get_term_by( 'name', $menuname, 'nav_menu' );

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-title'		=> 'Twitter',
			'menu-item-classes'		=> 'menu-item',
			'menu-item-url'			=> home_url( '/' ),
			'menu-item-status'		=> 'publish')
		);

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-title'		=> 'Facebook',
			'menu-item-classes'		=> 'menu-item',
			'menu-item-url'			=> home_url( '/' ),
			'menu-item-status'		=> 'publish')
		);

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-title' =>  __('Instagram'),
			'menu-item-classes' => 'menu-item',
			'menu-item-url' => home_url( '/' ),
			'menu-item-status' => 'publish')
		);

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-object-id' 	=> $imprint,
			'menu-item-title' 		=>  __('Imprint'),
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		wp_update_nav_menu_item($footer_menu->term_id, 0, array(
			'menu-item-object-id' 	=> $contact,
			'menu-item-title' 		=>  __('Contact'),
			'menu-item-classes' 	=> 'menu-item',
			'menu-item-object' 		=> 'page',
			'menu-item-type' 		=> 'post_type',
			'menu-item-status' 		=> 'publish'
		));

		$locations = get_theme_mod('nav_menu_locations');
		$locations['footer-menu'] = $footer_menu->term_id;
		set_theme_mod( 'nav_menu_locations', $locations );

	}


}
wp_register_theme_activation_hook('meson-press-book', 'meson_press_book_activate');

/* 
 * Register Menus
 * 
 */
function register_menus() {
	register_nav_menus(
		array( 
			'main_nav' => 'The Main Menu',
			'footer_links' => 'Footer Links'
		)
	);
}
add_action( 'init', 'register_menus' );


/************* CUSTOM POST TYPES *************/
function custom_post_type() {
	
	// Set UI labels for Authors
	$people_labels = array(
		'name'					=> _x( 'People', 'Post Type General Name' ),
		'singular_name'			=> _x( 'Person', 'Post Type Singular Name' ),
		'menu_name'				=> 'Authors' ,
		'parent_item_colon'		=> 'Parent people' ,
		'all_items'				=> 'All people' ,
		'view_item'				=> 'View person' ,
		'add_new_item'			=> 'Add new person' ,
		'add_new'				=> 'Add new' ,
		'edit_item'				=> 'Edit person' ,
		'update_item'			=> 'Update person' ,
		'search_items'			=> 'Search people' ,
		'not_found'				=> 'Not Found' ,
		'not_found_in_trash'	=> 'Not found in Trash' 
	);
	
	// Set other options for Custom Post Type
	$people_args = array(
		'label'					=> 'people',
		'labels'				=> $people_labels,
		// Features this CPT supports in Post Editor
		'supports'				=> array( 'title', 'editor', 'excerpt', 'person', 'thumbnail', 'revisions' , 'person-tags' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'			=> array( 'person-tags'),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/  
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 6,
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'menu_icon'				=> 'dashicons-groups'
	);
	
	// Registering your Custom Post Type
	register_post_type( 'people', $people_args );

	// Set UI labels for Authors
	$chapters_labels = array(
		'name'					=> _x( 'Chapters', 'Post Type General Name' ),
		'singular_name'			=> _x( 'Chapter', 'Post Type Singular Name' ),
		'menu_name'				=> 'Chapters' ,
		'parent_item_colon'		=> 'Parent chapters' ,
		'all_items'				=> 'All chapters' ,
		'view_item'				=> 'View chapter' ,
		'add_new_item'			=> 'Add new chapter' ,
		'add_new'				=> 'Add new' ,
		'edit_item'				=> 'Edit chapter' ,
		'update_item'			=> 'Update chapter' ,
		'search_items'			=> 'Search chapters' ,
		'not_found'				=> 'Not Found' ,
		'not_found_in_trash'	=> 'Not found in Trash',
		'parent' 				=> 'Parent chapter',
	);
	
	// Set other options for Custom Post Type
	$chapters_args = array(
		'label'					=> 'chapters',
		'labels'				=> $chapters_labels,
		// Features this CPT supports in Post Editor
		'supports'				=> array( 'title', 'editor', 'excerpt', 'chapter', 'parent_id', 'page-attributes', 'comments' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'			=> array( 'chapter-tags'),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/  
		'hierarchical'			=> true,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 6,
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'menu_icon'				=> 'dashicons-admin-page'
	);
	
	// Registering your Custom Post Type
	register_post_type( 'chapters', $chapters_args );

	flush_rewrite_rules();

}

/* Hook into the 'init' action so that the function
*  Containing our post type registration is not 
*  unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );

// Custom Admin Theme
add_action( 'admin_enqueue_scripts', 'load_admin_style' );

function load_admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/library/dist/css/admin-style.css', false, '1.0.0' );
}

// Add Editor Stylesheet
function meson_add_editor_styles() {
	add_editor_style( 'library/dist/css/meson-editor-style.css' );
}
add_action( 'admin_init', 'meson_add_editor_styles' );

function buildTree(array $elements, $parentId = 0) {
	$branch = array();

	foreach ($elements as $element) {
		if ($element->post_parent == $parentId) {
			$children = buildTree($elements, $element->ID);
			if ($children) {
				$element->children = $children;
			}
			$branch[] = $element;
		}
	}

	return $branch;
}


function chapter_tree($chapters) {
	$tree = buildTree($chapters);
	$branches = array_map(function($branch){ if($branch->post_parent == 0) { return $branch;} }, $tree);
	return $branches;
}

function sub_chapters($chapter, $subchapters = array()) {
	$subchapters = array();

	$children = $chapter->children;
	if(!empty($children)){
		$chapter->children = null;
	}
	array_push($subchapters, $chapter);
	
	if(!empty($children)){
		foreach ($children as $subchapter) {
			$subchapters = sub_chapters($children, $subchapters);

		}
	}
	return $subchapters;
}


// enqueue styles
if( !function_exists("wp_bootstrap_theme_styles") ) {  
	function wp_bootstrap_theme_styles() { 
		// This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.

		wp_register_style( 'wpbs', get_template_directory_uri() . '/library/dist/css/styles.min.css', array(), '1.0', 'all' );

		wp_enqueue_style( 'wpbs' );

		// For child themes
		wp_register_style( 'wpbs-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'wpbs-style' );

		// Slick carousel
		wp_register_style( 'slick-carousel', get_template_directory_uri() . '/library/slick.js/slick/slick.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'slick-carousel' );

		// // Fontawesome
		// wp_register_style( 'fontAwesome', get_template_directory_uri() . '/library/dist/css/fontawesome.css', array(), '1.0', 'all' );
		// wp_enqueue_style( 'fontAwesome' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_styles' );

function make_socials(){
	$frontpage_id = get_usermeta(1,'frontpage_id');
	$rss_icon_old = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" class="social-icon"> <path id="rss-circle-outline-icon" d="M256,90c44.34,0,86.026,17.267,117.38,48.62C404.733,169.974,422,211.66,422,256
c0,44.34-17.267,86.026-48.62,117.38C342.026,404.732,300.34,422,256,422s-86.026-17.268-117.38-48.62
C107.267,342.026,90,300.34,90,256c0-44.34,17.267-86.026,48.62-117.38C169.974,107.267,211.66,90,256,90 M256,50
C142.229,50,50,142.229,50,256s92.229,206,206,206s206-92.229,206-206S369.771,50,256,50L256,50z M225.383,314.941
c0,13.926-11.287,25.211-25.211,25.211s-25.211-11.285-25.211-25.211c0-13.924,11.287-25.209,25.211-25.209
S225.383,301.018,225.383,314.941z M174.961,217.346v37.349c46.91,0.482,84.977,38.547,85.459,85.457h37.348
C297.284,272.54,242.573,217.829,174.961,217.346z M174.961,191.199c39.655,0.173,76.912,15.689,104.972,43.75
c28.115,28.115,43.64,65.462,43.753,105.204h37.352c-0.235-102.713-83.392-185.947-186.076-186.306V191.199z"></path> </svg>';
	$rss_icon = '<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="social-icon"><g><path d="M15.715,21.816c-0.882,0-1.598,0.755-1.598,1.674c0,0.924,0.716,1.67,1.598,1.67c0.885,0,1.6-0.746,1.6-1.67 C17.315,22.571,16.6,21.816,15.715,21.816z"/><path d="M14.117,12.561v2.415c5.343,0,9.692,4.568,9.692,10.18l2.308,0C26.117,18.213,20.733,12.561,14.117,12.561z"/><path d="M14.117,16.842v2.414c1.498,0,2.907,0.615,3.968,1.728c1.06,1.111,1.644,2.596,1.644,4.174l2.311,0 C22.041,20.572,18.485,16.842,14.117,16.842z"/><path d="M19.559,4.327c-8.284,0-15,6.716-15,15s6.716,15,15,15s15-6.716,15-15S27.843,4.327,19.559,4.327z M19.559,32.527 c-7.29,0-13.2-5.91-13.2-13.2s5.91-13.2,13.2-13.2s13.2,5.91,13.2,13.2S26.849,32.527,19.559,32.527z"/></g></svg>';
	$socials = '<li class="menu-item menu-item-type-post_type menu-item-object-page social-link first"><a href="'.get_bloginfo('rss2_url').'" target="_blank">'.$rss_icon.'</a></li>';
	
	$instagram = get_field('social_link_instagram',$frontpage_id);
	$instagram_icon_old = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" class="social-icon"> <path id="instagram-10-icon" d="M256,90c44.34,0,86.026,17.268,117.38,48.62C404.733,169.974,422,211.66,422,256
s-17.267,86.026-48.62,117.38C342.026,404.732,300.34,422,256,422s-86.026-17.268-117.38-48.62C107.267,342.026,90,300.34,90,256
s17.267-86.026,48.62-117.38C169.974,107.268,211.66,90,256,90 M256,50C142.229,50,50,142.229,50,256s92.229,206,206,206
s206-92.229,206-206S369.771,50,256,50L256,50z M332.569,240.88h-17.104c1.246,4.838,1.981,9.892,1.981,15.115
c0,33.392-27.062,60.453-60.446,60.453c-33.383,0-60.446-27.062-60.446-60.453c0-5.224,0.739-10.277,1.985-15.115h-17.104v83.124
c0,4.169,3.384,7.549,7.563,7.549h136.007c4.179,0,7.564-3.38,7.564-7.549V240.88z M332.569,187.991
c0-4.172-3.386-7.557-7.564-7.557h-22.664c-4.175,0-7.556,3.385-7.556,7.557v22.671c0,4.17,3.381,7.557,7.556,7.557h22.664
c4.179,0,7.564-3.387,7.564-7.557V187.991z M257,218.219c-20.867,0-37.781,16.909-37.781,37.776
c0,20.865,16.914,37.787,37.781,37.787s37.785-16.922,37.785-37.787C294.785,235.128,277.867,218.219,257,218.219 M332.569,354.23
H181.435c-12.516,0-22.665-10.151-22.665-22.678V180.435c0-12.52,10.149-22.665,22.665-22.665h151.135
c12.518,0,22.662,10.146,22.662,22.665v151.118C355.231,344.079,345.087,354.23,332.569,354.23"></path> </svg>';
	$instagram_icon = '<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="social-icon"><g><path d="M19.945,4.327c-8.284,0-15,6.716-15,15s6.716,15,15,15s15-6.716,15-15S28.229,4.327,19.945,4.327z M19.945,32.527
		c-7.29,0-13.2-5.91-13.2-13.2s5.91-13.2,13.2-13.2s13.2,5.91,13.2,13.2S27.235,32.527,19.945,32.527z"/><path d="M25.314,12.441c-0.025-0.003-0.049-0.009-0.074-0.014H14.65c-0.064,0.012-0.128,0.021-0.191,0.036
		c-0.585,0.139-1.018,0.632-1.101,1.251c-0.003,0.026-0.008,0.051-0.013,0.077v11.072c0.012,0.07,0.022,0.141,0.037,0.211
		c0.129,0.598,0.617,1.061,1.198,1.139c0.028,0.004,0.056,0.009,0.084,0.014h10.561c0.069-0.012,0.137-0.022,0.205-0.038
		c0.539-0.12,0.979-0.59,1.085-1.157c0.011-0.061,0.02-0.124,0.029-0.185V13.807c-0.009-0.06-0.017-0.121-0.028-0.181
		C26.401,13.007,25.913,12.527,25.314,12.441z M23.334,13.548c0.416,0,0.831,0,1.247,0c0.299,0,0.535,0.249,0.535,0.561
		c0,0.436,0,0.871,0,1.307c0,0.293-0.228,0.543-0.507,0.55c-0.217,0.006-0.435,0.001-0.652,0.004c-0.201,0-0.401,0.001-0.602,0
		c-0.247-0.001-0.448-0.142-0.523-0.372c-0.02-0.061-0.031-0.128-0.032-0.193c-0.003-0.432-0.002-0.864-0.002-1.296
		C22.799,13.798,23.036,13.548,23.334,13.548z M19.945,16.531c1.498-0.001,2.706,1.292,2.673,2.858
		c-0.031,1.518-1.24,2.767-2.735,2.733c-1.436-0.032-2.634-1.273-2.613-2.837C17.291,17.761,18.481,16.53,19.945,16.531z
		 M25.116,18.066c0,2.04,0,4.079,0,6.119c0,0.296-0.242,0.548-0.526,0.548c-3.098,0-6.195,0-9.293,0
		c-0.281,0-0.524-0.253-0.524-0.546c0-2.042,0-4.084,0-6.127v-0.037c0.422,0,0.838,0,1.256,0c-0.327,1.17-0.238,2.297,0.32,3.371
		c0.374,0.72,0.911,1.278,1.594,1.679c1.352,0.793,3.029,0.713,4.303-0.194c0.492-0.35,0.893-0.789,1.203-1.319
		c0.309-0.53,0.499-1.104,0.57-1.72c0.07-0.616,0.015-1.221-0.163-1.815h1.26V18.066z"/></g></svg>';
	if(!empty($instagram)) {
		$socials .= '<li class="menu-item menu-item-type-post_type menu-item-object-page social-link"><a href="'.$instagram.'" target="_blank">'.$instagram_icon.'</a></li>';
	}

	$facebook = get_field('social_link_facebook',$frontpage_id);
	$fb_icon_old = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" class="social-icon"> <path id="facebook-circle-outline-icon" d="M256.417,90c44.34,0,86.026,17.267,117.38,48.62c31.354,31.354,48.62,73.04,48.62,117.38
c0,44.34-17.267,86.026-48.62,117.38c-31.354,31.353-73.04,48.62-117.38,48.62s-86.026-17.268-117.38-48.62
c-31.354-31.354-48.62-73.04-48.62-117.38c0-44.34,17.267-86.026,48.62-117.38C170.391,107.267,212.077,90,256.417,90 M256.417,50
c-113.771,0-206,92.229-206,206s92.229,206,206,206s206-92.229,206-206S370.188,50,256.417,50L256.417,50z M228.111,218.133h-23.517
v38.386h23.517v112.764h45.22V256.04h31.551l3.358-37.907h-34.909c0,0,0-14.155,0-21.593c0-8.938,1.801-12.477,10.438-12.477
c6.957,0,24.471,0,24.471,0v-39.347c0,0-25.797,0-31.309,0c-33.649,0-48.82,14.814-48.82,43.186
C228.111,212.614,228.111,218.133,228.111,218.133z"></path> </svg>';
	$fb_icon = '<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="social-icon"><g><path d="M21.337,15.914c0-0.593,0.06-0.911,0.973-0.911h1.221v-2.275h-1.953c-2.346,0-3.171,1.103-3.171,2.959v1.366h-1.462v2.275 h1.462v6.601h2.927v-6.601h1.953l0.259-2.275h-2.211L21.337,15.914z"/><path d="M20.245,4.327c-8.284,0-15,6.716-15,15s6.716,15,15,15s15-6.716,15-15S28.529,4.327,20.245,4.327z M20.245,32.527 c-7.29,0-13.2-5.91-13.2-13.2s5.91-13.2,13.2-13.2s13.2,5.91,13.2,13.2S27.535,32.527,20.245,32.527z"/></g></svg>';
	if(!empty($facebook)) {
		$socials .= '<li class="menu-item menu-item-type-post_type menu-item-object-page social-link"><a href="'.$facebook.'" target="_blank">'.$fb_icon.'</a></li>';
	}
	
	$twitter = get_field('social_link_twitter',$frontpage_id);
	$twitter_icon_old = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" class="social-icon"> <path id="twitter-5-icon" d="M256,90c91.742,0,166,74.244,166,166c0,91.741-74.245,166-166,166c-91.743,0-166-74.245-166-166
C90,164.259,164.244,90,256,90 M256,50C142.229,50,50,142.229,50,256s92.229,206,206,206s206-92.229,206-206S369.771,50,256,50
L256,50z M368.797,201.997c-7.712,3.42-15.999,5.732-24.697,6.771c8.876-5.322,15.696-13.748,18.906-23.79
c-8.311,4.928-17.512,8.506-27.307,10.435c-7.843-8.357-19.02-13.579-31.387-13.579c-27.756,0-48.16,25.902-41.889,52.8
c-35.736-1.793-67.423-18.913-88.63-44.928c-11.265,19.323-5.844,44.61,13.308,57.409c-7.049-0.223-13.682-2.158-19.478-5.379
c-0.466,19.922,13.811,38.552,34.489,42.708c-6.052,1.646-12.681,2.023-19.419,0.735c5.472,17.084,21.354,29.516,40.17,29.862
c-18.079,14.169-40.849,20.495-63.661,17.807c19.028,12.2,41.632,19.32,65.915,19.32c79.834,0,124.939-67.433,122.222-127.911
C355.741,218.194,363.031,210.62,368.797,201.997z"></path> </svg>';
	$twitter_icon = '<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="social-icon"><g><path d="M19.444,16.599c-0.007-0.109-0.013-0.199-0.018-0.269C19.433,16.428,19.44,16.534,19.444,16.599z"/><path d="M19.422,16.271c-0.003-0.049-0.006-0.085-0.008-0.113C19.417,16.189,19.419,16.228,19.422,16.271z"/><path d="M19.445,16.613c0-0.005-0.001-0.009-0.001-0.014C19.445,16.604,19.445,16.608,19.445,16.613z"/><path d="M19.448,16.66c-0.001-0.018-0.002-0.03-0.003-0.047C19.447,16.641,19.448,16.66,19.448,16.66z"/><path d="M19.426,16.329c-0.001-0.02-0.003-0.039-0.004-0.058C19.423,16.289,19.425,16.309,19.426,16.329z"/><path d="M19.639,4.327c-8.284,0-15,6.716-15,15s6.716,15,15,15s15-6.716,15-15S27.923,4.327,19.639,4.327z M19.639,32.527 c-7.29,0-13.2-5.91-13.2-13.2s5.91-13.2,13.2-13.2s13.2,5.91,13.2,13.2S26.929,32.527,19.639,32.527z"/><path d="M19.415,16.159C19.41,16.085,19.408,16.065,19.415,16.159L19.415,16.159z"/><path d="M25.791,15.141c-0.811,0.302-0.925,0.262-0.525-0.191c0.296-0.322,0.649-0.906,0.649-1.077c0-0.03-0.143,0.02-0.305,0.111 c-0.172,0.101-0.553,0.252-0.839,0.342l-0.515,0.171l-0.467-0.332c-0.258-0.181-0.62-0.382-0.811-0.443 c-0.486-0.141-1.23-0.121-1.669,0.04c-1.192,0.453-1.946,1.62-1.86,2.898l0.029,0.493L19,17.093 c-1.736-0.231-3.252-1.016-4.54-2.335l-0.629-0.654l-0.162,0.483c-0.343,1.077-0.124,2.214,0.591,2.979 c0.381,0.423,0.296,0.483-0.362,0.231c-0.229-0.08-0.429-0.141-0.448-0.111c-0.067,0.07,0.162,0.986,0.343,1.348 c0.248,0.503,0.753,0.996,1.307,1.288l0.467,0.231l-0.553,0.01c-0.534,0-0.553,0.01-0.496,0.221 c0.191,0.654,0.944,1.348,1.784,1.65l0.591,0.211l-0.515,0.322c-0.763,0.463-1.66,0.725-2.556,0.745 c-0.429,0.01-0.782,0.05-0.782,0.081c0,0.101,1.164,0.664,1.841,0.886c2.032,0.654,4.445,0.372,6.257-0.745 c1.288-0.795,2.575-2.375,3.176-3.904c0.324-0.815,0.649-2.304,0.649-3.019c0-0.463,0.029-0.523,0.563-1.077 c0.315-0.322,0.61-0.674,0.668-0.775C26.287,14.969,26.277,14.969,25.791,15.141z"/></g></svg>';
	if(!empty($twitter)) {
		$socials .= '<li class="menu-item menu-item-type-post_type menu-item-object-page social-link"><a href="'.$twitter.'" target="_blank">'.$twitter_icon.'</a></li>';
	}
	return $socials;
}
/*
main menu here
*/
function meson_press_main_nav() {
	// Display the WordPress menu if available
	wp_nav_menu( 
		array( 
			'after'			=> '<li class="separator"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"><g><title/><ellipse ry="2" rx="2" cy="4" cx="4" stroke-width="0" stroke="#000000" fill="#000000"/></g></svg></li>',
			'menu'			=> 'main_nav', /* menu name */
			'menu_class'	=> 'nav navbar-nav',
			'theme_location'=> 'main_nav', /* where in the theme it's assigned */
			'container'		=> 'false', /* container class */
			'fallback_cb'	=> 'wp_bootstrap_main_nav_fallback', /* menu fallback */
			'items_wrap'	=> '<ul id="%1$s" class="%2$s">%3$s'.make_socials().'</ul>',
			'walker'		=> new Bootstrap_walker()
		)
	);
}

function meson_press_footer_links() { 
	// Display the WordPress menu if available
	wp_nav_menu(
		array(
			'after' 			=> '<span class="seperator">/</span>',
			'menu' 				=> 'footer_links', /* menu name */
			'theme_location' 	=> 'footer_links', /* where in the theme it's assigned */
			'container_class' 	=> 'footer-links clearfix', /* container class */
			'fallback_cb' 		=> 'wp_bootstrap_footer_links_fallback' /* menu fallback */,
			'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s<li class="cp">&copy; '.Date('Y').' '.get_bloginfo( "Name" ).'</li></ul>',
		)
	);
}

function wpb_first_and_last_menu_class($items) {
	$items[1]->classes[] = 'first';
	$items[count($items)]->classes[] = 'last';

	return $items;
}

add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');

/* 
 * Add Theme Support
 */
if( !function_exists( "wp_bootstrap_theme_support" ) ) {  
  function wp_bootstrap_theme_support() {
	add_theme_support( 'post-thumbnails' );	  // wp thumbnails (sizes handled in functions.php)
	set_post_thumbnail_size( 125, 125, true );   // default thumb size

	add_image_size( 'people-thumb-md', 300, 225, true ); // Hard Crop Mode
	add_image_size( 'people-thumb-sm', 140, 105, true ); // Hard Crop Mode
	add_image_size( 'book-thumb-sm', 140, 200, true ); // Hard Crop Mode
	add_image_size( 'book-thumb-mini', 9999, 100 ); // Unlimited Width
	add_image_size( 'teaser-big', 940, 340, true ); // Hard Crop Mode

	add_theme_support( 'custom-background' );  // wp custom background
	add_theme_support( 'automatic-feed-links' ); // rss

	// Add post format support - if these are not needed, comment them out
	add_theme_support( 'post-formats',	  // post formats
	  array( 
		'aside',   // title less blurb
		'gallery', // gallery of images
		'link',	// quick link to other site
		'image',   // an image
		'quote',   // a quick quote
		'status',  // a Facebook like status update
		'video',   // video 
		'audio',   // audio
		'chat'	 // chat transcript 
	  )
	);  

	add_theme_support( 'menus' );			// wp menus
	
	register_nav_menus(					  // wp3+ menus
	  array( 
		'top-menu' => 'The Main Menu',   // main nav in header
		'footer-menu' => 'Footer Links' // secondary nav in footer
	  )
	);  
  }
}
// launching this stuff after theme setup
add_action( 'after_setup_theme','wp_bootstrap_theme_support' );

// add_action( 'init', 'wp_blog_pagination' );
// function wp_blog_pagination()
// {
//     add_rewrite_rule( 'blog/page/?$', 'index.php?pagename=blog&page_offset=$matches[1]', 'top' );
// }

// Adding a new rule
function wp_blog_pagination($rules)
{
  $newrules = array();
  $newrules['blog/page/(.+)'] = 'index.php?pagename=blog&page_offset=$matches[1]';
  $finalrules = $newrules + $rules;
		return $finalrules;
}

// Adding the var so that WP recognizes it
function wp_insert_wp_blog_pagination($vars)
{
	array_push($vars, 'page_offset');
	return $vars;
}

add_filter('rewrite_rules_array','wp_blog_pagination');
add_filter('query_vars','wp_insert_wp_blog_pagination');
add_filter('init','flushRules');

// Remember to flush_rules() when adding rules
function flushRules(){
  global $wp_rewrite;
	$wp_rewrite->flush_rules();
}


/************* CUSTOM TAXONOMIES *************/

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_custom_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_custom_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

// 	$tax_labels = array(
// 		'name' => _x( 'Series', 'taxonomy general name' ),
// 		'singular_name' => _x( 'Series', 'taxonomy singular name' ),
// 		'search_items' =>   'Search Series' ,
// 		'all_items' =>  'All Series' ,
// 		'parent_item' =>  'Parent Series' ,
// 		'parent_item_colon' =>  'Parent Series:' ,
// 		'edit_item' =>  'Edit Series' , 
// 		'update_item' =>  'Update Series' ,
// 		'add_new_item' =>  'Add New Series' ,
// 		'new_item_name' =>  'New Series Name' ,
// 		'menu_name' =>  'Series' ,
// 	);

// // Now register the taxonomy

// 	register_taxonomy('series',array('books','series-page'), array(
// 		'hierarchical' => true,
// 		'labels' => $tax_labels,
// 		'show_ui' => true,
// 		'show_admin_column' => true,
// 		'query_var' => true,
// 		'rewrite' => array( 'slug' => 'series' ),
// 	));

	$role_tax_labels = array(
		'name' 							=> _x( 'Role', 'taxonomy general name' ),
		'singular_name'					=> _x( 'Role', 'taxonomy singular name' ),
		'search_items'					=>  'Search Roles' ,
		'all_items'						=> 'All Roles' ,
		'parent_item'					=> 'Parent Role' ,
		'parent_item_colon' 			=> 'Parent Roles:' ,
		'edit_item'						=> 'Edit Role' , 
		'update_item'					=> 'Update Roles' ,
		'add_new_item'					=> 'Add New Role' ,
		'new_item_name'					=> 'New Roles Name' ,
		'menu_name'						=> 'Roles' ,
	);

// Now register the taxonomy

	register_taxonomy('role',array('people'), array(
		'hierarchical'					=> true,
		'labels'						=> $role_tax_labels ,
		'show_ui'						=> true,
		'show_admin_column' 			=> true,
		'query_var'						=> true,
		'rewrite'						=> array( 'slug' => 'role' ),
	));

	$person_tax_labels = array(
		'name'							=> 'Person Tag',
		'singular_name'					=> 'Person Tag',
		'menu_name'						=> 'Person Tags',
		'all_items'						=> 'All Person Tags',
		'parent_item'					=> 'Parent Person Tag',
		'parent_item_colon'				=> 'Parent Person Tag:',
		'new_item_name'					=> 'New Person Tag',
		'add_new_item'					=> 'Add New Person Tag',
		'edit_item'						=> 'Edit Person Tag',
		'update_item'					=> 'Update Person Tag',
		'separate_items_with_commas'	=> 'Separate Person Tags with commas',
		'search_items'					=> 'Search Person Tags',
		'add_or_remove_items'			=> 'Add or remove Person Tags',
		'choose_from_most_used'			=> 'Choose from the most used Person Tags',
		'not_found'						=> 'Not Found',
	);
	$person_tax_args = array(
		'labels'						=> $person_tax_labels,
		'hierarchical'					=> false,
		'public'						=> true,
		'show_ui'						=> true,
		'show_admin_column'				=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
	);

	register_taxonomy( 'person-tags', array( 'people' ), $person_tax_args );

	$book_tags_labels = array(
		'name'							=> 'Book Tag',
		'singular_name'					=> 'Book Tag',
		'menu_name'						=> 'Book Tags',
		'all_items'						=> 'All Book Tags',
		'parent_item'					=> 'Parent Book Tag',
		'parent_item_colon'				=> 'Parent Book Tag:',
		'new_item_name'					=> 'New Book Tag',
		'add_new_item'					=> 'Add New Book Tag',
		'edit_item'						=> 'Edit Book Tag',
		'update_item'					=> 'Update Book Tag',
		'separate_items_with_commas' 	=> 'Separate Book Tags with commas',
		'search_items'					=> 'Search Book Tags',
		'add_or_remove_items'			=> 'Add or remove Book Tags',
		'choose_from_most_used'			=> 'Choose from the most used Book Tags',
		'not_found'						=> 'Not Found',
	);
	$book_tags_args = array(
		'labels'						=> $book_tags_labels,
		'hierarchical'					=> false,
		'public'						=> true,
		'show_ui'						=> true,
		'show_admin_column'				=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
	);

	register_taxonomy( 'book-tags', array( 'books' ), $book_tags_args );


}

add_filter('upload_mimes','add_custom_mime_types');
function add_custom_mime_types($mimes){
	return array_merge($mimes,array (
		'epub' => 'application/epub+zip'
	));
}

// Numeric Page Navi (built into the theme by default)
function wp_bootstrap_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 5;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	
	$prevPage = ($paged > 1) ? $paged - 1 : false;
	$nextPage = ($paged < $max_page) ? $paged + 1 : false;
	$firstPage = ($paged-3 > 0) ? '<li style="width:25px;"><a href="'.get_pagenum_link(1).'">1 ...</a></li>' : false;
	$lastPage = ($paged+3 < $max_page) ? '<li style="width:25px;"><a href="'.get_pagenum_link($max_page).'"> ...'.$max_page.'</a></li>' : false;
	echo $before.'<ul class="paginator">'."";
	
	if($prevPage) { echo '<li class="exists first"><a href="' . site_url().'/blog/page/'.$prevPage .'"><i class="fa fa-chevron-left"> </i></a></li>'; }
	else { echo '<li class="disabled first"></li>'; }

	echo "<li><ul class=\"pageLinkContainer\">";
	if ($firstPage ) {
		echo $firstPage; 
	}
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="active"><a href="#">'.$i.'</a></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	if ($lastPage ) {
		echo $lastPage; 
	}
	echo "</ul></li>";
	if($nextPage) { 
		echo '<li class="exists last"><a href="' . site_url().'/blog/page/'.$nextPage .'"><i class="fa fa-chevron-right"> </i></a></li>'; 
	} else { 
		echo '<li class="disabled last"></li>'; 
	}

	echo '</ul>'.$after."";
}

function maxLength($string,$count){
	$return = $string;
	if (strlen($string)>=$count){
		$return = substr($string,0,$count-3)."...";
	}
	return $return;
}

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function wp_bootstrap_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard clearfix">
				<div class="avatar col-sm-3">
					<?php echo get_avatar( $comment, $size='75' ); ?>
				</div>
				<div class="col-sm-9 comment-text">
					<?php printf('<h4>%s</h4>', get_comment_author_link()) ?>
					<?php edit_comment_link(__('Edit','wpbootstrap'),'<span class="edit-comment btn btn-sm btn-info"><i class="glyphicon-white glyphicon-pencil"></i>','</span>') ?>
					
					<?php if ($comment->comment_approved == '0') : ?>
	   					<div class="alert-message success">
		  				<p><?php _e('Your comment is awaiting moderation.','wpbootstrap') ?></p>
		  				</div>
					<?php endif; ?>
					
					<?php comment_text() ?>
					
					<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
					
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		</article>
	</li>
<?php
 }

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
?>
		<li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;<?php comment_author_link(); ?></li>
<?php
	}

function banner_class($class) {
	$out = "";
	if ($class == 'black_text') { 
		$out = 'banner_black_text'; 
	} elseif ($class == 'black_text_bg') { 
		$out = 'banner_black_text_bg'; 
	} elseif ($class == 'white_text') { 
		$out = 'banner_white_text'; 
	}
	return $out;
}

define( 'ACF_LITE', true );
if( !class_exists('Acf') ){
	if (file_exists(WP_PLUGIN_DIR.'/advanced-custom-fields/acf.php')){
		include_once(WP_PLUGIN_DIR.'/advanced-custom-fields/acf.php');
	}
}

if(function_exists("register_field_group"))
{
	//$about = get_page_by_title( 'About this project' );
	/*
	 * Because it should be possible to change the title of this page, the ID of the frontpage is saved in the usermeta table
	 *
	 */
	$frontpage_id = get_usermeta(1,'frontpage_id');

	if($frontpage_id){
		register_field_group(array (
			'id' => 'acf_about',
			'title' => 'About',
			'fields' => array (
				array (
					'key' => 'field_54c79055454d3',
					'label' => 'Book Cover Big Teaser',
					'name' => 'book_cover_big',
					'type' => 'image',
					'save_format' => 'object',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array (
					'key' => 'field_551916f36d7d0',
					'label' => 'Banner Keywords',
					'name' => 'banner_keywords',
					'type' => 'wysiwyg',
					'instructions' => 'Please add here the keywords that will appear on the left side in the banner.<br />Hit "Enter" after every keyword.',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_551a90c74c4d6',
					'label' => 'Textcolor',
					'name' => 'banner_textcolor',
					'type' => 'select',
					'instructions' => 'Use this selector to change your textcolor and background.',
					'choices' => array (
						'black_text' => 'Black Text, black underline',
						'black_text_bg' => 'Black Text, black underline, white background',
						'white_text' => 'White Text, white underline',
					),
					'default_value' => '',
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_54b8fb9b79065',
					'label' => 'Link for: More info',
					'name' => 'link_to_more_info',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_54b8fb9b79066',
					'label' => 'Link for: Get a copy',
					'name' => 'get_a_copy',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_54c7905545433',
					'label' => 'Project owner Logo',
					'name' => 'project_owner',
					'type' => 'image',
					'save_format' => 'object',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array (
					'key' => 'field_54e2177f58fdb',
					'label' => 'PDF Version',
					'name' => 'pdf_version',
					'type' => 'file',
					'save_format' => 'url',
					'library' => 'all',
				),
				array (
					'key' => 'field_54e214d2a6d6e',
					'label' => 'ePub',
					'name' => 'epub_version',
					'type' => 'file',
					'save_format' => 'url',
					'library' => 'all',
				),
				array (
					'key' => 'field_54b660106970e',
					'label' => 'Social links',
					'name' => '',
					'type' => 'tab',
				),
				array (
					'key' => 'field_54b8fb9b79052',
					'label' => 'Link to Instagram',
					'name' => 'social_link_instagram',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_54b8fb9b79051',
					'label' => 'Link to Facebook',
					'name' => 'social_link_facebook',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_54b8fba279052',
					'label' => 'Link to Twitter',
					'name' => 'social_link_twitter',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				)
			),
			'location' => array (
				array (
					array (
						'param' => 'page',
						'operator' => '==',
						'value' => $frontpage_id,
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_people',
			'title' => 'People',
			'fields' => array (
				array (
					'key' => 'field_54b8fb8578050',
					'label' => 'Social Links',
					'name' => '',
					'type' => 'tab',
				),
				array (
					'key' => 'field_54b8fb9b78052',
					'label' => 'Social Link 1',
					'name' => 'social_link_1',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_54b8fb9b78051',
					'label' => 'Social label 1',
					'name' => 'social_label_1',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_54b8fba278052',
					'label' => 'Social link 2',
					'name' => 'social_link_2',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_54b8fba278053',
					'label' => 'Social label 2',
					'name' => 'social_label_2',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_54b8fba878052',
					'label' => 'Social Link 3',
					'name' => 'social_link_3',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_54b8fba878053',
					'label' => 'Social Label 3',
					'name' => 'social_label_3',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				)
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'people',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_chapter',
			'title' => 'Chapter',
			'fields' => array (
				array (
					'key' => 'field_54b8fb3407ef7',
					'label' => 'Chapter line',
					'name' => 'chapter_line',
					'type' => 'wysiwyg',
					'instructions' => 'This line will appear in the chapter overview on the homepage. If left empty, the title of the chapter will be displayed as a fallback.',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
				array (
					'key' => 'field_54e2177f58555',
					'label' => 'Chapter PDF',
					'name' => 'chapter_pdf',
					'type' => 'file',
					'save_format' => 'url',
					'library' => 'all',
				)
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'chapters',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	}
}

function custom_tag_escape($data){
	return strtolower(str_replace(" ", "-", $data));
}

// enqueue javascript
if( !function_exists( "wp_bootstrap_theme_js" ) ) {  
  function wp_bootstrap_theme_js(){

	if ( !is_admin() ){
	  if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1) ) 
		wp_enqueue_script( 'comment-reply' );
	}

	// This is the full Bootstrap js distribution file. If you only use a few components that require the js files consider loading them individually instead
	wp_register_script( 'bootstrap', 
		get_template_directory_uri() . '/library/bootstrap/dist/js/bootstrap.min.js', 
		array('jquery'), 
		'1.2' );

	wp_register_script( 'wpbs-js', 
		get_template_directory_uri() . '/library/dist/js/scripts.2c1cb93a.min.js',
		array('bootstrap'), 
		'1.2' );
	wp_register_script( 'scripts', 
		get_template_directory_uri() . '/library/dist/js/scripts.min.js',
		array('bootstrap'), 
		'1.2' );

	wp_register_script( 'ajax-search', 
		get_template_directory_uri() . '/library/dist/js/ajax-search.js',
		array('bootstrap'), 
		'1.2' );

	wp_register_script( 'read-page', 
		get_template_directory_uri() . '/library/dist/js/page-read.js',
		array('bootstrap'), 
		'1.2' );

	wp_register_script( 'modernizr', 
		get_template_directory_uri() . '/library/modernizer/modernizr.js', 
		array('jquery'), 
		'1.2' );

	wp_register_script( 'slick-slider', 
		get_template_directory_uri() . '/library/slick.js/slick/slick.min.js', 
		array('jquery'), 
		'1.2' );

	wp_register_script( 'cookiejs', 
		get_template_directory_uri() . '/library/js/jquery.cookie.js', 
		array('jquery'), 
		'1.2' );

	wp_register_script( 'mixitup', 
		get_template_directory_uri() . '/library/js/jquery.mixitup.min.js', 
		array('jquery'), 
		'2.1.7' );

	wp_register_script( 'book-page', 
		get_template_directory_uri() . '/library/dist/js/book-page.js', 
		array('jquery'), 
		'1.0' );

	wp_register_script( 'comment-reply', 
		get_template_directory_uri() . '/library/dist/js/comment-reply.js', 
		array('jquery'), 
		'1.0' );

	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'scripts' );
	if ( is_search() ) {
	  wp_enqueue_script( 'ajax-search' );
	}
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'slick-slider' );
	wp_enqueue_script( 'cookiejs' );
	wp_enqueue_script( 'mixitup' );
	wp_enqueue_script( 'book-page' );
	wp_enqueue_script( 'read-page' );
	wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_js' );

/**
 * Registers and loads font awesome
 * CSS files using a CDN.
 *
 * @link http://www.bootstrapcdn.com/#tab_fontawesome
 * @author FAT Media
 */
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_awesome' );
/**
 * Register the awesomeness and add IE7 support
 *
 * @global $wp_styles
 * @global $is_IE
 */
function prefix_enqueue_awesome() {
	global $wp_styles, $is_IE;
	wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css', array(), '3.2.0' );
	if ( $is_IE ) {
		wp_enqueue_style( 'prefix-font-awesome-ie', '//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome-ie7.min.css', array('prefix-font-awesome'), '3.2.0' );
		// Add IE conditional tags for IE 7 and older
		$wp_styles->add_data( 'prefix-font-awesome-ie', 'conditional', 'lte IE 7' );
	}
}

add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
	function load_dashicons_front_end() {
	wp_enqueue_style( 'dashicons' );
}

// Menu output mods
class Bootstrap_walker extends Walker_Nav_Menu{
/*
main menu there
*/
	function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0){

		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		// If the item has children, add the dropdown class for bootstrap
		if ( $args->has_children ) {
			$class_names = "dropdown ";
		}

		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		
		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		if(($args->had_children == 1) && ($depth == 0)) {
			$output .= $args->after;
			$args->had_children = false;
		}

		$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
		$attributes .= ! empty( $object->target )	 ? ' target="' . esc_attr( $object->target	 ) .'"' : '';
		$attributes .= ! empty( $object->xfn )		? ' rel="'	. esc_attr( $object->xfn		) .'"' : '';
		$attributes .= ! empty( $object->url )		? ' href="'   . esc_attr( $object->url		) .'"' : '';

		// if the item has children add these two attributes to the anchor tag
		if ( $args->has_children ) {
			$attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
		$item_output .= $args->link_after;

		// if the item has children add the caret just before closing the anchor tag
		if ( $args->has_children ) {
			$item_output .= '<b class="caret"></b></a>';
		}
		else {
			$item_output .= '</a>';
		}
		if (in_array("last", $classes)){
			$item_output .= str_replace("separator", "separator last", $args->after);
		} else {
			if ( $args->has_children ) {
				$args->had_children = 1;
			} else {
				if ($depth<1){
					$item_output .= $args->after;
				}
			}
		}
		

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
	} // end start_el function

	function start_lvl(&$output, $depth = 0, $args = Array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		}
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}
