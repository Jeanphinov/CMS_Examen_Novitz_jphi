<?php
/**
 * Template Name: arch
 *
 */


get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$original_query = $wp_query;
$wp_query = null;
$args=array('posts_per_page'=>1 ,'paged'=>$paged);
$wp_query = new WP_Query( $args );

		 if ( have_posts() ) : 


			while ( have_posts() ) : the_post();

the_date();
			endwhile;


		else :
			get_template_part( 'content', 'none' );

		endif;



 get_footer();
