<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/get-involved.jpg');">
  <div class="container"></div>
</section>

<section class="space-ptb bg-gray" style="padding:20px 0px 10px 0px;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h3>Internship</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <img src="<?php echo get_template_directory_uri(); ?>/images/internship.jpg" class="img-fluid" alt="Join as Intern">
      </div>
      <div class="col-sm-6">
        <h4>Apply for Internship</h4>
        <?php echo do_shortcode('[formidable id="X"]'); // Replace X with your Form ID ?>
      </div>
    </div>
  </div>
</section>
