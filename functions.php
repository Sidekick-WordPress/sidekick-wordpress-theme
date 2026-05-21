<?php
/**
 * Custom Block Boilerplate functions and definitions
 */

require_once get_template_directory() . '/php/theme-setup.php';
require_once get_template_directory() . '/php/assets.php';
require_once get_template_directory() . '/php/buttons.php';
require_once get_template_directory() . '/php/breadcrumbs.php';

add_action( 'after_setup_theme', 'sidekick_wp_theme_setup' );
add_action( 'wp_enqueue_scripts', 'sidekick_wp_theme_enqueue_assets' );
add_action( 'init', 'sidekick_wp_theme_register_button_styles' );

add_filter( 'woocommerce_breadcrumb_defaults', 'sidekick_wp_theme_breadcrumb_defaults' );
add_filter( 'woocommerce_get_breadcrumb', 'sidekick_wp_theme_product_breadcrumbs' );
