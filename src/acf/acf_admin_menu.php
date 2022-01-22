<?php
namespace andyp\cpt\syllabus\acf;

/**
 * Create Syllabus Settings Menu Item
 * 
 * https://easy64.org/svg-editor/
 */
class acf_admin_menu
{

    public function __construct(){

        if (function_exists('acf_add_options_page')) {
            $argsparent = array(
            'page_title' => 'Settings',
            'menu_title' => 'Settings',
            'menu_slug' => 'syllabus_settings',
            'capability' => 'manage_options',
            'position' => 1,
            'parent_slug' => 'edit.php?post_type=syllabus',
            'icon_url' => 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbD0iI0Y1OUUwQiIgZD0iTTEyLDNMMSw5TDEyLDE1TDIxLDEwLjA5VjE3SDIzVjlNNSwxMy4xOFYxNy4xOEwxMiwyMUwxOSwxNy4xOFYxMy4xOEwxMiwxN0w1LDEzLjE4WiIvPjwvc3ZnPg==',
            'redirect' => true,
            'post_id' => 'options',
            'autoload' => false,
            'update_button'		=> __('Update', 'acf'),
            'updated_message'	=> __("Options Updated", 'acf'),
        );
            acf_add_options_page($argsparent);
        }

    }

}