<section class="container-fluid bg-dark text-white seccion seccion_ultimos-articulos-2">
    <div class="container">
        <div class="flex-column text-center py-2 my-2 py-lg-4 my-lg-4">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4, // Obtener las últimas 3 entradas
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    get_template_part('card_entrada-3');
                endwhile;
            endif;
            wp_reset_postdata(); // Restablecer datos de publicación
            ?>
        </div>
    </div>
</section>