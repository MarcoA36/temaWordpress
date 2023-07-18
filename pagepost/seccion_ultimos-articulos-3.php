<section class="container-fluid bg-seccion-1 seccion seccion_ultimos-articulos">
    <div class="container">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3, // Obtener las últimas 3 entradas
        );
        $query = new WP_Query($args);
        if ($query->have_posts()):
        ?>
            <div class="text-center container_col-3">
                <?php
                while ($query->have_posts()):
                    $query->the_post();
                
                    get_template_part('card_entrada');
                endwhile;
                ?>
            </div>
        <?php
        endif;
        wp_reset_postdata(); // Restablecer datos de publicación
        ?>
    </div>
</section>





