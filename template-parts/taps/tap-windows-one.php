<?php

?>

<div class="tap-one">
    <ul class="tap-one__tips">
        <?php
        $tips = get_field('items');
        foreach ($tips as $tip) : ?>
            <li>
                <p> <?php echo  $tip['descripcion_']; ?></p>
                <img src="<?php echo get_template_directory_uri() . '/src/img/cruz-01.png'; ?>" alt="Logo">
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="tap-one__titles">
        <h2><?php the_field('titulo_sana'); ?></h2>
        <a href="<?php the_field('btn_link'); ?>"> ¡Haz el test aquí!</a>
    </div>
    <div class="tap-one__ribbon">
        <h2>
            <?php the_field('titulo_no_estas'); ?>
        </h2>
        <h4>
            <?php the_field('descripcion_titulo'); ?>
        </h4>
    </div>
    <div>
        <?php get_template_part('template-parts/sections/section', 'solution'); ?>
    </div>
    <div class="tap-one__packages">
        <h2>
            <?php the_field('titulo_paquete'); ?>
        </h2>
        <div class="tap-one__wrapper-package">

            <div class="package-one">
                <?php $custom = get_field('plan_personalizado');  ?>
                <div class="package-one__container">
                    <h3> <?php echo $custom['name_package'] ?></h3>
                    <p><?php echo $custom['subtitulo'] ?></p>
                </div>
                <ul>
                    <?php
                    $custom_items = $custom['items_plan'];
                    foreach ($custom_items as   $custom_item) : ?>
                        <li>
                            <img src="<?php echo get_template_directory_uri() . '/src/img/check-mark-32.png'; ?>" alt="Logo">
                            <p><?php echo $custom_item['item_plan'] ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="package-one__btns">
                    <button id="btn-pop-up">¡Adquirir programa!</button>
                    <div class="package-one__btns--program" > ¡ver contenido del programa!</div>
                </div>
            </div>
            <div class="package-one package-two">
                <?php $custom = get_field('plan_apoyo_virtual');  ?>
                <div class="package-one__container">
                    <h3> <?php echo $custom['name_package'] ?></h3>
                    <p><?php echo $custom['subtitulo'] ?></p>
                </div>
                <div class="package-one__items">
                    <ul>
                        <?php
                        $custom_items = $custom['items_plan'];
                        foreach ($custom_items as   $custom_item) : ?>
                            <li>
                                <img src="<?php echo get_template_directory_uri() . '/src/img/check-mark-32.png'; ?>" alt="Logo">
                                <p><?php echo $custom_item['item_plan'] ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="package-one__btns">
                        <a href="<?php echo $custom['btn_plan'] ?>">¡Adquirir programa!</a>
                        <div class="package-one__btns--program" > ¡ver contenido del programa!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="window" style="display:none;">
        <h3><?php the_field('title_pop_up'); ?></h3>
        <ul>
            <?php
            $item_pop_up = get_field('item_pop_up');
            foreach ($item_pop_up as $item_pop) : ?>
                <li>
                    <img src="<?php echo get_template_directory_uri() . '/src/img/cruz-01.png'; ?>" alt="Logo">
                    <p><?php echo $item_pop['title'] ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <p class="terminos_btn"><?php the_field('texto_terminos_y_condiciones'); ?></p>
        <div class="btn_pop-up">
            <a href="/cart/?add-to-cart=<?php the_field('id_del_producto'); ?>">Acepto</a>
            <button id="cerrar-ventana">No acepto</button>

        </div>
    </div>
</div>


<?php get_template_part('template-parts/sections/section', 'testimonial'); ?>
<?php get_template_part('template-parts/sections/section', 'carousel-equipo'); ?>