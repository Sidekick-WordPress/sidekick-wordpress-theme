<?php
/**
 * WooCommerce breadcrumbs.
 */

if ( ! function_exists( 'sidekick_wp_theme_breadcrumb_defaults' ) ) :
    /**
     * Customize WooCommerce breadcrumb defaults.
     */
    function sidekick_wp_theme_breadcrumb_defaults( $defaults ) {
        $defaults['delimiter'] = '<span class="sidekick-breadcrumb__separator">/</span>';

        return $defaults;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_product_breadcrumbs' ) ) :
    /**
     * Ensure product breadcrumbs include the shop page.
     */
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
