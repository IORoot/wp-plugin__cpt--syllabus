<?php

namespace andyp\cpt\syllabus;

class initialise
{

    private $config;

    public function run()
    {
        $this->setup_cpt();
        $this->register_cpt();
        $this->register_settings_page();
        $this->switch_on_metaboxes();
        $this->add_admin_view();
        $this->register_template_folder();
        $this->register_sidebar_widget();
        $this->enqueue_css();
        $this->register_transform_filters();
        $this->register_REST_metadata();
    }

    public function set_config($config)
    {
        $this->config = $config;
    }

    public function setup_cpt()
    {
        $this->cpt = new cpt\create_cpt;
        $this->cpt->set_singular(ucfirst($this->config['post_type']));
        $this->cpt->set_icon($this->config['svgdata_icon']);
        $this->cpt->set_category($this->config['category']);
        $this->cpt->set_tags($this->config['tags']);
    }
    
    public function register_cpt()
    {
        $this->cpt->register();
    }

    /**
     * This is only for activation.
     * Otherwise it runs on an init filter
     */
    public function run_cpt()
    {
        $this->cpt->run_cpt();
    }    
    
    /**
     * Create settings option page
     */
    public function register_settings_page()
    {
        new acf\acf_admin_menu;
    }

    /**
     * ACF switched off cutom-fields. Switch it back on.
     */
    public function switch_on_metaboxes()
    {
        new acf\switch_on_metaboxes;
    }

    /**
     * Order the CPT taxonomy by playlistOrder instead of by published date.
     */
    public function add_admin_view()
    {
        new filters\admin_archive_view_by_playlist_order($this->config['post_type'] . '_category', $this->config['post_type']);
    }

    /**
     * Register the view templates to be in /src/views
     */
    public function register_template_folder()
    {
        new filters\register_template_folder($this->config['post_type']);
    }

    /**
     * Register a sidebar widget area for the pages
     */
    public function register_sidebar_widget()
    {
        new register\sidebar_widget(ucfirst($this->config['post_type']));
    }

    /**
     * Enqueue some extra CSS 
     */
    public function enqueue_css()
    {
        new filters\enqueue_css_in_footer($this->config['post_type']);
    }

    /**
     * Parsee any text (Markdown) into HTML.
     */
    public function register_transform_filters()
    {
        // Convert description from markdown to HTML
        new filters\transforms\parsedown;

        // Add tailwind classes
        new filters\transforms\tailwind;
    }


    public function register_REST_metadata()
    {
        new REST\metadata;
    }



}