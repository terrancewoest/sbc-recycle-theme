<?php

/**
 * Echos out the correct page title based on the page call.
 */
function sbc_do_title() {
    echo sbc_get_title();
}


/**
 * Returns the correct page title based on the page call.
 *
 * @return String
 */
function sbc_get_title() {
    // Will hold the title.
    $title = false;
    // G
    $page_type = sbc_page_type();

    // Blog Index Page
    if ($page_type == 'home') {
        $id = get_option('page_for_posts');
        $title = apply_filters('sbc_home_title', get_the_title($id));

    // Posts shown on front page.
    } else if ($page_type == 'front-posts') {
        $title = apply_filters('sbc_front_posts_title', 'Home');

    // Any single page.
    } else if (is_single() || is_page()) {
        $title = apply_filters('sbc_single_page_title', get_the_title($id));

    // Any archive title.
    } else if (is_archive()) {
        $title = apply_filters('sbc_archive_title', get_the_archive_title());

    // Search Page.
    } else if (is_search()) {
        $title = apply_filters('sbc_search_title', 'Search');

    // 404 Page
    } else if (is_404()) {
        $title = apply_filters('bloom_404_page_title', 'Error: 404');
    }

    // Apply any filters to the page title.
    return apply_filters('sbc_title', $title ?: '');
}