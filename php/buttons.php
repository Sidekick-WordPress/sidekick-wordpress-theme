<?php
/**
 * Button block styles.
 */

if ( ! function_exists( 'sidekick_wp_theme_get_button_style_variations' ) ) :
    /**
     * Get the button style variations used by the theme.
     */
    function sidekick_wp_theme_get_button_style_variations() {
        return array(
            'primary'   => array(
                'label' => __( 'Primary', 'sidekick-wp-theme' ),
                'bg'    => 'var(--wp--preset--color--primary)',
                'text'  => 'var(--wp--preset--color--base)',
                'bgH'   => 'var(--wp--preset--color--lighter-grey)',
                'textH' => 'var(--wp--preset--color--contrast)',
            ),
            'secondary' => array(
                'label' => __( 'Secondary', 'sidekick-wp-theme' ),
                'bg'    => 'var(--wp--preset--color--darkest-grey)',
                'text'  => 'var(--wp--preset--color--base)',
                'bgH'   => 'var(--wp--preset--color--lighter-grey)',
                'textH' => 'var(--wp--preset--color--contrast)',
            ),
            'outline'   => array(
                'label'   => __( 'Outline', 'sidekick-wp-theme' ),
                'bg'      => 'transparent',
                'text'    => 'var(--wp--preset--color--primary)',
                'border'  => 'var(--wp--preset--color--primary)',
                'bgH'     => 'var(--wp--preset--color--primary)',
                'textH'   => 'var(--wp--preset--color--base)',
                'borderH' => 'var(--wp--preset--color--primary)',
            ),
            'ghost'     => array(
                'label'   => __( 'Ghost', 'sidekick-wp-theme' ),
                'bg'      => 'transparent',
                'text'    => 'var(--wp--preset--color--contrast)',
                'border'  => 'transparent',
                'bgH'     => 'var(--wp--preset--color--lightest-grey)',
                'textH'   => 'var(--wp--preset--color--contrast)',
                'borderH' => 'var(--wp--preset--color--lightest-grey)',
            ),
            'danger'    => array(
                'label' => __( 'Danger', 'sidekick-wp-theme' ),
                'bg'    => 'var(--wp--preset--color--error)',
                'text'  => 'var(--wp--preset--color--base)',
                'bgH'   => 'var(--wp--preset--color--darkest-grey)',
                'textH' => 'var(--wp--preset--color--base)',
            ),
            'success'   => array(
                'label' => __( 'Success', 'sidekick-wp-theme' ),
                'bg'    => 'var(--wp--preset--color--okay)',
                'text'  => 'var(--wp--preset--color--base)',
                'bgH'   => 'var(--wp--preset--color--darkest-grey)',
                'textH' => 'var(--wp--preset--color--base)',
            ),
        );
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_get_button_style_css' ) ) :
    /**
     * Build the inline CSS for a button style variation.
     */
    function sidekick_wp_theme_get_button_style_css( $slug, $variation ) {
        $selector       = ".wp-block-button.is-style-{$slug} .wp-block-button__link";
        $hover_selector = ".wp-block-button.is-style-{$slug} .wp-block-button__link:hover";
        $border         = $variation['border'] ?? $variation['bg'];
        $hover_border   = $variation['borderH'] ?? $variation['bgH'];

        $css  = "{$selector}{background-color:{$variation['bg']};color:{$variation['text']};border-color:{$border};}";
        $css .= "{$hover_selector}{background-color:{$variation['bgH']};color:{$variation['textH']};border-color:{$hover_border};}";

        return $css;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_register_button_styles' ) ) :
    /**
     * Register button block styles.
     */
    function sidekick_wp_theme_register_button_styles() {
        foreach ( sidekick_wp_theme_get_button_style_variations() as $slug => $variation ) {
            register_block_style(
                'core/button',
                array(
                    'name'         => $slug,
                    'label'        => $variation['label'],
                    'inline_style' => sidekick_wp_theme_get_button_style_css( $slug, $variation ),
                )
            );
        }

        register_block_style(
            'core/button',
            array(
                'name'         => 'pill',
                'label'        => __( 'Pill', 'sidekick-wp-theme' ),
                'inline_style' => '.wp-block-button.is-style-pill .wp-block-button__link{border-radius:999px;}',
            )
        );
    }
endif;
