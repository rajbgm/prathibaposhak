<?php
/*
Template Name: Peoples old Page
*/
get_header();
?>

<!--=================================
  inner-header -->
<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image: url('<?php the_field('header_bg_image'); ?>'); background-size: cover; background-position: center;">
  <div class="container">
    <div class="row d-flex justify-content-center"></div>
  </div>
</section>
<!--=================================
  inner-header -->

<!--=================================
  people listing -->
<section class="space-ptb bg" style="padding-top: 35px; padding-bottom: 25px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="mb-4"><?php the_field('people_main_heading'); ?></h2>
      </div>
    </div>

    <?php
    // Define the categories
    $categories = [
      'Founding Members',
      'Board of Advisors',
      'Executive Team',
      'Associates',
      'Our Mentors',
      'Volunteering Teachers',
      'Our Teachers',
      'Internship Students'
    ];

    foreach ($categories as $category) :

      echo "<h3 style='color: red;'>Checking: $category</h3>";

      $args = [
        'post_type' => 'person',
        'posts_per_page' => -1,
        'tax_query' => [
          [
            'taxonomy' => 'people_category',
            'field'    => 'name',
            'terms'    => $category,
          ]
        ]
      ];

      $query = new WP_Query($args);

      echo '<p style="color: orange;">Found posts: ' . $query->found_posts . '</p>';

      if ($query->have_posts()) :
    ?>
        <div class="mt-5">
          <div class="row">
            <div class="col-md-12">
              <h4 class="mb-3"><?php echo esc_html($category); ?></h4>
            </div>
          </div>
          <div class="row">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
              <div class="col-md-3 text-center mb-4">
                <?php $img = get_field('profile_image'); ?>
                <?php if ($img) : ?>
                  <img src="<?php echo esc_url($img['url']); ?>" class="img-fluid rounded-circle mb-2" alt="<?php the_title(); ?>" style="max-width: 150px;">
                <?php endif; ?>
                <h6><?php the_title(); ?></h6>
                <p><?php the_field('designation'); ?></p>
                <?php if (get_field('linkedin_url')) : ?>
                  <a href="<?php the_field('linkedin_url'); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
    <?php
      endif;
      wp_reset_postdata();
    endforeach;
    ?>

    <hr>

    <!-- RAW DEBUG DUMP -->
    <h3 style="color: green;">Dumping all people posts for testing</h3>
    <?php
    $dump_query = new WP_Query([
      'post_type' => 'person',
      'posts_per_page' => -1
    ]);

    if ($dump_query->have_posts()) :
      while ($dump_query->have_posts()) : $dump_query->the_post();
        echo '<h4>' . get_the_title() . '</h4>';
        echo '<p>Categories: ';
        $terms = get_the_terms(get_the_ID(), 'people_category');
        if ($terms && !is_wp_error($terms)) {
          foreach ($terms as $term) {
            echo $term->name . ' ';
          }
        } else {
          echo 'None';
        }
        echo '</p>';
      endwhile;
    else :
      echo "<p style='color: red;'>NO PERSON POSTS FOUND</p>";
    endif;
    wp_reset_postdata();
    ?>

  </div>
</section>

<?php get_footer(); ?>
