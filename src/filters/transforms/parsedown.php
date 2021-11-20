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

        if (!$this->check_enabled()){return $text;}

        $Parsedown = new \Parsedown();
        return $Parsedown->setBreaksEnabled(true)->text($text);
    }

    public function check_enabled()
    {
        $options = get_field('syllabus_filters', 'option', true);

        foreach( $options as $option)
        {
            if ($option['acf_fc_layout'] != "parsedown"){ continue; }
            if ($option['parsedown'] == true){ return true; }
            return false;
        }
    }

}
