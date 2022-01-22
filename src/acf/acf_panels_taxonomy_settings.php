<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_619a790281443',
        'title' => 'Syllabus Taxonomy Settings',
        'fields' => array(
            array(
                'key' => 'field_619a790bf9423',
                'label' => 'SVG Glyph',
                'name' => 'svg_glyph',
                'type' => 'textarea',
                'instructions' => 'SVG Code for this taxonomy',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => 'ue__codemirror',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'syllabus_category',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'syllabus_tags',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Add Glyph to Taxonomies ( Categories & Tags )',
    ));
    
    endif;