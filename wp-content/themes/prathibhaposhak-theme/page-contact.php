<?php
/*
Template Name: Contact Us
*/
get_header();

/** -------------------------------------------------
 *  Settings (edit these two lines)
 *  ------------------------------------------------- */
// Put your Formidable shortcode here:
$form_shortcode = '[formidable id="4"]'; // <-- REPLACE X with your form ID

// Default hero image (used if no Featured Image and no ACF override)
$default_hero = get_template_directory_uri() . '/images/bg/06.jpg';

/** -------------------------------------------------
 *  Optional ACF overrides (free ACF works)
 *  - If you create custom fields on this page:
 *      contact_hero_image (Image or URL)
 *      contact_map_iframe (Text: full <iframe> embed)
 *  ------------------------------------------------- */
$acf_hero  = function_exists('get_field') ? get_field('contact_hero_image') : '';
$acf_map   = function_exists('get_field') ? get_field('contact_map_iframe') : '';

/** Resolve hero background */
$hero = '';
if ($acf_hero) {
  $hero = is_array($acf_hero) ? ($acf_hero['url'] ?? '') : $acf_hero;
}
if (!$hero) {
  $thumb = get_the_post_thumbnail_url(get_the_ID(), 'full');
  $hero = $thumb ?: $default_hero;
}
?>

<!-- Hero -->
<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image:url('<?php echo esc_url($hero); ?>');">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12">
        <div class="text-center">
          <h1 class="text-white"><?php echo esc_html(get_the_title()); ?></h1>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Content -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <!-- Form -->
      <div class="col-lg-7 mb-4 mb-lg-0">
        <h4 class="mb-4">Write to us</h4>
        <?php
          // Render the Formidable form
          if (!empty($form_shortcode)) {
            echo do_shortcode($form_shortcode);
          } else {
            echo '<div class="alert alert-warning">Form not configured yet.</div>';
          }
        ?>
      </div>

      <!-- Addresses / Contact info -->
      <div class="col-lg-4 offset-lg-1">
        <div class="row">
          <div class="col-lg-12">
            <div class="d-flex mb-3 bg-primary p-4 border-radius mb-4 text-white">
              <i class="fas fa-3x fa-map-signs mr-3"></i>
              <div>
                <strong>Rajalakshmi Children Foundation</strong><br>
                Plot No. 3, SPOORTI, Double Road Hanuman Nagar,<br>
                Belagavi – 590001, Karnataka, India
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="d-flex mb-3 bg-primary p-4 border-radius mb-4 text-white">
              <i class="fas fa-3x fa-map-signs mr-3"></i>
              <div>
                <strong>Project Pratibha Poshak</strong><br>
                RCF Sadhana Mandir<br>
                Sector No. 12, Anjaneya Nagar (near Datta Mandir)<br>
                Belagavi – 590016, Karnataka, India
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="d-flex mb-3 bg-light p-4 border-radius mb-4">
              <i class="far fa-3x fa-envelope text-primary mr-3"></i>
              <div class="pt-2">hello@pratibhaposhak.in</div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="d-flex bg-dark p-4 border-radius text-white">
              <i class="fas fa-3x fa-headphones-alt mr-3"></i>
              <div>+(91) 94490 07550<br>+(91) 96069 30204</div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Addresses -->
    </div>
  </div>
</section>

<!-- Map -->
<section class="map">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-sm-12">
        <div class="map h-500">
          <?php
          if ($acf_map) {
            // If you stored a custom iframe via ACF, print it as-is
            echo $acf_map; // trusted field for admins; ensure only admins can edit
          } else {
            // Default embed (replace with your own if needed)
            ?>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3837.5493807404596!2d74.53596017594882!3d15.880263844467326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbf61dc14a3b5b3%3A0x5a1a1f184f56d2bb!2sRajalakshmi%20Children%20Foundation!5e0!3m2!1sen!2sin!4v1683267996472!5m2!1sen!2sin"
              style="width:100%; height:100%;" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen>
            </iframe>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
