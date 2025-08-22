<?php
/*
Template Name: People Page
*/
get_header();

/** =======================
 *  Config: section order
 *  ======================= */
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

/** =======================
 *  Helper: image URL
 *  ======================= */
function pp_get_img_url($img) {
  if (is_array($img)) {
    if (!empty($img['sizes']['large'])) return $img['sizes']['large'];
    if (!empty($img['url'])) return $img['url'];
  } elseif (is_string($img)) {
    return $img;
  }
  return '';
}

/** =======================
 *  Helper: section id
 *  ======================= */
function pp_section_id($name) {
  return sanitize_title($name);
}
?>


<?php
/** =======================
 *  Optional hero banner
 *  ======================= */ ?>
<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/bg/about-us-background-pg-1.jpg');">
  <div class="container"><div class="row d-flex justify-content-center"></div></div>
</section>

<div class="container">
  <nav class="pp-quicknav text-center">
    <?php foreach ($sections as $name): ?>
      <a class="animated4 btn btn-sm rcfBtnNew btn-white mt-4 mr-1 mr-sm-2 " href="#<?php echo esc_attr(pp_section_id($name)); ?>"><?php echo esc_html($name); ?></a>
    <?php endforeach; ?>
  </nav>
</div>

<?php
/** ======================================
 *  Renderer: one section by category name
 *  ====================================== */
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

  $section_id = pp_section_id($term_name);

  /* === SPECIAL: Founding Members (3-col with dashed borders) === */
  if ($term_name === 'Founding Members') { ?>
    <section id="<?php echo esc_attr($section_id); ?>" class="space-ptb bg-overlay-black-10" style="padding-top: 0px; padding-bottom: 5px;">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="text-center titleStyle1 shadow-sm">Founding Members</h4>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <?php
          $i = 0;
          while ($q->have_posts()): $q->the_post();
            $img = get_field('profile_image');
            if (!$img && has_post_thumbnail()) {
              $img = ['url' => get_the_post_thumbnail_url(get_the_ID(), 'large')];
            }
            $img_url     = pp_get_img_url($img);
            $designation = get_field('designation');
            $bio         = get_field('short_bio');

            // dashed right border for first two columns in each 3-col row
            $is_last_in_row = (($i + 1) % 3 === 0);
            $border_style   = $is_last_in_row ? '' : 'border-right: dashed 1px rgba(15, 128, 229, 0.6);';
          ?>
            <div class="col-sm-4" style="<?php echo esc_attr($border_style); ?>">
              <div class="text-center">
                <?php if ($img_url): ?>
                  <img src="<?php echo esc_url($img_url); ?>" class="founder-images shadow-lg pp-img-square" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                <?php endif; ?>
              </div>
              <div>
                <h5 class="text-center pt-3">
                  <?php the_title(); ?><br>
                  <?php if ($designation): echo esc_html($designation); endif; ?>
                </h5>
                <br>
                <p class="text-center p-sm-3 txt-20">
                  <?php echo $bio ? wp_kses_post($bio) : wp_kses_post(get_the_excerpt()); ?>
                </p>
              </div>
            </div>
          <?php
            $i++;
          endwhile; ?>
        </div>
      </div>
    </section>
    <?php
    wp_reset_postdata();
    return;
  }

  // === SPECIAL: Our Teachers (grid with your exact classes)
  if ($term_name === 'Our Teachers') { ?>
    <section id="<?php echo esc_attr($section_id); ?>" class="">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="text-center titleStyle1 shadow-sm">Our Teachers</h4>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <?php while ($q->have_posts()): $q->the_post();
            $img = get_field('profile_image');
            if (!$img && has_post_thumbnail()) $img = ['url' => get_the_post_thumbnail_url(get_the_ID(), 'large')];
            $img_url = pp_get_img_url($img);
            $bio     = get_field('short_bio');
          ?>
          <!-- item START -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="course-item">
              <div class="coures-img teamImageContainer">
                <?php if ($img_url): ?>
                  <img class="img-fluid teamImages shadow-lg pp-img-square" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                <?php endif; ?>
              </div>
              <div class="course-conten">
                <a href="<?php the_permalink(); ?>" class="course-author d-flex align-items-center mb-3">
                  <span class="author-name"><?php the_title(); ?></span>
                </a>
                <div class="course-meta">
                  <ul class="list-unstyled mb-0">
                    <p><?php echo $bio ? wp_kses_post($bio) : wp_kses_post(get_the_excerpt()); ?></p>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- item End -->
          <?php endwhile; ?>
        </div>
      </div>
    </section>
    <?php
    wp_reset_postdata();
    return;
  }

  // === SPECIAL: Internship Students (4-per-row grid: image + name)
  if ($term_name === 'Internship Students') { ?>
    <section id="<?php echo esc_attr($section_id); ?>" class="bg-overlay-black-10 space-ptb" style="padding-top: 0px;">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="text-center titleStyle1 shadow-sm">Internship Students</h4>
        </div>
      </div>
      <div class="container">
        <?php
        $i = 0;
        $opened_row = false;
        while ($q->have_posts()): $q->the_post();
          // open a new row every 4 items
          if ($i % 4 === 0) {
            if ($opened_row) { echo '</div>'; } // close previous row
            echo '<div class="row' . ($i > 0 ? ' pt-4' : '') . '">';
            $opened_row = true;
          }

          $img = get_field('profile_image');
          if (!$img && has_post_thumbnail()) $img = ['url' => get_the_post_thumbnail_url(get_the_ID(), 'large')];
          $img_url = pp_get_img_url($img);
        ?>
          <div class="col-sm-3 text-center">
            <?php if ($img_url): ?>
              <img src="<?php echo esc_url($img_url); ?>" class="internteamImages img-fluid pp-img-square"
                   alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" />
            <?php endif; ?>
            <h6 class="pt-3"><?php the_title(); ?></h6>
          </div>
        <?php
          $i++;
        endwhile;

        // close last row if open
        if ($opened_row) { echo '</div>'; }
        ?>
      </div>
    </section>
    <?php
    wp_reset_postdata();
    return;
  }

  // === SPECIAL: 2-col people-row layout for these terms
  $two_col_terms = [
    'Board of Advisors',
    'Executive Team',
    'Associates',
    'Our Mentors',
    'Volunteering Teachers',
  ];
  if (in_array($term_name, $two_col_terms, true)) { ?>
    <section id="<?php echo esc_attr($section_id); ?>" class="bg-overlay-black-10">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="text-center titleStyle1 shadow-sm"><?php echo esc_html($term_name); ?></h4>
        </div>
      </div>
      <div class="container">
        <?php
        $count = $q->post_count;
        $i = 0;
        while ($q->have_posts()): $q->the_post();
          $img = get_field('profile_image');
          if (!$img && has_post_thumbnail()) {
            $img = ['url' => get_the_post_thumbnail_url(get_the_ID(), 'large')];
          }
          $img_url     = pp_get_img_url($img);
          $designation = get_field('designation');
          $bio         = get_field('short_bio');
        ?>
        <div class="row people-row">
          <div class="col-sm-4 text-center">
            <?php if ($img_url): ?>
              <img src="<?php echo esc_url($img_url); ?>" class="img-border pp-img-square"
                   alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" />
            <?php endif; ?>
          </div>
          <div class="col-sm-8">
            <h5>
              <span><?php the_title(); ?></span>
              <?php if ($designation): ?>
                <br><span style="font-size: 12px;"><?php echo esc_html($designation); ?></span>
              <?php endif; ?>
            </h5>
            <p><?php echo $bio ? wp_kses_post($bio) : wp_kses_post(get_the_content()); ?></p>
          </div>
        </div>
        <?php
          $i++;
          if ($i < $count): ?>
            <hr>
        <?php endif;
        endwhile; ?>
      </div>
    </section>
    <?php
    wp_reset_postdata();
    return;
  }

  // === Fallback (rare)
  ?>
  <section id="<?php echo esc_attr($section_id); ?>" class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="text-center titleStyle1 shadow-sm"><?php echo esc_html($term_name); ?></h4>
        </div>
      </div>
      <div class="row pt-3">
        <?php while ($q->have_posts()): $q->the_post();
          $img = get_field('profile_image');
          if (!$img && has_post_thumbnail()) $img = ['url' => get_the_post_thumbnail_url(get_the_ID(), 'large')];
          $img_url     = pp_get_img_url($img);
          $designation = get_field('designation');
          $bio         = get_field('short_bio');
        ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100 shadow-sm">
            <?php if ($img_url): ?>
              <img class="card-img-top pp-img-square" src="<?php echo esc_url($img_url); ?>"
                   alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
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
    </div>
  </section>
  <?php
  wp_reset_postdata();
}

/** =======================
 *  Render sections
 *  ======================= */
foreach ($sections as $name) {
  pp_render_people_section($name);
}

get_footer();
