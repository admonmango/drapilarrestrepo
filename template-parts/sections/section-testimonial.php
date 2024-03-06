<div class="testimonial">
    <div class="testimonial__content">
        <h2 class="testimonial__h2">Testimonios</h2>
        <div class="slider" id="sliders">
            <?php $testimonials = get_field('testimonios');
              foreach ($testimonials as $testimonial) :  ?>

            <div class="testimonial__container">
                <h3 class="testimonial__category">- <?php echo  $testimonial["title"]; ?> -</h3>
                <p class="testimonial__text"><?php echo  $testimonial["description"]; ?></p>
                <a target="_blank" href="<?php echo  $testimonial["url"];?>" class="testimonial__url">¡Ver
                    Video!</a>
            </div>

            <?php endforeach; ?>
            <div class="controls">
                <a class="controls__btn--prev" id="prevBtn"></a>
                <a class="controls__btn" id="nextBtn"></a>
            </div>
        </div>
    </div>

</div>