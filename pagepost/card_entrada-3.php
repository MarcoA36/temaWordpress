<div class="row mb-4 box_articulo">
    <div class="col-lg-4 imagen">
        <?php the_post_thumbnail('entradas', array('class' => 'img_responsive')); ?>
    </div>
    <div class="col-lg-8 textos">
        <div class="titulo">
            <?php the_title('<h3>', '</h3>'); ?>
        </div>
        <div class="descripcion">
            <?php the_excerpt(); ?>
        </div>
        <div class="boton">
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leer más</a>
        </div>
    </div>
</div>