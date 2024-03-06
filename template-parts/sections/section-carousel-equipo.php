<div class="background background--team">
    <div class="team">
        <h2 class="team__h2">El equipo que hizo esto posible:</h2>
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php
            $items = get_field('equipo');
            foreach ($items as $item) : ?>
                    <li class="glide__slide item">
                        <figure class="item__figure">
                            <img src="<?php echo $item['imagen'] ?>" alt="" class="item__image">
                        </figure>
                        <p class="item__p"><?php echo $item['nombre'] ?></p>
                        <figure class="item__figure--logo">
                            <img src="<?php echo $item['logo'] ?>" alt="" class="item__image--logo">
                        </figure>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1"></button>
                <button class="glide__bullet" data-glide-dir="=2"></button>
                <button class="glide__bullet" data-glide-dir="=3"></button>
                <button class="glide__bullet" data-glide-dir="=4"></button>
            </div>
        </div>
    </div>
</div>