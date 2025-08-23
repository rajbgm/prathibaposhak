<?php
/*
Template Name: Resources (Dynamic)
*/
get_header();
?>

<!-- Hero / Banner -->
<section class="inner-banner bg-overlay-black-70 bg-holder" style="background-image:url('<?php echo esc_url(get_template_directory_uri()); ?>/images/resources-bg.jpg');">
  <div class="container"><div class="row d-flex justify-content-center"></div></div>
</section>

<section class="space-ptb bg-overlay-black-10" style="padding-top:25px;">
  <div class="container">

    <!-- Page Title -->
    <div class="row">
      <div class="col-sm-12">
        <h2 class="mb-0"><?php echo esc_html(get_the_title()); ?></h2>
      </div>
    </div>

    <?php
    // Fetch all resource subjects (taxonomy terms)
    $terms = get_terms([
      'taxonomy'   => 'resource_category',
      'hide_empty' => false,
      'orderby'    => 'name',
      'order'      => 'ASC',
    ]);

    if (!is_wp_error($terms) && !empty($terms)) : ?>
      <div class="row pt-4">
        <?php foreach ($terms as $term) :
          $term_link = get_term_link($term);
          if (is_wp_error($term_link)) { continue; }

          // ACF term fields (both ACF styles supported)
          $tile_image = function_exists('get_field')
            ? ( get_field('tile_image', 'resource_category_'.$term->term_id) ?: get_field('tile_image', $term) )
            : null;

          $title_override = function_exists('get_field')
            ? ( get_field('tile_title', 'resource_category_'.$term->term_id) ?: get_field('tile_title', $term) )
            : '';

          $tile_title = $title_override ? $title_override : $term->name;

          // Fallback image (optional): adjust to your theme’s path
          $fallback_img = get_template_directory_uri() . '/images/gallery/placeholder-tile.jpg';
          $img_url = '';
          if (is_array($tile_image) && !empty($tile_image['sizes']['large'])) {
            $img_url = $tile_image['sizes']['large'];
          } elseif (is_array($tile_image) && !empty($tile_image['url'])) {
            $img_url = $tile_image['url'];
          } elseif (is_string($tile_image) && !empty($tile_image)) {
            $img_url = $tile_image;
          } else {
            $img_url = $fallback_img;
          }
          ?>
          <!-- Tile -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="course-item">
              <div class="coures-img">
                <a href="<?php echo esc_url($term_link); ?>">
                  <img class="img-fluid" src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($tile_title); ?>">
                </a>
              </div>
              <div class="course-conten">
                <h5 class="mb-3">
                  <a href="<?php echo esc_url($term_link); ?>">
                    <?php echo esc_html($tile_title); ?>
                  </a>
                </h5>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <div class="row pt-4"><div class="col-sm-12"><p>No subjects yet.</p></div></div>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
