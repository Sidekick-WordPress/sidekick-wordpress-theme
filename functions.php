<?php
/**
 * Custom Block Boilerplate functions and definitions
 */

require_once get_template_directory() . '/php/theme-setup.php';
require_once get_template_directory() . '/php/assets.php';
require_once get_template_directory() . '/php/buttons.php';
require_once get_template_directory() . '/php/breadcrumbs.php';
require_once get_template_directory() . '/php/editor.php';
require_once get_template_directory() . '/php/svg.php';
require_once get_template_directory() . '/php/template-part-supports.php';

add_action( 'after_setup_theme', 'sidekick_wp_theme_setup' );
add_action( 'wp_enqueue_scripts', 'sidekick_wp_theme_enqueue_assets' );
add_action( 'init', 'sidekick_wp_theme_register_button_styles', 20 );
add_action( 'enqueue_block_editor_assets', 'sidekick_wp_theme_enqueue_post_only_editor_script' );
add_action( 'enqueue_block_editor_assets', 'sidekick_wp_theme_enqueue_transparent_design_editor_canvas_styles' );
add_action( 'enqueue_block_editor_assets', 'sidekick_wp_theme_enqueue_inline_svg_editor_preview_script' );

add_filter( 'block_editor_settings_all', 'sidekick_wp_theme_use_post_only_editor', 10, 2 );
add_filter( 'block_editor_settings_all', 'sidekick_wp_theme_use_transparent_design_editor_canvas', 10, 2 );
add_filter( 'block_editor_settings_all', 'sidekick_wp_theme_add_inline_svg_editor_preview_styles' );
add_filter( 'register_block_type_args', 'sidekick_wp_theme_remove_core_button_style_variations', 10, 2 );
add_filter( 'register_block_type_args', 'sidekick_wp_theme_add_template_part_spacing_support', 10, 2 );
add_filter( 'wp_kses_allowed_html', 'sidekick_wp_theme_allow_inline_svg', 10, 2 );
add_filter( 'woocommerce_breadcrumb_defaults', 'sidekick_wp_theme_breadcrumb_defaults' );
add_filter( 'woocommerce_get_breadcrumb', 'sidekick_wp_theme_product_breadcrumbs' );
