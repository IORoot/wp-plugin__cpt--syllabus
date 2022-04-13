<?php

/**
 * Update the youtube data with a response from the 
 * youtube API. (using the Youtube_api class)
 *
 * @param [type] $value
 * @param [type] $post_id
 * @param [type] $field
 * @param [type] $original
 * @return void
 */
function my_acf_update_value( $value, $post_id, $field, $original ) {

    if ($field['name'] != 'media'){ return $value; }

    // get sub-field IDs - this is because the field_key will
    // change - so don't rely on it!
    $youtube_id_key   = $field["sub_fields"][0]['key'];
    $youtube_json_key = $field["sub_fields"][1]['key'];
    $post_data = $_POST["acf"][$field["key"]];

    $index=1;
    foreach ($post_data as $post_index => $post_row)
    {
        if (empty($post_row[$youtube_id_key])){ $index++; continue; }

        if (empty($post_row[$youtube_json_key])){
            // If the field is empty, get the data.
            $youtube_api = new andyp\theme\syllabus\lib\youtube_api;
            $data = $youtube_api->get_data($post_row[$youtube_id_key]);
            $json = json_encode($data);

            $result = update_sub_field( array('media', $index, 'video_details'), $json );
        }

        $index++;
    }

    return $value;

}

// Apply to all fields.
add_filter('acf/update_value', 'my_acf_update_value', 10, 4);