<?php

namespace andyp\cpt\syllabus\shortcodes;

/**
 * Register a shortcode that will allow you to
 * iterate through every post and print details to the page.
 * 
 * Additional :santize function to sanitize the result.
 * 
 * Example usage:
 * 
 * 	[syllabus_posts posts_per_page="2" order="ASC" ]
 *	    {{post_title}}
 *	[/syllabus_posts]
 */
class syllabus_posts
{

    private $config;

    public $distinct_list;
    public $attributes = [];
    public $content;

    public $new_content;

    public $posts;

    public $results;

    public $html = '';


    public function set_config($config)
    {
        $this->config = $config;
    }


    public function register()
    {
        add_shortcode( $this->config['post_type'].'_posts', [$this, 'run'] );
    }


    public function run($atts = array(), $content = null)
    {

        if ($atts){ $this->attributes = $atts; }
        if ($content){ $this->content = $content; }

        /**
         * Get a specific category
         * cat=""
         */
        $this->check_cat();



        /**
         * Get the specific tag
         * tag=""
         */
        $this->check_tag();

        /**
         * Get the posts forthe CPT
         */
        $this->retrieve_posts();

        /**
         * Add all meta to the results
         */
        $this->retrieve_meta();

        /**
         * Output the result.
         */
        $this->parse_content();

        return $this->html;
    }


    private function check_cat()
    {
        if (!array_key_exists('cat', $this->attributes)){ return; }

        $this->attributes['tax_query'] = [
            [
                'taxonomy' => $this->config['post_type'].'_category',
                'field'    => 'slug',
                'terms'    => $this->attributes['cat'],
            ],
        ];

        unset($this->attributes['cat']);
    }


    private function check_tag()
    {
        if (!array_key_exists('tag', $this->attributes)){ return; }

        $this->attributes['tax_query'] = [
            [
                'taxonomy' => $this->config['post_type'].'_tags',
                'field'    => 'slug',
                'terms'    => $this->attributes['tag'],
            ],
        ];

        unset($this->attributes['tag']);
    }


    private function retrieve_posts()
    {
        
        $query_array['post_type']   = $this->config['post_type'];
        $query_array['post_status'] = 'publish';
        $query_array['posts_per_page'] = 3;

        if (is_array($this->attributes)){
            $query_array = array_merge($query_array, $this->attributes);
        }
        
        $this->posts = get_posts($query_array);
    }


    private function retrieve_meta()
    {
        $this->results = [];

        foreach ($this->posts as $key => $post)
        {

            /**
             * Post fields
             */
            $this->results[$key]['post']  = (array) $post;
            $this->results[$key]['post']['permalink']  = get_permalink($post->ID);

            /**
             * Add loop index
             */
            $this->results[$key]['post']['index'] = $key;

            /**
             * Meta fields
             */
            $this->results[$key]['meta']  = get_post_meta($post->ID);

            /**
             * Image featured paths
             */
            $this->results[$key]['image']['image'] = get_the_post_thumbnail_url($post);
            $this->results[$key]['image']['path'] = dirname($this->results[$key]['image']['image']);
            $this->results[$key]['image']['file'] = basename($this->results[$key]['image']['image']);

            /**
             * Set featured image dimensions
             */
            $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            $this->results[$key]['image']['width'] = $img[1];
            $this->results[$key]['image']['height'] = $img[2];

            /**
             * Set category field
             */
            $cat = get_the_terms($post->ID, $this->config['post_type'].'_category');
            $this->results[$key]['term']['category'] = $cat[0]->name;

            /**
             * Set tag field 
             */
            $tag = get_the_terms($post->ID, $this->config['post_type'].'_tags');
            $this->results[$key]['term']['tag'] = $tag[0]->name;
        }
    }


    private function parse_content()
    {
        foreach ($this->results as $this->current_result)
        {
            $first_pass = $this->replace_moustaches($this->content);
            // run through a second time because the post_content field may contain {{moustaches}}
            // that won't be replaced the first time.
            $this->html .= $this->replace_moustaches($first_pass);
        }
    }

    private function replace_moustaches($content)
    {
        $this->new_content = $content;

        preg_match_all('/{{(.*?)}}/', $this->new_content, $moustaches);

        foreach ($moustaches[1] as $key => $field)
        {
            $sanitize = $this->sanitize($field);
            $unhide = $this->unhide($field);
            $field = str_replace(':sanitize','',$field);
            $field = str_replace(':unhide','',$field);

            if (array_key_exists($field, $this->current_result['post']))
            {
                $value = $this->current_result['post'][$field];
                if ($sanitize){ $value = \sanitize_title($value); }
                $this->new_content = str_replace($moustaches[0][$key], $value, $this->new_content);
                continue;
            }

            if (array_key_exists($field, $this->current_result['meta']))
            {
                $value = $this->current_result['meta'][$field][0];
                if ($sanitize){ $value = \sanitize_title($value); }
                $this->new_content = str_replace($moustaches[0][$key], $value, $this->new_content);
                continue;
            }
            
            if (array_key_exists($field, $this->current_result['image']))
            {
                $value = $this->current_result['image'][$field];
                if ($sanitize){ $value = \sanitize_title($value); }
                $this->new_content = str_replace($moustaches[0][$key], $value, $this->new_content);
                continue;
            }

            if (array_key_exists($field, $this->current_result['term']))
            {
                $value = $this->current_result['term'][$field];
                if ($sanitize){ $value = \sanitize_title($value); }
                $this->new_content = str_replace($moustaches[0][$key], $value, $this->new_content);
                continue;
            }

            /**
             * Not matched any field, if :unhide is set, lets keep it.
             */
            if (!$unhide){
                $this->new_content = str_replace($moustaches[0][$key], '', $this->new_content);
            }
        }
        $value = '';
        return $this->new_content;
    }


    private function sanitize($field)
    {
        if (strpos($field, ':sanitize') !== false)
        {
            return true;
        }
        return false;
    }


    private function unhide($field)
    {
        if (strpos($field, ':unhide') !== false)
        {
            return true;
        }
        return false;
    }
}
