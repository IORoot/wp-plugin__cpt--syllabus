<?php

?>

<div class="w-1/3 pl-4 hidden lg:block">

    <h2 class="text-5xl mb-20">Videos Listing</h2>

    <div class="flex flex-col">

    <?php foreach ($posts as $loop_key => $post) {  
        $post->meta = get_post_meta($post->ID);
    ?>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                   LINK                                  │
        // │                    .group is used for .group-hover                      │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <a class="video_list_item relative group w-full mb-4 bg-gray-100 rounded-2xl h-8 flex fill-gray-800 hover:bg-green-400 hover:text-white hover:fill-white" href="<?php echo get_permalink($post);?>">

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
                <?php echo intval($post->meta['playlistPosition'][0]) +1; ?>.
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
                $title = explode(' - ', $post->post_title); 
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