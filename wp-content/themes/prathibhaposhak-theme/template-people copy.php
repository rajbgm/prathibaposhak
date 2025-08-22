<?php
/*
Template Name: People Page CC
*/
get_header();

// Fixed order for sections
$sections = [
  'Founding Members',
  'Board of Advisors',
  'Executive Team',
  'Associates',
  'Our Mentors',
  'Volunteering Teachers',
  'Our Teachers',
  'Internship Students',
];

function pp_get_img_url($img) {
  if (is_array($img)) {
    // prefer large size if available
    if (!empty($img['sizes']['large'])) return $img['sizes']['large'];
    if (!empty($img['url'])) return $img['url'];
  } elseif (is_string($img)) {
    return $img;
  }
  return '';
}

function pp_render_people_section($term_name) {
  $term = get_term_by('name', $term_name, 'people_category');
  if (!$term || is_wp_error($term)) return;

  $q = new WP_Query([
    'post_type'      => 'person',
    'posts_per_page' => -1,
    'orderby'        => ['menu_order' => 'ASC', 'title' => 'ASC'],
    'tax_query'      => [[
      'taxonomy' => 'people_category',
      'field'    => 'term_id',
      'terms'    => $term->term_id,
    ]],
  ]);

  if (!$q->have_posts()) return;

  // Grid layout for teacher-heavy sections
  $is_grid = in_array($term_name, ['Our Teachers', 'Volunteering Teachers'], true);
  ?>
  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="text-center titleStyle1 shadow-sm"><?php echo esc_html($term_name); ?></h4>
        </div>
      </div>

      <?php if ($is_grid): ?>
        <div class="row pt-3">
          <?php while ($q->have_posts()): $q->the_post();
            $img = get_field('profile_image');
            if (!$img && has_post_thumbnail()) {
              $img = ['url' => get_the_post_thumbnail_url(get_the_ID(), 'large')];
            }
            $img_url     = pp_get_img_url($img);
            $designation = get_field('designation');
            $bio         = get_field('short_bio');
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
              <?php if ($img_url): ?>
                <img class="card-img-top" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>">
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title mb-1"><?php the_title(); ?></h5>
                <?php if ($designation): ?>
                  <div class="text-muted mb-2" style="font-size: 0.9rem;"><?php echo esc_html($designation); ?></div>
                <?php endif; ?>
                <div class="card-text">
                  <?php echo $bio ? wp_kses_post($bio) : wp_kses_post(get_the_excerpt()); ?>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <?php while ($q->have_posts()): $q->the_post();
          $img = get_field('profile_image');
          if (!$img && has_post_thumbnail()) {
            $img = ['url' => get_the_post_thumbnail_url(get_the_ID(), 'large')];
          }
          $img_url     = pp_get_img_url($img);
          $designation = get_field('designation');
          $bio         = get_field('short_bio');
        ?>
        <div class="row align-items-center py-4">
          <div class="col-md-4 text-center mb-3 mb-md-0">
            <?php if ($img_url): ?>
              <img class="img-fluid img-border shadow-sm" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>
          </div>
          <div class="col-md-8">
            <h5 class="mb-1"><?php the_title(); ?></h5>
            <?php if ($designation): ?>
              <div class="text-muted mb-2" style="font-size: 0.95rem;"><?php echo esc_html($designation); ?></div>
            <?php endif; ?>
            <div><?php echo $bio ? wp_kses_post($bio) : wp_kses_post(get_the_content()); ?></div>
          </div>
        </div>
        <hr>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>
  <?php
  wp_reset_postdata();
}

// Optional banner (matches your site style)
?>
<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/bg/about-us-background-pg-1.jpg');">
  <div class="container"><div class="row d-flex justify-content-center"></div></div>
</section>

<?php
foreach ($sections as $name) {
  pp_render_people_section($name);
}
get_footer();
