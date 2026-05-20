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
        $style_path = get_template_directory() . '/build/style-index.css';
        $style_version = file_exists( $style_path ) ? filemtime( $style_path ) : $asset['version'];

        // 1. Enqueue the compiled CSS (Filename changed to index.css)
        wp_enqueue_style(
            'sidekick-wp-styles',
            get_template_directory_uri() . '/build/style-index.css',
            array(),
            $style_version
        );

        // 2. Enqueue the compiled JavaScript
        wp_enqueue_script(
            'sidekick-wp-scripts',
            get_template_directory_uri() . '/build/index.js',
            $asset['dependencies'],
            $asset['version'],
            true
        );

        add_action( 'init', function () {
            $variations = [
                'primary' => [
                    'label' => __( 'Primary', 'your-theme' ),
                    'bg'    => 'var(--wp--preset--color--primary)',
                    'text'  => 'var(--wp--preset--color--base)',
                    'bgH'   => 'var(--wp--preset--color--lighter-grey)',
                    'textH' => 'var(--wp--preset--color--contrast)',
                ],
                'secondary' => [
                    'label' => __( 'Secondary', 'your-theme' ),
                    'bg'    => 'var(--wp--preset--color--darkest-grey)',
                    'text'  => 'var(--wp--preset--color--base)',
                    'bgH'   => 'var(--wp--preset--color--lighter-grey)',
                    'textH' => 'var(--wp--preset--color--contrast)',
                ],
                'outline' => [
                    'label'   => __( 'Outline', 'your-theme' ),
                    'bg'      => 'transparent',
                    'text'    => 'var(--wp--preset--color--primary)',
                    'border'  => 'var(--wp--preset--color--primary)',
                    'bgH'     => 'var(--wp--preset--color--primary)',
                    'textH'   => 'var(--wp--preset--color--base)',
                    'borderH' => 'var(--wp--preset--color--primary)',
                ],
                'ghost' => [
                    'label'   => __( 'Ghost', 'your-theme' ),
                    'bg'      => 'transparent',
                    'text'    => 'var(--wp--preset--color--contrast)',
                    'border'  => 'transparent',
                    'bgH'     => 'var(--wp--preset--color--lightest-grey)',
                    'textH'   => 'var(--wp--preset--color--contrast)',
                    'borderH' => 'var(--wp--preset--color--lightest-grey)',
                ],
                'danger' => [
                    'label' => __( 'Danger', 'your-theme' ),
                    'bg'    => 'var(--wp--preset--color--error)',
                    'text'  => 'var(--wp--preset--color--base)',
                    'bgH'   => 'var(--wp--preset--color--darkest-grey)',
                    'textH' => 'var(--wp--preset--color--base)',
                ],
                'success' => [
                    'label' => __( 'Success', 'your-theme' ),
                    'bg'    => 'var(--wp--preset--color--okay)',
                    'text'  => 'var(--wp--preset--color--base)',
                    'bgH'   => 'var(--wp--preset--color--darkest-grey)',
                    'textH' => 'var(--wp--preset--color--base)',
                ],
            ];

            foreach ( $variations as $slug => $v ) {
                $sel    = ".wp-block-button.is-style-{$slug} .wp-block-button__link";
                $selH   = ".wp-block-button.is-style-{$slug} .wp-block-button__link:hover";
                $border = $v['border']  ?? $v['bg'];
                $borderH= $v['borderH'] ?? $v['bgH'];

                $css  = "{$sel}{background-color:{$v['bg']};color:{$v['text']};border-color:{$border};}";
                $css .= "{$selH}{background-color:{$v['bgH']};color:{$v['textH']};border-color:{$borderH};}";

                register_block_style( 'core/button', [
                    'name'         => $slug,
                    'label'        => $v['label'],
                    'inline_style' => $css,
                ] );
            }

            // Pill is a modifier — just changes shape.
            register_block_style( 'core/button', [
                'name'         => 'pill',
                'label'        => __( 'Pill', 'your-theme' ),
                'inline_style' => '.wp-block-button.is-style-pill .wp-block-button__link{border-radius:999px;}',
            ] );
        } );
    }
endif;
add_action( 'after_setup_theme', 'sidekick_wp_theme' );

if ( ! function_exists( 'sidekick_wp_theme_breadcrumb_defaults' ) ) :
    function sidekick_wp_theme_breadcrumb_defaults( $defaults ) {
        $defaults['delimiter'] = '<span class="sidekick-breadcrumb__separator">/</span>';

        return $defaults;
    }
endif;
add_filter( 'woocommerce_breadcrumb_defaults', 'sidekick_wp_theme_breadcrumb_defaults' );

if ( ! function_exists( 'sidekick_wp_theme_product_breadcrumbs' ) ) :
    function sidekick_wp_theme_product_breadcrumbs( $crumbs ) {
        if ( ! function_exists( 'is_product' ) || ! is_product() || ! function_exists( 'wc_get_page_permalink' ) ) {
            return $crumbs;
        }

        $shop_url = wc_get_page_permalink( 'shop' );

        if ( empty( $shop_url ) ) {
            return $crumbs;
        }

        foreach ( $crumbs as $crumb ) {
            if ( isset( $crumb[1] ) && untrailingslashit( $crumb[1] ) === untrailingslashit( $shop_url ) ) {
                return $crumbs;
            }
        }

        array_splice( $crumbs, 1, 0, array( array( __( 'Shop', 'woocommerce' ), $shop_url ) ) );

        return $crumbs;
    }
endif;
add_filter( 'woocommerce_get_breadcrumb', 'sidekick_wp_theme_product_breadcrumbs' );
