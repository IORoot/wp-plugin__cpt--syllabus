<?php

namespace andyp\cpt\syllabus\filters\transforms;

/**
 * Filters content so you can target specific parts of the content.
 */
class structure {

    public $text;
    public $option;
    public $options;

    public function __construct()
    {
        add_filter('cpt_syllabus_transforms', [$this, 'callback'], 25, 1 );
    }

    public function callback($text)
    {
        $this->text = $text;
        $this->get_options();
        $this->loop_options();
        return $this->text;
    }

    public function get_options()
    {
        $this->options = get_field('syllabus_filters', 'option', true);
    }

    public function loop_options()
    {
        foreach($this->options as $this->option)
        {
            if ($this->option['acf_fc_layout'] != 'structure'){ continue; }
            $this->run_preg_replace();
        }
    }

    public function run_preg_replace()
    {
        if (empty($this->option['preg_search'])){ return; }
        if (empty($this->option['replacement'])){ return; }
        if (empty($this->option['limit'])){ $this->option['limit'] = '-1'; }

        $newcontent = preg_replace($this->option["preg_search"], $this->option["replacement"], $this->text, $this->option['limit'], $this->option['count']);

        if (is_array($newcontent)){ return; }

        $this->text = $newcontent;
    }
}
