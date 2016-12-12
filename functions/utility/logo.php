<?php

/**
 * Wrapper function for echoing out sbc_get_logo
 *
 * @param String $type can be "dark" or "light"
 * @param String $class Additional class to be added to the logo.
 */
function sbc_do_logo($type, $class) {
    echo sbc_get_logo($type, $class);
}

/**
 * Brings in the logo for the theme with different options.
 *
 * @param String $type  Can be "dark" or "light"
 * @param String $class Additional class to be added to the logo.
 * @return Html
 */
function sbc_get_logo($type = 'dark', $class = null) {
    // Set the type.
    $type = $type == 'dark' ? 'dark' : 'light';

    // Format the extra class to have an extra space before it.
    $class = $class ? ' ' . $class : '';

    // Get and filter the url to the logo.
    $logo_src = apply_filters(
        'sbc_' . $type . '_logo',
        get_stylesheet_directory_uri() . '/assets/images/logo-' . $type . '.png'
    );

    // Get and filter the logo class.
    $logo_class = apply_filters('sbc_logo_class', 'Logo Logo--' . $type . $class);

    // Construct the template.
    $html = trim(implode('', [
        '<div class="' . $logo_class . '">',
            '<img class="Logo__img" src="' . $logo_src . '"/>',
        '</div>',
    ]));

    return $html;
}