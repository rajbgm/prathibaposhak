<html>
<head>
<title>Donate to Pratibha Poshak</title>
</head>
<body>
<center>

<?php 
include('myutils.php');

function generateOrderID() 
{
	return 'O' . '-' . time() . '-' . mt_rand()%100;
}

$captcha=false;
if(isset($_POST['g-recaptcha-response'])){
      $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
    echo '<h2>Please check the the captcha.</h2>';
    exit;
}

// CAPTCHA validation
$secretKey = "6LfTdbgnAAAAAMIEgIvXbvyGftXGlFdPR17bM8rb";
$ip = $_SERVER['REMOTE_ADDR'];
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) 
       . '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response,true);
// should return JSON with success as true
if($responseKeys["success"]) {
    $captchaSuccess = true;
} else {
    die('Captcha test failed');
}

// Generate a unique Order ID and store all the information
// in the database
$order_id = generateOrderID();

$donor_name      = $_POST['billing_name'];
$donation_amount = $_POST['amount'];
$donor_tel       = $_POST['billing_tel'];
$donor_email     = $_POST['billing_email'];

$donor_address   = $_POST['billing_address'];
$donor_city      = $_POST['billing_city'];
$donor_state     = $_POST['billing_state'];
$donor_zip       = $_POST['billing_zip'];
$donor_country   = $_POST['billing_country'];
   
$donor_pan       = $_POST['merchant_param1'];
$donation_casue  = $_POST['merchant_param2'];

$donor_category  = $_POST['donor_category'];
$paymode         = $_POST['paymode'];

$timestamp       = date('Y-m-d H:i:s');

$conn = getdbconn();
    $stmt = $conn->prepare(
        "INSERT INTO ccavtrans(
            orderid, ordertime, donorname, donoraddress,
            donorcity, donorstate, donorzip, donorcountry, 
            donorphone, donoremail, donorpan, donationcause, 
            amount, donorcategory, paymode)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if(is_bool($stmt)) {
        echo "Oops! Something went wrong. It's us, not you.";
        echo "Internal error: prepare stament failed.";
        $conn->close();
        die("Please report this problem to us.");
    }

    $stmt->bind_param('ssssssssssssdss', 
        $order_id, $timestamp, $donor_name, $donor_address, 
        $donor_city, $donor_state, $donor_zip, $donor_country,
        $donor_tel, $donor_email, $donor_pan, $donation_casue, 
        $donation_amount, $donor_category, $paymode);

    if(!$stmt->execute()) 
    {
        echo "Oops! Something went wrong. It's us, not you.";
        echo "Internal error: database operation failed.";
        $conn->close();
        die("Please report this problem to us.");
    }

    $conn->close();

    if($donor_category == 'Foreign')
    {
        header("Location: offline_foreign.html");
        die();
    }
    if($donor_category == 'Indian' && $paymode != 'online')
    {
        header("Location: offline_domestic.html");
        die();
    }
    else
    {
        echo '<form id="redirect" action="donate_ccav.php" method="post">';
        echo '<input type="hidden" name="order_id" value="' . $order_id . '">';
        foreach ($_POST as $a => $b) {
            echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
        }
        echo '</form>';
        echo '<script type="text/javascript">
                document.getElementById("redirect").submit();
              </script>';
    }
?>
</body>
</html>