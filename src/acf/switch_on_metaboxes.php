<?php

/**
 * ACF turns off the custom-fields metabox for speed. Switch it back on!
 */
namespace andyp\cpt\syllabus\acf;

class switch_on_metaboxes
{
    public function __construct()
    {
        add_filter('acf/settings/remove_wp_meta_box', '__return_false');

    }
}