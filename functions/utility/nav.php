<?php

/**
 * Unifies the template for theme location navs.
 *
 * @param  String $location The theme location to pull in for the menu.
 * @param  String $class    Optional extra class for the menu.
 */
function sbc_do_nav($location, $class = null) {
    // Format the class to have a space before if it one is passed in.
    $class = $class ? ' ' . $class : '';

    // Call the menu using wp_nav_menu;
    wp_nav_menu([
        'menu_class' => 'Nav' . $class,
        'container' => '',
        'theme_location' => $location,
    ]);
}