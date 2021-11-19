<?php


    include( __DIR__ . '/random_image.php');
    include( __DIR__ . '/random_svg_glyph.php');

    // Is this category a top-level category.
    $is_parent = false;
    if($current_term->parent == 0){ $is_parent = true;} 

?>




<div class="rounded-2xl h-96 my-10 p-10 bg-gray-200 from-current to-gray-500 relative overflow-hidden" >

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                MINI GLYPH                               │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <svg class="z-50 absolute fill-gray-500 top-4 md:top-10 left-4 md:left-10 w-10 h-10">
		<use xlink:href="#<?php echo $svg_name; ?>"></use>
	</svg>


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

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                EXCERPT                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <p class="font-light w-full md:w-3/4 mt-4"><?php echo $current_term->acf['meta_fields']['Excerpt']; ?></p>
    </div>

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                  IMAGE                                  │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <img class="z-30 absolute top-0 right-0 lg:right-40 h-72 sm:h-80 md:h-96" src="<?php echo $current_term_acf_image; ?>">

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                WAVEY-MIN                                │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <div class="z-20 wavey-min bg-right-bottom bg-no-repeat absolute right-0 bottom-0 mix-blend-screen hidden md:block" style="width:150%; height:150%"></div>

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                 GLYPH                                   │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <svg class="z-10 absolute fill-green-600 -top-1/2 -left-1/2 opacity-50 md:opacity-100" style="width:200%; height:200%;">
		<use xlink:href="#<?php echo $svg_name; ?>"></use>
	</svg>

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                  NOISE                                  │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <svg class="z-20 w-full h-full absolute left-0 top-0 mix-blend-overlay"><use xlink:href="#noise"></use></svg>
    
</div>



<?php
