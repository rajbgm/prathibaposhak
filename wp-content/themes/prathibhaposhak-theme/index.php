<?php get_header(); ?>

<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="mb-5">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
          </div>
        <?php endwhile; else: ?>
          <p>No posts found.</p>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
