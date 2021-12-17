<div class="w-full">

    <?php 
        /**
         * Get the first tag
         */
        $movement = (get_the_terms( $post->ID, 'syllabus_tags' ))[0];

        /**
         * Get the ACF Field for the tag.
         */
        $svg_glyph = get_field('svg_glyph', $movement->taxonomy . '_' . $movement->term_id);
    ?>

    <div class="flex flex-col">
        <div class=""><?php echo $svg_glyph;?></div>
        <h2 class="text-2xl mb-4 text-center"><?php echo $movement->name; ?></h2>
        <hr class="mb-10 border-commando" />
        <div class="w-full text-xl text-center mb-6">Silver Levels</div>
    </div>

    <div class="flex flex-col">

    <?php 
    
    /**
     * Get list of all posts of type 'syllabus'
     * in decending order
     * with taxonomy equal to same taxonomy as
     * this page.
     */
    $all_posts = get_posts([
        'post_type' => $post->post_type,
        'numberposts' => -1,
        'order' => 'ASC',
        'tax_query' => [[
            'taxonomy' => $movement->taxonomy,
            'field' => 'term_id', 
            'terms' => $movement->term_id,
            'include_children' => false
        ]]
    ]);

    
    
    /**
     * Loop through each post
     */
    foreach ($all_posts as $loop_key => $loop_post) {  

        /**
         * Get all the metadata for the current post.
         */
        $loop_post->meta = get_post_meta($loop_post->ID);

        /**
         * The current award level 1-10
         */
        $award_level = intval($loop_post->meta['award_level'][0]);

        // Default Colour.
        $background_colour = 'CoolGrey100';

        // If the GOLD levels.
        if ($award_level >= 6){
            $background_colour = 'Amber500';
        }

        // If the current post
        if ($post->ID == $loop_post->ID) {
            $background_colour = 'Cyan500';
        }

        /**
         * GOLD Title Header
         */
        if ($award_level == 6){
            ?>
            <div class="w-full text-xl text-center my-6">Gold Levels</div>
            <?php
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
        <a class="video_list_item relative group w-full mb-4 bg-<?php echo $background_colour; ?> rounded-2xl h-8 flex hover:bg-Cyan500 hover:text-white" href="<?php echo get_permalink($loop_post);?>">

        
            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                          PLAYLIST POSITION                              │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="w-10 text-center text-night ml-2 my-auto">
                <?php echo $award_level; ?>.
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