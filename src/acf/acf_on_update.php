<?php

/**
 * On save of options page, create the category.
 */
function save_regexpost_options() {

    $screen = get_current_screen();
	if (strpos($screen->id, "regexposts") == false) { return; }

    // Create new object.
    $rp = new \andyp\regexer\lib\regexer();
    $rp->run();

	return;
}

add_action('acf/save_post', 'save_regexpost_options', 20);