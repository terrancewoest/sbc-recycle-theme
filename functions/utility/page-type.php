<?php

/**
 * Gets the current page call type.
 *
 * @return String
 */
function sbc_page_type() {
    // Is it the front page without posts?
    if (is_front_page() && !is_home()) {
        return 'front-page';
    }

    // Is it the front page with posts?
    if (is_front_page() && is_home()) {
        return 'front-posts';
    }

    // Is it the blog index page?
    if (is_home()) {
        return 'home';
    }

    // is it a single page/post?
    if (is_singular()) {

        // Is it an attachment page?
        if (is_attachment()) {
            return 'single-attachment';
        }

        // Is it a standard page?
        if (is_page()) {
            return 'single-page';
        }

        // Is it a standard page?
        if (is_singular('post')) {
            return 'single-post';
        }

        // Is it a custom post type?
        if (!is_singular('post')) {
            global $wp_query;
            $post = $wp_query->post;
            $post_type = get_post_type($post);
            return 'single-' . $post_type;
        }

    }

    // Is it and archive page?
    if (is_archive()) {

        // Is it an author page?
        if (is_author()) {
            return 'archive-author';
        }

        // Is it a day archive page?
        if (is_day()) {
            return 'archive-date-day';
        }

        // Is it a month archive page?
        if (is_month()) {
            return 'archive-date-month';
        }

        // Is it a year archive page?
        if (is_year()) {
            return 'archive-date-year';
        }

        // Is it a category page?
        if (is_category()) {
            return 'archive-category';
        }

        // Is it a tag page?
        if (is_tag()) {
            return 'archive-tag';
        }

        // Is it a custom tax page?
        if (is_tax()) {
            $term = get_queried_object();
            return 'archive-tax-' . $term->taxonomy;
        }

        // Is it a custom post type archive page?
        if (is_post_type_archive()) {
            $post = get_queried_object();
            return 'archive-' . $post->name;
        }
    }

    // Is it a 404 page?
    if (is_404()) {
        return '404';
    }

    // Is it a search page?
    if (is_search()) {
        return 'search';
    }
}
