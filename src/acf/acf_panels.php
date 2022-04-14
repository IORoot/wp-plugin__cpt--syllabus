<?php

namespace andyp\cpt\syllabus\acf;

/**
 * Create Syllabus ACF Panels
 */
class acf_panels
{

    public function __construct(){
        $this->register_variables();
        $this->register_general_settings();
        $this->register_post_settings();
        $this->register_taxonomy_settings();
        $this->register_on_update();
        
    }

    public function register_variables()
    {
        require __DIR__.'/acf_panels_variables.php';
    }

    public function register_general_settings()
    {
        require __DIR__.'/acf_panels_general_settings.php';
    }

    public function register_post_settings()
    {
        require __DIR__.'/acf_panels_post_settings.php';
    }

    public function register_taxonomy_settings()
    {
        require __DIR__.'/acf_panels_taxonomy_settings.php';
    }

    public function register_on_update()
    {
        require __DIR__.'/acf_on_update.php';
    }

}