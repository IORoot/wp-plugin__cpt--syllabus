<?php

namespace andyp\cpt\syllabus\filters\transforms;
/**
 * Filters content for Markdown and converts it to HTML.
 */
class parsedown {

    public function __construct()
    {
        add_filter('cpt_syllabus_transforms', [$this, 'callback'], 15, 1 );
    }

    public function callback($text)
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->setBreaksEnabled(true)->text($text);
    }

}
