<?php

function getImageForSlider()
{
    global $post;
    $id = $post->ID;

    $slider = array();
    $i = 0;



     foreach (get_fields($id) as $field):
         if ($field):
             $slider[$i]['url'] = $field['url'];
             $slider[$i]['alt'] = $field['alt'];
             $slider[$i]['caption'] = $field['caption'];
             $slider[$i]['title'] = $field['title'];
             $slider[$i]['description'] = $field['description'];
             $i++;
         endif;
     endforeach;
    return $slider;
}

?>