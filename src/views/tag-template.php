<?php 

get_header();
$current_term = get_queried_object();
$current_term->acf = get_fields( $current_term );

/**
 * Convert all ACF meta fields to key => value pairs for the taxonomy.
 */
foreach ($current_term->acf['meta_fields'] as $meta_field)
{
    $name  = $meta_field['meta_field_name'];
    $value = $meta_field['meta_field_value'];
    $current_term->acf['meta_fields'][$name] = $value;
}

// -------------------------- TEMPLATE START ------------------------------
?>

        
    <main class="max-w-screen-xl m-auto block px-4 pb-40 relative">

            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                TOP HERO                                 │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <?php include( __DIR__ . '/tag-parts/category_hero.php'); ?>

            <?php
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                            THE VIDEO LISTINGS                           │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            ?>
            <div class="mt-20">
                <?php include( __DIR__ . '/tag-parts/listings.php'); ?>
            </div>

    </main>


<?php
// -------------------------- TEMPLATE END --------------------------------
?>

<div class="svgs">
    <?php
    include( get_stylesheet_directory() . '/src/assets/svgs/wavey-min.php');
    include( get_stylesheet_directory() . '/src/assets/svgs/noise.svg');
    include( get_stylesheet_directory() . '/src/assets/svgs/glyph-all.svg');
    ?>
</div>

<?php

get_footer();

