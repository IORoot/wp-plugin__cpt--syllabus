<?php

/**
 * Get the Movement name.
 */
$movement = get_the_term_list($post->ID, 'syllabus_tags');

/**
 * Get the current posts award_level
 */
$award_level = (get_post_meta($post->ID, 'award_level'))[0];

/** 
 * Get the count of movements within this movement.
 */
$level_count = (get_the_terms($post, 'syllabus_tags'))[0]->count;

?>


<h1 class="text-6xl mb-4 uppercase font-semibold pb-0">
    <?php echo $movement. ' Level ' . $award_level . ' '; ?>
</h1>