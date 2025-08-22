<html>
<head>
<title>Donate to Pratibha Poshak</title>
</head>
<body>
<center>

<?php include('Crypto.php')?>

<?php
function getdbconn() 
{
    $host       = "localhost";
    $dbname     = "pratibhaposhak";
    $username   = "pproot";
    $password   = "PPAdmin@2022";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "Oops! Something went wrong. It's us, not you.";
        echo "Internal error: database connection failed. Please report this problem to us.";
        die("Technical error message:" . $conn->connect_error);
    }

    return $conn;
}

function generateOrderID() 
{
	return 'O' . '-' . time() . '-' . mt_rand()%100;
}

ini_set('display_errors', '1');
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$merchant_id = "2645636";
$order_id = generateOrderID();
$redirect_url = "https://pratibhaposhak.in/ccav/pgresphandler.php";
$cancel_url = "https://pratibhaposhak.in/ccav/pgcancelhandler.php";
?>

<?php 
	
	$merchant_data='merchant_id='. $merchant_id . 
        '&order_id=' . $order_id . 
        '&redirect_url=' . $redirect_url . 
        '&cancel_url=' . $cancel_url . '&';
        
	$working_key='62F8A39E1129F6D36F7C21A7F6A6D1EA';
    $access_code='AVGE86KG74AU18EGUA';

    // Now add all parameters obtained from the form
    // These include donor name, amount etc.
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

    // Insert into database
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

    $timestamp       = date('Y-m-d H:i:s');

    $conn = getdbconn();
    $stmt = $conn->prepare(
        "INSERT INTO ccavtrans(
            orderid, ordertime, donorname, donoraddress,
            donorcity, donorstate, donorzip, donorcountry, 
            donorphone, donoremail, donorpan, donationcause, 
            amount)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if(is_bool($stmt)) {
        echo "Oops! Something went wrong. It's us, not you.";
        echo "Internal error: prepare stament failed.";
        $conn->close();
        die("Please report this problem to us.");
    }

    $stmt->bind_param('ssssssssssssd', 
        $order_id, $timestamp, $donor_name, $donor_address, 
        $donor_city, $donor_state, $donor_zip, $donor_country,
        $donor_tel, $donor_email, $donor_pan, $donation_casue, 
        $donation_amount);

    if(!$stmt->execute()) 
    {
        echo "Oops! Something went wrong. It's us, not you.";
        echo "Internal error: database operation failed.";
        $conn->close();
        die("Please report this problem to us.");
    }

    $conn->close();
?>

<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>