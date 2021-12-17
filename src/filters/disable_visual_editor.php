<?php
namespace andyp\cpt\syllabus\filters;

/**
 * Remove the 'visual' editor.
 */
class disable_visual_editor
{

	public function __construct($page_type)
	{
        $this->page_type = $page_type;

        add_filter('user_can_richedit', function( $default ){
            global $post;
            if( $post->post_type === $this->page_type)  return false;
            return $default;
        });
	}

}