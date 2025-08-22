<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!-- Your header HTML starts here -->

  <header class="header header-sticky">
  <div class="header-main">
    <div class="container-lg">
      <div class="row">
        <div class="col-sm-12">
          <div class="d-lg-flex align-items-center">
            <!-- logo -->
            <a class="navbar-brand logo" href="<?php echo esc_url(home_url('/')); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/pratibha-poshak-logo.svg" alt="Logo">
            </a>

            <nav class="navbar navbar-expand-lg">
              <!-- Navbar toggler START -->
              <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <!-- Navbar toggler END -->

              <!-- Navbar START -->
              <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <?php
                  wp_nav_menu(array(
  'theme_location' => 'main_menu',
  'depth' => 2,
  'container' => 'div',
  'container_class' => 'collapse navbar-collapse justify-content-center',
  'container_id' => 'navbarSupportedContent',
  'menu_class' => 'navbar-nav',
  'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
  'walker' => new WP_Bootstrap_Navwalker()
));
                ?>
              </div>
              <!-- Navbar END -->

              <div class="search-icon mr-5 mr-lg-0 d-lg-flex d-none align-items-center">
                <!-- Button START -->
                <div class="header-search nav-item">
                  <div class="search">
                    <a href="https://www.rajalakshmifoundation.in/" target="_blank">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/rcf-logo.png" style="width: 70%;" />
                    </a>
                  </div>
                </div>
                <!-- Button END -->
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
