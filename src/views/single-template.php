<?php 

/**
 * This is the single page of each post page.
 */

 /**
  * Attach all of the terms (+ACF fields) to the $post object.
  */
include( __DIR__ . '/single-parts/get_post_terms.php');
$post->terms = set_post_terms_hierarchical($post);

/**
 * Attach the image to the $post object
 */
$post->image = get_the_post_thumbnail_url($post->ID);

/**
 * Attach any metadata to post object.
 */
$post->meta  = get_post_meta($post->ID);

get_header();

while ( have_posts() ) :

	the_post();

	// -------------------------- TEMPLATE START ------------------------------
	?>
	<article class="relative flex flex-row">

		<aside class="container__sidebar w-1/5 bg-mist">
			<?php   
			// ┌─────────────────────────────────────────────────────────────────────────┐
			// │                                                                         │
			// │                                SIDEBAR                                  │
			// │                                                                         │
			// └─────────────────────────────────────────────────────────────────────────┘
			?>
			<?php 
				include( __DIR__ . '/single-parts/sidebar/init.php');
			?> 
		</aside>

		<div class="container__main mx-4 2xl:mx-auto w-4/5 max-w-screen-xl">
			<?php   
			// ┌─────────────────────────────────────────────────────────────────────────┐
			// │                                                                         │
			// │                                CONTENT                                  │
			// │                                                                         │
			// └─────────────────────────────────────────────────────────────────────────┘
			?>
			<?php 
				include( __DIR__ . '/single-parts/content/init.php');
			?> 
		</div>

	</article>



<?php
// -------------------------- TEMPLATE END --------------------------------
endwhile;
get_footer();
