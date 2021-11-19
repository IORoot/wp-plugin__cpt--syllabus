<?php

    // The current category ACF SVG Name
    $svg_name = $current_term->acf['meta_fields']['SVG Glyph'];
    if (is_null($svg_name)) {
        $glyphs = ['glyph-triangles', 'glyph-rectangles', 'glyph-logo', 'glyph-over-under', 'glyph-arches',
            'glyph-arrows-up', 'glyph-dots', 'glyph-hoops', 'glyph-layers', 'glyph-left-right', 'glyph-polygons',
            'glyph-sonar', 'glyph-stripes'];
        shuffle($glyphs);
        $svg_name = $glyphs[0];
    }