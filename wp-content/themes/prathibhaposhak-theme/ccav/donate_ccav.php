<html>
<head>
<title>Donate to Pratibha Poshak</title>
</head>
<body>
<center>

<?php 
include('Crypto.php');
include('myutils.php');

$merchant_id = "2645636";
$order_id = $_POST['order_id'];
$redirect_url = "https://pratibhaposhak.in/ccav/pgresphandler.php";
$cancel_url = "https://pratibhaposhak.in/ccav/pgresphandler.php";
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