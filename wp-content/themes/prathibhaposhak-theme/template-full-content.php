<?php
/* Template Name: Full Width Content */
get_header(); ?>

<section class="space-ptb" style="padding-top:30px; padding-bottom:30px;">
  <div class="container">
    <h1 class="title"><?php the_title(); ?></h1>
    <div class="entry-content">
      <?php
      while (have_posts()) { the_post();
        // This prints the actual content (shortcodes + forms)
        the_content();
      }
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
