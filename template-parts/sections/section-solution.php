<div class="background">
    <div class="solutions">
        <div class="solutions__container">
            <div class="solutions__bga">
                <figure class="solutions__figure">
                    <img src="<?php the_field('imagen_seccion_');?>" alt="Soluciones"
                        class="solutions__img">
                </figure>
                <div class="solutions__texts">
                    <div class="solutions__texts--primari">
                        <h2 class="solutions__h2"><?php the_field('titulo_seccion');?></h2>
                        <div class="solutions__p">
                        <?php the_field('descripcion_3');  ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="webinars">
                <div class="solutions__spam"></div>
                <div class="webinars__text">

                    <h2 class="webinars__h2">Webinar Gratuito</h2>
                    <h3 class="webinars__h3">sana tu digestión</h3>
                    <a href="<?php the_field('btn_link_seccion');  ?>" class="webinars__a">¡Ver Video!</a>
                </div>
            </div>
        </div>


    </div>
</div>