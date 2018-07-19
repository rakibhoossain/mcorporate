<?php
/**
 * Mcorporate enqueue scripts
 *
 * @package mcorporate
 */

if ( ! function_exists( 'mcorporate_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function mcorporate_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		
		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
		wp_enqueue_style( 'mcorporate-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_style( 'mcorporate-menu', get_stylesheet_directory_uri() . '/css/menu.css', array(), $css_version );



		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), $theme_version, true);
		
		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');
		wp_enqueue_script( 'mcorporate-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		wp_enqueue_script( 'mcorporate-menu', get_template_directory_uri() . '/js/menu.js', array(), $js_version, true );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'mcorporate_scripts' ).

add_action( 'wp_enqueue_scripts', 'mcorporate_scripts' );