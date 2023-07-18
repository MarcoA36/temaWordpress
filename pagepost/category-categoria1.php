<?php get_header(); ?>
<section class="container-fluid  seccion seccion_ultimos-articulos">
    <div class="container">

        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="text-center container_col-2">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'paged' => $paged
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post();
                           
                        get_template_part('card_entrada-2');
                           
                        endwhile;
                        wp_reset_postdata(); // Restablecer datos de publicación
                        ?>
                </div>
                <div class="paginacion text-center m-4">
                <?php if (function_exists('wp_pagenavi')) {
                            wp_pagenavi(array('query' => $query)); // Llamada a WP-PageNavi
                        }
                    endif;
                    ?>
                </div>
               


            </div>
            <div class="col-lg-3 col-md-12">
                <?php
                get_sidebar();
                get_template_part('seccion_contacto-sidebar');
                get_template_part('seccion_nosotros-sidebar');
                ?>

            </div>


        </div>
    </div>
</section>
<?php
get_footer();
?>