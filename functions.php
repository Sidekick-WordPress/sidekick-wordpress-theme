<?php
/**
 * Custom Block Boilerplate functions and definitions
 */

if ( ! function_exists( 'sidekick_wp_theme' ) ) :
    function sidekick_wp_theme()  {
        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style.css' );
    }
endif;
add_action( 'after_setup_theme', 'sidekick_wp_theme' );