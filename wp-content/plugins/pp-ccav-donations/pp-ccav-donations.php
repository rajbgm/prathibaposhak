<?php
/**
 * Plugin Name:  PP CCAvenue Donations
 * Description:  CCAvenue donation flow via WordPress pages. Shortcodes: [pp_donate_form], [pp_donate_process], [pp_donate_response], [pp_donate_offline], [pp_donate_offline_page]
 * Version:      1.2.0
 * Author:       PP
 */

if (!defined('ABSPATH')) exit;

/* -----------------------------------------------------------
 * SETTINGS (merchant_id, access_code, working_key, mode, reCAPTCHA)
 * ----------------------------------------------------------- */
add_action('admin_init', function () {
  register_setting('pp_ccav', 'pp_ccav_settings');

  add_settings_section('pp_ccav_main', 'CCAvenue Settings', function () {
    echo '<p>Enter your CCAvenue credentials. Keep <code>Mode</code> as <code>test</code> until you switch live keys.</p>';
  }, 'pp_ccav');

  $fields = [
    ['merchant_id',        'Merchant ID'],
    ['access_code',        'Access Code'],
    ['working_key',        'Working Key'],
    ['mode',               'Mode (test or live)'],
    ['recaptcha_site_key', 'reCAPTCHA Site Key (optional)'],
    ['recaptcha_secret_key','reCAPTCHA Secret Key (optional)'],
  ];
  foreach ($fields as [$key, $label]) {
    add_settings_field(
      "pp_ccav_$key",
      esc_html($label),
      function () use ($key) {
        $opt = get_option('pp_ccav_settings', []);
        $val = isset($opt[$key]) ? $opt[$key] : '';
        printf('<input type="text" name="pp_ccav_settings[%s]" value="%s" class="regular-text" />',
          esc_attr($key), esc_attr($val));
        if ($key === 'mode') echo ' <em>test | live</em>';
      },
      'pp_ccav',
      'pp_ccav_main'
    );
  }
});

add_action('admin_menu', function () {
  add_options_page('CCAvenue Donate', 'CCAvenue Donate', 'manage_options', 'pp-ccav', function () {
    echo '<div class="wrap"><h1>CCAvenue Donate</h1><form action="options.php" method="post">';
    settings_fields('pp_ccav');
    do_settings_sections('pp_ccav');
    submit_button();
    echo '</form></div>';
  });
});

/* -------------------------------------------
 * (Optional) Donations admin log
 * ------------------------------------------- */
add_action('init', function () {
  register_post_type('pp_donation', [
    'label' => 'Donations',
    'public' => false,
    'show_ui' => true,
    'menu_icon' => 'dashicons-heart',
    'supports' => ['title', 'custom-fields'],
  ]);
});

/* -------------------------------------------
 * Utils: AES-128-CBC for CCAvenue + helpers
 * ------------------------------------------- */
function pp_ccav_encrypt($plainText, $workingKey) {
  $key = openssl_digest($workingKey, 'MD5', true); // 128-bit key
  $iv  = pack('C*', 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
  return bin2hex(openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv));
}
function pp_ccav_decrypt($encHex, $workingKey) {
  $key = openssl_digest($workingKey, 'MD5', true);
  $iv  = pack('C*', 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
  $enc = pack('H*', $encHex);
  return openssl_decrypt($enc, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
}
function pp_ccav_build_query(array $data) {
  $pairs = [];
  foreach ($data as $k => $v) $pairs[] = $k . '=' . $v;
  return implode('&', $pairs);
}
function pp_ccav_kv_parse($str) {
  $out = [];
  foreach (explode('&', (string)$str) as $pair) {
    if (strpos($pair, '=') === false) continue;
    [$k, $v] = explode('=', $pair, 2);
    $out[$k] = $v;
  }
  return $out;
}

/* -------------------------------------------
 * Labels + default amounts used in Step-1/2
 * ------------------------------------------- */
function pp_cause_label($key) {
  $map = [
    'teacher-salary'  => "Overall teacher's salary for the entire year",
    'sponsor-student' => "Sponsor a Student",
    'sponsor-device'  => "Sponsor a Device (Tablet PC)",
    'internet-2yr'    => "Internet Data (2 years)",
    'internet-1yr'    => "Internet Data (1 year)",
    'meal-20'         => "Meal for 20 students on Selection Test Day",
    'schoolbag'       => "A school bag (backpack) for a student",
    'other'           => "Other",
  ];
  return $map[$key] ?? '';
}
function pp_default_amount($key, $donorcategory) {
  $inr = ['teacher-salary'=>'350000','sponsor-student'=>'74000','sponsor-device'=>'17120','internet-2yr'=>'7200','internet-1yr'=>'3600','meal-20'=>'1600','schoolbag'=>'350','other'=>''];
  $usd = ['teacher-salary'=>'4215','sponsor-student'=>'850','sponsor-device'=>'200','internet-2yr'=>'85','internet-1yr'=>'45','meal-20'=>'20','schoolbag'=>'5','other'=>''];
  $is_ind = (strtolower($donorcategory)==='indian');
  $map = $is_ind ? $inr : $usd; return $map[$key] ?? '';
}

/* -------------------------------------------
 * Shortcode: Step 1 — “Donate towards”
 * ------------------------------------------- */
add_shortcode('pp_donate_form', function ($atts) {
  $atts = shortcode_atts([
    'process_url' => home_url('/donate/process/'),
  ], $atts, 'pp_donate_form');

  $choices = [
    'teacher-salary'   => "Overall teacher's salary for the entire year (Rs.3,50,000 or USD 4215)",
    'sponsor-student'  => "Sponsor a student - full 4 year program (Rs.74,000 or USD 850)",
    'sponsor-device'   => "Sponsor a Device (Tablet PC) (Rs.17,120 or USD 200)",
    'internet-2yr'     => "Internet Data for 2 years (Rs.7,200 or USD 85)",
    'internet-1yr'     => "Internet Data for one year (Rs.3,600 or USD 45)",
    'meal-20'          => "Meal for 20 students on Selection Test Day (Rs.1,600 or USD 20)",
    'schoolbag'        => "A school bag (backpack) for a Pratibha Poshak student (Rs.350 or USD 5)",
    'other'            => "Other",
  ];

  ob_start(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12"><h2>Choose to make a difference today.</h2></div>
      <div class="col-sm-12"><h3>Donate to Pratibha Poshak.</h3></div>
      <div class="col-sm-12">
        <p>We are dedicated to maximizing the efficient allocation of your generous donations. Your contributions are
        eligible for tax exemption under Section 80G (applicable to Indian taxpayers). RCF is registered on the Benevity
        Causes platform; many employers (Google, Microsoft, Apple, Adobe, Intel, etc.) offer donation matching.</p>
      </div>
    </div>

    <form action="<?php echo esc_url($atts['process_url']); ?>" method="post" class="mt-3">
      <?php wp_nonce_field('pp_step1', 'pp_step1_nonce'); ?>

      <fieldset class="mb-3">
        <legend><strong>Donate towards</strong></legend>
        <?php foreach ($choices as $val => $label): ?>
          <div class="mb-2">
            <label>
              <input type="radio" name="donation" value="<?php echo esc_attr($val); ?>"> <?php echo esc_html($label); ?>
            </label>
          </div>
        <?php endforeach; ?>
      </fieldset>

      <fieldset class="mb-4">
        <legend><strong>Donor Category</strong></legend>
        <label class="me-3"><input type="radio" name="donorcategory" value="Indian"> Indian Donor</label>
        <label><input type="radio" name="donorcategory" value="Foreign"> Foreign Donor</label>
      </fieldset>

      <button type="submit" class="btn btn-primary">Next</button>
    </form>
  </div>

  <hr class="my-5">
  <?php echo do_shortcode('[pp_donate_offline show="both"]'); ?>
  <?php
  return ob_get_clean();
});

/* -------------------------------------------
 * Shortcode: Step 2 — Show full form OR post to CCAvenue
 * ------------------------------------------- */
add_shortcode('pp_donate_process', function () {

  /* Branch A: from Step-1 → show full form */
  if (isset($_POST['pp_step1_nonce']) && wp_verify_nonce($_POST['pp_step1_nonce'], 'pp_step1')) {
    $donation      = sanitize_text_field($_POST['donation'] ?? '');
    $donorcategory = sanitize_text_field($_POST['donorcategory'] ?? '');
    if (!$donation || !$donorcategory) return '<div class="alert alert-danger">Please choose an option in Step-1.</div>';

    $amount   = pp_default_amount($donation, $donorcategory);
    $currency = (strtolower($donorcategory)==='indian') ? 'INR' : 'USD';
    $cause    = pp_cause_label($donation);

    $opt = get_option('pp_ccav_settings', []);
    $site_key = trim($opt['recaptcha_site_key'] ?? '');

    ob_start(); ?>
    <div class="container">
      <h3>Donate to Pratibha Poshak</h3>
      <p>We need some information about you.</p>

      <form method="post" action="<?php echo esc_url( home_url('/donate/process/') ); ?>">
        <?php wp_nonce_field('pp_donate_details', 'pp_donate_details_nonce'); ?>
        <!-- carry Step-1 forward -->
        <input type="hidden" name="donation" value="<?php echo esc_attr($donation); ?>">
        <input type="hidden" name="donorcategory" value="<?php echo esc_attr($donorcategory); ?>">

        <div class="row">
          <div class="col-md-6 mb-3"><label>Donor Name (*)</label><input type="text" name="billing_name" class="form-control" required></div>
          <div class="col-md-3 mb-3"><label>Phone (*)</label><input type="tel"  name="billing_tel"  class="form-control" required></div>
          <div class="col-md-3 mb-3"><label>Email (*)</label><input type="email" name="billing_email"class="form-control" required></div>

          <div class="col-md-4 mb-3"><label>Amount (*)</label><input type="text" name="amount" value="<?php echo esc_attr($amount); ?>" class="form-control" required></div>
          <div class="col-md-2 mb-3"><label>Currency (*)</label><input type="text" name="currency" value="<?php echo esc_attr($currency); ?>" class="form-control" readonly></div>
          <div class="col-md-6 mb-3"><label>Donation for (*)</label><input type="text" name="merchant_param2" value="<?php echo esc_attr($cause); ?>" class="form-control" readonly></div>

          <div class="col-md-4 mb-3"><label>Your PAN (*)</label><input type="text" name="pan" class="form-control" required></div>
          <div class="col-md-8 mb-3"><label>Address</label><input type="text" name="billing_address" class="form-control"></div>
          <div class="col-md-4 mb-3"><label>City</label><input type="text" name="billing_city" class="form-control"></div>
          <div class="col-md-4 mb-3"><label>State</label><input type="text" name="billing_state" class="form-control"></div>
          <div class="col-md-2 mb-3"><label>PIN/ZIP</label><input type="text" name="billing_zip" class="form-control"></div>
          <div class="col-md-2 mb-3"><label>Country</label><input type="text" name="billing_country" value="<?php echo (strtolower($donorcategory)==='indian') ? 'India' : ''; ?>" class="form-control"></div>

          <div class="col-md-12 mb-2"><label>Purpose / Note (optional)</label><input type="text" name="merchant_param1" class="form-control"></div>
        </div>

        <h4 class="text-center mt-3">Mode of Payment</h4>
        <div class="text-center mb-3">
          <label class="me-3"><input type="radio" name="paymode" value="upi"> UPI QR Code</label>
          <label class="me-3"><input type="radio" name="paymode" value="gateway"> Payment Gateway (NetBanking/Cards/Wallets)</label>
          <label><input type="radio" name="paymode" value="bank"> Cheque/Bank Transfer (NEFT/RTGS/Cheque)</label>
        </div>

        <?php if ($site_key): ?>
          <div class="mb-3">
            <div class="g-recaptcha" data-sitekey="<?php echo esc_attr($site_key); ?>"></div>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
          </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-warning">DONATE</button>
      </form>
    </div>
    <?php
    return ob_get_clean();
  }

  /* Branch B: full details → offline or CCAvenue */
  if (!isset($_POST['pp_donate_details_nonce']) || !wp_verify_nonce($_POST['pp_donate_details_nonce'], 'pp_donate_details')) {
    return '<div class="alert alert-danger">Session expired or invalid request.</div>';
  }

  $settings = get_option('pp_ccav_settings', []);
  $merchant_id = trim($settings['merchant_id'] ?? '');
  $access_code = trim($settings['access_code'] ?? '');
  $working_key = trim($settings['working_key'] ?? '');
  $mode        = strtolower(trim($settings['mode'] ?? 'test'));
  $site_key    = trim($settings['recaptcha_site_key'] ?? '');
  $secret_key  = trim($settings['recaptcha_secret_key'] ?? '');

  // reCAPTCHA (if configured)
  if ($site_key && $secret_key) {
    $resp = $_POST['g-recaptcha-response'] ?? '';
    $verify = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
      'body' => ['secret'=>$secret_key,'response'=>$resp,'remoteip'=>$_SERVER['REMOTE_ADDR'] ?? ''],
      'timeout' => 10,
    ]);
    $ok = false;
    if (!is_wp_error($verify)) {
      $json = json_decode(wp_remote_retrieve_body($verify), true);
      $ok = !empty($json['success']);
    }
    if (!$ok) return '<div class="alert alert-danger">reCAPTCHA validation failed. Please try again.</div>';
  }

  // Common inputs
  $paymode       = sanitize_text_field($_POST['paymode'] ?? 'gateway'); // upi|gateway|bank
  $donorcategory = sanitize_text_field($_POST['donorcategory'] ?? 'Indian');
  $cause         = sanitize_text_field($_POST['merchant_param2'] ?? '');
  $notes         = sanitize_text_field($_POST['merchant_param1'] ?? '');

  $amount        = number_format((float)($_POST['amount'] ?? 0), 2, '.', '');
  $currency      = sanitize_text_field($_POST['currency'] ?? 'INR');
  $billing_name  = sanitize_text_field($_POST['billing_name'] ?? '');
  $billing_email = sanitize_email($_POST['billing_email'] ?? '');
  $billing_tel   = sanitize_text_field($_POST['billing_tel'] ?? '');
  $pan           = sanitize_text_field($_POST['pan'] ?? '');
  $billing_address = sanitize_text_field($_POST['billing_address'] ?? '');
  $billing_city    = sanitize_text_field($_POST['billing_city'] ?? '');
  $billing_state   = sanitize_text_field($_POST['billing_state'] ?? '');
  $billing_zip     = sanitize_text_field($_POST['billing_zip'] ?? '');
  $billing_country = sanitize_text_field($_POST['billing_country'] ?? '');

  if ($amount <= 0 || !$billing_name || !$billing_email || !$billing_tel) {
    return '<div class="alert alert-danger">Please fill all required fields.</div>';
  }

  // Offline? → redirect to /donate/offline/ (domestic|foreign)
  if ($paymode !== 'gateway') {
    $type = (strtolower($donorcategory)==='indian') ? 'domestic' : 'foreign';
    $offline = add_query_arg([
      'type'     => $type,
      'amount'   => $amount,
      'currency' => $currency,
      'cause'    => $cause,
    ], home_url('/donate/offline/'));
    wp_safe_redirect($offline);
    exit;
  }

  // Otherwise → post to CCAvenue
  $gateway_url = ($mode === 'live')
    ? 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction'
    : 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction';

  if (!$merchant_id || !$access_code || !$working_key) {
    return '<div class="alert alert-danger">CCAvenue settings are incomplete (Settings → CCAvenue Donate).</div>';
  }

  $order_id = 'PP' . date('YmdHis') . wp_rand(1000, 9999);
  $redirect_url = home_url('/donate/response/');
  $cancel_url   = $redirect_url;

  $merchant_data = [
    'merchant_id'   => $merchant_id,
    'order_id'      => $order_id,
    'currency'      => $currency,
    'amount'        => $amount,
    'redirect_url'  => $redirect_url,
    'cancel_url'    => $cancel_url,
    'language'      => 'EN',
    'billing_name'  => $billing_name,
    'billing_email' => $billing_email,
    'billing_tel'   => $billing_tel,
    'billing_address' => $billing_address,
    'billing_city'    => $billing_city,
    'billing_state'   => $billing_state,
    'billing_zip'     => $billing_zip,
    'billing_country' => $billing_country,
    // custom merchant params
    'merchant_param1' => $notes,
    'merchant_param2' => $cause,
    'merchant_param3' => $pan,
    'merchant_param4' => $donorcategory,
    'merchant_param5' => 'gateway',
  ];
  $merchant_query = pp_ccav_build_query($merchant_data);
  $enc_request    = pp_ccav_encrypt($merchant_query, $working_key);

  // Optional log
  $post_id = wp_insert_post([
    'post_type'=>'pp_donation','post_status'=>'publish',
    'post_title'=>$order_id.' - '.$billing_name.' - '.$amount.' '.$currency,
  ]);
  if ($post_id) {
    update_post_meta($post_id,'_pp_order_id',$order_id);
    update_post_meta($post_id,'_pp_amount',$amount);
    update_post_meta($post_id,'_pp_currency',$currency);
    update_post_meta($post_id,'_pp_name',$billing_name);
    update_post_meta($post_id,'_pp_email',$billing_email);
    update_post_meta($post_id,'_pp_tel',$billing_tel);
    update_post_meta($post_id,'_pp_notes',$notes);
    update_post_meta($post_id,'_pp_cause',$cause);
    update_post_meta($post_id,'_pp_pan',$pan);
  }

  ob_start(); ?>
  <p>Redirecting to secure payment… Please wait.</p>
  <form id="pp-ccav-post" method="post" action="<?php echo esc_url($gateway_url); ?>">
    <input type="hidden" name="encRequest"  value="<?php echo esc_attr($enc_request); ?>">
    <input type="hidden" name="access_code" value="<?php echo esc_attr($access_code); ?>">
  </form>
  <script>(function(){ document.getElementById('pp-ccav-post').submit(); })();</script>
  <?php
  return ob_get_clean();
});

/* -------------------------------------------
 * Shortcode: Step 3 — Decrypt & show result
 * ------------------------------------------- */
add_shortcode('pp_donate_response', function () {
  $settings   = get_option('pp_ccav_settings', []);
  $working_key = trim($settings['working_key'] ?? '');
  if (!$working_key) return '<div class="alert alert-danger">CCAvenue working key missing.</div>';

  $encResp = $_POST['encResp'] ?? '';
  if (!$encResp) return '<div class="alert alert-danger">No response received.</div>';

  $plain = pp_ccav_decrypt($encResp, $working_key);
  $kv    = pp_ccav_kv_parse($plain);

  $order_id    = $kv['order_id'] ?? '';
  $amount      = $kv['amount'] ?? '';
  $currency    = $kv['currency'] ?? 'INR';
  $status      = strtolower($kv['order_status'] ?? '');
  $tracking_id = $kv['tracking_id'] ?? '';
  $bank_ref_no = $kv['bank_ref_no'] ?? '';

  $q = get_posts(['post_type'=>'pp_donation','meta_key'=>'_pp_order_id','meta_value'=>$order_id,'posts_per_page'=>1]);
  if ($q) {
    $pid = $q[0]->ID;
    update_post_meta($pid, '_pp_status', $status);
    update_post_meta($pid, '_pp_tracking_id', $tracking_id);
    update_post_meta($pid, '_pp_bank_ref_no', $bank_ref_no);
    update_post_meta($pid, '_pp_raw', $plain);
  }

  $msg = 'Payment status unknown.';
  $cls = 'secondary';
  if ($status === 'success') { $msg = 'Thank you! Your payment was successful.'; $cls = 'success'; }
  elseif ($status === 'aborted') { $msg = 'Payment aborted. If money was debited, it will be auto-reversed.'; $cls = 'warning'; }
  elseif ($status === 'failure') { $msg = 'Payment failed. Please try again or contact support.'; $cls = 'danger'; }

  ob_start(); ?>
  <div class="alert alert-<?php echo esc_attr($cls); ?>">
    <strong><?php echo esc_html(ucfirst($status ?: 'notice')); ?>:</strong> <?php echo esc_html($msg); ?>
  </div>
  <div class="card mb-3"><div class="card-body">
    <div><strong>Order ID:</strong> <?php echo esc_html($order_id); ?></div>
    <div><strong>Amount:</strong> <?php echo esc_html($amount.' '.$currency); ?></div>
    <?php if ($tracking_id): ?><div><strong>Tracking ID:</strong> <?php echo esc_html($tracking_id); ?></div><?php endif; ?>
    <?php if ($bank_ref_no): ?><div><strong>Bank Ref No:</strong> <?php echo esc_html($bank_ref_no); ?></div><?php endif; ?>
  </div></div>
  <?php
  return ob_get_clean();
});

/* -------------------------------------------
 * Shortcode block: bank details (domestic/foreign)
 * ------------------------------------------- */
add_shortcode('pp_donate_offline', function ($atts) {
  $atts = shortcode_atts(['show' => 'both'], $atts, 'pp_donate_offline');
  ob_start(); ?>
  <div class="pp-offline">
    <?php if ($atts['show'] === 'domestic' || $atts['show'] === 'both'): ?>
      <h4 class="mt-4">Bank Details (for donations in INR)</h4>
      <div class="row">
        <div class="col-md-4 col-sm-12 font-weight-bolder">
          <p>Account Name</p><p>Account Number</p><p>Account Type</p><p>Bank</p><p>Branch</p><p>IFSC</p>
        </div>
        <div class="col-md-4 col-sm-12 font-weight-bolder">
          <p>Rajalakshmi Children Foundation</p>
          <p>50200010678682</p>
          <p>Current</p>
          <p>HDFC Bank</p>
          <p>Dr. Ambedkar Road, Belagavi</p>
          <p>HDFC0000253</p>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($atts['show'] === 'foreign' || $atts['show'] === 'both'): ?>
      <h4 class="mt-5">Foreign Contributions (FCRA)</h4>
      <p>Rajalakshmi Children Foundation is registered under FCRA. Many employers (AMD, Adobe, Apple, Google, Intel, Microsoft) offer matching contributions.</p>
      <div class="row">
        <div class="col-md-4 col-sm-12 font-weight-bolder">
          <p>Account Name</p><p>Address</p><p>Account Number</p><p>Bank</p><p>SWIFT Code</p><p>Branch Address</p>
        </div>
        <div class="col-md-8 col-sm-12 font-weight-bolder">
          <p>RAJALAKSHMI CHILDREN FOUNDATION</p>
          <p>Plot No. 3 SPOORTI, Hanuman Nagar, Double Road, Belagavi</p>
          <p>40220644049</p>
          <p>State Bank of India, New Delhi Main Branch</p>
          <p>SBININBB104</p>
          <p>FCRA Cell, 4th Floor, State Bank of India, New Delhi Main Branch, 11, Sansad Marg, New Delhi - 110001</p>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <?php return ob_get_clean();
});

/* -------------------------------------------
 * Shortcode page: /donate/offline/ summary
 * ------------------------------------------- */
add_shortcode('pp_donate_offline_page', function () {
  $type     = sanitize_text_field($_GET['type'] ?? 'domestic'); // domestic|foreign
  $amount   = sanitize_text_field($_GET['amount'] ?? '');
  $currency = sanitize_text_field($_GET['currency'] ?? 'INR');
  $cause    = sanitize_text_field($_GET['cause'] ?? '');

  ob_start(); ?>
  <div class="container">
    <h3>Offline Donation Instructions</h3>
    <?php if ($amount): ?>
      <p><strong>Amount:</strong> <?php echo esc_html($amount.' '.$currency); ?></p>
    <?php endif; ?>
    <?php if ($cause): ?>
      <p><strong>Donation for:</strong> <?php echo esc_html($cause); ?></p>
    <?php endif; ?>
    <?php echo do_shortcode('[pp_donate_offline show="'.($type==='foreign'?'foreign':'domestic').'"]'); ?>
  </div>
  <?php
  return ob_get_clean();
});

/* -------------------------------------------
 * Activation: create pages + shortcodes
 * ------------------------------------------- */
register_activation_hook(__FILE__, function () {
  $pages = [
    'donate' => [
      'title'   => 'Donate',
      'content' => "[pp_donate_form]\n[pp_donate_offline show=\"both\"]",
    ],
    'donate/process' => [
      'title'   => 'Donate – Process',
      'content' => '[pp_donate_process]',
    ],
    'donate/response' => [
      'title'   => 'Donate – Response',
      'content' => '[pp_donate_response]',
    ],
    'donate/offline' => [
      'title'   => 'Donate – Offline',
      'content' => '[pp_donate_offline_page]',
    ],
  ];
  foreach ($pages as $path => $data) {
    $slug_parts = explode('/', trim($path, '/'));
    $slug = array_pop($slug_parts);
    $parent_id = 0;
    if (!empty($slug_parts)) {
      $parent_slug = $slug_parts[0];
      $parent = get_page_by_path($parent_slug);
      if (!$parent) {
        $parent_id = wp_insert_post([
          'post_title' => ucwords(str_replace('-', ' ', $parent_slug)),
          'post_name'  => $parent_slug,
          'post_type'  => 'page',
          'post_status'=> 'publish',
        ]);
      } else {
        $parent_id = $parent->ID;
      }
    }
    $existing = get_page_by_path($path);
    if (!$existing) {
      wp_insert_post([
        'post_title'   => $data['title'],
        'post_name'    => $slug,
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'post_parent'  => $parent_id,
        'post_content' => $data['content'],
      ]);
    }
  }
  flush_rewrite_rules();
});

/* -------------------------------------------
 * Force-render donate pages (theme-safe)
 * ------------------------------------------- */
add_action('template_redirect', function () {
  if (!is_page()) return;
  $path = get_page_uri(get_queried_object_id()); // "donate", "donate/process", etc.

  $sc = '';
  if ($path === 'donate') $sc = "[pp_donate_form]\n[pp_donate_offline show=\"both\"]";
  elseif ($path === 'donate/process') $sc = '[pp_donate_process]';
  elseif ($path === 'donate/response') $sc = '[pp_donate_response]';
  elseif ($path === 'donate/offline') $sc = '[pp_donate_offline_page]';
  else return;

  get_header();
  echo '<section class="space-ptb" style="padding-top:30px; padding-bottom:30px;"><div class="container">';
  echo do_shortcode($sc);
  echo '</div></section>';
  get_footer();
  exit;
});
