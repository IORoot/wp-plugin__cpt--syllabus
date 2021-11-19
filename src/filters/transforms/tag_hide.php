<?php

namespace andyp\cpt\syllabus\filters\transforms;

/**
 * Hide the tag:beginner tags.
 */
class tag_hide {

    public function __construct()
    {
        add_filter('cpt_syllabus_transforms', [$this, 'callback'], 50, 1 );
    }

    public function callback($text)
    {
        $text = preg_replace('/\" >tag/i',' hidden">tag',$text);

        $text = preg_replace('/tag:.*/i','',$text);

        return $text;
    }

}
