<?php
/**
 * Template Name: About Us Page
 */
get_header(); 
?>

<!-- Banner Section -->
<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image: url('<?php the_field('banner_image'); ?>');">
  <div class="container">
    <div class="row d-flex justify-content-center"></div>
  </div>
</section>


<!-- About Section -->
<section class="space-ptb bg" style="padding-bottom: 25px;padding-top: 35px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 pp-introduction-abtus">
        <img src="<?php the_field('about_pr'); ?>" style="width:25%;" />
      </div>
      <div class="col-md-12 pp-introduction-abtus">
        <?php the_field('about_prathibhaposhak_text1'); ?>
      </div>
      <div class="col-md-12 pp-introduction-abtus pt-3">
        <?php the_field('about_prathibhaposhak_text2'); ?>
      </div>
    </div>
  </div>
</section>

<section class="space-ptb bg-gray" style="padding-top: 25px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center pt-2">
          <h4> <?php the_field('Pratibha_Poshak_Process_at_a_Glance_Heading'); ?></h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="<?php the_field('pratibha_poshak_process_at_a_glance'); ?>" style="width: 70%;">
        </div>
      </div>
      <div class="row pt-5">
        <div class="col-md-12 pt-3">
          <?php the_field('group1_text'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="<?php the_field('group1_image1'); ?>" style="width: 90%;">
        </div>
        <div class="col-sm-6 pt-6">
          <?php the_field('group1_text2'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 pt-6">
          <?php the_field('group1_text3'); ?>
        </div>
        <div class="col-md-6">
          <img src="<?php the_field('group1_image2'); ?>" style="width: 90%;">
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <img src="<?php the_field('group1_image3'); ?>" style="width: 90%;">
        </div>
        <div class="col-md-6 pt-6">
          <?php the_field('group1_text4'); ?>
        </div>

      </div>

      <div class="row">
        <div class="col-lg-12">

        </div>
      </div>

    </div>
  </section>

  <section class="space-ptb" style="padding-bottom: 25px;padding-top: 35px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h4><?php the_field('cradle_of_true_learning'); ?></h4>
        </div>
      </div>
      <div class="row pt-6">
        <div class="col-md-7 text-center">
          <img src="<?php the_field('cradle_of_true_learning_image'); ?>" style="width: 95%;" />
        </div>
        <div class="col-md-5">
          <?php the_field('cradle_of_true_learning_text'); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- History of Pratibha Poshak -->
<section class="space-ptb bg-gray" style="padding-top: 25px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title mb-4">
          <h4 class="title text-center">History of Pratibha Poshak</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <img src="<?php the_field('history_of_pratibha_poshak_image'); ?>" style="width:90%;" />
      </div>
      <div class="col-lg-6 pt-4">
        <?php the_field('history_of_pratibha_poshak_text'); ?>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>
