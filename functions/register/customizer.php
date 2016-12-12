<?php

/**
 * Main function to initialze and register all customizer items.
 */
function sbc_register_customizer($wp_customize) {
    // Register all of the different sections.
    sbc_register_customizer_sections($wp_customize);

    // Register all fo teh different settings.
    sbc_register_customizer_settings($wp_customize);
}
add_action('customize_register', 'sbc_register_customizer');

/**
 * Main function for registering all customizer settings.
 */
function sbc_register_customizer_settings($wp_customize) {

    // Default Layout Setting
    $wp_customize->add_setting('sbc_default_layout', [
        'type' => 'theme_mod',
        'default' => 'right-sidebar',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('sbc_default_layout', [
        'type'      => 'radio',
        'section'   => 'sbc_site_settings', // Required, core or custom.
        'label'     => 'Default Sidebar Layout',
        'choices'   => [
            'right-sidebar' => 'Right Sidebar',
            'no-sidebar'    => 'No Sidebar',
        ],
    ]);
}


/**
 * Main function for registering customizer sections.
 */
function sbc_register_customizer_sections($wp_customize) {

    // Main Site Options Section
    $wp_customize->add_section('sbc_site_settings', [
        'title' => 'Site Options',
    ]);
}