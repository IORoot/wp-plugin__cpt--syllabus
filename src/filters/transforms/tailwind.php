<?php

namespace andyp\cpt\syllabus\filters\transforms;

/**
 * After content has been filtered for markdown, add custom tailwind classes
 */
class tailwind {

    public $text;
    public $matches;

    public function __construct()
    {
        add_filter('cpt_syllabus_transforms', [$this, 'callback'], 20, 1 );
    }

    public function callback($text)
    {
        $this->text = $text;
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
            if (!method_exists($this, $match)){ continue; }

            $tailwind_classes = $this->$match();

            $transform = $this->matches[0][$key] . ' class="'.$tailwind_classes.'" ';

            $this->text = str_replace($this->matches[0][$key], $transform, $this->text);
        }
    }


    public function h2()
    {
        return 'text-4xl my-10 font-thin';
    }

    public function h3()
    {
        return 'text-3xl my-10 font-thin';
    }

    public function p()
    {
        return 'text-2xl mb-4 leading-relaxed';
    }

    public function hr()
    {
        return 'border-green-500 my-20 border-2';
    }

    public function ul()
    {
        return 'text-xl list-outside list-disc bg-gray-100 p-6 pl-12 my-10';
    }

    public function ol()
    {
        return 'text-xl list-outside list-decimal bg-gray-100 p-6 pl-12 my-10';
    }

    public function li()
    {
        return 'text-2xl pl-4 pb-4 leading-relaxed';
    }

}
