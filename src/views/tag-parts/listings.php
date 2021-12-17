<?php

?>

<h2 class="text-5xl mb-20 w-full">Video Listing</h2>

<ul class="grid-ul flex flex-wrap xl:-mr-20">


<?php 

$reverse_order = array_reverse($posts);

foreach ($reverse_order as $loop_key => $post) {  
    $post->meta = get_post_meta($post->ID);
?>

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                GRID ITEM                                │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <li class="grid-item pr-2 pb-2 md:pr-4 md:pb-4 lg:pr-10 lg:pb-10 inline-block w-full md:w-1/3 lg:w-1/4" >
            
        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                   LINK                                  │
        // │                    .group is used for .group-hover                      │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <a class="flex flex-col group overflow-hidden relative bg-mist rounded-2xl" href="<?php echo get_permalink($post);?>">
            

            <?php
            // ┌──────────────────────────────────────────────────────────────────────────────┐
            // │██████████████████████████████████████████████████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // │█████████████████████████████████ HOVER BOX ██████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // └──────────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="z-30 group-hover:opacity-100 transition-all opacity-0 absolute top-0 left-0 w-full h-full bg-Cyan500 p-2 rounded-2xl overflow-hidden">

                    <?php
                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                                  DATE                                   │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
                    <div class="z-50 text-white text-xs font-thin absolute top-2 right-2 inline-block"><?php echo the_time('F j, Y'); ?></div>

                    


                    <div class="z-50 absolute bottom-0 left-0 flex flex-col p-2 h-full w-full">

                            <?php
                            // ┌─────────────────────────────────────────────────────────────────────────┐
                            // │                                                                         │
                            // │                          PLAYLIST POSITION                              │
                            // │                                                                         │
                            // └─────────────────────────────────────────────────────────────────────────┘
                            ?>
                            <div class="text-white text-8xl w-full text-center m-auto">
                                <?php
                                    echo intval($post->meta['award_level'][0]);
                                ?>
                            </div>
                            
                            <?php
                            // ┌─────────────────────────────────────────────────────────────────────────┐
                            // │                                                                         │
                            // │                                  TITLE                                  │
                            // │                                                                         │
                            // └─────────────────────────────────────────────────────────────────────────┘
                            ?>
                            <div class="text-white text-center mt-1 font-medium text-lg break-words">
                                <?php  echo ucwords($post->post_title); ?>
                            </div>

                            <?php
                            // ┌─────────────────────────────────────────────────────────────────────────┐
                            // │                                                                         │
                            // │                                EXCERPT                                  │
                            // │                                                                         │
                            // └─────────────────────────────────────────────────────────────────────────┘
                            ?>
                            <div class="text-white text-center mt-1 font-light text-sm line-clamp-3 overflow-ellipsis break-words">
                                <?php  echo $post->post_excerpt; ?>
                            </div>

                            <?php
                            // ┌─────────────────────────────────────────────────────────────────────────┐
                            // │                                                                         │
                            // │                                   TAGS                                  │
                            // │                                                                         │
                            // └─────────────────────────────────────────────────────────────────────────┘
                            ?>
                            <div class="mt-2 flex justify-center">
                            <?php 
                                $terms = get_the_terms($post, 'syllabus_tags'); 
                                foreach($terms as $t){
                                    ?>
                                    <div class="text-black text-xs bg-white rounded self-start px-2 py-0.5 mr-0.5 mb-1 inline-block">
                                        <?php echo strtoupper($t->name); ?>
                                    </div>
                                    <?php
                                }
                            ?>
                            </div>
                    </div>


                    <?php
                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                            CATEGORY GLYPH                               │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
                    <svg class="z-20 absolute fill-green-600 -top-1/2 -left-1/2 opacity-10" style="width:200%; height:200%;">
                        <use xlink:href="#<?php echo $current_term->acf['meta_fields']['SVG Glyph']; ?>"></use>
                    </svg>

            </div>


            <?php
            // ┌──────────────────────────────────────────────────────────────────────────────┐
            // │██████████████████████████████████████████████████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // │████████████████████████████████ DEFAULT VIEW ████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // │██████████████████████████████████████████████████████████████████████████████│
            // └──────────────────────────────────────────────────────────────────────────────┘
            ?>

            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                            AWARD POSITION                               │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="text-Cyan500 text-8xl w-full text-center mx-auto my-10">
                <?php
                    echo intval($post->meta['award_level'][0]);
                ?>
            </div>

            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                              syllabus TAG                               │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="z-40 text-white text-xs font-thin absolute top-2 left-2 bg-black px-2 py-0.5 rounded">SYLLABUS</div>
            


            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                BOTTOM TEXT                              │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="flex-1 flex flex-col justify-center mt-2">
                <div class="text-lg max-h-8 leading-4 mb-1 pb-1 truncate text-center">

                    <?php
                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                          PLAYLIST POSITION                              │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
                    <span class="text-smoke text-lg pr-1">
                        <?php
                            echo intval($post->meta['award_level'][0]);
                        ?>.
                    </span>


                    <?php
                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                                  TITLE                                  │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    ?>
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
            </div>


        </a>

    </li>




<?php } ?>


</ul>