<?php
/**
 * Inline SVG support.
 */

if ( ! function_exists( 'sidekick_wp_theme_allow_inline_svg' ) ) :
    /**
     * Allow safe SVG logo markup in block templates and template parts.
     */
    function sidekick_wp_theme_allow_inline_svg( $allowed_tags, $context ) {
        if ( 'post' !== $context ) {
            return $allowed_tags;
        }

        $global_attributes = array(
            'aria-hidden' => true,
            'aria-label'  => true,
            'class'       => true,
            'clip-path'   => true,
            'fill'        => true,
            'focusable'   => true,
            'height'      => true,
            'id'          => true,
            'role'        => true,
            'stroke'      => true,
            'viewbox'     => true,
            'width'       => true,
        );

        $allowed_tags['svg'] = array_merge(
            $global_attributes,
            array(
                'xmlns' => true,
            )
        );

        $allowed_tags['g'] = array_merge(
            $global_attributes,
            array(
                'transform' => true,
            )
        );

        $allowed_tags['path'] = array_merge(
            $global_attributes,
            array(
                'clip-rule'      => true,
                'd'              => true,
                'fill-rule'      => true,
                'stroke-linecap'  => true,
                'stroke-linejoin' => true,
                'stroke-width'    => true,
            )
        );

        $allowed_tags['defs'] = array();

        $allowed_tags['clippath'] = array(
            'id' => true,
        );

        $allowed_tags['rect'] = $global_attributes;

        return $allowed_tags;
    }
endif;
