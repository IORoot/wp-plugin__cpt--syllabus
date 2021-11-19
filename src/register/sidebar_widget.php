<?php

namespace andyp\cpt\syllabus\register;

/**
 * Create a new sidebar widget area to use in the
 * theme.
 */
class sidebar_widget
{

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
        add_action( 'widgets_init', [$this, 'register_sidebar'] );
    }

    public function register_sidebar()
    {
        register_sidebar( array(
            'name'          => 'Sidebar - '. $this->name,
            'id'            => 'sidebar-'. $this->name,
            'description'   => 'Add widgets here.',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '',
            'after_title'   => '',
        ) );
    }
}