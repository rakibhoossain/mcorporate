<?php
/**
 * Check and setup theme's default settings
 *
 * @package mcorporate
 *
 */

if ( ! function_exists ( 'mcorporate_setup_theme_default_settings' ) ) {
	function mcorporate_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$mcorporate_posts_index_style = get_theme_mod( 'mcorporate_posts_index_style' );
		if ( '' == $mcorporate_posts_index_style ) {
			set_theme_mod( 'mcorporate_posts_index_style', 'default' );
		}

		// Sidebar position.
		$mcorporate_sidebar_position = get_theme_mod( 'mcorporate_sidebar_position' );
		if ( '' == $mcorporate_sidebar_position ) {
			set_theme_mod( 'mcorporate_sidebar_position', 'right' );
		}

		// Container width.
		$mcorporate_container_type = get_theme_mod( 'mcorporate_container_type' );
		if ( '' == $mcorporate_container_type ) {
			set_theme_mod( 'mcorporate_container_type', 'container' );
		}
	}
}