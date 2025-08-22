<?php get_header(); ?>

<!--=================================
    Banner -->
  

  <section class="hero-banner" style="background-image: url('<?php echo esc_url(get_field('banner_image')['url']); ?>'); background-size: cover; background-position: center;">
  <div class="container text-center text-white py-5">
    <h1><?php the_field('banner_title'); ?></h1>
    <p><?php the_field('banner_description'); ?></p>
    <?php if (get_field('button_url')): ?>
      <a href="<?php the_field('button_url'); ?>" class="btn btn-primary">
        <?php the_field('button_text'); ?>
      </a>
    <?php endif; ?>
  </div>
</section>
  <!--=================================
    Banner -->

  <!-- About Pratibha Poshak-->
  <div class="row">
    <div class="col-md-12 pp-introduction">
      <div class="container">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bg/pratibha-poshak-aboutus.svg" />
        <div class="col-md-12">
          Countless children possessing the talent, tenacity, and passion to pursue studies in Mathematics, Science,
          Engineering, or Medicine are unjustly deprived of quality education, guidance, and financial support. Pratibha
          Poshak aims to bridge this gap by identifying exceptionally gifted students, even from remote rural areas and
          economically backward urban areas, and digitally connecting them with mentors and teachers, enabling access to
          top-notch online education. Pratibha Poshak is an initiative of <a
            href="https://www.rajalakshmifoundation.in/" class="text-white" target="_blank"><u>Rajalakshmi Children
              Foundation.</u></a>
        </div>
      </div>

    </div>
  </div>
  <!-- About Pratibha Poshak-->

  <!--Inspiring Journeys-->
  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="title">
            Triumphs Against All Odds: Inspiring Journeys of Resilience
          </h2>
        </div>
      </div>
      <div class="row pt-4">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="events  h-100">
            <div class="events-img">
              <a href="inspiring-journey-of-priya-bennalamath.html">
                <img class="img-fluid border-0" src="<?php echo get_template_directory_uri(); ?>/images/events/priya.jpg" alt="">
              </a>
            </div>
            <div class="events-content p-4">
              <a href="inspiring-journey-of-priya-bennalamath.html" class="text-dark h5">Conquering All Odds with Unyielding Dedication</a>
              <p class="text-dark mb-0">Priya was studying in 7th grade in Govt Primary School, Mahantesh Nagar, when she was selected for RCF’s talent nurturing program. Priya was a bright and thoughtful kid. Her parents had almost no formal education. Priya’s father did manual labour of digging trenches, and her mother worked as a household cook.

                Priya attended RCF’s weekend classes for 2 years; she was very meticulous in her academic work. After completing 10th, Priya was selected for the SAADHANA Prakalpa ...</p>
              <br> <a class="mt-4" href="inspiring-journey-of-priya-bennalamath.html">Read more..</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="events h-100">
            <div class="events-img">
              <a href="inspiring-journey-of-vishal.html">
                <img class="img-fluid border-0" src="<?php echo get_template_directory_uri(); ?>/images/events/Vishalin.jpg" alt="">
              </a>
            </div>
            <div class="events-content p-4">
              <a href="inspiring-journey-of-vishal.html" class="text-dark h5">Dreams Planted, Futures Blooming</a>
              <p class="text-dark mb-0">Vishal Vaddar’s journey began in the community of Waddar Chavani in Belgaum, where he grew up as part of a family of five. His father held a job in a private company, while his mother balanced many challenges as a housemaid to support the family. Life was often difficult, yet Vishal’s home was filled with love and dreams for a brighter future. Despite limited means, his parents instilled in him the values of resilience and determination, encouraging him to chase his ambitions, however distant they might seem.</p><br>
              <a class="mt-4" href="inspiring-journey-of-vishal.html">Read more..</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="events h-100">
            <div class="events-img">
              <a href="inspiring-journey-of-deepa.html">
                <img class="img-fluid border-0" src="<?php echo get_template_directory_uri(); ?>/images/events/deepa.jpg" alt="">
              </a>
            </div>
            <div class="events-content p-4">
              <a href="inspiring-journey-of-deepa.html" class="text-dark h5">An Avid Programmer from Waddar Chavani</a>
              <p class="text-dark mb-0">Meet Deepa Hugar, a resilient student from Govt School in Vantamuri Colony, Belgaum. Despite facing early adversity with the loss of her father, Deepa's determination and talent shone through when she was selected for our talent-nurture program while studying in the 7th grade. To support her family, she assisted her mother in crafting beautiful flower garlands, contributing to the household income. Undeterred by the challenges of commuting from Kalkambh village to school via public transport, Deepa's dedication to her studies and exceptiona</p><br>
              <a class="mt-4" href="inspiring-journey-of-deepa.html">Read more..</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-12 align-content-center text-center">
          <a href="allstudentstories.html" class="btn btn-primary btn-roundup">Read More stories</a>
        </div>
      </div>
    </div>
  </section>

  <!--Recent Updates-->

  <section class="space-ptb"
    style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bg/recent-updates.jpg); background-size: cover; background-position: center center; padding-top:25px; padding-bottom: 15px;">
    <div class="container pb-4">
      <div class="row pb-1">
        <div class="col-lg-12">
          <h2 class="title">
            Recent Updates  <br> 
          </h2>
        </div>
      </div>
      <div class="row pb-4 ">
        <div class="col-lg-4 col-md-6">
          <div class="events  h-100">
            <div class="events-img">
              <img class="img-fluid border-0" src="<?php echo get_template_directory_uri(); ?>/images/recent_posts/National_mathematics_day2024.jpg" alt="Natinal Mathematics day 2024">
            </div>
            <div class="events-content p-4">
              <a href="National-Mathematics-Day-2024.html" class="text-dark h5">Natinal Mathematics day 2024</a> <br><br>
              <p class="text-dark mb-0">On December 23rd, Rajalakshmi Children Foundation organized a unique celebration of National Mathematics Day at Kanabargi Government High School, Belagavi, to honor the legacy of Srinivasa Ramanujan. The event aimed to make Mathematics enjoyable through outdoor games and experiential learning Students from seven schools in Belagavi participated in various activities. The highlight was an array of mathematics-related games, such as constructing angles, solving linear equations, and calculating ...</p>
              <br> <a class="mt-4" href="National-Mathematics-Day-2024.html">Read more..</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="events  h-100">
            <div class="events-img">
              <img class="img-fluid border-0" src="<?php echo get_template_directory_uri(); ?>/images/recent_posts/RCF Pratibha Poshak Launch Chikkodi 2024.jpg" alt="RCF Pratibha Poshak Launch Chikkodi 2024">
            </div>
            <div class="events-content p-4">
              <a href="RCF-Pratibha-Poshak-Launch-Chikkodi-2024.html" class="text-dark h5">RCF Pratibha Poshak Launch Chikkodi 2024</a> <br><br>
              <p class="text-dark mb-0">The foundation of a prosperous nation lies in the quality of its education. Empowering minds today paves the way for a brighter tomorrow. At Rajalakshmi Children Foundation, we believe in the power of quality education. On 14th September, with the blessings of Shri Shivalingeshwar Mahaswamiji of Sri Duradundeshwara Matha Nidasoshi, we distributed 52 tablet PCs to talented underprivileged students from Chikkodi...</p>
              <br> <a class="mt-4" href="RCF-Pratibha-Poshak-Launch-Chikkodi-2024.html">Read more..</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="events  h-100">
            <div class="events-img">
              <img class="img-fluid border-0" src="<?php echo get_template_directory_uri(); ?>/images/recent_posts/RCF Pratibha Poshak Launch Dharwad, Gadag & Haveri  2024.jpg" alt="RCF Pratibha Poshak Launch Dharwad, Gadag & Haveri  2024.">
            </div>
            <div class="events-content p-4">
              <a href="RCF-Pratibha-Poshak-Launch-Dharwad-Gadag-Haveri-2024.html" class="text-dark h5">RCF Pratibha Poshak Launch Dharwad, Gadag & Haveri  2024.</a> <br> <br>
              <p class="text-dark mb-0">A Sunday, 29th Sep 2024, well spent - Launch programme of Pratibha Poshak for Dharwad, Gadag & Haveri districts at Deshpande Skilling, Hubballi Fifty students enrolled after a meticulous selection process to identify talented students from needy families. Tech enabled through Samsung Tab A9+5G, monitored through strict parental controls & high quality lessons in Maths, Science, English & Analytical skills delivered by expert teachers...</p>
              <br> <a class="mt-4" href="RCF-Pratibha-Poshak-Launch-Dharwad-Gadag-Haveri-2024.html">Read more..</a>
            </div>
          </div>
        </div>

      </div>

      <div class="row align-items-center">
        <div class="col-lg-12 align-content-center text-center">
          <a href="latestupdates.html" class="btn btn-primary btn-roundup">Read More Updates</a>
        </div>
      </div>
    </div>
  </section>

  <section class="space-ptb " style="padding-top:30px;">
    <div class="row pt-4">
      <div class="col-lg-12 text-center">
        <h3 class="title">
          Join Hands With Us
        </h3>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-4 text-center">
          <a href="mentorship.html"><img src="<?php echo get_template_directory_uri(); ?>/images/mentorship.jpg" style="width: 70%;" />
            <h4> Volunteer as a Mentor </h4>
          </a>
        </div>
        <div class="col-sm-4 text-center">
          <a href="teacher.html"><img src="<?php echo get_template_directory_uri(); ?>/images/teacher.jpg" style="width: 70%;" />
            <h4>Volunteer as a Teacher</h4>
          </a>
        </div>
        <div class="col-sm-4 text-center">
          <a href="sponsor.html"><img src="<?php echo get_template_directory_uri(); ?>/images/sponsorship.jpg" style="width: 70%;" />
            <h4>Sponsor a Student</h4>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 text-center">
          <a href="join-as-intern.html">
            <img src="<?php echo get_template_directory_uri(); ?>/images/internship.jpg" style="width: 70%;" />
            <h4> Join as an Intern </h4>
          </a>
        </div>
        <div class="col-sm-4 text-center">
          <a href="ccav/donate_step1.php">
            <img src="<?php echo get_template_directory_uri(); ?>/images/donate.jpg" style="width: 70%;" />
            <h4> Donate </h4>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="space-ptb"
    style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/video-background.jpg); background-size: cover; background-position: center center; padding-top: 20px;">
    <div class="container pt-4">
      <div class="row">
        <div class="col-lg-12 text-center pb-4">
          <h2 class="title">
            Featured Video
          </h2>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="position-relative border-radius overflow-hidden mt-4">
            <img class="img-fluid border-radius" src="Video/video-1.jpg" alt="image">
            <a class="btn-animation position-center popup-youtube" href="https://www.youtube.com/embed/T9ov7QE3nkk">
              <i class="fas fa-play"></i>
            </a>
          </div>
        </div>
        <div class="col-sm-12 text-center">
          <iframe width="800" height="400" src="https://www.youtube.com/embed/5YPiUTemXGk">
          </iframe>
        </div>
      </div>
    </div>
  </section>

  <section class="space-pt" style="padding-top: 20px;">
    <div class="container pb-4">
      <div class="row pb-1">
        <div class="col-lg-12">
          <h2 class="title">
            Photo Gallery
          </h2>
        </div>
      </div>
    </div>
    <a href="Gallery.html">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 p-lg-0">
            <div class="events-img">
              <img class="img-fluid border-0 " src="<?php echo get_template_directory_uri(); ?>/images/events/g-1.jpg" alt="">
            </div>
          </div>

          <div class="col-lg-4 p-lg-0">
            <div class="events-img">
              <img class="img-fluid border-0 " src="<?php echo get_template_directory_uri(); ?>/images/events/g-2.jpg" alt="">
            </div>
          </div>

          <div class="col-lg-4 p-lg-0">
            <div class="events-img">
              <img class="img-fluid border-0 " src="<?php echo get_template_directory_uri(); ?>/images/events/g-3.jpg" alt="">
            </div>
          </div>

        </div>
      </div>
    </a>
  </section>

  <!--=================================
    Student Numbers and No of Villages  -->
  <section class="space-ptb bg-dark">

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-lg-2 mb-4 mb-lg-0">
          <div class="counter">
            <div class="counter-icon">
              <i class="flaticon-support text-white"></i>
            </div>
            <div class="counter-content align-self-center">
              <span class="timer text-white" data-to="126118" data-speed="10000">1,26,118+</span>
              <label class="text-white">Candidate Students</label>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4 mb-md-0">
          <div class="counter">
            <div class="counter-icon">
              <i class="flaticon-support text-white"></i>
            </div>
            <div class="counter-content">
              <span class="timer text-white" data-to="664" data-speed="10000">664</span>
              <label class="text-white">Selected Students </label>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4 mb-lg-0">
          <div class="counter">
            <div class="counter-icon">
              <i class="flaticon-team-1 text-white"></i>
            </div>
            <div class="counter-content">
              <span class="timer text-white" data-to="150" data-speed="10000">150+</span>
              <label class="text-white">Number of Villages/Towns</label>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4 mb-md-0">
          <div class="counter">
            <div class="counter-icon">
              <i class="flaticon-support text-white"></i>
            </div>
            <div class="counter-content">
              <span class="timer text-white" data-to="200" data-speed="10000">200</span>
              <label class="text-white">Number of Schools </label>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-2 mb-4 mb-md-0">
          <div class="counter">
            <div class="counter-icon">
              <i class="flaticon-support text-white"></i>
            </div>
            <div class="counter-content">
              <span class="timer text-white" data-to="75" data-speed="10000">75</span>
              <label class="text-white">Test/Events Conducted </label>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-2">
          <div class="counter">
            <div class="counter-icon">
              <i class="flaticon-diploma-1 text-white"></i>
            </div>
            <div class="counter-content">
              <span class="timer text-white" data-to="9300" data-speed="10000">9300+</span>
              <label class="text-white">Hours of Teaching</label>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php get_footer(); ?>
