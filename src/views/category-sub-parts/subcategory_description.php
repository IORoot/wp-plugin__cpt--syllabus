<?php

if (empty($wp_query->queried_object->description)){ return; }
?>

<div class="w-full lg:w-2/3 flex flex-col">
    <h2 class="text-5xl mb-20">Synopsis</h2>
    <div class="text-3xl whitespace-pre-line"><?php echo $wp_query->queried_object->description; ?></div>
</div>