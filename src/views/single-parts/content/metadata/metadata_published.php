<?php

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                                                                         │
// │                         PUBLISHED DATE                                  │
// │                                                                         │
// └─────────────────────────────────────────────────────────────────────────┘

/**
 * Human readable published time.
 */
$published = human_time_diff( get_the_time( 'U', $post ), current_time( 'timestamp' ) ) . ' ago.';