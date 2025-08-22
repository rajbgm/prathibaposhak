<section class="inner-banner bg-overlay-black-70 bg-holder"
  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/get-involved.jpg');">
  <div class="container"></div>
</section>

<section class="space-ptb bg-gray" style="padding-top:35px;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h3>Sponsor a Pratibha Poshak Student</h3>
      </div>
    </div>
    <div class="row pt-5">
      <div class="col-sm-4">
        <img src="<?php echo get_template_directory_uri(); ?>/images/sponsorship.jpg" class="img-fluid" alt="Sponsor a Student">
      </div>
      <div class="col-sm-7">
        <p>
          By sponsoring a Pratibha Poshak student you not only change the life course of one student but of an entire
          family. Please spare a few moments and choose to make this difference today. We will keep you updated about
          the student's progress. The cost of supporting one student for the complete 4 year program (9th to 12th) is
          approximately Rs.74,000 (USD 852). You can choose to sponsor one or more students.
        </p>
        <p>
          <a href="<?php echo home_url('/donate'); ?>">
            <button class="btn btn-primary btn-sm">Sponsor a Pratibha Poshak student</button>
          </a>
          <a href="<?php echo get_template_directory_uri(); ?>/pdf/PratibhaPoshak-Cost-PerStudent-Detailed-Break-up.pdf" target="_blank">
            <button class="btn btn-primary btn-sm">Cost per student - Detailed breakup</button>
          </a>
        </p>

        <h4>Sponsor Pre-University College Education</h4>
        <p>
          Education up to the 10th grade in Government and Government-aided schools in India does not involve
          significant expenses. Minor expenses are expected to be met by mentors. However, families of most students
          chosen for this programme cannot afford pre-university Science education and entrance exam coaching (NEET/JEE/CET).
          The total expenses for these two years will be about INR 50,000 (~$600) per student. Sponsored students will
          personally interact with you and share performance updates.
        </p>
        <p>
          <a href="<?php echo home_url('/donate'); ?>">
            <button class="btn btn-primary btn-sm">Sponsor a student's college education</button>
          </a>
        </p>
      </div>
    </div>
  </div>
</section>

<hr>

<section class="space-ptb" style="padding-top:5px;">
  <div class="row">
    <div class="col-sm-12">
      <h4 class="text-center titleStyle1 shadow-sm mb-4">
        Expression of interest for getting involved in this project
      </h4>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10">
        <!-- Formidable Form Embed -->
        <?php echo do_shortcode('[formidable id="3"]'); // Replace with sponsor form ID if different ?>
      </div>
    </div>
  </div>
</section>
