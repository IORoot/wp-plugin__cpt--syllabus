<?php

/**
 * Include this plugin in the Andyp-Plugin Lister.
 * Not needed if you don't have that plugin.
 */
add_action( 'plugins_loaded', function() {
    do_action('register_andyp_plugin', [
        'title'     => 'Labs - CPT: Syllabus',
        'icon'      => 'test-tube',
        'color'     => '#FF8400',
        'path'      => __FILE__,
    ]);
} );