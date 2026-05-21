<?php
/**
 * Theme assets.
 */

if ( ! function_exists( 'sidekick_wp_theme_enqueue_assets' ) ) :
    /**
     * Enqueue compiled theme styles and scripts.
     */
    function sidekick_wp_theme_enqueue_assets() {
        $asset_path = get_template_directory() . '/build/index.asset.php';
        $asset      = file_exists( $asset_path ) ? require $asset_path : array(
            'dependencies' => array(),
            'version'      => wp_get_theme()->get( 'Version' ),
        );

        $style_path    = get_template_directory() . '/build/style-index.css';
        $style_version = file_exists( $style_path ) ? filemtime( $style_path ) : $asset['version'];

        wp_enqueue_style(
            'sidekick-wp-styles',
            get_template_directory_uri() . '/build/style-index.css',
            array(),
            $style_version
        );

        wp_enqueue_script(
            'sidekick-wp-scripts',
            get_template_directory_uri() . '/build/index.js',
            $asset['dependencies'],
            $asset['version'],
            true
        );
    }
endif;
