<?php

    // Is this category a top-level category.
    $is_parent = false;
    if($current_term->parent == 0){ $is_parent = true;} 

?>




<div class="rounded-2xl h-96 my-10 p-10 bg-zinc-400 relative overflow-hidden" >

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                MINI GLYPH                               │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>

    <div class="z-40 absolute bottom-0 left-0 p-4 md:p-10 w-full md:w-1/2">

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                TITLE                                    │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <h1 class="font-semibold text-4xl md:text-7xl font-serif"><?php echo ucfirst($current_term->name); ?></h1>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                               VIDEOS                                    │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="flex font-light">
            <p class=""><?php echo count($posts); ?> videos. </p>
        </div>   

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                  LINE                                   │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <hr class="w-1/6 border-b-4 border-gray-900 border-t-0 my-2"/>
    </div>

    
</div>



<?php
