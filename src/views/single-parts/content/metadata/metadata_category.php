<?php   
// ┌─────────────────────────────────────────────────────────────────────────┐
// │                                                                         │
// │                               CATEGORY                                  │
// │                                                                         │
// └─────────────────────────────────────────────────────────────────────────┘

/**
 * Get the current posts category
 */
$category  = get_the_term_list($post->ID, 'syllabus_category', '<span class="pr-2 hover:text-green-500">','</span><span class="pr-2 hover:text-green-500">', '</span>');

?>
<div class="bg-mist rounded-2xl px-4 py-1">
    <div class="font-thin capitalize underline text-sm"><?php echo $category; ?></div>
</div>