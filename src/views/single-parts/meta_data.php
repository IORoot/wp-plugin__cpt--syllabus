<?php

    $published = human_time_diff( get_the_time( 'U', $post ), current_time( 'timestamp' ) ) . ' ago.';
    $category  = get_the_term_list($post->ID, 'syllabus_category', '<span class="pr-2 hover:text-green-500">','</span><span class="pr-2 hover:text-green-500">', '</span>');
    $tags      = get_the_term_list($post->ID, 'syllabus_tags', '<span class="pr-2 hover:text-green-500">','</span><span class="pr-2 hover:text-green-500">', '</span>');

    $position  = get_post_meta($post->ID, 'playlistPosition');
    $cat       = get_the_terms($post, 'syllabus_category');
    $episode   = ($position[0] + 1) . ' / ' . $cat[0]->count;
    
?>

<div class="flex flex-col w-full sm:w-1/2 lg:w-full mt-4 lg:mt-0 ml-0 sm:ml-4 lg:ml-0">

    <div class="flex-1 flex gap-4 mb-4">

        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                            PUBLISHED DATE                               │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="w-1/2 bg-gray-200 rounded-2xl p-4">
            <div class="font-semibold">Published</div>
            <div class="font-thin"><?php echo $published; ?></div>
        </div>

        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                               CATEGORY                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="w-1/2 bg-gray-200 rounded-2xl p-4">
            <div class="font-semibold">Category</div>
            <div class="font-thin capitalize underline"><?php echo $category; ?></div>
        </div>



    </div>
    <div class="flex-1 flex mb-6 gap-4">

        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                   TAGS                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="w-1/2 bg-gray-200 rounded-2xl p-4">
            <div class="font-semibold">Tags</div>
            <div class="font-thin capitalize underline"><?php echo $tags; ?></div>
        </div>

        <?php   
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                               EPISODE                                   │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="w-1/2 bg-gray-200 rounded-2xl p-4">
            <div class="font-semibold">Episode</div>
            <div class="font-thin"><?php 
                echo $episode;
            ?></div>
        </div>



    </div>
</div>