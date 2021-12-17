<?php
// ┌─────────────────────────────────────────────────────────────────────────┐
// │                                                                         │
// │                             AWARD LEVEL                                 │
// │                                                                         │
// └─────────────────────────────────────────────────────────────────────────┘

/**
 * Get the current posts award_level
 */
$award_level = (get_post_meta($post->ID, 'award_level'))[0];

/** 
 * Get the posts' current term.
 * This contains a 'count' key with the number of posts in it.
 */
$current_movement = get_the_terms($post, 'syllabus_tags');
?>

<div class="w-1/3 bg-mist rounded-2xl p-4">
    <div class="font-thin">Award Level: <?php  echo $award_level. ' / ' . $current_movement[0]->count; ?></div>
</div>