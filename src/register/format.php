<?php

namespace andyp\cpt\syllabus\register;

/**
 * Add a taxonomy to the new custom post-type.
 */
class format
{

	public $singular = '';

	public $plural = '';

	public $format = '';


	/**
	 * Capitalized.
	 * 
	 * Something like 'syllabus' or 'Article'
	 */
	public function set_singular($name)
	{
		$this->singular = ucfirst($name);
		$this->plural = [ strtolower($name) . 's' ];
	}


	/**
	 * All lowercase.
	 * 
	 * Register something like 'syllabus_category' or 'article_category'.
	 */
	public function set_taxonomy($taxonomy)
	{
		$this->taxonomy = $taxonomy;
	}

	/**
	 * Register on init
	 */
	public function register_on_init()
	{
		add_action( 'init', array($this, 'callback_to_add_formats'), 4 );
	}


	/**
	 * Callback to run.
	 * (make sure its a public method)
	 */
	public function callback_to_add_formats()
	{
	}


}
