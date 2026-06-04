<?php
/**
 * Theme setup.
 */

if ( ! function_exists( 'sidekick_wp_theme_setup' ) ) :
    /**
     * Register theme supports.
     */
    function sidekick_wp_theme_setup() {
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'editor-styles' );
        add_editor_style( 'build/style-index.css' );
    }
endif;
