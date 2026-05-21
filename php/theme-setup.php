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
    }
endif;
