<?php
/**
 * Template for displaying single Inspiring Journey posts
 * Filename: single-inspiring_journey.php
 */
get_header();
?>

<section class="inner-banner bg-overlay-black-70 bg-holder" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/background-09.jpg');">
  <div class="container"></div>
</section>

<section class="space-ptb" style="padding-top: 25px; padding-bottom: 30px;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h4 class="text-dark">Triumphs Against All Odds: Inspiring Journeys of Resilience</h4>
      </div>
    </div>
    <div class="row pt-5">
      <div class="col-sm-3">
        <?php if (has_post_thumbnail()) : ?>
          <img src="<?php the_post_thumbnail_url('medium'); ?>" class="img-fluid shadow-sm" style="border-radius: 50%; width: 75%; border: solid 15px #ededed;" />
        <?php endif; ?>
      </div>
      <div class="col-sm-9" style="font-size: 17px;">
        <h5><?php the_title(); ?></h5>
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<section class="space-ptb bg-gray" style="padding-top: 30px;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h4>Also Read Stories of our successful students...</h4>
      </div>
    </div>
    <div class="row pt-lg-3">
      <?php
      $related_posts = new WP_Query(array(
        'post_type' => 'inspiring_journey',
        'posts_per_page' => 4,
        'post__not_in' => array(get_the_ID()),
      ));

      while ($related_posts->have_posts()) : $related_posts->the_post();
      ?>
        <div class="col-sm-3 text-center">
          <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="img-fluid" style="border-radius: 50%; width: 75%; border: solid 15px #ededed;" />
          <?php endif; ?>
          <a href="<?php the_permalink(); ?>">
            <h5><?php the_title(); ?></h5>
          </a>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
