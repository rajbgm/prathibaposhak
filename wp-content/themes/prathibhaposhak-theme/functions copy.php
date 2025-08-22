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

// Register Custom Post Type: Recent Updates
function register_recent_updates_cpt() {
    $labels = array(
        'name'                  => _x('Latest Updates', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Update', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Latest Updates', 'textdomain'),
        'name_admin_bar'        => __('Update', 'textdomain'),
        'archives'              => __('Update Archives', 'textdomain'),
        'attributes'            => __('Update Attributes', 'textdomain'),
        'all_items'             => __('All Updates', 'textdomain'),
        'add_new_item'          => __('Add New Update', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Update', 'textdomain'),
        'edit_item'             => __('Edit Update', 'textdomain'),
        'update_item'           => __('Update Update', 'textdomain'),
        'view_item'             => __('View Update', 'textdomain'),
        'view_items'            => __('View Updates', 'textdomain'),
        'search_items'          => __('Search Update', 'textdomain'),
        'not_found'             => __('Not found', 'textdomain'),
        'not_found_in_trash'    => __('Not found in Trash', 'textdomain'),
        'featured_image'        => __('Featured Image', 'textdomain'),
        'set_featured_image'    => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image'    => __('Use as featured image', 'textdomain'),
        'insert_into_item'      => __('Insert into update', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this update', 'textdomain'),
        'items_list'            => __('Updates list', 'textdomain'),
        'items_list_navigation' => __('Updates list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter updates list', 'textdomain'),
    );

    $args = array(
        'label'                 => __('Latest Updates', 'textdomain'),
        'description'           => __('News and updates section.', 'textdomain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'thumbnail'),
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'latest-updates'),
        'show_in_rest'          => true,
        'menu_icon'             => 'dashicons-megaphone',
    );

    register_post_type('recent_update', $args);
}
add_action('init', 'register_recent_updates_cpt');


