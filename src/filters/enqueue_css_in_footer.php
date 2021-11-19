<?php

namespace andyp\cpt\syllabus\filters;

/**
 * Include extra CSS into the footer of the page
 */
class enqueue_css_in_footer
{

	public function __construct($page_type)
	{
        $this->page_type = $page_type;

        add_action( 'get_footer', [$this,'register_css'] );
	}


    public function register_css() {
        wp_enqueue_style( $this->page_type.'-style', ANDYP_CPT_SYLLABUS_URL . 'src/css/style.css' );
    }

}