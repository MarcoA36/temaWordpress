<section class="container-fluid bg-seccion-1 seccion seccion_ultimos-articulos">
    <div class="container">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4, // Obtener las últimas 4 entradas
        );
        $query = new WP_Query($args);
        $count = 0;
        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                if ($count == 0) { // La primera entrada va en el contenedor principal
                    ?>
                    <a href="<?php the_permalink(); ?>"
                        class="row flex-column flex-lg-row py-2 my-2 py-lg-4 my-lg-4 container_articulo-principal">
                        <div class="col-lg-6 imagen">
                            <?php the_post_thumbnail('entradas', array('class' => 'img_responsive')); ?>
                        </div>
                        <div class="col-lg-6 titulo-descripcion">
                            <div class="titulo">
                                <?php the_title('<h2>', '</h2>'); ?>
                            </div>
                            <div class="descripcion">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </a>
                    <div class="text-center container_col-3">
                        <?php
                } else { // Las siguientes 3 entradas van en el contenedor secundario
                    get_template_part('card_entrada-2');
                }
                $count++;
            endwhile;
            // Cerrar el contenedor de artículos secundarios si hay al menos una entrada secundaria
            if ($count > 1) {
                ?>
                </div>
                <?php
            }
        endif;
        wp_reset_postdata(); // Restablecer datos de publicación
        ?>
    </div>
</section>