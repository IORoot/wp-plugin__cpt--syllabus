<?php

namespace andyp\cpt\syllabus\filters\transforms;

/**
 * After content has been filtered for markdown, add custom tailwind classes
 */
class tailwind {

    public $text;
    public $matches;
    public $options;

    public function __construct()
    {
        add_filter('cpt_syllabus_transforms', [$this, 'callback'], 20, 1 );
    }

    public function callback($text)
    {
        $this->text = $text;
        $this->get_options();
        $this->match_open_tag();
        $this->array_unique();
        $this->loop_matches();
        
        return $this->text;
    }

    public function match_open_tag()
    {
        preg_match_all('/<([\w]+)/i', $this->text, $this->matches);
    }

    public function array_unique()
    {
        $this->matches[1] = array_unique($this->matches[1]);
    }

    public function loop_matches()
    {
        foreach ($this->matches[1] as $key => $match)
        {
            $tailwind_classes = $this->get_classes($match);

            $transform = $this->matches[0][$key] . ' class="'.$tailwind_classes.'" ';

            $this->text = str_replace($this->matches[0][$key], $transform, $this->text);
        }
    }


    public function get_options()
    {
        $this->options = get_field('syllabus_filters', 'option', true);
    }

    
    public function get_classes($tag = null)
    {
        if (!$tag){ return false; }
        $classes = '';

        foreach($this->options as $option)
        {
            if ($option['acf_fc_layout'] != 'html_tag'){ continue; }
            if (strtolower($option['target_tag']) != strtolower($tag)){ continue; }
            if (strtolower($option['target_tag']) == strtolower($tag)){ $classes = $option['classes']; }
        }

        return $classes;
    }

}
