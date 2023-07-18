<?php get_header(); ?>

<section class="container-fluid bg-dark text-white seccion seccion_ultimos-articulos-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="flex-column text-center py-2 my-2   container_entradas-colum">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'paged' => $paged
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post();
                           
                            get_template_part('card_entrada-3');
                                                   
                        endwhile;
                        wp_reset_postdata(); // Restablecer datos de publicación
                        if (function_exists('wp_pagenavi')) {
                            wp_pagenavi(array('query' => $query)); // Llamada a WP-PageNavi
                        }
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <?php
                get_sidebar();
                get_template_part('seccion_nosotros-sidebar');
                get_template_part('seccion_contacto-sidebar');
                ?>

            </div>
        </div>
    </div>


</section>


<?php get_footer(); ?>