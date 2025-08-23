<?php
/*
Template Name: Gallery (Dynamic)
*/
get_header();
?>

<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image:url('<?php echo esc_url(get_template_directory_uri()); ?>/images/photo-gallery-bg.jpg');">
  <div class="container"><div class="row d-flex justify-content-center"></div></div>
</section>

<section class="space-ptb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10 text-center">
        <div class="section-title"><h2>Our Gallery</h2></div>
      </div>
    </div>

    <?php
    // Build filter buttons in your desired order (slug => label)
    $groups = [
      'all' => 'All',
      'ts'  => 'Talent Search',
      'in'  => 'Induction',
      'tm'  => 'Teaching & Mentoring',
      'rt'  => 'Retreats',
    ];
    ?>

    <div class="row">
      <div class="col-md-12">
        <div class="filters-group mb-lg-4 text-center">
          <?php
echo '<button class="btn-filter active" data-group="all">All</button>';

$terms = get_terms([
  'taxonomy'   => 'gallery_group',
  'hide_empty' => false,
  'orderby'    => 'name',
  'order'      => 'ASC',
]);

if (!is_wp_error($terms)) {
  foreach ($terms as $t) {
    echo '<button class="btn-filter" data-group="' . esc_attr($t->slug) . '">' . esc_html($t->name) . '</button>';
  }
}
?>

        </div>

        <div class="my-shuffle-container columns-3 popup-gallery full-screen row">
          <?php
          // Query all gallery items
          $q = new WP_Query([
            'post_type'      => 'gallery_item',
            'posts_per_page' => -1,
            'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
          ]);

          if ($q->have_posts()):
            while ($q->have_posts()): $q->the_post();

              // Get term slugs for filtering data-groups
              $terms = get_the_terms(get_the_ID(), 'gallery_group');
              $slugs = $terms && !is_wp_error($terms) ? wp_list_pluck($terms, 'slug') : [];
              $data_groups = !empty($slugs) ? '["' . esc_attr(implode('","', $slugs)) . '"]' : '["all"]';

              // ACF fields
              $media_type  = function_exists('get_field') ? (get_field('media_type') ?: 'image') : 'image';
              $video_url   = function_exists('get_field') ? trim((string) get_field('video_url')) : '';
              $lightbox    = function_exists('get_field') ? trim((string) get_field('lightbox_url')) : '';

              // Image sources
              $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
              $full_url  = $lightbox ?: get_the_post_thumbnail_url(get_the_ID(), 'full');

              // For video, use video URL for popup
              $popup_href = ($media_type === 'video' && $video_url) ? $video_url : $full_url;
          ?>
              <div class="grid-item col-lg-4 col-md-6 mb-4" data-groups='<?php echo $data_groups; ?>'>
                <div class="portfolio-item">
                  <div class="position-relative">
                    <?php if ($thumb_url): ?>
                      <img class="img-fluid" src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php else: ?>
                      <div class="bg-light text-center p-5">No Image</div>
                    <?php endif; ?>

                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                      <a class="portfolio-img" 
                         href="<?php echo esc_url($popup_href); ?>" 
                         <?php echo $media_type === 'video' ? 'data-type="iframe"' : ''; ?>>
                        <i class="fas fa-arrows-alt"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          else:
            echo '<p class="text-center">No gallery items yet.</p>';
          endif;
          ?>
        </div>
      </div>
    </div>

    <?php
    // Optional: Featured section title (like your launch-day block)
    // Add this as a normal page content below; or keep static HTML here if you want.
    ?>

    <!-- Optional: Featured Video (from page ACF or hardcoded) -->
    <?php if ($featured = get_field('featured_youtube_url')): ?>
      <div class="row mt-5">
        <div class="col-sm-12 text-center">
          <h4 class="titleStyle1">Video</h4>
          <div class="embed-responsive embed-responsive-16by9" style="max-width: 800px; margin: 0 auto;">
            <iframe class="embed-responsive-item" src="<?php echo esc_url($featured); ?>" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
