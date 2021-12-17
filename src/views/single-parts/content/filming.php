<?php

/**
 * ONLY IF ADMIN
 * 
 * Show filming details and notes.
 */
if ( current_user_can('editor') || current_user_can('administrator') ){

    $filming_location = get_field('filming_location');
    $filming_notes = get_field('filming_notes');

    echo '<div class="bg-Cyan500 text-white rounded-2xl p-10 my-10">';
    
    echo '<div class="text-3xl mb-4">ADMIN : Filming</div>';
    
    echo '<div class="text-2xl font-thin">';
    echo 'Location: ' . $filming_location;
    echo '</div>';

    echo '<hr class="mb-4"/>';
    
    echo '<div class="text-xl font-thin">';
    echo $filming_notes;
    echo '</div>';

    echo '</div>';

}