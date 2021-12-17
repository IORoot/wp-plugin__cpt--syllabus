<?php

    $syllabus_rules = get_field('variables');

    $html[] = '<div class="text-2xl mb-4 mt-10">Rules</div>';
    $html[] = '<hr class="mb-4"/>';
    $html[] = '<div class="w-full flex flex-row flex-wrap gap-4 mb-10">';

    $loop_count = 1;
    foreach($syllabus_rules as $rules)
    {
        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                  TITLE                                  │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        $rule_type = $rules['acf_fc_layout'];

        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                              More or Less?                              │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        $more_or_less = '';
        if (isset($rules['more_or_less']))
        {
            $more_or_less = 'or '.$rules['more_or_less'];
        }

        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                              MULTIPLIER                                 │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        $multiplier = '';
        if (isset($rules['multiplier']))
        {
            $multiplier = $rules['multiplier'] . 'x';
        }

        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                                                                         │
        // │                                HTML                                     │
        // │                                                                         │
        // └─────────────────────────────────────────────────────────────────────────┘
        $html[] = '<div class="bg-ghost rounded-2xl p-4 w-1/4 flex-grow">';

        $html[] = '<div class="flex flex-row">';

            //SVG
            $html[] = '<div class="w-8 h-8 mr-4">'.$rules['svg'].'</div>';
            // Title
            $html[] = '<div class="h-8 py-1 text-xl text-Cyan500 capitalize">Rule '. $loop_count . '. ' .$rule_type.'</div>';

        $html[] = '</div>';


        // Value
        $html[] = '<p class="bg-Cyan500 text-white p-2 my-2 text-center rounded-lg">'.$multiplier . ' <b>' . $rules[$rule_type]. '</b> '  . ' ' . $more_or_less .'</p>';

        // Description
        $html[] = '<p>'.$rules['description'].'</p>';

        /**
         * Loop all values for debug.
         */
        // foreach($rules as $info_key => $info_value)
        // {
        //     $html[] = '<li>'.$info_key.' : <b>'.$info_value.'</b></li>';
        // }

        $html[] = '</div>';

        $loop_count++;
    }
    $html[] = '</div>';

    echo implode('', $html);

?>
