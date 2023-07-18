<a href="<?php the_permalink(); ?>" class="box_articulo-2">
    <!-- <div class="col-lg-4 col-md-6 col-sm-12 mb-4 box_articulo"> -->
    <div class="imagen">
        <?php the_post_thumbnail('entradas', array('class' => 'img_responsive')); ?>
    </div>
    <div class="textos">
        <div class="titulo">
            <h3>
                <?php the_title(); ?>
            </h3>
        </div>
        <div class="descripcion">
            <?php the_excerpt(); ?>
        </div>
    </div>
    <!-- </div> -->
</a>