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
                'shadow' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'bgH'   => 'transparent',
                'textH' => 'var(--wp--preset--color--primary)',
                'shadowH' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'padding' => '8px 24px',
                'radius'  => '0',
                'borderRule' => '0',
            ),
            'secondary' => array(
                'label' => __( 'Secondary', 'sidekick-wp-theme' ),
                'bg'    => 'var(--wp--preset--color--primary)',
                'text'  => 'var(--wp--preset--color--ink)',
                'shadow' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'bgH'   => 'transparent',
                'textH' => 'var(--wp--preset--color--primary)',
                'shadowH' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'padding' => '8px 24px',
                'radius'  => '0',
                'borderRule' => '0',
            ),
            'ink' => array(
                'label' => __( 'Ink', 'sidekick-wp-theme' ),
                'bg'    => 'var(--wp--preset--color--secondary)',
                'text'  => 'var(--wp--preset--color--base)',
                'shadow' => 'none',
                'bgH'   => 'transparent',
                'textH' => 'var(--wp--preset--color--primary)',
                'shadowH' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'padding' => '12px 24px',
                'radius'  => '0',
                'borderRule' => '0',
            ),
            'outline-white-text'   => array(
                'label' => __( 'Outline White Text', 'sidekick-wp-theme' ),
                'bg'    => 'transparent',
                'text'  => 'var(--wp--preset--color--base)',
                'shadow' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'bgH'   => 'var(--wp--preset--color--primary)',
                'textH' => 'var(--wp--preset--color--ink)',
                'shadowH' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'padding' => '8px 24px',
                'radius'  => '0',
                'borderRule' => '0',
            ),
            'outline-teal-text' => array(
                'label' => __( 'Outline Teal Text', 'sidekick-wp-theme' ),
                'bg'    => 'transparent',
                'text'  => 'var(--wp--preset--color--primary)',
                'shadow' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'bgH'   => 'var(--wp--preset--color--primary)',
                'textH' => 'var(--wp--preset--color--ink)',
                'shadowH' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'padding' => '8px 24px',
                'radius'  => '0',
                'borderRule' => '0',
            ),
            'outline-ink-text' => array(
                'label' => __( 'Outline Ink Text', 'sidekick-wp-theme' ),
                'bg'    => 'transparent',
                'text'  => 'var(--wp--preset--color--ink)',
                'shadow' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'bgH'   => 'var(--wp--preset--color--primary)',
                'textH' => 'var(--wp--preset--color--ink)',
                'shadowH' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'padding' => '8px 24px',
                'radius'  => '0',
                'borderRule' => '0',
            ),
            'telephone' => array(
                'label' => __( 'Telephone', 'sidekick-wp-theme' ),
                'bg'    => 'var(--wp--preset--color--secondary)',
                'text'  => 'var(--wp--preset--color--base)',
                'shadow' => 'none',
                'bgH'   => 'transparent',
                'textH' => 'var(--wp--preset--color--primary)',
                'shadowH' => 'inset 0 0 0 2px var(--wp--preset--color--primary)',
                'padding' => '12px 24px',
                'radius'  => '0',
                'borderRule' => '0',
                'iconColor' => '#C1C6C8',
                'iconColorH' => 'var(--wp--preset--color--primary)',
                'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" width="43" height="46" viewBox="0 0 43 46" fill="none"><path d="M39.7169 31.8815L33.9428 26.7686C31.7357 24.8241 28.3933 24.8084 26.1703 26.7308L24.5133 28.1656C24.4659 28.1876 24.2255 28.2128 23.7417 28.046C20.9306 27.0832 16.7755 22.3259 16.2063 19.4217C16.0925 18.8397 16.1873 18.6572 16.1842 18.6572L17.8538 17.213C20.08 15.2874 20.529 11.9931 18.8973 9.54519L14.6158 3.15171C13.4331 1.37714 11.8267 0.307363 9.97056 0.0556513C7.91516 -0.224378 5.70481 0.559075 3.74428 2.25498C0.060367 5.44229 -0.929383 10.401 0.88253 16.5963C2.34977 21.6148 5.61311 27.1871 10.0686 32.2874C14.5272 37.3908 19.6214 41.3836 24.4153 43.5326C27.0746 44.7251 29.5854 45.3292 31.878 45.3292C34.6607 45.3292 37.0892 44.4514 39.094 42.7145C41.0545 41.0186 42.1391 38.9483 42.1518 36.8843C42.1613 35.0216 41.3201 33.2911 39.7201 31.8783L39.7169 31.8815ZM14.9921 13.9407L13.3224 15.3849C12.4054 16.1778 11.422 17.6629 11.9248 20.2492C12.8038 24.758 17.955 30.6512 22.3188 32.1458C24.8232 33.0048 26.4391 32.2402 27.3529 31.4473L29.0225 30.0031C29.6012 29.5028 30.4708 29.506 31.0463 30.0125L36.8172 35.1223C37.4623 35.6886 37.7849 36.277 37.7849 36.8622C37.7817 37.6488 37.2125 38.5865 36.2291 39.4391C33.2029 42.0569 28.8739 40.8519 25.7718 39.3825C21.7211 37.4601 17.1961 33.8386 13.3541 29.4399C9.51521 25.0475 6.54278 20.0888 5.19887 15.8317C4.16801 12.5752 3.57668 8.1419 6.5997 5.52724C7.48826 4.75952 8.38948 4.33476 9.13575 4.33476C9.21797 4.33476 9.30018 4.34105 9.37923 4.35049C9.96423 4.42915 10.5018 4.83189 10.9793 5.54927L15.2608 11.9428C15.6846 12.5783 15.5676 13.4373 14.9889 13.9376L14.9921 13.9407Z" fill="#C1C6C8"/></svg>',
            ),
            'ghost'     => array(
                'label'   => __( 'Ghost', 'sidekick-wp-theme' ),
                'bg'      => 'transparent',
                'text'    => 'var(--wp--preset--color--primary)',
                'border'  => 'transparent',
                'bgH'     => 'transparent',
                'textH'   => 'var(--wp--preset--color--base)',
                'borderH' => 'transparent',
                'padding' => '0.75rem 0',
            ),
        );
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_remove_core_button_style_variations' ) ) :
    /**
     * Remove core button styles that are replaced by the theme style set.
     */
    function sidekick_wp_theme_remove_core_button_style_variations( $args, $block_type ) {
        if ( 'core/button' !== $block_type || empty( $args['styles'] ) || ! is_array( $args['styles'] ) ) {
            return $args;
        }

        $removed_styles = array( 'fill', 'outline' );

        $args['styles'] = array_values(
            array_filter(
                $args['styles'],
                function ( $style ) use ( $removed_styles ) {
                    return empty( $style['name'] ) || ! in_array( $style['name'], $removed_styles, true );
                }
            )
        );

        return $args;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_get_button_style_declarations' ) ) :
    /**
     * Build CSS declarations for a button style variation state.
     */
    function sidekick_wp_theme_get_button_style_declarations( $variation, $is_hover = false ) {
        $background = $is_hover ? ( $variation['bgH'] ?? $variation['bg'] ) : $variation['bg'];
        $text       = $is_hover ? ( $variation['textH'] ?? $variation['text'] ) : $variation['text'];
        $css        = "background-color:{$background};color:{$text};transition:background-color .25s ease-in-out,color .25s ease-in-out,box-shadow .25s ease-in-out;";

        if ( isset( $variation['borderRule'] ) || isset( $variation['borderRuleH'] ) ) {
            $border_rule = $is_hover ? ( $variation['borderRuleH'] ?? $variation['borderRule'] ) : ( $variation['borderRule'] ?? $variation['borderRuleH'] );
            $css        .= "border:{$border_rule};";
        } else {
            $border = $is_hover ? ( $variation['borderH'] ?? ( $variation['border'] ?? $background ) ) : ( $variation['border'] ?? $background );
            $css   .= "border-color:{$border};";
        }

        if ( isset( $variation['shadow'] ) || isset( $variation['shadowH'] ) ) {
            $shadow = $is_hover ? ( $variation['shadowH'] ?? $variation['shadow'] ) : $variation['shadow'];
            $css   .= "box-shadow:{$shadow};";
        }

        if ( isset( $variation['padding'] ) ) {
            $css .= "padding:{$variation['padding']};";
        }

        if ( isset( $variation['radius'] ) ) {
            $css .= "border-radius:{$variation['radius']};";
        }

        return $css;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_get_button_style_css' ) ) :
    /**
     * Build the inline CSS for a button style variation.
     */
    function sidekick_wp_theme_get_button_style_css( $slug, $variation ) {
        $selector       = ".wp-block-button.is-style-{$slug} .wp-block-button__link";
        $hover_selector = ".wp-block-button.is-style-{$slug} .wp-block-button__link:hover";

        $css  = "{$selector}{" . sidekick_wp_theme_get_button_style_declarations( $variation ) . '}';
        $css .= "{$hover_selector}{" . sidekick_wp_theme_get_button_style_declarations( $variation, true ) . '}';

        if ( isset( $variation['icon'] ) ) {
            $icon = rawurlencode( $variation['icon'] );
            $css .= "{$selector}{align-items:center;display:inline-flex;gap:0.75rem;}";
            $icon_color       = $variation['iconColor'] ?? 'currentColor';
            $icon_hover_color = $variation['iconColorH'] ?? $icon_color;
            $css .= "{$selector}::before{background-color:{$icon_color};content:\"\";display:inline-block;flex:0 0 auto;height:14px;mask-image:url('data:image/svg+xml,{$icon}');mask-position:center;mask-repeat:no-repeat;mask-size:contain;transition:background-color .25s ease-in-out;width:14px;-webkit-mask-image:url('data:image/svg+xml,{$icon}');-webkit-mask-position:center;-webkit-mask-repeat:no-repeat;-webkit-mask-size:contain;}";
            $css .= "{$hover_selector}::before{background-color:{$icon_hover_color};}";
        }

        $css .= "{$selector} svg,{$selector} svg *{transition:fill .25s ease-in-out;}";

        return $css;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_register_button_styles' ) ) :
    /**
     * Register button block styles.
     */
    function sidekick_wp_theme_register_button_styles() {
        unregister_block_style( 'core/button', 'fill' );
        unregister_block_style( 'core/button', 'outline' );

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
    }
endif;
