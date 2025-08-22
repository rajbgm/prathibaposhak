<?php
/**
 * Footer template
 */
?>
  <footer class="space-pt bg-overlay-black-90 bg-holder footer mt-n5"
    style="background-color: #ededed !important; padding-top: 20px;">

    <div class="container pt-5">
      <div class="row pb-5 pb-lg-6 mb-lg-3">

        <!-- Get Involved Links -->
        <div class="col-sm-6 col-lg-2 mb-4 mb-lg-0">
          <h5 class="text-white mb-2 mb-sm-4">Get Involved Links</h5>
          <div class="footer-link">
            <ul class="list-unstyled mb-0">
              <li><a class="text-white" href="<?php echo esc_url( home_url('/mentorship/') ); ?>">Be a Mentor</a></li>
              <li><a class="text-white" href="<?php echo esc_url( home_url('/teacher/') ); ?>">Be a Teacher</a></li>
              <li><a class="text-white" href="<?php echo esc_url( home_url('/sponsor/') ); ?>">Sponsor a Student</a></li>
            </ul>
          </div>
        </div>

        <!-- Useful Links -->
        <div class="col-sm-6 col-lg-2 mb-4 mb-sm-0">
          <h5 class="text-white mb-2 mb-sm-4">Useful Links</h5>
          <div class="footer-link">
            <ul class="list-unstyled mb-0">
              <li><a class="text-white" href="<?php echo esc_url( home_url('/') ); ?>">Home</a></li>
              <li><a class="text-white" href="<?php echo esc_url( home_url('/about-us/') ); ?>">About</a></li>
              <li><a class="text-white" href="<?php echo esc_url( home_url('/gallery/') ); ?>">Gallery</a></li>
              <li><a class="text-white" href="<?php echo esc_url( home_url('/resources/') ); ?>">Resources</a></li>
              <li><a class="text-white" href="<?php echo esc_url( home_url('/reports/') ); ?>">Reports</a></li>
              <li><a class="text-white" href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>">Privacy Policy</a></li>
              <li><a class="text-white" href="<?php echo esc_url( home_url('/terms-and-conditions/') ); ?>">Terms and Conditions</a></li>
              <li><a class="text-white" href="<?php echo esc_url( home_url('/contact-us/') ); ?>">Contact us</a></li>
            </ul>
          </div>
        </div>

        <!-- Contact Us (static for now; we can move this to ACF Options later) -->
        <div class="col-sm-6 col-lg-4">
          <h5 class="text-white mb-2 mb-sm-4">Contact Us</h5>
          <p class="text-white">
            Rajalakshmi Children Foundation<br>
            Plot No. 3, SPOORTI, Double Road<br>
            Hanuman Nagar, Belagavi – 590001<br>
            Karnataka, India<br>
            Phone: +91-9480188790<br>
            Email : <a class="text-white" href="mailto:contact@rajalakshmifoundation.in">contact@rajalakshmifoundation.in</a>
          </p>
          <div class="footer-contact-info">
            <div class="contact-address mt-4">
              <p class="text-white">
                Project Pratibha Poshak<br>
                RCF Sadhana Mandir<br>
                Sector No. 8, Anjaneya Nagar (near Datta Mandir)<br>
                Belagavi – 590016<br>
                Karnataka, India
              </p>
            </div>
          </div>
        </div>

        <!-- Logo + Social -->
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0 pr-lg-5">
          <a href="<?php echo esc_url( home_url('/') ); ?>">
            <img class="img-fluid mb-3 footer-logo"
                 src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pratibha-poshak-logo.svg' ); ?>"
                 alt="Pratibha Poshak">
          </a>

          <h5 class="text-white mb-2 mb-sm-4">Follow Us</h5>
          <div class="social-icon social-icon-style-02">
            <ul>
              <li><a href="https://www.youtube.com/@RCFPratibhaPoshak/" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a></li>
              <li><a href="https://www.facebook.com/RCFKarnataka/" target="_blank" rel="noopener"><i class="fab fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/RcfppFoundation" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/company/rajalakshmi-children-foundation" target="_blank" rel="noopener"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="https://www.instagram.com/rcfpratibhaposhak/" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a></li>
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
      transition: opacity .25s ease, transform .25s ease, background .2s ease;
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

      var showAt = 250; // px scrolled before showing
      var ticking = false;

      function update() {
        var y = window.scrollY || document.documentElement.scrollTop;
        if (y > showAt) btn.classList.add('pp-totop--show');
        else btn.classList.remove('pp-totop--show');
        ticking = false;
      }

      window.addEventListener('scroll', function () {
        if (!ticking) {
          window.requestAnimationFrame(update);
          ticking = true;
        }
      }, { passive: true });

      // initial state
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
