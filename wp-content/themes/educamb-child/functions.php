<?php
/**
 * Theme functions and definitions.
 */
function educamb_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'educamb-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'educamb-minified-style' , get_template_directory_uri() . '/style.css' );
    }

    wp_enqueue_style( 'educamb-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'educamb-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'educamb_child_enqueue_styles' );