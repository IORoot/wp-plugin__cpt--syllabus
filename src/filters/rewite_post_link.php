<?php

namespace andyp\cpt\syllabus\filters;

/**
 * This watches for the %syllabus_category% string in the link
 * and replace it with the actual post link.
 */
class rewite_post_link
{

    public $post_type;

	public function __construct($post_type)
	{
        $this->post_type = $post_type;
        $this->taxonomy = $post_type . '_category';


        add_filter('post_type_link', [$this, 'category_term_permalink'], 10, 4);
        add_filter('rewrite_rules_array', [$this, 'tax_rewrite_rules'], 10, 4);
	}


    public function category_term_permalink($post_link, $post, $leavename, $sample)
    {
        $newlink = [];
        if ( false == strpos( $post_link, '%'.$this->taxonomy.'%' ) ) {
            return $post_link;
        }


        $terms = get_the_terms( $post->ID, $this->taxonomy );

        foreach ($terms as $term)
        {
            // parent on front
            if ($term->parent == 0){
                array_unshift($newlink, $term->slug);
            }

            // child on back.
            if ($term->parent != 0){
                array_push($newlink, $term->slug);
            }       
        }


        $post_link = str_replace( '%'.$this->taxonomy.'%', implode('/', $newlink), $post_link );
    

        return $post_link;
    }


    /**
     * This adds two new rewrite rules in to hand the post type being the 4th URL segment.
     * Otherwise, the taxonomy won't work as a prefix on the URL line.
     * /syllabus
     *      /parent-category
     *          /child-category
     *              /syllabus-post-type
     */
    public function tax_rewrite_rules($rules) {
        $newRules  = array();
        $newRules[$this->post_type.'/(.+)/(.+)/(.+)/?$']      = 'index.php?'.$this->post_type.'=$matches[3]';
        $newRules[$this->post_type.'/(.+)/?$']                = 'index.php?'.$this->taxonomy.'=$matches[1]'; 
    
        return array_merge($newRules, $rules);
    }

}




