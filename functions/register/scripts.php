<?php

/**
 * Bring in all of the needed front end scripts.
 */
function sbc_register_front_scripts() {
    // Bring in Typekit.
    wp_enqueue_script('typekit', 'https://use.typekit.net/dbn5vuj.js');
    // Main Javascript File.
    wp_enqueue_script('sbc-main-js', get_template_directory_uri() . '/main.js');
}
add_action('wp_enqueue_scripts', 'sbc_register_front_scripts');

/**
 * Bring in all of the needed front end styles.
 */
function sbc_register_front_styles() {
    // Main Styling.
    wp_enqueue_style('sbc-main-styles', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'sbc_register_front_styles');
