<?php

namespace andyp\cpt\syllabus;

class initialise
{

    private $config;

    public function run()
    {
        $this->setup_cpt();
        $this->register_cpt();
        $this->rewite_post_link();
        $this->register_acf_panels();
        $this->register_settings_page();
        $this->switch_on_metaboxes();
        $this->add_admin_view();
        $this->enqueue_css();
        $this->register_transform_filters();
        $this->register_REST_metadata();
        $this->disable_visual_editor();
        $this->register_shortcode();
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
     * Create ACF Panels
     */
    public function register_acf_panels()
    {
        new acf\acf_panels;
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
     * Enqueue some extra CSS 
     */
    public function enqueue_css()
    {
        new filters\enqueue_css_in_footer($this->config['post_type']);
    }

    /**
     * Disable 'visual' editor. 
     */
    public function disable_visual_editor()
    {
        new filters\disable_visual_editor($this->config['post_type']);
    }

    /**
     * Parse any text (Markdown) into HTML.
     */
    public function register_transform_filters()
    {
        // Convert description from markdown to HTML
        new filters\transforms\parsedown;

        // Add tailwind classes
        new filters\transforms\tailwind;

        // Add structure to elements
        new filters\transforms\structure;
    }


    public function register_REST_metadata()
    {
        new REST\metadata;
    }

    
    public function register_shortcode()
    {
        $shortcode = new shortcodes\syllabus_posts;
        $shortcode->set_config($this->config);
        $shortcode->register();
    }


    public function rewite_post_link()
    {
        new filters\rewite_post_link($this->config['post_type']);
    }
}