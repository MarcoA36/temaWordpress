<section class="seccion">

<h2><?php echo $titulo; ?></h2>
<ul>
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $cantidad
);
$latest_posts = new WP_Query( $args );
if ( $latest_posts->have_posts() ) :
    while ( $latest_posts->have_posts() ) :
        $latest_posts->the_post();
?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
    endwhile;
endif;
?>
</ul>

</section>