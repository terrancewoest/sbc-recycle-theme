<?php
// Before the loop action.
do_action('sbc_before_loop');

// Are there any posts?
if (have_posts()) {

    // Then loop over them and bring in all of the entries.
    while (have_posts()) {
        the_post();

        // Before the entry.
        do_action('sbc_before_entry');

        get_template_part('partials/entry');

        // After the endty.
        do_action('sbc_after_entry');

    }

// Otherwise do the no entries action.
} else {
    do_action('sbc_no_entries');
}

// After the loop action
do_action('sbc_after_loop');
