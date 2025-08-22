<?php



// Theme Setup
function prathibha_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
  register_nav_menus(array(
    'main_menu' => 'Main Menu',
    'footer_menu' => 'Footer Menu'
  ));
}
add_action('after_setup_theme', 'prathibha_theme_setup');

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

register_nav_menus(array(
  'main_menu' => 'Main Menu',
  'footer_menu' => 'Footer Menu'
));

add_theme_support('post-thumbnails');

// Enqueue CSS and JS
function prathibha_enqueue_scripts() {
  // CSS Files
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css');
  wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome/all.min.css');
  wp_enqueue_style('flaticon', get_template_directory_uri() . '/css/flaticon/flaticon.css');
  wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate/animate.min.css');
  wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup/magnific-popup.css');
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl-carousel/owl.carousel.min.css');
  wp_enqueue_style('select2', get_template_directory_uri() . '/css/select2/select2.min.css');
  wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick/slick-theme.css');
  wp_enqueue_style('swiper', get_template_directory_uri() . '/css/swiper/swiper.min.css');
  wp_enqueue_style('main-style', get_stylesheet_uri()); // Loads style.css (compiled SCSS)

  // JS Files

  // Replace default jQuery with your template's version
  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', false, null, true);
  wp_enqueue_script('jquery');

  // Core
  wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper/popper.min.js', array('jquery'), null, true);
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', array('jquery'), null, true);

  // Plugins
  wp_enqueue_script('jquery-appear', get_template_directory_uri() . '/js/jquery.appear.js', array('jquery'), null, true);
  wp_enqueue_script('counter', get_template_directory_uri() . '/js/counter/jquery.countTo.js', array('jquery'), null, true);
  wp_enqueue_script('countdown', get_template_directory_uri() . '/js/countdown/jquery.downCount.js', array('jquery'), null, true);
  wp_enqueue_script('select2', get_template_directory_uri() . '/js/select2/select2.full.min.js', array('jquery'), null, true);
  wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array('jquery'), null, true);
  wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper/swiper.min.js', array('jquery'), null, true);
  wp_enqueue_script('swiper-animation', get_template_directory_uri() . '/js/swiperanimation/SwiperAnimation.min.js', array('swiper'), null, true);
  wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), null, true);
  wp_enqueue_script('jarallax', get_template_directory_uri() . '/js/jarallax/jarallax.js', array('jquery'), null, true);
  wp_enqueue_script('shuffle', get_template_directory_uri() . '/js/shuffle/shuffle.min.js', array('jquery'), null, true);

  // Custom
  wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'prathibha_enqueue_scripts');

function register_slider_cpt() {
  $labels = array(
    'name'               => 'Slides',
    'singular_name'      => 'Slide',
    'menu_name'          => 'Slides',
    'name_admin_bar'     => 'Slide',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Slide',
    'new_item'           => 'New Slide',
    'edit_item'          => 'Edit Slide',
    'view_item'          => 'View Slide',
    'all_items'          => 'All Slides',
    'search_items'       => 'Search Slides',
    'not_found'          => 'No slides found.',
    'not_found_in_trash' => 'No slides found in Trash.',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'menu_icon'          => 'dashicons-images-alt2',
    'supports'           => array('title', 'editor', 'thumbnail'),
    'show_in_rest'       => true,
  );

  register_post_type('slides', $args);
}
add_action('init', 'register_slider_cpt');

// Allow SVG upload
function allow_svg_upload($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

function register_inspiring_journey_cpt() {
    $labels = array(
        'name' => 'Inspiring Journeys',
        'singular_name' => 'Inspiring Journey',
        'add_new' => 'Add New Journey',
        'add_new_item' => 'Add New Inspiring Journey',
        'edit_item' => 'Edit Inspiring Journey',
        'new_item' => 'New Inspiring Journey',
        'view_item' => 'View Inspiring Journey',
        'search_items' => 'Search Inspiring Journeys',
        'not_found' => 'No Journeys found',
        'not_found_in_trash' => 'No Journeys found in Trash',
        'all_items' => 'All Inspiring Journeys',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'inspiring-journey'),
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-users',
    );

    register_post_type('inspiring_journey', $args);
}
add_action('init', 'register_inspiring_journey_cpt');


// Register "Recent Updates" Custom Post Type
function prathibha_register_recent_updates_cpt() {
  $labels = array(
    'name' => 'Recent Updates',
    'singular_name' => 'Recent Update',
    'menu_name' => 'Recent Updates',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Update',
    'edit_item' => 'Edit Update',
    'view_item' => 'View Update',
    'all_items' => 'All Updates',
    'search_items' => 'Search Updates',
    'not_found' => 'No updates found.',
    'not_found_in_trash' => 'No updates found in Trash.',
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-megaphone',
    'supports' => array('title','editor','thumbnail','excerpt'),
    'hierarchical' => false,
    'has_archive' => 'recent-updates',                      // /recent-updates/
    'rewrite' => array('slug' => 'recent-updates',          // /recent-updates/%postname%/
                       'with_front' => false),
  );

  register_post_type('recent_update', $args);
}
add_action('init', 'prathibha_register_recent_updates_cpt');

// One-time flush on theme switch (good hygiene)
add_action('after_switch_theme', function () {
  prathibha_register_recent_updates_cpt();
  flush_rewrite_rules();
});

// === People (CPT) + People Category (Taxonomy) ===
function prathibha_register_people() {
  // CPT: person
  $labels = array(
    'name'               => 'People',
    'singular_name'      => 'Person',
    'menu_name'          => 'People',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Person',
    'edit_item'          => 'Edit Person',
    'new_item'           => 'New Person',
    'view_item'          => 'View Person',
    'all_items'          => 'All People',
    'search_items'       => 'Search People',
    'not_found'          => 'No people found.',
    'not_found_in_trash' => 'No people found in Trash.'
  );

  register_post_type('person', array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'menu_icon'          => 'dashicons-groups',
    'supports'           => array('title','editor','thumbnail','excerpt','page-attributes'),
    'hierarchical'       => false,
    'has_archive'        => false, // We'll use a Page template for the People directory
    'rewrite'            => array('slug' => 'person', 'with_front' => false),
  ));

  // Taxonomy: people_category (hierarchical so it behaves like categories)
  $tax_labels = array(
    'name'              => 'People Categories',
    'singular_name'     => 'People Category',
    'search_items'      => 'Search People Categories',
    'all_items'         => 'All People Categories',
    'parent_item'       => 'Parent Category',
    'parent_item_colon' => 'Parent Category:',
    'edit_item'         => 'Edit Category',
    'update_item'       => 'Update Category',
    'add_new_item'      => 'Add New Category',
    'new_item_name'     => 'New Category Name',
    'menu_name'         => 'People Categories',
  );

  register_taxonomy('people_category', 'person', array(
    'hierarchical'      => true,
    'labels'            => $tax_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'rewrite'           => array('slug' => 'people-category', 'with_front' => false),
  ));
}
add_action('init', 'prathibha_register_people');

// One-time rewrite flush on theme switch
add_action('after_switch_theme', function () {
  prathibha_register_people();
  flush_rewrite_rules();
});

// ===== Theme supports & image sizes =====
add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  // crisp square avatars/cards across the site
  add_image_size('pp_square', 600, 600, true); // hard crop
});

// ===== Register Footer Menus =====
add_action('after_setup_theme', function () {
  register_nav_menus([
    'footer_get_involved' => __('Footer: Get Involved', 'pp'),
    'footer_useful'       => __('Footer: Useful Links', 'pp'),
  ]);
});

// ===== ACF Options Page (for contact & social) =====
if (function_exists('acf_add_options_page')) {
  acf_add_options_page([
    'page_title'  => 'Site Settings',
    'menu_title'  => 'Site Settings',
    'menu_slug'   => 'pp-site-settings',
    'capability'  => 'manage_options',
    'redirect'    => false,
    'position'    => 59,
    'icon_url'    => 'dashicons-admin-generic',
  ]);
}

// ===== Small helper: option field with fallback =====
function pp_opt($key, $fallback = '') {
  if (function_exists('get_field')) {
    $val = get_field($key, 'option');
    if (!empty($val)) return $val;
  }
  return $fallback;
}







