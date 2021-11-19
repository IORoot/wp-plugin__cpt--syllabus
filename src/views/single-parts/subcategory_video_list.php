<?php

?>

<div class="w-full lg:w-1/3 lg:pl-10">

    <h2 class="text-2xl mb-4">Videos Listing</h2>

    <div class="flex flex-col">

    <?php 
    
    $all_posts = get_posts([
        'post_type' => $post->post_type,
        'numberposts' => -1,
        'order' => 'ASC',
        'tax_query' => [[
            'taxonomy' => $post->terms[0]->taxonomy,
            'field' => 'term_id', 
            'terms' => $post->terms[0]->term_id,
            'include_children' => false
        ]]
    ]);

    
    
    
    foreach ($all_posts as $loop_key => $loop_post) {  
        $loop_post->meta = get_post_meta($loop_post->ID);

        // Highlight current post.
        $background_colour = 'gray-100';
        if ($post->ID == $loop_post->ID) {
            $background_colour = 'green-500';
        }
    ?>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                   LINK                                  │
        // │                    .group is used for .group-hover                      │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <a class="video_list_item relative group w-full mb-4 bg-<?php echo $background_colour; ?> rounded-2xl h-8 flex fill-gray-800 hover:bg-green-400 hover:text-white hover:fill-white" href="<?php echo get_permalink($loop_post);?>">

            <?php
            // ┌──────────────────────────────────────────────────────────────────────────────┐
            // │██████████████████████████████████████████████████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // │█████████████████████████████████ HOVER BOX ██████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // └──────────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="group-hover:opacity-100 opacity-0 absolute top-0 right-0 bg-green-400 w-32 h-full rounded-r-2xl inline-block">
                <svg class="fill-white w-6 h-full m-auto"><use xlink:href="#open-external"></use></svg>
            </div>


            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                   ⦿                                     │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="absolute top-1 left-9 z-10">&#10687;</div>


            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                          PLAYLIST POSITION                              │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="bg-gray-300 w-10 text-center text-white ml-20 my-auto">
                <?php echo intval($loop_post->meta['playlistPosition'][0]) +1; ?>.
            </div>


            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                  TITLE                                  │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="font-thin font-xs my-auto text-left flex-1 pl-4 relative">
            <?php 
                // strip off the first part of title.
                $title = explode(' - ', $loop_post->post_title); 
                if (count($title) > 1){
                    $title = array_slice($title, 1);
                } 
                $title = implode(' ', $title);
                echo ucwords($title);
            ?>
            </div>

        </a>

    <?php } ?>

    </div>

</div>