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


if ($current_term->taxonomy == 'syllabus_tags'){
    include( __DIR__ . '/tag-template.php');
}


if ($current_term->taxonomy == 'syllabus_category') {

    if ($current_term->parent == 0){
        include( __DIR__ . '/category-top-template.php');
    } else {
        include( __DIR__ . '/category-sub-template.php');
    }

}


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

