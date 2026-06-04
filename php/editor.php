<?php
/**
 * Block editor behavior.
 */

if ( ! function_exists( 'sidekick_wp_theme_is_content_post_type' ) ) :
    /**
     * Check whether an editor screen should show only post_content blocks.
     */
    function sidekick_wp_theme_is_content_post_type( $post_type ) {
        $design_post_types = array(
            'wp_template',
            'wp_template_part',
            'wp_block',
            'wp_navigation',
        );

        return ! empty( $post_type ) && ! in_array( $post_type, $design_post_types, true );
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_is_design_editor_screen' ) ) :
    /**
     * Check whether the current admin screen is editing theme design content.
     */
    function sidekick_wp_theme_is_design_editor_screen() {
        $screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

        if ( empty( $screen ) ) {
            return false;
        }

        $screen_id   = ! empty( $screen->id ) ? $screen->id : '';
        $screen_base = ! empty( $screen->base ) ? $screen->base : '';

        if (
            false !== strpos( $screen_id, 'site-editor' ) ||
            false !== strpos( $screen_id, 'edit-site' ) ||
            false !== strpos( $screen_base, 'site-editor' ) ||
            false !== strpos( $screen_base, 'edit-site' )
        ) {
            return true;
        }

        if ( 'post' !== $screen_base ) {
            return false;
        }

        global $post;

        if ( ! empty( $post->post_type ) && ! sidekick_wp_theme_is_content_post_type( $post->post_type ) ) {
            return true;
        }

        return ! empty( $screen->post_type ) && ! sidekick_wp_theme_is_content_post_type( $screen->post_type );
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_is_design_editor_context' ) ) :
    /**
     * Check whether a block editor context is for templates, template parts, patterns, or navigation.
     */
    function sidekick_wp_theme_is_design_editor_context( $context ) {
        if ( ! empty( $context->post ) && ! empty( $context->post->post_type ) ) {
            return ! sidekick_wp_theme_is_content_post_type( $context->post->post_type );
        }

        if ( ! empty( $context->name ) && 'core/edit-site' === $context->name ) {
            return true;
        }

        return sidekick_wp_theme_is_design_editor_screen();
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_get_transparent_design_editor_canvas_css' ) ) :
    /**
     * Get editor iframe CSS that lets transparent template parts show through.
     */
    function sidekick_wp_theme_get_transparent_design_editor_canvas_css() {
        return 'html,body,body.editor-styles-wrapper,.editor-styles-wrapper,.editor-styles-wrapper .is-root-container,.editor-styles-wrapper .wp-site-blocks,.block-editor-block-list__layout.is-root-container{background:transparent !important;background-color:transparent !important;}';
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_get_transparent_design_editor_ui_css' ) ) :
    /**
     * Get admin UI CSS that removes the white canvas around design editors.
     */
    function sidekick_wp_theme_get_transparent_design_editor_ui_css() {
        return '.edit-site-visual-editor,.edit-site-visual-editor__editor-canvas,.edit-site-visual-editor__editor-canvas iframe,.edit-site-block-editor__content,.edit-site-layout__canvas,.edit-site-canvas,.editor-visual-editor__content-area,.block-editor-block-canvas__container,.block-editor-block-canvas__iframe,body.post-type-wp_template .edit-post-visual-editor,body.post-type-wp_template_part .edit-post-visual-editor,body.post-type-wp_block .edit-post-visual-editor,body.post-type-wp_navigation .edit-post-visual-editor{background:transparent !important;background-color:transparent !important;}';
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_use_post_only_editor' ) ) :
    /**
     * Default blog post editors to the post-only canvas, not the surrounding template.
     */
    function sidekick_wp_theme_use_post_only_editor( $settings, $context ) {
        if (
            empty( $context->post ) ||
            empty( $context->post->post_type ) ||
            'post' !== $context->post->post_type
        ) {
            return $settings;
        }

        $settings['defaultRenderingMode'] = 'post-only';
        $settings['supportsTemplateMode'] = false;

        return $settings;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_use_transparent_design_editor_canvas' ) ) :
    /**
     * Let pattern/template editors show the WordPress canvas chrome behind unpainted blocks.
     */
    function sidekick_wp_theme_use_transparent_design_editor_canvas( $settings, $context ) {
        if ( ! sidekick_wp_theme_is_design_editor_context( $context ) ) {
            return $settings;
        }

        $settings['styles'][] = array(
            'css' => sidekick_wp_theme_get_transparent_design_editor_canvas_css(),
        );

        return $settings;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_enqueue_transparent_design_editor_canvas_styles' ) ) :
    /**
     * Remove the admin-side white canvas around template and template part editors.
     */
    function sidekick_wp_theme_enqueue_transparent_design_editor_canvas_styles() {
        if ( ! sidekick_wp_theme_is_design_editor_screen() ) {
            return;
        }

        wp_register_style(
            'sidekick-wp-theme-transparent-design-editor',
            false,
            array(),
            wp_get_theme()->get( 'Version' )
        );
        wp_enqueue_style( 'sidekick-wp-theme-transparent-design-editor' );
        wp_add_inline_style(
            'sidekick-wp-theme-transparent-design-editor',
            sidekick_wp_theme_get_transparent_design_editor_ui_css()
        );
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_add_inline_svg_editor_preview_styles' ) ) :
    /**
     * Keep inline SVG HTML blocks visually aligned in the editor canvas.
     */
    function sidekick_wp_theme_add_inline_svg_editor_preview_styles( $settings ) {
        $settings['styles'][] = array(
            'css' => '.sidekick-inline-svg-html-preview{display:flex;align-items:center;line-height:0}'
                . '.sidekick-inline-svg-html-preview .header__logo,'
                . '.sidekick-inline-svg-html-preview .footer__logo{display:block;max-width:100%;height:auto}',
        );

        return $settings;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_enqueue_inline_svg_editor_preview_script' ) ) :
    /**
     * Preview header SVG custom HTML blocks in the editor while leaving them editable when selected.
     */
    function sidekick_wp_theme_enqueue_inline_svg_editor_preview_script() {
        wp_add_inline_script(
            'wp-block-editor',
            sidekick_wp_theme_get_inline_svg_editor_preview_script(),
            'after'
        );
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_get_inline_svg_editor_preview_script' ) ) :
    /**
     * Get the script that visually previews inline SVG HTML blocks.
     */
    function sidekick_wp_theme_get_inline_svg_editor_preview_script() {
        return <<<'JS'
( function ( wp ) {
    if ( ! wp || ! wp.hooks || ! wp.element ) {
        return;
    }

    var createElement = wp.element.createElement;

    var INLINE_PREVIEW_MARKERS = [
        'header__logo',
        'footer__logo'
    ];

    function isInlineSvgHtmlBlock( props ) {
        var content = props && props.attributes && props.attributes.content;

        if ( props.name !== 'core/html' || typeof content !== 'string' ) {
            return false;
        }

        for ( var i = 0; i < INLINE_PREVIEW_MARKERS.length; i++ ) {
            if ( content.indexOf( INLINE_PREVIEW_MARKERS[ i ] ) !== -1 ) {
                return true;
            }
        }

        return false;
    }

    wp.hooks.addFilter(
        'editor.BlockEdit',
        'sidekick/inline-svg-html-preview',
        function ( BlockEdit ) {
            return function ( props ) {
                if ( isInlineSvgHtmlBlock( props ) && ! props.isSelected ) {
                    return createElement( 'div', {
                        className: 'sidekick-inline-svg-html-preview',
                        dangerouslySetInnerHTML: {
                            __html: props.attributes.content,
                        },
                    } );
                }

                return createElement( BlockEdit, props );
            };
        }
    );
} )( window.wp );
JS;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_enqueue_post_only_editor_script' ) ) :
    /**
     * Keep blog posts post-only and clear stale post-only page preferences.
     */
    function sidekick_wp_theme_enqueue_post_only_editor_script() {
        $screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

        if ( empty( $screen ) || 'post' !== $screen->base ) {
            return;
        }

        global $post;

        if ( empty( $post->post_type ) ) {
            return;
        }

        if ( 'page' === $post->post_type ) {
            wp_add_inline_script(
                'wp-edit-post',
                sidekick_wp_theme_get_page_template_editor_script(),
                'after'
            );

            return;
        }

        if ( 'post' !== $post->post_type ) {
            return;
        }

        wp_add_inline_script(
            'wp-edit-post',
            sidekick_wp_theme_get_post_only_editor_script(),
            'after'
        );
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_get_page_template_editor_script' ) ) :
    /**
     * Get the script that clears old page post-only rendering preferences.
     */
    function sidekick_wp_theme_get_page_template_editor_script() {
        return <<<'JS'
( function ( wp ) {
    if ( ! wp || ! wp.data || ! wp.domReady ) {
        return;
    }

    function useTemplateEditorForPages() {
        var editorSelect = wp.data.select( 'core/editor' );
        var editorDispatch = wp.data.dispatch( 'core/editor' );
        var coreSelect = wp.data.select( 'core' );
        var preferenceSelect = wp.data.select( 'core/preferences' );
        var preferenceDispatch = wp.data.dispatch( 'core/preferences' );

        if ( ! editorSelect || ! editorDispatch || ! editorDispatch.setRenderingMode ) {
            return false;
        }

        var postType = editorSelect.getCurrentPostType && editorSelect.getCurrentPostType();

        if ( postType !== 'page' ) {
            return true;
        }

        var currentTheme = coreSelect && coreSelect.getCurrentTheme && coreSelect.getCurrentTheme();
        var stylesheet = currentTheme && currentTheme.stylesheet;

        if (
            stylesheet &&
            preferenceSelect &&
            preferenceSelect.get &&
            preferenceDispatch &&
            preferenceDispatch.set
        ) {
            var renderingModes = preferenceSelect.get( 'core', 'renderingModes' ) || {};
            var themeModes = renderingModes[ stylesheet ] || {};

            if ( themeModes[ postType ] === 'post-only' ) {
                var nextThemeModes = Object.assign( {}, themeModes );
                var nextRenderingModes = Object.assign( {}, renderingModes );

                delete nextThemeModes[ postType ];
                nextRenderingModes[ stylesheet ] = nextThemeModes;

                preferenceDispatch.set( 'core', 'renderingModes', nextRenderingModes );
            }
        }

        if ( editorSelect.getRenderingMode && editorSelect.getRenderingMode() === 'post-only' ) {
            editorDispatch.setRenderingMode( 'template-locked' );
        }

        return editorSelect.getRenderingMode && editorSelect.getRenderingMode() !== 'post-only';
    }

    wp.domReady( function () {
        var attempts = 0;
        var interval = window.setInterval( function () {
            attempts += 1;

            if ( useTemplateEditorForPages() && attempts > 10 ) {
                window.clearInterval( interval );
            }

            if ( attempts > 40 ) {
                window.clearInterval( interval );
            }
        }, 100 );
    } );
} )( window.wp );
JS;
    }
endif;

if ( ! function_exists( 'sidekick_wp_theme_get_post_only_editor_script' ) ) :
    /**
     * Get the script that forces the editor canvas back to post-only mode.
     */
    function sidekick_wp_theme_get_post_only_editor_script() {
        return <<<'JS'
( function ( wp ) {
    if ( ! wp || ! wp.data || ! wp.domReady ) {
        return;
    }

    function setPostOnlyPreference() {
        var editorSelect = wp.data.select( 'core/editor' );
        var editorDispatch = wp.data.dispatch( 'core/editor' );
        var coreSelect = wp.data.select( 'core' );
        var preferenceSelect = wp.data.select( 'core/preferences' );
        var preferenceDispatch = wp.data.dispatch( 'core/preferences' );

        if ( ! editorSelect || ! editorDispatch || ! editorDispatch.setRenderingMode ) {
            return false;
        }

        var postType = editorSelect.getCurrentPostType && editorSelect.getCurrentPostType();
        var currentTheme = coreSelect && coreSelect.getCurrentTheme && coreSelect.getCurrentTheme();
        var stylesheet = currentTheme && currentTheme.stylesheet;

        if (
            postType &&
            stylesheet &&
            preferenceSelect &&
            preferenceSelect.get &&
            preferenceDispatch &&
            preferenceDispatch.set
        ) {
            var renderingModes = preferenceSelect.get( 'core', 'renderingModes' ) || {};
            var themeModes = renderingModes[ stylesheet ] || {};

            if ( themeModes[ postType ] !== 'post-only' ) {
                var nextThemeModes = Object.assign( {}, themeModes );
                var nextRenderingModes = Object.assign( {}, renderingModes );

                nextThemeModes[ postType ] = 'post-only';
                nextRenderingModes[ stylesheet ] = nextThemeModes;

                preferenceDispatch.set( 'core', 'renderingModes', nextRenderingModes );
            }
        }

        if ( editorSelect.getRenderingMode && editorSelect.getRenderingMode() !== 'post-only' ) {
            editorDispatch.setRenderingMode( 'post-only' );
        }

        return editorSelect.getRenderingMode && editorSelect.getRenderingMode() === 'post-only';
    }

    wp.domReady( function () {
        var attempts = 0;
        var interval = window.setInterval( function () {
            attempts += 1;

            if ( setPostOnlyPreference() && attempts > 10 ) {
                window.clearInterval( interval );
            }

            if ( attempts > 40 ) {
                window.clearInterval( interval );
            }
        }, 100 );
    } );
} )( window.wp );
JS;
    }
endif;
