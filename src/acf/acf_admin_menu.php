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

        $this->menu_syllabus_settings();

    }

    /**
     * Syllabus -> Settings
     */
    public function menu_syllabus_settings()
    {
        if (function_exists('acf_add_options_page')) {
            $argsparent = array(
            'page_title' => 'Settings',
            'menu_title' => 'Settings',
            'menu_slug' => 'syllabus_settings',
            'capability' => 'manage_options',
            'position' => 1,
            'parent_slug' => 'edit.php?post_type=syllabus',
            'icon_url' => '',
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