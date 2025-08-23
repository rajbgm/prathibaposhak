<?php
// taxonomy-resource_category.php
get_header();

$term = get_queried_object();
$term_name = $term ? $term->name : '';
?>

<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image:url('<?php echo esc_url(get_template_directory_uri()); ?>/images/resources-bg.jpg');">
  <div class="container"><div class="row d-flex justify-content-center"></div></div>
</section>

<section class="space-ptb bg-overlay-black-10" style="padding-top:25px;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2><?php echo esc_html($term_name); ?></h2>
      </div>
    </div>

    <style>
      /* makes the whole card clickable */
      .pp-card {
        position: relative;
        overflow: hidden;
      }
      .pp-link-overlay {
        position: absolute;
        inset: 0;              /* top:0; right:0; bottom:0; left:0; */
        z-index: 5;
      }
      .pp-card h5 { margin-bottom: .5rem; }
      .pp-card iframe { width: 95%; border: 0; }
      .pp-card .btn { pointer-events: none; } /* visual only; click goes to overlay link */
    </style>

    <?php
    // Query resources in this subject
    $q = new WP_Query([
      'post_type'      => 'resource',
      'posts_per_page' => -1,
      'orderby'        => ['menu_order' => 'ASC', 'title' => 'ASC'],
      'tax_query'      => [[
        'taxonomy' => 'resource_category',
        'field'    => 'term_id',
        'terms'    => $term->term_id,
      ]],
    ]);

    if ($q->have_posts()):
      echo '<div class="row pt-5">';
      while ($q->have_posts()): $q->the_post();

        // ACF fields
        $type          = get_field('resource_type') ?: 'file';     // file | external | drive
        $file_url      = get_field('file_url');                    // URL or ACF file array
        $external_url  = get_field('external_url');                // URL
        $drive_preview = get_field('drive_preview_url');           // /preview URL for Google Drive
        $short_title   = get_field('short_title') ?: get_the_title();
        $show_preview  = (bool) get_field('show_preview');
        $height        = intval(get_field('preview_height')) ?: 300;

        // Resolve final link
        $final_href = '';
        if ($type === 'file' && $file_url) {
          $final_href = is_array($file_url) ? ($file_url['url'] ?? '') : $file_url;
        } elseif ($type === 'external' && $external_url) {
          $final_href = $external_url;
        } elseif ($type === 'drive' && $drive_preview) {
          $final_href = $drive_preview;
        }
        ?>

        <div class="col-md-3 col-sm-12 mb-4">
          <div class="pdfviewer card shadow-sm h-100 p-3 text-center pp-card">
            <?php if (!empty($final_href)): ?>
              <!-- Full-card clickable overlay -->
              <a class="pp-link-overlay" href="<?php echo esc_url($final_href); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($short_title); ?>"></a>
            <?php endif; ?>

            <h5 class="mb-2"><?php echo esc_html($short_title); ?></h5>

            <?php if ($show_preview && $type === 'drive' && $drive_preview): ?>
              <iframe src="<?php echo esc_url($drive_preview); ?>" style="height:<?php echo $height; ?>px;" class="mb-2"></iframe>

            <?php elseif ($show_preview && $type !== 'drive' && $final_href): ?>
              <iframe src="<?php echo esc_url($final_href); ?>" style="height:<?php echo $height; ?>px;" class="mb-2"></iframe>

            <?php else: ?>
              <?php if (!empty($final_href)): ?>
                <div class="btn btn-primary btn-sm">Open</div>
              <?php else: ?>
                <div class="text-muted">Link coming soon</div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>

        <?php
      endwhile;
      echo '</div>';
      wp_reset_postdata();
    else:
      echo '<div class="row pt-5"><div class="col-sm-12"><p>No resources found in this subject yet.</p></div></div>';
    endif;
    ?>
  </div>
</section>

<?php get_footer(); ?>
