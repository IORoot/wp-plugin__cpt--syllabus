<?php

    $series_terms = get_terms([
        'taxonomy' => $post->terms[0]->taxonomy,
        'exclude'  => $post->terms[0]->term_id
    ]);
    foreach($series_terms as $loop_key => $loop_term) {
        if ($loop_term->parent == 0) { unset($series_terms[$loop_key]); }
    }
    shuffle($series_terms);
    $series_terms = array_splice($series_terms,0,2);



    foreach ($series_terms as $loop_series_term)
    {
        /**
         * Get ACF Fields.
         */
        if (class_exists('ACF')) {
            $acf_terms = get_fields($loop_series_term);
            foreach($acf_terms['meta_fields'] as $meta_term) {
                $acf_terms['meta_fields'][$meta_term['meta_field_name']] = $meta_term['meta_field_value'];
            }
            $loop_series_term->acf = $acf_terms;
        }

        /**
         * Get the term permalink
         */
        $loop_series_term->url = get_term_link($loop_series_term);


        /**
         * Template of Related Series.
         */
        $html[] = '<a href="'.$loop_series_term->url.'" class="flex flex-col relative w-full md:w-1/2 p-4 bg-green-500 text-white fill-white rounded-2xl overflow-hidden hover:fill-green-500 hover:text-black hover:bg-gray-200" >';
        
            // ┌─────────────────────────────────────────────────────────────────────────┐
            // │                                                                         │
            // │                                   IMG                                   │
            // │                                                                         │
            // └─────────────────────────────────────────────────────────────────────────┘
            $html[] = '<img class="z-40 h-60 m-auto" src="'.$loop_series_term->acf["featured_image"]["url"].'"/>';
            
            $html[] = '<div class="z-30 flex justify-items-stretch mt-4 ">';

                // ┌─────────────────────────────────────────────────────────────────────────┐
                // │                                                                         │
                // │                                   TEXT                                  │
                // │                                                                         │
                // └─────────────────────────────────────────────────────────────────────────┘
                $html[] = '<div class="z-30 border-t-2 border-gray-900 pt-2 mt-2 ">';

                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                                   TITLE                                 │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    $html[] = '<h2 class="font-semibold text-2xl">'.$loop_series_term->name.'</h2>';

                    // ┌─────────────────────────────────────────────────────────────────────────┐
                    // │                                                                         │
                    // │                                   EXCERPT                               │
                    // │                                                                         │
                    // └─────────────────────────────────────────────────────────────────────────┘
                    $html[] = '<p class="font-light">'.$loop_series_term->acf["meta_fields"]["Excerpt"].'</p>';
                $html[] = '</div>';


                // ┌─────────────────────────────────────────────────────────────────────────┐
                // │                                                                         │
                // │                                   SVG                                   │
                // │                                                                         │
                // └─────────────────────────────────────────────────────────────────────────┘
                $html[] = '<svg class="z-10 absolute w-11/12 h-full -top-1/4 -right-1/4 ">';
                    $html[] = '<use xlink:href="#'.$loop_series_term->acf["meta_fields"]["SVG Glyph"].'"></use>';
                $html[] = '</svg>';

                // ┌─────────────────────────────────────────────────────────────────────────┐
                // │                                                                         │
                // │                                   NOISE                                 │
                // │                                                                         │
                // └─────────────────────────────────────────────────────────────────────────┘
                $html[] = '<svg class="z-0 w-full h-full absolute left-0 top-0 "><use xlink:href="#noise"></use></svg>';

            $html[] = '</div>';

        $html[] = '</a>';
    }

    echo implode('', $html);


?>
