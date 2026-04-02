<?php
/**
 * Custom Block Boilerplate functions and definitions
 */

if ( ! function_exists( 'sidekick_wp_theme' ) ) :
    function sidekick_wp_theme()  {
        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );

        // 1. Define the path to the auto-generated asset file
        $asset_file_path = get_template_directory() . '/build/style.scss.asset.php';

        // 2. Set up a fallback in case the build hasn't run yet
        $asset_file = file_exists( $asset_file_path )
            ? require $asset_file_path
            : array( 'dependencies' => array(), 'version' => wp_get_theme()->get( 'Version' ) );

        // 3. Enqueue the compiled CSS
        wp_enqueue_style(
            'sidekick-wp-styles',
            get_template_directory_uri() . '/build/style-style.scss.css',
            array(), // The CSS doesn't have dependencies, so we leave this empty
            $asset_file['version'] // Automatically busts cache when you change your SCSS!
        );
    }
endif;
add_action( 'after_setup_theme', 'sidekick_wp_theme' );
