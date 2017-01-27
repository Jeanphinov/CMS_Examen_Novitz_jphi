<?php

function get_posts_count() {
    global $wp_query;
    return $wp_query->post_count;
}

if (isset($_GET['offset'])) {
    if ($_GET['offset'] < 0) $offset = $_GET['offset'];
    else $offset = $_GET['offset'];
}
