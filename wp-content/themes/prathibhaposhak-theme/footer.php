<?php
/**
 * Footer template
 */
?>
  <footer class="space-pt bg-overlay-black-90 bg-holder footer mt-n5"
    style="background-color: #ededed !important; padding-top: 20px;">

    <div class="container pt-5">
      <div class="row pb-5 pb-lg-6 mb-lg-3">

        <!-- Get Involved (Menu) -->
        <div class="col-sm-6 col-lg-2 mb-4 mb-lg-0">
          <h5 class="text-white mb-2 mb-sm-4">Get Involved Links</h5>
          <div class="footer-link">
            <?php
              wp_nav_menu([
                'theme_location' => 'footer_get_involved',
                'container'      => false,
                'menu_class'     => 'list-unstyled mb-0',
                'fallback_cb'    => function () {
                  echo '<ul class="list-unstyled mb-0">
                          <li><a class="text-white" href="'.esc_url(home_url('/mentorship/')).'">Be a Mentor</a></li>
                          <li><a class="text-white" href="'.esc_url(home_url('/teacher/')).'">Be a Teacher</a></li>
                          <li><a class="text-white" href="'.esc_url(home_url('/sponsor/')).'">Sponsor a Student</a></li>
                        </ul>';
                },
                'link_before'    => '<span class="text-white">',
                'link_after'     => '</span>',
              ]);
            ?>
          </div>
        </div>

        <!-- Useful Links (Menu) -->
        <div class="col-sm-6 col-lg-2 mb-4 mb-sm-0">
          <h5 class="text-white mb-2 mb-sm-4">Useful Links</h5>
          <div class="footer-link">
            <?php
              wp_nav_menu([
                'theme_location' => 'footer_useful',
                'container'      => false,
                'menu_class'     => 'list-unstyled mb-0',
                'fallback_cb'    => function () {
                  echo '<ul class="list-unstyled mb-0">
                          <li><a class="text-white" href="'.esc_url(home_url('/')).'">Home</a></li>
                          <li><a class="text-white" href="'.esc_url(home_url('/about-us/')).'">About</a></li>
                          <li><a class="text-white" href="'.esc_url(home_url('/gallery/')).'">Gallery</a></li>
                          <li><a class="text-white" href="'.esc_url(home_url('/resources/')).'">Resources</a></li>
                          <li><a class="text-white" href="'.esc_url(home_url('/reports/')).'">Reports</a></li>
                          <li><a class="text-white" href="'.esc_url(home_url('/privacy-policy/')).'">Privacy Policy</a></li>
                          <li><a class="text-white" href="'.esc_url(home_url('/terms-and-conditions/')).'">Terms and Conditions</a></li>
                          <li><a class="text-white" href="'.esc_url(home_url('/contact-us/')).'">Contact us</a></li>
                        </ul>';
                },
                'link_before'    => '<span class="text-white">',
                'link_after'     => '</span>',
              ]);
            ?>
          </div>
        </div>

        <!-- Contact Us (ACF Options) -->
        <div class="col-sm-6 col-lg-4">
          <h5 class="text-white mb-2 mb-sm-4">Contact Us</h5>
          <p class="text-white">
            <?php
              $addr = pp_opt('org_address_html', "Rajalakshmi Children Foundation<br>Belagavi, Karnataka, India");
              echo wp_kses_post($addr);
            ?><br>
            <?php $ph = pp_opt('org_phone', '+91-9480188790'); ?>
            <?php $em = pp_opt('org_email', 'contact@rajalakshmifoundation.in'); ?>
            Phone: <a class="text-white" href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $ph)); ?>"><?php echo esc_html($ph); ?></a><br>
            Email: <a class="text-white" href="mailto:<?php echo esc_attr($em); ?>"><?php echo esc_html($em); ?></a>
          </p>
          <div class="footer-contact-info">
            <div class="contact-address mt-4">
              <p class="text-white">
                <?php echo wp_kses_post( pp_opt('pp_address_html', 'Project Pratibha Poshak<br>Belagavi – 590016<br>Karnataka, India') ); ?>
              </p>
            </div>
          </div>
        </div>

        <!-- Logo + Social (ACF Options for URLs) -->
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0 pr-lg-5">
          <a href="<?php echo esc_url( home_url('/') ); ?>">
            <img class="img-fluid mb-3 footer-logo"
                 src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pratibha-poshak-logo.svg' ); ?>"
                 alt="Pratibha Poshak">
          </a>

          <h5 class="text-white mb-2 mb-sm-4">Follow Us</h5>
          <div class="social-icon social-icon-style-02">
            <ul>
              <?php
                $s = [
                  'youtube'   => pp_opt('social_youtube',   'https://www.youtube.com/@RCFPratibhaPoshak/'),
                  'facebook'  => pp_opt('social_facebook',  'https://www.facebook.com/RCFKarnataka/'),
                  'twitter'   => pp_opt('social_twitter',   'https://twitter.com/RcfppFoundation'),
                  'linkedin'  => pp_opt('social_linkedin',  'https://www.linkedin.com/company/rajalakshmi-children-foundation'),
                  'instagram' => pp_opt('social_instagram', 'https://www.instagram.com/rcfpratibhaposhak/'),
                ];
                $icons = [
                  'youtube' => 'fab fa-youtube',
                  'facebook' => 'fab fa-facebook',
                  'twitter' => 'fab fa-twitter',
                  'linkedin' => 'fab fa-linkedin-in',
                  'instagram' => 'fab fa-instagram',
                ];
                foreach ($s as $key => $url) {
                  if (!$url) continue;
                  printf('<li><a href="%1$s" target="_blank" rel="noopener"><i class="%2$s"></i></a></li>',
                    esc_url($url),
                    esc_attr($icons[$key] ?? 'fab fa-external-link-alt')
                  );
                }
              ?>
            </ul>
          </div>
        </div>

      </div>
    </div>

    <!-- Bottom strip -->
    <div class="footer-bottom bg-dark py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12 text-center">
            <?php
              $start_year = 2023;
              $this_year  = (int) date('Y');
              $year_text  = ($this_year > $start_year) ? $start_year . ' - ' . $this_year : (string) $start_year;
            ?>
            <p class="mb-0 text-white">©Copyright <?php echo esc_html( $year_text ); ?>
              <a class="text-white" href="<?php echo esc_url( home_url('/') ); ?>">Pratibha Poshak</a>
              All Rights Reserved
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Sticky Back to Top button -->
    <button id="ppToTop" class="pp-totop" aria-label="Back to top" title="Back to top">
      <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M12 5l7 7-1.4 1.4L13 9.8V19h-2V9.8L6.4 13.4 5 12z" fill="currentColor"/>
      </svg>
    </button>

  </footer>

  <style>
    /* Back to Top button */
    .pp-totop {
      position: fixed;
      right: max(12px, env(safe-area-inset-right));
      bottom: calc(max(12px, env(safe-area-inset-bottom)) + 8px);
      width: 44px; height: 44px;
      display: grid; place-items: center;
      border: none; border-radius: 999px;
      background: #0f80e5; color: #fff;
      box-shadow: 0 6px 18px rgba(0,0,0,.15);
      cursor: pointer; z-index: 9999;
      opacity: 0; transform: translateY(16px); pointer-events: none;
      transition: opacity .25s, transform .25s, background .2s;
    }
    .pp-totop:hover { background: #0c6bc2; }
    .pp-totop:active { transform: translateY(18px) scale(.98); }
    .pp-totop:focus-visible { outline: 2px solid #93c5fd; outline-offset: 2px; }
    .pp-totop.pp-totop--show { opacity: 1; transform: translateY(0); pointer-events: auto; }
    @media (max-width: 480px) { .pp-totop { right: 10px; bottom: 10px; } }
    @media (prefers-reduced-motion: reduce) { .pp-totop { transition: none; } }
  </style>

  <script>
    (function () {
      var btn = document.getElementById('ppToTop');
      if (!btn) return;

      var showAt = 250, ticking = false;
      function update() {
        var y = window.scrollY || document.documentElement.scrollTop;
        if (y > showAt) btn.classList.add('pp-totop--show');
        else btn.classList.remove('pp-totop--show');
        ticking = false;
      }
      window.addEventListener('scroll', function () {
        if (!ticking) { window.requestAnimationFrame(update); ticking = true; }
      }, { passive: true });
      update();
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        try { window.scrollTo({ top: 0, left: 0, behavior: 'smooth' }); }
        catch (err) { window.scrollTo(0, 0); }
      });
    })();
  </script>

  <?php wp_footer(); ?>
</body>
</html>
