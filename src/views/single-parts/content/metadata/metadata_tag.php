<?php   
// ┌─────────────────────────────────────────────────────────────────────────┐
// │                                                                         │
// │                           MOVEMENT TAG                                  │
// │                                                                         │
// └─────────────────────────────────────────────────────────────────────────┘
    
/**
 * Get the current posts tag
 */
$tags      = get_the_term_list($post->ID, 'syllabus_tags', '<span class="pr-2 hover:text-green-500">','</span><span class="pr-2 hover:text-green-500">', '</span>');

?>
<div class="w-1/3 bg-mist rounded-2xl p-4">
    <div class="font-thin capitalize underline">Movement: <?php echo $tags; ?></div>
</div>