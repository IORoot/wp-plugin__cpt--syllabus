<?php 
// -------------------------- CATEGORY TEMPLATE START ------------------------------
?>


    <main class="max-w-screen-xl m-auto block px-4 pb-40 relative">

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                TOP HERO                                 │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <?php include( __DIR__ . '/category-top-parts/category_hero.php'); ?>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                BREADCRUMBS                              │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <?php do_shortcode('[breadcrumb colour="green-500"]'); ?>

        <div class="flex mt-32">
                <?php
                // ┌─────────────────────────────────────────────────────────────────────────┐
                // │                                                                         │
                // │                        THE CATEGORY DESCRIPTION                         │
                // │                                                                         │
                // └─────────────────────────────────────────────────────────────────────────┘
                ?>
                <?php include( __DIR__ . '/category-sub-parts/subcategory_description.php'); ?>

                <?php
                // ┌─────────────────────────────────────────────────────────────────────────┐
                // │                                                                         │
                // │                            THE VIDEO LISTINGS                           │
                // │                                                                         │
                // └─────────────────────────────────────────────────────────────────────────┘
                ?>
                <?php include( __DIR__ . '/category-sub-parts/subcategory_video_list.php'); ?>
        </div>

        <?php
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                             SERIES VIDEOS                               │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        ?>
        <div class="flex flex-wrap mt-20 relative">
        <?php
            if ($wp_query->queried_object->parent != $wp_query->queried_object->term_id){
                include( __DIR__ . '/category-sub-parts/subcategory_video_cards.php');
            }
        ?>
        </div>

    </main>


<?php

// -------------------------- TEMPLATE END --------------------------------