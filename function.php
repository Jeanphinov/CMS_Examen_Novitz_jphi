<?php $args = array(
    'post_type' => array('formation'),
    'posts_per_page' => '5',
);
$query = new WP_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        echo $post->post_title;
    }
} else {
    echo 'Aucun post trouvé';
}
wp_reset_postdata();