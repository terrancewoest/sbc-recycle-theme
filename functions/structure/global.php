<?php

/*
|------------------------------------------------------------------------------
| Global Structure File
|------------------------------------------------------------------------------
|
| This is the main file for adding structure to the theme. These actions
| will be brought in for every page load, so it is the best place to
| put in functions and actions that should be called globally.
|
*/

/**
 * SBC Structure Hooks.
 */

// Set the template to the coming soon template if the user is not logged in.
add_filter('template_include', 'Sbc_ComingSoonRedirect', 99);



/**
 * SBC Structure Functions.
 */
function Sbc_ComingSoonRedirect($template) {
    // If the user is logged in proceed as normal.
    if (is_user_logged_in()) {
        return $template;
    }

    // Otherwise return the coming soon template.
    return locate_template(['coming-soon.php']);
}