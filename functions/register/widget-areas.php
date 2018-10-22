<?php

/**
 * Registers all of the different widget areas throughout the site.
 */
function sbc_register_widget_areas() {

    // Top Bar Text
    register_sidebar([
        'name'          => 'Top Bar Text',
        'id'            => 'top-bar',
        'description'   => 'The left side of the global top bar of the site. Designed for a text widget.',
        'before_widget' => '<div class="Widget Widget--top-bar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 style="display: none" class="Widget__title">',
        'after_title'   => '</h4>',
    ]);

    // Main Sidebar
    register_sidebar([
        'name'          => 'Sidebar',
        'id'            => 'sidebar',
        'description'   => 'This is the main sidebar.',
        'before_widget' => '<div class="Widget Widget--sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="Widget__title">',
        'after_title'   => '</h4>',
    ]);

    // Footer Widget 1
    register_sidebar([
        'name'          => 'Footer Widget Area 1',
        'id'            => 'footer-widget-1',
        'description'   => 'The first footer widget area.',
        'before_widget' => '<div class="Widget Widget--footer Widget--footer-1 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="Widget__title">',
        'after_title'   => '</h4>',
    ]);

    //  Footer Widget 2
    register_sidebar([
        'name'          => 'Footer Widget Area 2',
        'id'            => 'footer-widget-2',
        'description'   => 'The second footer widget area.',
        'before_widget' => '<div class="Widget Widget--footer Widget--footer-2 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="Widget__title">',
        'after_title'   => '</h4>',
    ]);

    //  Footer Widget 3
    register_sidebar([
        'name'          => 'Footer Widget Area 3',
        'id'            => 'footer-widget-3',
        'description'   => 'The third footer widget area.',
        'before_widget' => '<div class="Widget Widget--footer Widget--footer-3 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="Widget__title">',
        'after_title'   => '</h4>',
    ]);
};
add_action('widgets_init', 'sbc_register_widget_areas');