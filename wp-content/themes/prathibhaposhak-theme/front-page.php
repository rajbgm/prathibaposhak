<?php get_header(); ?>

<!-- Slider -->
<section id="main-slider" class="swiper-container h-800 h-lg-700 h-md-600 h-sm-400 swiper-container-fade" effect="fade">
  <div class="swiper-wrapper">

    <?php for ($i = 1; $i <= 4; $i++) : ?>
      <?php
        $title = get_field('banner_title' . $i);
        $description = get_field('banner_description' . $i);
        $image = get_field('banner_image' . $i);
        $button_text = get_field('button_text' . $i);
        $button_url = get_field('button_url' . $i);
      ?>

      <?php if ($title && $image) : ?>
        <div class="swiper-slide align-items-center d-flex bg-overlay-black-40"
          style="background-image: url('<?php echo esc_url($image['url']); ?>'); background-size: cover; background-position: center center;">
          <div class="swipeinner container">
            <div class="row justify-content-start text-left">
              <div class="col-lg-10 col-md-12">
                <div class="slider-1">
                  <div class="animated" data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.25s">
                    <h1 class="animated text-white mb-4" data-swiper-animation="fadeInUp" data-duration="1.5s"
                      data-delay="0.25s"><?php echo esc_html($title); ?></h1>

                    <div class="animated text-dark" data-swiper-animation="fadeInUp" data-duration="2.5s"
                      data-delay="0.25s">
                      <?php if (!empty($description)) : ?>
                        <p class="text-white d-none d-sm-block"><?php echo esc_html($description); ?></p>
                      <?php endif; ?>

                      <?php if (!empty($button_text) && !empty($button_url)) : ?>
                        <a href="<?php echo esc_url($button_url); ?>" class="animated4 btn btn-sm rcfBtn btn-white mt-4 mr-1 mr-sm-2"
                          data-swiper-animation="fadeInUp" data-duration="3.5s" data-delay="0.25s">
                          <?php echo esc_html($button_text); ?><span></span>
                        </a>
                      <?php endif; ?>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endfor; ?>

  </div>

  <!-- Pagination Arrows -->
  <div class="swiper-button-prev text-white"><i class="fa fa-arrow-left"></i></div>
  <div class="swiper-button-next text-white"><i class="fa fa-arrow-right"></i></div>
</section>

<section class="space-ptb about-intro pd-0">
      <div class="row align-items-center">
      <div class="col-md-12 pp-introduction">
  <div class="container">
    <?php
    $image = get_field('aboutus_image');
    $description = get_field('aboutus_description');
    if ($image) {
        echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
    }
    ?>
    <div class="col-md-12">
      <?php if ($description) {
        echo wp_kses_post($description);
      } ?>
    </div>
  </div>
</div>
  </div>
</section>

  <!-- About Pratibha Poshak-->

  <!--Inspiring Journeys-->
 
  <section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="title">Triumphs Against All Odds: Inspiring Journeys of Resilience</h2>
      </div>
    </div>

    <div class="row pt-4">
      <?php
      $args = array(
          'post_type' => 'inspiring_journey',
          'posts_per_page' => 3,
          'orderby' => 'date',
          'order' => 'DESC'
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
      ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="events h-100">
          <div class="events-img">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <img class="img-fluid border-0" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
              <?php endif; ?>
            </a>
          </div>
          <div class="events-content p-4">
            <a href="<?php the_permalink(); ?>" class="text-dark h5"><?php the_title(); ?></a>
            <p class="text-dark mb-0"><?php echo wp_trim_words(get_the_excerpt(), 50, '...'); ?></p><br>
            <a class="mt-4" href="<?php the_permalink(); ?>">Read more..</a>
          </div>
        </div>
      </div>
      <?php
          endwhile;
          wp_reset_postdata();
      endif;
      ?>
    </div>

    <div class="row align-items-center">
      <div class="col-lg-12 text-center">
        <a href="<?php echo get_post_type_archive_link('inspiring_journey'); ?>" class="btn btn-primary btn-roundup">Read More stories</a>
      </div>
    </div>
  </div>
</section>


  <!--Recent Updates-->

  <!-- Recent Updates Section -->
<section class="space-ptb"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/bg/recent-updates.jpg'); background-size: cover; background-position: center center; padding-top:25px; padding-bottom: 15px;">
    <div class="container pb-4">
        <div class="row pb-1">
            <div class="col-lg-12">
                <h2 class="title">Recent Updates<br></h2>
            </div>
        </div>
        <div class="row pb-4">
            <?php
            $recent_updates = new WP_Query(array(
                'post_type' => 'recent_update',
                'posts_per_page' => 3
            ));
            if ($recent_updates->have_posts()) :
                while ($recent_updates->have_posts()) : $recent_updates->the_post(); ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="events h-100">
                            <div class="events-img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid border-0', 'alt' => get_the_title())); ?>
                                </a>
                            </div>
                            <div class="events-content p-4">
                                <a href="<?php the_permalink(); ?>" class="text-dark h5"><?php the_title(); ?></a><br><br>
                                <p class="text-dark mb-0"><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
                                <br><a class="mt-4" href="<?php the_permalink(); ?>">Read more..</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-12 align-content-center text-center">
                <a href="<?php echo get_post_type_archive_link('recent_update'); ?>" class="btn btn-primary btn-roundup">Read More Updates</a>
            </div>
        </div>
    </div>
</section>



<!-- Join Hands with us -->
  <?php get_template_part('template-parts/join-hands'); ?>

  
<!-- Feature Video Section -->
<?php
  $video_title       = get_field('video_title');
  $video_thumbnail   = get_field('video_thumbnail');
  $popup_video_url   = get_field('popup_video_url');
  $embed_video_url   = get_field('embed_video_url');
?>

<section class="space-ptb"
  style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/video-background.jpg); background-size: cover; background-position: center center; padding-top: 20px;">
  <div class="container pt-4">
    <div class="row">
      <div class="col-lg-12 text-center pb-4">
        <h2 class="title">
          <?php echo esc_html($video_title); ?>
        </h2>
      </div>
    </div>

    <div class="row">
      <?php if ($video_thumbnail && $popup_video_url): ?>
      <div class="col-sm-12">
        <div class="position-relative border-radius overflow-hidden mt-4">
          <img class="img-fluid border-radius" src="<?php echo esc_url($video_thumbnail); ?>" alt="video thumbnail">
          <a class="btn-animation position-center popup-youtube" href="<?php echo esc_url($popup_video_url); ?>">
            <i class="fas fa-play"></i>
          </a>
        </div>
      </div>
      <?php endif; ?>

      <?php if ($embed_video_url): ?>
      <div class="col-sm-12 text-center mt-4">
        <iframe width="800" height="400" src="<?php echo esc_url($embed_video_url); ?>" allowfullscreen></iframe>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- Home Page Photo Gallery -->
  <?php
  $gallery_title = get_field('gallery_title');
  $gallery_link = get_field('gallery_link');
  $gallery_img_1 = get_field('gallery_img_1');
  $gallery_img_2 = get_field('gallery_img_2');
  $gallery_img_3 = get_field('gallery_img_3');
?>

<section class="space-pt" style="padding-top: 20px;">
  <div class="container pb-4">
    <div class="row pb-1">
      <div class="col-lg-12">
        <h2 class="title">
          <?php echo esc_html($gallery_title ?: 'Photo Gallery'); ?>
        </h2>
      </div>
    </div>
  </div>

  <?php if ($gallery_link): ?>
  <a href="<?php echo esc_url($gallery_link); ?>">
    <div class="container-fluid">
      <div class="row">
        <?php if ($gallery_img_1): ?>
        <div class="col-lg-4 p-lg-0">
          <div class="events-img">
            <img class="img-fluid border-0" src="<?php echo esc_url($gallery_img_1['url']); ?>" alt="">
          </div>
        </div>
        <?php endif; ?>

        <?php if ($gallery_img_2): ?>
        <div class="col-lg-4 p-lg-0">
          <div class="events-img">
            <img class="img-fluid border-0" src="<?php echo esc_url($gallery_img_2['url']); ?>" alt="">
          </div>
        </div>
        <?php endif; ?>

        <?php if ($gallery_img_3): ?>
        <div class="col-lg-4 p-lg-0">
          <div class="events-img">
            <img class="img-fluid border-0" src="<?php echo esc_url($gallery_img_3['url']); ?>" alt="">
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </a>
  <?php endif; ?>
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

  
  <!--=================================
  Testimonial Section-->
<!--=================================
Testimonial Section-->
<section class="space-ptb bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel testimonial-center" data-nav-arrow="false" data-nav-dots="true" data-items="1"
          data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0"
          data-autoheight="true">

          <?php
          // Testimonials array based on your ACF fields
          $testimonials = [
            [
              'text' => get_field('testimonial_1_text'),
              'name' => get_field('testimonial_1_name'),
              'grade' => get_field('testimonial_1_grade'),
              'image' => get_field('testimonial_1_image'),
            ],
            [
              'text' => get_field('testimonial_2_text'),
              'name' => get_field('testimonial_2_name'),
              'grade' => get_field('testimonial_2_grade'),
              'image' => get_field('testimonial_2_image'),
            ],
            [
              'text' => get_field('testimonial_2_text_copy'),
              'name' => get_field('testimonial_3_name'),
              'grade' => get_field('testimonial_3_grade'),
              'image' => get_field('testimonial_3_image'),
            ],
            
          ];

          foreach ($testimonials as $testimonial) :
            if ($testimonial['text']) : ?>
              <div class="item">
                <div class="testimonial-item">
                  <div class="testimonial-quote text-center mb-4">
                    <i class="fas fa-quote-left fa-2x text-white"></i>
                  </div>
                  <div class="text-center">
                    <h3 class="mb-4"><?php echo esc_html($testimonial['text']); ?></h3>
                  </div>
                  <div class="testimonial-author">
                    <div class="testimonial-avatar avatar avatar-md mr-0">
                      <?php if (!empty($testimonial['image'])) : ?>
                        <img class="img-fluid" src="<?php echo esc_url($testimonial['image']['url']); ?>" alt="">
                      <?php endif; ?>
                    </div>
                    <div class="testimonial-name">
                      <h5 class="name"><?php echo esc_html($testimonial['name']); ?></h5>
                      <span><?php echo esc_html($testimonial['grade']); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif;
          endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Testimonial -->

<?php get_footer(); ?>
