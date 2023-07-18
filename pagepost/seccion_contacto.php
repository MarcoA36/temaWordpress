<!-- <section class="container-fluid seccion seccion_contacto bg-dark text-white" id="seccion-contacto">
    <div class="container my-4 p-4">
        <div class="row">
            <div class="col-lg-6 cont_form">
                <form class="form_contacto">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

            </div>


            <div class="col-lg-6 mt-lg-0 mt-4 cont_textos">
                <div class="textos">
                    <p>Olavarria,Buenos Aires,Argentina</p>
                    <p>+54 1143212151</p>
                    <p>plantillawordpress@gmail.com</p>
                    <p>paginawordpress.com</p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="container-fluid seccion seccion_contacto bg-dark text-white" id="seccion-contacto">
    <div class="container my-4 p-4">
        <div class="row">
            <div class="col-lg-6 cont_form">
                <form class="form_contacto" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                    <input type="hidden" name="action" value="enviar_formulario">
                    <?php wp_nonce_field('enviar_formulario_nonce', 'enviar_formulario_nonce'); ?>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>

            <div class="col-lg-6 mt-lg-0 mt-4 cont_textos">
                <div class="textos">
                    <p>Olavarria,Buenos Aires,Argentina</p>
                    <p>+54 1143212151</p>
                    <p>plantillawordpress@gmail.com</p>
                    <p>paginawordpress.com</p>
                </div>
            </div>
        </div>
    </div>
</section>