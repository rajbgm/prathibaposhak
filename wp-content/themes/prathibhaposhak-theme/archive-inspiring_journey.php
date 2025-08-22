<?php get_header(); ?>

<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mb-4 text-center">
        <h2 class="title">Triumphs Against All Odds: Inspiring Journeys of Resilience</h2>
      </div>
    </div>

    <div class="row">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="events h-100">
            <div class="events-img">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', ['class' => 'img-fluid border-0']); ?>
              </a>
            </div>
            <div class="events-content p-4">
              <a href="<?php the_permalink(); ?>" class="text-dark h5"><?php the_title(); ?></a>
              <p class="text-dark mb-0"><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
              <br>
              <a class="mt-4" href="<?php the_permalink(); ?>">Read more..</a>
            </div>
          </div>
        </div>
      <?php endwhile; else: ?>
        <p>No inspiring journeys found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
