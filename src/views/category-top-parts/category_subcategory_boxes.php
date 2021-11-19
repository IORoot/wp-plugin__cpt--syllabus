<?php

$sub_terms = get_terms( [ 'taxonomy' => $wp_query->queried_object->taxonomy, 'parent' => $wp_query->queried_object->term_id, 'hide_empty' => false ]);

if (count($sub_terms) == 0){ return; }

?>

<h2 class="text-3xl md:text-5xl mt-10 md:mt-32">Series in <?php echo $current_term->name; ?></h2>
<div class="grid grid-cols-2 md:grid-cols-3 w-full mt-10 md:mt-20 gap-2">

    <?php

        foreach ($sub_terms as $current_term)
        {
            /**
             * Change format of meta_fields[ 0 => [ ], 1 => [ ] ]
            * to meta_fields[ "SVG Glyph" => "glyph-triangles"]
            */
            $current_term->acf = get_fields($current_term);
            foreach ($current_term->acf["meta_fields"] as $key => $meta_array)
            {
                $current_term->acf["meta_fields"][$meta_array['meta_field_name']] = $meta_array['meta_field_value'];
                unset($current_term->acf["meta_fields"][$key]);
            }


            /**
             * Include the item, formatted in HTML.
             */
            include( __DIR__ . '/category_subcategory_cards.php');

        }
    ?>

</div>