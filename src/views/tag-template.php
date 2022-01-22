<?php 

get_header();
$current_term = get_queried_object();
$current_term->acf = get_fields( $current_term );

/**
 * Convert all ACF meta fields to key => value pairs for the taxonomy.
 */
if (array_key_exists('meta_fields', $current_term->acf)) {
    foreach ($current_term->acf['meta_fields'] as $meta_field) {
        $name  = $meta_field['meta_field_name'];
        $value = $meta_field['meta_field_value'];
        $current_term->acf['meta_fields'][$name] = $value;
    }
}

// -------------------------- TEMPLATE START ------------------------------
?>

        
    <main class="max-w-screen-xl m-auto block px-4 pb-40 pt-36 relative">

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

<?php

get_footer();

