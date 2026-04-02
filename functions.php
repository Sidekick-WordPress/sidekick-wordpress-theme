<?php
/**
 * Custom Block Boilerplate functions and definitions
 */

if ( ! function_exists( 'sidekick_wp_theme' ) ) :
    function sidekick_wp_theme()  {
        // Add support for block styles. (Fixed typo here)
        add_theme_support( 'wp-block-styles' );

        // Get the single auto-generated asset file for both JS and CSS
        $asset_path = get_template_directory() . '/build/index.asset.php';
        $asset      = file_exists( $asset_path ) ? require $asset_path : array( 'dependencies' => array(), 'version' => wp_get_theme()->get( 'Version' ) );

        // 1. Enqueue the compiled CSS (Filename changed to index.css)
        wp_enqueue_style(
            'sidekick-wp-styles',
            get_template_directory_uri() . '/build/style-index.css',
            array(),
            $asset['version']
        );

        // 2. Enqueue the compiled JavaScript
        wp_enqueue_script(
            'sidekick-wp-scripts',
            get_template_directory_uri() . '/build/index.js',
            $asset['dependencies'],
            $asset['version'],
            true
        );
    }
endif;
add_action( 'after_setup_theme', 'sidekick_wp_theme' );
