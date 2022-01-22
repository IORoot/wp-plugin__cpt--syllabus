<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_619768e4083d6',
        'title' => 'Syllabus CPT Settings',
        'fields' => array(
            array(
                'key' => 'field_6197691af6ba0',
                'label' => 'Content Filters',
                'name' => 'syllabus_filters',
                'type' => 'flexible_content',
                'instructions' => 'Filters to apply to the content of Syllabus posts. These will be processed in order from top to bottom.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layouts' => array(
                    'layout_619769627c540' => array(
                        'key' => 'layout_619769627c540',
                        'name' => 'parsedown',
                        'label' => 'Parsedown',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_61976972f6ba1',
                                'label' => 'Parsedown',
                                'name' => 'parsedown',
                                'type' => 'true_false',
                                'instructions' => 'Treat content as markdown and convert it into HTML.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'message' => '',
                                'default_value' => 1,
                                'ui' => 1,
                                'ui_on_text' => '',
                                'ui_off_text' => '',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    'layout_619769f3f08a9' => array(
                        'key' => 'layout_619769f3f08a9',
                        'name' => 'html_tag',
                        'label' => 'HTML Tag Classes',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_619769fff08aa',
                                'label' => 'Target Tag',
                                'name' => 'target_tag',
                                'type' => 'text',
                                'instructions' => 'HTML Tag to target',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '20',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => 'H1',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_619776f8f08ab',
                                'label' => 'Add Classes',
                                'name' => 'classes',
                                'type' => 'text',
                                'instructions' => 'Add these classes to all tags within the HTML content of the post. Good for default Tailwind classes to add to all tags.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '80',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                ),
                'button_label' => 'Add Row',
                'min' => '',
                'max' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'syllabus_settings',
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
        'description' => 'Settings found on the admin sidebar under \'Syllabus\'.',
    ));
    
    endif;