<?php

$content = apply_filters('cpt_syllabus_transforms', $post->post_content);

// echo '<div class="text-2xl mb-4">Description</div>';

// echo '<hr class="mb-4"/>';

echo $content;