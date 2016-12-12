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

// Top bar.
add_action('sbc_before_header', 'Sbc_TopBar');
add_action('sbc_top_bar_left', 'Sbc_TopBarWidgetArea');
add_action('sbc_top_bar_right', 'Sbc_TopBarNav');

// Header content.
add_action('sbc_header_left', 'Sbc_HeaderLogo');
add_action('sbc_header_right', 'Sbc_MainNav');
add_action('sbc_header_right', 'Sbc_SearchArea', 15);

// Footer Widgets.
add_action('sbc_footer', 'Sbc_FooterWidgets');
    add_action('sbc_footer_widget_one', 'Sbc_FooterWidgetsLogo');
    add_action('sbc_footer_widget_one', 'Sbc_FooterWidgetOne', 15);
    add_action('sbc_footer_widget_two', 'Sbc_FooterWidgetTwo');
    add_action('sbc_footer_widget_three', 'Sbc_FooterWidgetThree');

// Footer Credits.
add_action('sbc_footer', 'Sbc_FooterCredits', 15);
    add_action('sbc_footer_credits_left', 'Sbc_FooterCreditsWidgetOne');
    add_action('sbc_footer_credits_right', 'Sbc_FooterCreditsWidgetTwo');


/**
 * SBC Structure Functions.
 */

// Set the template to the coming soon template if the user is not logged in.
function Sbc_ComingSoonRedirect($template) {
    // If the user is logged in proceed as normal.
    if (is_user_logged_in()) {
        return $template;
    }

    // Otherwise return the coming soon template.
    return locate_template(['coming-soon.php']);
}

// Calls the top bar partial.
function Sbc_TopBar() {
    get_template_part('partials/top-bar');
}

// Brings in the top bar widget area.
function Sbc_TopBarWidgetArea() {
    dynamic_sidebar('top-bar');
}

// Brings in the top bar nav.
function Sbc_TopBarNav() {
    if (is_user_logged_in()) {
        get_template_part('partials/top-bar-logged-in');
    } else {
        get_template_part('partials/top-bar-logged-out');
    }
}

// Brings in the header logo.
function Sbc_HeaderLogo() {
    sbc_do_logo('dark', 'Logo--header');
}

// Brings in the main navigation.
function Sbc_MainNav() {
    sbc_do_nav('sbc-main-menu', 'Nav--main');
}

// Brings in the search area.
function Sbc_SearchArea() {
    get_template_part('partials/search-area');
}

// Brings in the footer widgets partial.
function Sbc_FooterWidgets() {
    get_template_part('partials/footer-widgets');
}

// Displays the logo for the footer.
function Sbc_FooterWidgetsLogo() {
    sbc_do_logo('light', 'Logo--footer');
}

// Bring in the first footer widget area.
function Sbc_FooterWidgetOne() {
    dynamic_sidebar('footer-widget-1');
}

// Bring in the second footer widget area.
function Sbc_FooterWidgetTwo() {
    dynamic_sidebar('footer-widget-2');
}

// Bring in the third footer widget area.
function Sbc_FooterWidgetThree() {
    dynamic_sidebar('footer-widget-3');
}

// Bring in the footer credits partial.
function Sbc_FooterCredits() {
    get_template_part('partials/footer-credits');
}

// Brings in the left footer credits widget area.
function Sbc_FooterCreditsWidgetOne() {
    echo '<p class="FooterCredits__copyright">';
        echo apply_filters(
            'sbc_footer_copyright',
            'Copyright © ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.'
        );
    echo '</p>';
}

// Brings in the right footer credits widget area.
function Sbc_FooterCreditsWidgetTwo() {
    sbc_do_nav('sbc-credits-menu', 'Nav--credits');
}