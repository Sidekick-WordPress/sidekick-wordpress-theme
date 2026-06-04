<?php
/**
 * Block supports for core/template-part.
 *
 * Core does not declare spacing support on the template-part block, which
 * hides the Dimensions panel in the editor and causes any style.spacing.*
 * attributes saved in the block comment to be ignored at render time.
 * This filter adds margin and padding support so template-part wrappers
 * (e.g. the page-level <footer>) can have their spacing tuned per instance.
 */

if ( ! function_exists( 'sidekick_wp_theme_add_template_part_spacing_support' ) ) :
    /**
     * Add spacing support to the core/template-part block.
     */
    function sidekick_wp_theme_add_template_part_spacing_support( $args, $block_type ) {
        if ( 'core/template-part' !== $block_type ) {
            return $args;
        }

        if ( ! isset( $args['supports'] ) || ! is_array( $args['supports'] ) ) {
            $args['supports'] = array();
        }

        $args['supports']['spacing'] = array(
            'margin'  => array( 'top', 'bottom' ),
            'padding' => true,
        );

        return $args;
    }
endif;
