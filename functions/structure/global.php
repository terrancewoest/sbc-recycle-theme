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

// Add the router to include all of the other needed structure functions.
add_action('wp', 'Sbc_DoStructureRouting');

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

// Site Content
add_action('sbc_content', 'Sbc_Content');

    // Entries
    add_action('sbc_entries', 'Sbc_Loop');

        // Entry Layout
        add_action('sbc_entry_header', 'Sbc_PageTitle');
        add_action('sbc_entry_content', 'Sbc_PageContent');

    // Sidebar
    add_action('sbc_sidebar', 'Sbc_SidebarWidgets');

    // Trees
    add_action('sbc_after_content_wrap', 'Sbc_Trees');


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

// Initializes the structure files for the specific route.
function Sbc_DoStructureRouting() {
    // Run all of the page specific structure files.
    include_once 'router.php';
    Sbc_StructureRoutes();
}

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

// Brings in the main content and sidebar.
function Sbc_Content() {
    // Get the setting for the sidebar.
    $has_sidebar = get_theme_mod('sbc_default_layout') == 'right-sidebar' ? true : false;
    $entries_class = $has_sidebar ? 'Entries Entries--with-sidebar' : 'Entries';

    // First echo out the entries.
    echo '<div class="' . $entries_class . '">';
        do_action('sbc_entries');
    echo '</div>';

    // Then the sidebar if we needed.
    if ($has_sidebar) {
        echo '<div class="Sidebar">';
            do_action('sbc_sidebar');
        echo '</div>';
    }
}

// Displays the tree artwork.
function Sbc_Trees() {
    echo '<div class="Trees">';
        echo '<img class="Trees__1" src="' . get_template_directory_uri() . '/assets/images/trees1.png"/>';
        echo '<img class="Trees__2" src="' . get_template_directory_uri() . '/assets/images/trees2.png"/>';
    echo '</div>';
}

// Do the wordpress loop.
function Sbc_Loop() {
    get_template_part('partials/loop');
}

// Bring in the default Page Title.
function Sbc_PageTitle() {
    // If it is an archive page then we want the title to link to the page.
    if (is_archive() || is_search() || is_home()) {
        echo '<h2 class="Entry__title">';
            echo '<a href="' . get_permalink() . '">' . sbc_page_title() . '</a>';
        echo '</h2>';

    // Otherwise we just need the page title.
    } else {
        echo '<h1 class="Entry__title">' . sbc_get_title() . '</h1>';
    }
}

// Brings in the content or the excerpt of the loaded page.
function Sbc_PageContent() {
    if (is_archive() || is_search() || is_home()) {
        the_excerpt();
    } else {
        the_content();
    }
}

// Brings in the sidebar to the page.
function Sbc_SidebarWidgets() {
    if (is_active_sidebar('sidebar')) {
        dynamic_sidebar('sidebar');
    } else {
        echo '<div class="Widget">';
            echo '<h4 class="Widget__title">Main Sidebar Widget</h4>';
            echo '<p>The sidebar widget area is empty. You can add widgets <a target="_blank" href="' . admin_url('widgets.php') . '">here</a>.</p>';
        echo '</div>';
    }
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