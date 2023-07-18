<?php get_header(); ?>
<?php
// Verificar si hay entradas disponibles
if (have_posts()):

    // Ciclo while para recorrer las entradas
    while (have_posts()):
        the_post();
        ?>
        <div class="container mx-auto py-4">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <article class="articulo_container">
                        <header class="articulo_header">
                            <h2>
                                <?php the_title(); ?>
                            </h2>
                            <p class="meta-info">
                                <?php the_author(); ?> -
                                <?php the_date(); ?>
                            </p>
                        </header>

                        <div class="entry-content" class="articulo_contenido">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </div>
                <div class="col-lg-3 col-md-12">
                    <?php 
                    get_sidebar(); 
                    get_template_part( 'seccion_contacto-sidebar' );
                    get_template_part( 'seccion_nosotros-sidebar' );
                    ?>
                    
                </div>
            </div>
        </div>
        <?php
    endwhile; // Fin del ciclo while

endif; // Fin del if have_posts()
?>

</div>
<?php get_footer(); ?>