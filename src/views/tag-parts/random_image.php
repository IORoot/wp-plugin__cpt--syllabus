<?php

 // The current category ACF Featured image URL
$current_term_acf_image = $current_term->acf['featured_image']['url'];
if (is_null($current_term_acf_image)){
    // all cutout images.
    $image_ids = '7872,7864,7857,6688,6686,6684,6548,6546,6544,6542,6540,6538,6536,6534,6532,6530,6528,6526,6524,6522,6520,6518,6516,6514,6512,6510,6508,6506,6504,6502,6500,6498,6496,6494,6492,6490,6488,6486,6484,6482,6480,6478,6476,6474,6472,6470,6468,6466,6464,6462,6460,6458';
    $current_term_acf_image = do_shortcode('[random_image_url ids="'.$image_ids.'"]'); 
}