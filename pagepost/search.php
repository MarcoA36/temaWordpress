<?php get_header(); ?>

<section class="container-fluid  seccion seccion_ultimos-articulos">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <h1>Resultados de la búsqueda para "
                    <?php echo get_search_query(); ?>"
                </h1>
                <div class="row gutter-5 text-center container_articulos-secundarios">
                    <?php if (have_posts()):
                        while (have_posts()):
                            the_post(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 box_articulo">
                                <div class="imagen">
                                    <?php the_post_thumbnail('entradas', array('class' => 'img_responsive')); ?>
                                </div>
                                <div class="titulo">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3>
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>
                                </div>
                                <div class="descripcion">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No se encontraron resultados para "
                            <?php echo get_search_query(); ?>".
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <?php
                get_sidebar();
                get_template_part('seccion_contacto-sidebar');
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>