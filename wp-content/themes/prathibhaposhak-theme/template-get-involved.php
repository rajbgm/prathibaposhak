<?php
/*
Template Name: Get Involved
*/
get_header();

/** ——— Helpers ——— */

/** Return a square (pp_square) or large URL from an ACF image array or string */
function gi_img_url($img, $fallback = '') {
  if (is_array($img)) {
    // Prefer exact size via WP attachment id
    if (!empty($img['ID'])) {
      $square = wp_get_attachment_image_url($img['ID'], 'pp_square');
      if ($square) return $square;
      $large = wp_get_attachment_image_url($img['ID'], 'large');
      if ($large) return $large;
    }
    if (!empty($img['sizes']['pp_square'])) return $img['sizes']['pp_square'];
    if (!empty($img['sizes']['large'])) return $img['sizes']['large'];
    if (!empty($img['url'])) return $img['url'];
  }
  if (is_string($img) && $img) return $img;
  return $fallback;
}

/** Find a page by path (slug) and return its permalink; fallback to guessed URL */
function gi_page_link($slug) {
  $slug = trim($slug, "/");
  $page = get_page_by_path($slug);
  if ($page) return get_permalink($page->ID);
  return home_url('/' . $slug . '/'); // fallback
}

/** Safely read an ACF field if ACF exists */
function gi_field($key, $default = '', $context = null) {
  if (function_exists('get_field')) {
    $val = get_field($key, $context);
    if (!empty($val)) return $val;
  }
  return $default;
}

/** Defaults from your static HTML */
$theme_uri   = get_template_directory_uri();
$hero_fallback = $theme_uri . '/images/get-involved.jpg';
$donate_url = trailingslashit( get_stylesheet_directory_uri() ) . 'ccav/donate_step1.php';

$defaults_ctas = [
  [
    'title'   => 'Be a Mentor',
    'image'   => $theme_uri . '/images/mentorship.jpg',
    'href'    => gi_page_link('mentorship'),
    'new_tab' => false,
  ],
  [
    'title'   => 'Be a Teacher',
    'image'   => $theme_uri . '/images/teacher.jpg',
    'href'    => gi_page_link('teacher'),
    'new_tab' => false,
  ],
  [
    'title'   => 'Sponsor a Student',
    'image'   => $theme_uri . '/images/sponsorship.jpg',
    'href'    => gi_page_link('sponsor'),
    'new_tab' => false,
  ],
  [
    'title'   => 'Join as Intern',
    'image'   => $theme_uri . '/images/internship.jpg',
    'href'    => gi_page_link('join-as-intern'),
    'new_tab' => false,
  ],
  [
    'title'   => 'Donate',
    'image'   => $theme_uri . '/images/donate.jpg',
    'href'    => $donate_url,
    'new_tab' => false,
  ],
];

/** Pull ACF overrides if present */
$hero_image = gi_field('hero_image', '');
$hero_url   = gi_img_url($hero_image, $hero_fallback);

$intro_title = gi_field('intro_title', 'Get Involved with Us');
$intro_text  = gi_field('intro_text',
  'We welcome mentors, teachers, sponsors, interns and supporters to join hands with us. Your involvement helps us nurture talent and expand opportunities for students.'
);

$ctas = $defaults_ctas;
if (function_exists('have_rows') && have_rows('ctas')) {
  $ctas = [];
  while (have_rows('ctas')) { the_row();
    $title   = gi_field('cta_title', '');
    $image   = gi_field('cta_image', '');
    $page    = function_exists('get_sub_field') ? get_sub_field('cta_page') : null; // optional Page link field
    $link    = gi_field('cta_link', '');
    $new_tab = (bool) gi_field('cta_new_tab', false);

    $href = '';
    if ($page) {
      if (is_array($page) && !empty($page['ID']))      $href = get_permalink($page['ID']);
      elseif (is_numeric($page))                        $href = get_permalink((int)$page);
      elseif (is_string($page))                         $href = gi_page_link($page);
    }
    if (!$href && $link) $href = $link;

    if (!$title || !$href) continue; // skip incomplete rows

    $ctas[] = [
      'title'   => $title,
      'image'   => gi_img_url($image),
      'href'    => $href,
      'new_tab' => $new_tab,
    ];
  }
}

/** ——— Styles (local + minimal) ——— */
?>
<style>
  .gi-card img { width: 60%; aspect-ratio: 1/1; object-fit: cover; }
  .gi-card .gi-title { font-weight: 600; }
  .gi-card a { text-decoration: none; }
</style>

<!-- Hero -->
<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image: url('<?php echo esc_url($hero_url); ?>');">
  <div class="container"><div class="row d-flex justify-content-center"></div></div>
</section>

<!-- Intro -->
<section class="space-ptb" style="padding-top: 25px; padding-bottom: 15px;">
  <div class="container">
    <div class="row pb-1">
      <div class="col-lg-12">
        <h2 class="title"><?php echo esc_html($intro_title); ?></h2>
      </div>
      <div class="col-lg-10">
        <p><?php echo wp_kses_post($intro_text); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- Join Hands With Us -->
<section class="space-ptb" style="padding-top: 10px; padding-bottom: 30px;">
  <div class="container">
    <div class="row pb-1">
      <div class="col-lg-12">
        <h3 class="title">Join Hands With Us</h3>
      </div>
    </div>

    <?php
      // Render first row: up to 3 items, second row: the rest
      $row1 = array_slice($ctas, 0, 3);
      $row2 = array_slice($ctas, 3);

      $render_row = function($items) {
        if (empty($items)) return;
        echo '<div class="row">';
        foreach ($items as $item) {
          $href    = $item['href'];
          $title   = $item['title'];
          $img     = $item['image'];
          $new_tab = !empty($item['new_tab']);
          $target  = $new_tab ? ' target="_blank" rel="noopener"' : '';
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="gi-card h-100">
              <a href="<?php echo esc_url($href); ?>"<?php echo $target; ?>>
                <?php if ($img): ?>
                  <img class="img-fluid rounded"
                    src="<?php echo esc_url($img); ?>"
                    alt="<?php echo esc_attr($title); ?>"
                    loading="lazy" decoding="async">
                <?php endif; ?>
                <h4 class="mt-3 text-left gi-title text-dark"><?php echo esc_html($title); ?></h4>
              </a>
            </div>
          </div>
          <?php
        }
        echo '</div>';
      };

      $render_row($row1);
      if (!empty($row2)) {
        echo '<div class="pt-2"></div>';
        $render_row($row2);
      }
    ?>
  </div>
</section>

<?php get_footer(); ?>
