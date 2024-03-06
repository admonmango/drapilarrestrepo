<?php /* Template Name: Sana tu digestion */

get_header(); ?>

<main class="sana">
  <div class="sana__logo">
    <img src="<?php the_field('logo_del_curso'); ?>" alt="">
  </div>
  <section class="sana__banner">
    <img src="<?php the_field('banner_principal'); ?>" alt="">
  </section>
  <section class="sana__ribbon">
    <h2>"<?php the_field('frase'); ?>"</h2>
    <p>Hipócrates</p>
  </section>

  <nav class="sana__nav">
    <div class="sana__wrappper_">
      <button id="tab1" class="active">Visión General</button>
      <button id="tab2">Contenido del curso </button>
      <!-- <button id="tab3">Recetas Nuestros Aliados</button> -->
    </div>
  </nav>
  <section class="sana__main-content">
    <section id="content1" class="active">
      <?php get_template_part( 'template-parts/taps/tap', 'windows-one' ); ?>
    </section>
    <section id="content2">
        <?php get_template_part( 'template-parts/taps/tap', 'windows-two' ); ?>
    </section>
    <!-- <section id="content3">
        <?php // get_template_part( 'template-parts/taps/tap', 'windows-tree' ); ?>
    </section> -->
  </section>
     
</main>
<?php
get_footer();
